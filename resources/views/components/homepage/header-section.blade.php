<div class="fixed top-0 left-[10%] w-[80%] px-4 lg:px-6 h-16 flex items-center text-textblack dark:text-textwhite
    bg-transparent z-10">

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
        <span class="sr-only">Gym Reservation</span>
        <button id="toggleDarkMode" type="button"
            class="p-2 transition-colors duration-300 text-black dark:text-white rounded">
            <svg width="10%" height="10%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M22 15.8442C20.6866 16.4382 19.2286 16.7688 17.6935 16.7688C11.9153 16.7688 7.23116 12.0847 7.23116 6.30654C7.23116 4.77135 7.5618 3.3134 8.15577 2C4.52576 3.64163 2 7.2947 2 11.5377C2 17.3159 6.68414 22 12.4623 22C16.7053 22 20.3584 19.4742 22 15.8442Z"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </a>
    <nav class="ml-auto flex gap-4 sm:gap-6">

        <a class="text-sm font-medium hover:underline underline-offset-4" href="#">Home</a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#equipment-section">Features</a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#pricing-section">Pricing</a>
        <a class="text-sm font-medium hover:underline underline-offset-4" href="#footer-section">Contact</a>

        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:underline underline-offset-4">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="text-sm font-medium hover:underline underline-offset-4">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="text-sm font-medium hover:underline underline-offset-4">Register</a>
        @endif
        @endauth
        @endif
    </nav>
</div>