<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        
        if ($cartItems->isEmpty()) {
            return redirect('/keranjang')->with('error', 'Keranjang Anda kosong');
        }

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $shipping = 15000;
        $total = $subtotal + $shipping;

        return view('pages.checkout', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|string',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_state' => 'required|string',
            'shipping_postal_code' => 'required|string',
            'shipping_country' => 'required|string',
            'shipping_method' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        
        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Keranjang Anda kosong'
            ], 422);
        }

        $subtotal = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        $shipping = $this->getShippingCost($request->shipping_method);
        $total = $subtotal + $shipping;

        // Create order
        $order = Order::create([
            'number' => 'ORD-' . Str::upper(Str::random(8)),
            'user_id' => auth()->id(),
            'total_price' => $total,
            'status' => 'pending',
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address . ', ' . $request->shipping_city . ', ' . $request->shipping_state . ' ' . $request->shipping_postal_code . ', ' . $request->shipping_country,
            'shipping_phone' => $request->shipping_phone,
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
            ]);
        }

        // Clear cart
        Cart::where('user_id', auth()->id())->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat',
            'order_id' => $order->id,
            'redirect' => route('payment', ['order' => $order->id])
        ]);
    }

    private function getShippingCost($method)
    {
        $costs = [
            'standard' => 15000,
            'express' => 35000,
            'same-day' => 50000,
        ];

        return $costs[$method] ?? 15000;
    }
}

