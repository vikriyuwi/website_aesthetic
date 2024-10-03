<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    @include('layouts.navbar')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-8">{{ count($artworks) }} Artworks</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Loop through the artworks -->
            @foreach($artworks as $artwork)
            <div class="group relative bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border-2 border-gray-300 overflow-hidden">
                <!-- Artwork Image with Hover Effect -->
                <a href="{{ route('artwork.show', ['id' => $artwork['id']]) }}">
                    <img src="{{ asset('images/' . $artwork['image']) }}" alt="{{ $artwork['title'] }}"
                        class="w-full h-64 object-cover rounded-t-lg transition-transform duration-300 transform group-hover:scale-105">
                </a>

                <div class="p-6">
                    <!-- Increased Interest Badge -->
                    @if($artwork['interest'])
                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">
                        Increased Interest
                    </span>
                    @endif

                    <!-- Artwork Info -->
                    <h2 class="text-lg font-bold mt-2 text-gray-900">{{ $artwork['artist'] }}</h2>
                    <p class="text-gray-600 text-sm">{{ $artwork['title'] }}, {{ $artwork['year'] }}</p>
                    <p class="text-gray-500 text-sm">{{ $artwork['gallery'] }}</p>
                    <p class="text-indigo-600 text-lg font-semibold mt-2">{{ $artwork['price'] }}</p>
                </div>

                <!-- Button that appears on hover -->
                <div class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ route('artwork.show', ['id' => $artwork['id']]) }}"
                        class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition-colors duration-300">
                        View Details
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
