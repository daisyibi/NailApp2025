<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-3xl font-light text-gray-800 tracking-widest leading-tight flex items-center gap-2">
                    💅 APPOINTMENT EDIT
                </h2>
                <p class="text-gray-500 mt-1 text-base italic">
                    Refine the details for this scheduled client booking.
                </p>
            </div>
            <a href="{{ route('appointments.index') }}" 
               class="text-base text-rose-500 hover:text-rose-700 font-medium transition duration-300">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            
            <div class="bg-white border border-pink-100 shadow-2xl shadow-pink-50/50 rounded-xl overflow-hidden transition duration-300">
                
                <div class="grid grid-cols-1 md:grid-cols-3">
                    
                    <div class="bg-gradient-to-br from-pink-50 to-white p-8 border-r border-pink-100 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="text-xl font-semibold text-rose-600 tracking-wider uppercase">
                                Booking Details
                            </h3>
                            <p class="text-gray-500 text-sm">
                                Ensure all client and time details are perfectly aligned.
                            </p>
                        </div>
                        <p class="text-xs text-pink-300 mt-8">Client ID: {{ $appointment->client_id }}</p>
                    </div>

                    <div class="md:col-span-2 p-8 lg:p-10">
                        <form action="{{ route('appointments.update', $appointment) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="client_id" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wider">
                                    Client Name
                                </label>
                                <div class="relative">
                                    <select name="client_id" id="client_id"
                                            class="w-full pl-12 pr-8 border-2 border-pink-100 bg-white rounded-full shadow-inner focus:ring-1 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-800 transition text-base appearance-none">
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ $appointment->client_id == $client->id ? 'selected' : '' }}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <svg class="w-5 h-5 absolute left-4 top-3 text-rose-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    <svg class="w-4 h-4 absolute right-4 top-4 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                @error('client_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="appointment_date" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wider">
                                    Date & Time
                                </label>
                                <div class="relative">
                                    <input type="datetime-local" id="appointment_date" name="appointment_date"
                                           value="{{ $appointment->appointment_date->format('Y-m-d\TH:i') }}"
                                           class="w-full pl-12 border-2 border-pink-100 bg-white rounded-full shadow-inner focus:ring-1 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-800 transition text-base" required>
                                    <svg class="w-5 h-5 absolute left-4 top-3 text-rose-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                @error('appointment_date')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-xs font-semibold uppercase text-gray-700 mb-2 tracking-wider">
                                    Status
                                </label>
                                <div class="relative">
                                    <select id="status" name="status"
                                            class="w-full pl-12 pr-8 border-2 border-pink-100 bg-white rounded-full shadow-inner focus:ring-1 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-800 transition text-base appearance-none"
                                            required>
                                        <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <svg class="w-5 h-5 absolute left-4 top-3 text-rose-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944c-1.396 0-2.753.284-4.016.822M19.016 5.618l2.122 2.122m-2.122-2.122a.5.5 0 01.707 0L21.748 7.748M12 21a9 9 0 100-18 9 9 0 000 18z" /></svg>
                                    <svg class="w-4 h-4 absolute right-4 top-4 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-between items-center pt-6">
                                <a href="{{ route('appointments.index') }}" 
                                   class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-full hover:bg-gray-200 transition duration-200 text-base">
                                    ← Cancel
                                </a>
                                <button type="submit"
                                        class="bg-gradient-to-r from-rose-500 to-pink-600 hover:from-rose-600 hover:to-pink-700 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 text-base">
                                    👑 Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>