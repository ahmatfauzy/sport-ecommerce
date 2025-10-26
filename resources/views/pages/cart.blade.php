@extends('layouts.app')

@section('content')
    @php
        // Get cart items from authenticated user
        $cartItems = [];
        $subtotal = 0;
        $ongkir = 15000; // Default shipping cost
        $total = $subtotal + $ongkir;
        
        if (Auth::check()) {
            // TODO: Implement cart functionality with database
            // For now, show empty cart
        }
    @endphp

    {{-- Container utama halaman keranjang --}}
    <div class="bg-gray-100 pt-24 pb-16 min-h-screen"> {{-- Padding top & min-height --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <header class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold text-gray-800">Keranjang Belanja</h1>
                <p class="mt-2 text-lg text-gray-600">Periksa item Anda dan lanjutkan ke checkout.</p>
            </header>

            @if (count($cartItems) > 0)
                {{-- Layout Utama: Daftar Item + Ringkasan Pesanan --}}
                <div class="lg:grid lg:grid-cols-3 lg:gap-8 items-start">

                    {{-- Daftar Item Keranjang (Kolom Kiri - Span 2) --}}
                    <section class="lg:col-span-2 space-y-4 mb-8 lg:mb-0" data-aos="fade-right">
                        @foreach ($cartItems as $item)
                            <div class="bg-white p-4 rounded-lg shadow-md flex items-start space-x-4 cart-item" data-id="{{ $item['id'] }}" data-price="{{ $item['harga_angka'] }}">
                                {{-- Gambar Produk --}}
                                <img src="{{ $item['img_url'] }}" alt="{{ $item['nama'] }}" class="w-20 h-20 object-cover rounded flex-shrink-0">

                                {{-- Info Produk & Kuantitas --}}
                                <div class="flex-grow">
                                    <h2 class="font-semibold text-gray-800">{{ $item['nama'] }}</h2>
                                    <p class="text-sm text-gray-500 mb-2">{{ $item['harga_tampil'] }}</p>

                                    {{-- Kontrol Kuantitas --}}
                                    <div class="flex items-center border border-gray-200 rounded w-fit">
                                        <button onclick="adjustCartQuantity({{ $item['id'] }}, -1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100 focus:outline-none">-</button>
                                        <input id="quantity-{{ $item['id'] }}" type="number" value="{{ $item['kuantitas'] }}" min="1" class="w-12 text-center border-l border-r border-gray-200 focus:outline-none focus:ring-0 text-sm quantity-input" readonly>
                                        <button onclick="adjustCartQuantity({{ $item['id'] }}, 1)" class="px-3 py-1 text-gray-600 hover:bg-gray-100 focus:outline-none">+</button>
                                    </div>
                                </div>

                                {{-- Harga Total Item & Tombol Hapus --}}
                                <div class="text-right flex-shrink-0">
                                    <p id="total-price-{{ $item['id'] }}" class="font-semibold text-gray-800 mb-2 item-total-price">Rp {{ number_format($item['harga_angka'] * $item['kuantitas'], 0, ',', '.') }}</p>
                                    <button class="text-red-500 hover:text-red-700 text-xs font-medium focus:outline-none">
                                        <svg class="w-4 h-4 inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                        Hapus
                                    </button> {{-- Tambahkan event listener JS untuk menghapus --}}
                                </div>
                            </div>
                        @endforeach
                    </section>

                    {{-- Ringkasan Pesanan (Kolom Kanan) --}}
                    <aside class="lg:col-span-1" data-aos="fade-left">
                        <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Ringkasan Pesanan</h2>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal ({{ count($cartItems) }} item)</span>
                                    <span id="cart-subtotal" class="font-medium text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ongkos Kirim</span>
                                    <span id="cart-shipping" class="font-medium text-gray-800">Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between border-t pt-3 mt-3">
                                    <span class="text-lg font-semibold text-gray-800">Total</span>
                                    <span id="cart-total" class="text-lg font-semibold text-gray-800">Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <a href="/checkout" class="mt-6 block w-full bg-black text-white py-3 px-6 rounded-lg font-semibold text-center hover:bg-gray-800 transition duration-300">
                                Lanjut ke Checkout
                            </a>
                        </div>
                    </aside>

                </div>
            @else
                {{-- Tampilan Keranjang Kosong --}}
                <div class="text-center bg-white p-12 rounded-lg shadow-md" data-aos="fade-up">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" /></svg>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-2">Keranjang Anda Kosong</h2>
                    <p class="text-gray-600 mb-6">Sepertinya Anda belum menambahkan produk apapun ke keranjang.</p>
                    <a href="/produk"
                       class="inline-block px-6 py-2 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition">
                       Mulai Belanja
                    </a>
                </div>
            @endif

        </div>
    </div>

    @push('scripts')
        <script>
            // Fungsi format angka ke Rupiah
            function formatRupiah(number) {
                return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            function updateCartSummary() {
                let subtotal = 0;
                const items = document.querySelectorAll('.cart-item');
                items.forEach(item => {
                    const price = parseFloat(item.dataset.price);
                    const quantityInput = item.querySelector('.quantity-input');
                     if (quantityInput) { 
                        const quantity = parseInt(quantityInput.value);
                        subtotal += price * quantity;
                     }

                });

                const shipping = {{ $ongkir }}; // Ambil ongkir dari PHP
                const total = subtotal + shipping;

                const subtotalElement = document.getElementById('cart-subtotal');
                const shippingElement = document.getElementById('cart-shipping');
                const totalElement = document.getElementById('cart-total');

                if (subtotalElement) subtotalElement.textContent = formatRupiah(subtotal);
                if (shippingElement) shippingElement.textContent = formatRupiah(shipping);
                if (totalElement) totalElement.textContent = formatRupiah(total);
            }

            // Fungsi ubah kuantitas item
            function adjustCartQuantity(itemId, amount) {
                const quantityInput = document.getElementById(`quantity-${itemId}`);
                const totalPriceElement = document.getElementById(`total-price-${itemId}`);
                const itemElement = quantityInput.closest('.cart-item');
                const pricePerItem = parseFloat(itemElement.dataset.price);


                if (quantityInput && totalPriceElement) {
                    let currentValue = parseInt(quantityInput.value);
                    currentValue += amount;
                    if (currentValue < 1) {
                        currentValue = 1; 
                    }
                    quantityInput.value = currentValue;

                    // Update harga total item
                    const newItemTotalPrice = pricePerItem * currentValue;
                    totalPriceElement.textContent = formatRupiah(newItemTotalPrice);


                    // Update ringkasan
                    updateCartSummary();

                }
            }
             // Panggil updateCartSummary saat halaman dimuat jika ada item
            document.addEventListener('DOMContentLoaded', () => {
                if (document.querySelectorAll('.cart-item').length > 0) {
                     updateCartSummary();
                }
            });
        </script>
    @endpush

@endsection
