<x-guest-layout>

    <body class="bg-white ">
        <div class="flex flex-col min-h-screen">
            <!-- Header sections-->
            <header id="header-section">
                <x-homepage.header-section />
            </header>

            <!-- Main sections-->
            <main id="main-section">
                <x-homepage.main-section />
            </main>

            <!-- equipment sections-->
            <div id="equipment-section">
                <x-homepage.equipment-section />
            </div>

            <!-- pricing sections-->
            <div id="pricing-section">
                <x-homepage.pricing-section />
            </div>

            <!-- Footer sections-->
            <footer id="footer-section">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>
</x-guest-layout>