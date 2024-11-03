<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>

    <!-- Vite - Move to top for proper CSS loading -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts - Add display=swap for better performance -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700&display=swap"
        as="style" />
    <link href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Flowbite - Use CDN or correct local path -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet">

    <!-- Third-party CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Custom CSS - After third-party CSS -->
    <link href="{{ asset('css/loaders/blue-spinner.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo colored.png') }}">

    <!-- Scripts - Group all scripts together -->
    <script>
    // Add this to prevent FOUC (Flash of Unstyled Content)
    if (localStorage.getItem('dark-mode') === 'true' ||
        (!('dark-mode' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
    </script>

    <!-- Third-party Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js" defer></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js' defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Custom Scripts - After third-party scripts -->
    <script src="{{ asset('js/global-loader.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/hrefScrollAnimation.js') }}" defer></script>
    <script src="{{ asset('js/progressBar.js') }}" defer></script>
    <script src="{{ asset('js/screensize.js') }}" defer></script>

    @stack('head')
</head>

<body class="font-opensans antialiased min-w-[350px]" x-data="globalLoader()">
    <div>
        @isset($header)
        <header>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Main Content -->
        <div class="dark:bg-shade_9 dark:text-tint_1 bg-tint_1">
            {{ $slot }}
        </div>
    </div>

    <div style="display:none;">
        <x-custom.darkmode />
    </div>
</body>

</html>