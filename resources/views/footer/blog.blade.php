<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">
  <div class="bg-gray-100 min-h-screen py-10">
    <div class="container mx-auto px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-gray-800 text-center mb-10">Blog</h1>

      <!-- Blog Articles Container -->
      <!-- Card 1 -->
      <div id="blogContainer" class="grid gap-10 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1">
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
          <img src="https://images.unsplash.com/photo-1728921976673-a9902271c2c7?q=80&w=3067&auto=format&fit=crop" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">How to Create Stunning Digital Art</h3>
            <p class="text-gray-600 mb-4">Explore tips and techniques for elevating your digital art with practical steps and insights from industry experts.</p>
            <div class="flex justify-between items-center">
              <a href="{{ route('blog-detail') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
              <span class="text-gray-400 text-sm">April 5, 2024</span>
            </div>
          </div>
        </div>
      <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
          <img src="https://images.unsplash.com/photo-1666657730107-d7d8a8d2e645?q=80&w=2960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Getting Started with Digital Art</h3>
            <p class="text-gray-600 mb-4">Discover the basics of digital art, including tools and techniques to get started in this exciting field.</p>
            <div class="flex justify-between items-center">
              <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
              <span class="text-gray-400 text-sm">May 20, 2024</span>
            </div>
          </div>
        </div>
      <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
          <img src="https://images.unsplash.com/photo-1613271913923-f6aa924cf9d6?q=80&w=3024&auto=format&fit=crop" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Exploring the Basics of Color Theory</h3>
            <p class="text-gray-600 mb-4">A beginner-friendly guide to understanding and applying color theory in your art for impactful compositions.</p>
            <div class="flex justify-between items-center">
              <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
              <span class="text-gray-400 text-sm">February 20, 2024</span>
            </div>
          </div>
        </div>
      <!-- Card 4 -->
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1491245338813-c6832976196e?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Mastering Color Theory in Art</h3>
                  <p class="text-gray-600 mb-4">A guide to understanding and applying color theory to create harmonious and captivating artwork.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">March 1, 2024</span>
                  </div>
                </div>
              </div>
      <!-- Card 5 -->              
              <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://media.istockphoto.com/id/1143734743/photo/hand-for-drawing-with-pen.webp?a=1&s=612x612&w=0&k=20&c=8YEmYHMO8SnRj5ocDB3xbba5IX3Kt5rTb03WLQQ1Fak=" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">The Essentials of Composition</h3>
                  <p class="text-gray-600 mb-4">Learn the basics of composition and how it can elevate your artwork by guiding the viewer's eye.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">April 10, 2024</span>
                  </div>
                </div>
              </div>
      <!-- Card 6 -->             
              <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://plus.unsplash.com/premium_photo-1682542226177-b22eb1ca7fcc?q=80&w=2915&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Creating Depth with Light and Shadow</h3>
                  <p class="text-gray-600 mb-4">Tips and techniques for using light and shadow to add dimension and realism to your artwork.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">May 5, 2024</span>
                  </div>
                </div>
              </div>
      <!-- Card 7 -->
              <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1620674156044-52b714665d46?q=80&w=3132&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Exploring Digital Art Tools</h3>
                  <p class="text-gray-600 mb-4">A comparison of popular digital art software and how to choose the right one for your style.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">June 15, 2024</span>
                  </div>
                </div>
              </div>
      <!-- Card 8 -->
              <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1725794953948-5f38ad69d7f7?q=80&w=3153&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Incorporating Textures into Your Art</h3>
                  <p class="text-gray-600 mb-4">Learn how adding textures can bring depth and interest to both digital and traditional artworks.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">July 20, 2024</span>
                  </div>
                </div>
              </div>
      <!-- Card 9 --> 
              <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <img src="https://images.unsplash.com/photo-1591860401771-bf99883bdc0c?q=80&w=2304&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Blog Image" class="w-full h-48 rounded-t-lg object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold text-gray-800 mb-2">Developing Your Unique Art Style</h3>
                  <p class="text-gray-600 mb-4">A guide to discovering and nurturing your unique voice as an artist, setting your work apart.</p>
                  <div class="flex justify-between items-center">
                    <a href="#" class="text-indigo-600 hover:text-indigo-700 font-medium">Read More &rarr;</a>
                    <span class="text-gray-400 text-sm">August 10, 2024</span>
                  </div>
                </div>
              </div>              
        </div>
</div>
      <!-- Load More Button -->
      <div class="text-center mt-10">
        <button id="loadMoreButton" class="px-8 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">
          Load More
        </button>
      </div>
    </div>
    <footer class="bg-indigo-600 border-t border-slate-50 mt-10">
        <div class="container mx-auto py-8 px-6 lg:px-8 text-center">
          
          <!-- Navigation Links -->
          <div class="flex justify-center space-x-8 mb-6 text-white">
            <a href="#" class="hover:text-yellow-300 transition">About</a>
            <a href="#" class="hover:text-yellow-300 transition">Blog</a>
            <a href="#" class="hover:text-yellow-300 transition">Jobs</a>
            <a href="#" class="hover:text-yellow-300 transition">Press</a>
            <a href="#" class="hover:text-yellow-300 transition">Accessibility</a>
            <a href="#" class="hover:text-yellow-300 transition">Partners</a>
          </div>
      
          <!-- Social Media Icons -->
          <div class="flex justify-center space-x-6 text-yellow-300 mb-4">
            <a href="#" class="hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
            <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-white transition"><i class="fab fa-github"></i></a>
            <a href="#" class="hover:text-white transition"><i class="fab fa-youtube"></i></a>
          </div>
      
          <!-- Copyright Text -->
          <p class="text-white text-sm">&copy; 2024 Aesthetic, Inc. All rights reserved.</p>
        </div>
      </footer>
</body>

</html>
