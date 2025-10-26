@extends('layouts.app')

@section('content')
    {{-- Dummy Data (Ambil dari Cart atau Session/Database) --}}
    @php
        $cartItems = [ // Idealnya ini diambil dari data Cart yang sama
            [
                'id' => 1,
                'nama' => 'Nike Air Zoom Pegasus 39',
                'img_url' => 'https://placehold.co/80x80/EBF8FF/3182CE?text=Nike',
                'harga_angka' => 1899000,
                'harga_tampil' => 'Rp 1.899.000',
                'kuantitas' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Jersey Basket Pro DryFit',
                'img_url' => 'https://placehold.co/80x80/FFF5EB/DD6B20?text=Jersey',
                'harga_angka' => 450000,
                'harga_tampil' => 'Rp 450.000',
                'kuantitas' => 2,
            ],
        ];

         // Dummy data user (idealnya dari Auth::user())
        $user = [
            'nama' => 'Budi Santoso',
            'email' => 'budi.santoso@example.com',
            'telepon' => '+6281234567890',
            'alamat' => [
                'jalan' => 'Jl. Merdeka No. 17',
                'kota' => 'Jakarta Selatan',
                'provinsi' => 'DKI Jakarta',
                'kode_pos' => '12345',
            ],
        ];

        // Hitung Subtotal
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['harga_angka'] * $item['kuantitas'];
        }
        $ongkir = 15000; // Contoh Ongkir - Seharusnya dipilih
        $biaya_layanan = 2000; // Contoh Biaya Layanan
        $total = $subtotal + $ongkir + $biaya_layanan;

        // Opsi Pengiriman Dummy
        $shippingOptions = [
            ['id' => 'reguler', 'nama' => 'Reguler (2-3 Hari)', 'harga' => 15000, 'harga_tampil' => 'Rp 15.000'],
            ['id' => 'express', 'nama' => 'Express (1 Hari)', 'harga' => 30000, 'harga_tampil' => 'Rp 30.000'],
        ];

        // Opsi Pembayaran Dummy
        $paymentOptions = [
            ['id' => 'bca_va', 'nama' => 'BCA Virtual Account'],
            ['id' => 'mandiri_va', 'nama' => 'Mandiri Virtual Account'],
            ['id' => 'gopay', 'nama' => 'GoPay'],
            ['id' => 'cc', 'nama' => 'Kartu Kredit/Debit'],
        ];

    @endphp

    {{-- Container utama halaman checkout --}}
    <div class="bg-gray-100 pt-24 pb-16 min-h-screen"> {{-- Padding top & min-height --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <header class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold text-gray-800">Checkout</h1>
                <p class="mt-2 text-lg text-gray-600">Selesaikan pesanan Anda dalam beberapa langkah.</p>
            </header>

            {{-- Form Checkout Utama --}}
            <form action="#" method="POST"> {{-- Ganti action dengan route proses checkout --}}
                 @csrf
                {{-- Layout Utama: Detail Pesanan + Ringkasan --}}
                <div class="lg:grid lg:grid-cols-3 lg:gap-8 items-start">

                    {{-- Kolom Kiri (Detail Pengiriman & Pembayaran) - Span 2 --}}
                    <div class="lg:col-span-2 space-y-8 mb-8 lg:mb-0">

                        {{-- 1. Alamat Pengiriman --}}
                        <section class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-right">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2 flex justify-between items-center">
                                <span>Alamat Pengiriman</span>
                                <a href="#alamat-pengiriman" class="text-sm text-black hover:underline font-medium">Ubah Alamat</a> {{-- Link ke halaman profil --}}
                            </h2>
                            <div class="space-y-1 text-sm text-gray-600">
                                <p class="font-medium text-gray-800">{{ $user['nama'] }}</p>
                                <p>{{ $user['telepon'] ?? '-' }}</p>
                                <p>{{ $user['alamat']['jalan'] ?? '-' }}</p>
                                <p>{{ $user['alamat']['kota'] ?? '-' }}, {{ $user['alamat']['provinsi'] ?? '-' }} {{ $user['alamat']['kode_pos'] ?? '-' }}</p>
                            </div>
                        </section>

                        {{-- 2. Metode Pengiriman --}}
                        <section class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-right" data-aos-delay="100">
                             <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Metode Pengiriman</h2>
                             <div class="space-y-3">
                                @foreach ($shippingOptions as $index => $option)
                                    <label for="shipping-{{ $option['id'] }}" class="flex items-center justify-between p-3 border rounded-lg cursor-pointer hover:border-black transition">
                                        <div class="flex items-center">
                                            <input type="radio" id="shipping-{{ $option['id'] }}" name="shipping_method" value="{{ $option['id'] }}" data-cost="{{ $option['harga'] }}" class="h-4 w-4 text-black focus:ring-black border-gray-300" {{ $index == 0 ? 'checked' : '' }} onchange="updateCheckoutSummary()"> {{-- Checked default & panggil JS onchange --}}
                                            <span class="ml-3 text-sm font-medium text-gray-800">{{ $option['nama'] }}</span>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-800">{{ $option['harga_tampil'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </section>

                         {{-- 3. Metode Pembayaran --}}
                        <section class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-right" data-aos-delay="200">
                             <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Metode Pembayaran</h2>
                            <div class="space-y-3">
                                @foreach ($paymentOptions as $index => $option)
                                    <label for="payment-{{ $option['id'] }}" class="flex items-center p-3 border rounded-lg cursor-pointer hover:border-black transition">
                                        <input type="radio" id="payment-{{ $option['id'] }}" name="payment_method" value="{{ $option['id'] }}" class="h-4 w-4 text-black focus:ring-black border-gray-300" {{ $index == 0 ? 'checked' : '' }}>
                                        {{-- Tambahkan ikon jika perlu --}}
                                        <span class="ml-3 text-sm font-medium text-gray-800">{{ $option['nama'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                            {{-- Placeholder untuk detail kartu kredit jika dipilih --}}
                             <div id="cc-details" class="mt-4 space-y-3 border-t pt-4 hidden">
                                <p class="text-sm font-medium">Detail Kartu Kredit/Debit</p>
                                <div>
                                     <label for="cc-number" class="sr-only">Nomor Kartu</label>
                                    <input type="text" id="cc-number" placeholder="Nomor Kartu" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                </div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label for="cc-expiry" class="sr-only">MM/YY</label>
                                        <input type="text" id="cc-expiry" placeholder="MM/YY" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                    </div>
                                    <div class="col-span-2">
                                         <label for="cc-cvc" class="sr-only">CVC</label>
                                        <input type="text" id="cc-cvc" placeholder="CVC" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                    </div>
                                </div>
                             </div>
                        </section>

                    </div>

                    {{-- Kolom Kanan (Ringkasan Pesanan) --}}
                    <aside class="lg:col-span-1" data-aos="fade-left">
                        <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Ringkasan Pesanan</h2>

                             {{-- Daftar Item Mini --}}
                            <div class="space-y-3 mb-4 max-h-48 overflow-y-auto pr-2">
                                @foreach ($cartItems as $item)
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center space-x-2">
                                        <img src="{{ $item['img_url'] }}" alt="{{ $item['nama'] }}" class="w-10 h-10 object-cover rounded flex-shrink-0">
                                        <div>
                                            <p class="text-gray-700 truncate w-40">{{ $item['nama'] }}</p>
                                            <p class="text-xs text-gray-500">Qty: {{ $item['kuantitas'] }}</p>
                                        </div>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $item['harga_tampil'] }}</span>
                                </div>
                                @endforeach
                            </div>

                             {{-- Detail Biaya --}}
                            <div class="space-y-2 text-sm border-t pt-4">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span id="checkout-subtotal" class="font-medium text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ongkos Kirim</span>
                                    <span id="checkout-shipping" class="font-medium text-gray-800">Rp {{ number_format($ongkir, 0, ',', '.') }}</span> {{-- Akan diupdate JS --}}
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Biaya Layanan</span>
                                    <span id="checkout-service" class="font-medium text-gray-800">Rp {{ number_format($biaya_layanan, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between border-t pt-3 mt-2">
                                    <span class="text-lg font-semibold text-gray-800">Total</span>
                                    <span id="checkout-total" class="text-lg font-semibold text-gray-800">Rp {{ number_format($total, 0, ',', '.') }}</span> {{-- Akan diupdate JS --}}
                                </div>
                            </div>

                            {{-- Tombol Buat Pesanan --}}
                            <button type="submit" class="mt-6 w-full bg-black text-white py-3 px-6 rounded-lg font-semibold text-center hover:bg-gray-800 transition duration-300 disabled:opacity-50">
                                Buat Pesanan
                            </button>
                             <p class="text-xs text-gray-500 mt-3 text-center">Dengan membuat pesanan, Anda menyetujui Syarat & Ketentuan kami.</p>
                        </div>
                    </aside>

                </div>
            </form>

        </div>
    </div>

     @push('scripts')
        <script>
            // Fungsi format angka ke Rupiah
            function formatRupiah(number) {
                // Pastikan number adalah angka
                 if (isNaN(number)) {
                     return 'Rp -';
                 }
                return 'Rp ' + number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            // Fungsi update ringkasan checkout berdasarkan pilihan pengiriman
            function updateCheckoutSummary() {
                const subtotal = {{ $subtotal }}; // Ambil subtotal dari PHP
                const serviceFee = {{ $biaya_layanan }}; // Ambil biaya layanan dari PHP
                let shippingCost = 0;

                 // Dapatkan biaya pengiriman yang dipilih
                const selectedShipping = document.querySelector('input[name="shipping_method"]:checked');
                if (selectedShipping) {
                    shippingCost = parseFloat(selectedShipping.dataset.cost);
                }

                const total = subtotal + shippingCost + serviceFee;

                // Update elemen di ringkasan
                 const subtotalElement = document.getElementById('checkout-subtotal');
                const shippingElement = document.getElementById('checkout-shipping');
                 const serviceElement = document.getElementById('checkout-service'); // Jika ada
                const totalElement = document.getElementById('checkout-total');

                 if (subtotalElement) subtotalElement.textContent = formatRupiah(subtotal);
                if (shippingElement) shippingElement.textContent = formatRupiah(shippingCost);
                 if (serviceElement) serviceElement.textContent = formatRupiah(serviceFee); // Tampilkan biaya layanan
                if (totalElement) totalElement.textContent = formatRupiah(total);
            }

             // Fungsi untuk menampilkan/menyembunyikan detail Kartu Kredit
            function handlePaymentMethodChange() {
                 const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
                const ccDetailsDiv = document.getElementById('cc-details');
                let isCCSelected = false;

                paymentMethods.forEach(radio => {
                    if (radio.checked && radio.value === 'cc') {
                        isCCSelected = true;
                    }
                     // Tambahkan event listener ke setiap radio button pembayaran
                     radio.addEventListener('change', handlePaymentMethodChange);
                });

                 if (ccDetailsDiv) {
                    if (isCCSelected) {
                        ccDetailsDiv.classList.remove('hidden');
                    } else {
                         ccDetailsDiv.classList.add('hidden');
                    }
                 }
            }

             // Panggil fungsi saat halaman dimuat & saat ada perubahan
            document.addEventListener('DOMContentLoaded', () => {
                updateCheckoutSummary(); // Hitung total awal saat load
                handlePaymentMethodChange(); // Cek metode pembayaran awal & tambahkan listener
            });
        </script>
     @endpush

@endsection
