<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-pink-700 leading-tight tracking-wide">
            💅 {{ __('Add a New Client') }}
        </h2>
        <p class="text-gray-500 text-sm mt-1">Keep your clients’ details organised brutiful.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-50 to-purple-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-8 bg-white/90 backdrop-blur-md border border-pink-200 shadow-lg sm:rounded-3xl">
                <h3 class="text-xl font-semibold text-pink-700 mb-6 text-center">Client Information</h3>

                <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Client Name -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Client Name</label>
                            <x-text-input
                                type="text"
                                name="name"
                                field="name"
                                placeholder="e.g. Sarah Jones"
                                class="w-full border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300"
                                :value="@old('name')" />
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Email</label>
                            <x-text-input
                                type="email"
                                name="email"
                                field="email"
                                placeholder="e.g. sarah@example.com"
                                class="w-full border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300"
                                :value="@old('email')" />
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Phone Number</label>
                            <x-text-input
                                type="text"
                                name="phone_number"
                                field="phone_number"
                                placeholder="e.g. +1 234 567 890"
                                class="w-full border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300"
                                :value="@old('phone_number')" />
                        </div>

                        <!-- Design Choice -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Design Choice</label>
                            <x-text-input
                                type="text"
                                name="design_choice"
                                field="design_choice"
                                placeholder="e.g. French Tips, Chrome, Floral..."
                                class="w-full border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300"
                                :value="@old('design_choice')" />
                        </div>

                        <!-- Nail Tech Name -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Nail Technician</label>
                            <x-text-input
                                type="text"
                                name="nail_tech_name"
                                field="nail_tech_name"
                                placeholder="e.g. Mia"
                                class="w-full border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300"
                                :value="@old('nail_tech_name')" />
                        </div>

                        <!-- Charms / Dropdown -->
                        <div>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Charms / Add-ons</label>
                            <select name="charms" class="w-full border border-pink-200 rounded-lg py-2 px-3 focus:border-pink-400 focus:ring-pink-300">
                                <option value="">Select Charms</option>
                                <option value="None" {{ old('charms') == 'None' ? 'selected' : '' }}>None</option>
                                <option value="Rhinestones" {{ old('charms') == 'Rhinestones' ? 'selected' : '' }}>Rhinestones</option>
                                <option value="Glitter" {{ old('charms') == 'Glitter' ? 'selected' : '' }}>Glitter</option>
                                <option value="Stickers" {{ old('charms') == 'Stickers' ? 'selected' : '' }}>Stickers</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-pink-700 mb-1">Upload Nail Design Image</label>
                        <div class="border-2 border-dashed border-pink-300 rounded-lg p-4 text-center hover:bg-pink-50 transition">
                            <input type="file" name="image" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-pink-100 file:text-pink-700
                                hover:file:bg-pink-200 cursor-pointer
                            "/>
                            <p class="text-xs text-gray-500 mt-2">Accepted formats: JPG, PNG, JPEG (max 2MB)</p>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div>
                        <label class="block text-sm font-medium text-pink-700 mb-1">Notes</label>
                        <textarea
                            name="notes"
                            rows="4"
                            placeholder="Add any notes about client preferences, allergies, or design ideas..."
                            class="w-full border border-pink-200 rounded-lg focus:border-pink-400 focus:ring-pink-300 resize-none p-3 text-gray-700">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <x-primary-button class="mt-6 bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg transition">
                            💖 Save Client
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>


