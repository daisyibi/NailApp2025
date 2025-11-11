<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-display text-5xl text-rose-900 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                Nail Technicians
            </h2>
            <a href="{{ route('nailtechs.create') }}"
               class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-fuchsia-700 to-rose-800 text-white font-bold text-lg rounded-full shadow-md hover:shadow-xl transition transform hover:scale-[1.02] tracking-widest font-sans">
                + Add Nail Tech
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($nailtechs as $nailtech)
                    <div class="bg-white/90 backdrop-blur-lg rounded-3xl border border-pink-100 shadow-2xl shadow-rose-200/50 p-6 hover:shadow-2xl transition transform hover:-translate-y-1">
                        <!-- Nail Tech Name -->
                        <h3 class="text-3xl font-display font-bold text-rose-900 mb-2" style="font-family: 'Playfair Display', serif;">
                            {{ $nailtech->name }}
                        </h3>

                        <!-- Speciality -->
                        <p class="text-gray-700 text-lg mb-1">
                            <span class="font-bold text-rose-800">Speciality:</span> {{ $nailtech->speciality }}
                        </p>

                        <!-- Hourly Rate -->
                        <p class="text-gray-700 text-lg mb-4">
                            <span class="font-bold text-rose-800">Rate:</span> ${{ $nailtech->hourly_rate }}/hr
                        </p>

                        <!-- Assigned Clients Count -->
                        <p class="text-gray-600 mb-4">
                            <span class="font-semibold">{{ $nailtech->clients->count() }}</span> clients assigned
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex justify-between">
                            <a href="{{ route('nailtechs.show', $nailtech) }}"
                               class="px-4 py-2 bg-gradient-to-r from-rose-700 to-pink-800 text-white font-medium rounded-full shadow-md hover:shadow-lg transition text-sm">
                                View
                            </a>

                            <a href="{{ route('nailtechs.edit', $nailtech) }}"
                               class="px-4 py-2 bg-gradient-to-r from-fuchsia-700 to-rose-700 text-white font-medium rounded-full shadow-md hover:shadow-lg transition text-sm">
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-gray-500 text-center text-xl italic">No nail technicians found.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
