<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-pink-700 leading-tight">
            💅 Nail Studio Dashboard
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-pink-50 via-white to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Welcome Section -->
            <div class="bg-white/80 backdrop-blur-sm shadow-lg sm:rounded-2xl p-10 border border-pink-100 text-center">
                <h3 class="text-2xl font-bold text-pink-700">Welcome to Your Nail Studio 💖</h3>
                <p class="mt-2 text-gray-600">Stay organised and keep track of your clients, designs, and upcoming appointments in style!</p>
            </div>

            <!-- Dashboard Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Manage Clients -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-pink-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800">Manage Clients</h4>
                        <a href="{{ route('clients.index') }}" 
                           class="mt-4 inline-flex items-center px-5 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                           View Clients
                        </a>
                    </div>
                </div>

                <!-- Appointments -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-purple-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800">Appointments</h4>
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('appointments.index') }}" 
                               class="mt-4 inline-flex items-center px-5 py-2 bg-purple-500 text-white font-semibold rounded-md hover:bg-purple-600 transition">
                               Manage Appointments
                            </a>
                        @else
                            <button class="mt-4 inline-flex items-center px-5 py-2 bg-purple-500 text-white font-semibold rounded-md opacity-60 cursor-not-allowed">
                               Manage Appointments
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Nail Design Gallery -->
                <div class="bg-white shadow-md hover:shadow-xl transition rounded-2xl p-6 border-t-4 border-rose-400">
                    <div class="flex flex-col items-center justify-center text-center space-y-4">
                        <h4 class="text-lg font-semibold text-gray-800">Nail Design Gallery</h4>
                        <button class="mt-4 inline-flex items-center px-5 py-2 bg-rose-500 text-white font-semibold rounded-md opacity-60 cursor-not-allowed">
                            Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




