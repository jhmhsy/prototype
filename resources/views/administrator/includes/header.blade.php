<header>
    <div
        class="bg-tint_1 flex items-center justify-between px-6 py-4 border-b dark:border-white/5 
        dark:bg-darkmode_light dark:text-white">

        <div class="flex flex-row mr-13 justify-between items-center">
            <!-- Hamburger button for responsive sidebar, hides in pc screen, shows in mobile-->
            @include('navigations.nav-burger', ['showburgerAdmin' => true])

            <!-- Back button -->
            <a href="{{ route('welcome') }}">
                <x-custom.application-logo />
            </a>
            <span class="ml-3 text-xl font-bold">Administrator Panel</span>
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