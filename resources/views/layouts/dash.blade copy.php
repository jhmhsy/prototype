<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700" rel="stylesheet" />

    <link href="https://fonts.bunny.net/css?family=roboto:100,300,400,500,700" rel="stylesheet" />


    <!-- Scripts -->
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/dashboardnavigator.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>

    <!-- screen size indicator TEMPORARY), just copy the below VV-->
    {{--    <div id="breakpoint" class="fixed bg-black text-white w-50 h-50 z-50 text-lg px-5 py-2">Loading...</div>            --}}
    <script src="{{ asset('js/screensize.js') }}" defer></script>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link rel="icon" href="images\logo.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-opensans antialiased min-w-screen bg-tint_1 dark:bg-shade_9 ">
    <div id="breakpoint" class="fixed bg-black text-white w-10 h-10 z-50 text-sm px-3 py-2">Loading...</div>

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