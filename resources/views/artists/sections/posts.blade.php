<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    .post-card {
      max-width: 600px;
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
  <div class="max-w-screen-lg mx-auto">
    <!-- Add Post Button -->
    <div class="flex justify-between items-center mt-8">
      <h2 class="text-2xl font-bold">Posts</h2>
      <button id="addPostButton" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded-full shadow-md hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:scale-105">
        + Add Post
      </button>
    </div>

    <!-- Post Section -->
    <div class="mt-8">
      <!-- Post Example -->
      <div class="bg-white p-4 rounded-lg shadow-md mb-4 border border-gray-300 post-card relative cursor-pointer" onclick="showPostDetail('Something4U', 'Feb 27, 2023', 'I\'ll Hibernate for a while ;)', '20', '15', '{{ asset('images/Assets/Category/Content/1.jpg') }}')">
        <button class="ellipsisButton text-gray-600 hover:text-gray-800 focus:outline-none" onclick="toggleOptionsMenu(event, this)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 0 1.5ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg>
        </button>
        <!-- Options Menu -->
        <div class="optionsMenu">
          <button class="block w-full text-left px-4 py-2 hover:bg-gray-100">Edit Post</button>
          <button class="block w-full text-left px-4 py-2 hover:bg-gray-100" onclick="confirmDeletePost(event)">Delete Post</button>
        </div>

        <div class="flex items-center space-x-4">
          <img alt="Profile picture of the user" class="w-10 h-10 rounded-full" src="{{ asset('images/Assets/About me/sam.jpg') }}">
          <div>
            <h2 class="text-lg font-bold">Something4U</h2>
            <p class="text-sm text-gray-600">Feb 27, 2023</p>
          </div>
        </div>
        <p class="mt-4 text-sm">I'll Hibernate for a while ;)</p>

        <!-- Image Container -->
        <div class="aspect-w-2 aspect-h-1 mt-4 rounded-lg overflow-hidden">
          <img alt="Anime character with pink hair" class="aspect-inner object-cover" src="{{ asset('images/Assets/Category/Content/1.jpg') }}">
        </div>

        <div class="mt-2 flex space-x-4 text-gray-600 text-sm">
          <button class="flex items-center space-x-1"><i class="far fa-heart"></i><span>20</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-comment"></i><span>15</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>
    </div>
  </div>

  <!-- Post Detail Modal -->
  <div id="postDetailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
    <div class="bg-white p-8 rounded-lg shadow-lg w-10/12 max-w-4xl flex space-x-8 relative">
    <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800" onclick="closePostDetail()">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
       <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
    </svg>
    </button>

      <!-- Left Side: Image and Interactions -->
      <div class="flex-shrink-0 w-1/2">
        <img id="postDetailImage" class="w-full h-auto rounded-lg shadow-lg" src="{{ asset('images/Assets/Category/Content/1.jpg') }}" alt="Post Image">
        <div class="flex space-x-4 mt-4 text-gray-600">
          <button class="flex items-center space-x-2 hover:text-gray-800"><i class="far fa-heart"></i><span id="postDetailLikes">20</span></button>
          <button class="flex items-center space-x-2 hover:text-gray-800"><i class="far fa-comment"></i><span id="postDetailComments">15</span></button>
          <button class="flex items-center space-x-2 hover:text-gray-800"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>

      <!-- Right Side: Details and Comments -->
      <div class="w-1/2">
        <!-- User Info -->
        <div class="flex items-center space-x-4 mb-4">
          <img class="w-12 h-12 rounded-full" src="{{ asset('images/Assets/About me/sam.jpg') }}" alt="Profile picture">
          <div>
            <h3 id="postDetailUser" class="text-2xl font-bold">Something4U</h3>
            <p id="postDetailDate" class="text-gray-600">Feb 27, 2023</p>
          </div>
        </div>

        <!-- Caption -->
        <p id="postDetailContent" class="text-gray-700 mt-2">I'll Hibernate for a while ;)</p>

        <!-- Comments Section -->
        <div class="mt-8">
          <h4 class="text-lg font-semibold mb-2">Comments</h4>
          <div id="commentsSection" class="space-y-4 h-40 overflow-y-auto pr-2 border-t border-gray-200 pt-4">
            <!-- Placeholder comments, populated dynamically -->
          </div>
          <!-- Add Comment Form -->
          <div class="mt-4">
            <label for="newComment" class="block text-gray-700 font-semibold mb-2">Add a Comment</label>
            <textarea id="newComment" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Write your comment..."></textarea>
            <button onclick="addComment()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Post Comment</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Add Post Modal -->
<div id="addPostModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl">
      <h3 class="text-2xl font-semibold text-gray-800 mb-2">Add New Post ✉️ </h3>
      <form id="addPostForm" class="space-y-6">
        <div>
          <label for="postContent" class="block text-gray-700 font-semibold mb-2">Post Content</label>
          <textarea id="postContent" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Write something..."></textarea>
        </div>
        <div>
          <label for="postImage" class="block text-gray-700 font-semibold mb-2">Image URL or Upload</label>
          <input type="text" id="postImage" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition mb-2" placeholder="Enter image URL">
          <input type="file" id="postImageUpload" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
        </div>
        <div class="flex justify-end space-x-3">
          <button type="button" id="cancelAddPostButton" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200" onclick="closeAddPostModal()">Cancel</button>
          <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 shadow-md transition duration-300 transform hover:scale-105">Add Post</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Delete Confirmation Modal -->
  <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden modal-overlay">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Delete Post</h2>
      <p class="text-gray-600 mb-6">Are you sure you want to delete this post?</p>
      <div class="flex justify-end space-x-3">
        <button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition" onclick="closeDeleteModal()">Cancel</button>
        <button type="button" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition" onclick="deletePost()">Delete</button>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    const commentsData = [
      { name: "Anya", date: "1 month ago", text: "The fantasy illustrations are pure magic!" },
      { name: "Sam Jetstream", date: "3 months ago", text: "The neon-drenched streets are amazing!" }
    ];

    function showPostDetail(user, date, content, likes, comments, imageUrl) {
      document.getElementById('postDetailUser').textContent = user;
      document.getElementById('postDetailDate').textContent = date;
      document.getElementById('postDetailContent').textContent = content;
      document.getElementById('postDetailLikes').textContent = likes;
      document.getElementById('postDetailComments').textContent = comments;
      document.getElementById('postDetailImage').src = imageUrl;
      populateComments();
      document.getElementById('postDetailModal').classList.remove('hidden');
    }

    function populateComments() {
      const commentsSection = document.getElementById('commentsSection');
      commentsSection.innerHTML = '';
      commentsData.forEach(comment => {
        const commentElement = document.createElement('div');
        commentElement.classList.add('flex', 'space-x-4', 'items-start');
        commentElement.innerHTML = `
          <img class="w-10 h-10 rounded-full object-cover" src="{{ asset('images/melody.webp') }}" alt="${comment.name}">
          <div>
            <p class="font-bold">${comment.name} <span class="text-sm text-gray-600">${comment.date}</span></p>
            <p class="text-gray-700 mt-1">${comment.text}</p>
          </div>
        `;
        commentsSection.appendChild(commentElement);
      });
    }

    function addComment() {
      const newCommentText = document.getElementById('newComment').value;
      if (newCommentText) {
        commentsData.push({ name: "Current User", date: "Just now", text: newCommentText });
        document.getElementById('newComment').value = '';
        populateComments();
      }
    }

    function closePostDetail() {
      document.getElementById('postDetailModal').classList.add('hidden');
    }

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
    function confirmDeletePost(event) {
      event.stopPropagation();
      document.getElementById('deleteConfirmationModal').classList.remove('hidden');
    }

    // Hide delete confirmation modal
    function closeDeleteModal() {
      document.getElementById('deleteConfirmationModal').classList.add('hidden');
    }

    // Perform delete action
    function deletePost() {
      alert('Post deleted!');
      closeDeleteModal();
      // Additional delete logic can be added here
    }

    // Hide options menu when clicking outside
    document.addEventListener('click', () => {
      document.querySelectorAll('.optionsMenu').forEach(menu => menu.style.display = 'none');
    });

    // Show and hide the Add Post modal
    document.getElementById('addPostButton').addEventListener('click', () => {
      document.getElementById('addPostModal').classList.remove('hidden');
    });

    document.getElementById('cancelAddPostButton').addEventListener('click', () => {
      document.getElementById('addPostModal').classList.add('hidden');
    });
  </script>
</body>
</html>

     
