<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->where('is_active', true);
        
        // Filter by categories (multiple)
        if ($request->has('categories') && is_array($request->categories)) {
            $query->whereHas('category', function($q) use ($request) {
                $q->whereIn('slug', $request->categories);
            });
        }
        
        // Filter by price range
        if ($request->has('price_range') && $request->price_range) {
            $priceRange = $request->price_range;
            if (strpos($priceRange, '-') !== false) {
                $prices = explode('-', $priceRange);
                if (count($prices) == 2) {
                    $minPrice = (int)$prices[0];
                    $maxPrice = $prices[1] ? (int)$prices[1] : null;
                    
                    if ($maxPrice) {
                        $query->whereBetween('price', [$minPrice, $maxPrice]);
                    } else {
                        $query->where('price', '>=', $minPrice);
                    }
                }
            }
        }
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        
        // Sorting
        $sort = $request->get('sort', 'terbaru');
        switch ($sort) {
            case 'termurah':
                $query->orderBy('price', 'asc');
                break;
            case 'termahal':
                $query->orderBy('price', 'desc');
                break;
            case 'terlaris':
                $query->orderBy('sold_count', 'desc');
                break;
            case 'terbaru':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
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
}
