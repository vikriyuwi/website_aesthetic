<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $artwork['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Updated to Roboto */
            background-color: #f7f8fa;
            color: #333;
        }
        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            background-color: #4c1d95;
            color: #fff;
        }

        .carousel-button:hover {
            background-color: #6b7280;
        }

        .image-thumbnail:hover {
            transform: scale(1.1);
        }

        .share-icons i:hover {
            transform: scale(1.2);
            color: #4c1d95;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .ellipsis-button {
            @apply p-2 border rounded-lg flex items-center justify-center text-gray-600 hover:bg-gray-200 transition-all;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto p-4">
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-4">
            <a href="/" class="hover:underline">home</a>
            <span>/</span>
            <a href="/category" class="hover:underline">{{ $artwork['category'] }}</a>
            <span>/</span>
            <span class="text-gray-800">{{ $artwork['title'] }}</span>
        </nav>

        <!-- Artwork Image Container -->
        <div class="flex justify-center items-center max-w-screen-lg p-4">
            <img src="{{ asset('images/' . $artwork['image']) }}" 
                 alt="{{ $artwork['title'] }}"
                 class="max-h-[85vh] w-auto object-contain rounded-lg transition-transform duration-300 transform hover:scale-105 cursor-pointer" />
        </div>

<!-- Artwork Info Section (Redesigned) -->
<div class="mt-8 lg:flex lg:space-x-4 lg:justify-between">
            <!-- Basic Artwork Details -->
            <div class="lg:w-2/3 space-y-4">
                <!-- Artist Info Above Title -->
                <div class="flex items-center mb-2">
                    <img src="https://placehold.co/50x50" alt="Artist Name" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <span class="block text-lg font-semibold text-gray-800">Artist Name</span>
                    </div>
                </div>
                <!-- Artwork Title -->
                <h2 class="text-3xl font-bold text-gray-900">Artwork Title</h2>

                <!-- Category  -->
                <div class="flex flex-wrap gap-2 mt-2">
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Artwork
                    </button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Framed
                    </button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Painting
                    </button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Gallery
                    </button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Studio
                    </button>
                    <button class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-medium border border-gray-300 rounded-full hover:bg-gray-200 transition">
                        Creative Commons
                    </button>
                </div>

                <div class="text-xl font-semibold text-indigo-600 mt-4">$2500.00</div>
                <p class="text-gray-600 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac dui et diam pellentesque gravida. Suspendisse potenti.</p>
                <!-- Actions -->
                <div class="flex space-x-4 mt-6">
                    <button class="bg-indigo-500 text-white py-2 px-4 rounded-lg hover:bg-indigo-600 transition btn">
                        BUY NOW
                    </button>
                    <button class="border border-indigo-500 text-indigo-500 py-2 px-4 rounded-lg hover:bg-indigo-50 transition btn">
                        CONTACT ARTIST
                    </button>
                    <button class="flex items-center space-x-2 text-gray-500 hover:text-indigo-500 transition btn">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>
            </div>

            <!-- New Share and More Button Section -->
            <div class="lg:w-1/3 space-y-4 mt-6 lg:mt-0">
                <!-- Share and More Button -->
                <div class="flex space-x-2 mt-4">
                    <!-- Share Button with New SVG Icon -->
                    <button class="share-button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                        </svg>
                    </button>
                    <!-- Ellipsis (More Options) Button -->
                    <button class="ellipsis-button">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Description Section -->
        <div class="mt-12">
            <h3 class="text-xl font-semibold mb-4">Description</h3>
            <p class="text-gray-700 leading-relaxed">Detailed description of the artwork goes here. This section provides insights into the creative process, materials used, and any other relevant information that adds value to the artwork.</p>
        </div>

        <!-- Additional Details -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-ruler-combined text-gray-500"></i>
                <div>
                    <h4 class="text-sm font-bold">Dimensions</h4>
                    <p class="text-sm text-gray-500">24x36 inches</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-palette text-gray-500"></i>
                <div>
                    <h4 class="text-sm font-bold">Style</h4>
                    <p class="text-sm text-gray-500">Abstract</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <i class="fas fa-users text-gray-500"></i>
                <div>
                    <h4 class="text-sm font-bold">Subject</h4>
                    <p class="text-sm text-gray-500">Nature</p>
                </div>
            </div>
        </div>
<!-- Other Listings Section -->
<div class="max-w-7xl mx-auto py-12 mt-12">
    <div class="text-center mb-8">
        <img alt="Profile picture of Ruslana Levandovska" class="rounded-full mx-auto mb-4 w-16 h-16 object-cover"
             src="https://storage.googleapis.com/a1aa/image/rDj0sQ4efjph6kC62n60n8eeiWc0wKvJvDwv9fiqG3VokCYcC.jpg" />
        <h2 class="text-2xl font-semibold text-gray-700 mt-2">
            Other listings from Ruslana Levandovska
        </h2>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Listing Card 1 -->
        <a href="listing-detail-sun-kissed-dreams.html" class="group bg-white rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-lg transition">
            <img src="https://storage.googleapis.com/a1aa/image/SRST1E7aaGIQDhYXyEwvVWVeWIm3pvJOe7gR5k3IfqBGpAGnA.jpg" 
                 alt="Sun Kissed Dreams" 
                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition-colors">Sun Kissed Dreams</h3>
                <p class="text-gray-500">Ruslana Levandovska</p>
                <p class="text-gray-500 text-sm">Oil</p>
            </div>
        </a>
        
        <!-- Listing Card 2 -->
        <a href="listing-detail-ocean-daydreaming.html" class="group bg-white rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-lg transition">
            <img src="https://storage.googleapis.com/a1aa/image/YlH2tYHKJM7hGZJMHBXfV8VbWbX9OkcauycA8scB6gMUKgxJA.jpg" 
                 alt="Ocean Daydreaming" 
                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition-colors">Ocean Daydreaming</h3>
                <p class="text-gray-500">Ruslana Levandovska</p>
                <p class="text-gray-500 text-sm">Oil</p>
            </div>
        </a>
        
        <!-- Listing Card 3 -->
        <a href="listing-detail-endless-summer-sunset.html" class="group bg-white rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-lg transition">
            <img src="https://storage.googleapis.com/a1aa/image/jNkgYgmmF7rxIZ3Ubh3nO9NMt2DWbAOt4DbdGAsF5QBJFw4E.jpg" 
                 alt="Endless Summer Sunset" 
                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition-colors">Endless Summer Sunset</h3>
                <p class="text-gray-500">Ruslana Levandovska</p>
                <p class="text-gray-500 text-sm">Oil</p>
            </div>
        </a>
        
        <!-- Listing Card 4 -->
        <a href="listing-detail-into-the-blue.html" class="group bg-white rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-lg transition">
            <img src="https://storage.googleapis.com/a1aa/image/doVNvaOjVTbYPdVclXu41hlE8wFb4iCHjQWsD9QZyfgTKgxJA.jpg" 
                 alt="Into the Blue" 
                 class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1 group-hover:text-indigo-600 transition-colors">Into the Blue</h3>
                <p class="text-gray-500">Ruslana Levandovska</p>
                <p class="text-gray-500 text-sm">Oil</p>
            </div>
        </a>
    </div>
</div>


</body>

</html>
