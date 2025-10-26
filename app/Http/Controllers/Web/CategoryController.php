<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('pages.category', compact('categories'));
    }
    
    public function show($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $query = Product::with('category')
            ->where('category_id', $category->id)
            ->where('is_active', true);
        
        // Filter by price range
        if ($request->has('price') && $request->price) {
            $priceRange = $request->price;
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
                $query->latest();
                break;
        }
        
        $products = $query->paginate(12);
            
        return view('pages.category-detail', compact('category', 'products'));
    }
}
