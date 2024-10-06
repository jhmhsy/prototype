<header>
    <div class="bg-tint_1 dark:bg-shade_9 flex items-center justify-between px-6 py-4 border-b border-shade_6/50 dark:border-white/5 
         dark:text-white z-0">

        <div class="flex flex-row mr-13 justify-between items-center">
            <!-- Hamburger button for responsive sidebar, hides in pc screen, shows in mobile-->
            @include('navigations.nav-burger', ['showburgerAdmin' => true])

            <!-- Back button -->
            <a href="{{ route('welcome') }}" class="hidden sm:block">
                <x-custom.application-logo />
            </a>
            <span class="hidden md:block ml-3 text-xl font-bold">Administrator Panel</span>
            <span class="block md:hidden ml-3 text-xl font-bold">Dashboard</span>
        </div>

        <!-- Darkmode button icon -->
        <div class="flex items-center gap-4">
            <div role="group" dir="ltr" class="flex items-center justify-center gap-1" tabindex="0"
                style="outline: none;">
                <x-custom.darkmode />
            </div>

            <div class="block">
                @include('navigations.settings-dropdown', ['dropdown' => true])
            </div>
        </div>
    </div>

</header>