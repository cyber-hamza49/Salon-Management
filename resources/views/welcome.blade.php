<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to BarberX</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="shortcut icon" href="{{asset('icon.png')}}" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800">
        <!-- Hero Section with Nav -->
        <div class="relative min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="absolute top-0 w-full z-50 bg-transparent">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-20">
                        <!-- Logo -->
                        <div class="flex-shrink-0">
                            <h1 class="text-3xl font-bold text-white">BarberX</h1>
                        </div>
                        
                        <!-- Auth Navigation -->
                        @if (Route::has('login'))
                            <div class="flex space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                       class="px-6 py-2 rounded-full bg-white text-gray-900 hover:bg-gray-100 transition duration-300">
                                        Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                       class="px-6 py-2 rounded-full bg-transparent text-white hover:bg-white/10 transition duration-300">
                                        Log in
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                           class="px-6 py-2 rounded-full bg-white text-gray-900 hover:bg-gray-100 transition duration-300">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl w-full space-y-8 text-center">
                    <div>
                        <h2 class="mt-6 text-5xl font-extrabold text-white tracking-tight">
                            Welcome to BarberX
                        </h2>
                        <p class="mt-6 text-xl text-gray-300">
                            Experience the art of professional grooming and style
                        </p>
                    </div>

                
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900 to-gray-800 opacity-50"></div>
            <div class="absolute inset-0 bg-[url('/api/placeholder/1920/1080')] bg-cover bg-center opacity-10"></div>
        </div>
    </div>
</body>
</html>