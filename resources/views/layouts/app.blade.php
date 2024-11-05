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

    <!-- Scripts -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/dashboardnavigator.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link rel="icon" href="images\logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <div x-data="{ loading: false }" class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-custom.loader />
    </div>

</body>

</html>