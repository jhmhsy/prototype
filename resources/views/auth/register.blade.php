<x-guest-layout>

    <div class="flex min-h-screen flex-col">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="bg-white dark:bg-darkmode_dark flex flex-1 items-center justify-center p-8">
                <div class="max-w-md space-y-6 bg">
                    <div class="space-y-2 text-center text-textblack dark:text-textwhite">
                        <h1 class="text-3xl font-bold text-primary-foreground">Register for Gym Reservations</h1>
                        <p class="text-primary-foreground/80">Sign up to book your gym sessions with our platform.</p>
                    </div>
                    <div class="rounded-lg border bg-card text-card-foreground shadow-sm bg-darkmode_dark dark:bg-white text-textwhite dark:text-textblack"
                        data-v0-t="card">
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Create an Account</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="firstName">
                                        First Name
                                    </label>
                                    <x-custom.text-input-reverse id="first_name" class="block mt-1 w-full" type="text"
                                        name="first_name" :value="old('first_name')" required autofocus
                                        autocomplete="given-name" />
                                    <x-custom.input-error :messages="$errors->get('first_name')" class="mt-2" />

                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                        for="lastName">
                                        Last Name
                                    </label>
                                    <x-custom.text-input-reverse id="last_name" class="block mt-1 w-full" type="text"
                                        name="last_name" :value="old('last_name')" required
                                        autocomplete="family-name" />
                                    <x-custom.input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="lastName">
                                    Membership Type
                                </label>
                                <select id="membership" name="membership"
                                    class="block mt-1 w-full text-white dark:text-textblack bg-darkmode_dark dark:bg-white"
                                    required>
                                    <option value="basic">Basic</option>
                                    <option value="premium">Premium</option>
                                    <!-- Add more roles if needed -->
                                </select>
                                <x-custom.input-error :messages="$errors->get('role')" class="mt-2" />

                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="contactNumber">
                                    Contact Number
                                </label>
                                <x-custom.text-input-reverse id="contact_number" class="block mt-1 w-full" type="text"
                                    name="contact_number" :value="old('contact_number')" placeholder="123-456-7890"
                                    required autocomplete="contact_number" />
                                <x-custom.input-error :messages="$errors->get('contact_number')" class="mt-2" />

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
                                <x-custom.input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                    for="password">
                                    Password
                                </label>
                                <x-custom.text-input-reverse id="password" class="block mt-1 w-full" type="password"
                                    name="password" placeholder="********" required autocomplete="new-password" />
                                <x-custom.input-error :messages="$errors->get('password')" class="mt-2" />
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
                                <x-custom.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <!-- Default User Role since this is the user registration -->
                            <input type="hidden" name="role" value="user">
                        </div>
                        <div class="flex items-center p-6">





                            <x-secondary-button
                                class="ms-3 inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 w-full bg-white text-black dark:text-white dark:hover:bg-darkmode_lighter">
                                {{ __('Register') }}
                            </x-secondary-button>

                            <diva class="mt-4 text-center text-sm text-thirdy dark:text-darkmode_lighter">
                                Don't have an account? <a
                                    class="font-medium underline text-secondary dark:text-darkmode_lighter dark:hover:text-black hover:text-primary hover:text-white"
                                    href="{{ route('login') }}">Sign in</a>
                        </div>


                    </div>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>

<script id="toggleDarkMode" class="hidden" src="{{ asset('js/darkmode.js') }}"></script>