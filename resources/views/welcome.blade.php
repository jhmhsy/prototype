<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <body class="bg-tint_1 dark:bg-shade_7">
        <div class="flex flex-col min-h-screen dark:bg-shade_7 min-w-[360px]">
            <!-- Header sections--->
            <header id="header-section" class="transition-transform duration-150 ease-in-out ">
                <x-homepage.header-section />
            </header>
            <!-- Main sections-->
            <main id="main-section" class="transition-transform duration-150 ease-in-out ">
                <x-homepage.main-section />
            </main>

            <!-- equipment sections-->
            <div id="equipment-section bg-white dark:bg-black">
                @include ('components.homepage.equipment-section')
            </div>
            <!-- trainer sections-->
            <div id="trainer-section">
                <x-homepage.trainer-section />
            </div>

            <!-- map/feedback sections-->
            <div id="map-section">
                <x-homepage.map-section />
            </div>
            <!-- pricing sections-->
            <div id="pricing-section">
                <x-homepage.pricing-section />
            </div>
            <!-- Footer sections-->

            <footer id="footer-section" class="bg-white/90">
                <x-homepage.FAQs />
            </footer>
            <footer id="footer-section" class="bg-white/90">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>

</x-guest-layout>