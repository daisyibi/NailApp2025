<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h2 class="text-4xl font-light text-gray-800 tracking-wide flex items-center gap-3 border-l-4 border-pink-400 pl-4">
                ✨ Appointments Overview
            </h2>
            <p class="text-gray-500 text-base mt-1 max-w-md italic">
                A curated view of your exclusive client schedule.
            </p>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="bg-white/95 border border-pink-100 shadow-xl shadow-gray-200 rounded-3xl p-6 text-center transition duration-300 hover:bg-pink-50">
                <h3 class="text-lg font-medium text-pink-700 uppercase tracking-wider">Total Appointments</h3>
                <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $appointments->count() }}</p>
            </div>
            <div class="bg-white/95 border border-pink-100 shadow-xl shadow-gray-200 rounded-3xl p-6 text-center transition duration-300 hover:bg-pink-50">
                <h3 class="text-lg font-medium text-pink-500 uppercase tracking-wider">Upcoming</h3>
                <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $appointments->where('status', 'pending')->count() }}</p>
            </div>
            <div class="bg-white/95 border border-pink-100 shadow-xl shadow-gray-200 rounded-3xl p-6 text-center transition duration-300 hover:bg-pink-50">
                <h3 class="text-lg font-medium text-green-600 uppercase tracking-wider">Completed</h3>
                <p class="text-4xl font-extrabold text-gray-900 mt-2">{{ $appointments->where('status', 'completed')->count() }}</p>
            </div>
        </div>

        @if($appointments->isEmpty())
            <div class="bg-white/80 rounded-2xl shadow-xl p-12 mt-10">
                <p class="text-gray-500 text-center text-xl">No scheduled appointments at this time. Begin by adding a new client booking.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($appointments->sortByDesc('appointment_date') as $appointment)
                    <div class="bg-white border border-gray-100 shadow-lg rounded-2xl p-6 transition duration-300 hover:shadow-2xl hover:border-pink-300">
                        <div class="flex justify-between items-start mb-3 border-b border-pink-50 pb-2">
                            <h4 class="text-2xl font-semibold text-gray-800 tracking-tight">{{ $appointment->client->name }}</h4>
                            <span class="text-sm font-light text-pink-400">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y H:i') }}</span>
                        </div>
                        <p class="text-gray-500 mb-4 text-sm">Service Coordinator: {{ $appointment->user->name ?? 'N/A' }}</p>

                        <div class="flex flex-wrap items-center gap-2 mb-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider shadow-inner
                                @if($appointment->status === 'pending') bg-pink-100 text-pink-700
                                @elseif($appointment->status === 'confirmed') bg-purple-100 text-purple-700
                                @elseif($appointment->status === 'completed') bg-green-100 text-green-700
                                @elseif($appointment->status === 'cancelled') bg-red-100 text-red-700
                                @endif">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </div>

                        @if(auth()->user()->role === 'admin')
                            <div class="flex justify-end gap-3 pt-3 border-t border-gray-50">
                                <a href="{{ route('appointments.edit', $appointment) }}"
                                   class="px-4 py-2 bg-gradient-to-r from-pink-500 to-rose-700 text-white font-medium rounded-full hover:from-pink-600 hover:to-rose-800 transition duration-300 shadow-lg text-sm">
                                    Edit Details
                                </a>
                                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" 
                                      onsubmit="return confirm('Confirm deletion of this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-full hover:bg-red-500 hover:text-white transition duration-300 shadow-sm text-sm">
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