<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-rose-900 leading-tight tracking-wide">✨ Edit Nail Technician</h2>
        <p class="text-gray-500 text-sm mt-1">Update nail tech details and keep your studio organized.</p>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-white via-pink-50 to-rose-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-8 bg-white/90 backdrop-blur-md border border-pink-200 shadow-lg sm:rounded-3xl hover:shadow-2xl transition">

                <h3 class="text-2xl font-bold text-rose-900 mb-6 text-center">Nail Technician Information</h3>

                <form action="{{ route('nailtechs.update', $nailtech) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-text-input type="text" name="name" :value="$nailtech->name" placeholder="Name" />
                        <x-text-input type="text" name="speciality" :value="$nailtech->speciality" placeholder="Speciality" />
                        <x-text-input type="number" name="hourly_rate" :value="$nailtech->hourly_rate" placeholder="Hourly Rate" />
                    </div>

                    <div class="flex justify-center mt-4">
                        <x-primary-button class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-2xl shadow-md hover:shadow-lg transition">
                            💅 Update Nail Technician
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
