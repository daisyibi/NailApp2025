<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-700 leading-tight">
            💅 {{ __('Nail Studio Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-pink-50 via-white to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Welcome Section -->
            <div class="bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-2xl p-10 border border-pink-100 text-center">
                <h3 class="text-2xl font-bold text-pink-700">Welcome to Your Nail Studio 💖</h3>
                <p class="mt-2 text-gray-600">Stay organised a keep track of your clients, designs, and upcoming appointments in style!</p>
            </div>

            <!-- Dashboard Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Manage Clients -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-pink-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <div class="p-4 bg-pink-100 rounded-full shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5.121 17.804A13.937 13.937 0 0112 15c2.486 0 4.8.64 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <h4 class="text-lg font-semibold text-gray-800">Manage Clients</h4>
                        <p class="text-gray-500 text-sm">Add, view, or update your lovely clients’ profiles and designs.</p>

                        <a href="{{ route('clients.index') }}"
                           class="mt-4 inline-flex items-center px-5 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-400 transition">
                            View Clients
                        </a>
                    </div>
                </div>

                <!-- Appointment Scheduler (Future Feature) -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-purple-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <div class="p-4 bg-purple-100 rounded-full shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <h4 class="text-lg font-semibold text-gray-800">Appointments</h4>
                        <p class="text-gray-500 text-sm">Schedule your next nail sessions and never miss a sparkle ✨</p>

                        <button class="mt-4 inline-flex items-center px-5 py-2 bg-purple-500 text-white font-semibold rounded-md opacity-60 cursor-not-allowed">
                            Coming Soon
                        </button>
                    </div>
                </div>

                <!-- Nail Design Gallery (Future Feature) -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-rose-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <div class="p-4 bg-rose-100 rounded-full shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 20l9-5-9-5-9 5 9 5zm0 0V10m0 10v-5m0 5l-9-5m9 5l9-5" />
                            </svg>
                        </div>

                        <h4 class="text-lg font-semibold text-gray-800">Nail Design Gallery</h4>
                        <p class="text-gray-500 text-sm">Showcase your stunning nail art and share design inspirations 💅</p>

                        <button class="mt-4 inline-flex items-center px-5 py-2 bg-rose-500 text-white font-semibold rounded-md opacity-60 cursor-not-allowed">
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer Quote -->
            <div class="text-center text-sm text-gray-500 mt-10 italic">
                “Beauty begins at your fingertips 💫”
            </div>
        </div>
    </div>
</x-app-layout>


