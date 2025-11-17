<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-display text-4xl text-rose-900 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                {{ $client->name }} – Profile
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('clients.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-100/70 text-gray-700 text-sm font-medium rounded-full shadow-md hover:bg-gray-200 transition font-sans">
                    ← Back to Clients
                </a>
                <a href="{{ route('clients.edit', $client) }}"
                   class="inline-flex items-center px-4 py-2 bg-rose-600 text-white text-sm font-medium rounded-full shadow-md hover:bg-rose-700 transition">
                    Edit Client
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <!-- Top Section: Client Info -->
                <div class="flex flex-col lg:flex-row gap-12 items-start mb-12">

                    <!-- Left: Info -->
                    <div class="flex-1 space-y-6 font-sans">
                        <h3 class="text-5xl font-display text-rose-900 font-bold mb-6 tracking-wide" style="font-family: 'Playfair Display', serif;">
                            {{ $client->name }}
                        </h3>

                        <div class="border-t border-rose-200 pt-6 space-y-6">
                            <p><span class="font-bold text-rose-800">Email:</span> {{ $client->email ?? '—' }}</p>
                            <p><span class="font-bold text-rose-800">Phone:</span> {{ $client->phone_number ?? '—' }}</p>
                            <p><span class="font-bold text-rose-800">Design Choice:</span> {{ $client->design_choice ?? '—' }}</p>
                            <p><span class="font-bold text-rose-800">Charms:</span> {{ $client->charms ?? '—' }}</p>

                            <!-- Assigned Nail Techs -->
                            <div>
                                <h4 class="text-2xl font-bold text-rose-800 mb-2">Assigned Nail Technicians</h4>
                                @if($client->nailTechs->isEmpty())
                                    <p class="text-gray-500 italic">No nail tech assigned yet.</p>
                                @else
                                    <ul class="space-y-2">
                                        @foreach($client->nailTechs as $nailtech)
                                            <li class="px-4 py-2 bg-pink-50 rounded-xl shadow-inner border border-pink-100">
                                                {{ $nailtech->name }} ({{ $nailtech->speciality ?? '—' }})
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Appointments Section -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-2xl font-bold text-purple-800">Appointments</h4>
                                    <a href="{{ route('clients.appointments.create', $client) }}"
                                       class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-full shadow-md hover:bg-purple-700 transition">
                                        + Book Appointment
                                    </a>
                                </div>

                                @if($client->appointments->isEmpty())
                                    <p class="text-gray-500 italic">No appointments scheduled.</p>
                                @else
                                    <ul class="space-y-2">
                                        @foreach($client->appointments as $appointment)
                                            <li class="px-4 py-2 bg-purple-50 rounded-xl shadow-inner border border-purple-100 flex justify-between items-center">
                                                <div>
                                                    <span class="font-medium">Date:</span> {{ $appointment->date ? $appointment->date->format('M d, Y') : '—' }} |
                                                    <span class="font-medium">Time:</span> {{ $appointment->time ?? '—' }} |
                                                    <span class="font-medium">Service:</span> {{ $appointment->service ?? '—' }}
                                                </div>
                                                <div class="flex gap-2">
                                                    <a href="{{ route('appointments.edit', $appointment) }}"
                                                       class="px-3 py-1 bg-yellow-400 text-white text-sm rounded-full shadow hover:bg-yellow-500 transition">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-3 py-1 bg-red-500 text-white text-sm rounded-full shadow hover:bg-red-600 transition">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Notes -->
                            @if($client->notes)
                            <div>
                                <h4 class="text-2xl font-bold text-rose-800 mb-2">Notes</h4>
                                <p class="text-gray-600">{{ $client->notes }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Right: Image -->
                    <div class="flex-1">
                        @if($client->image)
                            <img src="{{ asset('storage/' . $client->image) }}" 
                                 alt="{{ $client->name }}" 
                                 class="w-full h-auto object-cover rounded-2xl border border-pink-200 shadow-md">
                        @else
                            <div class="w-full h-64 bg-pink-100/50 rounded-2xl border border-pink-200 flex items-center justify-center text-gray-400">
                                No Image Available
                            </div>
                        @endif
                    </div>

                </div>

                <!-- Delete Client -->
                <div class="mt-8 flex justify-center">
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this client?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-600 text-white font-bold rounded-2xl shadow-md hover:bg-red-700 transition">
                            Delete Client
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
