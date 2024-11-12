<div class="w-full md:w-3/4 ml-4">
  <!-- About Me Section -->
  <div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-3xl font-bold">About Me</h1>
    </div>
    <div class="text-gray-700">
      {{ $artistAbout }}
    </div>

    <h2 class="mt-8 text-xl font-bold">Skills</h2>
    <div class="flex flex-wrap gap-2 mt-4">
      <span class="bg-green-400 text-black-800 px-3 py-1 rounded-full border fill-green-400">Graphic Design</span>
      <span class="bg-blue-500 text-black-800 px-3 py-1 rounded-full border fill-blue-700">Adobe Illustration</span>
      <span class="bg-fuchsia-500 text-black-800 px-3 py-1 rounded-full border fill-fuchsia-500">Adobe Photoshop</span>
      <span class="bg-yellow-300 text-black-800 px-3 py-1 rounded-full border fill-yellow-300">Logo Design</span>
    </div>

    <p class="mt-6 text-gray-700">
      Aesthetic since October 2023
      <i class="fas fa-check-circle text-green-500 ml-2"></i>
      English
    </p>
  </div>

  <!-- Reviews Section -->
  <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
    <h2 class="text-xl font-bold mb-4">{{ $countTotalRating }} Reviews 
      <span class="text-gray-600 font-medium">{{ $averageArtistRating }}</span>
    </h2>

    <!-- Star Ratings -->
    <div class="space-y-2">
      @foreach ($userRatingPercentage as $userRatingPercentage => $percentage)
      <div class="flex items-center">
        <span class="w-1/5 text-right pr-2">{{ $percentage->USER_RATING }} Stars</span>
        <div class="w-4/5 bg-gray-300 h-2 rounded-full">
          <div class="bg-gray-500 h-2 rounded-full" style="width: {{ ($percentage->COUNT/$countTotalRating)*100 }}%;"></div>
        </div>
      </div>
      @endforeach
      
      {{-- <div class="flex items-center">
        <span class="w-1/5 text-right pr-2">4 Stars</span>
        <div class="w-4/5 bg-gray-300 h-2 rounded-full">
          <div class="bg-gray-500 h-2 rounded-full" style="width: 12.5%;"></div>
        </div>
      </div>
      <div class="flex items-center">
        <span class="w-1/5 text-right pr-2">3 Stars</span>
        <div class="w-4/5 bg-gray-300 h-2 rounded-full">
          <div class="bg-gray-500 h-2 rounded-full" style="width: 4.17%;"></div>
        </div>
      </div>
      <div class="flex items-center">
        <span class="w-1/5 text-right pr-2">2 Stars</span>
        <div class="w-4/5 bg-gray-300 h-2 rounded-full">
          <div class="bg-gray-500 h-2 rounded-full" style="width: 0%;"></div>
        </div>
      </div>
      <div class="flex items-center">
        <span class="w-1/5 text-right pr-2">1 Star</span>
        <div class="w-4/5 bg-gray-300 h-2 rounded-full">
          <div class="bg-gray-500 h-2 rounded-full" style="width: 0%;"></div>
        </div>
      </div> --}}
    </div>

    <!-- Review List -->
    <h3 class="text-lg font-bold mt-6">Recent Reviews</h3>
    <div class="mt-4">
      <!-- Review 1 -->
      @foreach ($rating as $rating => $listRating )
      <div class="flex items-start mb-4">
        <img class="w-12 h-12 rounded-full object-cover" src="{{ asset($listRating->PROFILE_IMAGE_PATH) }}" alt="Profile picture of Anya">
        <div class="ml-3">
          <p class="font-bold">{{ ($listRating->USERNAME) }} <span class="text-sm text-gray-600">{{ ($listRating->COMMENT_TIME) }}</span><span class="text-sm text-gray-600"> {{ ($listRating->USER_RATING) }} stars</span></p>
          <p class="text-gray-700 mt-1">{{ ($listRating->CONTENT) }}</p>
          <div class="flex space-x-4 text-sm mt-2">
            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-up mr-1"></i> Helpful?</button>
            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-down mr-1"></i> No</button>
          </div>
        </div>
      </div>
      @endforeach
      {{-- <!-- Review 2 -->
      <div class="flex items-start">
        <img class="w-12 h-12 rounded-full object-cover" src="{{ asset('images/melody.webp') }}" alt="Profile picture of Sam Jetstream">
        <div class="ml-3">
          <p class="font-bold">Sam Jetstream <span class="text-sm text-gray-600">3 months ago</span></p>
          <p class="text-gray-700 mt-1">I needed a gritty cyberpunk illustration for my upcoming novel cover, and Something4U delivered in spades. The neon-drenched streets and towering megacorporations fit perfectly with the story’s tone.</p>
          <div class="flex space-x-4 text-sm mt-2">
            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-up mr-1"></i> Helpful?</button>
            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-down mr-1"></i> No</button>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
</div>
