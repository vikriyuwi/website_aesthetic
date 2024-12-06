<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <title>Post Comments</title>
</head>
<body class="bg-gray-100">
  <div class="max-w-screen-lg mx-auto">
    <!-- Post Section -->
    <div class="mt-8">
      <!-- Post Example -->
      <div class="bg-white p-4 rounded-lg shadow-md mb-4 border border-gray-300 relative cursor-pointer">
        <div class="flex items-center space-x-4">
          <img alt="Profile picture of the user" class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1592100231709-5b5c3e6bd667?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
          <div>
            <h2 class="text-lg font-bold">Something4U</h2>
            <p class="text-sm text-gray-600">Feb 27, 2023</p>
          </div>
        </div>
        <p class="mt-4 text-sm">I'll Hibernate for a while ;)</p>

        <!-- Image Container -->
        <div class="aspect-w-2 aspect-h-1 mt-4 rounded-lg overflow-hidden">
          <img alt="Post Content" class="object-cover w-full h-auto" src="https://images.unsplash.com/photo-1521220546621-cf34a1165c67?q=80&w=2952&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
        </div>

        <div class="mt-2 flex space-x-4 text-gray-600 text-xl">
          <button class="flex items-center space-x-1"><i class="far fa-heart"></i><span>20</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-comment"></i><span>15</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-white rounded-lg shadow-md p-4 mt-6">
      <h3 class="text-xl font-bold mb-4">Comments</h3>
      <div id="commentsSection" class="space-y-4 h-48 overflow-y-auto pr-2">
        <!-- Dynamic Comments -->
        <div class="flex space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1703925154666-7484e0ffbdc1?q=80&w=3136&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User Profile">
          <div>
            <p class="font-bold">Anya <span class="text-sm text-gray-600">1 month ago</span></p>
            <p class="text-gray-700 mt-1">The fantasy illustrations are pure magic!</p>
          </div>
        </div>
        <div class="flex space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://plus.unsplash.com/premium_photo-1719986266408-5cc1f7e07c1b?q=80&w=3095&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User Profile">
          <div>
            <p class="font-bold">Sam Jetstream <span class="text-sm text-gray-600">3 months ago</span></p>
            <p class="text-gray-700 mt-1">The neon-drenched streets are amazing!</p>
          </div>
        </div>
        <div class="flex space-x-4">
          <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1558624232-75ee22af7e67?q=80&w=2960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="User Profile">
          <div>
                <p class="font-bold">Aglio<span class="text-sm text-gray-600"> 1 minutes ago</span></p>
                <p class="text-gray-700 mt-1">Woowwwwww amazing!</p>
           </div>
        </div>
      </div>

      <!-- Add Comment Section -->
      <div class="mt-4">
        <label for="newComment" class="block text-gray-700 font-semibold mb-2">Add a Comment</label>
        <textarea id="newComment" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" placeholder="Write your comment..."></textarea>
        <button onclick="addComment()" class="mt-2 bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition">Post Comment</button>
      </div>
    </div>
  </div>

  <script>
    const commentsData = [
      { name: "Anya", date: "1 month ago", text: "The fantasy illustrations are pure magic!" },
      { name: "Sam Jetstream", date: "3 months ago", text: "The neon-drenched streets are amazing!" }
      { name: "Aglio", date: "1 minutes ago", text: "The neon-drenched streets are amazing!" }
    ];

    function addComment() {
      const commentText = document.getElementById('newComment').value.trim();
      if (commentText) {
        const newComment = {
          name: "You",
          date: "Just now",
          text: commentText,
        };
        commentsData.push(newComment);
        document.getElementById('newComment').value = '';
        renderComments();
      }
    }

    function renderComments() {
      const commentsSection = document.getElementById('commentsSection');
      commentsSection.innerHTML = '';
      commentsData.forEach(comment => {
        const commentElement = document.createElement('div');
        commentElement.classList.add('flex', 'space-x-4');
        commentElement.innerHTML = `
          <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/150" alt="${comment.name}">
          <div>
            <p class="font-bold">${comment.name} <span class="text-sm text-gray-600">${comment.date}</span></p>
            <p class="text-gray-700 mt-1">${comment.text}</p>
          </div>
        `;
        commentsSection.appendChild(commentElement);
      });
    }

    // Initial render
    renderComments();
  </script>
</body>
</html>
