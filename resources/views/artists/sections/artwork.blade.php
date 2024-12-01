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
        <a href="{{ route('all-artwork.show', $artistId) }}" class="flex items-center px-6 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
            View All <span class="ml-2">→</span>
        </a>
    </div>

    <!-- Scrollable Masonry Grid Layout -->
    <div class="scrollable-masonry">
        <div class="masonry">
            @foreach($artistArtwork as $artistArtwork => $listArtistArtwork)
            <!-- Example Artwork Items -->
            <div class="masonry-item group relative">
                <img src="{{ asset($listArtistArtwork->IMAGE_PATH) }}" 
                     alt="{{ $listArtistArtwork->ART_TITLE }}" 
                     class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
            </div>
            @endforeach
            <!-- Additional images as needed -->
        </div>
    </div>
</div>

</body>
</html>
