<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aesthetic</title>
    <!-- Updated to match artist list font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link href="{{ URL::asset('/css/output.css') }}" rel="stylesheet"> 
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 
    <style> 
        body {
            font-family: 'Roboto', sans-serif; /* Updated to Roboto */
            background-color: #f7f8fa;
            color: #333;
        }
        h1, h2, h3 {
            font-family: 'Roboto', sans-serif; /* Headings use the same font */
            color: #fff;
        }
        a {
            transition: color 0.3s ease, background-color 0.3s ease;
        }
    </style>
</head>
<body>

<!-- Navbar Start -->
<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-3xl font-semibold italic text-gray-800">
            <a href="#" class="hover:no-underline">
                <img src="images/aestheticlogo.png" alt="Aesthetic Logo" class="h-12">
            </a>
        </div>
        <ul class="flex space-x-8 text-gray-700">
            <li><a href="#" class="hover:text-indigo-600">Home</a></li>
            <li><a href="{{ url('explore') }}" class="hover:text-indigo-600">Explore</a></li>
            <li><a href="{{ url('artists') }}" class="hover:text-indigo-600">Artist</a></li>
            <li><a href="#art-gallery" class="hover:text-indigo-600">Art Gallery</a></li>
        </ul>           
        <div>
            <a href="#" class="mr-4 text-gray-700 hover:text-indigo-600">Sign In</a>
            <a href="#" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700">Join</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->


    <!-- Home Page Start -->
    <section id="artists" class="relative bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
        <div class="relative w-full h-[80vh] overflow-hidden flex items-center justify-center">
            <!-- Carousel -->
            <div class="relative w-full h-full">
                <div class="absolute inset-0 bg-white opacity-50"></div>
                <div class="relative w-full h-full flex transition-transform" id="carousel">
                    <!-- Slide 1 -->
                    <img src="images/homepage6.JPG" alt="Art Image 1" class="w-full h-full object-cover rounded-lg flex-shrink-0 opacity-75">
                    <!-- Slide 2 -->
                    <img src="images/homepage7.JPG" alt="Art Image 2" class="w-full h-full object-cover rounded-lg flex-shrink-0 opacity-75">
                    <!-- Slide 3 -->
                    <img src="images/homepage3.jpeg" alt="Art Image 3" class="w-full h-full object-cover rounded-lg flex-shrink-0 opacity-75">
                </div>
                <!-- Overlay Text -->
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-8 z-10 text-white">
                  <h1 id="typing-text" class="text-5xl md:text-6xl font-extrabold leading-tight mb-4">
                      DISCOVER EVERY ART THROUGH VARIOUS DESIGNER
                  </h1>
                  <p class="text-lg md:text-xl mb-6 max-w-2xl">
                      Embark on an Artistic Odyssey: Navigate the Expressive Universes Crafted by Our Featured Designers
                  </p>
                  <a href="#" class="bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600">Explore</a>
              </div>
              
            <!-- Left Arrow -->
            <button id="prev" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-3 bg-white bg-opacity-50 rounded-full hover:bg-opacity-75 z-10">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <!-- Right Arrow -->
            <button id="next" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-3 bg-white bg-opacity-50 rounded-full hover:bg-opacity-75 z-10">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>
    <!-- Home Page End -->

    <!-- Services Section Start -->
    <section id="explore" class="py-16 bg-white scroll-animation">
        <div class="container mx-auto flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/2 px-4">
                <h2 class="text-4xl font-bold text-gray-800 leading-tight">
                    The Perfect Home For Designers and Art Enthusiasts
                </h2>
            </div>
            <div class="w-full md:w-1/2 px-4">
                <p class="text-gray-600 mb-4">
                    Crafting Inspiring Designs is Our Expertise. We elevate your vision with captivating Poster Designs, Distinctive Logo Creations, and Custom Commissions. <span class="font-bold">Your satisfaction and creative vision are our top priorities</span>.
                </p>
                <p class="text-gray-600 mb-6">
                    We provide a variety of <span class="font-bold">professional services</span> including Animation Work, 3D Art Design, and Custom Art Commissions.
                </p>
                <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700">See All Services</a>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Additional Services Section Start -->
    <section id="art-gallery" class="py-16 bg-gray-100 scroll-animation">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center">
                <!-- Card 1 -->
                <div class="w-full md:w-1/2 lg:w-1/5 p-4">
                    <a href="#" class="block bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">Poster Design</h3>
                            <p class="text-gray-600 mb-4">
                                Our poster design service is curated by seasoned professionals, ensuring every detail is meticulously crafted to convey your message effectively and leave a lasting impression on your audience.
                            </p>
                        </div>
                        <img src="images/poster-design.PNG" alt="Poster Design" class="w-full h-70 object-cover">
                    </a>
                </div>
                <!-- Card 2 -->
                <div class="w-full md:w-1/2 lg:w-1/5 p-4">
                    <a href="#" class="block bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">3D Art Design</h3>
                            <p class="text-gray-600 mb-4">
                                Our 3D art service brings ideas to life with captivating visuals, offering immersive experiences that elevate your brand or project to new heights.
                            </p>
                        </div>
                        <img src="images/3d-art.jpeg" alt="3D Art Design" class="w-full h-70 object-cover">
                    </a>
                </div>
                <!-- Card 3 -->
                <div class="w-full md:w-1/2 lg:w-1/5 p-4">
                    <a href="#" class="block bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">Animation Work</h3>
                            <p class="text-gray-600 mb-4">
                                Our animation service breathes life into your ideas, delivering captivating visuals that engage and inspire, elevating your brand or project with dynamic storytelling.
                            </p>
                        </div>
                        <img src="images/animate-art.jpeg" alt="Animation Work" class="w-full h-90 object-cover">
                    </a>
                </div>
                <!-- Card 4 -->
                <div class="w-full md:w-1/2 lg:w-1/5 p-4">
                    <a href="#" class="block bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">Custom Art Commission</h3>
                            <p class="text-gray-600 mb-4">
                                Our custom art commission service brings your vision to life, with personalized creations tailored to your style and preferences.
                            </p>
                        </div>
                        <img src="images/custom-art.jpeg" alt="Custom Art Commission" class="w-full h-90 object-cover">
                    </a>
                </div>
                <!-- Card 5 -->
                <div class="w-full md:w-1/2 lg:w-1/5 p-4">
                    <a href="#" class="block bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-gray-800">Logo Creation</h3>
                            <p class="text-gray-600 mb-4">
                                Our logo creation service delivers distinctive designs that embody your brand identity, crafted with precision to leave a lasting impression and elevate your business presence.
                            </p>
                        </div>
                        <img src="images/logo-art.png" alt="Logo Creation" class="w-full h-70 object-cover">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Additional Services Section End -->

    <!-- Featured Section Start -->
    <section id="home" class="py-16 bg-white scroll-animation">
        <div class="container mx-auto">
            <!-- First Row: Large Image with Text Overlay -->
            <div class="relative mb-16">
                <img src="images/art-gallery.jpeg" alt="Art Gallery" class="w-full h-96 object-cover rounded-lg">
                <div class="absolute inset-0 flex flex-col justify-center items-start text-white p-8 bg-black bg-opacity-50 rounded-lg">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Dive Into The Exquisite Realm of Imagination and Discover The Boundless Beauty of Creativity In Our Art Gallery</h2>
                    <p class="text-lg mb-6">Your Journey through the Masterpieces Begins Here.</p>
                    <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700">Discover Now</a>
                </div>
            </div>

            <!-- Second Row: Image with Text Beside It -->
            <div class="flex flex-wrap md:flex-nowrap items-center space-y-4 md:space-y-0 md:space-x-4">
                <img src="images/acution.jpeg" alt="Art Auction" class="w-full md:w-1/2 h-80 object-cover rounded-lg hover:scale-105 transition">
                <div class="w-full md:w-1/2">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Embrace Elegance, Own Excellence: The Irresistible Allure of Art Auctions</h2>
                    <p class="text-gray-600 mb-6">Unlock the Thrill of Art Acquisition: Why Art Auctions Are Your Gateway to Rare Finds, Investment Opportunities, and Immersive Cultural Experiences.</p>
                    <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-full hover:bg-indigo-700">Explore More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Community Board and Tips Section Start -->
