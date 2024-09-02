<nav class="border-b border-white/10 flex items-center justify-between py-5 px-10">
    <div>
        <a href=" /">
            <img src="{{ asset('images/gym-icon.png') }}" alt="Example Image" class="w-6 h-6 md:w-12 md:h-12">

        </a>
    </div>
    <div class="space-x-10">
        <x-nav-link :active="true" href="#">Home</x-nav-link>
        <x-nav-link href="#">Features</x-nav-link>
        <x-nav-link href="#">Pricing</x-nav-link>
        <x-nav-link href="#">Contact</x-nav-link>
    </div>
    <div>
        @if (Route::has('login'))
        @auth
        <x-nav-link href="{{ url('/dashboard') }}">Dashboard</x-nav-link>
        @else
        <x-nav-link href="{{ route('login') }}">Log in</x-nav-link>
        @if (Route::has('register'))
        <x-nav-link href="{{ route('register') }}">Register</x-nav-link>
        @endif
        @endauth
        @endif
    </div>
</nav>