<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch categories for featured categories section
        $categories = Category::take(5)->get();
        
        // Fetch featured products (you can modify this logic as needed)
        $featuredProducts = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->take(6)
            ->get();
        
        // Mock testimonials data (you can create a testimonials table later)
        $testimonials = [
            [
                'name' => 'Winda Rizkiana',
                'rating' => 5,
                'review' => 'Produk berkualitas tinggi, pengiriman cepat. Sangat puas dengan pelayanan!',
                'time_ago' => '2 bulan lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Winda+Rizkiana&background=random'
            ],
            [
                'name' => 'Lely Maodhy',
                'rating' => 5,
                'review' => 'Koleksi tas yang sangat bagus dan harga terjangkau. Recommended!',
                'time_ago' => '1 bulan lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Lely+Maodhy&background=random'
            ],
            [
                'name' => 'Ini Sonia',
                'rating' => 5,
                'review' => 'Pelayanan customer service sangat baik, produk original dan berkualitas.',
                'time_ago' => '3 minggu lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Ini+Sonia&background=random'
            ],
            [
                'name' => 'Sari Dewi',
                'rating' => 5,
                'review' => 'Pengalaman berbelanja yang menyenangkan, produk sesuai ekspektasi.',
                'time_ago' => '2 minggu lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Sari+Dewi&background=random'
            ],
            [
                'name' => 'Maya Sari',
                'rating' => 5,
                'review' => 'Kualitas produk sangat memuaskan, akan belanja lagi di sini.',
                'time_ago' => '1 minggu lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Maya+Sari&background=random'
            ],
            [
                'name' => 'Rina Wati',
                'rating' => 5,
                'review' => 'Desain tas yang elegan dan modern, cocok untuk berbagai acara.',
                'time_ago' => '5 hari lalu',
                'avatar' => 'https://ui-avatars.com/api/?name=Rina+Wati&background=random'
            ]
        ];

        return view('pages.home', compact('categories', 'featuredProducts', 'testimonials'));
    }
}