<section id="community-board" class="py-16 bg-white">
   <div class="container mx-auto">
       <div class="flex flex-wrap md:flex-nowrap space-y-6 md:space-y-0 md:space-x-12">
           <!-- Community Board Section -->
           <div class="w-full md:w-2/3">
               <h2 class="text-3xl font-bold text-indigo-800 mb-6">Join Our Community Board</h2>
               <p class="text-gray-600 mb-6">
                   Connect, collaborate, and create on our Community Board—a vibrant space for artists to ask questions, exchange ideas, seek collaborations, and share their artistic journeys with a community that shares their passion.
               </p>
               <img src="images/Assets/Homepage & Explore/Interested to be a designer.jpeg" alt="Community Board" class="w-full h-48 object-cover rounded-xl shadow-lg mb-6 transform hover:scale-105 transition">
               <a href="#" class="inline-block bg-indigo-600 text-white px-5 py-3 rounded-full hover:bg-indigo-700 transition">Learn More →</a>
           </div>
           <!-- Separator Line -->
           <div class="hidden md:block w-px bg-gray-300"></div>
           <!-- Tips, Trends, and Guides Section -->
           <div class="w-full md:w-1/3">
               <h2 class="text-2xl font-bold text-indigo-800 mb-6">Tips, Trends, and Guides</h2>
               <div class="space-y-6">
                   <!-- Tip 1 -->
                   <div class="flex items-center">
                       <img src="images/Assets/Gallery/12.jpg" alt="Tip 1" class="w-20 h-20 object-cover rounded-xl shadow-lg mr-6 transform hover:scale-105 transition">
                       <div>
                           <h3 class="text-gray-800 font-semibold mb-1">5 helpful tips to make good illustrations</h3>
                           <p class="text-gray-500 text-sm">2 weeks ago | Langa</p>
                       </div>
                   </div>
                   <!-- Tip 2 -->
                   <div class="flex items-center">
                       <img src="images/Assets/Gallery/7.jpg" alt="Tip 2" class="w-20 h-20 object-cover rounded-xl shadow-lg mr-6 transform hover:scale-105 transition">
                       <div>
                           <h3 class="text-gray-800 font-semibold mb-1">10 simple illustration examples</h3>
                           <p class="text-gray-500 text-sm">2 months ago | Langa</p>
                       </div>
                   </div>
                   <!-- Tip 3 -->
                   <div class="flex items-center">
                       <img src="images/Assets/Gallery/1.jpg" alt="Tip 3" class="w-20 h-20 object-cover rounded-xl shadow-lg mr-6 transform hover:scale-105 transition">
                       <div>
                           <h3 class="text-gray-800 font-semibold mb-1">How to make a simple logo brand</h3>
                           <p class="text-gray-500 text-sm">3 months ago | Langa</p>
                       </div>
                   </div>
               </div>
               <a href="#" class="text-indigo-600 font-semibold hover:underline mt-8 block">Take Me to the Blog →</a>
           </div>
       </div>
   </div>
