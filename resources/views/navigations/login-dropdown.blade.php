@if (Route::has('login'))
@auth
@else
@if ($row ?? false)
@if (!Auth::user())
<x-forms.nav-link :href="route('login')" :active="Request::is('login') || Request::is('forgot-password')">
    {{ __('Login') }}
</x-forms.nav-link>
@endif

@if (Route::has('register'))
<x-forms.nav-link href="{{ route('register') }}" :active="request()->is('register')">
    Register
</x-forms.nav-link>
@endif
@endif
@endauth
@endif