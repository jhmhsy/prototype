<x-guest-layout>

    <body class="bg-white dark:bg-darkmode_dark">
        <div class="flex flex-col min-h-screen">
            <!-- Header sections--->
            <header id="header-section" class="dark:bg-darkmode_dark dark:text-textwhite">
                <x-homepage.header-section />
            </header>

            <!-- Main sections-->
            <main id="main-section" class="dark:bg-darkmode_dark dark:text-textwhite">
                <x-homepage.main-section />
            </main>

            <!-- equipment sections-->
            <div id="equipment-section" class="dark:bg-darkmode_light dark:text-textwhite">
                <x-homepage.equipment-section />
            </div>

            <!-- pricing sections-->
            <div id="pricing-section" class="dark:bg-darkmode_dark dark:text-textwhite bg-secondary">
                <x-homepage.pricing-section />
            </div>

            <!-- Footer sections-->
            <footer id="footer-section" class="dark:bg-darkmode_dark dark:text-textwhite">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>
</x-guest-layout>