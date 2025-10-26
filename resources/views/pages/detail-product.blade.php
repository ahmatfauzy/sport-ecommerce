@extends('layouts.app')

@section('content')
    @php
        // TODO: Replace with actual product data from database
        $product = null;
        $comments = [];
        
        // For now, show empty state
    @endphp


    <div class="bg-gray-50 pt-24 pb-16"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($product)
                <nav class="mb-6 text-sm text-gray-500" data-aos="fade-down">
                    <a href="/produk" class="hover:text-gray-700">Produk</a>
                    <span class="mx-2">/</span>
                    <a href="#" class="hover:text-gray-700">Kategori</a>
                    <span class="mx-2">/</span>
                    <span class="text-gray-700">{{ $product['nama'] }}</span>
                </nav>

                <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-start">
                    {{-- Product details will be shown here --}}
                    <div class="text-center py-12">
                        <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $product['nama'] }}</h1>
                        <p class="text-gray-600">{{ $product['deskripsi_panjang'] }}</p>
                        <p class="text-3xl font-bold text-black mt-6">{{ $product['harga'] }}</p>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Produk Tidak Ditemukan</h2>
                    <p class="text-gray-600 mb-6">Produk yang Anda cari tidak tersedia atau telah dihapus.</p>
                    <a href="/produk" class="inline-block px-6 py-2 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition">
                        Kembali ke Produk
                    </a>
                </div>
            @endif

            {{-- Bagian Ulasan/Komentar --}}
            <div class="mt-16 bg-white p-6 md:p-8 rounded-lg shadow-md" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3">Ulasan Pelanggan</h2>

                @if (count($comments) > 0)
                    <div class="space-y-6">
                        @foreach ($comments as $comment)
                            <article class="border-b pb-4 last:border-b-0 last:pb-0">
                                <div class="flex items-center mb-2">
                                    {{-- Avatar Placeholder --}}
                                    <img src="https://placehold.co/40x40/cccccc/ffffff?text={{ strtoupper(substr($comment['user'], 0, 1)) }}" alt="Avatar" class="w-10 h-10 rounded-full mr-3">
                                    <div>
                                        <p class="font-semibold text-gray-800">{{ $comment['user'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $comment['tanggal'] }}</p>
                                    </div>
                                    {{-- Rating Bintang Komentar --}}
                                    <div class="flex text-yellow-400 ml-auto">
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < $comment['rating'])
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                            @else
                                                <svg class="w-4 h-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" /></svg>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p class="text-gray-600 text-sm leading-relaxed">{{ $comment['comment'] }}</p>
                            </article>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center">Belum ada ulasan untuk produk ini.</p>
                @endif

                 {{-- Form Tambah Komentar (Contoh Sederhana) --}}
                 <div class="mt-8 pt-6 border-t">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tulis Ulasan Anda</h3>
                    <form action="#" method="POST"> {{-- Ganti action sesuai kebutuhan --}}
                        @csrf {{-- Penting untuk form Laravel --}}
                        <div class="mb-4">
                            <label for="comment-rating" class="block text-sm font-medium text-gray-700 mb-1">Rating Anda</label>
                            {{-- Buat komponen rating bintang interaktif jika diperlukan --}}
                            <select id="comment-rating" name="rating" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                <option value="5">5 Bintang</option>
                                <option value="4">4 Bintang</option>
                                <option value="3">3 Bintang</option>
                                <option value="2">2 Bintang</option>
                                <option value="1">1 Bintang</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="comment-text" class="block text-sm font-medium text-gray-700 mb-1">Ulasan Anda</label>
                            <textarea id="comment-text" name="comment" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm" placeholder="Bagikan pengalaman Anda tentang produk ini..."></textarea>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#3a3a3a] text-white rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 text-sm">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    {{-- Script untuk Galeri Gambar & Kuantitas --}}
    @push('scripts')
        <script>
            function changeMainImage(newSrc, clickedThumbnail) {
                document.getElementById('main-product-image').src = newSrc;
                
                // Hapus border dari semua thumbnail
                const thumbnails = document.querySelectorAll('.product-thumbnail');
                thumbnails.forEach(thumb => thumb.classList.remove('border-black'));
                thumbnails.forEach(thumb => thumb.classList.add('border-transparent'));

                // Tambahkan border ke thumbnail yang diklik
                clickedThumbnail.classList.remove('border-transparent');
                clickedThumbnail.classList.add('border-black');
            }

            function adjustQuantity(amount) {
                const quantityInput = document.getElementById('quantity');
                let currentValue = parseInt(quantityInput.value);
                currentValue += amount;
                if (currentValue < 1) {
                    currentValue = 1; // Minimum quantity is 1
                }
                quantityInput.value = currentValue;
            }
        </script>
    @endpush

@endsection
