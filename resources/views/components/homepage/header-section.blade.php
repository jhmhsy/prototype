<header>
    <div class="flex-no-wrap fixed top-0 z-10 w-full  flex items-center justify-between px-6 py-4 uppercase">
        <div class="flex flex-row mr-13">
            <a href="{{ route('welcome') }}" class="logo">
                <x-custom.application-logo />
            </a>
        </div>

        <div class="flex justify-center">
            <nav class="flex gap-4 sm:gap-6">
                <div class="flex justify-evenly items-center text-center">
                    <div class="hidden xl:flex space-x-12">
                        @include('navigations.home-nav', ['default' => true])
                    </div>
                </div>
            </nav>
        </div>

        <div class="flex items-center gap-2">
            <div role="group" dir="ltr" class="darkmode" tabindex="0" style="outline: none;">
                <x-custom.darkmode />
            </div>

            <div class="hidden sm:block items-center text-center">
                @include('navigations.login-dropdown', ['row' => true])
            </div>

            <div class="hidden sm:block">
                @include('navigations.settings-dropdown', ['dropdown' => true])
            </div>

            @include('navigations.nav-burger', ['showburgerHome' => true])
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update active link
        function updateActiveLink() {
            // Get the current path and hash from the URL
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash;

            // Remove active class from all navbar links and add inactive class
            document.querySelectorAll('.nav-link').forEach(link => { // Only target .nav-link
                const href = link.getAttribute('href');

                // Remove active styles by default
                link.classList.remove('activeLink', 'r-activeLink');
                link.classList.add('inactiveLink', 'r-inactiveLink');

                // Match the full href, including the hash for hash-based links
                if (href === currentPath || (href === currentPath + currentHash)) {
                    // Mark as active if the href matches the current path or hash
                    link.classList.add('activeLink', 'r-activeLink');
                    link.classList.remove('inactiveLink', 'r-inactiveLink');
                }
            });
        }

        // Update active link on page load
        updateActiveLink();

        // Update active link when navigating without a full page reload
        window.addEventListener('popstate', updateActiveLink);
    });
    </script>
</header>