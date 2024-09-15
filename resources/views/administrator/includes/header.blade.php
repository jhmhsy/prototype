<header>
    <div
        class="flex items-center justify-between px-6 py-4 border-b border-border 
        dark:bg-darkmode_light dark:text-white">

        <div class="flex flex-row">
            <!-- Hamburger button for responsive sidebar, hides in pc screen, shows in mobile-->
            @include('layouts.nav-burger', ['showburgerAdmin' => true])

            <!-- Back button -->
            <div class="flex items-center gap-3 text-foreground px-2" href="#">
                <x-custom.nav-link class="hidden sm:block " href="{{ route('welcome') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                    </svg>
                </x-custom.nav-link>
                <span class="text-xl font-bold">Administrator Panel</span>
            </div>
        </div>

        <!-- Darkmode button icon -->
        <div class="flex items-center gap-4">
            <div role="group" dir="ltr" class="flex items-center justify-center gap-1" tabindex="0"
                style="outline: none;">
                <x-custom.darkmode>
                </x-custom.darkmode>
            </div>

            <div class="block">
                @include('navigations.settings-dropdown', ['dropdown' => true])
            </div>
        </div>
    </div>

</header>
