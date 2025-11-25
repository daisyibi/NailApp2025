<x-app-layout>
    <x-slot name="header">
        {{-- Header: Elegant Serif for Classic Luxury --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-serif italic text-5xl text-rose-700 leading-tight tracking-wider font-extralight">
                🗓 Appointment Calendar
            </h2>
            
            <div class="flex gap-4 items-center">
                <p class="text-gray-500 text-sm italic tracking-wide max-w-md hidden md:block">
                    A curated view of your exclusive client schedule.
                </p>
                <a href="{{ route('clients.index') }}" 
                    class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-pink-400 to-rose-500 text-white font-semibold rounded-full shadow-lg hover:from-pink-500 hover:to-rose-600 transition duration-300 transform hover:scale-[1.02] border border-transparent tracking-wide text-sm">
                    VIEW CLIENTS
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-16 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- 1. Premium Statistics Boxes --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-16">
            
            {{-- Total Appointments --}}
            <div class="bg-white border border-pink-200 shadow-xl rounded-3xl p-5 bg-gradient-to-br from-pink-50 to-white transition duration-300 hover:shadow-2xl hover:border-pink-300">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-bold text-rose-800 uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Total Bookings
                    </h3>
                </div>
                <p class="text-4xl font-extrabold text-gray-900 font-mono mt-1">{{ $appointments->count() }}</p>
            </div>
            
            {{-- Confirmed Appointments (ICON CHANGED HERE) --}}
            <div class="bg-white border border-purple-200 shadow-xl rounded-3xl p-5 bg-gradient-to-br from-purple-50 to-white transition duration-300 hover:shadow-2xl hover:border-purple-300">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-bold text-purple-700 uppercase tracking-widest flex items-center gap-2">
                        {{-- NEW ICON: Calendar with a Star --}}
                        <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2zM15 19l2 2 4-4"></path>
                        </svg>
                        Confirmed
                    </h3>
                </div>
                <p class="text-4xl font-extrabold text-gray-900 font-mono mt-1">{{ $appointments->where('status', 'confirmed')->count() }}</p>
            </div>
            
            {{-- Completed Appointments --}}
            <div class="bg-white border border-green-200 shadow-xl rounded-3xl p-5 bg-gradient-to-br from-green-50 to-white transition duration-300 hover:shadow-2xl hover:border-green-300">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-bold text-green-700 uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Completed
                    </h3>
                </div>
                <p class="text-4xl font-extrabold text-gray-900 font-mono mt-1">{{ $appointments->where('status', 'completed')->count() }}</p>
            </div>
            
        </div>
        
        ---

        @if($appointments->isEmpty())
            {{-- Empty State --}}
            <div class="bg-white/80 rounded-3xl shadow-xl p-16 mt-10 border border-pink-100">
                <p class="text-gray-500 text-center text-2xl italic font-light">No exclusive service appointments recorded at this time. Begin by reserving a booking for a valued client.</p>
            </div>
        @else
            {{-- 2. Appointment Card Grid (Unchanged) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($appointments->sortByDesc('appointment_date') as $appointment)
                    <div class="bg-white border border-rose-100 shadow-2xl shadow-pink-200/50 rounded-3xl p-8 transition duration-300 hover:shadow-3xl hover:border-pink-300 flex flex-col justify-between h-full">
                        
                        <div class="space-y-4">
                            {{-- Client Name and Status --}}
                            <div class="flex justify-between items-start border-b border-pink-100 pb-3">
                                <h4 class="text-3xl font-serif italic text-rose-800 tracking-tight leading-snug">{{ $appointment->client->name }}</h4>
                                
                                {{-- Status Badge --}}
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-inner flex-shrink-0
                                    @if($appointment->status === 'pending') bg-pink-100 text-pink-700
                                    @elseif($appointment->status === 'confirmed') bg-purple-100 text-purple-700
                                    @elseif($appointment->status === 'completed') bg-green-100 text-green-700
                                    @elseif($appointment->status === 'cancelled') bg-red-100 text-red-700
                                    @endif">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                            
                            {{-- Date/Time Details --}}
                            <div class="text-sm space-y-2 pt-2 text-gray-600">
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    <span class="font-medium text-gray-700">Date:</span> 
                                    {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y') }}
                                </p>
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L10 9.586V6z" clip-rule="evenodd"></path></svg>
                                    <span class="font-medium text-gray-700">Time:</span> 
                                    {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i A') }}
                                </p>
                            </div>

                            {{-- Coordinator --}}
                            <p class="text-xs text-gray-500 pt-2 border-t border-pink-50">
                                Service Coordinator: <span class="font-semibold text-gray-700">{{ $appointment->user->name ?? 'N/A' }}</span>
                            </p>
                        </div>
                        
                        {{-- Actions --}}
                        @if(auth()->user()->role === 'admin')
                            <div class="flex justify-end gap-3 pt-6 border-t border-pink-100 mt-4">
                                <a href="{{ route('appointments.edit', $appointment) }}"
                                   class="px-5 py-2 bg-gradient-to-r from-pink-500 to-rose-700 text-white font-medium rounded-full hover:from-pink-600 hover:to-rose-800 transition duration-300 shadow-lg text-sm tracking-wide">
                                    Edit Details
                                </a>
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" 
                                        onsubmit="return confirm('Confirm deletion of this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-5 py-2 bg-gray-200 text-gray-700 font-medium rounded-full hover:bg-red-500 hover:text-white transition duration-300 shadow-sm text-sm tracking-wide">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>