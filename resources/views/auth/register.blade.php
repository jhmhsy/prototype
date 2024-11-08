<x-guest-layout>
    <div class="flex h-screen flex-col pb-5 bg-tint_1 dark:bg-shade_7 text-shade_9">
        <header>
            <x-homepage.header-section />
        </header>
        <!-- Register Form -->
        <main class="justify-center pt-15 flex px-8">
            <div class="w-full max-w-md space-y-6 text-shade_9">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="space-y-2 text-center dark:text-tint_1">
                        <h1 class="text-3xl font-bold text-primary-foreground ">
                            Register for Gym Reservations</h1>
                        <p class="text-primary-foreground/80 text-sm">Easily book your gym sessions with our
                            user-friendly
                            platform.
                        </p>
                    </div>
                    <div class=" flex items-center justify-center ">
                        <div class="w-full mt-5 rounded-lg border bg-card text-card-foreground shadow-sm dark:border-white/10 bg-tint_3 dark:bg-tint_7"
                            data-v0-t="card">
                            <div class="flex flex-col space-y-1.5 px-6 pt-4 pb-1">
                                <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl mx-auto">Register an
                                    Account
                                </h3>
                            </div>
                            <div class="px-6 py-2 space-y-4">
                                <x-forms.field :float="true" class="space-y-2" :value="__('Name')"
                                    :errors="$errors->get('name')" :for="'name'">
                                    <x-custom.floating-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus autocomplete="given-name"
                                        placeholder=" " />
                                </x-forms.field>
                                <x-forms.field :float="true" class="space-y-2" :value="__('Email')"
                                    :errors="$errors->get('email')" :for="'email'">
                                    <x-custom.floating-input id="email" class="block mt-1 w-full" type="email"
                                        name="email" :value="old('email')" placeholder=" " required
                                        autocomplete="username" />
                                </x-forms.field>
                                <x-forms.field :float="true" class="space-y-2" :value="__('Password')"
                                    :errors="$errors->get('password')" :for="'password'">
                                    <x-custom.floating-input id="password" class="block mt-1 w-full" type="password"
                                        name="password" placeholder="••••••••" required autocomplete="new-password" />
                                </x-forms.field>
                                <x-forms.field :float="true" class="space-y-2" :value="__('Confirm Password')"
                                    :errors="$errors->get('password_confirmation')" :for="'password_confirmation'">
                                    <x-custom.floating-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password" name="password_confirmation" placeholder="••••••••" required
                                        autocomplete="new-password" />
                                </x-forms.field>

                            </div>
                            <div class="px-6 pt-2 pb-5 space-y-2">
                                <x-custom.secondary-button
                                    class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 px-6 py-2 ">
                                    {{ __('Register') }}
                                </x-custom.secondary-button>
                                <div class="text-center text-sm">
                                    Already have an account? <a
                                        class="text-blue-500 font-medium underline hover:text-blue-300 dark:hover:text-blue-500"
                                        href="{{ route('login') }}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-guest-layout>