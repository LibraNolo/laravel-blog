<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body class="bg-gray-900 text-white min-h-screen">
    <div class="relative overflow-hidden">
        <!-- Background circles -->
        <div class="absolute inset-0 overflow-hidden opacity-20">
            <div class="absolute rounded-full border border-gray-700" style="width: 300px; height: 300px; top: 10%; left: 20%;"></div>
            <div class="absolute rounded-full border border-gray-700" style="width: 400px; height: 400px; top: 50%; left: 70%;"></div>
            <div class="absolute rounded-full border border-gray-700" style="width: 200px; height: 200px; top: 30%; left: 80%;"></div>
            <div class="absolute rounded-full border border-gray-700" style="width: 350px; height: 350px; top: 60%; left: 5%;"></div>
            <div class="absolute rounded-full border border-gray-700" style="width: 250px; height: 250px; top: 5%; left: 50%;"></div>
        </div>

        <div class="container mx-auto px-4 py-8 relative z-10">
            <!-- Blog name -->
            <div class="mb-16">
                <h1 class="text-2xl font-bold">Insight Blog</h1>
                @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
            </div>

            <!-- Main content -->
            <div class="max-w-4xl mx-auto text-center py-20">
                <h2 class="text-5xl md:text-6xl font-bold mb-6">
                    Explore the world of ideas on Insight Blog
                </h2>
                <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto">
                    Insight Blog helps you discover your groundbreaking perspectives from thought to content.
                </p>
                <a href="{{ route('register') }}" class="inline-block bg-white text-gray-900 px-8 py-3 rounded-md font-medium hover:bg-gray-100 transition-colors">
                    Start Writing
                </a>
            </div>

            <!-- Feature cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <div class="bg-gray-800 bg-opacity-50 p-6 rounded-lg backdrop-filter backdrop-blur-lg">
                    <h3 class="text-xl font-semibold mb-2">Create Blogs</h3>
                    <p class="text-gray-400">Create custom blogs that express your desired topic, immerse yourself into your thought provoking insights.</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-6 rounded-lg backdrop-filter backdrop-blur-lg">
                    <h3 class="text-xl font-semibold mb-2">Edit Blogs</h3>
                    <p class="text-gray-400">Forgot to add something? Don't worry you can always edit the blog that you have created, hassle free.</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-6 rounded-lg backdrop-filter backdrop-blur-lg">
                    <h3 class="text-xl font-semibold mb-2">Delete Blogs</h3>
                    <p class="text-gray-400">Remove blogs that are no longer relevant, or maybe you just feel different about an idea now, you can remove it and add another one as you wish.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
