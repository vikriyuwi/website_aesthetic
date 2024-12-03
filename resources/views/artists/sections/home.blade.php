<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Sidebar</title>
</head>

<body>
    <!-- Latest Works Section -->
    <div class="bg-white p-4 rounded-lg shadow-lg mt-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Latest Works</h3>
            <a href="{{ route('all-artwork.show', ['artistId' => $artist->ARTIST_ID]) }}" class="text-gray-600 hover:text-gray-800">See all</a>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <img src="{{ asset('') }}"
            alt="Latest work 1" class="rounded-lg object-cover">
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="bg-white p-4 rounded-lg shadow-lg mt-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Portfolio</h3>
            <a href="{{ route('artist.show', ['id' => $artist->ARTIST_ID, 'section' => $section = 'portfolio']) }}" class="text-gray-600 hover:text-gray-800">See all</a>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-4">
            <img src="{{ asset('') }}"
            alt="Portfolio work 1" class="rounded-lg object-cover">
        </div>
    </div>

</body>

</html>
