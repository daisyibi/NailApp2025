<x-app-layout>
    <x-slot name="header">
        <h2 class="font-serif text-4xl text-pink-700 leading-tight tracking-wide">
            💅 {{ __('All Clients') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">Your clients, their styles, and all the fabulous details ✨</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-6 py-3 rounded-2xl shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Add New Client Button --}}
            <div class="mb-8 flex justify-end">
                <a href="{{ route('clients.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-pink-600 hover:bg-pink-700 text-white font-semibold rounded-2xl shadow-lg transition transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New Client
                </a>
            </div>

            {{-- Client Cards --}}
            @if($clients->isEmpty())
                <div class="bg-white p-8 border border-pink-100 shadow-md sm:rounded-3xl text-center text-gray-500">
                    <p class="text-lg font-medium">No clients found 💔</p>
                    <p class="text-sm text-gray-400 mt-2">Start by adding your first client record above.</p>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    @foreach($clients as $client)
                        {{-- Luxury Card --}}
                        <div class="bg-white/90 backdrop-blur-sm border border-pink-100 shadow-lg sm:rounded-3xl overflow-hidden flex flex-col md:flex-row hover:shadow-2xl transition-transform transform hover:scale-105">

                            {{-- Left Image Panel --}}
                            <div class="relative md:w-1/2 flex-shrink-0">
                                <img 
                                    src="{{ $client->image ? asset('storage/' . $client->image) : asset('images/default-placeholder.jpg') }}" 
                                    alt="{{ $client->name }}" 
                                    class="w-full h-64 md:h-full object-cover object-center rounded-t-3xl md:rounded-l-3xl md:rounded-tr-none border-2 border-pink-200 shadow-sm"
                                >
                                {{-- Charms --}}
                                @if($client->charms)
                                    <div class="absolute top-4 left-4 flex flex-wrap gap-1">
                                        @foreach(explode(',', $client->charms) as $charm)
                                            <span class="px-2 py-1 bg-pink-100 text-pink-700 font-semibold text-xs rounded-full shadow-sm">
                                                {{ $charm }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            {{-- Right Info Panel --}}
                            <div class="flex-1 p-6 md:p-8 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-2xl font-serif text-pink-700 mb-3">{{ $client->name }}</h3>
                                    <div class="space-y-2 text-gray-700 text-sm">
                                        <p><strong>Email:</strong> {{ $client->email ?? 'N/A' }}</p>
                                        <p><strong>Phone:</strong> {{ $client->phone_number ?? 'N/A' }}</p>
                                        <p><strong>Design:</strong> {{ $client->design_choice ?? 'N/A' }}</p>
                                        <p><strong>Nail Tech:</strong> {{ $client->nail_tech_name ?? 'N/A' }}</p>
                                    </div>

                                    @if($client->notes)
                                        <div class="mt-4 bg-pink-50 border border-pink-100 rounded-xl p-3 text-sm text-gray-600 shadow-sm">
                                            <strong>Notes:</strong> {{ $client->notes }}
                                        </div>
                                    @endif
                                </div>

                                {{-- Action Buttons --}}
                                <div class="mt-6 flex justify-between gap-3 flex-wrap">
                                    <a href="{{ route('clients.show', $client) }}" 
                                       class="flex-1 md:flex-none text-center px-4 py-2 bg-pink-100 text-pink-700 text-sm font-semibold rounded-xl hover:bg-pink-200 transition shadow-sm">
                                       View
                                    </a>
                                    <a href="{{ route('clients.edit', $client) }}" 
                                       class="flex-1 md:flex-none text-center px-4 py-2 bg-purple-100 text-purple-700 text-sm font-semibold rounded-xl hover:bg-purple-200 transition shadow-sm">
                                       Edit
                                    </a>
                                    <form action="{{ route('clients.destroy', $client) }}" method="POST" class="flex-1 md:flex-none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this client?')"
                                                class="w-full px-4 py-2 bg-red-100 text-red-700 text-sm font-semibold rounded-xl hover:bg-red-200 transition shadow-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>

