<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-b border-gray-200 shadow-sm sm:rounded-lg p-6">
                
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Client Image -->
                    <div class="flex-shrink-0">
                        <img src="{{ asset('images/clients/' . $client->image) }}" alt="{{ $client->name }}" class="w-64 h-64 object-cover rounded-md">
                    </div>

                    <!-- Client Details -->
                    <div class="flex-1 space-y-2">
                        <h3 class="text-2xl font-semibold text-gray-900">{{ $client->name }}</h3>
                        <p class="text-gray-600"><strong>Email:</strong> {{ $client->email ?? 'N/A' }}</p>
                        <p class="text-gray-600"><strong>Phone:</strong> {{ $client->phone_number ?? 'N/A' }}</p>
                        <p class="text-gray-600"><strong>Design Choice:</strong> {{ $client->design_choice ?? 'N/A' }}</p>
                        <p class="text-gray-600"><strong>Nail Technician:</strong> {{ $client->nail_tech_name ?? 'N/A' }}</p>
                        <p class="text-gray-600"><strong>Charms:</strong> {{ $client->charms ?? 'N/A' }}</p>
                        @if($client->notes)
                            <p class="text-gray-500 mt-2"><strong>Notes:</strong> {{ $client->notes }}</p>
                        @endif
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                        &larr; Back to All Clients
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
