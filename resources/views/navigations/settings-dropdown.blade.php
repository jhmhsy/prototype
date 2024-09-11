@if (Route::has('login'))
@auth

@if($column ?? false)
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
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-inputs.dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-inputs.dropdown-link>
</form>
@endif

@if($dropdown ?? false)
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
            <div class="bg-white dark:bg-darkmode_dark text-white py-2 rounded-md shadow-lg">
                <x-inputs.dropdown-link :href="route('profile.edit')" class="hover:bg-secondary">
                    <i class="fas fa-user mr-2"></i>{{ __('Profile') }}
                </x-inputs.dropdown-link>

                <!-- Permission to access dashboard -->
                @can('role-superadmin')
                <x-inputs.dropdown-link :href="route('dashboard')" class="hover:bg-secondary">
                    <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}
                </x-inputs.dropdown-link>
                @endcan

                <hr class="border-thirdy my-2">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-inputs.dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="hover:bg-secondary">
                        <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                    </x-inputs.dropdown-link>
                </form>
            </div>
        </x-slot>
    </x-custom.dropdown>
</div>
@endif


@endauth
@endif