<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-display text-5xl text-rose-900 leading-tight tracking-wide font-extralight" style="font-family: 'Playfair Display', serif;">
                    <span class="relative inline-block">
                        {{ $client->name }}'s Profile
                        <span class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-rose-500 to-fuchsia-400 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-gray-600 text-lg mt-2 italic font-light tracking-wide" style="font-family: 'Cormorant Garamond', serif;">
                    A comprehensive look at your cherished client's private journey ✨
                </p>
            </div>
            <a href="{{ route('clients.index') }}"
               class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 text-base font-medium rounded-full shadow-md hover:bg-gray-200 transition">
                ← Back to Clients
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <!-- CLIENT HERO INFO -->
                <div class="flex flex-col lg:flex-row gap-12 items-start mb-12">
                    <!-- LEFT: IMAGE PANEL -->
                    <div class="relative w-full lg:w-2/5 p-8 bg-amber-50/70 rounded-3xl shadow-2xl shadow-amber-200/50 border border-amber-100 flex flex-col items-center justify-center">
                        <img src="{{ $client->image ? asset('storage/' . $client->image) : 'https://placehold.co/500x500/fff8fa/e91e63?text=Client+Portrait' }}"
                             alt="{{ $client->name }}"
                             class="w-full h-auto object-cover rounded-2xl border-4 border-white shadow-2xl shadow-rose-300/60 max-w-sm">
                        
                        <!-- Charms/Tags -->
                        <div class="absolute bottom-8 left-8 flex flex-wrap gap-2">
                            @if($client->charms)
                                @foreach(explode(',', $client->charms) as $charm)
                                    <span class="px-3 py-1 bg-white/90 text-rose-600 text-xs font-semibold rounded-full shadow-md backdrop-blur-sm font-sans uppercase tracking-widest">
                                        {{ trim($charm) }}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- RIGHT: DETAILS -->
                    <div class="flex-1 space-y-6 font-sans lg:pt-6">
                        <h3 class="text-6xl font-display text-rose-900 font-bold mb-6 tracking-wide" style="font-family: 'Playfair Display', serif;">
                            {{ $client->name }}
                        </h3>
                        
                        <div class="border-t border-rose-200 pt-6 space-y-6">
                            <!-- Email -->
                            <p class="text-xl text-gray-700 flex items-center gap-3">
                                <svg class="w-6 h-6 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-bold text-rose-800 tracking-wide">EMAIL:</span> <span class="text-gray-600">{{ $client->email ?? 'N/A' }}</span>
                            </p>

                            <!-- Phone -->
                            <p class="text-xl text-gray-700 flex items-center gap-3">
                                <svg class="w-6 h-6 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                                </svg>
                                <span class="font-bold text-rose-800 tracking-wide">PHONE:</span> <span class="text-gray-600">{{ $client->phone_number ?? 'N/A' }}</span>
                            </p>

                            <!-- Specialist -->
                            <p class="text-xl text-gray-700 flex items-center gap-3">
                                <svg class="w-6 h-6 text-amber-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="font-bold text-rose-800 tracking-wide">SPECIALIST:</span> <span class="text-gray-600">{{ $client->nail_tech_name ?? 'N/A' }}</span>
                            </p>
                        </div>

                        <!-- Edit Button -->
                        <div class="mt-12 pt-6 border-t border-rose-200">
                            <a href="{{ route('clients.edit', $client) }}"
                               class="inline-flex items-center px-12 py-3.5 bg-gradient-to-r from-rose-700 to-pink-800 text-white font-bold text-lg rounded-full shadow-2xl shadow-rose-600/50 tracking-widest hover:scale-[1.03] transition transform duration-400 font-display border-b-4 border-rose-900 hover:border-b-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                                EDIT PROFILE
                            </a>
                        </div>
                    </div>
                </div>

                <!-- CLIENT NOTES -->
                <div class="bg-white/70 backdrop-blur-sm p-10 rounded-3xl border border-pink-100 shadow-xl mb-12">
                    <h4 class="text-4xl font-display text-rose-900 font-bold mb-4">Client Notes</h4>
                    <div class="h-1 w-1/5 bg-gradient-to-r from-rose-400 to-amber-200 mb-6 rounded-full"></div>
                    <div class="bg-gray-50/50 p-6 rounded-xl border border-gray-100 shadow-inner">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap text-lg italic">
                            {{ $client->notes ?? 'No detailed notes have been recorded for this client yet. Use this section to capture preferences, service details, and future goals.' }}
                        </p>
                    </div>
                </div>

                <!-- APPOINTMENTS SECTION -->
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-6 border-b border-rose-200 pb-4">
                        <h4 class="text-4xl font-display text-rose-900 font-bold">Appointment Registry</h4>

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('clients.appointments.create', $client) }}"
                               class="inline-flex items-center px-12 py-3.5 bg-gradient-to-r from-fuchsia-700 to-rose-800 text-white font-bold text-lg rounded-full shadow-2xl shadow-fuchsia-500/50 tracking-widest hover:scale-[1.03] transition transform duration-400 font-display border-b-4 border-fuchsia-900 hover:border-b-2">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                                </svg>
                                BOOK SESSION
                            </a>
                        @endif
                    </div>

                    @if($client->appointments->isEmpty())
                        <div class="bg-white p-8 rounded-xl border border-pink-100 text-center text-gray-500 shadow-inner mt-6">
                            <p class="text-xl italic">No appointments scheduled yet 💅</p>
                        </div>
                    @else
                        <ul class="space-y-6">
                            @foreach($client->appointments->sortByDesc('appointment_date') as $appointment)
                                <li class="bg-white/70 rounded-3xl shadow-2xl border border-rose-200 p-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 hover:shadow-rose-300 transition transform hover:-translate-y-1">
                                    
                                    <!-- Date -->
                                    <div>
                                        <p class="font-display text-3xl text-rose-800 font-semibold">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</p>
                                        <p class="text-gray-600 text-lg italic mt-1">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}</p>
                                        <p class="text-gray-500 text-sm mt-1">Added by: <span class="font-medium text-gray-700">{{ $appointment->user->name ?? 'N/A' }}</span></p>
                                    </div>

                                    <!-- Status / Actions -->
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 mt-4 md:mt-0">
                                        <span class="px-5 py-2 rounded-full text-base font-bold tracking-wide
                                            @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($appointment->status === 'confirmed') bg-blue-100 text-blue-800
                                            @elseif($appointment->status === 'completed') bg-green-100 text-green-800
                                            @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800
                                            @endif">
                                            {{ strtoupper($appointment->status) }}
                                        </span>

                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('appointments.edit', $appointment) }}"
                                               class="px-6 py-2.5 text-base bg-gradient-to-r from-indigo-500 to-blue-600 text-white rounded-full font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 border-b-2 border-indigo-700">
                                                Edit
                                            </a>

                                            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Permanently delete this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-6 py-2.5 text-base bg-gradient-to-r from-red-600 to-red-800 text-white rounded-full font-medium shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 border-b-2 border-red-900">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
