@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.template')

@section('title', 'Artist List')

@section('content')
<div class="container mx-auto px-6 py-4">
    <!-- Search Bar -->
<div class="flex items-center bg-white p-4 rounded-md shadow-sm mb-6">
  <i class="fas fa-search text-gray-400 mr-2"></i>
  <input class="w-full border-none focus:outline-none" placeholder="  Search artists by keyword..." type="text" id="searchInput" oninput="filterArtists()">
</div>

<!-- Job Count and Filters -->
<div class="flex justify-between items-center mb-4">
  <h2 class="text-lg font-semibold">244 Artists</h2>
  <div class="flex items-center space-x-4">
    <div class="flex items-center space-x-2">
      <i class="fas fa-map-marker-alt text-gray-400"></i>
      <option value=" Anywhere">Anywhere</option>
      <i class="fas fa-chevron-down text-gray-400"></i>
    </div>
    <div class="flex items-center space-x-2">
      <select id="filterField" class="border-none focus:outline-none" onchange="filterArtists()">
        <option value="">All Creative Fields</option>
        <option value="Graphic Designer">Graphic Designer</option>
        <option value="Illustrator">Illustrator</option>
        <option value="Web Designer">Web Designer</option>
      </select>
    </div>
  </div>
</div>

    <!-- Artist Grid -->
    <div id="artistGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($artists as $artist)
            <div class="artist-card bg-white p-6 border border-gray-300 rounded-lg shadow-md hover:shadow-lg transition duration-300" data-field="{{ $artist['job'] }}" data-name="{{ $artist['name'] }}">
                <div class="flex items-center mb-4">
                    <!-- Fix image, ensure it's not broken -->
                    <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-indigo-500">
                        <img src="{{ asset('images/' . $artist['image']) }}" alt="{{ $artist['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $artist['name'] }}</h2>
                        <p class="text-sm text-gray-500">{{ $artist['job'] }}</p>
                        <p class="text-xs text-gray-400">{{ $artist['location'] }}</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600 mb-4">{{ $artist['bio'] ?? 'No bio available' }}</p>
                <div class="flex justify-between items-center">
                    <a href="{{ route('artist.show', $artist['id']) }}" class="text-indigo-600 hover:underline">View Profile</a>
                    <p class="text-xs text-gray-400">{{ $artist['posted_at'] ?? now()->subDays(rand(1, 10))->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    // JavaScript for live filtering artists based on search input and dropdown
    function filterArtists() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const filterField = document.getElementById('filterField').value;
        const artistCards = document.querySelectorAll('.artist-card');
        
        artistCards.forEach(card => {
            const name = card.getAttribute('data-name').toLowerCase();
            const field = card.getAttribute('data-field');
            const matchesName = name.includes(searchInput);
            const matchesField = filterField === "" || field === filterField;

            if (matchesName && matchesField) {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        });
    }
</script>
@endsection
