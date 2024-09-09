<x-guest-layout>
    <div class="flex min-h-screen flex-col ">
        <x-homepage.header-section></x-homepage.header-section>
        <!-- Home button -->
        {{--<div class="flex items-center">
            <x-custom.nav-link href="{{ route('welcome') }}" class="text-sm font-medium hover:text-black m-4 px-7 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor"
                    class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                </svg>
                <h2 class="inline-block rounded-lg bg-muted px-3 text-xl py-1 font-medium">Back</h2>
            </x-custom.nav-link>
        </div>--}}

        
        <!-- Login Form -->
        <div class="flex flex-1 items-center justify-center p-8 bg-white/50 dark:bg-darkmode_dark">

            <div class="max-w-md space-y-6 ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-2 text-center ">
                        <h1 class="text-3xl font-bold text-primary-foreground text-textblack dark:text-textwhite">
                            Welcome to
                            Gym
                            Reservations</h1>
                        <p class="text-primary-foreground/80">Easily book your gym sessions with our user-friendly
                            platform.
                        </p>
                    </div>

                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-darkmode_dark dark:bg-white text-textwhite dark:text-textblack"
                        data-v0-t="card">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Login</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <x-custom.input-label class="text-white dark:text-textblack" for="email"
                                    :value="__('Email')" />
                                <x-custom.text-input-reverse class="block 3mt-1 w-full" id="email" type="email"
                                    name="email" :value="old('email')" placeholder="m@example.com" required autofocus
                                    autocomplete="username" />
                                <x-custom.input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="space-y-2">
                                <x-custom.input-label class="text-white dark:text-textblack" for="password"
                                    :value="__('Password')" />
                                <x-custom.text-input-reverse class="block 3mt-1 w-full" id="password" type="password"
                                    name="password" placeholder="********" remem required
                                    autocomplete="current-password" />
                                <x-custom.input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-between">

                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 flex items-center gap-2"
                                    for="remember_me">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded bg-white  border-black dark:border-gray-700 text-black-600 shadow-sm focus:ring-black dark:focus:ring-white-600 dark:focus:ring-offset-dark-800"
                                        name="remember">
                                    <span>Remember me</span>
                                </label>
                                @if (Route::has('password.request'))
                                <a class="text-sm font-medium underline text-thirdy hover:text-primary dark:text-gray-500 dark:hover:text-textblack"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <x-custom.secondary-button
                                class="ms-3 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 w-full bg-white text-black dark:text-white dark:hover:bg-darkmode_lighter">
                                {{ __('Sign in') }}
                            </x-custom.secondary-button>



                            <div class="mt-4 text-center text-sm">
                                Don't have an account? <a
                                    class="font-medium underline hover:text-primary dark:hover:text-black"
                                    href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
<script id="toggleDarkMode" class="hidden" src="{{ asset('js/darkmode.js') }}"></script>