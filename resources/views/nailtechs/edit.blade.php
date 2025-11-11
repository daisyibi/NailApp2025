<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="font-display text-4xl text-rose-900 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                Edit Nail Technician
            </h2>
            <a href="{{ route('nailtechs.index') }}"
               class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 text-base font-medium rounded-full shadow-md hover:bg-gray-200 transition font-sans">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <form action="{{ route('nailtechs.update', $nailtech) }}" method="POST" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Nail Tech Name -->
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Name</label>
                        <x-text-input type="text" name="name" value="{{ old('name', $nailtech->name) }}"
                                      class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300" />
                    </div>

                    <!-- Speciality -->
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Speciality</label>
                        <x-text-input type="text" name="speciality" value="{{ old('speciality', $nailtech->speciality) }}"
                                      class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300" />
                    </div>

                    <!-- Hourly Rate -->
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-1">Hourly Rate ($)</label>
                        <x-text-input type="number" step="0.01" name="hourly_rate" value="{{ old('hourly_rate', $nailtech->hourly_rate) }}"
                                      class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300" />
                    </div>

                    <!-- Assign Clients -->
                    <div>
                        <label class="block text-sm font-medium text-rose-700 mb-2">Assign Clients</label>
                        <select name="clients[]" multiple
                                class="w-full border border-pink-200 rounded-xl py-2 px-3 focus:border-pink-400 focus:ring-pink-300 transition"
                        >
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ in_array($client->id, $nailtechClients) ? 'selected' : '' }}>
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1 italic">Hold Ctrl (Windows) or Cmd (Mac) to select multiple clients.</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <x-primary-button class="mt-4 bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-2xl shadow-md hover:shadow-lg transition transform hover:scale-105">
                            Update Nail Tech
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
