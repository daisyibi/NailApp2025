<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight tracking-wide">
            ✨ {{ __('Edit Client') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">Update client details and keep your records fresh and fabulous.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="my-6 p-8 bg-white/90 backdrop-blur-md border border-pink-200 shadow-lg sm:rounded-3xl hover:shadow-2xl transition">

                <h3 class="text-2xl font-bold text-pink-700 mb-6 text-center">Client Information</h3>

                <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Client Name -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Client Name</label>
                            <x-text-input
                                type="text"
                                name="name"
                                field="name"
                                placeholder="e.g. Sarah Jones"
                                class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300"
                                :value="$client->name" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Email</label>
                            <x-text-input
                                type="email"
                                name="email"
                                field="email"
                                placeholder="e.g. sarah@example.com"
                                class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300"
                                :value="$client->email" />
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Phone Number</label>
                            <x-text-input
                                type="text"
                                name="phone_number"
                                field="phone_number"
                                placeholder="e.g. +1 234 567 890"
                                class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300"
                                :value="$client->phone_number" />
                        </div>

                        <!-- Design Choice -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Design Choice</label>
                            <x-text-input
                                type="text"
                                name="design_choice"
                                field="design_choice"
                                placeholder="e.g. French Tips, Chrome, Floral..."
                                class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300"
                                :value="$client->design_choice" />
                        </div>

                        <!-- Nail Tech Name -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Nail Technician</label>
                            <x-text-input
                                type="text"
                                name="nail_tech_name"
                                field="nail_tech_name"
                                placeholder="e.g. Mia"
                                class="w-full border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300"
                                :value="$client->nail_tech_name" />
                        </div>

                        <!-- Charms / Dropdown -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Charms / Add-ons</label>
                            <select name="charms" class="w-full border border-pink-200 rounded-xl py-2 px-3 focus:border-pink-400 focus:ring-pink-300">
                                <option value="">Select Charms</option>
                                <option value="None" {{ $client->charms == 'None' ? 'selected' : '' }}>None</option>
                                <option value="Rhinestones" {{ $client->charms == 'Rhinestones' ? 'selected' : '' }}>Rhinestones</option>
                                <option value="Glitter" {{ $client->charms == 'Glitter' ? 'selected' : '' }}>Glitter</option>
                                <option value="Stickers" {{ $client->charms == 'Stickers' ? 'selected' : '' }}>Stickers</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-pink-700 mb-1">Update Image</label>
                        <div class="border-2 border-dashed border-pink-300 rounded-xl p-4 text-center hover:bg-pink-50 transition">
                            <input type="file" name="image" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-xl file:border-0
                                file:text-sm file:font-semibold
                                file:bg-pink-100 file:text-pink-700
                                hover:file:bg-pink-200 cursor-pointer
                            "/>
                            <p class="text-xs text-gray-500 mt-2">Accepted formats: JPG, PNG, JPEG (max 2MB)</p>
                        </div>

                        @if($client->image)
                            <div class="mt-4 text-center">
                                <p class="text-sm text-gray-600 mb-2">Current Image:</p>
                                <img src="{{ asset('storage/' . $client->image) }}" 
                                     alt="{{ $client->name }}" 
                                     class="w-40 h-40 object-cover rounded-2xl mx-auto border border-pink-200 shadow-md hover:scale-105 transition-transform">
                            </div>
                        @endif
                    </div>

                    <!-- Notes -->
                    <div>
                        <label class="block text-sm font-medium text-pink-700 mb-1">Notes</label>
                        <textarea
                            name="notes"
                            rows="4"
                            placeholder="Update any preferences, allergies, or client feedback..."
                            class="w-full border border-pink-200 rounded-xl focus:border-pink-400 focus:ring-pink-300 resize-none p-3 text-gray-700">{{ $client->notes }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <x-primary-button class="mt-6 bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-2xl shadow-md hover:shadow-lg transition">
                            💅 Update Client
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
