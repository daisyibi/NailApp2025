<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-serif italic text-5xl text-rose-700 leading-tight tracking-wider font-extralight">
                    ✨ {{ $client->name }} – Client Portfolio
                </h2>
                <p class="text-gray-500 text-sm mt-1 tracking-wider">A bespoke overview for a flawless, personalized service experience.</p>
            </div>
            
            <div class="flex gap-4">

                {{-- BACK BUTTON --}}
                <a href="{{ route('clients.index') }}"
                    class="inline-flex items-center px-6 py-2 bg-white text-rose-600 font-medium rounded-full shadow-lg hover:shadow-xl hover:bg-rose-50 transition duration-300 transform hover:scale-[1.02] border border-rose-200 tracking-wide text-sm">
                    <svg class="w-4 h-4 mr-2 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    RETURN TO CLIENTS
                </a>

                {{-- EDIT BUTTON — ADMIN ONLY --}}
                @if(auth()->user()->is_admin)
                    <a href="{{ route('clients.edit', $client) }}"
                        class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-pink-400 to-rose-500 text-white font-semibold rounded-full shadow-lg hover:from-pink-500 hover:to-rose-600 transition duration-300 transform hover:scale-[1.02] border border-transparent tracking-wide text-sm">
                        EDIT PROFILE
                    </a>
                @endif

            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-lg border border-pink-100 shadow-2xl sm:rounded-[3.5rem] p-12 space-y-16">

                {{-- IMAGE + DETAILS --}}
                <div class="flex flex-col lg:flex-row gap-16 items-center lg:items-start">

                    {{-- Image --}}
                    <div class="lg:w-1/2">
                        <h4 class="font-serif italic text-2xl text-rose-700 mb-6 border-b border-pink-200 pb-3 font-semibold tracking-normal">
                            📸 Inspired Design Reference
                        </h4>

                        @if($client->image)
                            <img src="{{ asset('storage/' . $client->image) }}" 
                                class="w-full h-auto max-h-[550px] object-cover rounded-[2.5rem] border-4 border-rose-300 shadow-xl hover:scale-[1.01] transition">
                        @else
                            <div class="w-full h-96 bg-pink-100/50 rounded-[2.5rem] border-4 border-dashed border-rose-300 flex items-center justify-center text-rose-400 text-xl font-medium shadow-inner">
                                NO REFERENCE IMAGE AVAILABLE
                            </div>
                        @endif
                    </div>

                    {{-- Details --}}
                    <div class="flex-1 space-y-8">
                        <h3 class="font-serif italic text-4xl text-rose-800 font-bold tracking-tight mb-8">
                            Client Vitals
                        </h3>

                        @php
                            $detailClasses = "p-5 bg-white/70 rounded-2xl border border-pink-100 shadow-md";
                            $labelClasses = "font-semibold text-lg text-rose-700";
                        @endphp

                        <div class="{{ $detailClasses }}">
                            <p class="{{ $labelClasses }}">Email Address</p>
                            <p class="text-gray-700 mt-2">{{ $client->email ?? '—' }}</p>
                        </div>

                        <div class="{{ $detailClasses }}">
                            <p class="{{ $labelClasses }}">Phone</p>
                            <p class="text-gray-700 mt-2">{{ $client->phone_number ?? '—' }}</p>
                        </div>

                        <div class="{{ $detailClasses }}">
                            <p class="{{ $labelClasses }}">Preferred Design Style</p>
                            <p class="text-gray-700 mt-2">{{ $client->design_choice ?? '—' }}</p>
                        </div>

                        <div class="{{ $detailClasses }}">
                            <p class="{{ $labelClasses }}">Adornments & Charms</p>
                            <p class="text-gray-700 mt-2">
                                <span class="bg-rose-100 px-3 py-1 rounded-full">{{ $client->charms ?? 'NONE' }}</span>
                            </p>
                        </div>
                    </div>
                </div>


                {{-- Appointment Log --}}
                <hr class="border-pink-200">

                <div class="pt-8">

                    <div class="flex justify-between mb-8">

                        <h4 class="font-serif italic text-3xl text-rose-800 font-bold tracking-tight">
                            🗓 Exclusive Appointment Log
                        </h4>

                        {{-- ADMIN ONLY — ADD APPOINTMENT --}}
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('clients.appointments.create', $client) }}"
                                class="px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-full shadow-lg">
                                + RESERVE APPOINTMENT
                            </a>
                        @endif

                    </div>

                    @if($client->appointments->isEmpty())
                        <div class="p-8 bg-pink-50 rounded-3xl italic text-gray-500 text-center">
                            No exclusive service appointments recorded.
                        </div>
                    @else
                        <ul class="space-y-6">

                            @foreach($client->appointments as $appointment)

                                <li class="p-8 bg-white border border-rose-200 rounded-3xl shadow-xl flex justify-between">

                                    <div>
                                        <p class="text-2xl font-extrabold text-rose-800">
                                            {{ $appointment->service ?? 'STANDARD BOOKING' }}
                                        </p>

                                        <p class="text-sm mt-2">
                                            <span class="font-medium text-rose-600">Date:</span>
                                            {{ $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y') : 'Not Set' }}
                                        </p>

                                        <p class="text-sm">
                                            <span class="font-medium text-rose-600">Time:</span>
                                            {{ $appointment->start_time ? \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') : 'To Be Confirmed' }}
                                        </p>
                                    </div>

                                    {{-- ADMIN ONLY — EDIT/DELETE --}}
                                    @if(auth()->user()->is_admin)
                                        <div class="flex gap-4">
                                            <a href="{{ route('appointments.edit', $appointment) }}"
                                                class="px-6 py-2 bg-pink-100 text-pink-700 rounded-full">
                                                MODIFY
                                            </a>

                                            <form action="{{ route('appointments.destroy', $appointment) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-6 py-2 bg-red-600 text-white rounded-full">
                                                    CANCEL
                                                </button>
                                            </form>
                                        </div>
                                    @endif

                                </li>

                            @endforeach
                        </ul>
                    @endif
                </div>


                {{-- Notes --}}
                @if($client->notes)
                <div class="pt-8">
                    <h4 class="font-serif italic text-3xl text-rose-800 mb-6">
                        📝 Personalized Client Notes
                    </h4>
                    <p class="text-gray-700 bg-pink-50 p-8 rounded-3xl">{{ $client->notes }}</p>
                </div>
                @endif


                {{-- ARCHIVE CLIENT — ADMIN ONLY --}}
                @if(auth()->user()->is_admin)
                    <div class="mt-16 flex justify-center">
                        <form action="{{ route('clients.destroy', $client) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-gradient-to-r from-rose-700 to-red-800 text-white px-12 py-4 rounded-full text-xl font-bold">
                                ARCHIVE CLIENT PROFILE
                            </button>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
