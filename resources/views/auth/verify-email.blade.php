<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-background text-foreground p-4 sm:p-8">
        <div class="w-full max-w-sm p-6 bg-card text-card-foreground rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4"> {{ __('Thanks for signing up!') }}</h2>
            <p class="text-gray-500 ">
                {{ __('Almost there! Just verify your address by clicking the link in the email. Didn’t receive it? We’ll gladly send another.') }}
            </p>
            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
            @endif

            <div class="flex flex-col sm:flex-row sm:space-x-4 mt-4 space-y-2 sm:space-y-0">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button
                            class="inline-flex items-center px-4 py-2 bg-darkmode_dark 
                            border border-main rounded-md font-semibold text-sm text-white uppercase  hover:text-main focus:outline-none transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:scale-105">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="inline-flex items-center px-2 py-2 bg-red-500  border border-main rounded-md font-semibold text-sm text-white uppercase  hover:text-main focus:outline-none transition ease-in-out duration-150 shadow-md hover:shadow-lg transform hover:scale-105">
                        {{ __('Log Out') }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-guest-layout>