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
                @if (Auth::check())
                    @if (Auth::user()->USER_ID == $artist->USER_ID)
                        <button class="ellipsisButton text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                            </svg>
                        </button>
                        <!-- Options Menu -->

                        <div
                            class="optionsMenu absolute top-12 right-4 bg-white border border-gray-200 shadow-lg rounded-md p-2 w-44 hidden">
                            <button class="block w-full text-left px-4 py-2 hover:bg-gray-100"
                                onclick="openEditModal()">Edit</button>
                        </div>
                    @endif
                @endif
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
            <div id="editAboutMeModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div
                    class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl transform transition-all duration-300 mt-16">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Edit About Me 📝</h3>
                    <form id="aboutMeForm" class="space-y-6">
                        <!-- About Me Description -->
                        <div>
                            <label for="aboutDescription"
                                class="block text-gray-700 font-semibold mb-2">Description</label>
                            <textarea id="aboutDescription" rows="8"
                                class="w-full px-4 py-8 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                placeholder="Write about yourself...">I'm an illustrator obsessed with creating fantastical realms, gritty cyberpunk landscapes, and nostalgic retro vibes. From childhood notebook doodles to polished client projects, my passion for art has fueled a journey that blends traditional and digital techniques.</textarea>
                        </div>

                        <!-- Skills Section with Dropdown and Selection Limit -->
                        <div>
                            <label for="skillsDropdown" class="block text-gray-700 font-semibold mb-2">Skills</label>
                            <select id="skillsDropdown"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                                placeholder="Select skills">
                                <option value="" disabled selected>Select skills...</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="Adobe Illustration">Adobe Illustration</option>
                                <option value="Adobe Photoshop">Adobe Photoshop</option>
                                <option value="Logo Design">Logo Design</option>
                            </select>
                            <div class="flex flex-wrap gap-2 mt-4" id="selectedSkillsContainer">
                                <!-- Selected skills will appear here -->
                            </div>
                        </div>

                        <!-- Additional Info Section -->
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="sinceDate" class="block text-gray-700 font-semibold mb-2">Aesthetic
                                    Since</label>
                                <input type="text" id="sinceDate"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="October 2023">
                            </div>
                            <div>
                                <label for="language" class="block text-gray-700 font-semibold mb-2">Language</label>
                                <select id="language" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                                    <option value="English" selected>English</option>
                                    <option value="Indonesian">Indonesian</option>
                                </select>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3 mt-4">
                            <button type="button" id="cancelEditButton"
                                class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition">Cancel</button>
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                // Toggle the edit modal visibility
                function openEditModal() {
                    document.getElementById('editAboutMeModal').classList.remove('hidden');
                }

                document.getElementById('cancelEditButton').addEventListener('click', () => {
                    document.getElementById('editAboutMeModal').classList.add('hidden');
                });
                // Function to toggle options menu visibility
                document.querySelectorAll('.ellipsisButton').forEach(button => {
                    button.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const optionsMenu = button.nextElementSibling;
                        optionsMenu.classList.toggle('hidden');
                    });
                });

                // Hide options menu when clicking outside
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.ellipsisButton') && !e.target.closest('.optionsMenu')) {
                        document.querySelectorAll('.optionsMenu').forEach(menu => menu.classList.add('hidden'));
                    }
                });

                // Show edit modal when Edit is clicked
                function openEditModal() {
                    document.getElementById('editAboutMeModal').classList.remove('hidden');
                    document.querySelector('.optionsMenu').classList.add('hidden'); // Hide options menu
                }

                // Hide the edit modal
                document.getElementById('cancelEditButton').addEventListener('click', () => {
                    document.getElementById('editAboutMeModal').classList.add('hidden');
                });
            </script>
</body>

</html>
