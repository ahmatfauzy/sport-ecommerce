<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $products = Product::with('category')->paginate(15);
        return view('pages.admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'features' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle specification
        $specification = null;
        if ($request->specification) {
            $specification = json_decode($request->specification, true);
        }

        // Handle features
        $features = null;
        if ($request->features) {
            $features = explode("\n", $request->features);
            $features = array_filter(array_map('trim', $features));
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'specification' => $specification,
            'features' => $features,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'is_active' => $request->has('is_active'),
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $images[] = $path;
            }
            $product->update(['images' => $images]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'features' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle specification
        $specification = null;
        if ($request->specification) {
            $specification = json_decode($request->specification, true);
        }

        // Handle features
        $features = null;
        if ($request->features) {
            $features = explode("\n", $request->features);
            $features = array_filter(array_map('trim', $features));
        }

        $product->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'specification' => $specification ?? $product->specification,
            'features' => $features ?? $product->features,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'is_active' => $request->has('is_active'),
        ]);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $existingImages = $product->images ?? [];
            $newImages = [];
            
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $newImages[] = $path;
            }
            
            $product->update(['images' => array_merge($existingImages, $newImages)]);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Delete associated images
        if ($product->images) {
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $product->delete();
        
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Produk berhasil dihapus!']);
        }
        
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
