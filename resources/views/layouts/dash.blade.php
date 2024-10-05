<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/dashboardnavigator.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link rel="icon" href="images\logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased min-w-screen bg-tint_1 dark:bg-shade_9 ">
    <div class="flex w-full">



        <!-- NAVIGATION -->


        @include ('administrator.side-navigation')


        <div class="flex flex-col w-full">

            <!-- SIDE NAVIGATION -->
            @include ('administrator.header-navigation')


            <!--  MAIN CONTENT -->
            <main class="flex-1 p-6 ">
                {{ $slot }}
            </main>
        </div>


    </div>
</body>

</html>