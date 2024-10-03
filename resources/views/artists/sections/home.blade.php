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
                <a href="#" class="text-gray-600 hover:text-gray-800">See all</a>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <img src="{{ asset('images/Assets/Category/Content/4.jpg') }}" alt="Latest work 1" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/5.jpg') }}" alt="Latest work 2" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/6.jpg') }}" alt="Latest work 3" class="rounded-lg object-cover">
            </div>
        </div>

        <!-- Portfolio Section -->
        <div class="bg-white p-4 rounded-lg shadow-lg mt-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Portfolio</h3>
                <a href="#" class="text-gray-600 hover:text-gray-800">See all</a>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <img src="{{ asset('images/Assets/Category/Content/1.jpg') }}" alt="Portfolio work 1" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/2.jpg') }}" alt="Portfolio work 2" class="rounded-lg object-cover">
                <img src="{{ asset('images/Assets/Category/Content/3.jpg') }}" alt="Portfolio work 3" class="rounded-lg object-cover">
            </div>
        </div>

        <!-- Community Section -->
        <div class="bg-white p-4 rounded-lg shadow-lg mt-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-bold">Community</h3>
                <a href="#" class="text-gray-600 hover:text-gray-800">See all</a>
            </div>
            <div class="grid grid-cols-6 gap-4 mt-4">
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/Media 1.jpg') }}" alt="Community 1" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/Media 2.jpg') }}" alt="Community 2" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/Media 3.jpg') }}" alt="Community 3" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/media 5.jpg') }}" alt="Community 4" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/media 6.jpg') }}" alt="Community 5" class="rounded-lg w-full h-full object-cover">
                </div>
                <div class="h-32">
                    <img src="{{ asset('images/Assets/Community/Media/Photos/media 7.jpg') }}" alt="Community 6" class="rounded-lg w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
        </div>
</div>
</div>     
</body>
</html>