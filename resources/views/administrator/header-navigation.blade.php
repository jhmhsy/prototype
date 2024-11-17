<header>
    <div
        class=" bg-gray-50 dark:bg-peak_2  flex items-center justify-between px-6 py-4 border-b dark:border-white/30 dark:text-gray-300 z-50 transition-colors duration-150">

        <div class="flex flex-row mr-13 justify-between items-center">
            <button @click="toggleSidebar" class="mr-4 focus:outline-none">
                <svg style="display:none;" x-show="!sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>

                <svg style="display:none;" x-show="sidebarOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Darkmode button icon -->
        <div class="flex items-center gap-4 ">
            <div role="group" dir="ltr" class="hidden  items-center justify-center gap-1" tabindex="0"
                style="outline: none;">
                <x-custom.darkmode />
            </div>

            <div class="block">
                @include('navigations.settings-dropdown', ['dropdown' => true])
            </div>
        </div>
    </div>

</header>