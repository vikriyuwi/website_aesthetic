<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile - Aesthetic</title>
    

  <!-- Import Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@400;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="{{ URL::asset('/css/output.css') }}" rel="stylesheet">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #f7f8fa;
      color: #333;
      margin: 0;
      padding: 0;
    }

    /* Hero Section Styles */
    #hero {
      width: 100%;
      height: 400px;
      background-image: url({{ URL::asset('/images/header.png') }}); /* Replace with your image path */
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
      z-index: 0;
    }

    #hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.2); /* Dark overlay */
      z-index: 1;
    }

    #hero .content {
      position: relative;
      z-index: 2;
    }

    #hero h1 {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    #hero p {
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
    }

    /* Profile Section */
    .profile-container {
      display: flex;
      max-width: 1200px;
      margin: -80px auto 20px;
      padding: 0 20px;
      gap: 20px;
      position: relative;
      z-index: 10;
    }

    .profile-card {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 280px;
      flex-shrink: 0;
      position: relative;
      z-index: 10;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      border: 2px solid #e5e7eb;
    }

    .profile-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .profile-info {
      text-align: center;
      font-family: 'Chivo', sans-serif;
      margin-bottom: 10px; /* Reduce space between sections */
    }

    .profile-info h2 {
      font-size: 1.25rem; /* Reduced font size for better fit */
      font-weight: 700;
      margin: 5px 0; /* Reduce margin */
    }

    .profile-info p {
      font-size: 0.875rem;
      color: #6B7280;
      margin: 0 0 8px; /* Reduce margin between lines */
    }

    .follow-btn,
    .message-btn {
      display: block;
      width: 100%;
      padding: 8px; /* Reduce padding for a tighter fit */
      border-radius: 5px;
      margin: 5px 0; /* Reduce gap between buttons */
      font-weight: bold;
      text-align: center;
      cursor: pointer;
      font-family: 'Inter', sans-serif;
      transition: background-color 0.3s ease;
    }

    .follow-btn {
      background-color: #10B981;
      color: white;
    }

    .message-btn {
      background-color: white;
      color: #4F46E5;
      border: 1px solid #4F46E5;
    }

    .follow-btn:hover {
      background-color: #0E9E79;
    }

    .message-btn:hover {
      background-color: #4F46E5;
      color: white;
    }

    .stats {
      margin-top: 10px; /* Reduce space between stats and buttons */
      font-size: 0.875rem;
      width: 100%; /* Align with the profile card width */
      text-align: left; /* Align text to the left for stats */
    }

    .stats p {
      color: #6B7280;
      margin: 2px 0; /* Reduce spacing between stat lines */
    }

    .social-icons {
      display: flex;
      justify-content: space-around;
      margin-top: 10px; /* Reduce space above social icons */
      width: 100%;
    }

    .social-icons a {
      color: #4B5563;
      font-size: 1.25rem;
      transition: color 0.3s ease;
    }

    .social-icons a:hover {
      color: #4F46E5;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px; 
      position: relative;
      z-index: 10;
      background-color: #f7f8fa; 
    }

    .nav-tabs {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      border-bottom: 1px solid #e5e7eb;
      margin-bottom: 20px;
      padding: 10px 0;
      gap: 20px;
      font-family: 'Inter', sans-serif;
    }

    .nav-tabs a {
      color: #374151;
      padding: 10px;
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      transition: color 0.3s, font-weight 0.3s;
    }

    .nav-tabs a:hover,
    .nav-tabs a.active {
      color: #4F46E5;
      font-weight: bold;
    }

    .section-title {
      font-family: 'Chivo', sans-serif;
      font-size: 1.25rem;
      font-weight: 600;
      color: #111827;
      margin: 20px 0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .section-title a {
      font-size: 0.875rem;
      color: #4F46E5;
      text-decoration: none;
      font-weight: 600;
    }

    .section-title a:hover {
      text-decoration: underline;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 1.5rem;
    }

    .grid img {
      width: 100%;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .grid img:hover {
      transform: scale(1.05);
    }

    .community-grid {
      display: grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 1rem;
      margin-top: 20px;
    }

    .community-card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 10px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .community-card img {
      width: 100px; /* Adjust width as needed */
      height: 100px; /* Adjust height as needed */
      border-radius: 8px;
      margin-bottom: 8px;
    }

    .community-card p {
      margin: 0;
      font-size: 0.9rem;
      color: #333;
    }

    .posts {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 20px; /* Space between stats and posts */
    }

    .post-card {
      background-color: white;
      padding: 1rem;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .post-card img {
      width: 60px;
      height: 60px;
      border-radius: 0.5rem;
      margin-right: 1rem;
    }

    .post-card p {
      font-size: 0.875rem;
      color: #4B5563;
      margin: 0;
    }

    .post-card:hover {
      transform: translateY(-5px);
      transition: transform 0.3s ease;
    }

  </style>
</head>
<body>
     <!-- Navbar Start -->
  <nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <div class="text-3xl font-semibold italic text-gray-800">
        <a href="{{ url('landing') }}" class="hover:no-underline">
          <img src="{{ asset('images/aestheticlogo.png') }}" alt="Aesthetic Logo" class="h-12">
        </a>
      </div>
      <ul class="flex space-x-8 text-gray-700">
        <li><a href="{{ url('landing') }}" class="hover:text-indigo-600">Home</a></li>
        <li><a href="{{ url('explore') }}" class="hover:text-indigo-600">Explore</a></li>
        <li><a href="#" class="hover:text-indigo-600">Artist</a></li>
        <li><a href="#art-gallery" class="hover:text-indigo-600">Art Gallery</a></li>
      </ul>
      <div>
        <a href="{{ url('login') }}" class="mr-4 text-gray-700 hover:text-indigo-600">Sign In</a>
        <a href="#" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700">Join</a>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Hero Section Start -->
  <section id="hero">
    <div class="content">
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Profile Section -->
  <div class="profile-container">
    <div class="profile-card">
      <div class="profile-info">
        <img src="/images/Assets/About me/sam.jpg" alt="Artist Profile">
        <h2>Something4U</h2>
        <p>Freelance Illustrator<br>Fantasy, Cyberpunk, Retro Illustrator</p>
        <p><i class="fas fa-map-marker-alt"></i> Singapore</p>
      </div>
      <button class="follow-btn">Follow</button>
      <button class="message-btn">Message</button>
      <div class="stats">
        <p>Hire Something4U</p>
        <p>Freelance/Project</p>
        <p>Project Views: 225,210</p>
        <p>Likes: 149,518</p>
        <p>Followers: 85,518</p>
        <p>Following: 1,490</p>
        <p>Artist Overall Rating: +4.9</p>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-pinterest"></i></a>
        <a href="#"><i class="fab fa-behance"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
      </div>
      
      <!-- Posts Section (Moved into Profile Card) -->
      <div class="posts">
        <div class="section-title">
          <span>Posts</span>
          <a href="#">See all</a>
        </div>
        <div class="post-card">
          <img src="/images/Assets/Other Content/Comment/2.jpg" alt="Post Image">
          <p>I'll hibernate for a while :)</p>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="nav-tabs">
        <a href="#" class="active">Home</a>
        <a href="#">Portfolio</a>
        <a href="#">Collection</a>
        <a href="#">Posts</a>
        <a href="#">Community</a>
        <a href="#">About</a>
      </div>

      <!-- Latest Works Section -->
      <div>
        <div class="section-title">
          <span>Latest Works</span>
          <a href="#">See all</a>
        </div>
        <div class="grid">
          <img src="/images/Assets/Gallery/1.jpg" alt="Artwork 1">
          <img src="/images/Assets/Gallery/10.jpg" alt="Artwork 2">
          <img src="/images/Assets/Gallery/11.jpg" alt="Artwork 3">
        </div>
      </div>

      <!-- Portfolio Section -->
      <div>
        <div class="section-title">
          <span>Portfolio</span>
          <a href="#">See all</a>
        </div>
        <div class="grid">
          <img src="/images/Assets/Gallery/12.jpg" alt="Portfolio 1">
          <img src="/images/Assets/Gallery/2.jpg" alt="Portfolio 2">
          <img src="/images/Assets/Gallery/3.jpg" alt="Portfolio 3">
        </div>
      </div>

      <!-- Community Section -->
      <div>
        <div class="section-title">
          <span>Community</span>
          <a href="#">See all</a>
        </div>
        <div class="community-grid">
          <div class="community-card">
            <img src="/images/Assets/Gallery/4.jpg" alt="Community 1">
            <p>Night Owl Community</p>
          </div>
          <div class="community-card">
            <img src="/images/Assets/Community/Media/Photos/Media 1.jpg" alt="Community 2">
            <p>Ivory Hive Inc</p>
          </div>
          <div class="community-card">
            <img src="/images/Assets/Community/Media/Photos/Media 2.jpg" alt="Community 3">
            <p>Sojka Za Morze</p>
          </div>
          <div class="community-card">
            <img src="/images/Assets/Community/Media/Photos/Media 3.jpg" alt="Community 4">
            <p>Lumberjack</p>
          </div>
          <div class="community-card">
            <img src="/images/Assets/Community/Media/Photos/Media 14.jpg" alt="Community 5">
            <p>GoW Community</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Start -->
  <footer class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
      <div class="flex flex-wrap justify-between border-b border-gray-300 pb-8">
        <!-- Footer content here -->
      </div>
      <div class="flex flex-col md:flex-row justify-between items-center mt-8">
        <p class="text-gray-600 text-sm mb-4 md:mb-0">©2023 Aesthetic All Rights Reserved</p>
        <div class="text-2xl font-semibold italic text-gray-900">Aesthetic</div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- JavaScript for Interactivity -->
  <script>
    // JavaScript to handle hover effects and active tab switching
    document.querySelectorAll('.nav-tabs a').forEach(tab => {
      tab.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelectorAll('.nav-tabs a').forEach(tab => tab.classList.remove('active'));
        this.classList.add('active');
      });
    });

    // JavaScript for interactive elements (e.g., like buttons)
    document.querySelectorAll('.post-card').forEach(card => {
      card.addEventListener('mouseover', () => {
        card.style.transform = 'translateY(-5px)';
        card.style.transition = 'transform 0.3s ease';
      });

      card.addEventListener('mouseout', () => {
        card.style.transform = 'translateY(0)';
      });
    });

    // JavaScript for dynamically updating the hero image
    function updateHeroImage(imageUrl) {
      document.getElementById('hero').style.backgroundImage = `url('${imageUrl}')`;
    }
  </script>
</body>
</html>