@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Orders Management</h1>
            <p class="text-gray-600 mt-1">Manage customer orders</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" placeholder="Order ID or Customer..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex items-end">
                <button class="w-full bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md">
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Table Orders -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- TODO: Replace with actual orders from database --}}
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <p class="text-lg font-medium text-gray-900 mb-2">Belum ada pesanan</p>
                                <p class="text-gray-600">Pesanan pelanggan akan muncul di sini</p>
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

<!-- Modal Order Detail -->
<div id="orderDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Order Details</h3>
            </div>
            
            <div class="p-6">
                <!-- Order Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Order Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order ID:</span>
                                <span class="font-medium">ORD-001</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Order Date:</span>
                                <span class="font-medium">2024-01-20</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Status:</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">Pending</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-medium text-gray-900 mb-3">Customer Information</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Name:</span>
                                <span class="font-medium">Budi Santoso</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Email:</span>
                                <span class="font-medium">budi@example.com</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Phone:</span>
                                <span class="font-medium">081234567890</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Address -->
                <div class="mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-3">Shipping Address</h4>
                    <div class="bg-gray-50 p-4 rounded-lg text-sm">
                        <p class="font-medium">Budi Santoso</p>
                        <p>Jl. Merdeka 123, Jakarta</p>
                        <p>081234567890</p>
                    </div>
                </div>
                
                <!-- Order Items -->
                <div class="mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-3">Order Items</h4>
                    <div class="space-y-3">
                        @php
                            $orderItems = [
                                ['name' => 'Nike Air Zoom Pegasus 39', 'qty' => 1, 'price' => 1899000],
                                ['name' => 'Jersey Basket Pro DryFit', 'qty' => 2, 'price' => 450000],
                            ];
                        @endphp
                        
                        @foreach($orderItems as $item)
                        <div class="flex justify-between items-center bg-gray-50 p-3 rounded-lg">
                            <div>
                                <p class="font-medium">{{ $item['name'] }}</p>
                                <p class="text-sm text-gray-600">Qty: {{ $item['qty'] }}</p>
                            </div>
                            <p class="font-medium">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="border-t pt-4">
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">Rp 2.799.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-medium">Rp 15.000</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold border-t pt-2">
                            <span>Total:</span>
                            <span>Rp 2.814.000</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button onclick="closeOrderModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                    Close
                </button>
                <button onclick="updateOrderStatus('ORD-001')" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Update Status
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Status -->
<div id="statusModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Update Order Status</h3>
            </div>
            
            <form id="statusForm" class="p-6">
                <div class="mb-4">
                    <label for="orderStatus" class="block text-sm font-medium text-gray-700 mb-2">New Status</label>
                    <select id="orderStatus" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                
                <div class="mb-6">
                    <label for="statusNote" class="block text-sm font-medium text-gray-700 mb-2">Note (Optional)</label>
                    <textarea id="statusNote" name="note" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Add a note about this status change..."></textarea>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeStatusModal()" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Status
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let currentOrderId = null;

    function viewOrder(orderId) {
        currentOrderId = orderId;
        document.getElementById('orderDetailModal').classList.remove('hidden');
    }

    function closeOrderModal() {
        document.getElementById('orderDetailModal').classList.add('hidden');
        currentOrderId = null;
    }

    function updateOrderStatus(orderId) {
        currentOrderId = orderId;
        document.getElementById('statusModal').classList.remove('hidden');
    }

    function closeStatusModal() {
        document.getElementById('statusModal').classList.add('hidden');
        currentOrderId = null;
    }

    // Handle status form submission
    document.getElementById('statusForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const data = Object.fromEntries(formData);
        
        console.log('Update order status:', currentOrderId, data);
        // Implement update functionality
        
        closeStatusModal();
        closeOrderModal();
    });

    // Close modals when clicking outside
    document.getElementById('orderDetailModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeOrderModal();
        }
    });

    document.getElementById('statusModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeStatusModal();
        }
    });
</script>
@endpush
@endsection
