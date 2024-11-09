<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <body class="bg-tint_1 dark:bg-shade_7">
        <div class="flex flex-col min-h-screen dark:bg-shade_7 min-w-[360px]">
            <!-- Header sections--->
            <header id="header-section" class="transition-transform duration-150 ease-in-out  dark:bg-black">
                <x-homepage.header-section />
            </header>
            <!-- Main sections-->
            <main id="main-section" class="transition-transform duration-150 ease-in-out ">
                <x-homepage.main-section />
            </main>

            <!-- Event section-->
            <main id="event-section" class="transition-transform duration-150 ease-in-out ">

                <x-homepage.event-section :events="$events" />

            </main>



            <!-- equipment sections-->
            <div id="equipment-section" class="bg-peak-5 text-primary">
                <x-homepage.equipment-section />
            </div>

            <!-- trainer sections-->
            <div id="trainer-section">
                <x-homepage.trainer-section />
            </div>

            <!-- pricing sections-->
            <div id="pricing-section">
                <x-homepage.pricing-section />
            </div>

            <!-- map/feedback sections-->
            <div id="faq-section" class="bg-peak-5 text-primary">
                <x-homepage.FAQs />
            </div>

            <!-- Footer sections-->
            <footer id="footer-section">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>


</x-guest-layout>