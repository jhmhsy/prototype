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

    <!-- Extra Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- FullCalendar -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js' defer></script>

    <!-- Google map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Loaders -->
    <link href="{{ asset('css/loaders/blue-spinner.css') }}" rel="stylesheet">
    <script src="{{ asset('js/global-loader.js') }}" defer></script>

    <!-- Flowbite -->
    <link href="{{ asset('path/to/flowbite/dist/flowbite.min.css') }}" rel="stylesheet">
    <script src="{{ asset('path/to/flowbite/dist/flowbite.min.js') }}" defer></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/hrefScrollAnimation.js') }}" defer></script>
    <script src="{{ asset('js/progressBar.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="screensize.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Logo -->
    <link rel="icon" href="{{ asset('images/logo.png') }}">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body class="font-opensans antialiased min-w-[350px]" x-data="globalLoader()">
    <!-- Loader Component -->
    <!-- Header Section -->
        <div>
        @isset($header)
                <header>
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
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