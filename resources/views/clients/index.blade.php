<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-pink-800 leading-snug tracking-tighter" style="font-family: 'Playfair Display', serif;">
                    ✨ {{ __('Client Profiles') }}
                </h1>
                <p class="text-gray-500 text-sm mt-1">Your curated clientele — precision and luxury.</p>
            </div>
            
            <a href="{{ route('clients.create') }}" 
               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-600 to-rose-700 text-white rounded-3xl text-sm font-semibold shadow-2xl transition duration-300 transform hover:scale-[1.03] hover:shadow-3xl focus:ring-4 focus:ring-pink-300">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Add New Client
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-100 to-purple-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="my-6 p-10 bg-white/70 backdrop-blur-xl border border-pink-300 shadow-3xl sm:rounded-[3rem] transition duration-500 hover:shadow-4xl">
                
                @if($clients->isEmpty())
                    <div class="p-8 text-center text-gray-500 bg-pink-50/50 rounded-2xl border border-pink-100">
                        <p class="text-lg font-medium text-pink-700">The client book is empty.</p>
                        <p class="mt-2">Start adding your clients to build your professional portfolio!</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-8">
                        @foreach($clients as $client)
                            <article class="bg-white rounded-2xl shadow-lg border border-pink-200 overflow-hidden group transition duration-300 hover:shadow-2xl hover:border-pink-400">
                                
                                <div class="flex flex-col sm:flex-row"> 
                                    
                                    {{-- IMAGE SECTION: W-full on mobile, W-1/2 on SM+ ⭐️ UPDATED WIDTH ⭐️ --}}
                                    <div class="relative w-full sm:w-1/2 h-64 sm:h-auto flex-shrink-0 border-r-4 border-pink-100/70 overflow-hidden"> 
                                        
                                        {{-- Wrapper for 1:1 Aspect Ratio + Object Contain fix --}}
                                        <div class="relative w-full" style="padding-top: 100%;">
                                            @if($client->image)
                                                <img src="{{ asset('storage/'.$client->image) }}"
                                                    alt="{{ $client->name }}"
                                                    {{-- object-contain ensures the whole image is visible (no cropping) --}}
                                                    class="absolute inset-0 w-full h-full object-contain bg-gray-100 transition-transform group-hover:scale-[1.03] p-4">
                                            @else
                                                {{-- Placeholder needs to fill the space --}}
                                                <div class="absolute inset-0 w-full h-full flex items-center justify-center bg-pink-100/60 p-4">
                                                    <svg class="w-20 h-20 text-pink-400 opacity-70" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M19.46 15.68L16.2 12.42C15.86 12.08 15.3 12.08 14.96 12.42L12.3 15.08C11.96 15.42 11.4 15.42 11.06 15.08L8.24 12.26C7.9 11.92 7.34 11.92 7 12.26L4.7 14.56C4.4 14.86 4 15 3.5 15C3.3 15 3 14.9 3 14.6V5.4C3 5.1 3.2 5 3.5 5H20.5C20.8 5 21 5.2 21 5.4V18.6C21 18.9 20.8 19 20.5 19H5.5C5.1 19 4.7 18.8 4.4 18.5L7 15.9C7.3 15.6 7.8 15.6 8.1 15.9L11 18.8C11.3 19.1 11.8 19.1 12.1 18.8L14.7 16.2C15 15.9 15.5 15.9 15.8 16.2L18.4 18.8C18.7 19.1 19.2 19.1 19.5 18.8L21.5 16.8V17.6C21.5 17.9 21.3 18 21 18H5V6H21V15.68ZM15.5 10C16.3284 10 17 9.32843 17 8.5C17 7.67157 16.3284 7 15.5 7C14.6716 7 14 7.67157 14 8.5C14 9.32843 14.6716 10 15.5 10Z" fill="currentColor"/>
                                                    <text x="12" y="16" font-family="Playfair Display, serif" font-size="2.5" fill="#db2777" text-anchor="middle" font-weight="bold">Luxe</text>
                                                </svg>
                                                </div>
                                            @endif
                                            
                                            {{-- Charms/Add-ons Badge --}}
                                            @if($client->charms)
                                                <div class="absolute top-3 left-3 flex flex-wrap gap-1 z-10">
                                                    <span class="px-3 py-1 bg-pink-50/90 backdrop-blur-sm text-pink-800 text-xs rounded-full font-medium border border-pink-300 shadow-md">
                                                        ✨ {{ $client->charms }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- DETAILS SECTION: W-full on mobile, W-1/2 on SM+ ⭐️ UPDATED WIDTH ⭐️ --}}
                                    <div class="p-6 flex-grow flex flex-col justify-between w-full sm:w-1/2">
                                        <div>
                                            {{-- Client Name --}}
                                            <div class="flex items-center mb-2 border-b border-pink-100 pb-2">
                                                <svg class="w-5 h-5 text-pink-600 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                                <h3 class="text-2xl font-bold text-pink-800 leading-tight" style="font-family: 'Playfair Display', serif;">{{ $client->name }}</h3>
                                            </div>
                                            
                                            {{-- Design Choice --}}
                                            <div class="flex items-center text-gray-700 text-sm font-medium mt-3">
                                                <svg class="w-4 h-4 text-pink-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M12.586 4.343a2 2 0 012.828 0l3.121 3.121a2 2 0 010 2.828l-8.485 8.485a2 2 0 01-2.828 0l-3.121-3.121a2 2 0 010-2.828l8.485-8.485z"></path></svg>
                                                <span class="font-semibold text-pink-700">Design Focus:</span> 
                                                <span class="ml-1">{{ $client->design_choice ?? 'Not Specified' }}</span>
                                            </div>
                                        </div>

                                        {{-- Contact & Tech Info --}}
                                        <div class="mt-4 border-t border-pink-100 pt-3">
                                            <div class="text-sm text-gray-700 space-y-2">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-pink-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                                    <span class="truncate text-gray-600">{{ $client->email ?? 'No email' }}</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 text-pink-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 3.683a1 1 0 01-1.35 1.203l-1.543-.772a11.011 11.011 0 005.419 5.419l.772-1.543a1 1 0 011.203-1.35l3.683.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                                                    <span class="text-gray-600">{{ $client->phone_number ?? 'No phone' }}</span>
                                                </div>
                                                
                                                {{-- Techs Assigned --}}
                                                <div class="flex items-start text-xs text-gray-600 pt-1">
                                                    <svg class="w-4 h-4 text-pink-600 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                                    <span class="font-medium text-pink-700">Techs:</span> 
                                                    <span class="ml-1">{{ $client->nailTechs->pluck('name')->join(', ') ?: 'N/A' }}</span>
                                                </div>
                                            </div>

                                            {{-- Notes Preview --}}
                                            @if($client->notes)
                                                <div class="mt-3 pt-3 border-t border-pink-100">
                                                    <div class="text-xs text-gray-600 flex items-start">
                                                        <svg class="w-4 h-4 text-pink-500 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-2-4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                                        <p class="italic text-gray-500 leading-snug">
                                                            <span class="font-medium text-pink-700 not-italic">Notes:</span> 
                                                            {{ Str::limit($client->notes, 60) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        {{-- Actions --}}
                                        <div class="mt-6 flex items-center gap-3 justify-end pt-3 border-t border-pink-100">
                                            {{-- View Details --}}
                                            <a href="{{ route('clients.show', $client) }}" class="px-3 py-1 bg-pink-100/70 text-pink-700 rounded-full text-xs font-medium hover:bg-pink-200 transition duration-150 border border-pink-300">
                                                View Profile
                                            </a>
                                            
                                            {{-- Edit Button --}}
                                            <a href="{{ route('clients.edit', $client) }}" 
                                               class="px-4 py-1.5 bg-gradient-to-r from-pink-500 to-rose-600 text-white rounded-full text-xs font-semibold shadow-md hover:from-pink-600 hover:to-rose-700 transition duration-150">
                                                Edit
                                            </a>
                                            
                                            {{-- Delete Button --}}
                                            <form method="POST" action="{{ route('clients.destroy', $client) }}" onsubmit="return confirm('Confirm permanent deletion of {{ $client->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 bg-transparent text-red-600 rounded-full hover:bg-red-50 transition duration-150 border border-red-300 hover:border-red-400">
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 6h6v10H7V6z" clip-rule="evenodd" /></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>