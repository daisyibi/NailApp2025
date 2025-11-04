<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-purple-700">Create Appointment for {{ $client->name }}</h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">

            <form action="{{ route('clients.appointments.store', $client) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="appointment_date" class="block font-medium">Appointment Date</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="start_time" class="block font-medium">Start Time</label>
                    <input type="time" name="start_time" id="start_time"
                           class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block font-medium">Status</label>
                    <select name="status" id="status" class="w-full border rounded px-3 py-2" required>
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600 transition">
                    Create Appointment
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
