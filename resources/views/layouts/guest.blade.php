<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>

    <!-- Vite Assets (Load Early to Apply Styles First) -->

    <!-- Fonts with Performance Optimization -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preload" href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700&display=swap"
        as="style" />
    <link href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Third-Party CSS (Flowbite, Splidejs, FullCalendar, Leaflet) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Custom CSS (Load After Third-Party CSS) -->
    <link href="{{ asset('css/loaders/blue-spinner.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo colored.png') }}">

    <!-- Dark Mode FOUC Prevention -->
    <script>
    if (localStorage.getItem('dark-mode') === 'true' ||
        (!('dark-mode' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    }
    </script>

    <!-- Third-Party Scripts (Load Deferred) -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js" defer></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js' defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Custom Scripts (Deferred) -->
    <script src="{{ asset('js/global-loader.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/hrefScrollAnimation.js') }}" defer></script>
    <script src="{{ asset('js/progressBar.js') }}" defer></script>
    <script src="{{ asset('js/screensize.js') }}" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body class="font-opensans antialiased min-w-[350px]" x-data="globalLoader()">
    <!-- Loader Component -->

    <!-- Header Section -->
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