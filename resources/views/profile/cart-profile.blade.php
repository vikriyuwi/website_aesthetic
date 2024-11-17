<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Art Cart - Full Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .product-card:hover {
      transform: scale(1.02);
    }
    .product-card img {
      transition: transform 0.3s ease-in-out;
    }
    .product-card:hover img {
      transform: scale(1.1);
    }
    .custom-checkbox {
      width: 24px;
      height: 24px;
      border: 2px solid #4F46E5;
      appearance: none;
      border-radius: 0.25rem;
      transition: background-color 0.3s ease, border-color 0.3s ease;
    }
    .custom-checkbox:checked {
      background-color: #4F46E5;
      border-color: #4F46E5;
      background-image: url('https://cdn-icons-png.flaticon.com/512/130/130906.png');
      background-position: center;
      background-size: 16px;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
  <div class="flex justify-between items-center border-b border-gray-200 pb-4 mb-6">
    <h1 class="text-3xl font-semibold">Your Art Cart</h1>
    <a href="#" class="text-indigo-600 hover:text-red-600"><i class="fas fa-arrow-left"></i> Continue Shopping</a>
  </div>

  <!-- Cart Items Section -->
  <div class="product-list space-y-4 overflow-y-auto max-h-[600px] border-b border-gray-200 pb-4">
    <!-- Each item in the cart -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start mb-4">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="200.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/indianart.webp" alt="Abstract Illustration" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Abstract Illustration</h2>
            <p class="text-sm text-gray-500 mt-1">Illustrations</p>
            <a href="#artist-mike" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">Mike Hawk</a>
            <div class="flex items-center mt-3 text-green-500 font-medium text-sm"><i class="fas fa-check-circle"></i><span class="ml-2">In stock</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$200.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

    <!-- Repeat similar structure for 5 more items with different details -->

    <!-- Item 2 -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start mb-4">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="450.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/powerpuff.jpg" alt="Modern Sculpture" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Modern Minimalist Sculpture</h2>
            <p class="text-sm text-gray-500 mt-1">Sculptures</p>
            <a href="#artist-jane" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">Jane Doe</a>
            <div class="flex items-center mt-3 text-green-500 font-medium text-sm"><i class="fas fa-check-circle"></i><span class="ml-2">In stock</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$450.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start mb-4">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="120.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/melody.webp" alt="Creative Poster Design" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Creative Poster Design</h2>
            <p class="text-sm text-gray-500 mt-1">Posters</p>
            <a href="#artist-john" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">John Doe</a>
            <div class="flex items-center mt-3 text-green-500 font-medium text-sm"><i class="fas fa-check-circle"></i><span class="ml-2">In stock</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$120.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

    <!-- Item 4 -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start mb-4">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="350.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/powerpuff2.jpg" alt="Digital Art Piece" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Digital Art - Exploration</h2>
            <p class="text-sm text-gray-500 mt-1">Digital Art</p>
            <a href="#artist-emily" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">Emily Rose</a>
            <div class="flex items-center mt-3 text-yellow-500 font-medium text-sm"><i class="fas fa-clock"></i><span class="ml-2">Ships in 1-2 weeks</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$350.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

    <!-- Item 5 -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start mb-4">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="180.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/abstract_art.jpg" alt="Abstract Modern Art" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Abstract Modern Art</h2>
            <p class="text-sm text-gray-500 mt-1">Artworks</p>
            <a href="#artist-alex" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">Alex Brown</a>
            <div class="flex items-center mt-3 text-green-500 font-medium text-sm"><i class="fas fa-check-circle"></i><span class="ml-2">In stock</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$180.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

    <!-- Item 6 -->
    <div class="product-card hover:shadow-lg transform transition-transform duration-300 bg-gray-50 rounded-lg p-4 flex items-start">
      <input type="checkbox" class="mr-4 mt-2 custom-checkbox item-checkbox" data-price="275.00" checked>
      <div class="flex items-center justify-between w-full">
        <div class="flex items-start">
          <img src="/images/portrait_art.jpg" alt="Portrait Art" class="w-24 h-24 object-cover rounded-lg shadow-md">
          <div class="ml-6">
            <h2 class="text-lg font-semibold text-gray-800">Portrait Art</h2>
            <p class="text-sm text-gray-500 mt-1">Portraits</p>
            <a href="#artist-lily" class="text-indigo-600 font-semibold artist-link mt-1 inline-block">Lily Smith</a>
            <div class="flex items-center mt-3 text-green-500 font-medium text-sm"><i class="fas fa-check-circle"></i><span class="ml-2">In stock</span></div>
          </div>
        </div>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">$275.00</p>
          <a href="#" class="text-indigo-600 font-medium mt-1 hover:text-purple-800 transition text-sm">Remove</a>
        </div>
      </div>
    </div>

  </div>

  <!-- Subtotal and Checkout Section -->
  <div class="flex justify-between items-center mt-8">
    <p class="text-xl font-semibold">Subtotal</p>
    <p class="text-xl font-semibold" id="subtotal">$1,575.00</p>
  </div>
  <p class="text-sm text-gray-500 mt-2">Shipping and taxes will be calculated at checkout.</p>
  
  <button onclick="window.location.href='{{ route('checkout') }}'" class="w-full bg-indigo-600 text-white py-3 mt-6 rounded-lg text-lg font-semibold hover:bg-indigo-800 transition">Checkout</button>
</div>

<script>
    // Calculate subtotal based on checked items
    const checkboxes = document.querySelectorAll('.item-checkbox');
    const subtotalEl = document.getElementById('subtotal');

    function calculateSubtotal() {
      let subtotal = 0;
      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          subtotal += parseFloat(checkbox.dataset.price);
        }
      });
      subtotalEl.textContent = `$${subtotal.toFixed(2)}`;
    }

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', calculateSubtotal);
    });

    // Initial calculation on page load
    calculateSubtotal();
</script>

</body>
</html>
