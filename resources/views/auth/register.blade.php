<x-guest-layout>
    <div class="flex min-h-screen flex-col pb-5">
        <x-homepage.header-section></x-homepage.header-section>
        <!-- home button -->
        {{-- <div class="flex items-center">
            <x-custom.nav-link href="{{ route('welcome') }}" class="text-sm font-medium hover:text-black m-4 px-7 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="currentColor"
                    class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
                </svg>
                <h2 class="inline-block rounded-lg bg-muted px-3 text-xl py-1 font-medium">Back</h2>
            </x-custom.nav-link>
        </div> --}}

        <!-- Register Form -->
        <div class="bg-white/70 dark:bg-darkmode_dark justify-center mt-15 flex  pt-5">
            <div class="w-full max-w-md space-y-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="space-y-2 text-center">
                        <h1 class="text-3xl font-bold text-primary-foreground text-textblack dark:text-textwhite">
                            Register for Gym Reservations</h1>
                        <p class="text-primary-foreground/80">Easily book your gym sessions with our user-friendly
                            platform.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-darkmode_dark flex items-center justify-center">
                        <div class="w-full mt-6 rounded-lg border bg-card text-card-foreground shadow-sm bg-darkmode_dark dark:bg-white text-textwhite dark:text-textblack"
                            data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 px-6 py-4">
                                <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Register an Account
                                </h3>
                            </div>
                            <div class="px-6 py-1 space-y-4">

                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="firstName">
                                        First Name
                                    </label>
                                    <x-custom.text-input-reverse id="name" class="block mt-1 w-full" type="text"
                                        name="name" :value="old('name')" required autofocus autocomplete="given-name" />
                                    <x-custom.input-error :errors="$errors->get('name')" class="mt-2" />

                                </div>

                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="email">
                                        Email
                                    </label>
                                    <x-custom.text-input-reverse id="email" class="block mt-1 w-full" type="email"
                                        name="email" :value="old('email')" placeholder="example@gmail.com" required
                                        autocomplete="username" />
                                    <x-custom.input-error :errors="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="password">
                                        Password
                                    </label>
                                    <x-custom.text-input-reverse id="password" class="block mt-1 w-full"
                                        type="password" name="password" placeholder="********" required
                                        autocomplete="new-password" />
                                    <x-custom.input-error :errors="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="confirmPassword">
                                        Confirm Password
                                    </label>
                                    <x-custom.text-input-reverse id="password_confirmation" class="block mt-1 w-full"
                                        type="password" name="password_confirmation" placeholder="********" required
                                        autocomplete="new-password" />
                                    <x-custom.input-error :errors="$errors->get('password_confirmation')"
                                        class="mt-2" />
                                </div>

                            </div>
                            <div class="px-6 pt-2 pb-5 space-y-2">
                                <x-custom.secondary-button
                                    class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 px-6 py-2 bg-white text-black dark:text-white dark:hover:bg-darkmode_lighter">
                                    {{ __('Register') }}
                                </x-custom.secondary-button>

                                <div class="text-center text-sm">
                                    Already have an account? <a
                                        class="text-blue-500 font-medium underline hover:text-primary dark:hover:text-black"
                                        href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

<script id="toggleDarkMode" class="hidden" src="{{ asset('js/darkmode.js') }}"></script>
