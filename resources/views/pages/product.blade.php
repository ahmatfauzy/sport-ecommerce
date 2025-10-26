@extends('layouts.app')

@section('content')
    {{-- Container utama halaman produk --}}
    <div class="bg-gray-100 pt-24 pb-16"> {{-- Padding top untuk memberi ruang di bawah navbar fixed --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <header class="mb-8 text-center" data-aos="fade-up">
                <h1 class="text-4xl font-bold text-gray-800">Koleksi Produk Kami</h1>
                <p class="mt-2 text-lg text-gray-600">Temukan perlengkapan olahraga terbaik untuk kebutuhan Anda.</p>
            </header>

            {{-- Layout Utama: Filter Sidebar + Grid Produk --}}
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                {{-- Sidebar Filter (Kolom 1) --}}
                <aside class="lg:col-span-1 mb-8 lg:mb-0" data-aos="fade-right">
                    <div class="bg-white p-6 rounded-lg shadow-md sticky top-24"> {{-- Sticky top agar filter tetap terlihat --}}
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Filter Produk</h2>

                        {{-- Filter Merk --}}
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
                                    Specs
                                </label>
                                {{-- Tambahkan merk lain jika perlu --}}
                            </div>
                        </div>

                        {{-- Filter Jenis Alat (Kategori) --}}
                        <div>
                            <h3 class="text-lg font-medium text-gray-700 mb-3">Jenis Alat</h3>
                            <div class="space-y-2">
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    Sepatu Lari
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    Sepatu Basket
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    Pakaian Olahraga
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    Aksesoris
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    Alat Fitness
                                </label>
                                {{-- Tambahkan jenis lain jika perlu --}}
                            </div>
                        </div>

                         {{-- Tombol Terapkan Filter --}}
                         <button class="mt-8 w-full bg-[#3a3a3a] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                            Terapkan Filter
                        </button>
                    </div>
                </aside>

                {{-- Konten Utama: Sorting + Grid Produk (Kolom 2-4) --}}
                <main class="lg:col-span-3">

                    {{-- Opsi Sorting --}}
                    <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm" data-aos="fade-left">
                         <span class="text-gray-600 text-sm">Menampilkan 1-9 dari 20 produk</span> {{-- Contoh Teks --}}
                         <div class="relative">
                            <label for="sort-options" class="sr-only">Urutkan berdasarkan</label>
                            <select id="sort-options" name="sort-options" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:ring-0 text-sm">
                                <option value="terbaru">Terbaru</option>
                                <option value="terlaris">Terlaris</option>
                                <option value="termurah">Harga Termurah</option>
                                <option value="termahal">Harga Termahal</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Dummy Data Produk --}}
                    @php
                        $products = [
                            [
                                'nama' => 'Nike Air Zoom Pegasus 39',
                                'img_url' => 'https://placehold.co/400x300/EBF8FF/3182CE?text=Sepatu+Lari+1',
                                'alt_text' => 'Sepatu Lari Nike',
                                'harga' => 'Rp 1.899.000',
                                'link' => '#',
                            ],
                            [
                                'nama' => 'Adidas Ultraboost Light',
                                'img_url' => 'https://placehold.co/400x300/E6FFFA/38B2AC?text=Sepatu+Lari+2',
                                'alt_text' => 'Sepatu Lari Adidas',
                                'harga' => 'Rp 2.500.000',
                                'link' => '#',
                            ],
                            [
                                'nama' => 'Puma Deviate Nitro 2',
                                'img_url' => 'https://placehold.co/400x300/FFF5EB/DD6B20?text=Sepatu+Lari+3',
                                'alt_text' => 'Sepatu Lari Puma',
                                'harga' => 'Rp 1.950.000',
                                'link' => '#',
                            ],
                            [
                                'nama' => 'Jersey Basket Lakers',
                                'img_url' => 'https://placehold.co/400x300/FAF5FF/805AD5?text=Jersey+Basket',
                                'alt_text' => 'Jersey Basket',
                                'harga' => 'Rp 550.000',
                                'link' => '#',
                            ],
                             [
                                'nama' => 'Dumbbell Set 10kg',
                                'img_url' => 'https://placehold.co/400x300/F7FAFC/718096?text=Alat+Fitness+1',
                                'alt_text' => 'Dumbbell Set',
                                'harga' => 'Rp 350.000',
                                'link' => '#',
                            ],
                             [
                                'nama' => 'Yoga Mat Premium',
                                'img_url' => 'https://placehold.co/400x300/F0FFF4/38A169?text=Alat+Fitness+2',
                                'alt_text' => 'Yoga Mat',
                                'harga' => 'Rp 250.000',
                                'link' => '#',
                            ],
                            // Tambahkan lebih banyak produk dummy di sini
                        ];
                    @endphp

                    {{-- Grid Produk --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $index => $produk)
                            <div class="bg-white shadow-lg rounded-xl overflow-hidden group transition-all duration-300 hover:shadow-xl" 
                                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"> {{-- Delay animasi --}}
                                <a href="{{ $produk['link'] }}" class="block">
                                    <img src="{{ $produk['img_url'] }}" alt="{{ $produk['alt_text'] }}"
                                        class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                                    <div class="p-4">
                                        <h3 class="font-semibold text-gray-800 truncate group-hover:text-black transition">{{ $produk['nama'] }}</h3>
                                        {{-- Bisa tambahkan deskripsi singkat jika perlu --}}
                                        {{-- <p class="text-gray-600 text-sm mt-1 truncate">Deskripsi singkat produk...</p> --}}
                                        <span class="block mt-2 text-blue-600 font-semibold">{{ $produk['harga'] }}</span>
                                    </div>
                                </a>
                                {{-- Tombol Tambah ke Keranjang (Opsional) --}}
                                <div class="px-4 pb-4">
                                     <button class="w-full bg-black text-white py-2 px-4 rounded-lg text-sm font-semibold hover:bg-gray-800 transition duration-300 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0">
                                         Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Navigasi Halaman (Pagination) - Contoh --}}
                    <div class="mt-12 flex justify-center" data-aos="fade-up">
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Previous</span>
                                <!-- Heroicon name: solid/chevron-left -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <a href="#" aria-current="page" class="z-10 bg-gray-50 border-black text-black relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 1 </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 3 </a>
                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700"> ... </span>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium"> 8 </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 9 </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 10 </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                <span class="sr-only">Next</span>
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
