<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Nail Studio') }}</title>

    <!-- Playfair Display (premium serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300;400;700;900&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="font-sans bg-gradient-to-b from-white to-pink-50 min-h-screen">
    <div class="min-h-screen flex flex-col">

        <nav class="bg-white/60 backdrop-blur-sm border-b border-pink-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('dashboard') }}" class="text-pink-700 font-semibold">Dashboard</a>
                        <a href="{{ route('clients.index') }}" class="text-gray-700 hover:text-pink-600">Clients</a>
                        <a href="{{ route('nailtechs.index') }}" class="text-gray-700 hover:text-rose-600">Nail Techs</a>
                        <a href="{{ route('appointments.index') }}" class="text-gray-700 hover:text-purple-600">Appointments</a>
                    </div>

                    <div class="flex items-center space-x-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 font-medium hover:text-red-800">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        @isset($header)
            <header class="bg-white/0">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>

    </div>
</body>
</html>
