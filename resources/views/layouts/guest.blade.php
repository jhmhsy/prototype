<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:100,300,400,500,900" rel="stylesheet" />


    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/hrefScrollAnimation.js') }}" defer></script>
    <script src="{{ asset('js/progressBar.js') }}" defer></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link rel="icon" href="images\logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-roboto antialiased min-w-[350px] h-screen w-full">

    <div>
        @isset($header)
        <header>
            <div class=" mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <div class="dark:bg-shade_9 dark:text-tint_1 bg-tint_1">
            {{ $slot }}
        </div>
    </div>
</body>

</html>