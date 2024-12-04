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
        @if(Auth::check())
            @if (Auth::user()->USER_ID == $artist->USER_ID )
                <button onclick="openModal()" class="flex items-center px-6 py-2 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
                Add New 
                </button>
            @endif
        @endif
    </div>

    <!-- Masonry Grid Layout Container with Scrollable Area -->
    <div class="masonry-container">
        <div class="masonry">
            <!-- Example Artwork Items -->
            @foreach($artWorks as $artWork)
            <a href="{{ route('artwork.show', $artWork->ART_ID) }}">
                <div class="masonry-item group relative">
                    <img src="{{ Str::startsWith($artWork->ArtImages()->first()->IMAGE_PATH, 'images/art/') ? asset($artWork->ArtImages()->first()->IMAGE_PATH) : $artWork->ArtImages()->first()->IMAGE_PATH }}" 
                         alt="{{ $artWork->ART_TITLE }}" 
                         class="w-full h-auto object-cover transition-transform duration-500 transform group-hover:scale-105">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<div id="addArtworkModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-3xl mt-16">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Add New Artwork</h2>
        </div>
         <div class="max-h-[60vh] overflow-y-auto pr-6"> <!-- Added padding-right to fix scrollbar issue -->
            <form class="space-y-6" method="POST" action="{{ route('artwork.store') }}" enctype="multipart/form-data" id="addArtworkForm">
                @csrf
                <!-- Title Field -->
                <div>
                    <label for="artworkTitle" class="block text-lg font-semibold text-gray-700">Title</label>
                    <input type="text" id="artworkTitle" name="artworkTitle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    <span id="artworkTitleError" class="text-red-600"></span>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="artworkDescription" class="block text-lg font-semibold text-gray-700">Description</label>
                    <textarea id="artworkDescription" name="artworkDescription" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required></textarea>
                    <span id="artworkDescriptionError" class="text-red-600"></span>
                </div>

                <!-- Category Field -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700">Category</label>
                    <div class="flex items-center">
                        <input type="text" id="selectedCategories" readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Select categories (max 6)">
                        <button type="button" onclick="toggleCategorySelection()" class="ml-3 text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <!-- Category Selection Modal -->
                <div id="categorySelection" class="hidden mt-4">
                    <h3 class="text-gray-700 font-semibold mb-2">Select Categories</h3>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($artCategoriesMaster as $artCategorie)
                        <label><input type="checkbox" class="category-checkbox" name="category_art[]" value="{{ $artCategorie->ART_CATEGORY_MASTER_ID }}"> {{ $artCategorie->DESCR }}</label>
                        @endforeach
                    </div>
                </div>
                <span id="portfolioCategoryError" class="text-red-600"></span>

                <!-- Image Upload Options -->
                <div>
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Select Image Upload Option</label>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="linkOption" name="imageOption" value="link" class="mr-3" onclick="toggleImageUploadOption('link')" checked>
                        <label for="linkOption" class="text-gray-700">Upload by Link</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="fileOption" name="imageOption" value="file" class="mr-3" onclick="toggleImageUploadOption('file')">
                        <label for="fileOption" class="text-gray-700">Upload from File</label>
                    </div>
                </div>

                <!-- Image Upload Fields -->
                <div id="linkField" class="mb-4">
                    <label for="artworkImageLink" class="block text-lg font-semibold text-gray-700">Image URL</label>
                    <input type="text" id="artworkImageLink" name="artworkImageLink" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <span id="artworkImageLinkError" class="text-red-600"></span>
                </div>
                <div id="fileField" class="mb-4 hidden">
                    <label for="artworkImageUpload" class="block text-lg font-semibold text-gray-700">Upload Image</label>
                    <input type="file" id="artworkImageUpload" name="artworkImageUpload" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" accept="image/*">
                    <span id="artworkImageUploadError" class="text-red-600"></span>
                </div>

                <div>
                    <label for="artworkPrice" class="block text-lg font-semibold text-gray-700">Price</label>
                    <input type="number" id="artworkPrice" name="artworkPrice" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" required>
                    <span id="artworkPriceError" class="text-red-600"></span>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="mt-6 flex justify-end space-x-4">
                <button onclick="closeModal()" class="bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400 transition duration-200">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">Add Artwork</button>
            </div>
        </form>
    </div>
</div>

<!-- Success Modal -->
@if(session('status'))
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center success-modal">
        <i class="fas fa-check-circle text-indigo-600 text-5xl mb-4"></i>
        <h2 class="text-2xl font-bold text-gray-800">Artwork Added!</h2>
        <p class="text-gray-600 mt-2">Your arwork has been successfully added.</p>
        <div class="mt-6 flex justify-center space-x-4">
            <button onclick="closeSuccessModal()" class="bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400 transition duration-200">Cancel</button>
    </div>
</div>
@endif

<script>
    function openModal() {
        document.getElementById('addArtworkModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addArtworkModal').classList.add('hidden'); // Hide the modal
        clearErrorsAndForm(); // Clear errors and reset the form
    }

    function closeSuccessModal() {
        document.getElementById('successModal').classList.add('hidden'); // Hide the modal
        clearErrorsAndForm(); // Clear errors and reset the form
    }

    function clearErrorsAndForm() {
        // Clear error messages
        document.getElementById('artworkTitleError').textContent = '';
        document.getElementById('artworkDescriptionError').textContent = '';
        document.getElementById('portfolioCategoryError').textContent = '';
        document.getElementById('artworkImageLinkError').textContent = '';
        document.getElementById('artworkImageUploadError').textContent = '';

        // Reset the form
        document.getElementById('addArtworkForm').reset();
    }

    function toggleCategorySelection() {
        const categorySelection = document.getElementById('categorySelection');
        categorySelection.classList.toggle('hidden');
    }

    function toggleImageUploadOption(option) {
        const linkField = document.getElementById('linkField');
        const fileField = document.getElementById('fileField');
        const artworkImageLink = document.getElementById('artworkImageLink');
        const artworkImageUpload = document.getElementById('artworkImageUpload');

        if (option === 'link') {
            // Show link field and hide file field
            linkField.classList.remove('hidden');
            fileField.classList.add('hidden');

            // Add required to link input and remove from file input
            artworkImageLink.setAttribute('required', 'true');
            artworkImageUpload.removeAttribute('required');
        } else if (option === 'file') {
            // Show file field and hide link field
            fileField.classList.remove('hidden');
            linkField.classList.add('hidden');

            // Add required to file input and remove from link input
            artworkImageUpload.setAttribute('required', 'true');
            artworkImageLink.removeAttribute('required');
        }
    }

    // Update the selected categories display
    document.querySelectorAll('.category-checkbox').forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const selectedCategories = Array.from(document.querySelectorAll('.category-checkbox:checked')).map(
                (checkbox) => checkbox.nextSibling.textContent.trim()
            );
            if (selectedCategories.length > 6) {
                checkbox.checked = false;
                alert('You can select up to 6 categories.');
            } else {
                document.getElementById('selectedCategories').value = selectedCategories.join(', ');
            }
        });
    });
</script>

</body>
</html>
