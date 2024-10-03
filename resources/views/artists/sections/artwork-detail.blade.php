<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $artwork['title'] }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/react/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
            background-color: #4c1d95;
            color: #fff;
        }

        .carousel-button:hover {
            background-color: #6b7280;
        }

        .image-thumbnail:hover {
            transform: scale(1.1);
        }

        .share-icons i:hover {
            transform: scale(1.2);
            color: #4c1d95;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
        <!-- Navbar -->
    @include('layouts.navbar')
    <div id="root"></div>

    <script type="text/babel">
        const App = () => {
            const handleAddToCart = () => {
                alert('Item added to cart!');
            };

            const handleContactArtist = () => {
                alert('Contacting artist...');
            };

            return (
                <div className="max-w-6xl mx-auto p-4">
                    {/* Breadcrumb Navigation */}
                    <nav className="flex items-center space-x-2 text-sm text-gray-500 mb-4">
                        <a href="/" className="hover:underline">home</a>
                        <span>/</span>
                        <a href="/category" className="hover:underline">{{ $artwork['category'] }}</a>
                        <span>/</span>
                        <span className="text-gray-800">{{ $artwork['title'] }}</span>
                    </nav>

                    {/* Main content */}
                    <div className="flex flex-col lg:flex-row space-y-4 lg:space-y-0">
                        {/* Artwork Image */}
                        <div className="lg:w-2/3">
                            <img src="{{ asset('images/' . $artwork['image']) }}" alt="{{ $artwork['title'] }}"
                                className="w-full mb-4 lg:mb-0 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300" />
                            {/* Thumbnail Gallery */}
                            <div className="flex space-x-2 justify-center mt-4">
                                <button className="carousel-button p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition-all">
                                    <i className="fas fa-chevron-left"></i>
                                </button>
                                <div className="flex space-x-2">
                                    <img src="https://placehold.co/100x100" alt="Thumbnail 1"
                                        className="image-thumbnail w-16 h-16 rounded-lg border hover:scale-105 transition-transform" />
                                    <img src="https://placehold.co/100x100" alt="Thumbnail 2"
                                        className="image-thumbnail w-16 h-16 rounded-lg border hover:scale-105 transition-transform" />
                                </div>
                                <button className="carousel-button p-2 bg-gray-200 rounded-full hover:bg-gray-300 transition-all">
                                    <i className="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        {/* Artwork Details */}
                        <div className="lg:w-1/3 lg:pl-8 space-y-4">
                            {/* Artist Name */}
                            <div className="flex items-center mb-4">
                                <img src="https://placehold.co/50x50" alt="{{ $artwork['artist'] }}"
                                    className="w-10 h-10 rounded-full mr-2" />
                                <div>
                                    <span className="text-sm text-gray-500">{{ $artwork['artist'] }}</span>
                                </div>
                            </div>

                            {/* Artwork Title */}
                            <h2 className="text-2xl font-bold text-black-700">{{ $artwork['title'] }}</h2>

                            {/* Artwork Medium and Details */}
                            <div className="flex items-center space-x-2 mb-4">
                                <span className="text-sm text-gray-500">{{ $artwork['medium'] }}</span>
                                <span className="text-sm text-gray-500">•</span>
                                <button className="text-sm text-violet-500 hover:underline">+ More details</button>
                            </div>

                            {/* Price and Action Buttons */}
                            <div className="text-4xl font-bold text-gray-900 mb-4">{{ $artwork['price'] }}</div>

                            <button
                                className="bg-violet-500 text-white py-2 px-4 rounded-lg w-full mb-4 hover:bg-violet-600 transition-all btn">
                                BUY NOW
                            </button>
                            <button
                                className="border border-violet-500 text-violet-500 py-2 px-4 rounded-lg w-full mb-4 hover:bg-violet-50 transition-all btn"
                                onClick={handleContactArtist}>
                                CONTACT {{ strtoupper($artwork['artist']) }}
                            </button>

                            {/* Add to Cart */}
                            <button
                                className="flex items-center justify-center space-x-2 text-gray-500 hover:text-violet-500 transition-all btn"
                                onClick={handleAddToCart}>
                                <i className="fas fa-shopping-cart"></i>
                                <span>Add to Cart</span>
                            </button>

                            {/* Share and Report */}
                            <div className="border-t border-gray-300 pt-4 mt-6">
                                <h3 className="text-lg font-bold mb-2">Share</h3>
                                <div className="flex space-x-4 share-icons">
                                    <i className="fab fa-facebook-f text-gray-500 hover:text-blue-600 cursor-pointer"></i>
                                    <i className="fab fa-twitter text-gray-500 hover:text-blue-400 cursor-pointer"></i>
                                    <i className="fab fa-pinterest text-gray-500 hover:text-red-600 cursor-pointer"></i>
                                    <i className="fab fa-instagram text-gray-500 hover:text-pink-500 cursor-pointer"></i>
                                </div>
                                <button className="text-gray-500 text-sm mt-4 hover:underline">Report a problem</button>
                            </div>
                        </div>
                    </div>

                    {/* Description Section */}
                    <div className="mt-8">
                        <h3 className="text-xl font-bold mb-2">Description</h3>
                        <p className="text-gray-700 mb-4">{{ $artwork['description'] }}</p>

                        {/* Artwork Additional Info */}
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                            <div className="flex items-center space-x-2">
                                <i className="fas fa-ruler-combined text-gray-500"></i>
                                <div>
                                    <h4 className="text-sm font-bold">Dimensions</h4>
                                    <p className="text-sm text-gray-500">{{ $artwork['dimensions'] }}</p>
                                </div>
                            </div>
                            <div className="flex items-center space-x-2">
                                <i className="fas fa-palette text-gray-500"></i>
                                <div>
                                    <h4 className="text-sm font-bold">Style</h4>
                                    <p className="text-sm text-gray-500">{{ $artwork['style'] }}</p>
                                </div>
                            </div>
                            <div className="flex items-center space-x-2">
                                <i className="fas fa-users text-gray-500"></i>
                                <div>
                                    <h4 className="text-sm font-bold">Subject</h4>
                                    <p className="text-sm text-gray-500">{{ $artwork['subject'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            );
        };

        ReactDOM.render(<App />, document.getElementById('root'));
    </script>
</body>

</html>
