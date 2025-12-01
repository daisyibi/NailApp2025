<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="font-semibold text-3xl text-pink-800 leading-snug tracking-tighter" style="font-family: 'Playfair Display', serif;">
                    ✨ {{ __('New Client Profile') }}
                </h2>
                <p class="text-gray-500 text-sm mt-1">Capture every detail for a flawless, personalized experience.</p>
            </div>

      
            <a href="{{ route('clients.index') }}"
                class="inline-flex items-center px-5 py-2 bg-pink-100/80 text-pink-700 font-semibold rounded-full shadow-md hover:bg-pink-200 transition duration-300 transform hover:scale-[1.02]">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Clients
            </a>
        </div>
    </x-slot>


    <div class="py-12 bg-gradient-to-br from-pink-50 via-rose-100 to-purple-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            {{-- WOW! Card with Glassmorphism and Shadow --}}
            <div class="my-6 p-10 bg-white/70 backdrop-blur-xl border border-pink-300 shadow-3xl sm:rounded-[3rem] transition duration-500 hover:shadow-4xl">

                <h3 class="text-3xl font-bold text-pink-800 mb-8 text-center" style="font-family: 'Playfair Display', serif;">
                    Client Appointment Form
                </h3>

                <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data" class="space-y-12">
                    @csrf

                    {{-- SECTION 1: Personal Contact Info (Fieldset Group) --}}
                    <fieldset class="border-4 border-pink-200 rounded-3xl p-6 space-y-6">
                        <legend class="text-lg font-semibold text-pink-700 px-3">👤 Personal Details</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    Client Name
                                </label>
                                <x-text-input type="text" name="name" field="name" placeholder="First and Last Name"
                                    class="w-full border-pink-300 bg-white/80 rounded-xl focus:border-pink-600 focus:ring-pink-400 transition"
                                    :value="@old('name')" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    Email Address
                                </label>
                                <x-text-input type="email" name="email" field="email" placeholder="sarah@example.com"
                                    class="w-full border-pink-300 bg-white/80 rounded-xl focus:border-pink-600 focus:ring-pink-400 transition"
                                    :value="@old('email')" />
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 3.683a1 1 0 01-1.35 1.203l-1.543-.772a11.011 11.011 0 005.419 5.419l.772-1.543a1 1 0 011.203-1.35l3.683.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                                    Phone Number
                                </label>
                                <x-text-input type="text" name="phone_number" field="phone_number" placeholder="(123) 456-7890"
                                    class="w-full border-pink-300 bg-white/80 rounded-xl focus:border-pink-600 focus:ring-pink-400 transition"
                                    :value="@old('phone_number')" />
                            </div>
                        </div>
                    </fieldset>
           
                    <fieldset class="border-4 border-pink-200 rounded-3xl p-6 space-y-6">
                        <legend class="text-lg font-semibold text-pink-700 px-3">💅 Design & Preferences</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M12.586 4.343a2 2 0 012.828 0l3.121 3.121a2 2 0 010 2.828l-8.485 8.485a2 2 0 01-2.828 0l-3.121-3.121a2 2 0 010-2.828l8.485-8.485z"></path></svg>
                                    Design Focus
                                </label>
                                <x-text-input type="text" name="design_choice" field="design_choice" placeholder="French Tips, Chrome, Floral, etc."
                                    class="w-full border-pink-300 bg-white/80 rounded-xl focus:border-pink-600 focus:ring-pink-400 transition"
                                    :value="@old('design_choice')" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1zm0 3a1 1 0 011-1h6a1 1 0 110 2H8a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                    Charms / Add-ons
                                </label>
                                <select name="charms" id="charms-select"
                                        class="w-full border border-pink-300 bg-white/80 rounded-xl py-2 px-3 focus:border-pink-600 focus:ring-pink-400 transition appearance-none">
                                    <option value="">Select Charms</option>
                                    <option value="None" {{ old('charms') == 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Rhinestones" {{ old('charms') == 'Rhinestones' ? 'selected' : '' }}>Rhinestones</option>
                                    <option value="Glitter" {{ old('charms') == 'Glitter' ? 'selected' : '' }}>Glitter</option>
                                    <option value="Stickers" {{ old('charms') == 'Stickers' ? 'selected' : '' }}>Stickers</option>
                                </select>
                                {{-- Charms Badge Display (moved below select for cleaner two-column layout) --}}
                                <div id="charms-badge" class="mt-2 inline-block bg-pink-50 text-pink-700 text-xs font-semibold px-3 py-1 rounded-full border border-pink-300 shadow-inner">
                                    {{ old('charms') ?? 'Classic' }}
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-pink-700 mb-1 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-pink-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                    Assigned Nail Technician(s)
                                </label>
                                <select name="nailtechs[]" multiple
                                        class="w-full border border-pink-300 bg-white/80 rounded-xl py-2 px-3 focus:border-pink-600 focus:ring-pink-400 transition h-32">
                                    @foreach($nailtechs as $tech)
                                        <option value="{{ $tech->id }}" {{ in_array($tech->id, old('nailtechs', [])) ? 'selected' : '' }}>
                                            {{ $tech->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Hold Ctrl / Cmd to select multiple technicians.</p>
                            </div>
                        </div>
                    </fieldset>
                    
                 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        <div class="order-2 md:order-1">
                            <h4 class="text-xl font-bold text-pink-800 mb-3" style="font-family: 'Playfair Display', serif;">
                                📝 Client Preferences & History
                            </h4>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Detailed Notes</label>
                            <textarea name="notes" rows="6" placeholder="Allergies, preferred shape/length, special requests, past issues..."
                                class="w-full border border-pink-300 bg-white/80 rounded-2xl focus:border-pink-600 focus:ring-pink-400 resize-none p-4 text-gray-700 transition">{{ old('notes') }}</textarea>
                        </div>

                        <div class="order-1 md:order-2">
                            <h4 class="text-xl font-bold text-pink-800 mb-3" style="font-family: 'Playfair Display', serif;">
                                📸 Design Reference
                            </h4>
                            <label class="block text-sm font-medium text-pink-700 mb-1">Upload Inspiration Image</label>
                            <div class="border-4 border-dashed border-pink-400/70 rounded-3xl p-8 text-center bg-pink-50/50 hover:bg-pink-100 transition cursor-pointer group">
                                <input type="file" name="image" class="block w-full text-sm text-gray-600
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-xl file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-pink-300 file:text-pink-800
                                    hover:file:bg-pink-400 hover:file:text-white cursor-pointer transition
                                "/>
                                <p class="text-xs text-gray-500 mt-3">JPG, PNG, JPEG | Max 2MB. Upload a photo of the desired design.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t-2 border-pink-200">
                        <div class="flex justify-center">
                            <x-primary-button class="bg-gradient-to-r from-pink-600 to-rose-700 hover:from-pink-700 hover:to-rose-800 text-white px-10 py-4 rounded-3xl text-lg font-semibold shadow-2xl transition duration-300 transform hover:scale-[1.03] hover:shadow-3xl focus:ring-4 focus:ring-pink-300">
                                💖 Save & Create Client Profile
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const charmsSelect = document.getElementById('charms-select');
        const charmsBadge = document.getElementById('charms-badge');

        // Initial setup for the badge
        charmsBadge.textContent = charmsSelect.value || 'Classic';

        charmsSelect.addEventListener('change', function() {
            // Update badge text, defaulting to 'Classic' if nothing is selected or value is empty
            charmsBadge.textContent = this.value || 'Classic';
        });
    </script>
</x-app-layout>