<div class="fixed top-0 z-10 flex flex-no-wrap items-center justify-between w-full px-6 py-4 uppercase">
    <div class="flex flex-row mr-13">
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('images/logo colored.png') }}" width="50" height="50" alt="logo" class="transition-transform duration-300 hover:scale-110">
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
        <div role="group" dir="ltr" class="darkmode" tabindex="0" style="outline: none;">
            <x-custom.darkmode />
        </div>

        <div class="items-center hidden text-center sm:block">
            @include('navigations.login-dropdown', ['row' => true])
        </div>

        <div class="hidden sm:block">
            @include('navigations.settings-dropdown', ['dropdown' => true])
        </div>

        @include('navigations.nav-burger', ['showburgerHome' => true])
    </div>
</div>
<script>
//minified it
document.addEventListener("DOMContentLoaded", function() {
    function i() {
        let i = window.location.pathname,
            t = window.location.hash;
        document.querySelectorAll(".nav-link").forEach(e => {
            let n = e.getAttribute("href");
            e.classList.remove("activeLink", "r-activeLink"), e.classList.add("inactiveLink",
                "r-inactiveLink"), (n === i || n === i + t) && (e.classList.add("activeLink",
                "r-activeLink"), e.classList.remove("inactiveLink", "r-inactiveLink"))
        })
    }
    i(), window.addEventListener("popstate", i)
});
</script>