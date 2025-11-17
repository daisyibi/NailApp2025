<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-display text-4xl text-pink-700 font-extralight tracking-wider">
                {{ isset($nailtech) ? $nailtech->name . ' – Profile' : 'Add a New Nail Technician' }}
            </h2>
            <a href="{{ route('nailtechs.index') }}"
               class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 font-medium rounded-full shadow-md hover:bg-gray-200 transition font-sans">
                ← Back to Nail Technicians
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <form action="{{ isset($nailtech) ? route('nailtechs.update', $nailtech) : route('nailtechs.store') }}" 
                      method="POST" class="space-y-6">
                    @csrf
                    @if(isset($nailtech))
                        @method('PUT')
                    @endif

                    <!-- NailTech Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-rose-700 mb-1">Name</label>
                            <x-text-input type="text" name="name" 
                                class="w-full border-rose-200 rounded-xl focus:border-rose-400 focus:ring-rose-300"
                                :value="old('name', $nailtech->name ?? '')" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-rose-700 mb-1">Speciality</label>
                            <x-text-input type="text" name="speciality" 
                                class="w-full border-rose-200 rounded-xl focus:border-rose-400 focus:ring-rose-300"
                                :value="old('speciality', $nailtech->speciality ?? '')" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-rose-700 mb-1">Hourly Rate</label>
                            <x-text-input type="number" name="hourly_rate" 
                                class="w-full border-rose-200 rounded-xl focus:border-rose-400 focus:ring-rose-300"
                                :value="old('hourly_rate', $nailtech->hourly_rate ?? '')" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-rose-700 mb-1">Assign Clients</label>
                            <select name="clients[]" multiple
                                    class="w-full border border-rose-200 rounded-xl py-2 px-3 focus:border-rose-400 focus:ring-rose-300">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}"
                                        @if(isset($nailtech) && $nailtech->clients->contains($client->id)) selected @endif>
                                        {{ $client->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-center">
                        <x-primary-button class="mt-6 bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-2xl shadow-md hover:shadow-lg transition">
                            {{ isset($nailtech) ? 'Update Nail Technician' : 'Add Nail Technician' }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
