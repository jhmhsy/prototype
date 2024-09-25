<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body class="bg-tint_1 dark:bg-shade_9">
        <div class="flex flex-col min-h-screen bg-tint_1 dark:bg-shade_9">
            <!-- Header sections--->
            <header c id="header-section" class="transition-transform duration-150 ease-in-out dark:bg-shade_8 dark:text-textwhite">
                <x-homepage.header-section />
            </header>

            <!-- Main sections-->
            <main id="main-section" class=" bg-tint_1 dark:bg-shade_9 relative mb-10">
                <x-homepage.main-section />
            </main>
            <!-- equipment sections-->
            <div id="equipment-section" class="bg-tint_3 dark:bg-shade_8">
                <x-homepage.equipment-section />
            </div>

            <!-- pricing sections-->
            <div id="pricing-section" class=" bg-tint_1 dark:bg-shade_9">
                <x-homepage.pricing-section />
            </div>

            <!-- Footer sections-->
            <footer id="footer-section" class="bg-white/90">
                <x-homepage.footer-section />
            </footer>
        </div>
    </body>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update active link
        function updateActiveLink() {
            // Remove active class from all links and add inactive class
            document.querySelectorAll('a').forEach(link => {
                const href = link.getAttribute('href');
                if (href !== '/' && href !== '/#') {
                    link.classList.remove('activeLink');
                    link.classList.add('inactiveLink');
                }
            });

            // Add active class to the current link and remove inactive class
            const currentHash = window.location.hash;
            if (currentHash && currentHash !== '#/') {
                const activeLink = document.querySelector(
                    `a[href="${currentHash}"], a[href="/${currentHash}"]`);
                if (activeLink) {
                    activeLink.classList.add('activeLink');
                    activeLink.classList.remove('inactiveLink');
                }
            }
        }

        // Update active link on page load
        updateActiveLink();

        // Update active link on hash change
        window.addEventListener('hashchange', updateActiveLink);
    });
    </script>
</x-guest-layout>