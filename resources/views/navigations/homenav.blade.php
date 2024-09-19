@if ($default ?? false)
<x-forms.nav-link href="/" :active="request()->is('/')">
    {{ __('Home') }}
</x-forms.nav-link>
<x-forms.nav-link :href="route('reserve')" :active="request()->routeIs('reserve')">
    {{ __('Reservation') }}
</x-forms.nav-link>
<x-forms.nav-link href="/#equipment-section" class="inactivelink">
    {{ __('Features') }}
</x-forms.nav-link>

<x-forms.nav-link href="/#pricing-section" class="inactivelink">
    {{ __('Pricing') }}
</x-forms.nav-link>

<x-forms.nav-link href="/#footer-section" class="inactivelink">
    {{ __('Contacts') }}
</x-forms.nav-link>
@if (!Auth::user())
<x-forms.nav-link href="{{ route('login') }}" :active="Request::is('login')">
    {{ __('Login') }}
</x-forms.nav-link>
@endif
@endif

@if ($responsive ?? false)
<x-forms.responsive-nav-link href="/" :active="request()->is('/')">
    {{ __('Home') }}
</x-forms.responsive-nav-link>

<x-forms.responsive-nav-link :href="route('reserve')" :active="request()->routeIs('reserve')">
    {{ __('Reservation') }}
</x-forms.responsive-nav-link>

<x-forms.responsive-nav-link href="/#equipment-section" class="r-inactiveLink">
    {{ __('Features') }}
</x-forms.responsive-nav-link>

<x-forms.responsive-nav-link href="/#pricing-section" class="r-inactivelink">
    {{ __('Pricing') }}
</x-forms.responsive-nav-link>

<x-forms.responsive-nav-link href="/#footer-section" class="r-inactivelink">
    {{ __('Contacts') }}
</x-forms.responsive-nav-link>
@if (!Auth::user())
<x-forms.responsive-nav-link href="{{ route('login') }}" :active="request()->is('login')">
    {{ __('Login') }}
</x-forms.responsive-nav-link>
<x-forms.responsive-nav-link href="{{ route('register') }}">
    {{ __('Register') }}
</x-forms.responsive-nav-link>
@endif
@endif