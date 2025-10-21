<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        return JsonResource::collection(
            Order::with('items.product')->where('user_id', $request->user()->id)->latest()->get()
        );
    }

    public function show(Request $request, Order $order)
    {
        $this->authorize('view', $order);
        return new JsonResource($order->load('items.product', 'transaction'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_phone' => 'required|string',
        ]);

        $cartItems = Cart::with('product')->where('user_id', $request->user()->id)->get();
        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 422);
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'number' => 'ORD-' . Str::upper(Str::random(8)),
            'user_id' => $request->user()->id,
            'total_price' => $total,
            'status' => 'pending',
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_phone' => $request->shipping_phone,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ]);
        }

        Cart::where('user_id', $request->user()->id)->delete();

        return new JsonResource($order->load('items.product'));
    }
}
