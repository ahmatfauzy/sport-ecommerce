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

            <form id="categoryForm" class="p-6" action="/admin/categories" method="POST">
                @csrf
                <input type="hidden" id="formMethod" name="_method" value="POST">
                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" id="categoryName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black" required>
                </div>

                <div class="mb-6">
                    <label for="categorySlug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="categorySlug" name="slug" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-black">
                    <p class="text-xs text-gray-500 mt-1">Slug akan otomatis dibuat dari nama</p>
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

    // Close modal when clicking outside
    document.getElementById('categoryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endpush
@endsection