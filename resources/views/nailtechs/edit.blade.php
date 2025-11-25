<x-app-layout>
    <x-slot name="header">
        {{-- Header: Adjusted Font Size and Added Padding --}}
        <div class="py-2">
            <h2 class="font-serif italic text-4xl text-rose-700 leading-tight tracking-wider font-extralight">
                💅 {{ __('Edit Nail Technician Profile') }}
            </h2>
            <p class="text-gray-500 text-sm mt-1">Update professional details and client assignments for **{{ $nailtech->name }}**.</p>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="p-8 bg-white/95 backdrop-blur-sm border border-pink-200 shadow-3xl sm:rounded-[2rem] transition duration-500">

                <form action="{{ route('nailtechs.update', $nailtech) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    {{-- 1. Personal & Specialization Info Group --}}
                    <div class="border border-pink-100 p-6 rounded-2xl bg-pink-50/50">
                        <h3 class="text-xl font-bold text-rose-700 mb-5 border-b border-pink-200 pb-3 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            Personal Details
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                                {{-- Assuming x-text-input accepts class override --}}
                                <x-text-input id="name" type="text" name="name" :value="old('name', $nailtech->name)" 
                                    class="w-full border-pink-300 rounded-xl shadow-sm focus:border-rose-400 focus:ring-rose-300/50" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <label for="speciality" class="block text-sm font-medium text-gray-700 mb-1">Speciality / Focus</label>
                                <x-text-input id="speciality" type="text" name="speciality" :value="old('speciality', $nailtech->speciality)" 
                                    class="w-full border-pink-300 rounded-xl shadow-sm focus:border-rose-400 focus:ring-rose-300/50" placeholder="e.g., Gel Extensions, Nail Art" />
                                <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
                            </div>
                            
                        </div>
                    </div>

                    {{-- 2. Financial Info Group --}}
                    <div class="border border-pink-100 p-6 rounded-2xl bg-pink-50/50">
                        <h3 class="text-xl font-bold text-rose-700 mb-5 border-b border-pink-200 pb-3 flex items-center gap-2">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.162.297-.34.426-.534.202-.296.39-.623.535-.976.242-.64.29-1.328.232-2.023A2.962 2.962 0 0010 2a8 8 0 11-9.985 8.995A2.962 2.962 0 008.433 7.418zM14 10a4 4 0 10-8 0 4 4 0 008 0z"></path></svg>
                            Compensation Details
                        </h3>
                         <div>
                            <label for="hourly_rate" class="block text-sm font-medium text-gray-700 mb-1">Hourly Rate ($)</label>
                            <div class="relative">
                                <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500">$</span>
                                <x-text-input id="hourly_rate" type="number" name="hourly_rate" :value="old('hourly_rate', $nailtech->hourly_rate)" 
                                    class="w-full border-pink-300 rounded-xl shadow-sm focus:border-rose-400 focus:ring-rose-300/50 pl-7" 
                                    step="0.01" min="0" placeholder="0.00" />
                            </div>
                            <x-input-error :messages="$errors->get('hourly_rate')" class="mt-2" />
                        </div>
                    </div>

                    {{-- 3. Multi-select Clients Group --}}
                    <div class="border border-pink-100 p-6 rounded-2xl bg-pink-50/50">
                        <h3 class="text-xl font-bold text-rose-700 mb-5 border-b border-pink-200 pb-3 flex items-center gap-2">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM10 9a4 4 0 00-4 4v2h8v-2a4 4 0 00-4-4z"></path></svg>
                            Client Assignments
                        </h3>
                        <div>
                            <label for="clients" class="block text-sm font-medium text-gray-700 mb-2">Assign Clients</label>
                            <select id="clients" name="clients[]" multiple
                                    class="w-full border border-pink-300 rounded-xl py-2 px-3 shadow-sm focus:border-rose-400 focus:ring-rose-300/50 h-52">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ $nailtech->clients->contains($client->id) ? 'selected' : '' }}
                                        class="p-2 hover:bg-pink-100">
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-xs text-gray-500 mt-2">Hold Ctrl (Windows) or Cmd (Mac) to select multiple clients.</p>
                        </div>
                    </div>

                    {{-- 4. Action Buttons --}}
                    <div class="flex justify-end gap-4 pt-4 border-t border-pink-100">
                        
                        {{-- Back/Cancel Link --}}
                        <a href="{{ route('nailtechs.index') }}" 
                           class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-semibold rounded-full bg-white hover:bg-gray-100 transition duration-150 shadow-sm text-sm">
                            Cancel
                        </a>

                        <button type="submit" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-pink-600 to-rose-700 text-white font-semibold rounded-full shadow-lg hover:from-pink-700 hover:to-rose-800 transition duration-300 transform hover:scale-[1.02] text-sm tracking-wide">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Save Updates
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>