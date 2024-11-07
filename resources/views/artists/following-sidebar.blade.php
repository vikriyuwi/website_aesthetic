<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Following</title>
</head>
<body class="bg-gray-100">
        <div class="container mx-auto p-6 max-w-3xl">
        <div id="followersSection" class="bg-white rounded-lg shadow-md p-6 border border-gray-200 space-y-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Following</h2>

        <div class="space-y-6">
            <!-- Sample Following Card -->
            <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
          <div class="flex items-center space-x-4">
            <img src="https://play-lh.googleusercontent.com/t2tJJ3PvHpZwSVH20B7zGBqcqMrUMnNpQ8re_BiS6vqdxboDm_RM_pcJvuRY-n8KvGA=w526-h296-rw" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
            <div>
              <p class="text-lg font-semibold text-gray-800">bio.artsy</p>
              <p class="text-gray-500 text-sm">Following bio snippet...</p>
            </div>
          </div>
          <button onclick="toggleFollow(this)" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-full shadow hover:bg-gray-300 transition duration-200">
            Following
          </button>
        </div>
            <!-- Repeat more following cards as needed -->
            <!-- Following Item 2 -->
        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
          <div class="flex items-center space-x-4">
            <img src="https://i.pinimg.com/236x/5e/f5/b5/5ef5b5465147514c10b85aa6d4845d11.jpg" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
            <div>
              <p class="text-lg font-semibold text-gray-800">belinda_oiling</p>
              <p class="text-gray-500 text-sm">Another following bio snippet...</p>
            </div>
          </div>
          <button onclick="toggleFollow(this)" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-full shadow hover:bg-gray-300 transition duration-200">
            Following
          </button>
        </div>
        </div>
    </div>

    <script>
        function toggleFollow(button) {
            if (button.classList.contains('bg-gray-200')) {
                button.classList.remove('bg-gray-200', 'text-gray-800');
                button.classList.add('bg-indigo-600', 'text-white');
                button.textContent = 'Follow';
            } else {
                button.classList.add('bg-gray-200', 'text-gray-800');
                button.classList.remove('bg-indigo-600', 'text-white');
                button.textContent = 'Following';
            }
        }
    </script>
</body>
</html>
