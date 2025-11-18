<x-app-layout>
    <x-slot name="header">
        {{-- Header: Elegant Serif for Classic Luxury --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-serif italic text-5xl text-rose-700 leading-tight tracking-wider font-extralight">
                💅 Dedicated Artistes
            </h2>
            <a href="{{ route('nailtechs.create') }}"
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-pink-500 to-rose-600 text-white font-bold rounded-full shadow-lg hover:from-pink-600 hover:to-rose-700 transition duration-300 transform hover:scale-[1.03] tracking-widest text-sm uppercase">
                + ADD NEW ARTISTE
            </a>
        </div>
    </x-slot>

    {{-- Enchanting Background: Soft White to Blush Pink Gradient --}}
    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                @forelse($nailtechs as $nailtech)
                    {{-- Luxury Card Design --}}
                    <div class="bg-white/90 backdrop-blur-sm rounded-3xl border border-pink-100 shadow-2xl shadow-rose-200/50 p-8 transition duration-300 hover:shadow-3xl hover:border-pink-300 transform hover:scale-[1.01] flex flex-col justify-between">
                        
                        <div class="space-y-4">
                            <!-- Nail Tech Name -->
                            <h3 class="text-3xl font-serif italic font-bold text-rose-800 tracking-tight mb-1">
                                {{ $nailtech->name }}
                            </h3>
                            
                            <!-- Speciality Badge -->
                            <div class="mb-4">
                                <span class="text-xs font-bold uppercase tracking-widest bg-pink-200/50 text-pink-800 px-4 py-1.5 rounded-full border border-pink-300 shadow-inner">
                                    {{ $nailtech->speciality }}
                                </span>
                            </div>

                            <!-- Details -->
                            <div class="text-md space-y-3 text-gray-600 border-t border-pink-100 pt-4">
                                
                                {{-- Hourly Rate --}}
                                <p class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M8.433 7.423a24.78 24.78 0 011.082 3.129 25.137 25.137 0 001.696-3.414.782.782 0 01.758-.553 1.054 1.054 0 01.99.704c.143.43.197.87.163 1.306l-.504 5.385a1.55 1.55 0 01-1.555 1.488H8.484a1.55 1.55 0 01-1.555-1.488l-.504-5.385c-.034-.436.02-.876.163-1.306a1.054 1.054 0 01.99-.704.782.782 0 01.758.553z"></path><path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM2 10a8 8 0 1116 0 8 8 0 01-16 0zm10.377-3.924a1.05 1.05 0 01.52.887l.217 2.32c.24.721-.193 1.503-.984 1.503h-3.44c-.791 0-1.225-.782-.984-1.503l.217-2.32a1.05 1.05 0 01.52-.887 1.01 1.01 0 011.01.002z" clip-rule="evenodd"></path></svg>
                                    <span class="font-semibold text-rose-700">Rate:</span> ${{ $nailtech->hourly_rate }}/hr
                                </p>

                                {{-- Assigned Clients Count Badge --}}
                                <p class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18H4v-3a6 6 0 0112 0v3z"></path></svg>
                                    <span class="font-semibold text-rose-700">Client Count:</span>
                                    <span class="font-bold text-lg text-pink-700">{{ $nailtech->clients->count() }}</span>
                                </p>
                                
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex justify-end gap-4 border-t border-pink-100 pt-6 mt-6">
                            <a href="{{ route('nailtechs.show', $nailtech) }}"
                               class="px-5 py-2 bg-gradient-to-r from-rose-600 to-pink-700 text-white font-medium rounded-full shadow-lg hover:shadow-xl transition text-sm tracking-wide uppercase">
                                View Profile
                            </a>

                            <a href="{{ route('nailtechs.edit', $nailtech) }}"
                               class="px-5 py-2 bg-pink-100 text-rose-700 font-medium rounded-full shadow-md hover:shadow-lg transition text-sm tracking-wide uppercase border border-pink-300">
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-12 bg-white/80 rounded-3xl shadow-xl border border-pink-100">
                        <p class="text-gray-500 text-center text-2xl italic font-light">No dedicated nail artistes found. Add your first artiste to begin!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>