</section>

    <!-- CTA Section Start -->
    <section id="cta-section" class="relative py-20 bg-gradient-to-b from-white to-white white-900 to-white-800 scroll-animation">
       <div class="container mx-auto">
           <div class="relative rounded-lg overflow-hidden shadow-lg">
               <img src="images/sign-in-cta.jpeg" alt="Star Background" class="w-full h-80 object-cover">
               <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-start text-white p-10">
                   <h2 class="text-3xl md:text-4xl font-extrabold mb-5 leading-tight">
                       Suddenly Grasping Your Elusive Stars Becomes a Tangible Reality
                   </h2>
                   <a href="#" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:from-blue-600 hover:to-purple-700 transform hover:scale-105 transition-transform duration-300">
                       Sign In
                   </a>
               </div>
           </div>
       </div>
    </section>
    <!-- CTA Section End -->

    <!-- Footer Start -->
    <footer class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between border-b border-gray-300 pb-8">
                <!-- About Section -->
                <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">About</h4>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">About us</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Privacy Policy</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Terms of Service</a></li>
                    </ul>
                </div>
                <!-- Community Section -->
                <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Community</h4>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Community Hub</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Forum</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Events</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Blog</a></li>
                    </ul>
                </div>
                <!-- Categories Section -->
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
                <!-- Find Us Section -->
                <div class="w-full sm:w-1/2 md:w-1/4 mb-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Find Us</h4>
                    <ul>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Contact Info</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Contact Sales</a></li>
                        <li class="mb-2"><a href="#" class="text-gray-700 hover:text-indigo-600">Email</a></li>
                    </ul>
                    <!-- Social Media Icons -->
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
                <!-- Copyright -->
                <p class="text-gray-600 text-sm mb-4 md:mb-0">©2023 Aesthetic All Rights Reserved</p>
                <!-- Logo -->
                <div class="text-2xl font-semibold italic text-gray-900">Aesthetic</div>
            </div>
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
    </script>
</body>
</html>
