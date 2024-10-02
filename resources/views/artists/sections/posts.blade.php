<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    /* Custom class for maintaining 2:1 aspect ratio */
    .aspect-w-2 {
      width: 100%;
    }

    .aspect-h-1 {
      padding-top: 50%; /* 2:1 aspect ratio */
      position: relative;
    }

    .aspect-inner {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
    }

    /* Smaller post size */
    .post-card {
      max-width: 600px; /* Smaller max width */
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="max-w-screen-lg mx-auto">
    <!-- Posts Section -->
    <div class="mt-8">
      <!-- Post 1 -->
      <div class="bg-white p-4 rounded-lg shadow-md mb-4 border border-gray-300 post-card">
        <div class="flex items-center space-x-4">
          <img alt="Profile picture of the user" class="w-10 h-10 rounded-full" src="{{ asset('images/Assets/About me/sam.jpg') }}">
          <div>
            <h2 class="text-lg font-bold">Something4U</h2>
            <p class="text-sm text-gray-600">Feb 27, 2023</p>
          </div>
        </div>
        <p class="mt-4 text-sm">I'll Hibernate for a while ;)</p>
        <div class="aspect-w-2 aspect-h-1 mt-4 rounded-lg overflow-hidden">
          <img alt="Anime character with pink hair" class="aspect-inner object-cover" src="{{ asset('images/Assets/Category/Content/1.jpg') }}">
        </div>
        <div class="mt-2 flex space-x-4 text-gray-600 text-sm">
          <button class="flex items-center space-x-1"><i class="far fa-heart"></i><span>20</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-comment"></i><span>15</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>

      <!-- Post 2 -->
      <div class="bg-white p-4 rounded-lg shadow-md mb-4 border border-gray-300 post-card">
        <div class="flex items-center space-x-4">
          <img alt="Profile picture of the user" class="w-10 h-10 rounded-full" src="{{ asset('images/Assets/About me/sam.jpg') }}">
          <div>
            <h2 class="text-lg font-bold">Something4U</h2>
            <p class="text-sm text-gray-600">Jan 05, 2023</p>
          </div>
        </div>
        <p class="mt-4 text-sm">Open for Commission!!</p>
        <div class="aspect-w-2 aspect-h-1 mt-4 rounded-lg overflow-hidden">
          <img alt="Anime character with a sword" class="aspect-inner object-cover" src="{{ asset('images/Assets/Category/Content/2.jpg') }}">
        </div>
        <div class="mt-2 flex space-x-4 text-gray-600 text-sm">
          <button class="flex items-center space-x-1"><i class="far fa-heart"></i><span>1300</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-comment"></i><span>25</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
