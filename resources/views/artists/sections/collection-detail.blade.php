<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .ellipsisButton {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            padding: 6px;
            z-index: 10;
        }
        .optionsMenu {
            position: absolute;
            top: 40px;
            right: 8px;
            background-color: white;
            border: 1px solid #e5e7eb;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 8px;
            width: 120px;
            display: none;
            z-index: 20;
        }
        .modal-overlay {
            z-index: 50;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    @include('layouts.navbar')

    <div class="container mx-auto p-6">
        <!-- Description Section -->
        <div class="mb-6">
            <h2 class="text-2xl text-gray-600">
                Exploring an easy-to-use medium with rich colors and deep textures.
            </h2>
        </div>

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">{{ count($artworks) }} Artworks</h1>
            <button id="addArtworkButton" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-full shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                + Add Artwork
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Loop through the artworks -->
            @foreach($artworks as $artwork => $listArtWorks)
            <div class="group relative bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border-2 border-gray-300 overflow-hidden">
                <!-- Ellipsis Button -->
                <button class="ellipsisButton text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleOptionsMenu(event, this)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5Z" />
                    </svg>
                </button>
                <!-- Options Menu -->
                <div class="optionsMenu">
                    <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Edit Art</button>
                    <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" onclick="confirmDeleteArtwork()">Delete Art</button>
                </div>

                <!-- Artwork Image with Hover Effect -->
                <a href="{{ route('artwork.show', $listArtWorks->ART_ID) }}">
                    <img src="{{ asset($listArtWorks->IMAGE_PATH) }}" alt="{{ $listArtWorks->ART_TITLE }}"
                        class="w-full h-64 object-cover rounded-t-lg transition-transform duration-300 transform group-hover:scale-105">
                </a>
                
                <div class="p-6">
                    <!-- Increased Interest Badge -->
                    {{-- @if($artwork['interest'])
                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                        Increased Interest
                    </span>
                    @endif --}}
                    <!-- Artwork Info -->
                    <h2 class="text-lg font-bold mt-2 text-gray-900">{{ $listArtWorks->USERNAME }}</h2>
                    <p class="text-gray-600 text-sm">{{ $listArtWorks->ART_TITLE }}, {{ $listArtWorks->ART_YEAR }}</p>
                    {{-- <p class="text-gray-500 text-sm">{{ $artwork['gallery'] }}</p> --}}
                    @if ($listArtWorks->IS_SALE == 1)
                    <p class="text-indigo-600 text-lg font-semibold mt-2">Rp.{{ $listArtWorks->ART_PRICE }}</p>
                    @else
                    <p class="text-indigo-600 text-lg font-semibold mt-2">Not For Sale</p>
                    @endif
                </div>

                <!-- Button that appears on hover -->
                <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ route('artwork.show', $listArtWorks->ART_ID) }}"
                        class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition-colors duration-300">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

<!-- Add Artwork Modal -->
<div id="addArtworkModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Add New Artwork 🎨 </h2>
            <form id="addArtworkForm" class="grid grid-cols-2 gap-4">
                <div>
                    <label for="artTitle" class="block text-gray-700 font-semibold mb-1">Title of Art</label>
                    <input type="text" id="artTitle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art title">
                </div>
                <div>
                    <label for="artCategory" class="block text-gray-700 font-semibold mb-1">Category of Art</label>
                    <input type="text" id="artCategory" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art category">
                </div>
                <div>
                    <label for="artDescription" class="block text-gray-700 font-semibold mb-1">Description</label>
                    <textarea id="artDescription" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art description"></textarea>
                </div>
                <div>
                    <label for="artDimensions" class="block text-gray-700 font-semibold mb-1">Dimensions</label>
                    <input type="text" id="artDimensions" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art dimensions">
                </div>
                <div>
                    <label for="artStyle" class="block text-gray-700 font-semibold mb-1">Style</label>
                    <input type="text" id="artStyle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art style">
                </div>
                <div>
                    <label for="artSubject" class="block text-gray-700 font-semibold mb-1">Subject</label>
                    <input type="text" id="artSubject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter art subject">
                </div>
                <div>
                    <label for="artPrice" class="block text-gray-700 font-semibold mb-1">Price</label>
                    <input type="text" id="artPrice" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter price">
                </div>
                <div class="col-span-2">
                    <label for="artImage" class="block text-gray-700 font-semibold mb-1">Image URL or Upload</label>
                    <input type="text" id="artImage" class="w-full px-4 py-2 mb-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition" placeholder="Enter image URL">
                    <input type="file" id="artImageUpload" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <div class="col-span-2 flex justify-end mt-4">
                    <button type="button" id="cancelAddArtworkButton" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Cancel</button>
                    <button type="submit" class="ml-4 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">Add Artwork</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Show and hide the Add Artwork modal
        document.getElementById('addArtworkButton').addEventListener('click', () => {
            document.getElementById('addArtworkModal').classList.remove('hidden');
        });

        document.getElementById('cancelAddArtworkButton').addEventListener('click', () => {
            document.getElementById('addArtworkModal').classList.add('hidden');
        });

        // Toggle options menu visibility for each ellipsis button
        function toggleOptionsMenu(event, button) {
            event.stopPropagation();
            document.querySelectorAll('.optionsMenu').forEach(menu => {
                if (menu !== button.nextElementSibling) {
                    menu.style.display = 'none';
                }
            });
            const optionsMenu = button.nextElementSibling;
            optionsMenu.style.display = optionsMenu.style.display === 'block' ? 'none' : 'block';
        }

        // Show delete confirmation (simple alert for demonstration)
        function confirmDeleteArtwork() {
            if (confirm("Are you sure you want to delete this artwork?")) {
                alert("Artwork deleted!");
                // Additional delete logic can be added here
            }
        }

        // Hide options menu when clicking outside
        document.addEventListener('click', () => {
            document.querySelectorAll('.optionsMenu').forEach(menu => menu.style.display = 'none');
        });
    </script>
</body>
</html>
