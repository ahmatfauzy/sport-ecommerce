<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index()
    {
        return JsonResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        return new JsonResource($category);
    }
}
