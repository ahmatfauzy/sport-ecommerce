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
                    @php
                        $orders = [
                            ['id' => 'ORD-001', 'customer' => 'Budi Santoso', 'items' => 3, 'total' => 2450000, 'status' => 'pending', 'date' => '2024-01-20'],
                            ['id' => 'ORD-002', 'customer' => 'Citra Lestari', 'items' => 1, 'total' => 1899000, 'status' => 'processing', 'date' => '2024-01-19'],
                            ['id' => 'ORD-003', 'customer' => 'Ahmad Yusuf', 'items' => 2, 'total' => 800000, 'status' => 'shipped', 'date' => '2024-01-18'],
                            ['id' => 'ORD-004', 'customer' => 'Sari Dewi', 'items' => 4, 'total' => 1200000, 'status' => 'delivered', 'date' => '2024-01-17'],
                            ['id' => 'ORD-005', 'customer' => 'Rudi Hartono', 'items' => 1, 'total' => 550000, 'status' => 'cancelled', 'date' => '2024-01-16'],
                        ];
                    @endphp
                    
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $order['id'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $order['customer'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['items'] }} items</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($order['total'], 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'processing' => 'bg-blue-100 text-blue-800',
                                    'shipped' => 'bg-purple-100 text-purple-800',
                                    'delivered' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$order['status']] }}">
                                {{ ucfirst($order['status']) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button onclick="viewOrder('{{ $order['id'] }}')" class="text-blue-600 hover:text-blue-900 mr-3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="updateOrderStatus('{{ $order['id'] }}')" class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
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
