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
    
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->where('is_active', true)
            ->latest()
            ->paginate(12);
            
        return view('pages.category-detail', compact('category', 'products'));
    }
}
