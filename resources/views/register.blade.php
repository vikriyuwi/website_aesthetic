<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jim+Nightshade">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-500">
    <div class="py-96">
        <div class="flex shadow-xl bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
            <div class="hidden lg:block lg:w-1/2 bg-cover order-2"
                style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
            </div>
            <div class="py-12 w-full p-8 lg:w-1/2">
                <h2 class="text-6xl text-black text-left" style="font-family:'Jim Nightshade'">Aesthetic</h2>
                <p class="py-3 text-xl font-semibold text-black-100 text-left">Enter the Canvas: Aesthetic Sign Up</p>

                <div class=" mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="username" />
                </div>

                <div class=" mt-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" />
                </div>
                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <a href="#" class="text-xs text-gray-500">Forget Password?</a>
                    </div>
                    <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" />
                </div>
                <div class="mt-8">
                    <button class="bg-indigo-400 text-white py-2 px-4 w-full rounded hover:bg-indigo-500">Sign Up</button>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <span class="border-b w-1/5 md:w-1/5"></span>
                    <a href="{{ url('login') }}" class="text-xs text-gray-500 uppercase">Or already have an account?</a>
                    <span class="border-b w-1/5 md:w-1/5"></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
