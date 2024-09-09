@if (Route::has('login'))
@auth
@else


@if($column ?? false)
<x-inputs.dropdown-link href="{{ route('login') }}">
    Log in
</x-inputs.dropdown-link>
@if (Route::has('register'))
<x-inputs.dropdown-link href="{{ route('register') }}">
    Register
</x-inputs.dropdown-link>
@endif
@endif

@if($row ?? false)
<x-inputs.nav-link href="{{ route('login') }}">
    Log in
</x-inputs.nav-link>
@if (Route::has('register'))
<x-inputs.nav-link href="{{ route('register') }}">
    Register
</x-inputs.nav-link>
@endif
@endif



@endauth
@endif