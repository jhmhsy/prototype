<div
    class="text-primary bg-secondary fixed top-0 z-10 flex flex-no-wrap items-center justify-between w-full px-6 py-4 uppercase ">
    <div class="flex flex-row mr-13">
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" width="100" alt="logo">
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
<<<<<<< HEAD
document.addEventListener("DOMContentLoaded", function() {
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
=======
    //minified it
    document.addEventListener("DOMContentLoaded", function () {
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
>>>>>>> 29a4e95c4972173aedb72540c8402f7a5b0bceed
</script>