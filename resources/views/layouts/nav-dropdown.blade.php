<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <div class="flex">
                <!-- Logo -->
            </div>

            <!-- Settings Dropdown -->
            @if (Route::has('login'))
                @auth
                    <div class=" sm:flex sm:items-center sm:ms-6">
                        <x-custom.dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <x-custom.nav-link>
                                    <x-custom.input-label>{{ Auth::user()->name }}</x-custom.input-label>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </x-custom.nav-link>
                            </x-slot>

                            <x-slot name="content">
                                <x-forms.dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-forms.dropdown-link>

                                @can('is-admin')
                                    <x-forms.dropdown-link :href="route('dashboard')">
                                        {{ __('Dashboard') }}
                                    </x-forms.dropdown-link>
                                @endcan

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-forms.dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-forms.dropdown-link>
                                </form>
                            </x-slot>
                            </x-forms.dropdown>
                    </div>

            </div>
        </div>
    @else
        <div class="block sm:hidden">
            <x-forms.dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-forms.dropdown-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-forms.dropdown-link>
                    <x-forms.dropdown-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-forms.dropdown-link>

                </x-slot>
            </x-forms.dropdown>
        </div>
        <nav class="hidden sm:block gap-4 sm:gap-6">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="flex">

                    <x-forms.nav-link href="{{ route('login') }}"
                        class="text-sm font-medium hover:underline underline-offset-4">Log
                        in
                    </x-forms.nav-link>
                    @if (Route::has('register'))
                        <x-forms.nav-link href="{{ route('register') }}"
                            class="text-sm font-medium hover:underline underline-offset-4">
                            Register
                        </x-forms.nav-link>
                    @endif

                </div>
            </div>
        </nav>

    @endauth
    @endif
</nav>
