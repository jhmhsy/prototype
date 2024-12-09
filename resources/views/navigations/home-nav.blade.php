@if ($default ?? false)
    @if (Request::is('/'))
        <x-forms.nav-link href="/#main-section" class="nav-link">
            {{ __('Home') }}
        </x-forms.nav-link>
    @else
        <x-forms.nav-link href="/" class="nav-link">
            {{ __('Home') }}
        </x-forms.nav-link>
    @endif

    <x-forms.nav-link href="/#equipment-section" class="nav-link">
        {{ __('Features') }}
    </x-forms.nav-link>

    <x-forms.nav-link href="/#pricing-section" class="nav-link">
        {{ __('Pricing') }}
    </x-forms.nav-link>

    <x-forms.nav-link href="/#footer-section" class="nav-link">
        {{ __('Contacts') }}
    </x-forms.nav-link>
    <x-forms.nav-link href="/about-us" class="nav-link">
        {{ __('About Us') }}
    </x-forms.nav-link>

    @if (Auth::user())
        <x-forms.nav-link href="{{ route('services.index') }}" class="nav-link">
            {{ __('My Services') }}
        </x-forms.nav-link>
    @endif
@endif

@if ($responsive ?? false)
    @if (Request::is('/'))
        <x-forms.responsive-nav-link href="/#main-section" :active="request()->is('/')">
            {{ __('Home') }}
        </x-forms.responsive-nav-link>
    @else
        <x-forms.responsive-nav-link href="/" :active="request()->is('/')">
            {{ __('Home') }}
        </x-forms.responsive-nav-link>
    @endif


    <x-forms.responsive-nav-link href="/#equipment-section">
        {{ __('Features') }}
    </x-forms.responsive-nav-link>

    <x-forms.responsive-nav-link href="/#pricing-section">
        {{ __('Pricing') }}
    </x-forms.responsive-nav-link>

    <x-forms.responsive-nav-link href="/#footer-section">
        {{ __('Contacts') }}
    </x-forms.responsive-nav-link>
    <x-forms.responsive-nav-link href="/about-us">
        {{ __('About Us') }}
    </x-forms.responsive-nav-link>

    @if (Auth::user())
        <x-forms.responsive-nav-link href="{{ route('services.index') }}">
            {{ __('My Services') }}
        </x-forms.responsive-nav-link>
    @else
        <x-forms.responsive-nav-link :href="route('login')" :active="request()->is('login')">
            {{ __('Login') }}
        </x-forms.responsive-nav-link>
        <x-forms.responsive-nav-link :href="route('register')">
            {{ __('Register') }}
        </x-forms.responsive-nav-link>
    @endif
@endif