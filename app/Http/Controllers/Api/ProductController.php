<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        return JsonResource::collection(
            Product::with('category')
                ->where('is_active', true)
                ->latest()
                ->paginate(12)
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'images'      => 'nullable|array',
            'images.*'    => 'url',
            'is_active'   => 'boolean',
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name) . '-' . time(),
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'images'      => $request->images ?? [],
            'is_active'   => $request->is_active ?? true,
        ]);

        return new JsonResource($product->load('category'));
    }

    public function show(Product $product)
    {
        return new JsonResource($product->load('category'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|string|max:255',
            'description' => 'sometimes|nullable|string',
            'price'       => 'sometimes|integer|min:0',
            'stock'       => 'sometimes|integer|min:0',
            'images'      => 'sometimes|nullable|array',
            'images.*'    => 'url',
            'is_active'   => 'sometimes|boolean',
        ]);

        if ($request->has('name')) {
            $product->slug = Str::slug($request->name) . '-' . time();
        }

        $product->update($request->all());

        return new JsonResource($product->load('category'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
