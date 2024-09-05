<nav class="border-b border-white/10 flex items-center justify-between py-5 px-10">

    <div class="flex items-center justify-center">
        <a href="/">
            <x-application-logo />
        </a>

        <x-custom.input-darkmode>
        </x-custom.input-darkmode>
    </div>

    <div class="fixed left-1/3 transform z-20">
        <nav class=" flex gap-4 sm:gap-6">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="#">
                        {{ __('Home') }}
                    </x-nav-link>


                    @if (Auth::user())

                    <x-nav-link :href="route('reservation')">
                        {{ __('Reservation') }}
                    </x-nav-link>
                    @endif


                    <x-nav-link href="#equipment-section">
                        {{ __('Features') }}
                    </x-nav-link>

                    <x-nav-link href="#pricing-section">
                        {{ __('Pricing') }}
                    </x-nav-link>

                    <x-nav-link href="#footer-section">
                        {{ __('Contacts') }}
                    </x-nav-link>
                </div>
            </div>


        </nav>
    </div>
    <div>

        @include('layouts.navigation')
    </div>

</nav>