<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::with(['items.product'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['items.product', 'transaction', 'user'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('pages.order-detail', compact('order'));
    }
}
