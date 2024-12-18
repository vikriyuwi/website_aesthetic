@extends('admin.admin')

@section('title', 'Contact Us Submissions')

@section('content')
<div class="flex-1 p-6">
    <!-- Search and Filter Controls -->
    <div class="flex items-center justify-between mb-4">
        <!-- Search Bar -->
        <div class="relative">
            <input
                type="text"
                id="searchInput"
                placeholder="Search submissions..."
                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-indigo-400 focus:outline-none mr-4"
            />
            <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>

        <!-- Filter Dropdown -->
        <div class="flex items-center space-x-2">
            <span class="text-gray-600 font-medium">Filter:</span>
            <select
                id="filterStatus"
                class="px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-gray-600"
            >
                <option value="all" selected>All</option>
                <option value="contact">Contact</option>
                <option value="done">Done</option>
            </select>
        </div>
    </div>

    <!-- Contact Us Submissions Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm">
            <thead class="bg-indigo-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold">#</th>
                    <th class="px-6 py-3 text-left font-semibold">Full Name</th>
                    <th class="px-6 py-3 text-left font-semibold">Email</th>
                    <th class="px-6 py-3 text-left font-semibold">Phone</th>
                    <th class="px-6 py-3 text-center font-semibold">Actions</th>
                    <th class="px-6 py-3 text-center font-semibold">Date & Time</th>
                    <th class="px-6 py-3 text-center font-semibold">Status</th>
                </tr>
            </thead>

            <tbody id="contactTableBody" class="divide-y divide-gray-200">
                <!-- Dummy Data Row 1 -->
                <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Chantikka Riffka</td>
                    <td class="px-6 py-4 text-gray-600">cacabuyer@email.com</td>
                    <td class="px-6 py-4 text-gray-600">082456773435</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.contact.view', ['id' => 1]) }}" class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                            <i class="fas fa-eye mr-1"></i> View
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center text-gray-600">
                        <span>June 17, 2024</span><br>
                        <span class="text-sm text-gray-500">10:30 AM</span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="#" class="px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Contact
                        </a>
                    </td>
                </tr>

                <!-- Dummy Data Row 2 -->
                <tr class="hover:bg-indigo-50">
                    <td class="px-6 py-4">2</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Cacaoo</td>
                    <td class="px-6 py-4 text-gray-600">caca@email.com</td>
                    <td class="px-6 py-4 text-gray-600">081245678876</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.contact.view', ['id' => 2]) }}" class="px-3 py-1 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                            <i class="fas fa-eye mr-1"></i> View
                        </a>
                    </td>
                    <td class="px-6 py-4 text-center text-gray-600">
                        <span>June 17, 2024</span><br>
                        <span class="text-sm text-gray-500">11:00 AM</span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="#" class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600">
                            Done
                        </a>
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

<!-- JavaScript for Filtering -->
<script>
    const filterSelect = document.getElementById('filterStatus');
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#contactTableBody tr');

    // Filter Rows by Status (Check Text Content of Buttons)
    filterSelect.addEventListener('change', () => {
        const filter = filterSelect.value.toLowerCase();

        tableRows.forEach(row => {
            const statusButton = row.querySelector('td:last-child a');
            const statusText = statusButton.textContent.trim().toLowerCase();

            row.style.display = (filter === 'all' || statusText === filter) ? '' : 'none';
        });
    });

    // Search Rows by Name or Email
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const name = row.children[1].textContent.toLowerCase();
            const email = row.children[2].textContent.toLowerCase();

            row.style.display = (name.includes(query) || email.includes(query)) ? '' : 'none';
        });
    });
</script>
@endsection
