<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-white font-sans text-gray-900">

<!-- Page Container -->
<div class="max-w-7xl mx-auto py-6 px-4 bg-white rounded-lg shadow">

        <!-- Back Button -->
        <div class="mb-4">
                <a href="javascript:history.back()" 
                class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-800 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back
                </a>
        </div>

        <!-- Header Section -->
        <div class="pb-4 border-b mb-4">
            <h3 class="text-2xl font-bold text-gray-800">📦 Order Status</h3>
            <p class="text-sm text-gray-500">Manage and update the delivery status of your orders below.</p>
        </div>
    
        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-4">
            <!-- Search Bar -->
            <div class="w-full md:w-2/3">
                <input id="searchInput" 
                       type="text" 
                       placeholder="Search by order ID, buyer, or art name..." 
                       class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            </div>
    
            <!-- Filter Dropdown -->
            <div class="w-full md:w-1/3 flex items-center md:justify-end">
                <label for="statusFilter" class="text-gray-600 font-medium mr-2">Filter by Status:</label>
                <select id="statusFilter" 
                        class="px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-700">
                    <option value="all">All</option>
                    <option value="packed">Packed</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
    
        <!-- Table for Orders -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="border-b bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold">Order ID</th>
                        <th class="px-6 py-3 text-left font-semibold">Buyer</th>
                        <th class="px-6 py-3 text-left font-semibold">Date</th>
                        <th class="px-6 py-3 text-left font-semibold">Art Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Price</th>
                        <th class="px-6 py-3 text-left font-semibold">Address</th>
                        <th class="px-6 py-3 text-left font-semibold">Payment Method</th>
                        <th class="px-6 py-3 text-center font-semibold">Status</th>
                        <th class="px-6 py-3 text-center font-semibold">Update</th>
                    </tr>
                </thead>
    
                <tbody>
                    <!-- Example Packed -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-800">#12345</td>
                        <td class="px-6 py-4">John Doe<br><span class="text-sm text-gray-500">john@example.com</span></td>
                        <td class="px-6 py-4">June 17, 2024</td>
                        <td class="px-6 py-4">Custom Portrait</td>
                        <td class="px-6 py-4">Rp 500,000</td>
                        <td class="px-6 py-4">Bintaro, Brune, Kemang, 67412</td>
                        <td class="px-6 py-4">Bank Transfer</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">Packed</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex space-x-2 items-center justify-center">
                                <select class="px-3 py-1 border rounded-md focus:ring-2 focus:ring-indigo-500">
                                    <option value="packed" selected>Packed</option>
                                    <option value="shipped">Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                                    Update
                                </button>
                            </div>
                        </td>
                    </tr>
    
                    <!-- Example Shipped -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-800">#12346</td>
                        <td class="px-6 py-4">Jane Smith<br><span class="text-sm text-gray-500">jane@example.com</span></td>
                        <td class="px-6 py-4">June 17, 2024</td>
                        <td class="px-6 py-4">Landscape Art</td>
                        <td class="px-6 py-4">Rp 750,000</td>
                        <td class="px-6 py-4">456 Creative St, Bandung, Indonesia</td>
                        <td class="px-6 py-4">Bank Transfer</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-2 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">Shipped</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex space-x-2 items-center justify-center">
                                <select class="px-3 py-1 border rounded-md focus:ring-2 focus:ring-indigo-500">
                                    <option value="packed">Packed</option>
                                    <option value="shipped" selected>Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                                    Update
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Example Delivered -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-800">#12346</td>
                        <td class="px-6 py-4">Jane Smith<br><span class="text-sm text-gray-500">jane@example.com</span></td>
                        <td class="px-6 py-4">+62 813 6789 1234</td>
                        <td class="px-6 py-4">Landscape Art</td>
                        <td class="px-6 py-4">Rp 750,000</td>
                        <td class="px-6 py-4">456 Creative St, Bandung, Indonesia</td>
                        <td class="px-6 py-4">Cash On Delivery</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Delivered</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex space-x-2 items-center justify-center">
                                <select class="px-3 py-1 border rounded-md focus:ring-2 focus:ring-indigo-500">
                                    <option value="packed">Packed</option>
                                    <option value="shipped" >Shipped</option>
                                    <option value="delivered"selected>Delivered</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                                <button class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                                    Update
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Example Cancelled -->
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-800">#12346</td>
                        <td class="px-6 py-4">Jane Smith<br><span class="text-sm text-gray-500">jane@example.com</span></td>
                        <td class="px-6 py-4">+62 813 6789 1234</td>
                        <td class="px-6 py-4">Landscape Art</td>
                        <td class="px-6 py-4">Rp 750,000</td>
                        <td class="px-6 py-4">456 Creative St, Bandung, Indonesia</td>
                        <td class="px-6 py-4">Cash On Delivery</td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Cancelled</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex space-x-2 items-center justify-center">
                                <select class="px-3 py-1 border rounded-md focus:ring-2 focus:ring-indigo-500">
                                    <option value="packed">Packed</option>
                                    <option value="shipped" >Shipped</option>
                                    <option value="delivered">Delivered</option>
                                    <option value="cancelled"selected>Cancelled</option>
                                </select>
                                <button class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                                    Update
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
                <p class="text-sm text-gray-500">Showing 1-2 of 2</p>
                <div class="flex space-x-2">
                <button class="px-3 py-1 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                        Previous
                </button>
                <button class="px-3 py-1 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                        Next
                </button>
                </div>
        </div>
    </div>
</body>
    
