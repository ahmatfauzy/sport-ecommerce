<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{
    public function index()
    {
        return JsonResource::collection(Order::with('user', 'items.product')->latest()->get());
    }

    public function show(Order $order)
    {
        return new JsonResource($order->load('user', 'items.product', 'transaction'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|in:pending,processing,shipped,completed,cancelled']);
        $order->update(['status' => $request->status]);
        return new JsonResource($order);
    }
}
