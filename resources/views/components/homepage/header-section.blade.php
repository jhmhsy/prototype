<div
    class="text-primary bg-secondary fixed top-0 z-10 flex flex-no-wrap items-center justify-between w-full px-6 py-4 uppercase ">
    <div class="flex flex-row mr-13 ">
        <a href="{{ route('welcome') }}" class="logo flex gap-4">
            <img src="{{ asset('images/logo.png') }}" width="80" alt="logo">
        </a>
    </div>

    <div class="flex justify-center">
        <nav class="flex gap-4 sm:gap-6">
            <div class="flex items-center text-center justify-evenly">
                <div class="hidden space-x-12 xl:flex">
                    @include('navigations.home-nav', ['default' => true])
                </div>
            </div>
        </nav>
    </div>

    <div class="flex items-center gap-2">
        {{--<div role="group" dir="ltr" class="darkmode" tabindex="0" style="outline: none;">
            <x-custom.darkmode />
        </div>--}}

        {{--<div role="group" dir="ltr" class="darkmode" tabindex="0" style="outline: none;">
            <x-custom.darkmode />
        </div>--}}

        <div class="items-center hidden text-center sm:block space-x-3">
            @include('navigations.login-dropdown', ['row' => true])
        </div>

        <div class="hidden sm:block bg-secondary">
            @include('navigations.settings-dropdown', ['dropdown' => true])
        </div>

        @include('navigations.nav-burger', ['showburgerHome' => true])
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function updateActiveLink() {
            const currentPath = window.location.pathname;
            const currentHash = window.location.hash;

            document.querySelectorAll(".nav-link").forEach(link => {
                const linkHref = link.getAttribute("href");
                const linkPath = new URL(linkHref, window.location.origin).pathname;
                const linkHash = new URL(linkHref, window.location.origin).hash;

                const isActive = (linkPath === currentPath && linkHash === currentHash) ||
                    (linkPath === currentPath && !linkHash && !currentHash);

                link.classList.toggle("activeLink", isActive);
                link.classList.toggle("inactiveLink", !isActive);
            });
        }

        updateActiveLink();
        window.addEventListener("popstate", updateActiveLink);
    });
</script>