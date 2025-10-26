@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="mb-6" data-aos="fade-right">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="/" class="hover:text-gray-900">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/categories" class="hover:text-gray-900">Categories</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-900 font-medium">Sepatu Lari</li>
            </ol>
        </nav>

        <!-- Category Header -->
        <div class="mb-8" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Sepatu Lari</h1>
            <p class="text-lg text-gray-600">Temukan sepatu lari terbaik untuk performa maksimal Anda</p>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <span>Menampilkan 15 produk</span>
            </div>
        </div>

        <!-- Layout: Filter Sidebar + Products Grid -->
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            
            <!-- Filter Sidebar -->
            <aside class="lg:col-span-1 mb-8 lg:mb-0" data-aos="fade-right">
                <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Filter Produk</h2>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Harga</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 0 - Rp 500.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 500.000 - Rp 1.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 1.000.000 - Rp 2.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 2.000.000+</span>
                            </label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Merk</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Nike
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Adidas
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Puma
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                New Balance
                            </label>
                        </div>
                    </div>

                    <!-- Size -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Ukuran</h3>
                        <div class="grid grid-cols-3 gap-2">
                            @php
                                $sizes = [38, 39, 40, 41, 42, 43, 44, 45, 46];
                            @endphp
                            @foreach($sizes as $size)
                            <label class="flex items-center justify-center text-gray-600 hover:text-gray-800 cursor-pointer border border-gray-300 rounded p-2 text-sm">
                                <input type="checkbox" class="sr-only">
                                {{ $size }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Color -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Warna</h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $colors = [
                                    ['name' => 'Hitam', 'code' => 'bg-black'],
                                    ['name' => 'Putih', 'code' => 'bg-white border border-gray-300'],
                                    ['name' => 'Merah', 'code' => 'bg-red-500'],
                                    ['name' => 'Biru', 'code' => 'bg-blue-500'],
                                    ['name' => 'Hijau', 'code' => 'bg-green-500'],
                                    ['name' => 'Kuning', 'code' => 'bg-yellow-500'],
                                ];
                            @endphp
                            @foreach($colors as $color)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only">
                                <div class="w-6 h-6 rounded-full {{ $color['code'] }} border-2 border-gray-300 hover:border-gray-500"></div>
                                <span class="ml-2 text-sm text-gray-600">{{ $color['name'] }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    <button class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition duration-300 mb-4">
                        Clear All Filters
                    </button>

                    <!-- Apply Filters -->
                    <button class="w-full bg-[#3a3a3a] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                        Apply Filters
                    </button>
                </div>
            </aside>

            <!-- Products Grid -->
            <main class="lg:col-span-3">
                
                <!-- Sorting Options -->
                <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm" data-aos="fade-left">
                    <span class="text-gray-600 text-sm">Menampilkan 1-12 dari 15 produk</span>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Urutkan:</span>
                        <select class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <option value="terbaru">Terbaru</option>
                            <option value="terlaris">Terlaris</option>
                            <option value="termurah">Harga Termurah</option>
                            <option value="termahal">Harga Termahal</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    {{-- TODO: Replace with actual products from database --}}
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada produk</h3>
                        <p class="text-gray-600">Produk dalam kategori ini akan muncul di sini</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center" data-aos="fade-up">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
