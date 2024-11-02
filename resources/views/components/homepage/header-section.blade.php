<div class="flex-no-wrap fixed top-0 z-10 w-full  flex items-center justify-between px-6 py-4 uppercase">
    <div class="flex flex-row mr-13">
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('images/logo colored.png') }}" width="50" height="50" alt="logo">
            {{-- <x-custom.application-logo /> --}}
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