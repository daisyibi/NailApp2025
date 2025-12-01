<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 py-4 border-b border-pink-100">
            <h2 class="font-display text-4xl text-rose-900 leading-tight tracking-wider font-extrabold" style="font-family: 'Playfair Display', serif;">
                🌹 {{ $nailtech->name }}'s Profile
            </h2>
            <a href="{{ route('nailtechs.index') }}"
               class="inline-flex items-center px-6 py-2 bg-pink-100/70 text-rose-800 text-base font-semibold rounded-full shadow-md hover:bg-pink-200 transition font-sans border border-pink-300">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Nail Techs
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white/95 backdrop-blur-lg border border-pink-200 shadow-3xl shadow-rose-300/60 sm:rounded-[2.5rem] p-8 md:p-12">

                <div class="flex flex-col lg:flex-row gap-10 items-stretch">
                    
                    <div class="flex-1 lg:w-2/3 space-y-8 font-sans">

                        <div class="space-y-4">
                            <h3 class="text-3xl font-bold text-rose-800 border-b border-pink-200 pb-3 mb-4">
                                Nail Tech Highlights
                            </h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                
                                <div class="flex items-start text-lg text-gray-700 p-4 bg-pink-50 rounded-xl border border-pink-100 shadow-sm">
                                    <svg class="w-6 h-6 text-rose-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.146a.5.5 0 01.402 0l4 2.5a.5.5 0 01.076.064 1 1 0 00.12.083l4 2.5a.5.5 0 01.328.468V18.5a.5.5 0 01-.247.433l-4 2.5a.5.5 0 01-.524 0l-4-2.5a.5.5 0 01-.076-.064 1 1 0 00-.12-.083l-4-2.5a.5.5 0 01-.328-.468V5.5a.5.5 0 01.247-.433z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-rose-800 tracking-wide mb-0.5">Speciality</p>
                                        <p class="text-gray-600">{{ $nailtech->speciality }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start text-lg text-gray-700 p-4 bg-pink-50 rounded-xl border border-pink-100 shadow-sm">
                                    <svg class="w-6 h-6 text-rose-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.657 0 3 1.343 3 3v2a2 2 0 01-2 2H9a2 2 0 01-2-2v-2c0-1.657 1.343-3 3-3zM9 12h6m-3-4V4m0 16v-4"></path>
                                    </svg>
                                    <div>
                                        <p class="font-bold text-rose-800 tracking-wide mb-0.5">Hourly Rate</p>
                                        <p class="text-gray-600">${{ number_format($nailtech->hourly_rate, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Clients Section -->
                        <div class="pt-4">
                            <h4 class="text-2xl font-bold text-rose-800 mb-6 border-b border-pink-200 pb-2">
                                Client Portfolio ({{ $nailtech->clients->count() }})
                            </h4>

                            @if($nailtech->clients->isEmpty())
                                <div class="p-6 text-center text-gray-500 bg-pink-50/50 rounded-xl border border-pink-100">
                                    <p class="italic">This nail technician has not been assigned any clients yet.</p>
                                </div>
                            @else
                                <ul class="space-y-3">
                                    @foreach($nailtech->clients as $client)
                                        <li class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 border border-pink-100 p-4 flex flex-col md:flex-row justify-between items-start md:items-center">
                                            <div class="flex items-center">
                                                <svg class="w-5 h-5 text-pink-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                                </svg>
                                                <div>
                                                    <p class="font-semibold text-gray-800 text-lg">{{ $client->name }}</p>
                                                    <p class="text-gray-600 text-sm">Last Design: 
                                                        <span class="font-medium">{{ $client->design_choice ?? '—' }}</span>
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="{{ route('clients.show', $client) }}"
                                               class="mt-3 md:mt-0 inline-flex px-4 py-2 bg-pink-500 text-white rounded-full text-sm font-medium shadow-md hover:bg-pink-600 transition">
                                                View Client Profile
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Update Button (Admins Only) -->
                        @if(auth()->user()->role === 'admin')
                            <div class="pt-4 text-center">
                                <a href="{{ route('nailtechs.edit', $nailtech) }}"
                                class="inline-flex items-center px-12 py-4 bg-gradient-to-r from-rose-700 to-pink-800 text-white font-bold text-lg rounded-full shadow-2xl shadow-rose-600/50 tracking-widest hover:scale-[1.02] transition transform duration-400 font-sans border-b-4 border-rose-900 hover:border-b-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                    Update Tech Details
                                </a>
                            </div>
                        @endif

                    </div>

                    <!-- Right Side Profile Card -->
                    <div class="lg:w-1/3 flex-shrink-0 flex justify-center lg:justify-end">
                        <div class="w-full max-w-xs h-72 rounded-[2rem] bg-gradient-to-br from-pink-300 to-rose-400 shadow-2xl shadow-rose-300/80 p-6 flex items-center justify-center border-4 border-white/50">
                            <div class="text-center text-white/90">
                                <svg class="w-20 h-20 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="text-xl font-bold tracking-wider" style="font-family: 'Playfair Display', serif;">Nail Tech</p>
                                <p class="text-sm italic font-light">({{ $nailtech->name }})</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
