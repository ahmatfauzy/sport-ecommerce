@extends('layouts.app')

@section('content')
    {{-- Dummy Data untuk Profil Pengguna --}}
    @php
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
            // Data lain bisa ditambahkan sesuai kebutuhan
        ];
        // Dummy data untuk riwayat pesanan (contoh sederhana)
        $orderHistory = [
            ['id' => 'ORD123', 'tanggal' => '20 Okt 2025', 'total' => 'Rp 1.899.000', 'status' => 'Dikirim'],
            ['id' => 'ORD115', 'tanggal' => '15 Sep 2025', 'total' => 'Rp 550.000', 'status' => 'Selesai'],
        ];
    @endphp

    {{-- Container utama halaman profil --}}
    <div class="bg-gray-100 pt-24 pb-16"> {{-- Padding top untuk navbar fixed --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <header class="mb-8" data-aos="fade-down">
                <h1 class="text-4xl font-bold text-gray-800">Profil Saya</h1>
                <p class="mt-2 text-lg text-gray-600">Kelola informasi akun dan lihat riwayat pesanan Anda.</p>
            </header>

            {{-- Layout Utama: Sidebar Navigasi + Konten Profil --}}
            <div class="lg:grid lg:grid-cols-4 lg:gap-8 items-start">

                {{-- Sidebar Navigasi Profil (Kolom 1) - Opsional, bisa diganti tab --}}
                <aside class="lg:col-span-1 mb-8 lg:mb-0" data-aos="fade-right">
                    <div class="bg-white p-4 rounded-lg shadow-md sticky top-24">
                        <nav class="space-y-1">
                            <a href="#info-pribadi" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                                <!-- Ikon User -->
                                <svg class="w-5 h-5 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                Info Pribadi
                            </a>
                            <a href="#alamat-pengiriman" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                                <!-- Ikon Lokasi -->
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                Alamat Pengiriman
                            </a>
                            <a href="#riwayat-pesanan" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                                <!-- Ikon Riwayat -->
                                <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                                Riwayat Pesanan
                            </a>
                             <a href="#ubah-password" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                                <!-- Ikon Kunci -->
                               <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" /></svg>
                                Ubah Password
                            </a>
                            <a href="/logout" class="group flex items-center px-3 py-2 text-sm font-medium rounded-md text-red-600 hover:bg-red-50 hover:text-red-800 transition">
                                <!-- Ikon Logout -->
                                <svg class="w-5 h-5 mr-3 text-red-500 group-hover:text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" /></svg>
                                Logout
                            </a>
                        </nav>
                    </div>
                </aside>

                {{-- Konten Utama Profil (Kolom 2-4) --}}
                <main class="lg:col-span-3 space-y-8">

                    {{-- Bagian Info Pribadi --}}
                    <section id="info-pribadi" class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Informasi Pribadi</h2>
                        <form action="#" method="POST" class="space-y-4">
                             @csrf {{-- Penting untuk form Laravel --}}
                             @method('PUT') {{-- Biasanya untuk update --}}
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" value="{{ $user['nama'] }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                                <input type="email" id="email" name="email" value="{{ $user['email'] }}" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-100 text-gray-500 sm:text-sm cursor-not-allowed">
                                <p class="mt-1 text-xs text-gray-500">Email tidak dapat diubah.</p>
                            </div>
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                <input type="tel" id="telepon" name="telepon" value="{{ $user['telepon'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#3a3a3a] text-white rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 text-sm">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </section>

                    {{-- Bagian Alamat Pengiriman --}}
                    <section id="alamat-pengiriman" class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="100">
                         <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Alamat Pengiriman Utama</h2>
                         <form action="#" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                             <div>
                                <label for="jalan" class="block text-sm font-medium text-gray-700">Alamat Jalan</label>
                                <input type="text" id="jalan" name="jalan" value="{{ $user['alamat']['jalan'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                             <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                <div>
                                    <label for="kota" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                                    <input type="text" id="kota" name="kota" value="{{ $user['alamat']['kota'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                </div>
                                <div>
                                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                    <input type="text" id="provinsi" name="provinsi" value="{{ $user['alamat']['provinsi'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                </div>
                                <div>
                                    <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                                    <input type="text" id="kode_pos" name="kode_pos" value="{{ $user['alamat']['kode_pos'] ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                                </div>
                            </div>
                             <div class="text-right">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#3a3a3a] text-white rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 text-sm">
                                    Simpan Alamat
                                </button>
                            </div>
                         </form>
                    </section>

                    {{-- Bagian Riwayat Pesanan --}}
                    <section id="riwayat-pesanan" class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="200">
                         <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Riwayat Pesanan</h2>
                         @if (count($orderHistory) > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Detail</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($orderHistory as $order)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order['id'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['tanggal'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['total'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                    {{-- Logika badge status --}}
                                                    @if($order['status'] == 'Dikirim')
                                                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $order['status'] }}</span>
                                                    @elseif($order['status'] == 'Selesai')
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $order['status'] }}</span>
                                                    @else
                                                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">{{ $order['status'] }}</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="#" class="text-black hover:underline">Detail</a> {{-- Ganti href dengan link detail order --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                         @else
                            <p class="text-gray-500 text-center">Anda belum memiliki riwayat pesanan.</p>
                         @endif
                    </section>

                     {{-- Bagian Ubah Password --}}
                    <section id="ubah-password" class="bg-white p-6 rounded-lg shadow-md" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Ubah Password</h2>
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini</label>
                                <input type="password" id="current_password" name="current_password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                             <div>
                                <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                                <input type="password" id="new_password" name="new_password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                             <div>
                                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-black focus:ring-black sm:text-sm">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#3a3a3a] text-white rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 text-sm">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </section>

                </main>
            </div>
        </div>
    </div>
@endsection
