<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    .tab-button {
      position: relative;
      padding-bottom: 4px;
    }

    .tab-button.active::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 3px;
      background-color: #4f46e5; /* Indigo color for underline */
      border-radius: 3px;
      transition: width 0.3s ease-in-out;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6 max-w-3xl">
    <!-- Toggle Navigation -->
    <div class="flex justify-center space-x-8 mb-8 border-b border-gray-200 pb-4">
      <button id="followersTab" class="tab-button text-lg font-semibold text-gray-600 active" onclick="showSection('followers')">
        Followers
      </button>
      <button id="followingTab" class="tab-button text-lg font-semibold text-gray-600" onclick="showSection('following')">
        Following
      </button>
    </div>

    <!-- Followers Section -->
    <div id="followersSection" class="bg-white rounded-lg shadow-md p-6 border border-gray-200 space-y-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Followers</h2>
      <div class="space-y-6">
        <!-- Follower Item 1 -->
        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
          <div class="flex items-center space-x-4">
            <img src="https://i.pinimg.com/474x/8e/16/19/8e16199929c4a57545af537dcd28a60e.jpg" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
            <div>
              <p class="text-lg font-semibold text-gray-800">geriwalker</p>
              <p class="text-gray-500 text-sm">Intuitive for art</p>
            </div>
          </div>
          <button onclick="toggleFollow(this)" class="bg-indigo-600 text-white px-4 py-2 rounded-full shadow hover:bg-indigo-700 transition duration-200">
            Follow
          </button>
        </div>

        <!-- Follower Item 2 -->
        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
          <div class="flex items-center space-x-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSn9ahvM1UyxQcSo9qd6ZVo7H5IaNVlUv6wBrzpUFyWN49P8MQwJM7mJU_whJTd4Sgo28&usqp=CAU" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
            <div>
              <p class="text-lg font-semibold text-gray-800">feature.art</p>
              <p class="text-gray-500 text-sm">Your feature heavenly art</p>
            </div>
          </div>
          <button onclick="toggleFollow(this)" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-full shadow hover:bg-gray-300 transition duration-200">
            Following
          </button>
        </div>

        <!-- Follower Item 3 -->
        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center space-x-4">
                  <img src="https://i.pinimg.com/236x/b3/82/7d/b3827d55254f65491b2b98f934866d40.jpg" alt="Profile picture" class="w-12 h-12 rounded-full object-cover">
                  <div>
                    <p class="text-lg font-semibold text-gray-800">arts.tech</p>
                    <p class="text-gray-500 text-sm">Art for your oil paint</p>
                  </div>
                </div>
                <button onclick="toggleFollow(this)" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-full shadow hover:bg-gray-300 transition duration-200">
                  Following
                </button>
              </div>
      </div>
    </div>

    <!-- Following Section -->
    <div id="followingSection" class="bg-white rounded-lg shadow-md p-6 border border-gray-200 space-y-6 hidden">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Following</h2>
      <div class="space-y-6">
        <!-- Following Item 1 -->
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
  </div>

  <!-- JavaScript for Tab Switching and Follow Toggle -->
  <script>
    function showSection(section) {
      const followersTab = document.getElementById('followersTab');
      const followingTab = document.getElementById('followingTab');
      const followersSection = document.getElementById('followersSection');
      const followingSection = document.getElementById('followingSection');

      if (section === 'followers') {
        followersTab.classList.add('active', 'text-indigo-600');
        followingTab.classList.remove('active', 'text-indigo-600');
        followersSection.classList.remove('hidden');
        followingSection.classList.add('hidden');
      } else {
        followingTab.classList.add('active', 'text-indigo-600');
        followersTab.classList.remove('active', 'text-indigo-600');
        followingSection.classList.remove('hidden');
        followersSection.classList.add('hidden');
      }
    }

    function toggleFollow(button) {
      if (button.textContent.trim() === 'Follow') {
        button.textContent = 'Following';
        button.classList.replace('bg-indigo-600', 'bg-gray-200');
        button.classList.replace('hover:bg-indigo-700', 'hover:bg-gray-300');
        button.classList.replace('text-white', 'text-gray-800');
      } else {
        button.textContent = 'Follow';
        button.classList.replace('bg-gray-200', 'bg-indigo-600');
        button.classList.replace('hover:bg-gray-300', 'hover:bg-indigo-700');
        button.classList.replace('text-gray-800', 'text-white');
      }
    }
  </script>
</body>
</html>
