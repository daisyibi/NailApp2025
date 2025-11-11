<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-display text-5xl text-rose-900 leading-tight tracking-wider font-extralight" style="font-family: 'Playfair Display', serif;">
                    Add New Nail Technician
                </h2>
                <p class="text-gray-600 text-lg mt-2 italic font-light font-sans tracking-wide">
                    Fill in the details to add a talented Nail Tech to your team ✨
                </p>
            </div>
            <a href="{{ route('nailtechs.index') }}"
                class="inline-flex items-center px-6 py-2 bg-gray-100/70 text-gray-700 text-base font-medium rounded-full shadow-md hover:bg-gray-200 transition font-sans">
                ← Back to Nail Techs
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-lg border border-pink-100 shadow-2xl shadow-rose-200/50 sm:rounded-3xl p-10">

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <ul class="text-red-700 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Form -->
                <form action="{{ route('nailtechs.store') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-sm focus:ring-2 focus:ring-rose-300 focus:outline-none">
                    </div>

                    <!-- Speciality -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Speciality</label>
                        <input type="text" name="speciality" value="{{ old('speciality') }}" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-sm focus:ring-2 focus:ring-rose-300 focus:outline-none">
                    </div>

                    <!-- Hourly Rate -->
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Hourly Rate ($)</label>
                        <input type="number" name="hourly_rate" value="{{ old('hourly_rate') }}" required
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-sm focus:ring-2 focus:ring-rose-300 focus:outline-none">
                    </div>

                    <!-- Assign Clients (optional) -->
                    @if(isset($clients) && $clients->count())
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Assign Clients</label>
                            <select name="clients[]" multiple
                                    class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-sm focus:ring-2 focus:ring-rose-300 focus:outline-none">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }} ({{ $client->email }})</option>
                                @endforeach
                            </select>
                            <p class="text-gray-400 text-sm mt-1">Hold Ctrl (Cmd on Mac) to select multiple clients.</p>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <div class="mt-10">
                        <button type="submit"
                                class="w-full bg-gradient-to-r from-rose-700 to-pink-800 text-white font-bold text-lg rounded-full shadow-2xl shadow-rose-600/50 hover:scale-[1.03] transition transform duration-400 py-3 tracking-widest">
                            Add Nail Tech
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
