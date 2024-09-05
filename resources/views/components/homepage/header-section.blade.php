<nav class="border-b border-white/10 flex items-center justify-between py-5 px-10">
    <a class="flex items-center justify-center" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="h-6 w-6 text-blue-500">
            <path d="M14.4 14.4 9.6 9.6"></path>
            <path
                d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z">
            </path>
            <path d="m21.5 21.5-1.4-1.4"></path>
            <path d="M3.9 3.9 2.5 2.5"></path>
            <path
                d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z">
            </path>
        </svg>
        <button id="toggleDarkMode" type="button"
            class="p-2 transition-colors duration-300 text-black dark:text-white rounded">
            <svg width="10%" height="10%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22 15.8442C20.6866 16.4382 19.2286 16.7688 17.6935 16.7688C11.9153 16.7688 7.23116 12.0847 7.23116 6.30654C7.23116 4.77135 7.5618 3.3134 8.15577 2C4.52576 3.64163 2 7.2947 2 11.5377C2 17.3159 6.68414 22 12.4623 22C16.7053 22 20.3584 19.4742 22 15.8442Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </a>
    <div class="fixed left-1/3 transform z-20">
        <nav class=" flex gap-4 sm:gap-6">
            <div class="flex">
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
    <div>
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

        <x-nav-link href="{{ route('login') }}" class="text-sm font-medium hover:underline underline-offset-4">Log in
        </x-nav-link>
        @if (Route::has('register'))
        <x-nav-link href="{{ route('register') }}" class="text-sm font-medium hover:underline underline-offset-4">
            Register</x-nav-link>
        @endif
        @endauth
        @endif
    </div>

</nav>