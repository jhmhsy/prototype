<header>
    <div
        class=" fixed top-0 z-10 w-full bg-tint_1 dark:bg-shade_9 flex items-center justify-between px-6 py-4 border-b border-border uppercase">
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
</header>

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
let lastScrollTop = 0;
const navbar = document.querySelector('header > div');

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        navbar.classList.add('collapsed');
    } else {
        navbar.classList.remove('collapsed');
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});
</script>