@extends('layouts.admin')

@section('content')
<div class="bg-gray-100 pt-2 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-black">Kelola Kategori</h1>
                <p class="text-gray-600">Kelola semua kategori produk</p>
            </div>
            <button onclick="openCreateModal()"
                class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">
                + Tambah Kategori
            </button>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif

        <!-- Categories Table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($categories as $category)
                        <tr class="hover:bg-gray-50" id="category-row-{{ $category->id }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-16 h-16 rounded-lg overflow-hidden">
                                    @if($category->image_url)
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                                    @else
                                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400">No image</span>
                                    </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $category->slug }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">{{ $category->products_count }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-500">{{ $category->created_at->format('d M Y') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button onclick="openEditModal({{ $category->id }}, '{{ $category->name }}', '{{ $category->slug }}')"
                                        class="text-blue-600 hover:text-blue-900">Edit</button>
                                    <button onclick="deleteCategory({{ $category->id }})"
                                        class="text-red-600 hover:text-red-900">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <p>Belum ada kategori</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create/Edit Category -->
<div id="categoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 id="modalTitle" class="text-lg font-medium text-gray-900">Add New Category</h3>
            </div>

            <form id="categoryForm" class="p-6" action="/admin/categories" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" id="categoryName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>

                <div class="mb-4">
                    <label for="categorySlug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="categorySlug" name="slug" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                    <p class="text-xs text-gray-500 mt-1">Slug akan otomatis dibuat dari nama</p>
                </div>

                <div class="mb-6">
                    <label for="categoryImage" class="block text-sm font-medium text-gray-700 mb-2">Gambar Kategori</label>
                    <div class="mt-1 flex items-center">
                        <div id="imagePreview" class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 mr-4 hidden">
                            <img id="previewImg" src="" alt="Preview" class="w-full h-full object-cover">
                        </div>
                        <label class="w-full flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer hover:border-gray-400">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <span class="relative bg-white rounded-md font-medium text-black hover:text-gray-900">
                                        Upload gambar
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                            </div>
                            <input id="categoryImage" name="image" type="file" class="sr-only" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let editingCategoryId = null;

    function openCreateModal() {
        editingCategoryId = null;
        document.getElementById('modalTitle').textContent = 'Tambah Kategori Baru';
        document.getElementById('categoryForm').reset();
        document.getElementById('categoryForm').action = '/admin/categories';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('previewImg').src = '';
        document.getElementById('categoryModal').classList.remove('hidden');
    }

    function openEditModal(id, name, slug) {
        editingCategoryId = id;
        document.getElementById('modalTitle').textContent = 'Edit Kategori';
        document.getElementById('categoryName').value = name;
        document.getElementById('categorySlug').value = slug;
        document.getElementById('categoryForm').action = `/admin/categories/${id}`;
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('categoryModal').classList.remove('hidden');

        // Check if category has an image and show preview
        const categoryImage = document.querySelector(`#category-row-${id} img`);
        if (categoryImage && categoryImage.src) {
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('previewImg').src = categoryImage.src;
        } else {
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('previewImg').src = '';
        }
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.add('hidden');
        editingCategoryId = null;
    }

    function deleteCategory(id) {
        if (!confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
            return;
        }

        fetch(`/admin/categories/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                // Ensure cookies (session) are sent so Auth::check() works for AJAX
                credentials: 'same-origin'
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw data;
                    });
                }
                return response.json().catch(() => ({
                    success: true
                }));
            })
            .then(data => {
                if (data.success) {
                    document.getElementById(`category-row-${id}`).remove();
                    alert('Kategori berhasil dihapus');
                } else {
                    alert('Gagal menghapus kategori');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan');
            });
    }

    // Auto-generate slug from name
    document.getElementById('categoryName').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        document.getElementById('categorySlug').value = slug;
    });

    // Handle form submission
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const action = form.action;
        const formData = new FormData(form);
        // send as POST so PHP can parse multipart/form-data. The _method hidden field
        // will tell Laravel to treat it as PUT when editing.
        const fetchMethod = 'POST';

        fetch(action, {
                method: fetchMethod,
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.json().catch(() => ({
                        success: true
                    }));
                }
                return response.json().then(data => {
                    throw data;
                });
            })
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || 'Gagal menyimpan kategori');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert((error && error.message) || 'Terjadi kesalahan');
            });
    });

    // Handle image preview
    document.getElementById('categoryImage').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').classList.remove('hidden');
                document.getElementById('previewImg').src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('previewImg').src = '';
        }
    });

    // Close modal when clicking outside
    document.getElementById('categoryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endpush
@endsection