<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
            'name' => 'required|string',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1000',
        ]);

        $orderId = 'ORDER-' . time();
        $transaction = Transaction::create([
            'order_id' => $orderId,
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email' => $request->email,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $transaction->update(['snap_token' => $snapToken]);

        return response()->json([
            'status' => 'success',
            'snap_token' => $snapToken,
            'transaction' => $transaction,
        ]);
    }

    public function notificationHandler(Request $request)
    {
        $notification = new \Midtrans\Notification();

        $transaction = $notification->transaction_status;
        $orderId = $notification->order_id;

        $transactionModel = Transaction::where('order_id', $orderId)->first();

        if (!$transactionModel) {
            return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
        }

        if ($transaction == 'capture' || $transaction == 'settlement') {
            $transactionModel->update(['status' => 'paid']);
        } elseif ($transaction == 'cancel' || $transaction == 'deny' || $transaction == 'expire') {
            $transactionModel->update(['status' => 'failed']);
        }

        return response()->json(['status' => 'ok']);
    }
}
