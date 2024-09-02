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

</head>

<body class="bg-gray-900 text-white">
    <div>
        <header>
            <x-custom.header-section />
        </header>

        <main class="mt-10 m-auto w-full">
            <x-custom.main-sections />
        </main>

        <footer class="dark:bg-darkmode_light p-6 md:py-12 w-full">
            <x-custom.footer-section />
        </footer>
    </div>
</body>

</html>