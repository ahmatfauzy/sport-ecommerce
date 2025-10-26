<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index(Request $request)
    {
        $orderId = $request->query('order');
        
        if (!$orderId) {
            return redirect('/')->with('error', 'Pesanan tidak ditemukan');
        }

        $order = Order::with(['items.product', 'transaction'])->findOrFail($orderId);
        
        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        // Check if transaction already exists
        if (!$order->transaction) {
            $transaction = $this->createTransaction($order);
        } else {
            $transaction = $order->transaction;
        }

        return view('pages.payment', compact('order', 'transaction'));
    }

    private function createTransaction(Order $order)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $order->number,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => $order->shipping_phone,
            ],
            'billing_address' => [
                'first_name' => $order->shipping_name,
                'phone' => $order->shipping_phone,
                'address' => $order->shipping_address,
                'country_code' => 'IDN'
            ],
            'shipping_address' => [
                'first_name' => $order->shipping_name,
                'phone' => $order->shipping_phone,
                'address' => $order->shipping_address,
                'country_code' => 'IDN'
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $transaction = Transaction::create([
                'order_id' => $order->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'amount' => $order->total_price,
                'status' => 'pending',
                'snap_token' => $snapToken,
            ]);

            return $transaction;
        } catch (\Exception $e) {
            \Log::error('Midtrans Error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateOrderStatus(Request $request)
    {
        // This will be called by Midtrans webhook
        // For now, we'll handle it manually
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $orderNumber = $notif->order_id;

        $order = Order::where('number', $orderNumber)->first();
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
        }

        $trx = Transaction::where('order_id', $order->id)->first();

        if (in_array($transaction, ['capture', 'settlement'])) {
            $trx->update(['status' => 'paid']);
            $order->update(['status' => 'processing']);
        } elseif (in_array($transaction, ['cancel', 'deny', 'expire'])) {
            $trx->update(['status' => 'failed']);
            $order->update(['status' => 'cancelled']);
        }

        return response()->json(['status' => 'ok']);
    }
}

