<nav class="border-b border-white/10 flex items-center justify-between py-5 px-10">

    <div class="flex items-center justify-center ">
        <a href="/">
            <x-application-logo />
        </a>
        <div class="hidden md:block">

            <x-custom.input-darkmode>
            </x-custom.input-darkmode>
        </div>

    </div>

    <div class="fixed left-1/3 transform z-20">
        <nav class=" flex gap-4 sm:gap-6">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 space-between sm:-my-px sm:ms-10 lg:flex ">
                    <x-nav-link href="#">
                        {{ __('Home') }}
                    </x-nav-link>


                    @if (Auth::user())

                    <x-nav-link :href="route('reservation')">
                        {{ __('Reservation') }}
                    </x-nav-link>
                    @endif

                    <x-nav-link href="#equipment-section">
                        {{ __('Features') }}
                    </x-nav-link>

                    <x-nav-link href="#pricing-section">
                        {{ __('Pricing') }}
                    </x-nav-link>

                    <x-nav-link href="#footer-section">
                        {{ __('Contacts') }}
                    </x-nav-link>
                </div>
            </div>
        </nav>
    </div>


    <div class="flex">
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
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>



                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center lg:hidden">
                        <button @click="open = ! open"
                            class="inline-flex  p-2 rounded-md text-gray-400 dark:text-gray-500 
                    hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 
                    dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 
                    dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="lg:hidden">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-red-600">
                    <div>
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link href="#Home">
                                {{ __('Home') }}
                            </x-responsive-nav-link>

                            @if (Auth::user())
                            <x-responsive-nav-link href="#reservation">
                                {{ __('Reservation') }}
                            </x-responsive-nav-link>
                            @endif

                            <x-responsive-nav-link href="#equipment-section">
                                {{ __('Features') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="#pricing-section">
                                {{ __('Pricing') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link href="#footer-section">
                                {{ __('Contacts') }}
                            </x-responsive-nav-link>
                        </div>
                    </div>


                    @else

                    <div class="block lg:hidden">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </x-dropdown-link>
                                <x-dropdown-link href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                    </div>


                    <nav class="hidden lg:block flex gap-4 sm:gap-6">
                        <div class="flex">
                            <!-- Navigation Links -->
                            <div class=" space-x-8 sm:-my-px sm:ms-10 lg:flex ">
                                <div class="">
                                    <x-nav-link href="{{ route('login') }}"
                                        class="text-sm font-medium hover:underline underline-offset-4">Log
                                        in
                                    </x-nav-link>
                                    @if (Route::has('register'))
                                    <x-nav-link href="{{ route('register') }}"
                                        class="text-sm font-medium hover:underline underline-offset-4">
                                        Register
                                    </x-nav-link>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div class="-me-2 flex items-center lg:hidden">
                        <button @click="open = ! open"
                            class="inline-flex  p-2 rounded-md text-gray-400 dark:text-gray-500 
                    hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 
                    dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 
                    dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>



                </div>
            </div>

            <div :class="{'block': open, 'hidden': ! open}" class="lg:hidden">
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-red-600">
                    <div>
                        <x-responsive-nav-link href="#equipment-section">
                            {{ __('Home') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="#equipment-section">
                            {{ __('Features') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="#equipment-section">
                            {{ __('Pricing') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="#equipment-section">
                            {{ __('Contacts') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </div>
    </div>
    @endif
    @endauth
    @endif

</nav>