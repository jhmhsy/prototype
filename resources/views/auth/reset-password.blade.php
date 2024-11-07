<x-app-layout>



    <div class="flex items-center justify-center min-h-screen bg-background text-foreground p-4 sm:p-8">
        <div class="w-full max-w-md p-6 bg-card text-card-foreground rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Reset Password</h2>
            <form method="POST" action="{{ route('password.store') }}" class="flex flex-col gap-4">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">


                <!-- email -->
                <div>
                    <x-forms.input-label for="email" :value="__('Email Address')" />
                    <input type="email" id="email" name="email" required :value="old('email', $request->email)"
                        class="w-full px-3 py-2 bg-input border border-border rounded -500"
                        placeholder="Enter your email">
                    <x-custom.error :errors="$errors->get('email')" class="mt-2" />
                </div>

                <!-- password -->
                <div>
                    <x-forms.input-label for="password" :value="__('Password')" />
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 bg-input border border-border rounded -500"
                        placeholder="Enter new password">
                    <x-custom.error :errors="$errors->get('password')" class="mt-2" />
                </div>

                <!-- confirm password -->
                <div>
                    <x-forms.input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        autocomplete="new-password" class="w-full px-3 py-2 bg-input border border-border rounded "
                        placeholder="Confirm new password">
                    <x-custom.error :errors="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button type="submit"
                    class="w-full bg-darkmode_dark text-white hover:bg-yellow-50 hover:text-black py-2 px-4 rounded transition-colors duration-200">
                    Reset Password
                </button>
            </form>
        </div>
    </div>

</x-app-layout>