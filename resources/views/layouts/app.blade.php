<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'The Atelier Studio') }}</title>

    <!-- Load Playfair Display (premium serif) and Inter (standard sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- This relies on your Laravel Vite setup to pull in Tailwind CSS and config -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans bg-gradient-to-br from-white via-gray-50 to-rose-100 min-h-screen">
    <div class="min-h-screen flex flex-col">

        <!-- 1. LUXURY NAVIGATION BAR (Executive Glassmorphism Effect) -->
        <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-rose-200 shadow-xl shadow-gray-200/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">
                    
                    <!-- Logo / Brand Name -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('dashboard') }}" class="text-4xl font-['Playfair_Display'] font-extrabold text-rose-900 tracking-widest italic">
                            The Atelier
                        </a>
                    </div>

                    <!-- Menu Links (Desktop) -->
                    <div class="hidden md:flex items-center space-x-10">
                        <a href="{{ route('dashboard') }}" class="text-rose-900 font-semibold text-lg tracking-wider transition duration-300 border-b-2 border-rose-900 pb-1">DASHBOARD</a>
                        <a href="{{ route('clients.index') }}" class="text-gray-700 hover:text-amber-600 font-medium text-lg tracking-wider transition duration-300">CLIENTS</a>
                        <a href="{{ route('nailtechs.index') }}" class="text-gray-700 hover:text-amber-600 font-medium text-lg tracking-wider transition duration-300">SPECIALISTS</a>
                        <a href="{{ route('appointments.index') }}" class="text-gray-700 hover:text-amber-600 font-medium text-lg tracking-wider transition duration-300">APPOINTMENTS</a>
                    </div>

                    <!-- User / Logout -->
                    <div class="flex items-center space-x-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-700 font-bold hover:text-white transition duration-300 p-3 rounded-xl border-2 border-red-700 hover:bg-red-700 tracking-wider">LOGOUT</button>
                        </form>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-rose-900 p-2 rounded-md hover:bg-rose-50 transition duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-bold text-rose-900 bg-rose-50">Dashboard</a>
                    <a href="{{ route('clients.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-rose-50">Clients</a>
                    <a href="{{ route('nailtechs.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-rose-50">Specialists</a>
                    <a href="{{ route('appointments.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-rose-50">Appointments</a>
                </div>
            </div>
        </nav>

        <!-- 2. EXECUTIVE HEADER (Including Conditional Search Bar) -->
        <header class="bg-transparent pt-12 pb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                
                <!-- Header Content Slot -->
                @isset($header) 
                    {{ $header }}
                @else
                    <!-- Default content for Dashboard/Home Page -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center space-x-4">
                             <!-- Dramatic Emblem -->
                             <span class="text-amber-600 text-6xl leading-none font-['Playfair_Display'] font-extrabold italic select-none">A</span>
                             <h1 class="font-['Playfair_Display'] text-5xl text-rose-900 leading-tight tracking-wider font-extralight">
                                The Executive Dashboard
                            </h1>
                        </div>
                    </div>

                    <!-- PREMIUM SEARCH BAR (GOLD-ACCENTED - SHOWN ONLY ON DASHBOARD) -->
                    <div class="w-full pt-4">
                        <form action="/search" method="GET">
                            <div class="relative">
                                <input type="text" name="query" placeholder="Search clients, specialists, or appointments..."
                                    class="w-full pl-16 pr-36 py-4 border-2 border-amber-500 bg-white/95 rounded-xl text-xl shadow-2xl shadow-amber-100/70 focus:border-rose-900 focus:ring-rose-900 transition duration-300 placeholder-gray-500 font-sans tracking-wide"
                                    style="outline: none;">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-6 pointer-events-none">
                                    <!-- Gold Search Icon -->
                                    <svg class="w-7 h-7 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                                <!-- Search Button Accent (Permanently visible on desktop) -->
                                <button type="submit" class="absolute inset-y-0 right-0 px-8 bg-amber-600 text-white font-extrabold text-lg rounded-r-xl shadow-2xl hover:bg-rose-900 transition duration-300 tracking-widest border-l-4 border-white/50">
                                    EXECUTE
                                </button>
                            </div>
                        </form>
                    </div>
                @endisset

            </div>
        </header>

        <!-- 3. MAIN CONTENT AREA -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                
                <!-- Session Success Message (Bolder Design) -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-8 border-green-500 text-green-800 px-6 py-4 rounded-xl shadow-lg font-sans font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                
                <!-- Session Error Message (Bolder Design) -->
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-8 border-red-500 text-red-800 px-6 py-4 rounded-xl shadow-lg font-sans font-medium">
                        {{ session('error') }}
                    </div>
                @endif
                
                <!-- MAIN CONTENT SLOT -->
                {{ $slot }}

            </div>
        </main>
        
        <!-- 4. EXECUTIVE FOOTER (Darker, more structured) -->
        <footer class="bg-gray-800 mt-16 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-400 text-sm font-sans tracking-wide">
                <p class="font-bold text-white text-lg mb-2">The Atelier</p>
                <p>Luxury Management Suite. All records secured under strict protocol.</p>
                <p class="mt-1">&copy; {{ date('Y') }} The Atelier Studio. All rights reserved.</p>
            </div>
        </footer>

    </div>

    <script>
        // Simple script to toggle the mobile menu
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>