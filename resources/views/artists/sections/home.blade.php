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
            <a href="{{ route('all-artwork.show', ['artistId' => $artistId, 'artistUserId' => $artistUserId]) }}" class="text-gray-600 hover:text-gray-800">See all</a>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-4">
            @foreach ($homeLatestWork as $homeLatestWork => $listHomeLatestWork)
                <img src="{{ asset($listHomeLatestWork->IMAGE_PATH) }}"
                    alt="Latest work {{ $listHomeLatestWork->ART_ID }}" class="rounded-lg object-cover">
            @endforeach
        </div>
    </div>

    <!-- Portfolio Section -->
    <div class="bg-white p-4 rounded-lg shadow-lg mt-4">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-bold">Portfolio</h3>
            <a href="{{ route('artist.show', ['id' => $artistId, 'section' => $section = 'portfolio']) }}" class="text-gray-600 hover:text-gray-800">See all</a>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-4">
            @foreach ($homeLatestPortfolio as $homeLatestPortfolio => $listHomeLatestPortfolio)
                <img src="{{ asset($listHomeLatestPortfolio->IMAGE_PATH) }}"
                    alt="Portfolio work  {{ $listHomeLatestPortfolio->ART_ID }}" class="rounded-lg object-cover">
            @endforeach
        </div>
    </div>

</body>

</html>
