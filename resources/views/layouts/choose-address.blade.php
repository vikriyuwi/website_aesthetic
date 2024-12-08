<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Address</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Container -->
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
        <button onclick="history.back()" class="flex items-center text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Back
            </button>
            <h1 class="absolute left-1/2 transform -translate-x-1/2 text-2xl font-bold text-gray-800">Choose Address</h1>
        </div>

        <!-- Add New Address Button -->
        <a href="/new-address"  class="w-full block text-center bg-white border border-gray-400 rounded-full px-4 py-2 text-gray-700 hover:bg-gray-200 transition">
            + Add New Address
        </a>

        <!-- Address Cards -->
        <div class="space-y-6">
            <!-- Address 1 -->
            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Chantikka Riffka</h2>
                        <p class="text-gray-600 text-sm">081246934487</p>
                        <p class="text-gray-700 mt-2 text-sm leading-relaxed">
                            Jl. Kemanapun asal denganku, gg gaming no. 34A, Bintaro, Tangerang Selatan, 89678
                        </p>
                    </div>
                <!-- Edit Button -->
                    <button class="text-indigo-500 hover:text-indigo-700 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <!-- Delete Button -->
                <div class="flex justify-end mt-4">
                <button class="text-red-500 hover:text-red-600 transition font-semibold" onclick="confirmDeleteAddress(this)">
                        Delete
                </button>
                </div>
            </div>

            <!-- Address 2 -->
            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="flex justify-between items-start">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Ikow Rap</h2>
                        <p class="text-gray-600 text-sm">081387652234</p>
                        <p class="text-gray-700 mt-2 text-sm leading-relaxed">
                            Jl. Kebonanan bersama denganku, no. 1A, Gunung Semeru, Lembangnya, 12345
                        </p>
                    </div>
                    <button class="text-indigo-500 hover:text-indigo-700 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
                <!-- Delete Button -->
                <div class="flex justify-end mt-4">
                <button class="text-red-500 hover:text-red-600 transition font-semibold" onclick="confirmDeleteAddress(this)">
                        Delete
                </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function confirmDeleteAddress(button) {
        // Show a confirmation dialog
        const confirmation = confirm("Are you sure you want to delete this address?");
        
        if (confirmation) {
            // Find the closest parent address card and remove it
            const addressCard = button.closest('.bg-gray-50');
            addressCard.remove();
        }
    }
</script>
</html>
