<x-guest-layout>
    <div class="flex min-h-screen flex-col">
        <header>
            <x-homepage.header-section />
        </header>
        {{-- Login Form --}}
        <main class="mt-15 flex flex-1 items-center justify-center p-8 bg-white/70 dark:bg-darkmode_dark">
            <div class="max-w-md space-y-3 border dark:border-white/10 px-4 py-5 shadow-md items-center rounded-md">
                <div class="text-center">
                    <x-custom.forgot-logo />
                    <h1 class="font-bold text-xl">Forgot Password</h1>
                    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 justify-full">
                        {{ __('Forgot your password? No problem. Enter your email and we will send you a link to reset your password') }}
                    </div>
                </div>
                <!-- Session Status -->
                <x-forms.auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}" class="">
                    @csrf
                    <!-- Email Address -->
                    <x-forms.field :float="true" class="space-y-2" :errors="$errors->get('email')" :value="__('Email')" :for="'email'">
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
