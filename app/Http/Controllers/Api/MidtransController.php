<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function createTransaction(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $order = Order::findOrFail($request->order_id);

        $params = [
            'transaction_details' => [
                'order_id' => $order->number,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $transaction = Transaction::updateOrCreate(
            ['order_id' => $order->id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'amount' => $order->total_price,
                'snap_token' => $snapToken,
            ]
        );

        return response()->json([
            'snap_token' => $snapToken,
            'transaction' => $transaction,
        ]);
    }

    public function notificationHandler(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $orderNumber = $notif->order_id;

        $order = Order::where('number', $orderNumber)->first();
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
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
