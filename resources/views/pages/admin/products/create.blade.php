@extends('layouts.admin')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <a href="/admin/products" class="text-gray-600 hover:text-black">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-black">Tambah Produk Baru</h1>
            </div>
            <p class="text-gray-600">Tambahkan produk baru ke toko Anda</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <form method="POST" action="/admin/products" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price and Stock -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" min="0" step="100" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock') }}" min="0" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category_id" name="category_id" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Images -->
                <div>
                    <label for="images" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk</label>
                    <input type="file" id="images" name="images[]" multiple accept="image/*" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black">
                    <p class="mt-1 text-sm text-gray-500">Pilih satu atau lebih gambar (maksimal 2MB per gambar)</p>
                    @error('images')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Produk aktif (dapat dilihat pelanggan)
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="/admin/products" 
                       class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-400 transition duration-300">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-black text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
