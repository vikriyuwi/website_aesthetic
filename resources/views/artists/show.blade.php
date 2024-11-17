<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
    /* Chat Container */
    #chatContainer {
        transition: width 0.3s ease, height 0.3s ease;
    }
    
    /* Expanded Chat */
    #chatContainer.expanded {
        width: 100vw;
        height: 100vh;
        bottom: 0;
        right: 0;
    }

    /* Messages area with scrolling */
    #chatContainer .chat-messages {
        height: calc(100% - 120px); /* Adjust for header and input area */
        overflow-y: auto;
        padding: 1rem;
    }

    /* Input area with padding */
    #chatContainer .chat-input {
        padding: 10px;
        border-top: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Input field with proper sizing */
    #chatContainer .chat-input input {
        flex: 1;
        padding: 10px 12px;
        border-radius: 20px;
        border: 1px solid #ccc;
        outline: none;
        font-size: 14px;
    }

    /* Send button */
    #chatContainer .chat-input button {
        background-color: #4f46e5; /* Indigo color */
        color: white;
        padding: 8px 12px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

</head>
<body class="bg-gray-100 font-roboto">
    <!-- Navbar Start -->
    @include('layouts.navbar-login')
    <!-- Navbar End -->

    <div class="bg-white">
        <!-- Profile Banner Section -->
        <div class="relative">
            <img src="{{ asset('images/Assets/hompage.jpg') }}" alt="Profile banner" class="w-full h-48 object-cover">
            <div class="absolute top-0 left-0 w-full h-full bg-lime-500 opacity-50"></div>
        </div>

        <div class="container mx-auto px-4 py-6">
            <div class="flex">
                <!-- Sidebar: Profile Information -->
                @include('artists.artist-profile-sidebar')

                <!-- Main Content Area -->
                <div class="w-3/4 ml-4">
                    <!-- Navigation Tabs -->
                    <nav class="flex space-x-4">
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'home']) }}" class="text-gray-600 hover:text-gray-800">Home</a>
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'portfolio']) }}" class="text-gray-600 hover:text-gray-800">Portfolio</a>
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'collection']) }}" class="text-gray-600 hover:text-gray-800">Collection</a>
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'posts']) }}" class="text-gray-600 hover:text-gray-800">Posts</a>
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'community']) }}" class="text-gray-600 hover:text-gray-800">Community</a>
                        <a href="{{ route('artist.show', ['id' => $artistId, 'section' => 'about']) }}" class="text-gray-600 hover:text-gray-800">About</a>
                    </nav>



                    <!-- Section Rendering -->
                <div class="mt-4">
                   @if($section === 'home')
                       @include('artists.sections.home')
                   @elseif($section === 'portfolio')
                       @include('artists.sections.portfolio')
                   @elseif($section === 'collection')
                       @include('artists.sections.collection')
                   @elseif($section === 'posts')
                       @include('artists.sections.posts')
                   @elseif($section === 'community')
                       @include('artists.sections.community')
                   @elseif($section === 'about')
                       @include('artists.sections.about')
                   @endif
                </div>

<!-- Chat Container -->
<div id="chatContainer" class="hidden fixed bottom-5 right-5 w-80 h-96 bg-white shadow-lg rounded-lg overflow-hidden z-50">
    <!-- Chat Header with Expand and Close Buttons -->
    <div class="flex justify-between items-center p-4 bg-gray-100 border-b border-gray-300">
        <h3 class="text-gray-800 text-lg font-semibold">Chat with Shanay Cruz</h3>
        <div class="flex space-x-2">
            <!-- Expand Button -->
            <button onclick="toggleChatSize()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-expand"></i>
            </button>
            <!-- Close Button -->
            <button onclick="closeChatWindow()" class="text-gray-500 hover:text-gray-700">
                &times;
            </button>
        </div>
    </div>
    
    <!-- Chat Messages Area with scrolling -->
    <div class="chat-messages">
        <div class="grid pb-11">
            <!-- Message from the artist -->
            <div class="flex gap-2.5 mb-4">
                <img src="https://pagedone.io/asset/uploads/1710412177.png" alt="Shanay image" class="w-10 h-11">
                <div class="grid">
                    <h5 class="text-gray-900 text-sm font-semibold leading-snug pb-1">Shanay Cruz</h5>
                    <div class="px-3.5 py-2 bg-gray-100 rounded-lg inline-flex">
                        <h5 class="text-gray-900 text-sm font-normal leading-snug">Guts, I need a review of work. Are you ready?</h5>
                    </div>
                    <div class="text-gray-500 text-xs font-normal leading-4 py-1 text-right">05:14 PM</div>
                </div>
            </div>
            <!-- Your message -->
            <div class="flex gap-2.5 justify-end mb-4">
                <div>
                    <div class="px-3 py-2 bg-indigo-600 text-white rounded-lg">
                        <h2 class="text-sm font-normal leading-snug">Yes, let’s see, send your work here</h2>
                    </div>
                    <div class="text-gray-500 text-xs font-normal leading-4 py-1">05:14 PM</div>
                </div>
                <img src="https://pagedone.io/asset/uploads/1704091591.png" alt="Your image" class="w-10 h-11">
            </div>
        </div>
    </div>
    
    <!-- Chat Input Area -->
    <div class="chat-input">
        <input type="text" placeholder="Type here..." class="w-full text-gray-700 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600" />
        <button class="bg-indigo-600 text-white p-2 rounded-full">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>


<script>
    // Open chat window
    function openChatWindow() {
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.classList.remove('hidden');
    }

    // Close chat window
    function closeChatWindow() {
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.classList.add('hidden');
    }

    // Toggle chat size (expand/collapse)
    function toggleChatSize() {
        const chatContainer = document.getElementById('chatContainer');
        chatContainer.classList.toggle('expanded'); // Apply expanded style
    }
</script>
                
</body>
</html>