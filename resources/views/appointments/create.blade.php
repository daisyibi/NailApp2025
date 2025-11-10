<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="text-3xl font-bold text-rose-600 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Book Appointment for <span class="text-rose-500">{{ $client->name }}</span>
            </h2>
            <a href="{{ route('clients.show', $client) }}" 
               class="text-sm text-rose-500 hover:text-rose-700 font-medium transition">
                ← Back to Client
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white/90 backdrop-blur-xl border border-rose-100 shadow-xl rounded-3xl p-10 transition hover:shadow-2xl hover:shadow-rose-100">

                <h3 class="text-xl font-semibold text-gray-800 mb-6 text-center">
                    ✨ Create a New Appointment ✨
                </h3>

                <form action="{{ route('clients.appointments.store', $client) }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Appointment Date -->
                    <div>
                        <label for="appointment_date" class="block text-sm font-semibold text-gray-700 mb-2">
                            Appointment Date & Time
                        </label>
                        <div class="relative">
                            <input type="datetime-local" name="appointment_date" id="appointment_date"
                                   class="w-full pl-10 border border-rose-200 rounded-2xl shadow-sm focus:ring-2 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-700 placeholder-rose-300 transition"
                                   required>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5 absolute left-3 top-3.5 text-rose-400" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Start Time -->
                    <div>
                        <label for="start_time" class="block text-sm font-semibold text-gray-700 mb-2">
                            Start Time
                        </label>
                        <div class="relative">
                            <input type="time" name="start_time" id="start_time"
                                   class="w-full pl-10 border border-rose-200 rounded-2xl shadow-sm focus:ring-2 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-700 placeholder-rose-300 transition"
                                   required>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5 absolute left-3 top-3.5 text-rose-400" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">
                            Status
                        </label>
                        <div class="relative">
                            <select name="status" id="status"
                                    class="w-full pl-10 border border-rose-200 rounded-2xl shadow-sm focus:ring-2 focus:ring-rose-400 focus:border-rose-400 px-3 py-3 text-gray-700 placeholder-rose-300 transition"
                                    required>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="w-5 h-5 absolute left-3 top-3.5 text-rose-400" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M5 12h14M12 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-6 border-t border-rose-100">
                        <a href="{{ route('clients.show', $client) }}"
                           class="text-gray-500 hover:text-gray-700 text-sm font-medium transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-gradient-to-r from-rose-400 to-pink-500 hover:from-rose-500 hover:to-pink-600 text-white font-semibold px-6 py-3 rounded-2xl shadow-md hover:shadow-lg transition-all duration-200">
                            💅 Create Appointment
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>


