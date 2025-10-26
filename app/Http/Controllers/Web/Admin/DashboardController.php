<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_orders' => Order::count(),
            'total_users' => User::count(),
            'recent_orders' => Order::with('user')->latest()->take(5)->get(),
            'recent_products' => Product::with('category')->latest()->take(5)->get(),
        ];

        return view('pages.admin.dashboard', compact('stats'));
    }
}
