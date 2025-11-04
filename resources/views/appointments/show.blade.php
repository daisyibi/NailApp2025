<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-purple-700">Appointment Details</h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <p><strong>Client:</strong> {{ $appointment->client->name }}</p>
            <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
            <p><strong>Start Time:</strong> {{ $appointment->start_time }}</p>
            <p><strong>Status:</strong> {{ ucfirst($appointment->status) }}</p>
            <p><strong>Added by:</strong> {{ $appointment->user->name ?? 'N/A' }}</p>
        </div>
    </div>
</x-app-layout>
