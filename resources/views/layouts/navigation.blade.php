<nav x-data="{ open: false }" class="bg-gradient-to-r from-pink-200 via-rose-100 to-purple-100 border-b border-pink-300 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- Logo / Brand -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <x-application-logo class="block h-10 w-auto fill-current text-pink-600" />
                    <span class="font-extrabold text-pink-700 text-2xl tracking-tight">Nail Studio</span>
                </a>
            </div>

            <!-- Desktop Links -->
            <div class="hidden sm:flex space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-pink-700 hover:text-pink-900 hover:scale-105 transition transform">
                    🏠 {{ __('Dashboard') }}
                </x-nav-link>

                <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="text-pink-700 hover:text-pink-900 hover:scale-105 transition transform">
                    💅 {{ __('Clients') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="52">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 bg-white/80 text-pink-800 font-medium rounded-full shadow-sm hover:bg-pink-50 transition duration-150">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-4 w-4 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-pink-700 hover:bg-pink-100 rounded-md">
                            👤 {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-600 hover:bg-rose-100 rounded-md">
                                🔒 {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-pink-600 hover:bg-pink-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-white/90 backdrop-blur-sm border-t border-pink-200">
        <div class="pt-2 pb-3 space-y-2 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-pink-700 hover:text-pink-900 hover:bg-pink-50 rounded-lg px-3 py-2 transition">
                🏠 {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="text-pink-700 hover:text-pink-900 hover:bg-pink-50 rounded-lg px-3 py-2 transition">
                💅 {{ __('Clients') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-pink-200 px-4">
            <div class="font-medium text-base text-pink-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-pink-600">{{ Auth::user()->email }}</div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-pink-700 hover:bg-pink-50 rounded-lg px-3 py-2">👤 {{ __('Profile') }}</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-rose-600 hover:bg-rose-100 rounded-lg px-3 py-2">🔒 {{ __('Log Out') }}</x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

