<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CartController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        return JsonResource::collection(
            Cart::with('product')->where('user_id', $request->user()->id)->get()
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::updateOrCreate(
            ['user_id' => $request->user()->id, 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );

        return new JsonResource($cart->load('product'));
    }

    public function update(Request $request, Cart $cart)
    {
        $this->authorize('update', $cart);
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cart->update(['quantity' => $request->quantity]);
        return new JsonResource($cart->load('product'));
    }

    public function destroy(Cart $cart)
    {
        $this->authorize('delete', $cart);
        $cart->delete();
        return response()->noContent();
    }
}