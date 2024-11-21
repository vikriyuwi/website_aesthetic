<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .gallery-section {
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 1rem; 
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
            transition: transform 0.3s, border-color 0.3s;
            cursor: pointer;
        }

        .masonry-item:hover {
            transform: scale(1.02); 
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

<!-- Art Gallery Section -->
<div class="gallery-section mt-12">
    <div class="gallery-title text-center text-3xl font-bold text-gray-800 mb-6">
        Welcome to Art Gallery
    </div>
    <div class="gallery-subtitle text-center text-gray-600 mb-8">
        ENJOY VARIOUS ART FROM DESIGNERS AROUND THE WORLD
    </div>
    
    <!-- Masonry Grid Layout -->
    <div class="masonry">
        <!-- Example Artwork Items with Different Aspect Ratios -->
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1688622781034-04141f4d3dd5?q=80&w=2160&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Abstract Artwork 1" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1653393337202-81b93e1e316c?q=80&w=3132&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1581345837712-414b9b6fb450?q=80&w=3176&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1622716669801-8012349a257f?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1582561612644-01026a1d8134?q=80&w=2040&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://plus.unsplash.com/premium_photo-1669392157870-18a592a0876f?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://plus.unsplash.com/premium_photo-1664438942229-964e01b430be?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://plus.unsplash.com/premium_photo-1663937462428-d503f642ff0d?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1583243535597-5e2db3a1683e?q=80&w=2883&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
        <div class="masonry-item group relative">
            <img src="https://images.unsplash.com/photo-1578320743746-788d990bd318?q=80&w=3121&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                 alt="Sculpt Artwork" 
                 class="w-full h-auto object-cover">
        </div>
    </div>
        <!-- Load More Button -->
        <div class="flex justify-center mt-8">
        <button class="w-full max-w-4xl mx-4 py-4 text-gray-500 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200">
            Load more
        </button>
    </div>
</div>

<!-- Modal for viewing image in larger format -->
<div id="imageModal" class="hidden modal-overlay" onclick="closeModal()">
    <div class="modal-content" onclick="event.stopPropagation()">
        <img id="modalImage" src="" alt="Large View">
        <span class="close-button" onclick="closeModal()">
            <i class="fas fa-times text-gray-800 text-lg"></i>
        </span>
    </div>
</div>
</body>
</html>
