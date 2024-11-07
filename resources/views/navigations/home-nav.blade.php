@if ($default ?? false)
    <x-forms.nav-link href="/" class="nav-link">
        {{ __('Home') }}
    </x-forms.nav-link>

    {{--{{-- <x-forms.nav-link :href="route('reservation')" :active="request()->routeIs('reservation')">
        {{ __('Reservation') }}
    </x-forms.nav-link>--}}

    <x-forms.nav-link href="/#equipment-section" class="nav-link">
        {{ __('Features') }}
    </x-forms.nav-link>

    <x-forms.nav-link href="/#pricing-section" class="nav-link">
        {{ __('Pricing') }}
    </x-forms.nav-link>

    <x-forms.nav-link href="/#footer-section" class="nav-link">
        {{ __('Contacts') }}
    </x-forms.nav-link>

    {{--<x-forms.nav-link :href="route('calendar')" :active="request()->routeIs('calendar')">
        {{ __('Calendar') }}
    </x-forms.nav-link>--}}
@endif

@if ($responsive ?? false)
    <x-forms.responsive-nav-link href="/" :active="request()->is('/')">
        {{ __('Home') }}
    </x-forms.responsive-nav-link>

    {{-- <x-forms.responsive-nav-link :href="route('reservation')" :active="request()->routeIs('reservation')">
        {{ __('Reservation') }}
    </x-forms.responsive-nav-link> --}}

    <x-forms.responsive-nav-link href="/#semi-section">
        {{ __('Features') }}
    </x-forms.responsive-nav-link>

    <x-forms.responsive-nav-link href="/#pricing-section">
        {{ __('Pricing') }}
    </x-forms.responsive-nav-link>

    <x-forms.responsive-nav-link href="/#footer-section">
        {{ __('Contacts') }}
    </x-forms.responsive-nav-link>
    @if (!Auth::user())
        <x-forms.responsive-nav-link :href="route('login')" :active="request()->is('login')">
            {{ __('Login') }}
        </x-forms.responsive-nav-link>
        <x-forms.responsive-nav-link :href="route('register')">
            {{ __('Register') }}
        </x-forms.responsive-nav-link>
    @endif

@endif
