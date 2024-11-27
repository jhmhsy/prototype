<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-background text-foreground p-4 sm:p-8">
        <div class="w-full max-w-sm p-6 bg-card text-card-foreground rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-white"> {{ __('Almost there!') }}</h2>
            <p class="text-gray-500">
                {{ __('Thank you for signing up! Please verify the link we sent to your email to proceed.. Didn’t receive it? You can request another verification by clicking the "') }}
                <span class="text-white">Resend</span>
                {{ __('" button..') }}
            </p>

            @if (session('status') === 'verification-throttled')
                <div x-data="countdownTimer({{ session('wait') }})" x-init="startCountdown()"
                    class="alert alert-warning text-red-600">
                    Please wait
                    <span x-text="formattedTime"></span>
                    before requesting another verification email.
                </div>
            @endif


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

<script>
    function countdownTimer(initialSeconds) {
        return {
            remainingSeconds: initialSeconds,
            formattedTime: '',

            startCountdown() {
                this.updateTimer();

                const timer = setInterval(() => {
                    if (this.remainingSeconds > 0) {
                        this.updateTimer();
                        this.remainingSeconds--;
                    } else {
                        clearInterval(timer);
                        // Optional: you could dispatch an event or redirect
                    }
                }, 1000);
            },

            updateTimer() {
                const minutes = Math.floor(this.remainingSeconds / 60);
                const seconds = this.remainingSeconds % 60;

                this.formattedTime =
                    `${minutes}:${seconds.toString().padStart(2, '0')}`;
            }
        }
    }
</script>