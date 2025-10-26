@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header dengan tombol tambah -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Products Management</h1>
            <p class="text-gray-600 mt-1">Manage product inventory</p>
        </div>
        <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Product
        </button>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    <option value="1">Sepatu Lari</option>
                    <option value="2">Sepatu Basket</option>
                    <option value="3">Pakaian Olahraga</option>
                    <option value="4">Aksesoris</option>
                    <option value="5">Alat Fitness</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" placeholder="Search products..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-end">
                <button class="w-full bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Table Products -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- TODO: Replace with actual products from database --}}
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-lg font-medium text-gray-900 mb-2">Belum ada produk</p>
                                <p class="text-gray-600 mb-4">Mulai dengan menambahkan produk pertama Anda</p>
                                <button onclick="openCreateModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Produk Pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center">
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <i class="fas fa-chevron-right"></i>
            </a>
        </nav>
    </div>
</div>

<!-- Modal Create/Edit Product -->
<div id="productModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-screen overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 id="modalTitle" class="text-lg font-medium text-gray-900">Add New Product</h3>
            </div>
            
            <form id="productForm" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label for="productName" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                        <input type="text" id="productName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="productCategory" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Select Category</option>
                            <option value="1">Sepatu Lari</option>
                            <option value="2">Sepatu Basket</option>
                            <option value="3">Pakaian Olahraga</option>
                            <option value="4">Aksesoris</option>
                            <option value="5">Alat Fitness</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="productPrice" class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                        <input type="number" id="productPrice" name="price" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="productStock" class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                        <input type="number" id="productStock" name="stock" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div>
                        <label for="productStatus" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="productStatus" name="is_active" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-4">
                    <label for="productDescription" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="productDescription" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                
                <div class="mt-4">
                    <label for="productImages" class="block text-sm font-medium text-gray-700 mb-2">Images</label>
                    <input type="file" id="productImages" name="images[]" multiple accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <p class="text-xs text-gray-500 mt-1">You can select multiple images</p>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let editingProductId = null;

    function openCreateModal() {
        editingProductId = null;
        document.getElementById('modalTitle').textContent = 'Add New Product';
        document.getElementById('productForm').reset();
        document.getElementById('productModal').classList.remove('hidden');
    }

    function openEditModal(id) {
        editingProductId = id;
        document.getElementById('modalTitle').textContent = 'Edit Product';
        // You can populate form fields here with product data
        document.getElementById('productModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('productModal').classList.add('hidden');
        editingProductId = null;
    }

    function deleteProduct(id) {
        if (confirm('Are you sure you want to delete this product?')) {
            console.log('Delete product:', id);
            // Implement delete functionality
        }
    }

    // Handle form submission
    document.getElementById('productForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        
        if (editingProductId) {
            console.log('Update product:', editingProductId, data);
            // Implement update functionality
        } else {
            console.log('Create product:', data);
            // Implement create functionality
        }
        
        closeModal();
    });

    // Close modal when clicking outside
    document.getElementById('productModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>
@endpush

@endsection