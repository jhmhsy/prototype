@if (Route::has('login'))
    @auth
    @else
        @if ($row ?? false)
            @if (Route::has('register'))
                <x-forms.nav-link href="{{ route('register') }}" :active="request()->is('register')">
                    Register
                </x-forms.nav-link>
            @endif
        @endif
    @endauth
@endif
