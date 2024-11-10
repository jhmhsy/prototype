<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaraFitness</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=open-sans:300,400,500,600,700" rel="stylesheet" />

    <link href="https://fonts.bunny.net/css?family=roboto:100,300,400,500,700" rel="stylesheet" />

    <link href="{{ asset('css/tooltip.css') }}" rel="stylesheet">


    <!-- Loaders -->
    <link href="{{ asset('css/loaders/blue-spinner.css') }}" rel="stylesheet" defer>
    <script src="{{ asset('js/global-loader.js') }}"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/tooltip.js') }}"></script>
    <script src="{{ asset('js/inputLimit.js') }}"></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="{{ asset('js/dashboardnavigator.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsqr/1.4.0/jsQR.js"></script>
    <script src="{{ asset('js/jsqr.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- screen size indicator TEMPORARY), just copy the below VV-->
    {{-- <div id="breakpoint" class="fixed bg-black text-white w-50 h-50 z-50 text-lg px-5 py-2">Loading...</div> --}}
    <script src="{{ asset('js/screensize.js') }}" defer></script>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-opensans antialiased min-w-screen bg-tint_1 dark:bg-peak_1     ">
    @include ('alerts.alert')

    <div x-data="layout()" x-init="init()" class="flex h-screen">
        <!-- SIDE NAVBAR -->
        @include ('administrator.side-navigation')

        <div class="flex flex-col w-full ">
            <!-- HEADER -->
            @include ('administrator.header-navigation')

            <!-- Main content -->
            <main class="flex-1 px-6 sm:overflow-y-auto py-5">
                <x-custom.loader2 />
                {{ $slot }}
            </main>
        </div>
    </div>
    <script>
        //minified it
        function layout() {
            return {
                sidebarOpen: !1,
                init() {
                    this.sidebarOpen = "true" === localStorage.getItem("sidebarOpen"), this.$watch("sidebarOpen", e => {
                        localStorage.setItem("sidebarOpen", e)
                    }), this.checkScreenSize(), window.addEventListener("resize", () => this.checkScreenSize())
                },
                toggleSidebar() {
                    this.sidebarOpen = !this.sidebarOpen
                },
                closeSidebar() {
                    window.innerWidth < 1024 && (this.sidebarOpen = !1)
                },
                checkScreenSize() {
                    window.innerWidth >= 1024 ? this.sidebarOpen = "true" === localStorage.getItem("sidebarOpen") : this
                        .sidebarOpen = !1
                }
            }
        }
    </script>


</body>

</html>