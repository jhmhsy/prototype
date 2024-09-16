@php
    $defaults = ['name' => 'name'];
@endphp
<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <!-- Password -->
        <x-forms.field :value="__('Password')" :errors="$errors->get('password')" :name="'password'">
            <x-custom.floating-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            </x-forms-field>

            <div class="flex justify-end mt-4">
                <x-custom.primary-button>
                    {{ __('Confirm') }}
                </x-custom.primary-button>
            </div>
    </form>
</x-guest-layout>
