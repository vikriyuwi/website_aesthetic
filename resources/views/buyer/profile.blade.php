<!DOCTYPE html>
<html lang="en">

<head>
    <title>Buyer Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Container -->
    <div class="max-w-4xl mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white p-8 flex flex-col items-center">
            <!-- Profile Image -->
            <img src="{{ $user->Buyer->PROFILE_IMAGE_URL != null ? asset($user->Buyer->PROFILE_IMAGE_URL) : "https://placehold.co/100x100"}}" alt="Buyer Avatar" class="w-32 h-32 rounded-full shadow-lg border-4 border-white">
            <!-- Buyer Info -->
            <div class="text-center mt-4">
                <h1 class="text-3xl font-bold">{{ $user->Buyer->FULLNAME }}</h1>
                <p class="text-indigo-200 text-sm">Buyer since {{ (new \DateTime($user->created_at))->format('F Y') }}</p>
            </div>
            <!-- Edit Profile Button -->
            <button class="mt-4 px-6 py-2 bg-white text-indigo-600 rounded-full shadow-md hover:bg-indigo-100 transition">
                Edit Profile
            </button>
        </div>

        <!-- Profile Stats -->
        <div class="grid grid-cols-3 text-center gap-4 bg-gray-50 p-6">
            <div>
                <h2 class="text-2xl font-bold text-indigo-600">{{ $user->total_purchased_item }}</h2>
                <p class="text-gray-700">Artworks Purchased</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-indigo-600">Rp {{ number_format($user->total_spend, 0, ',', '.') }}</h2>
                <p class="text-gray-700">Total Spend</p>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-indigo-600">{{ $user->Followings->count() }}</h2>
                <p class="text-gray-700">Artists Following</p>
            </div>
        </div>

        <!-- Recent Purchases Section -->
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Recent Purchases</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Artwork Card -->
                @foreach($user->Orders()->orderBy('created_at','DESC')->get() as $order)
                    @foreach($order->OrderItems as $item)
                    <div class="bg-gray-100 rounded-lg shadow-md p-4 hover:shadow-lg transition">
                        <img src="{{ Str::startsWith($item->Art->ArtImages()->first()->IMAGE_PATH, 'images/art/') ? asset($item->Art->ArtImages()->first()->IMAGE_PATH) : $item->Art->ArtImages()->first()->IMAGE_PATH }}" alt="Artwork Title" class="w-full h-40 object-cover rounded-lg mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item->Art->ART_TITLE }}</h3>
                        <p class="text-sm text-gray-600">by {{ $item->Art->MasterUser->Buyer->FULLNAME }}</p>
                        <p class="text-sm text-gray-500">Rp {{ number_format($item->PRICE_PER_ITEM, 0, ',', '.') }}</p>
                    </div>
                    @endforeach
                @endforeach
            </div>
            <!-- No Purchases -->
            <div class="text-center mt-8">
                <h2 class="text-lg font-semibold text-gray-600">You don’t have any art purchased yet.</h2>
                <a href="/shop" class="text-indigo-500 hover:underline mt-2 block">Explore Artworks</a>
            </div>
        </div>
    </div>
</body>

</html>
