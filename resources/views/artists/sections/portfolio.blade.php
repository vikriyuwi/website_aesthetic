<!-- Portfolio Section -->
<div class="bg-white p-6 rounded-lg shadow-lg mt-6">
    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-bold text-gray-800">Portfolio</h3>
        @if (Auth::user()->USER_ID == $artistUserId )
            <button id="addPortfolioButton" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-full shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
                + Add Portfolio
            </button>    
        @endif
        <!-- Add Portfolio Button -->
        
    </div>
    <!-- Portfolio Grid -->
    <div id="portfolioContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Sample Portfolio Item -->
        @foreach ($artistPortfolio as $portfolios )
        <div class="relative group bg-gray-50 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 cursor-pointer"
             onclick="showPortfolioDetail('{{ $portfolios->ART_TITLE }}', '{{ $portfolios->DESCRIPTION }}', '{{ asset($portfolios->IMAGE_PATH) }}')">
            <img src="{{ asset($portfolios->IMAGE_PATH) }}" alt="Portfolio work {{ $portfolios->ART_ID }}" class="w-full h-56 object-cover rounded-t-lg">
            <button class="ellipsisButton absolute top-2 right-2 text-gray-600 hover:text-gray-800 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
            </svg>
            </button>
            <div class="optionsMenu absolute top-10 right-2 bg-white border border-gray-200 shadow-lg rounded-md p-2 w-44 hidden">
                <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Edit Portfolio</button>
                <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Delete Portfolio</button>
                <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Pin on Your Profile</button>
            </div>
        </div>
        @endforeach
        <!-- More static portfolio items here -->
    </div>
</div>

<!-- Add Portfolio Modal -->
<div id="addPortfolioModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl mx-4 sm:mx-0">
    <h3 class="text-2xl font-semibold text-gray-800 mb-2">Add New Portfolio 💼 </h3>
        <form id="portfolioForm" class="space-y-6">
            <div>
                <label for="portfolioTitle" class="block text-gray-700 font-semibold mb-2">Title of the Portfolio</label>
                <input type="text" id="portfolioTitle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Enter portfolio title">
            </div>
            <div>
                <label for="portfolioDescription" class="block text-gray-700 font-semibold mb-2">Description of the Portfolio</label>
                <textarea id="portfolioDescription" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Enter portfolio description"></textarea>
            </div>
            <div>
                <label for="portfolioImage" class="block text-gray-700 font-semibold mb-2">Image URL or Upload</label>
                <input type="text" id="portfolioImage" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition mb-2" placeholder="Enter image URL">
                <input type="file" id="portfolioImageUpload" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" id="cancelButton" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Cancel</button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">Add</button>
            </div>
        </form>
    </div>
</div>


<!-- Portfolio Detail Modal -->
<div id="portfolioDetailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl flex flex-col sm:flex-row items-center relative">
        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closePortfolioDetail()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div class="w-full sm:w-1/2 pr-4">
            <img id="portfolioDetailImage" alt="Portfolio Image" class="w-full h-auto rounded-lg shadow" height="200" width="300">
        </div>
        <div class="w-full sm:w-1/2 mt-4 sm:mt-0">
            <h1 id="portfolioDetailTitle" class="text-2xl font-bold mb-2"></h1>
            <p id="portfolioDetailDescription" class="text-gray-700 text-lg"></p>
        </div>
    </div>
</div>

<script>
    // Front-end JavaScript for showing/hiding modal and toggling options menu
    document.addEventListener('DOMContentLoaded', () => {
        const addPortfolioButton = document.getElementById('addPortfolioButton');
        const addPortfolioModal = document.getElementById('addPortfolioModal');
        const cancelButton = document.getElementById('cancelButton');
        const portfolioDetailModal = document.getElementById('portfolioDetailModal');

        // Show modal for adding new portfolio
        addPortfolioButton.addEventListener('click', () => {
            addPortfolioModal.classList.remove('hidden');
        });

        // Hide modal when cancel button is clicked
        cancelButton.addEventListener('click', () => {
            addPortfolioModal.classList.add('hidden');
        });

        // Function to show portfolio detail with updated styling
        window.showPortfolioDetail = function(title, description, imageUrl) {
            document.getElementById('portfolioDetailTitle').textContent = title;
            document.getElementById('portfolioDetailDescription').textContent = description;
            document.getElementById('portfolioDetailImage').src = imageUrl;
            portfolioDetailModal.classList.remove('hidden');
        }

        // Function to close portfolio detail modal
        window.closePortfolioDetail = function() {
            portfolioDetailModal.classList.add('hidden');
        }

        // Event delegation for ellipsis buttons
        document.querySelectorAll('.ellipsisButton').forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevents the click event from propagating up
                const optionsMenu = button.nextElementSibling;
                optionsMenu.classList.toggle('hidden');
            });
        });

        // Hide options menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.group') && !e.target.closest('.optionsMenu')) {
                document.querySelectorAll('.optionsMenu').forEach(menu => menu.classList.add('hidden'));
            }
        });
    });
</script>
