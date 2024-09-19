<x-guest-layout>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        @if ($default ?? false)
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
        @endif
    </body>
</x-guest-layout>
