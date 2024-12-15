@extends('admin.admin')

@section('title', 'Category')

@section('content')
<div class="flex-1 p-6">

    <!-- Top Section: Button and Search -->
    <div class="flex justify-between items-center mb-4">
        <!-- Add New Category Button -->
        <div>
            <button id="openModalButton" class="px-4 py-2 bg-indigo-600 text-white font-medium rounded-md hover:bg-indigo-700">
                Add new category
            </button>
        </div>

        <!-- Search Bar -->
        <div class="flex-1 max-w-md">
            <input
                type="text"
                placeholder="Search for categories..."
                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none"
            />
        </div>
    </div>

    <!-- Category Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-indigo-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">
                        <input type="checkbox" />
                    </th>
                    <th class="px-6 py-3 text-left font-semibold">Category Art Name</th>
                    <th class="px-6 py-3 text-left font-semibold">Number of Artworks</th>
                    <th class="px-6 py-3 text-left font-semibold">Created Date</th>
                    <th class="px-6 py-3 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Example Row -->
                <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Painting</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                    <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Poster Design</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                    <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Abstract</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                    <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Cotemporary</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                    <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Illustration</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                    <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 text-gray-800 font-medium">Logo</td>
                    <td class="px-6 py-4 text-gray-600">2</td>
                    <td class="px-6 py-4 text-gray-600">25-12-2024</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600 flex items-center">
                            <i class="fas fa-trash-alt mr-1"></i> Delete 
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
            <p class="text-sm text-gray-500">Showing 1-20 of 2290</p>
            <div class="flex space-x-2">
                <button class="px-3 py-1 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                    &larr; Previous
                </button>
                <button class="px-3 py-1 bg-gray-200 text-gray-600 rounded-md hover:bg-gray-300">
                    Next &rarr;
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Adding Category -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-sm">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Add New Category</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-red-600 text-2xl focus:outline-none">
                &times;
            </button>
        </div>

        <!-- Modal Form -->
        <form action="#" method="POST">
            <div class="mb-6">
                <label for="category-name" class="block text-sm font-medium text-gray-700 mb-2">
                    Category Name
                </label>
                <input
                    type="text"
                    id="category-name"
                    name="category_name"
                    placeholder="Enter category name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    required
                />
            </div>

            <!-- Modal Actions -->
            <div class="flex justify-end space-x-3">
                <button type="button" id="cancelButton" class="px-4 py-2 text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    const openModalButton = document.getElementById('openModalButton');
    const closeModalButton = document.getElementById('closeModalButton');
    const cancelButton = document.getElementById('cancelButton');
    const modal = document.getElementById('modal');

    // Open Modal
    openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Close Modal
    closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    cancelButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close modal if clicking outside content
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>
@endsection
