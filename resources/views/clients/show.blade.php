<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight tracking-wide">
            💖 {{ $client->name }}'s Profile
        </h2>
        <p class="text-gray-500 text-sm mt-1">View client’s full nail design profile and appointments.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-md border border-pink-100 shadow-xl sm:rounded-3xl p-10 hover:shadow-2xl transition">

                <!-- Client Info -->
                <div class="flex flex-col md:flex-row gap-8 items-start mb-10">
                    <div class="flex-shrink-0 w-full md:w-1/2">
                        <img src="{{ $client->image ? asset('storage/' . $client->image) : asset('images/default-client.jpg') }}"
                             alt="{{ $client->name }}"
                             class="w-full h-80 object-cover rounded-3xl border border-pink-100 shadow-md">
                        <div class="absolute top-4 right-4 bg-pink-100 text-pink-700 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                            {{ $client->charms ?? 'Classic' }}
                        </div>
                    </div>

                    <div class="flex-1 space-y-3">
                        <h3 class="text-3xl font-bold text-pink-700">{{ $client->name }}</h3>
                        <div class="text-gray-600 space-y-1">
                            <p><span class="font-semibold text-pink-600">Email:</span> {{ $client->email ?? 'N/A' }}</p>
                            <p><span class="font-semibold text-pink-600">Phone:</span> {{ $client->phone_number ?? 'N/A' }}</p>
                            <p><span class="font-semibold text-pink-600">Preferred Nail Tech:</span> {{ $client->nail_tech_name ?? 'N/A' }}</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('clients.edit', $client) }}"
                               class="inline-flex items-center px-4 py-2 bg-pink-600 text-white text-sm font-semibold rounded-xl shadow-md hover:bg-pink-700 transition">
                               ✏️ Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Appointments Section -->
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold text-gray-800">Appointments</h4>

                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('clients.appointments.create', $client) }}"
                               class="px-4 py-2 bg-purple-500 text-white rounded-lg font-semibold hover:bg-purple-600 transition">
                               + Add Appointment
                            </a>
                        @endif
                    </div>

                    @if($client->appointments->isEmpty())
                        <p class="text-gray-600">No appointments yet.</p>
                    @else
                        <ul class="space-y-4">
                            @foreach($client->appointments->sortByDesc('appointment_date') as $appointment)
                                <li class="bg-white border border-gray-200 p-4 rounded-lg shadow-sm flex justify-between items-center">
                                    <div>
                                        <p class="font-semibold">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y H:i') }}</p>
                                        <p class="text-gray-600 text-sm">Added by: {{ $appointment->user->name ?? 'N/A' }}</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-semibold 
                                        @if($appointment->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($appointment->status === 'confirmed') bg-blue-100 text-blue-800
                                        @elseif($appointment->status === 'completed') bg-green-100 text-green-800
                                        @elseif($appointment->status === 'cancelled') bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
