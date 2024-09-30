<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php

        function getIP()
        {
            $ip;
            if (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('REMOTE_ADDR')) {
                $ip = getenv('REMOTE_ADDR');
            } else {
                $ip = 'UNKNOWN';
            }
            return $ip;
        }
        $clientip = getIP();
    @endphp

    <body class="bg-tint_1 dark:bg-shade_9">
        <div class="bg-tint_1 flex flex-col min-h-screen dark:bg-shade_9 min-w-[360px]">
            <!-- Header sections--->
            <header id="header-section"
                class="transition-transform duration-150 ease-in-out dark:bg-shade_8 dark:text-textwhite">
                <x-homepage.header-section />
            </header>
            <!-- Main sections-->
            <main id="main-section"
                class="bg-tint_1 dark:bg-shade_9 relative bg-[url('https://img.freepik.com/premium-photo/dark-moody-gym-interior-with-heavy-weights-floor-gym-equipment-background_163305-329787.jpg?w=900')] bg-no-repeat bg-cover bg-fixed">
                <div class="overlay"></div>
                <x-homepage.main-section />
            </main>
            <!-- equipment sections-->
            <div id="equipment-section" class=" text-shade_9 dark:text-tint_1">
                <x-homepage.equipment-section />
            </div>
            <!-- pricing sections-->
            <div id="pricing-section"
                class="bg-tint_1 dark:bg-shade_9 relative bg-[url('https://img.freepik.com/premium-photo/barbell-ground-with-dark-background-fitness-generative-ai_722401-50161.jpg?w=740')] bg-no-repeat bg-cover bg-fixed">
                <x-homepage.pricing-section />
            </div>

            <!-- feedback sections-->
            <div id="feedback-section" class=" text-shade_9 dark:text-tint_1 equipment-section-style">
                <x-homepage.feedback-section />
            </div>

            <!-- Footer sections-->
            <footer id="footer-section" class="bg-white/90">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>
</x-guest-layout>
