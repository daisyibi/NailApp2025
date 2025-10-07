<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight tracking-wide">
            💅 {{ __('All Clients') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">Manage your lovely clients and keep their styles updated!</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Add New Client Button --}}
            <div class="mb-8 flex justify-end">
                <a href="{{ route('clients.create') }}"
                   class="inline-flex items-center px-5 py-3 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-xl shadow-md transition transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Client
                </a>
            </div>

            {{-- Client Cards Grid --}}
            @if($clients->isEmpty())
                <div class="bg-white p-8 border border-pink-100 shadow-md sm:rounded-3xl text-center text-gray-500">
                    <p class="text-lg font-medium">No clients found 💔</p>
                    <p class="text-sm text-gray-400 mt-2">Start by adding your first client record above.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($clients as $client)
                        <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-lg sm:rounded-3xl p-6 hover:shadow-2xl transition-transform transform hover:scale-[1.02]">
                            <div class="relative">
                                <img src="{{ asset('images/clients/' . $client->image) }}" 
                                     alt="{{ $client->name }}" 
                                     class="w-full h-48 object-cover rounded-2xl shadow-md mb-4">
                                <div class="absolute top-3 right-3 bg-pink-100 text-pink-700 text-xs font-semibold px-3 py-1 rounded-full shadow">
                                    {{ $client->charms ?? 'Classic' }}
                                </div>
                            </div>

                            <h3 class="text-xl font-semibold text-pink-700 mb-1">{{ $client->name }}</h3>
                            <p class="text-gray-600 text-sm mb-1"><strong>Email:</strong> {{ $client->email ?? 'N/A' }}</p>
                            <p class="text-gray-600 text-sm mb-1"><strong>Phone:</strong> {{ $client->phone_number ?? 'N/A' }}</p>
                            <p class="text-gray-600 text-sm mb-1"><strong>Design:</strong> {{ $client->design_choice ?? 'N/A' }}</p>
                            <p class="text-gray-600 text-sm mb-1"><strong>Nail Tech:</strong> {{ $client->nail_tech_name ?? 'N/A' }}</p>

                            @if($client->notes)
                                <div class="mt-3 bg-pink-50 border border-pink-100 rounded-lg p-3">
                                    <p class="text-sm text-gray-600"><strong>Notes:</strong> {{ $client->notes }}</p>
                                </div>
                            @endif

                            {{-- Action Buttons --}}
                            <div class="mt-6 flex justify-between items-center">
                                <a href="{{ route('clients.show', $client) }}" 
                                   class="px-3 py-1.5 bg-pink-100 text-pink-700 text-sm font-semibold rounded-lg hover:bg-pink-200 transition">
                                   View
                                </a>
                                <a href="{{ route('clients.edit', $client) }}" 
                                   class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm font-semibold rounded-lg hover:bg-yellow-200 transition">
                                   Edit
                                </a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Are you sure you want to delete this client?')"
                                            class="px-3 py-1.5 bg-red-100 text-red-700 text-sm font-semibold rounded-lg hover:bg-red-200 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>



