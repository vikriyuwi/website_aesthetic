<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore - Aesthetic</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 
    <link href="{{ URL::asset('/css/output.css') }}" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f7f8fa;
            color: #333;
        }
        h1, h2, h3 {
            font-family: 'San Fransisco', serif;
            color: #fff;
        }
        a {
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        .scroll-animation {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        .scroll-animation.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* Hero Section Styles */
        #hero {
            background: url('../images/your-hero-image.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
        }
        #hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Dark overlay */
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
        /* Filter and Sort Area */
        .filter-sort-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 1.5rem;
        }
        .filter-sort-area select, .filter-sort-area button {
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #E5E7EB;
            background-color: white;
            color: #374151;
        }
        .filter-sort-area select:focus, .filter-sort-area button:focus {
            outline: none;
            border-color: #4F46E5;
        }
        .filter-sort-area select:hover, .filter-sort-area button:hover {
            background-color: #F3F4F6;
        }
        /* Gallery Grid */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 1rem;
        }
        .card-content h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #111827;
        }
        .card-content p {
            font-size: 0.875rem;
            color: #6B7280;
        }
        .card-content .stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.75rem;
        }
        .card-content .stats svg {
            margin-right: 0.25rem;
        }
        .card-content .stats .likes,
        .card-content .stats .views {
            display: flex;
            align-items: center;
            color: #6B7280;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<!-- Navbar Start -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-3xl font-semibold italic text-gray-800">
            <a href="{{ url('landing') }}" class="hover:no-underline">
                <img src="../images/aestheticlogo.png" alt="Aesthetic Logo" class="h-12">
            </a>
        </div>
        <ul class="flex space-x-8 text-gray-700">
            <li><a href="{{ url('landing') }}" class="hover:text-indigo-600">Home</a></li>
            <li><a href="#" class="hover:text-indigo-600">Explore</a></li>
            <li><a href="{{ url('artist') }}" class="hover:text-indigo-600">Artist</a></li>
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
        <h1>Discover Inspiring Design Ideas</h1>
        <p>Find The Perfect Design For Your Next Project</p>
    </div>
</section>
<!-- Hero Section End -->

<!-- Filter and Sort Area Start -->
<div class="container mx-auto px-6 filter-sort-area">
    <div>
        <span class="text-lg font-semibold">10,000+ Assets</span>
    </div>
    <div class="flex space-x-4">
        <select id="categoryFilter">
            <option value="all">All</option>
            <option value="poster">Poster Design</option>
            <option value="logo">Logo Design</option>
            <option value="3d-art">3D Art</option>
            <option value="animation">Animation</option>
            <option value="commission">Commission</option>
        </select>
        <select>
            <option>Sort by likes</option>
            <option>Most Recent</option>
            <option>Trending</option>
        </select>
    </div>
</div>
<!-- Filter and Sort Area End -->

<!-- Art Gallery Grid Start -->
<section id="art-gallery" class="py-8 bg-gray-100">
    <div class="container mx-auto gallery-grid">
        <!-- Animation Category -->
        <div class="card category-animation">
            <img src="/images/Assets/Category/Hero.jpg" alt="Night Kingdom of Fantasy">
            <div class="card-content">
                <h3>Night Kingdom of Fantasy</h3>
                <p>Mike Hawk</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        500
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        5.2K
                    </div>
                </div>
            </div>
        </div>

        <!-- 3D Art Category -->
        <div class="card category-3d-art">
            <img src="/images/Assets/Category/Content/6.jpg" alt="Painting The Sky Fantasy">
            <div class="card-content">
                <h3>Painting The Sky Fantasy</h3>
                <p>Mike Hawk</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        500
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        5.2K
                    </div>
                </div>
            </div>
        </div>

        <!-- Commission Category -->
        <div class="card category-commission">
            <img src="/images/Assets/Category/Content/7.jpg" alt="Commission Art">
            <div class="card-content">
                <h3>Commission Art</h3>
                <p>Jane Doe</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        400
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        4.5K
                    </div>
                </div>
            </div>
        </div>

        <!-- Poster Design Category -->
        <div class="card category-poster">
            <img src="/images/Assets/Category/Content/4.jpg" alt="Creative Poster Design">
            <div class="card-content">
                <h3>Creative Poster Design</h3>
                <p>Artist: Anna Smith</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        350
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        3.8K
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Design Category -->
        <div class="card category-logo">
            <img src="/images/Assets/Category/Content/5.jpg" alt="Innovative Logo Design">
            <div class="card-content">
                <h3>Innovative Logo Design</h3>
                <p>Artist: John Doe</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        470
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        4.9K
                    </div>
                </div>
            </div>
        </div>

        <!-- Illustration Art Category -->
        <div class="card category-illustration">
            <img src="/images/Assets/Category/Content/3.jpg" alt="Beautiful Illustration Art">
            <div class="card-content">
                <h3>Beautiful Illustration Art</h3>
                <p>Artist: Emily Rose</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        600
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        5.5K
                    </div>
                </div>
            </div>
        </div>

        <!-- Animation Category (Another Item) -->
        <div class="card category-animation">
            <img src="/images/Assets/Category/Content/2.jpg" alt="Dynamic Animation Art">
            <div class="card-content">
                <h3>Dynamic Animation Art</h3>
                <p>Artist: Mark Lee</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        800
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        6.7K
                    </div>
                </div>
            </div>
        </div>

        <!-- Commission Category (Another Item) -->
        <div class="card category-commission">
            <img src="/images/Assets/Category/Content/1.jpg" alt="Personalized Commission Art">
            <div class="card-content">
                <h3>Personalized Commission Art</h3>
                <p>Artist: Sarah Brown</p>
                <div class="stats">
                    <div class="likes">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 9l-2 1-2-1V5a2 2 0 012-2h0a2 2 0 012 2v4z" />
                        </svg>
                        530
                    </div>
                    <div class="views">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                        5.8K
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Art Gallery Grid End -->

<!-- Footer Start -->
<footer class="bg-gray-100 py-12">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between border-b border-gray-300 pb-8">
            <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">About</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">About us</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Terms of Service</a></li>
                </ul>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Community</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Community Hub</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Forum</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Events</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Blog</a></li>
                </ul>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Categories</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Poster Design</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Logo Design</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">3D Art Design</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Animation Design</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Illustration Art</a></li>
                </ul>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                <h4 class="text-lg font-semibold text-gray-900 mb-4">Find Us</h4>
                <ul>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Contact Info</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Contact Sales</a></li>
                    <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Email</a></li>
                </ul>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-indigo-600 transition">
                        <i class="fab fa-xing"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mt-8">
            <p class="text-gray-600 text-sm mb-4 md:mb-0">©2023 Aesthetic All Rights Reserved</p>
            <div class="text-2xl font-semibold italic text-gray-900">Aesthetic</div>
        </div>
    </footer>
    <!-- Footer End -->

    <script>
        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('.scroll-link').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Typing Effect for Heading
        const typingText = document.getElementById('typing-text');
        const textArray = typingText.textContent.split('');
        typingText.textContent = '';
        let i = 0;
        const typingEffect = setInterval(() => {
            if (i < textArray.length) {
                typingText.textContent += textArray[i];
                i++;
            } else {
                clearInterval(typingEffect);
            }
        }, 100);

        // Carousel Auto-Sliding
        const slides = document.querySelectorAll('#carousel img');
        const totalSlides = slides.length;
        let currentIndex = 0;

        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const carousel = document.getElementById('carousel');

        function updateSlide(newIndex) {
            carousel.style.transform = `translateX(-${newIndex * 100}%)`;
            currentIndex = newIndex;
        }

        prevButton.addEventListener('click', () => {
            const newIndex = currentIndex > 0 ? currentIndex - 1 : totalSlides - 1;
            updateSlide(newIndex);
        });

        nextButton.addEventListener('click', () => {
            const newIndex = currentIndex < totalSlides - 1 ? currentIndex + 1 : 0;
            updateSlide(newIndex);
        });

        let autoSlideInterval = setInterval(() => {
            const newIndex = currentIndex < totalSlides - 1 ? currentIndex + 1 : 0;
            updateSlide(newIndex);
        }, 5000);

        carousel.addEventListener('mouseover', () => clearInterval(autoSlideInterval));
        carousel.addEventListener('mouseout', () => {
            autoSlideInterval = setInterval(() => {
                const newIndex = currentIndex < totalSlides - 1 ? currentIndex + 1 : 0;
                updateSlide(newIndex);
            }, 5000);
        });

        // Scroll Animations
        const scrollElements = document.querySelectorAll('.scroll-animation');
        
        const elementInView = (el, dividend = 1) => {
            const elementTop = el.getBoundingClientRect().top;
            return (
                elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
            );
        };
        
        const displayScrollElement = (element) => {
            element.classList.add('is-visible');
        };
        
        const handleScrollAnimation = () => {
            scrollElements.forEach((el) => {
                if (elementInView(el, 1.25)) {
                    displayScrollElement(el);
                }
            });
        };
        
        window.addEventListener('scroll', () => {
            handleScrollAnimation();
        });

        handleScrollAnimation();

        // Filter Gallery by Category
        const categoryFilter = document.getElementById('categoryFilter');
        const cards = document.querySelectorAll('.card');

        categoryFilter.addEventListener('change', function() {
            const selectedCategory = this.value;

            cards.forEach(card => {
                if (selectedCategory === 'all' || card.classList.contains(`category-${selectedCategory}`)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
