<nav class="border-b border-white/10 flex items-center justify-between py-5 px-10">

    <div class="flex items-center justify-center">
        <a href="/">
            <x-application-logo />
        </a>
    </div>

    <div class="fixed left-1/3 transform z-20">
        <nav class=" flex gap-4 sm:gap-6">
            <div class="flex justify-evenly items-center text-center">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
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
    <div class="flex items-center justify-between">
        <x-custom.darkmode-button></x-custom.darkmode-button>
        @if (Route::has('login'))
        @auth
        <div> 
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border 
                        border-transparent text-sm font-medium rounded-md 
                        text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 
                        hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none 
                        transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

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
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
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
        @else
        <x-nav-link href="{{ route('login') }}" class="text-sm font-medium hover:underline underline-offset-4">
            Log in
        </x-nav-link>
        @if (Route::has('register'))
        <x-nav-link href="{{ route('register') }}" class="text-sm font-medium hover:underline underline-offset-4">
            Register
        </x-nav-link>
        @endif
        @endauth
        @endif
    </div>

</nav>