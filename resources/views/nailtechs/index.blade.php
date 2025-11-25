<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-6">
            <h2 class="font-serif text-5xl text-pink-700 tracking-wider font-light" style="font-family:'Playfair Display', serif;">
                🎀 Our Dedicated Nail Artists
            </h2>
            <a href="{{ route('nailtechs.create') }}"
                class="inline-flex items-center px-6 py-2 bg-pink-500 text-white font-semibold rounded-lg shadow-lg hover:bg-pink-600 transition duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                New Artist
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @forelse($nailtechs as $nailtech)
                    <div class="bg-white rounded-xl overflow-hidden shadow-xl border border-pink-100 hover:shadow-2xl hover:shadow-pink-200/50 transition duration-300 ease-in-out transform hover:-translate-y-0.5">

                        <div class="w-full h-40 bg-pink-50 flex items-center justify-center text-pink-400 border-b border-pink-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        
                        <div class="p-5 space-y-3">
                            <h3 class="text-2xl font-semibold text-pink-700 leading-tight">
                                {{ $nailtech->name }}
                            </h3>

                            <span class="inline-block bg-rose-100 text-rose-600 text-xs font-bold px-3 py-1 rounded-full shadow-inner tracking-wider">
                                {{ $nailtech->speciality }}
                            </span>
                            
                            <div class="pt-2 text-sm text-gray-500 space-y-1">
                                <p><strong class="text-pink-600">Rate:</strong> ${{ $nailtech->hourly_rate }} / hr</p>
                                <p><strong class="text-pink-600">Clients:</strong> {{ $nailtech->clients->count() }}</p>
                            </div>

                            <div class="flex justify-between items-center pt-3 border-t border-pink-50 mt-4">
                                <a href="{{ route('nailtechs.show', $nailtech) }}"
                                    class="text-sm font-medium text-pink-500 hover:text-pink-700 transition duration-150">
                                    View Details &rarr;
                                </a>
                                
                                <div class="flex space-x-2">
                                    <a href="{{ route('nailtechs.edit', $nailtech) }}"
                                        class="p-2 text-pink-400 hover:text-pink-600 rounded-full hover:bg-pink-50 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zm-1.75 2.15l-4.243 4.242A2 2 0 007 11.414V14a2 2 0 002 2h2.586a2 2 0 001.414-.586l4.242-4.243-5.657-5.657z" />
                                        </svg>
                                    </a>
                                    
                                    <form action="{{ route('nailtechs.destroy', $nailtech) }}" method="POST" onsubmit="return confirm('Delete {{ $nailtech->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-red-300 hover:text-red-500 rounded-full hover:bg-red-50 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 10-2 0v6a1 1 0 102 0V8z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full p-16 bg-pink-50 rounded-2xl shadow-inner text-center border-2 border-pink-200">
                        <p class="text-pink-500 text-2xl font-serif italic">No nail artists found.</p>
                        <p class="text-pink-400 mt-2">Click the **New Artist** button to get started!</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>