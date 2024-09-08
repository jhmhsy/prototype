@if($default ?? false)
<x-inputs.nav-link href="#">
    {{ __('Home') }}
</x-inputs.nav-link>


@if (Auth::user())
<x-inputs.nav-link :href="route('reservation')">
    {{ __('Reservation') }}
</x-inputs.nav-link>
@endif

<x-inputs.nav-link href="#equipment-section">
    {{ __('Features') }}
</x-inputs.nav-link>

<x-inputs.nav-link href="#pricing-section">
    {{ __('Pricing') }}
</x-inputs.nav-link>

<x-inputs.nav-link href="#footer-section">
    {{ __('Contacts') }}
</x-inputs.nav-link>
@endif

@if($responsive ?? false)
<x-inputs.responsive-nav-link href="#">
    {{ __('Home') }}
</x-inputs.responsive-nav-link>

@if (Auth::user())
<x-inputs.responsive-nav-link :href="route('reservation')">
    {{ __('Reservation') }}
</x-inputs.responsive-nav-link>
@endif

<x-inputs.responsive-nav-link href="#equipment-section">
    {{ __('Features') }}
</x-inputs.responsive-nav-link>

<x-inputs.responsive-nav-link href="#pricing-section">
    {{ __('Pricing') }}
</x-inputs.responsive-nav-link>

<x-inputs.responsive-nav-link href="#footer-section">
    {{ __('Contacts') }}
</x-inputs.responsive-nav-link>
@endif