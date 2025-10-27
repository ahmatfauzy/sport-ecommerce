<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua produk
    public function index(Request $request)
    {
        $categories = Category::all();

        $products = Product::query();

        // Filter berdasarkan rentang harga
        if ($request->has('price_range') && $request->price_range) {
            $range = explode('-', $request->price_range);
            $min = $range[0];
            $max = isset($range[1]) && $range[1] !== '' ? $range[1] : null;

            if ($max) {
                $products->whereBetween('price', [$min, $max]);
            } else {
                $products->where('price', '>=', $min);
            }
        }

        // Filter berdasarkan kategori
        if ($request->has('categories')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->whereIn('slug', $request->categories);
            });
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'termurah':
                    $products->orderBy('price', 'asc');
                    break;
                case 'termahal':
                    $products->orderBy('price', 'desc');
                    break;
                case 'terlaris':
                    $products->orderBy('sold', 'desc');
                    break;
                default:
                    $products->latest();
                    break;
            }
        } else {
            $products->latest();
        }

        $products = $products->paginate(9);

        return view('pages.product', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        // Get related products from the same category
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('pages.product-detail', compact('product', 'relatedProducts'));
    }
    public function search(Request $request)
    {
        $query = $request->input('q');
        $categories = Category::all();

        // Query dasar
        $products = Product::query()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            });

        // 🔍 Filter berdasarkan rentang harga
        if ($request->filled('price_range')) {
            $range = explode('-', $request->price_range);
            $min = $range[0];
            $max = $range[1] ?? null;

            if ($max && $max !== '') {
                $products->whereBetween('price', [$min, $max]);
            } else {
                $products->where('price', '>=', $min);
            }
        }

        // 🔍 Filter berdasarkan kategori
        if ($request->has('categories')) {
            $products->whereHas('category', function ($q) use ($request) {
                $q->whereIn('slug', $request->categories);
            });
        }

        // 🔍 Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'termurah':
                    $products->orderBy('price', 'asc');
                    break;
                case 'termahal':
                    $products->orderBy('price', 'desc');
                    break;
                case 'terlaris':
                    $products->orderBy('sold', 'desc');
                    break;
                default:
                    $products->latest();
                    break;
            }
        } else {
            $products->latest();
        }

        $products = $products->paginate(9)->appends($request->query());

        return view('pages.product-search', [
            'products' => $products,
            'query' => $query,
            'categories' => $categories
        ]);
    }

}
