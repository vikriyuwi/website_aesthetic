<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    .collection-card {
      position: relative;
    }
    .ellipsisButton {
      position: absolute;
      top: 8px;
      right: 8px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      padding: 6px;
      z-index: 10;
    }
    .optionsMenu {
      position: absolute;
      top: 40px;
      right: 16px;
      background-color: white;
      border: 1px solid #e5e7eb;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      padding: 8px;
      width: 120px;
      display: none;
      z-index: 20;
    }
    .modal-overlay {
      z-index: 50;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="max-w-screen-lg mx-auto mt-8">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-3xl font-extrabold text-gray-800">Collections</h3>
      @if (Auth::user()->USER_ID == $artistUserId )
        <button id="addCollectionButton" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-full shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
          + Add Collection
        </button>
      @endif
    </div>

    <!-- Collections Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Collection Item Example -->
      @foreach($listCollection as $listCollection => $collections)
      <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-gray-200 collection-card">
        <button class="ellipsisButton text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleOptionsMenu(event, this)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5Z" />
          </svg>
        </button>
        <!-- Options Menu -->
        <div class="optionsMenu">
          <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Edit Collection</button>
          <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" onclick="confirmDeleteCollection(event)">Delete Collection</button>
        </div>
        <img alt="Collection Image 1" class="w-full h-48 object-cover transform hover:scale-110 transition-transform duration-500" src="{{ asset($collections->IMAGE_PATH) }}">
        <div class="p-6">
          <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $collections->COLLECTION_NAME }}</h4>
          <p class="text-gray-600 mb-4">{{ $collections->TOTAL_ARTWORKS }} Arts</p>
          <a href="{{ route('collection.show', $collections->ARTIST_COLLECTION_ID) }}" class=" text-indigo-600 font-bold hover:underline">View Collection &rarr;</a>
        </div>
      </div>
      @endforeach
      
      <!-- More collection items can be added similarly -->
    </div>
  </div>

  <!-- Add Collection Modal -->
  <div id="addCollectionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-xl">
      <h2 class="text-3xl font-semibold text-gray-800 mb-6">Add New Collection</h2>
      <form id="addCollectionForm" class="space-y-6">
        <div>
          <label for="collectionTitle" class="block text-gray-700 font-semibold mb-2">Collection Title</label>
          <input type="text" id="collectionTitle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Enter collection title">
        </div>
        <div>
          <label for="collectionDescription" class="block text-gray-700 font-semibold mb-2">Description</label>
          <textarea id="collectionDescription" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Enter collection description"></textarea>
        </div>
        <div>
          <label for="collectionImage" class="block text-gray-700 font-semibold mb-2">Image URL or Upload</label>
          <input type="text" id="collectionImage" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition mb-2" placeholder="Enter image URL">
          <input type="file" id="collectionImageUpload" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>
        <div class="flex justify-end space-x-3">
          <button type="button" id="cancelAddCollectionButton" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Cancel</button>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">Add Collection</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Delete Collection</h2>
      <p class="text-gray-600 mb-6">Are you sure you want to delete this collection?</p>
      <div class="flex justify-end space-x-3">
        <button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition" onclick="closeDeleteModal()">Cancel</button>
        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition" onclick="deleteCollection()">Delete</button>
      </div>
    </div>
  </div>


  <!-- JavaScript -->
  <script>
    // Show and hide the Add Collection modal
    document.getElementById('addCollectionButton').addEventListener('click', () => {
      document.getElementById('addCollectionModal').classList.remove('hidden');
    });

    document.getElementById('cancelAddCollectionButton').addEventListener('click', () => {
      document.getElementById('addCollectionModal').classList.add('hidden');
    });

    // Toggle options menu visibility for each ellipsis button
    function toggleOptionsMenu(event, button) {
      event.stopPropagation();
      document.querySelectorAll('.optionsMenu').forEach(menu => {
        if (menu !== button.nextElementSibling) {
          menu.style.display = 'none';
        }
      });
      const optionsMenu = button.nextElementSibling;
      optionsMenu.style.display = optionsMenu.style.display === 'block' ? 'none' : 'block';
    }
    // Show delete confirmation modal
    function confirmDeleteCollection(event) {
      event.stopPropagation();
      document.getElementById('deleteConfirmationModal').classList.remove('hidden');
    }

    // Hide delete confirmation modal
    function closeDeleteModal() {
      document.getElementById('deleteConfirmationModal').classList.add('hidden');
    }

    // Perform delete action
    function deleteCollection() {
      alert('Collection deleted!');
      closeDeleteModal();
    }

    // Hide options menu when clicking outside
    document.addEventListener('click', () => {
      document.querySelectorAll('.optionsMenu').forEach(menu => menu.style.display = 'none');
    });
  </script>
</body>
</html>
