<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-4xl text-pink-700 font-extralight tracking-wider">{{ $client->name }} – Profile</h2>
        <a href="{{ route('clients.index') }}" class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 rounded-full shadow-md hover:bg-gray-200 transition mt-2">
            ← Back to Clients
        </a>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl sm:rounded-3xl p-10">

                <!-- Client Info -->
                <div class="space-y-4">
                    <p><span class="font-bold text-pink-700">Email:</span> {{ $client->email ?? 'No email' }}</p>
                    <p><span class="font-bold text-pink-700">Phone:</span> {{ $client->phone_number ?? 'No phone' }}</p>
                    <p><span class="font-bold text-pink-700">Design Choice:</span> {{ $client->design_choice ?? 'None' }}</p>
                    <p><span class="font-bold text-pink-700">Charms:</span> {{ $client->charms ?? 'Classic' }}</p>
                </div>

                <!-- Assigned NailTechs -->
                <div class="mt-6">
                    <h3 class="text-2xl font-bold text-pink-700 mb-2">Assigned Nail Technicians</h3>
                    @if($client->nailtechs->isEmpty())
                        <p class="text-gray-500 italic">No nail technicians assigned yet.</p>
                    @else
                        <ul class="list-disc list-inside">
                            @foreach($client->nailtechs as $tech)
                                <li>{{ $tech->name }} ({{ $tech->speciality }})</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <!-- Notes -->
                @if($client->notes)
                    <div class="mt-6">
                        <h3 class="text-2xl font-bold text-pink-700 mb-2">Notes</h3>
                        <p>{{ $client->notes }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>


            </div>
        </div>
    </div>
</x-app-layout>
