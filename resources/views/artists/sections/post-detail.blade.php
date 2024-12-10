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
          <img alt="Profile picture of the user" class="w-10 h-10 rounded-full" src="{{ $post->Artist->MasterUser->Buyer->PROFILE_IMAGE_URL != null ? asset($post->Artist->MasterUser->Buyer->PROFILE_IMAGE_URL) : "https://placehold.co/100x100"}}">
          <div>
            <h2 class="text-lg font-bold">{{ $post->Artist->MasterUser->Buyer->FULLNAME }}</h2>
            <p class="text-sm text-gray-600">{{ (new \DateTime($post->created_at))->format('M d, Y') }}</p>
          </div>
        </div>
        <p class="mt-4 text-sm">{{ $post->CONTENT }}</p>

        <!-- Image Container -->
        @if($post->PostMedias->count() > 0)
        <div class="aspect-w-2 aspect-h-1 mt-4 rounded-lg overflow-hidden">
          <img alt="Post Content" class="aspect-inner w-full h-auto" src="{{ Str::startsWith($post->PostMedias()->first()->POST_MEDIA_PATH, 'images/post/') ? asset($post->PostMedias()->first()->POST_MEDIA_PATH) : $post->PostMedias()->first()->POST_MEDIA_PATH }}">
        </div>
        @endif

        <div class="mt-2 flex space-x-4 text-gray-600 text-xl">
          <button class="flex items-center space-x-1"><i class="far fa-heart"></i><span>{{ $post->PostLikes->count() }}</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-comment"></i><span>{{ $post->PostComments->count() }}</span></button>
          <button class="flex items-center space-x-1"><i class="far fa-share-square"></i><span>Share</span></button>
        </div>
      </div>
    </div>

    <!-- Comments Section -->
    <div class="bg-white rounded-lg shadow-md p-4 mt-6">
      <h3 class="text-xl font-bold mb-4">Comments</h3>
      <div id="commentsSection" class="space-y-4 h-48 overflow-y-auto pr-2">
        <!-- Dynamic Comments -->
        @foreach($post->PostComments as $comment)
        <div class="flex space-x-4">
          <img class="w-10 h-10 rounded-full" src="{{ $comment->MasterUser->Buyer->PROFILE_IMAGE_URL != null ? asset($comment->MasterUser->Buyer->PROFILE_IMAGE_URL) : "https://placehold.co/100x100"}}" alt="User Profile">
          <div>
            <p class="font-bold">{{ $comment->MasterUser->Buyer->FULLNAME }} <span class="text-sm text-gray-600">{{ (new \DateTime($comment->created_at))->format('M d, Y') }}</span> @if(Auth::user()->USER_ID == $comment->MasterUser->USER_ID) <a href="" class="text-red-700"><i class="fas fa-trash"></i></a> @endif</p>
            <p class="text-gray-700 mt-1">{{ $comment->CONTENT }}</p>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Add Comment Section -->
      <form action="{{ route('post.comment',['id'=>$post->POST_ID]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mt-4">
          <label for="commentContent" class="block text-gray-700 font-semibold mb-2">Add a Comment</label>
          <textarea id="commentContent" name="commentContent" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition" placeholder="Write your comment..."></textarea>
          <button type="submit" class="mt-2 bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 transition">Post Comment</button>
        </div>
      </form>
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
