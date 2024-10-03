<div class="mt-8">
  <h3 class="text-3xl font-extrabold mb-6 text-gray-800">Collections</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Collection Item 1 -->
    <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-gray-200">
      <img alt="Collection Image 1" class="w-full h-48 object-cover transform hover:scale-110 transition-transform duration-500" src="{{ asset('images/homepage.jpg') }}">
      <div class="p-6">
        <h4 class="text-xl font-semibold text-gray-900 mb-2">All</h4>
        <p class="text-gray-600 mb-4">150 Arts</p>
        <a href="{{ route('collection.show', 'all') }}" class=" text-indigo-600 font-bold hover:underline">View Collection &rarr;</a>
      </div>
    </div>

    <!-- Collection Item 2 -->
    <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-gray-200">
      <img alt="Collection Image 2" class="w-full h-48 object-cover transform hover:scale-110 transition-transform duration-500" src="{{ asset('images/homepage2.jpeg') }}"/>
      <div class="p-6">
        <h4 class="text-xl font-semibold text-gray-900 mb-2">Featured</h4>
        <p class="text-gray-600 mb-4">120 Arts</p>
        <a href="{{ route('collection.show', 'featured') }}" class=" text-indigo-600 font-bold hover:underline">Explore &rarr;</a>
      </div>
      </div>

    <!-- Collection Item 3 -->
    <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-gray-200">
      <img alt="Collection Image 3" class="w-full h-48 object-cover transform hover:scale-110 transition-transform duration-500" src="{{ asset('images/homepage5.jpeg') }}"/>
      <div class="p-6">
        <h4 class="text-xl font-semibold text-gray-900 mb-2">Anime</h4>
        <p class="text-gray-600 mb-4">30 Arts</p>
        <a href="#" class=" text-indigo-600 font-bold hover:underline">See More &rarr;</a>
      </div>
  </div>
</div>
