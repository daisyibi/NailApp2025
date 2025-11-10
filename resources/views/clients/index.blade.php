<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h2 class="font-display text-5xl text-rose-700 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                <span class="relative inline-block">
                    CLIENTS
                    <span class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-rose-300 to-pink-200 rounded-full"></span>
                </span>
            </h2>
            <p class="text-gray-500 text-lg mt-2 italic font-light font-sans">Your curated collection of cherished clientele ✨</p>
        </div>
    </x-slot>

    {{-- PRIMARY BACKGROUND: Light and soft gradient --}}
    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Add New Client Button - ULTIMATE DESIGN (More visually striking) --}}
            <div class="mb-14 flex justify-end">
                <a href="{{ route('clients.create') }}"
                   class="inline-flex items-center px-12 py-3.5 bg-gradient-to-r from-rose-600 to-pink-700 text-white font-bold text-lg rounded-full shadow-2xl **shadow-rose-400/80** **tracking-widest** uppercase hover:scale-[1.05] transition transform duration-400 font-sans border border-white/30">
                   <svg class="w-6 h-6 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add new Client
                </a>
            </div>

            {{-- Clients Grid (2 Columns) --}}
            @if($clients->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach($clients as $client)
                        {{-- Individual Client Card --}}
                        <div class="group relative flex flex-col bg-white rounded-[2rem] shadow-lg hover:shadow-xl overflow-hidden transform transition-all duration-500 hover:-translate-y-1 border border-pink-100/50">
                            
                            {{-- CARD CONTENT: Two balanced columns (Image Left, Details Right) --}}
                            <div class="flex flex-col sm:flex-row h-full">
                                
                                {{-- LEFT: IMAGE PANEL (Full-Frame/Square) --}}
                                <div class="relative w-full sm:w-2/5 p-4 flex flex-col items-center justify-center bg-pink-50/70 border-r border-pink-100">
                                    
                                    {{-- Square Image Container --}}
                                    <div class="relative w-full h-auto overflow-hidden aspect-square border-4 border-white rounded-xl shadow-md bg-white">
                                        <img src="{{ $client->image ? asset('storage/' . $client->image) : 'https://placehold.co/300x300/fff8fa/e91e63?text=Portrait' }}" 
                                            alt="{{ $client->name }}" 
                                            class="w-full h-full object-cover rounded-lg transition-transform duration-500 group-hover:scale-105">
                                    </div>
                                    
                                    {{-- Charms (Below Image) --}}
                                    @if($client->charms)
                                        <div class="mt-4 flex flex-wrap justify-center gap-1 z-10 max-w-full">
                                            @foreach(explode(',', $client->charms) as $charm)
                                                <span class="px-2 py-0.5 bg-white/70 backdrop-blur-sm text-rose-600 text-xs font-medium rounded-full shadow-sm font-sans">
                                                    {{ trim($charm) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- RIGHT: CLIENT DETAILS --}}
                                <div class="w-full sm:w-3/5 flex-1 p-6 flex flex-col justify-between">
                                    <div>
                                        {{-- Heading uses Playfair Display --}}
                                        <h3 class="text-3xl font-display text-rose-700 font-semibold mb-3 tracking-wide" style="font-family: 'Playfair Display', serif;">
                                            {{ $client->name ?? 'Client Name' }}
                                        </h3>
                                        <div class="border-b border-pink-100 mb-5"></div>

                                        {{-- Detail Lines use Sans-Serif --}}
                                        <div class="space-y-4 text-gray-700 text-sm font-sans">
                                            
                                            <div class="flex items-start">
                                                <svg class="w-4 h-4 mt-1 mr-3 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p><span class="font-bold text-rose-600 mr-2">Email:</span> {{ Str::limit($client->email ?? 'N/A', 25) }}</p>
                                            </div>
                                            
                                            <div class="flex items-start">
                                                <svg class="w-4 h-4 mt-1 mr-3 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                                                <p><span class="font-bold text-rose-600 mr-2">Phone:</span> {{ $client->phone_number ?? 'N/A' }}</p>
                                            </div>

                                            <div class="flex items-start">
                                                <svg class="w-4 h-4 mt-1 mr-3 text-rose-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                                <p><span class="font-bold text-rose-600 mr-2">Specialist:</span> {{ $client->nail_tech_name ?? 'N/A' }}</p>
                                            </div>
                                        </div>

                                        {{-- Notes Snippet --}}
                                        @if($client->notes)
                                            <div class="mt-6 p-3 border border-pink-200 rounded-lg bg-pink-50/70 shadow-inner">
                                                <span class="font-semibold text-rose-600 block mb-0.5 font-sans">Notes:</span> 
                                                <p class="text-xs text-gray-700 italic font-sans">{{ Str::limit($client->notes, 70) }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Actions - Aligned on Single Line --}}
                                    <div class="mt-6 flex justify-between gap-2 border-t border-pink-100 pt-4">
                                        <a href="{{ route('clients.show', $client) }}" class="px-3 py-2 text-xs bg-gray-100/70 text-gray-700 font-medium rounded-full shadow-sm hover:bg-gray-200 transition font-sans">
                                            View
                                        </a>
                                        <a href="{{ route('clients.edit', $client) }}" class="px-3 py-2 text-xs bg-gradient-to-r from-rose-400 to-pink-500 text-white font-medium rounded-full shadow hover:from-rose-500 hover:to-pink-600 transition font-sans">
                                            Edit
                                        </a>
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Permanently delete {{ $client->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 text-xs bg-red-100/70 text-red-600 font-medium rounded-full shadow-sm hover:bg-red-200 transition font-sans">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white p-12 border border-pink-100 shadow-xl rounded-3xl text-center text-gray-500 mt-8">
                    <p class="text-3xl font-light text-rose-600 font-display">No client profiles available.</p>
                    <p class="text-lg text-gray-400 mt-3 font-sans">Click 'Add New Client' to create your first record!</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>