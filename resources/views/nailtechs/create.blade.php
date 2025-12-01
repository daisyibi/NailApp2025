<x-app-layout>
    <x-slot name="header">
        {{-- Header: Elegant Serif for Classic Luxury --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-serif italic text-4xl text-rose-700 leading-tight tracking-wider font-medium">
                {{ isset($nailtech) ? $nailtech->name . ' – Profile Management' : '✨ Add a New Dedicated Artiste' }}
            </h2>
            <a href="{{ route('nailtechs.index') }}"
               class="inline-flex items-center px-6 py-2 bg-pink-100/80 text-rose-700 font-semibold rounded-full shadow-md hover:bg-pink-200 transition tracking-wide text-sm border border-pink-200">
                ← Back to Artiste List
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
          
            <div class="bg-white rounded-3xl border border-pink-100 shadow-3xl shadow-rose-200/50 p-10 md:p-12">
                
                <h3 class="text-2xl font-serif italic text-rose-800 mb-6 pb-3 border-b border-pink-100">
                    Artiste Details
                </h3>

                <form action="{{ isset($nailtech) ? route('nailtechs.update', $nailtech) : route('nailtechs.store') }}" 
                      method="POST" class="space-y-8">
                    @csrf
                    @if(isset($nailtech))
                        @method('PUT')
                    @endif

                 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <div>
                            <label for="name" class="block text-sm font-bold uppercase tracking-wider text-rose-700 mb-2">Artiste Name</label>
                            <x-text-input type="text" id="name" name="name" 
                                class="w-full border-rose-300 rounded-xl focus:border-rose-500 focus:ring-rose-500/50 p-3 transition duration-150"
                                :value="old('name', $nailtech->name ?? '')" required />
                        </div>

                        <div>
                            <label for="speciality" class="block text-sm font-bold uppercase tracking-wider text-rose-700 mb-2">Speciality</label>
                            <x-text-input type="text" id="speciality" name="speciality" 
                                class="w-full border-rose-300 rounded-xl focus:border-rose-500 focus:ring-rose-500/50 p-3 transition duration-150"
                                :value="old('speciality', $nailtech->speciality ?? '')" required />
                        </div>

                        <div>
                            <label for="hourly_rate" class="block text-sm font-bold uppercase tracking-wider text-rose-700 mb-2">Hourly Rate ($)</label>
                            <x-text-input type="number" step="0.01" id="hourly_rate" name="hourly_rate" 
                                class="w-full border-rose-300 rounded-xl focus:border-rose-500 focus:ring-rose-500/50 p-3 transition duration-150"
                                :value="old('hourly_rate', $nailtech->hourly_rate ?? '')" required />
                        </div>

                        <div>
                            <label for="clients" class="block text-sm font-bold uppercase tracking-wider text-rose-700 mb-2">Assign Clients (Multi-Select)</label>
                            <select id="clients" name="clients[]" multiple size="4"
                                    class="w-full border border-rose-300 rounded-xl p-3 focus:border-rose-500 focus:ring-rose-500/50 transition duration-150 text-gray-700 shadow-inner">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}"
                                        @if(isset($nailtech) && $nailtech->clients->contains($client->id)) selected @endif
                                        class="py-1.5 px-2 hover:bg-pink-50">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            
                    <div class="flex justify-center pt-4">
                        <button type="submit"
                            class="inline-flex items-center px-10 py-3 bg-gradient-to-r from-pink-500 to-rose-700 text-white font-bold rounded-full shadow-xl hover:from-pink-600 hover:to-rose-800 transition duration-300 transform hover:scale-[1.01] tracking-widest text-base uppercase">
                            {{ isset($nailtech) ? 'SAVE CHANGES' : 'CREATE NEW ARTISTE' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>