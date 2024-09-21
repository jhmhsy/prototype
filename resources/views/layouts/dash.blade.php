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
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased bg-white dark:bg-darkmode_dark min-w-[500px]">
        <div class="bg-gray-100 dark:bg-gray-900">

            <div class="flex flex-col h-screen bg-white">
                <!--------- Header layout ----------->
                @include('administrator.includes.header')

                <div class="flex flex-1">

                    <!-------------------------- Sidebar layout ------------------------>
                    <aside id="default-sidebar"
                        class="hidden sm:block top-0 left-0 z-40 w-30 xl:w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
                        aria-label=" Sidebar dark:bg-darkmode_light dark:text-white">
                        <div
                            class="h-full px-3 py-4 overflow-y-auto dark:bg-darkmode_light dark:text-white border-r">
                            @hasanyrole('SuperAdmin|Admin')
                                {{-- {{-- this should be the reservation page --}}
                                @include('administrator.includes.sidenav')
                            @endhasanyrole
                        </div>
                    </aside>

                    <!-------------------------- MAIN CONTENT ----------------------------->
                    <main class="flex-1 p-6 dark:bg-darkmode_dark overflow-y-auto dark:text-white"
                        @click="open = false">
                        <div id="main-content" class="flex-1 ">
                            @hasanyrole('SuperAdmin|Admin')
                                @yield('content')
                            @endhasanyrole
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </body>

</html>
