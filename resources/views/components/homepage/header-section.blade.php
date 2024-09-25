<header>
    <div class="flex-no-wrap fixed top-0 z-10 w-full bg-tint_1 dark:bg-shade_9 flex items-center justify-between px-6 py-4 border-b border-border dark:border-b-white/50 uppercase">
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
