@extends('admin.admin')

@section('title', 'Users')

@section('content')
<div class="flex-1 p-6">
    <!-- Search and Filter Controls -->
    <div class="flex items-center justify-between mb-4">
        <!-- Search Bar -->
        <div class="relative w-2/3">
            <input
                type="text"
                id="searchInput"
                placeholder="Search for users..."
                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none"
            />
            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Filters -->
        <div class="flex items-center space-x-4">
            <!-- Role Filter -->
            <div>
                <label for="roleFilter" class="text-gray-600 font-medium">Role:</label>
                <select
                    id="roleFilter"
                    class="px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-600"
                >
                    <option value="all" selected>All</option>
                    <option value="artist">Artist</option>
                    <option value="buyer">Buyer</option>
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label for="statusFilter" class="text-gray-600 font-medium">Status:</label>
                <select
                    id="statusFilter"
                    class="px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-600"
                >
                    <option value="all" selected>All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-indigo-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">
                        <input type="checkbox" />
                    </th>
                    <th class="px-6 py-3 text-left font-semibold">Name</th>
                    <th class="px-6 py-3 text-left font-semibold">Phone</th>
                    <th class="px-6 py-3 text-left font-semibold">Role</th>
                    <th class="px-6 py-3 text-left font-semibold">Status</th>
                    <th class="px-6 py-3 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Example User Rows -->
                <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <img
                            src="https://placehold.co/40x40"
                            alt="Avatar"
                            class="w-10 h-10 rounded-full mr-3"
                        />
                        <div>
                            <p class="font-semibold text-gray-800">Neil Sims</p>
                            <p class="text-gray-500">neil.sims@flowbite.com</p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500">+62877446345</td>
                    <td class="px-6 py-4 text-gray-500">ARTIST</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full"
                        >
                            Active
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                            Deactive Account
                        </button>
                    </td>
                </tr>
                <!-- Repeat for additional users -->
                <td class="px-6 py-4">
                        <input type="checkbox" />
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <img
                            src="https://placehold.co/40x40"
                            alt="Avatar"
                            class="w-10 h-10 rounded-full mr-3"
                        />
                        <div>
                            <p class="font-semibold text-gray-800">Cacaoooo</p>
                            <p class="text-gray-500">cacao@email.com</p>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500">+62877446345</td>
                    <td class="px-6 py-4 text-gray-500">BUYER</td>
                    <td class="px-6 py-4">
                        <span
                            class="inline-flex items-center px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full"
                        >
                            Inactive
                        </span>
                    </td>
                    <td class="px-6 py-4 flex space-x-2">
                        <button class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">
                            Active Account
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50 flex justify-between items-center">
            <p class="text-sm text-gray-500">Showing 1-10 of 50</p>
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
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const roleFilter = document.getElementById('roleFilter');
    const statusFilter = document.getElementById('statusFilter');
    const rows = document.querySelectorAll('#userTableBody tr');

    // Filter Logic
    function filterTable() {
        const searchText = searchInput.value.toLowerCase();
        const role = roleFilter.value;
        const status = statusFilter.value;

        rows.forEach(row => {
            const name = row.children[1].textContent.toLowerCase();
            const email = row.children[1].querySelector('p.text-gray-500').textContent.toLowerCase();
            const rowRole = row.dataset.role;
            const rowStatus = row.dataset.status;

            const matchesSearch = name.includes(searchText) || email.includes(searchText);
            const matchesRole = role === 'all' || rowRole === role;
            const matchesStatus = status === 'all' || rowStatus === status;

            row.style.display = matchesSearch && matchesRole && matchesStatus ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    roleFilter.addEventListener('change', filterTable);
    statusFilter.addEventListener('change', filterTable);
</script>

@endsection
