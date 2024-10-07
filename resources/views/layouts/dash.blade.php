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
    <script src="{{ asset('js/jsqr.js') }}" defer></script>
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

<body class="font-opensans antialiased min-w-screen bg-tint_1 dark:bg-peak_1     ">
    <!-- <div id="breakpoint" class="select-none fixed bg-black text-white w-10 h-10 z-50 text-sm px-3 py-2">Loading...</div> -->


    <div x-data="layout()" x-init="init()" class="flex h-screen">
        <!-- SIDE NAVBAR -->
        @include ('administrator.side-navigation')

        <div class="flex flex-col w-full ">
            <!-- HEADER -->
            @include ('administrator.header-navigation')

            <!-- Main content -->
            <main
                :class="{ 'flex-1 px-6 sm:overflow-y-auto relative': isLoading, 'flex-1 px-6 sm:overflow-y-auto ': !isLoading }"
                x-data="globalLoader()">
                <div x-show="isLoading" style="display:none;"
                    class="absolute inset-0 bg-white bg-opacity-75 dark:bg-gray-800 dark:bg-opacity-75 flex items-center justify-center"
                    :class="{ 'z-50': isLoading, 'z-[-1]': !isLoading }">
                    <link href="{{ asset('css/loaders/blue-spinner.css') }}" rel="stylesheet" defer>
                    <div class="spinner"></div>
                </div>



                <!-- Your page content -->
                <div x-show="!isLoading" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                    <div class="flex text-sm py-4 gap-2 dark:text-gray-500">
                        <h1>Admin ➥ </h1>
                        <?php echo basename($_SERVER['PHP_SELF']); ?>
                    </div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('js/global-loader.js') }}"></script>
    <script>
    function layout() {
        return {
            sidebarOpen: false,
            init() {
                this.sidebarOpen = localStorage.getItem('sidebarOpen') === 'true';
                this.$watch('sidebarOpen', (value) => {
                    localStorage.setItem('sidebarOpen', value);
                });

                // Check screen size on load and resize
                this.checkScreenSize();
                window.addEventListener('resize', () => this.checkScreenSize());
            },
            toggleSidebar() {
                this.sidebarOpen = !this.sidebarOpen;
            },
            closeSidebar() {
                if (window.innerWidth < 1024) {
                    this.sidebarOpen = false;
                }
            },
            checkScreenSize() {
                if (window.innerWidth >= 1024) {
                    this.sidebarOpen = localStorage.getItem('sidebarOpen') === 'true';
                } else {
                    this.sidebarOpen = false;
                }
            }
        }
    }
    </script>


</body>

</html>