<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-purple-700">All Appointments</h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Appointments List</h3>
            </div>

            @if($appointments->isEmpty())
                <p>No appointments scheduled yet.</p>
            @else
                <table class="min-w-full border divide-y divide-gray-200">
                    <thead class="bg-purple-100">
                        <tr>
                            <th class="px-4 py-2">Client</th>
                            <th class="px-4 py-2">Date & Time</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Created By</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($appointments as $appointment)
                            <tr>
                                <td class="px-4 py-2">{{ $appointment->client->name }}</td>
                                <td class="px-4 py-2">{{ $appointment->appointment_date }} {{ $appointment->start_time }}</td>
                                <td class="px-4 py-2">{{ ucfirst($appointment->status) }}</td>
                                <td class="px-4 py-2">{{ $appointment->user->name ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</x-app-layout>
