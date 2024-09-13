@if (Route::has('login'))
    @auth
        @if ($column ?? false)
            <x-inputs.dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-inputs.dropdown-link>

            <!-- Permission to access dashboard -->
            @can('role-superadmin')
                <x-inputs.dropdown-link :href="route('dashboard')">
                    {{ __('Dashboard') }}
                </x-inputs.dropdown-link>
            @endcan

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" class="hover:bg-red-500">
                @csrf

                <x-inputs.dropdown-link :href="route('logout')" class="hover:bg-red-500"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-inputs.dropdown-link>
            </form>
        @endif

        @if ($dropdown ?? false)
            <div class=" sm:flex sm:items-center">
                <x-custom.dropdown align="right" width="56">
                    <x-slot name="trigger">
                        <x-custom.nav-link class="flex items-center">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </x-custom.nav-link>
                    </x-slot>

                    <x-slot name="content" transparent>
                        <div
                            class="rounded-t-none bg-white dark:bg-darkmode_dark text-white shadow-lg border-white/10 border border-t-0">
                            <x-inputs.dropdown-link :href="route('profile.edit')" class="hover:bg-blue-400 hover:text-white px-4 py-2 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="mr-2 bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                                {{ __('Profile') }}
                            </x-inputs.dropdown-link>

                            <!-- Permission to access dashboard -->
                            @can('role-superadmin')
                                <x-inputs.dropdown-link :href="route('dashboard')" class="hover:bg-red-600 hover:text-white px-3 py-2 w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="mr-2 bi bi-speedometer2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4M3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                                        <path fill-rule="evenodd"
                                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A8 8 0 0 1 0 10m8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3" />
                                    </svg>
                                    {{ __('Dashboard') }}
                                </x-inputs.dropdown-link>
                            @endcan

                            <hr class="border-thirdy">

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-inputs.dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="hover:bg-red-600 hover:text-white px-3 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="mr-2 bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-inputs.dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-custom.dropdown>
            </div>
        @endif

    @endauth
@endif
