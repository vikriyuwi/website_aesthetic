<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="w-full md:w-3/4 ml-4">
        <!-- About Me Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 relative">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-3xl font-bold">About Me</h1>

                <!-- Ellipsis Button -->
               {{-- @if (Auth::check())
                    @if (Auth::user()->USER_ID == $artist->USER_ID) --}}
                <!-- Pen Button -->
                <button id="openEditModal" class="text-gray-600 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-pencil-alt text-lg"></i>
                </button>
                   {{-- @endif
                @endif --}}
            </div>

            <div class="text-gray-700">
                {{ $artist->BIO }}
            </div>

            <h2 class="mt-8 text-xl font-bold">Skills</h2>
            <div class="flex flex-wrap gap-2 mt-4">
                <span class="bg-green-400 text-black-800 px-3 py-1 rounded-full border fill-green-400">Graphic
                    Design</span>
                <span class="bg-blue-500 text-black-800 px-3 py-1 rounded-full border fill-blue-700">Adobe
                    Illustration</span>
                <span class="bg-fuchsia-500 text-black-800 px-3 py-1 rounded-full border fill-fuchsia-500">Adobe
                    Photoshop</span>
                <span class="bg-yellow-300 text-black-800 px-3 py-1 rounded-full border fill-yellow-300">Logo
                    Design</span>
            </div>

            <p class="mt-6 text-gray-700">
                Aesthetic since October 2023
                <i class="fas fa-check-circle text-green-500 ml-2"></i>
                English
            </p>
        </div>
        <!-- Reviews Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <h2 class="text-xl font-bold mb-4">Average rating Reviews
                <span class="text-gray-600 font-medium"> <i class="text-yellow-500 fas fa-star"></i> {{ $artist->average_artist_rating }} Stars</span>
            </h2>

            <!-- Star Ratings -->
            {{-- <div class="space-y-2">
                <div class="flex items-center">
                    <span class="w-1/5 text-right pr-2">{{ $artist->average_artist_rating }} Stars</span>
                    <div class="w-4/5 bg-gray-300 h-2 rounded-full">
                        <div class="bg-gray-500 h-2 rounded-full"
                            style="width: 50%;"></div>
                    </div>
                </div>
            </div> --}}

            <!-- Review Comments -->
            <h3 class="text-lg font-bold mt-6">Recent Reviews</h3>
            <div class="mt-4 max-h-60 overflow-y-scroll">
                <!-- Review 1 -->
                @foreach($artist->ArtistRatings as $rating)
                <div class="flex items-start mb-4">
                    <img class="w-12 h-12 rounded-full object-cover" src="{{ $rating->MasterUser->Buyer->PROFILE_IMAGE_URL != null ? asset($rating->MasterUser->Buyer->PROFILE_IMAGE_URL) : "https://placehold.co/100x100"}}"
                        alt="Profile picture of Anya">
                    <div class="ml-3">
                        <p class="font-bold">
                            {{ $rating->MasterUser->Buyer->FULLNAME }}
                            <span class="text-sm text-gray-600"> {{ $rating->created_at }}</span>
                            @if(Auth::user() != null)
                                @if(Auth::user()->USER_ID == $rating->MasterUser->USER_ID)<a href="{{ route('artist.review.delete',['id'=>$rating->ARTIST_RATING_ID]) }}" class="text-red-700"><i class="fas fa-trash"></i></a> @endif
                            @endif
                        </p>
                        <!-- Star Rating -->
                        <div class="flex space-x-1 text-yellow-500">
                          @php
                            $totalRating = 5 - $rating->USER_RATING
                          @endphp
                          @for($i = 1; $i <= $rating->USER_RATING; $i++)
                            <i class="fas fa-star"></i>
                          @endfor
                          @for($i = 1; $i <= $totalRating; $i++)
                            <i class="far fa-star"></i>
                          @endfor
                        </div>
                        <p class="text-gray-700 mt-1">{{ $rating->CONTENT }}</p>
                        {{-- <div class="flex space-x-4 text-sm mt-2">
                            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-up mr-1"></i>
                                Helpful?</button>
                            <button class="text-gray-600 hover:text-gray-800"><i class="fas fa-thumbs-down mr-1"></i>
                                No</button>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>

    <!-- Edit About Me Modal -->
    <div id="editAboutMeModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
            <h3 class="text-2xl font-semibold text-gray-800 mb-2">Edit About Me 📝</h3>
            <form id="aboutMeForm" class="space-y-6">
                <!-- Description -->
                <div>
                <label for="aboutDescription" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea id="aboutDescription" rows="5"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"
                        placeholder="Write about yourself..." maxlength="150"></textarea>
                    <!-- Character Count -->
                    <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                        <span id="charCount">0 / 150</span>
                        <span id="errorMessage" class="text-red-600 hidden">Maximum 150 characters allowed</span>
                    </div>
                </div>

            <!-- Skills Section -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Skills</label>
                <!-- Skills Grid -->
                <div id="skillsContainer" class="grid grid-cols-2 gap-4">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" value="Graphic Design" class="skillsCheckbox w-5 h-5">
                        <span>Graphic Design</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" value="Adobe Illustration" class="skillsCheckbox w-5 h-5">
                        <span>Adobe Illustration</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" value="Adobe Photoshop" class="skillsCheckbox w-5 h-5">
                        <span>Adobe Photoshop</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" value="Logo Design" class="skillsCheckbox w-5 h-5">
                        <span>Logo Design</span>
                    </label>
                </div>
                <!-- Error Message -->
                <p id="skillsError" class="text-red-600 text-sm mt-2 hidden">You can select up to 3 skills only.</p>
                    <!-- Display selected skills -->
                    <div id="selectedSkillsContainer" class="flex flex-wrap gap-2 mt-4">
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm">Graphic Design</span>
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm">Logo Design</span>
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm">Adobe Photoshop</span>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="grid grid-cols-2 gap-6">
                    <!-- Aesthetic Since (Non-editable) -->
                    <div>
                        <label for="sinceDate" class="block text-gray-700 font-semibold mb-2">Aesthetic Since</label>
                        <input type="text" id="sinceDate" value="October 2023"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-500 cursor-not-allowed"
                            readonly>
                    </div>

                 <!-- Language Dropdown -->
                 <div>
                        <label for="language" class="block text-gray-700 font-semibold mb-2">Language</label>
                        <select id="language"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                            <option value="English" selected>English</option>
                            <option value="Indonesian">Indonesian</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-4">
                    <button type="button" id="cancelEditButton" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
    // Open Edit Modal
    const openEditModalButton = document.getElementById('openEditModal');
    const editModal = document.getElementById('editAboutMeModal');
    const cancelEditButton = document.getElementById('cancelEditButton');

    openEditModalButton.addEventListener('click', () => {
        editModal.classList.remove('hidden');
    });

    // Close Edit Modal
    cancelEditButton.addEventListener('click', () => {
        editModal.classList.add('hidden');
    });

    // Description Character Count
    const aboutDescription = document.getElementById('aboutDescription');
    const charCount = document.getElementById('charCount');
    const errorMessage = document.getElementById('errorMessage');

    aboutDescription.addEventListener('input', () => {
        const currentLength = aboutDescription.value.length;

        charCount.textContent = `${currentLength} / 150`;

        if (currentLength > 150) {
            errorMessage.classList.remove('hidden');
            aboutDescription.value = aboutDescription.value.substring(0, 150);
            charCount.textContent = `150 / 150`;
        } else {
            errorMessage.classList.add('hidden');
        }
    });

    // Skills Selection Logic - Maximum 2
    const checkboxes = document.querySelectorAll('.skillsCheckbox');
    const skillsError = document.getElementById('skillsError');

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', () => {
            const checkedBoxes = document.querySelectorAll('.skillsCheckbox:checked');

            if (checkedBoxes.length > 3) {
                checkbox.checked = false; // Prevent selecting more than 2
                skillsError.classList.remove('hidden');
            } else {
                skillsError.classList.add('hidden');
            }
        });
    });
});

    </script>
</body>

</html>
