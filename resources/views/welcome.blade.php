<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <body class="bg-tint_1 dark:bg-shade_7">
        <div class="flex flex-col min-h-screen dark:bg-shade_7 min-w-[360px]">
            <!-- Header sections--->
            <header id="header-section" class="transition-transform duration-150 ease-in-out">
                <x-homepage.header-section />
            </header>
            <!-- Main sections-->
            <main id="main-section" class="bg-tint_3 dark:bg-shade_7">
                <x-homepage.main-section />

            </main>
            <div id="semi-section"
                class="relative bg-[url('https://img.freepik.com/premium-photo/dark-moody-gym-interior-with-heavy-weights-floor-gym-equipment-background_163305-329787.jpg?w=900')] bg-no-repeat bg-cover bg-fixed">
                <div class="dark-overlay"></div>
                <x-homepage.semi-section />
            </div>
            <!-- equipment sections-->
            <div id="equipment-section" class=" text-shade_7 dark:text-tint_1">
                <x-homepage.equipment-section />
            </div>
            <!-- pricing sections-->
            <div id="pricing-section"
                class="bg-tint_1 dark:bg-shade_7 relative bg-[url('https://img.freepik.com/premium-photo/barbell-ground-with-dark-background-fitness-generative-ai_722401-50161.jpg?w=740')] bg-no-repeat bg-cover bg-fixed">
                <x-homepage.pricing-section />
            </div>
            <!-- feedback sections-->
            <div id="feedback-section" class=" text-shade_7 dark:text-tint_1 equipment-section-style">
                <x-homepage.feedback-section />
            </div>
            <!-- Footer sections-->
            <footer id="footer-section" class="bg-white/90">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>
</x-guest-layout>