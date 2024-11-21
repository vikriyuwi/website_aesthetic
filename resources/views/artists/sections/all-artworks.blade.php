<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .modal-overlay {
            z-index: 50;
        }

        .scrollable-content {
            max-height: 300px; /* Set maximum height for scrollable area */
            overflow-y: auto; /* Enable vertical scrolling */
        }
    </style>
</head>
<body class="container mx-auto p-6">
    <!-- Button to Trigger Modal -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">16 Artworks</h1>
        <button onclick="openAddArtModal()" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-full shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
            Add Artwork Collection
        </button>
    </div>

    <!-- Add Artwork Collection Modal -->
    <div id="addArtModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg max-w-4xl w-full p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Add Artwork Collection</h2>
                <button class="text-gray-600 hover:text-gray-800 focus:outline-none" onclick="closeAddArtModal()">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <!-- Modal Description -->
            <p class="text-gray-600 mb-4">Select the art pieces you want to include in this collection.</p>

            <!-- Art Selection Grid with Scroll -->
            <div class="scrollable-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Art Item Example -->
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://images.unsplash.com/photo-1515405295579-ba7b45403062?q=80&w=2160&auto=format&fit=crop" alt="Artwork 1" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <!-- More Art Items -->
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://plus.unsplash.com/premium_photo-1672329277682-57593636690e?q=80&w=2940&auto=format&fit=crop" alt="Artwork 2" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://via.placeholder.com/150" alt="Artwork 3" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://via.placeholder.com/150" alt="Artwork 4" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://plus.unsplash.com/premium_photo-1672329277682-57593636690e?q=80&w=2940&auto=format&fit=crop" alt="Artwork 2" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://via.placeholder.com/150" alt="Artwork 3" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <div class="relative group border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img src="https://via.placeholder.com/150" alt="Artwork 4" class="w-full h-48 object-cover">
                    <div class="absolute top-2 left-2">
                        <input type="checkbox" class="w-6 h-6 text-indigo-500 focus:ring focus:ring-indigo-300">
                    </div>
                </div>
                <!-- Add more images as needed -->
            </div>

            <!-- Modal Actions -->
            <div class="flex justify-end mt-6 space-x-4">
                <button onclick="closeAddArtModal()" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">
                    Cancel
                </button>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">
                    Add Selected Art
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Open Add Art Modal
        function openAddArtModal() {
            document.getElementById('addArtModal').classList.remove('hidden');
        }

        // Close Add Art Modal
        function closeAddArtModal() {
            document.getElementById('addArtModal').classList.add('hidden');
        }
    </script>
</body>
</html>
