<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gym System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/cf223ee5eb.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    @vite(['resources/js/app.js'])
    {{-- @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif --}}
</head>

<body class="bg-gray-900 text-white">
    <div>
        <nav class="border-b border-white/10 flex items-center justify-between py-5 px-10"">
                <div>
                    <a href=" /">
            <x-custom.main-logo /></a>
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

    <main class="mt-10 m-auto w-full">
        <x-custom.main-sections></x-custom.main-sections>
    </main>

    <footer class="dark:bg-darkmode_light p-6 md:py-12 w-full">
        <x-custom.footer-section></x-custom.footer-section>
    </footer>
    </div>
</body>

</html>