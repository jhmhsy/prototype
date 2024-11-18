<x-app-layout>
    <x-slot name="header">
        <div class="items-center flex  space-x-3 ">
            <button onclick="goBackOrRedirect()" class="text-sm font-medium text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="h-6 w-6">
                    <path d="m12 19-7-7 7-7"></path>
                    <path d="M19 12H5"></path>
                </svg>
            </button>

            <script>
                function goBackOrRedirect() {
                    // Check if there's history to go back to
                    if (window.history.length > 1) {
                        // Go back to the previous page
                        window.history.back();
                    } else {
                        // Redirect to the homepage if no history exists
                        window.location.href = "{{ route('welcome') }}";
                    }

                }
            </script>
            <h2 class="inline-block font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex min-h-screen w-full bg-muted/40">

        <!-- SIDE NAV BAR SETTINGS -->
        <aside class="hidden w-60 flex-col bg-white dark:bg-peak_2 text-black dark:text-textwhite p-6 sm:flex">
            <nav class="grid gap-2">
                <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-tertiary hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
                    href="#" data-section="general" onclick="showSection('general')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <path
                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                        </path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    General
                </a>

                <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-tertiary hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
                    href="#" data-section="security" onclick="showSection('security')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Security
                </a>

                <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-tertiary hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
                    href="#" data-section="display" onclick="showSection('display')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <rect width="20" height="14" x="2" y="3" rx="2"></rect>
                        <line x1="8" x2="16" y1="21" y2="21"></line>
                        <line x1="12" x2="12" y1="17" y2="21"></line>
                    </svg>
                    Display
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link flex items-center gap-2 rounded-md px-3 py-2 text-sm font-medium transition-colors hover:bg-tertiary hover:text-accent-foreground dark:hover:bg-darkmode_lighter"
                        :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="h-5 w-5">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        <button>{{ __('Log Out') }}</button>
                    </a>
                </form>
            </nav>

        </aside>

        <!-- MAIN CONTENT -->
        <div id="main-content" class="flex-1 dark:bg-peak_1">
            <div id="general-section" class="section-content hidden">
                @include('profile.settings.general')
            </div>
            <div id="security-section" class="section-content hidden">
                @include('profile.settings.security')
            </div>
            <div id="display-section" class="section-content hidden">
                @include('profile.settings.display')
            </div>
        </div>
    </div>

</x-app-layout>