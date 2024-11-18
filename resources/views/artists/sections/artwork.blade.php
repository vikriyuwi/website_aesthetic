<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Scrollable masonry container */
        .scrollable-masonry {
            max-height: 600px; /* Set max height for scrolling */
            overflow-y: auto; /* Enable vertical scrolling */
            padding-right: 1rem; /* Avoid content cutoff on the right */
        }

        .masonry {
            column-count: 3;
            column-gap: 1rem;
        }

        .masonry-item {
            display: inline-block;
            width: 100%;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
            border-radius: 8px;
        }

        /* Hover effect on images */
        .masonry-item img {
            transition: transform 0.3s ease;
        }

        .masonry-item:hover img {
            transform: scale(1.05);
        }

        /* Overlay with tags */
        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 0.5rem;
            font-size: 0.875rem;
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
        }

        /* Tag styling */
        .tag {
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 0.2rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Artwork</h1>
        <a href="all-blogs.html" class="flex items-center px-6 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
            View All <span class="ml-2">→</span>
        </a>
    </div>

    <!-- Scrollable Masonry Grid Layout -->
    <div class="scrollable-masonry">
        <div class="masonry">
            <!-- Example Artwork Items -->
            <div class="masonry-item group relative">
                <img src="https://images.unsplash.com/photo-1688622781034-04141f4d3dd5?q=80&w=2160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Abstract Artwork 1" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>

            <div class="masonry-item group relative">
                <img src="https://images.unsplash.com/photo-1653393337202-81b93e1e316c?q=80&w=3132&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Sculpt Artwork" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>

            <!-- Additional masonry items here -->
            <div class="masonry-item group relative">
                <img src="https://images.unsplash.com/photo-1578321272176-b7bbc0679853?q=80&w=2886&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Religious Painting" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>

            <div class="masonry-item group relative">
                <img src="https://images.unsplash.com/photo-1578320743746-788d990bd318?q=80&w=3121&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Fractal Art" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>

            <div class="masonry-item group relative">
                <img src="https://images.unsplash.com/photo-1583243535597-5e2db3a1683e?q=80&w=2883&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Painting of Person" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>

            <div class="masonry-item group relative">
                <img src="https://plus.unsplash.com/premium_photo-1663937462428-d503f642ff0d?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                     alt="Car Design" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>
            <!-- Additional images as needed -->
        </div>
    </div>
</div>

</body>
</html>
