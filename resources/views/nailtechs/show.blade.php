<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-display text-4xl text-rose-900 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                {{ $nailtech->name }} – Profile
            </h2>
            <a href="{{ route('nailtechs.index') }}"
               class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 text-base font-medium rounded-full shadow-md hover:bg-gray-200 transition font-sans">
                ← Back to Nail Techs
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <!-- Nail Tech Info Card -->
                <div class="flex flex-col lg:flex-row gap-12 items-start mb-12">
                    
                    <!-- Left: Info -->
                    <div class="flex-1 space-y-6 font-sans">
                        <h3 class="text-5xl font-display text-rose-900 font-bold mb-6 tracking-wide" style="font-family: 'Playfair Display', serif;">
                            {{ $nailtech->name }}
                        </h3>

                        <div class="border-t border-rose-200 pt-6 space-y-6">
                            <p class="text-xl text-gray-700">
                                <span class="font-bold text-rose-800 tracking-wide">Speciality:</span> 
                                <span class="text-gray-600">{{ $nailtech->speciality }}</span>
                            </p>

                            <p class="text-xl text-gray-700">
                                <span class="font-bold text-rose-800 tracking-wide">Hourly Rate:</span> 
                                <span class="text-gray-600">${{ $nailtech->hourly_rate }}</span>
                            </p>

                            <!-- Assigned Clients -->
                            <div>
                                <h4 class="text-2xl font-bold text-rose-800 mb-2">Assigned Clients</h4>
                                @if($nailtech->clients->isEmpty())
                                    <p class="text-gray-500 italic">No clients assigned yet.</p>
                                @else
                                    <ul class="space-y-2">
                                        @foreach($nailtech->clients as $client)
                                            <li class="px-4 py-2 bg-pink-50 rounded-xl shadow-inner border border-pink-100">
                                                {{ $client->name }} ({{ $client->email ?? 'No email' }})
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                        <!-- Edit Button -->
                        <div class="mt-8">
                            <a href="{{ route('nailtechs.edit', $nailtech) }}"
                               class="inline-flex items-center px-10 py-3 bg-gradient-to-r from-rose-700 to-pink-800 text-white font-bold text-lg rounded-full shadow-2xl shadow-rose-600/50 tracking-widest hover:scale-[1.03] transition transform duration-400 font-sans border-b-4 border-rose-900 hover:border-b-2">
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
