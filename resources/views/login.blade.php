<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="flex bg-white shadow-lg rounded-lg overflow-hidden max-w-4xl w-full">
    
    <!-- Form Section (Left Side) -->
    <div class="w-full md:w-1/2 p-8 flex flex-col justify-center">
      <div class="flex items-center mb-6">
        <!-- Replace the Flowbite text with your image -->
        <img alt="Aesthetic Logo Text" class="w-24 h-8" src="{{ asset('images/aestheticlogo.png') }}" /> 
      </div>
      <h2 class="text-2xl md:text-3xl font-bold mb-2">Welcome back</h2>
      <p class="text-gray-600 mb-6">
        Start your website in seconds. Don't have an account?
        <a class="text-indigo-600" href="#">Sign up.</a>
      </p>
      <form>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="name@company.com" type="email" required/>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Password</label>
          <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="••••••••" type="password" required/>
        </div>
        <div class="flex items-center mb-4">
          <input class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded mr-2" type="checkbox"/>
          <label class="text-sm font-medium text-gray-700">Remember me</label>
        </div>
        <div class="flex items-center justify-between mb-4">
          <a class="text-indigo-600 hover:underline" href="#">Forgot password?</a>
        </div>
        <button class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-6">
          Sign in to your account
        </button>
      </form>
    </div>

    <!-- Image Section (Right Side) -->
    <div class="hidden md:flex md:w-1/2 bg-gray-100 items-center justify-center">
      <img alt="Login page illustration" class="w-full h-full object-cover" src="{{ asset('images/loginpage.jpg') }}" />
    </div>
  </div>
</body>
</html>
