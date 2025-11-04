<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-semibold text-pink-700 leading-tight">
            ✏️ Edit Appointment
        </h2>
        <p class="text-gray-500 mt-1 text-sm">Update your appointment details below.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-pink-50 via-white to-purple-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl sm:rounded-3xl p-8 hover:shadow-2xl transition">

                <form action="{{ route('appointments.update', $appointment) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Client Selection (Optional if editable) -->
                    <div class="mb-4">
                        <label for="client_id" class="block font-medium text-gray-700">Client</label>
                        <select name="client_id" id="client_id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ $appointment->client_id == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Appointment Date & Time -->
                    <div class="mb-4">
                        <label for="appointment_date" class="block font-medium text-gray-700">Appointment Date & Time</label>
                        <input type="datetime-local" id="appointment_date" name="appointment_date"
                               value="{{ $appointment->appointment_date->format('Y-m-d\TH:i') }}"
                               class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
                        @error('appointment_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-6">
                        <label for="status" class="block font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
                            <option value="pending" {{ $appointment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $appointment->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="completed" {{ $appointment->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $appointment->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center">
                        <a href="{{ route('appointments.index') }}" 
                           class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                            ← Back to Appointments
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-purple-500 text-white font-semibold rounded-lg hover:bg-purple-600 transition">
                            Update Appointment
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

