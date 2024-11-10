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
                <x-custom.primary-button onclick="window.location.href = '{{ route('register') }}'" class="bg-peak-3">Register</x-custom.primary-button>
            @endif
        @endif
    @endauth
@endif
