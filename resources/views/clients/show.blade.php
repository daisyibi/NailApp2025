<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight tracking-wide">
            💖 {{ __('Client Details') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">View your client’s full nail design profile and service details.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl sm:rounded-3xl p-10 hover:shadow-2xl transition">

                <!-- Profile Header -->
                <div class="flex flex-col md:flex-row gap-8 items-start mb-10">
                    <!-- Client Image -->
                    <div class="flex-shrink-0 relative w-full md:w-1/2">
                        <img src="{{ $client->image ? asset('storage/' . $client->image) : asset('images/default-client.jpg') }}"
                             alt="{{ $client->name }}"
                             class="w-full h-80 object-cover rounded-3xl border border-pink-100 shadow-md">
                        <div class="absolute top-4 right-4 bg-pink-100 text-pink-700 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                            {{ $client->charms ?? 'Classic' }}
                        </div>
                    </div>

                    <!-- Client Info -->
                    <div class="flex-1 space-y-3">
                        <h3 class="text-3xl font-bold text-pink-700">{{ $client->name }}</h3>
                        <div class="text-gray-600 space-y-1">
                            <p><span class="font-semibold text-pink-600">Email:</span> {{ $client->email ?? 'N/A' }}</p>
                            <p><span class="font-semibold text-pink-600">Phone:</span> {{ $client->phone_number ?? 'N/A' }}</p>
                            <p><span class="font-semibold text-pink-600">Preferred Nail Tech:</span> {{ $client->nail_tech_name ?? 'N/A' }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('clients.edit', $client) }}" 
                               class="inline-flex items-center px-4 py-2 bg-pink-600 text-white text-sm font-semibold rounded-xl shadow-md hover:bg-pink-700 transition">
                               ✏️ Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Client Design Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                    <div class="bg-pink-50 border border-pink-100 rounded-2xl p-6 shadow-sm">
                        <h4 class="text-lg font-semibold text-pink-700 mb-3">💅 Design Preferences</h4>
                        <p class="text-gray-700"><span class="font-semibold">Design Choice:</span> {{ $client->design_choice ?? 'N/A' }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Charms:</span> {{ $client->charms ?? 'N/A' }}</p>
                        @if($client->notes)
                            <p class="text-gray-700 mt-2"><span class="font-semibold">Notes:</span> {{ $client->notes }}</p>
                        @endif
                    </div>

                    <div class="bg-rose-50 border border-rose-100 rounded-2xl p-6 shadow-sm">
                        <h4 class="text-lg font-semibold text-rose-700 mb-3">🗓️ Appointment Details</h4>
                        <p class="text-gray-700"><span class="font-semibold">Last Visit:</span> {{ $client->created_at->format('M d, Y') }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Next Appointment:</span> {{ now()->addWeeks(3)->format('M d, Y') }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Preferred Time:</span> Afternoon</p>
                    </div>
                </div>

                <!-- Notes / Preferences -->
                <div class="bg-gradient-to-r from-pink-100 via-rose-100 to-purple-100 border border-pink-200 rounded-2xl p-6 shadow-sm">
                    <h4 class="text-lg font-semibold text-pink-700 mb-3">💭 Client Notes</h4>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $client->notes ?? 'No additional notes for this client yet. Add some details about their preferences, allergies, or favorite nail colors!' }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex justify-between items-center">
                    <a href="{{ route('clients.index') }}" 
                       class="inline-flex items-center px-5 py-2.5 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-xl shadow-md transition transform hover:scale-105">
                        ← Back to Clients
                    </a>

                    <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-4 py-2 bg-red-100 text-red-700 font-semibold rounded-lg hover:bg-red-200 transition">
                            🗑️ Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
