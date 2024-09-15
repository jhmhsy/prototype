
<x-guest-layout>
    <div class="flex min-h-screen flex-col">
        <header>
            <x-homepage.header-section/>
        </header>
        {{-- Login Form --}}
        <main class="mt-5 flex flex-1 items-center justify-center p-8 bg-white/70 dark:bg-darkmode_dark">
            <div class="max-w-md space-y-6 ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-2 text-center">
                        <h1 class="text-3xl font-bold text-primary-foreground text-textblack dark:text-textwhite">
                            Welcome to
                            Gym
                            Reservations</h1>
                        <p class="text-primary-foreground/80">Easily book your gym sessions with our user-friendly
                            platform.
                        </p>
                    </div>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm mt-5 dark:border-white/10"
                        data-v0-t="card">
                        <div class="flex flex-col space-y-1.5 px-6 py-4">
                            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl mx-auto">Login</h3>
                        </div>
                        <div class="px-6 py-1 space-y-4">
                            <x-forms.field class="space-y-2" :errors="$errors->get('password')" :value="__('Email')" :name="'email'">
                                <x-custom.text-input class="block w-full" id="email" type="email"
                                    name="email" :value="old('email')" placeholder="johndoe@example.com" required
                                    autofocus autocomplete="username" />
                            </x-forms.field>
                            <x-forms.field class="space-y-2" :value="__('Password')" :errors="$errors->get('password')" :name="'password'">
                                <x-custom.text-input class="block w-full" id="password" type="password"
                                    name="password" placeholder="********" required
                                    autocomplete="current-password" />
                            </x-forms.field>
                            <div class="flex items-center justify-between">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 flex items-center gap-2"
                                    for="remember_me">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded bg-white text-black-600 shadow-sm dark:focus:ring-white-600 dark:focus:ring-offset-dark-800"
                                        name="remember">
                                    <span>Remember me</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="text-red-500 text-sm font-medium underline hover:text-red-600"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="px-6 pb-5 pt-3 space-y-2">
                            <x-custom.secondary-button
                                class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 px-6 py-2 dark:bg-white dark:text-black dark:hover:bg-white/50 dark:hover:text-white">
                                {{ __('Sign in') }}
                            </x-custom.secondary-button>

                            <div class="text-center text-sm">
                                Don't have an account? <a
                                    class="text-blue-500 font-medium underline hover:text-blue-600"
                                    href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </main>
    </div>
</x-guest-layout>
