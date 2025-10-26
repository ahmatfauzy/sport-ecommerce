<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $orders = Order::with('user', 'orderItems.product')->latest()->get();
        return view('pages.admin.orders', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('user', 'orderItems.product', 'transaction');
        return view('pages.admin.orders', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan berhasil diperbarui');
    }
}
