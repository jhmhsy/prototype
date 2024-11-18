<x-guest-layout>
    <div class="flex min-h-screen flex-col bg-peak-5 text-primary ">
        <header>
            <x-homepage.header-section />
        </header>
        {{-- Login Form --}}
        <main class="mt-15 flex flex-1 items-center justify-center p-8 bg-peak-3 ">
            <div
                class="bg-tint_3 dark:bg-tint_7 max-w-md space-y-3 border border-white/30 px-4 py-5 shadow-md items-center rounded-md">
                <div class="text-center">
                    <x-custom.forgot-logo />
                    <h1 class="font-bold text-xl">Forgot Password</h1>
                    <div class="mb-4 text-sm text-shade_9 dark:text-tint_1 justify-full">
                        {{ __('Forgot your password? No problem. Enter your email and we will send you a link to reset your password') }}
                    </div>
                </div>
                <!-- Session Status -->
                <x-custom.auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="">
                    @csrf
                    <!-- Email Address -->
                    <x-forms.field :float="true" class="space-y-2" :errors="$errors->get('email')" :value="__('Email')"
                        :for="'email'">
                        <x-custom.floating-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required placeholder=" " />
                    </x-forms.field>
                    <div class="flex mt-4">
                        <x-custom.primary-button class="mx-auto">
                            {{ __('Email Password Reset Link') }}
                        </x-custom.primary-button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-guest-layout>
