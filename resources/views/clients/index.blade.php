<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-display text-rose-800" style="font-family: 'Playfair Display', serif;">Clients</h1>
                <p class="text-gray-500 mt-1">Your curated clientele — premium cards, side-by-side.</p>
            </div>
            <a href="{{ route('clients.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-rose-500 to-pink-600 text-white rounded-full shadow-lg">+ Add Client</a>
        </div>
    </x-slot>

    <div class="mt-8">
        @if($clients->isEmpty())
            <div class="bg-white p-8 rounded-3xl border border-pink-100 text-center text-gray-500">No clients yet.</div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($clients as $client)
                    <article class="bg-white rounded-3xl shadow-xl border border-pink-100 overflow-hidden group">
                        <div class="relative h-56">
                            <img src="{{ $client->image ? asset('storage/'.$client->image) : 'https://placehold.co/800x600/fff8fa/e91e63?text=No+Image' }}"
                                 alt="{{ $client->name }}"
                                 class="w-full h-full object-cover transition-transform group-hover:scale-105">
                            @if($client->charms)
                                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                    @foreach(explode(',', $client->charms) as $c)
                                        <span class="px-2 py-1 bg-white/80 text-rose-600 text-xs rounded-full border border-pink-100">{{ trim($c) }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="text-2xl font-display text-rose-800" style="font-family: 'Playfair Display', serif;">{{ $client->name }}</h3>
                            <p class="text-gray-600 mt-2 text-sm">{{ $client->design_choice ?? 'Design preference not set' }}</p>

                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    <div>{{ Str::limit($client->email ?? 'No email', 25) }}</div>
                                    <div>{{ $client->phone_number ?? 'No phone' }}</div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <a href="{{ route('clients.show', $client) }}" class="px-3 py-2 bg-gray-100 rounded-full text-sm">View</a>
                                    <a href="{{ route('clients.edit', $client) }}" class="px-3 py-2 bg-gradient-to-r from-rose-400 to-pink-500 text-white rounded-full text-sm">Edit</a>
                                </div>
                            </div>

                            <div class="mt-4 text-xs text-gray-500">
                                @if($client->nailTechs->isNotEmpty())
                                    <!-- show names -->
                                    Techs:
                                    {{ $client->nailTechs->pluck('name')->join(', ') }}
                                @else
                                    <span class="italic">No nail tech assigned</span>
                                @endif
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
