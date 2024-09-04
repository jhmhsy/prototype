<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-white dark:bg-darkmode_light">

    <div class="flex flex-col min-h-screen">


        <!-- Header sections-->
        <header id="header-section">
            <x-custom.header-section />
        </header>

        <header id="book-section">
            <x-custom.book-section />
        </header>

        <!-- Main sections-->
        <main id="main-section">
            <x-custom.main-section />
        </main>



        <div id="equipment-section">
            <x-custom.equipment-section />
        </div>

        <!-- pricing sections-->
        <div id="pricing-section">
            <x-custom.pricing-section />
        </div>

        <!-- Footer sections-->
        <footer id="footer-section">
            <x-custom.footer-section />
        </footer>
    </div>

</body>

</html>