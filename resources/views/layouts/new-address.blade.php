<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Address</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <!-- Container -->
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">
        <!-- Back Button -->
        <div class="mb-6">
            <button onclick="history.back()" class="flex items-center text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
            </button>
        </div>

        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Add New Address</h2>
        </div>

        <!-- Form -->
        <form action="#" method="POST" class="space-y-6">
            <!-- Name Field -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input id="name" type="text" placeholder="Enter your name"
                    class="w-full border rounded-lg px-4 py-3 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <!-- Phone Field -->
            <div>
                <label for="phone" class="block text-gray-700 font-medium mb-1">Phone Number</label>
                <div class="flex">
                    <span class="inline-flex items-center px-4 bg-gray-200 border rounded-l-lg text-gray-600">+62</span>
                    <input id="phone" type="tel" placeholder="8123456789"
                        class="w-full border rounded-r-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>
            </div>

            <!-- Address Field -->
            <div>
                <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
                <textarea id="address" rows="3" placeholder="Street, House Number, etc."
                    class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500 outline-none"></textarea>
            </div>

            <!-- City and Province -->
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="province" class="block text-gray-700 font-medium mb-1">Province</label>
                    <input id="province" type="text" placeholder="Province"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>
                <div class="w-1/2">
                    <label for="city" class="block text-gray-700 font-medium mb-1">City</label>
                    <input id="city" type="text" placeholder="City"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                </div>
            </div>

            <!-- Postal Code -->
            <div>
                <label for="postal" class="block text-gray-700 font-medium mb-1">Postal Code</label>
                <input id="postal" type="text" placeholder="Postal Code"
                    class="w-full border rounded-lg px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="history.back()"
                    class="bg-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-400 transition duration-300">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-indigo-500 text-white px-6 py-3 rounded-lg hover:bg-indigo-600 transition duration-300">
                    Save Address
                </button>
            </div>
        </form>
    </div>
</body>
</html>
