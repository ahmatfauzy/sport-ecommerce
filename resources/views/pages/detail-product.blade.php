@extends('layouts.app')

@section('content')
    @php
        $product = [
            'id' => 1,
            'nama' => 'Nike Air Zoom Pegasus 39',
            'img_urls' => [
                'https://placehold.co/600x600/EBF8FF/3182CE?text=Sepatu+Utama',
                'https://placehold.co/600x600/E6FFFA/38B2AC?text=Tampak+Samping',
                'https://placehold.co/600x600/FFF5EB/DD6B20?text=Tampak+Atas',
                'https://placehold.co/600x600/FAF5FF/805AD5?text=Detail+Sol',
            ], 
            'deskripsi_panjang' => 'Nike Air Zoom Pegasus 39 adalah sepatu lari serbaguna yang dirancang untuk kenyamanan dan responsivitas. Dengan bantalan Zoom Air di bagian depan dan tumit, sepatu ini memberikan energi kembali di setiap langkah. Upper mesh yang ringan memberikan sirkulasi udara yang baik, menjaga kaki tetap sejuk. Cocok untuk lari harian maupun latihan tempo.',
            'harga' => 'Rp 1.899.000',
            'harga_angka' => 1899000, 
            'terjual' => 152, 
            'rating_avg' => 4.5, 
            'jumlah_ulasan' => 35, 
        ];

        $comments = [
            [
                'user' => 'Budi S.',
                'rating' => 5,
                'comment' => 'Sepatunya nyaman banget! Dipakai lari 10km tetap enak. Pengiriman juga cepat.',
                'tanggal' => '12 Okt 2025',
            ],
            [
                'user' => 'Citra L.',
                'rating' => 4,
                'comment' => 'Modelnya keren, pas di kaki. Sedikit lebih mahal dari ekspektasi tapi kualitasnya bagus.',
                'tanggal' => '10 Okt 2025',
            ],
             [
                'user' => 'Ahmad Y.',
                'rating' => 5,
                'comment' => 'Original 100%. Sesuai deskripsi. Mantap!',
                'tanggal' => '05 Okt 2025',
            ],
        ];
    @endphp


    <div class="bg-gray-50 pt-24 pb-16"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav class="mb-6 text-sm text-gray-500" data-aos="fade-down">
                <a href="/produk" class="hover:text-gray-700">Produk</a>
                <span class="mx-2">/</span>
                <a href="#" class="hover:text-gray-700">Sepatu Lari</a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">{{ $product['nama'] }}</span>
            </nav>

            <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-start">

                {{-- Kolom Kiri: Galeri Gambar --}}
                <div data-aos="fade-right">

                    <div class="mb-4">
                        <img id="main-product-image" src="{{ $product['img_urls'][0] }}" alt="{{ $product['nama'] }}" class="w-full h-auto object-cover rounded-lg shadow-md aspect-square">
                    </div>

                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($product['img_urls'] as $index => $img_url)
                            <img src="{{ $img_url }}" alt="Thumbnail {{ $index + 1 }}" 
                                 class="w-full h-auto object-cover rounded cursor-pointer border-2 {{ $index == 0 ? 'border-black' : 'border-transparent' }} hover:border-black transition duration-200 aspect-square product-thumbnail"
                                 onclick="changeMainImage('{{ $img_url }}', this)">
                        @endforeach
                    </div>
                </div>

                <div data-aos="fade-left">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        {{-- Nama Produk --}}
                        <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $product['nama'] }}</h1>

                        {{-- Info Rating & Terjual --}}
                        <div class="flex items-center space-x-4 mb-4 text-sm">
                            <div class="flex items-center text-yellow-400">
                                {{-- Rating Bintang --}}
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < floor($product['rating_avg']))
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                    @elseif ($i < ceil($product['rating_avg']))
                                        {{-- Bintang Setengah (jika ada) - simplified as full for now --}}
                                         <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" /></svg>
                                    @endif
                                @endfor
                                <span class="ml-1 text-gray-600">({{ number_format($product['rating_avg'], 1) }})</span>
                            </div>
                            <span class="text-gray-400">|</span>
                            <span class="text-gray-600">{{ $product['jumlah_ulasan'] }} Ulasan</span>
                            <span class="text-gray-400">|</span>
                            <span class="text-gray-600 font-medium text-green-600">{{ $product['terjual'] }} Terjual</span>
                        </div>

                        {{-- Harga --}}
                        <p class="text-3xl font-bold text-black mb-6">{{ $product['harga'] }}</p>

                        {{-- Deskripsi Singkat/Panjang --}}
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h3>
                            <p class="text-gray-600 leading-relaxed text-sm">{{ $product['deskripsi_panjang'] }}</p>
                        </div>

                        {{-- Kuantitas & Tombol Aksi --}}
                        <div class="flex items-center space-x-4 mb-6">
                            <label for="quantity" class="text-lg font-medium text-gray-700">Jumlah:</label>
                            <div class="flex items-center border border-gray-300 rounded">
                                <button onclick="adjustQuantity(-1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100">-</button>
                                <input id="quantity" type="number" value="1" min="1" class="w-12 text-center border-l border-r border-gray-300 focus:outline-none focus:ring-0" readonly>
                                <button onclick="adjustQuantity(1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100">+</button>
                            </div>
                        </div>

                        <button class="w-full bg-black text-white py-3 px-6 rounded-lg font-semibold text-lg hover:bg-gray-800 transition duration-300 flex items-center justify-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" /></svg>
                            <span>Tambah ke Keranjang</span>
                        </button>
                    </div>
                </div>
            </div>

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
