@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header dengan tombol tambah -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Categories Management</h1>
            <p class="text-gray-600 mt-1">Manage product categories</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Category
        </button>
    </div>

    <!-- Table Categories -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products Count</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- TODO: Replace with actual categories from database --}}
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <p class="text-lg font-medium text-gray-900 mb-2">Belum ada kategori</p>
                                <p class="text-gray-600 mb-4">Mulai dengan menambahkan kategori pertama Anda</p>
                                <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Kategori Pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            
            <form id="categoryForm" class="p-6">
                <div class="mb-4">
                    <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" id="categoryName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div class="mb-6">
                    <label for="categorySlug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" id="categorySlug" name="slug" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <p class="text-xs text-gray-500 mt-1">URL-friendly version of the name</p>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Save Category
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
        document.getElementById('modalTitle').textContent = 'Add New Category';
        document.getElementById('categoryForm').reset();
        document.getElementById('categoryModal').classList.remove('hidden');
    }

    function openEditModal(id, name, slug) {
        editingCategoryId = id;
        document.getElementById('modalTitle').textContent = 'Edit Category';
        document.getElementById('categoryName').value = name;
        document.getElementById('categorySlug').value = slug;
        document.getElementById('categoryModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.add('hidden');
        editingCategoryId = null;
    }

    function deleteCategory(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            // Implement delete functionality
            console.log('Delete category:', id);
            // You can add AJAX call here to delete the category
        }
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
        
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        
        if (editingCategoryId) {
            console.log('Update category:', editingCategoryId, data);
            // Implement update functionality
        } else {
            console.log('Create category:', data);
            // Implement create functionality
        }
        
        closeModal();
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
