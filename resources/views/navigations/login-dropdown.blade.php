@if (Route::has('login'))
@auth
@else
{{--@if ($column ?? false)
            <x-forms.dropdown-link href="{{ route('login') }}" :active="request()->is('login')">
Log in
</x-forms.dropdown-link>
@if (Route::has('register'))
<x-forms.dropdown-link href="{{ route('register') }}" :active="request()->is('register')">
    Register
</x-forms.dropdown-link>
@endif
@endif--}}

@if ($row ?? false)
{{--<x-forms.nav-link href="{{ route('login') }}" :active="request()->is('login')">
Log in
</x-forms.nav-link>--}}
@if (Route::has('register'))
<x-forms.nav-link href="{{ route('register') }}" :active="request()->is('register')">
    Register
</x-forms.nav-link>
@endif
@endif

@endauth
@endif