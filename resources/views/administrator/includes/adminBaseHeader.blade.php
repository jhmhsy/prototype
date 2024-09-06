<header
    class="flex items-center justify-between px-6 py-4 border-b border-border dark:bg-darkmode_light dark:text-white">


    <div class="flex flex-row">
        <!-- Harburger button for responsive sidebar, i put it here to look goud-->
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
            aria-controls="default-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">

            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

        <!-- Back button -->
        <div class="flex items-center gap-3 text-foreground" href="#">
            <x-custom.nav-link href="{{ route('welcome') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-8 h-8 hidden sm:block ">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10 17 15 12 10 7"></polyline>
                    <line x1="15" x2="3" y1="12" y2="12"></line>
                </svg>
            </x-custom.nav-link>
            <span class="text-xl font-bold">Administrator Panel</span>
        </div>


    </div>


    <div class="flex items-center gap-4">
        <div role="group" dir="ltr" class="flex items-center justify-center gap-1" tabindex="0" style="outline: none;">

            <x-custom.input-darkmode>
            </x-custom.input-darkmode>
        </div>

        @include('layouts.navigation')
    </div>
</header>