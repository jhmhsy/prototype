<x-guest-layout>
    <div class="flex h-screen flex-col bg-tint_1 dark:bg-shade_7 text-shade_9">
        <header>
            <x-homepage.header-section />
        </header>
        {{-- Login Form --}}
        <main class="pt-15 flex flex-1 items-center justify-center px-8">
            <div class="max-w-md space-y-6 ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="space-y-2 text-center dark:text-tint_2">
                        <h1 class="text-3xl font-bold text-primary-foreground text-textblack dark:text-textwhite">
                            Welcome to
                            Gym
                            Reservations</h1>
                        <p class="text-primary-foreground/80 text-sm">Easily book your gym sessions with our user-friendly
                            platform.
                        </p>
                    </div>
                    <div class="rounded-lg bg-card text-card-foreground shadow-lg mt-5 bg-tint_3 dark:bg-tint_7 "
                        data-v0-t="card">
                        <div class="flex flex-col space-y-1.5 px-6 py-4">
                            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl mx-auto">Login</h3>
                        </div>
                        <div class="px-6 py-1 space-y-4">
                            <x-forms.field :float="true" class="space-y-2" :errors="$errors->get('email')"
                                :value="__('Email')" :for="'email'">
                                <x-custom.floating-input class="block w-full" id="email" type="email" name="email"
                                    :value="old('email')" placeholder=" " required autofocus autocomplete="username" />
                            </x-forms.field>
                            <x-forms.field :float="true" class="space-y-2" :value="__('Password')"
                                :errors="$errors->get('password')" :for="'password'">
                                <x-custom.floating-input class="block w-full" id="password" type="password"
                                    name="password" placeholder="••••••••" required autocomplete="current-password" />
                            </x-forms.field>
                            <div class="flex items-center justify-between">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 flex items-center gap-2"
                                    for="remember_me">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded bg-white text-black-600 shadow-sm focus:outline-none focus:ring-0 focus:ring-offset-0"
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
                                class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background disabled:pointer-events-none disabled:opacity-50 px-6 py-2">
                                {{ __('Sign in') }}
                            </x-custom.secondary-button>

                            <div class="text-center text-sm">
                                Don't have an account? <a
                                    class="text-blue-500 font-medium underline dark:text-indigo-500 hover:text-blue-600"
                                    href="{{ route('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </form>

                {{--<!-- TEMPORARY AUTHENTICATION FOR USER/ADMIN cause im lazey typing -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input hidden type="email" name="email" value="admin@gmail.com">
                    <input hidden type="password" name="password" value="asdasdasd">
                    <x-custom.primary-button
                        class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background disabled:pointer-events-none disabled:opacity-50 px-6 py-2">
                        {{ __('Sign in as Admin') }}
                    </x-custom.primary-button>
                </form>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input hidden type="email" name="email" value="user@gmail.com">
                    <input hidden type="password" name="password" value="asdasdasd">


                    <x-custom.primary-button
                        class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background disabled:pointer-events-none disabled:opacity-50 px-6 py-2">
                        {{ __('Sign in as User') }}
                    </x-custom.primary-button>

                </form>--}}
            </div>
        </main>
    </div>
</x-guest-layout>