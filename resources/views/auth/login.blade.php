<x-guest-layout>
    <div class="flex h-screen flex-col bg-peak-5 text-primary">
        <header>
            <x-homepage.header-section />
        </header>
        {{-- Login Form --}}
        <main class="pt-15 flex flex-1 items-center justify-center px-8">
            <div class="max-w-md w-full space-y-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="rounded-lg bg-peak-3 text-primary shadow-lg mt-5 py-5" data-v0-t="card">
                        <div
                            class="flex flex-col space-y-1.5 px-6 py-4 text-lemon-base uppercase font-raleway font-bold">
                            <h3 class="font-bold whitespace-nowrap text-3xl mx-auto tracking-widest">Login</h3>
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
                                    name="password" placeholder=" " required autocomplete="current-password" />

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
                                    class="text-blue-500 font-medium underline hover:text-blue-600"
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