<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::withCount('products')->latest()->get();
        return view('pages.admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('pages.admin.categories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug ?? \Str::slug($request->name),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Kategori berhasil ditambahkan']);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show(Category $category)
    {
        return view('pages.admin.categories', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('pages.admin.categories', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug ?? \Str::slug($request->name),
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Kategori berhasil diperbarui']);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        if (request()->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Kategori berhasil dihapus']);
        }
        
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus');
    }
}
