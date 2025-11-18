<x-app-layout>
    <x-slot name="header">
        {{-- Header: Elegant Serif for Classic Luxury (Cartier Vibe) --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-serif italic text-5xl text-rose-700 leading-tight tracking-wider font-extralight">
                    ✨ {{ $client->name }} – Client Portfolio
                </h2>
                <p class="text-gray-500 text-sm mt-1 tracking-wider">A bespoke overview for a flawless, personalized service experience.</p>
            </div>
            
            <div class="flex gap-4">
                {{-- BACK BUTTON - Clean Sans-serif --}}
                <a href="{{ route('clients.index') }}"
                    class="inline-flex items-center px-6 py-2 bg-white text-rose-600 font-medium rounded-full shadow-lg hover:shadow-xl hover:bg-rose-50 transition duration-300 transform hover:scale-[1.02] border border-rose-200 tracking-wide text-sm">
                    <svg class="w-4 h-4 mr-2 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    RETURN TO CLIENTS
                </a>
                {{-- EDIT BUTTON - Clean Sans-serif --}}
                <a href="{{ route('clients.edit', $client) }}"
                    class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-pink-400 to-rose-500 text-white font-semibold rounded-full shadow-lg hover:from-pink-500 hover:to-rose-600 transition duration-300 transform hover:scale-[1.02] border border-transparent tracking-wide text-sm">
                    EDIT PROFILE
                </a>
            </div>
        </div>
    </x-slot>

    {{-- Enchanting Background: Soft White to Blush Pink Gradient --}}
    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- Main Luxury Card: Glassmorphism with Delicacy --}}
            <div class="bg-white/80 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-pink-200/60 sm:rounded-[3.5rem] p-12 space-y-16">

                {{-- Client Photo & Core Details Layout (Unchanged) --}}
                <div class="flex flex-col lg:flex-row gap-16 items-center lg:items-start">
                    {{-- Left Section: Elegant Image Display (Header is serif) --}}
                    <div class="lg:w-1/2 flex-shrink-0 order-1 lg:order-1">
                        <h4 class="font-serif italic text-2xl text-rose-700 mb-6 border-b border-pink-200 pb-3 font-semibold tracking-normal">
                            📸 Inspired Design Reference
                        </h4>
                        @if($client->image)
                            <img src="{{ asset('storage/' . $client->image) }}" 
                                alt="{{ $client->name }}'s Design Reference" 
                                class="w-full h-auto max-h-[550px] object-cover rounded-[2.5rem] border-4 border-rose-300 shadow-xl shadow-pink-300/50 transform transition-transform duration-500 hover:scale-[1.01] hover:shadow-rose-400/60">
                        @else
                            <div class="w-full h-96 bg-pink-100/50 rounded-[2.5rem] border-4 border-dashed border-rose-300 flex items-center justify-center text-rose-400 text-xl font-medium shadow-inner">
                                NO REFERENCE IMAGE AVAILABLE
                            </div>
                        @endif
                    </div>

                    {{-- Right Section: Client Vitals with Delicate Styling (Unchanged) --}}
                    <div class="flex-1 space-y-8 order-2 lg:order-2">
                        
                        <h3 class="font-serif italic text-4xl text-rose-800 font-bold tracking-tight mb-8">
                            Client Vitals
                        </h3>

                        <div class="space-y-6">
                            @php
                                $detailClasses = "p-5 bg-white/70 rounded-2xl border border-pink-100 shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.01]";
                                $labelClasses = "font-semibold text-lg text-rose-700 tracking-tight flex items-center";
                                $iconClasses = "w-5 h-5 mr-3 text-pink-400 flex-shrink-0";
                            @endphp

                            <div class="{{ $detailClasses }}">
                                <p class="{{ $labelClasses }}">
                                    <svg class="{{ $iconClasses }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    Email Address
                                </p>
                                <p class="text-gray-700 mt-2 ml-8 tracking-wide">{{ $client->email ?? '—' }}</p>
                            </div>
                            
                            <div class="{{ $detailClasses }}">
                                <p class="{{ $labelClasses }}">
                                    <svg class="{{ $iconClasses }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 3.683a1 1 0 01-1.35 1.203l-1.543-.772a11.011 11.011 0 005.419 5.419l.772-1.543a1 1 0 011.203-1.35l3.683.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                                    Contact Phone
                                </p>
                                <p class="text-gray-700 mt-2 ml-8 tracking-wide">{{ $client->phone_number ?? '—' }}</p>
                            </div>
                            
                            <div class="{{ $detailClasses }}">
                                <p class="{{ $labelClasses }}">
                                    <svg class="{{ $iconClasses }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M12.586 4.343a2 2 0 012.828 0l3.121 3.121a2 2 0 010 2.828l-8.485 8.485a2 2 0 01-2.828 0l-3.121-3.121a2 2 0 010-2.828l8.485-8.485z"></path></svg>
                                    Preferred Design Style
                                </p>
                                <p class="text-gray-700 mt-2 ml-8 tracking-wide">{{ $client->design_choice ?? '—' }}</p>
                            </div>
                            
                            <div class="{{ $detailClasses }}">
                                <p class="{{ $labelClasses }}">
                                    <svg class="{{ $iconClasses }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zm0 3a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                    Adornments & Charms
                                </p>
                                <p class="text-gray-700 mt-2 ml-8">
                                    <span class="text-sm font-semibold bg-rose-100 px-4 py-1.5 rounded-full text-rose-700 border border-rose-200 shadow-inner tracking-wider">{{ $client->charms ?? 'NONE SPECIFIED' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="border-pink-200">
                
                {{-- Dedicated Artistes Section (Unchanged) --}}
                <div class="pt-8 border-t-2 border-pink-200">
                    <h4 class="font-serif italic text-3xl text-rose-800 mb-6 font-bold tracking-tight">
                        Dedicated Artistes
                    </h4>
                    @if($client->nailTechs->isEmpty())
                        <div class="p-6 bg-pink-50/70 rounded-2xl italic text-gray-500 text-center border border-pink-100 shadow-inner">No preferred Artiste assigned to this profile.</div>
                    @else
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($client->nailTechs as $nailtech)
                                <li class="p-5 bg-gradient-to-br from-white to-pink-50/70 text-gray-800 font-medium rounded-2xl shadow-md border border-pink-100 hover:shadow-lg transition duration-300 transform hover:scale-[1.01] flex justify-between items-center">
                                    <span class="text-lg font-semibold text-rose-700 tracking-tight">{{ $nailtech->name }}</span>
                                    <span class="text-xs font-semibold bg-pink-200/60 px-3 py-1.5 rounded-full text-pink-800 uppercase tracking-widest border border-pink-300">{{ $nailtech->speciality ?? 'ARTISTE' }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <hr class="border-pink-200">

                {{-- CORRECTED: Appointment History Section --}}
                <div class="pt-8 border-t-2 border-pink-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                        <h4 class="font-serif italic text-3xl text-rose-800 font-bold tracking-tight">
                            🗓 Exclusive Appointment Log
                        </h4>
                        <a href="{{ route('clients.appointments.create', $client) }}"
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-full shadow-lg hover:from-pink-600 hover:to-rose-700 transition duration-300 transform hover:scale-[1.03] tracking-widest text-sm uppercase">
                            + RESERVE APPOINTMENT
                        </a>
                    </div>

                    @if($client->appointments->isEmpty())
                        <div class="p-8 bg-pink-50/70 rounded-3xl italic text-gray-500 text-center border border-pink-100 shadow-inner">
                            No exclusive service appointments recorded for this esteemed client.
                        </div>
                    @else
                        <ul class="space-y-6">
                            @foreach($client->appointments as $appointment)
                                <li class="p-8 bg-white border border-rose-200 rounded-3xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:scale-[1.005] flex flex-col md:flex-row justify-between items-center text-gray-800 group">
                                    <div class="flex items-center gap-8 mb-4 md:mb-0 w-full md:w-auto">
                                        {{-- Date Block: USES 'appointment_date' --}}
                                        <div class="text-center bg-gradient-to-br from-rose-200 to-pink-300 text-rose-900 p-4 rounded-xl w-24 flex-shrink-0 shadow-md border border-rose-300 group-hover:from-rose-300 group-hover:to-pink-400 transition duration-300">
                                            {{-- MONTH --}}
                                            <div class="text-lg font-bold">
                                                @if ($appointment->appointment_date)
                                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}
                                                @else
                                                    —
                                                @endif
                                            </div>
                                            {{-- DAY --}}
                                            <div class="text-4xl font-extrabold -mt-1">
                                                @if ($appointment->appointment_date)
                                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}
                                                @else
                                                    —
                                                @endif
                                            </div>
                                        </div>
                                        
                                        {{-- Service Details --}}
                                        <div>
                                            {{-- The service name (using a sensible default) --}}
                                            <p class="text-2xl font-extrabold text-rose-800 leading-tight tracking-tight uppercase">{{ $appointment->service ?? 'STANDARD BOOKING' }}</p>
                                            
                                            {{-- NEW DATE LINE ADDED HERE --}}
                                            <p class="text-sm text-gray-600 mt-1">
                                                <span class="font-medium text-rose-600">Date:</span> 
                                                @if ($appointment->appointment_date)
                                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y') }}
                                                @else
                                                    Date Not Set
                                                @endif
                                            </p>
                                            {{-- END NEW DATE LINE --}}

                                            <p class="text-sm text-gray-600 mt-2">
                                                <span class="font-medium text-rose-600">Time:</span> 
                                                {{-- TIME FIX: USES 'start_time' --}}
                                                @if ($appointment->start_time)
                                                    {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}
                                                @else
                                                    To Be Confirmed
                                                @endif
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1">
                                                <span class="font-medium text-rose-600">Status:</span> 
                                                <span class="uppercase font-semibold text-{{ $appointment->status == 'cancelled' ? 'red' : 'green' }}-600">{{ $appointment->status ?? 'pending' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    
                                    {{-- Actions (Unchanged) --}}
                                    <div class="flex gap-4">
                                        <a href="{{ route('appointments.edit', $appointment) }}"
                                            class="px-6 py-2 bg-pink-100 text-pink-700 text-sm font-semibold rounded-full shadow hover:bg-pink-200 transition tracking-tight uppercase">
                                            MODIFY
                                        </a>
                                        <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Confirm cancellation of this exclusive appointment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-6 py-2 bg-red-600 text-white text-sm font-semibold rounded-full shadow hover:bg-red-700 transition tracking-tight uppercase">
                                                CANCEL
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <hr class="border-pink-200">

                {{-- Notes Section (Unchanged) --}}
                @if($client->notes)
                <div class="pt-8 border-t-2 border-pink-200">
                    <h4 class="font-serif italic text-3xl text-rose-800 mb-6 font-bold tracking-tight">
                        📝 Personalized Client Notes
                    </h4>
                    <p class="text-gray-700 bg-pink-50/70 p-8 rounded-3xl border border-pink-100 shadow-inner min-h-[150px] whitespace-pre-wrap leading-relaxed text-lg tracking-wide">{{ $client->notes }}</p>
                </div>
                @endif

                {{-- ARCHIVE BUTTON (Unchanged) --}}
                <div class="mt-16 flex justify-center">
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('⚠️ CRITICAL ACTION: This will permanently archive the client profile and all associated data, including past appointments. Are you absolutely certain?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-gradient-to-r from-rose-700 to-red-800 hover:from-rose-800 hover:to-red-900 text-white px-12 py-4 rounded-full text-xl font-bold shadow-2xl transition duration-300 transform hover:scale-[1.03] hover:shadow-red-400/70 focus:ring-4 focus:ring-red-300 tracking-widest uppercase">
                            ARCHIVE CLIENT PROFILE
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>