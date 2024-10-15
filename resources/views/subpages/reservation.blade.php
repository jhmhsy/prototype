<x-guest-layout>
    <x-custom.loader2 />
    <x-custom.alert-success>Reservation Success!</x-custom.alert-success>
    <div>
        <header>
            <x-homepage.header-section />
        </header>
        <div class="flex items-center justify-center min-h-screen bg-tint_1 dark:bg-shade_7 pt-20 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md mb-3">
                <div
                    class=" shadow-md rounded-lg overflow-hidden @guest bg-tint_3 dark:bg-tint_9 @else bg-gradient-to-r from-purple-500 to-indigo-600 @endguest ">
                    <div class="pt-6 px-6">
                        <h2 class="text-2xl font-bold text-center mb-6">Gym Reservation</h2>
                        <div class="mb-6 text-shade_9">
                            <!-- Regular User Form -->
                            <div class="mt-6">
                                <form action="{{ route('reserve.store') }}" method="POST" onsubmit="successAlert()">
                                    @csrf
                                    
                                    <x-forms.field :value="__('Name')" :errors="$errors->get('regular-name')" :for="'regular-name'">
                                        <input placeholder="Juan Dela Cruz" type="text" id="regular-name"
                                            name="name"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3 {{ Auth::user() ? 'text-gray-400' : 'text-shade_9 dark:text-shade_9' }}
                                            placeholder-shade_9/50"
                                            value="{{ old('name', Auth::user() ? Auth::user()->name : '') }}"
                                            {{ Auth::user() ? 'readonly' : '' }} required>
                                    </x-forms.field>

                                    <x-forms.field :value="__('Email')" :errors="$errors->get('email')" :for="'email'">
                                        <input placeholder="JohnDoe@email.com" type="email" id="email"
                                            name="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3 {{ Auth::user() ? 'text-gray-400' : 'text-shade_9 dark:text-shade_9' }} placeholder-shade_9/50"
                                            value="{{ old('email', Auth::user() ? Auth::user()->email : '') }}"
                                            {{ Auth::user() ? 'readonly' : '' }} required>
                                    </x-forms.field>

                                    <x-forms.field :value="__('Date')" :errors="$errors->get('regular-date')" :for="'regular-date'">
                                        <input type="date" id="regular-date" name="date"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3"
                                            required>
                                    </x-forms.field>

                                    <x-forms.field :value="__('Time')" :errors="$errors->get('regular-time')" :for="'regular-time'">
                                        <select id="regular-time" name="time"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3 mb-4"
                                            required>
                                            <option value="" disabled selected>Select an hour</option>
                                            <!-- Loop through 7 to 20 for full hours -->
                                            @for ($i = 7; $i < 21; $i++)
                                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">
                                                    {{ $i > 12 ? $i - 12 : $i }} {{ $i >= 12 ? 'pm' : 'am' }}
                                                </option>
                                            @endfor
                                        </select>
                                    </x-forms.field>
                                    <button type="submit"
                                        class="w-full bg-main text-white py-2 px-4 rounded-md hover:bg-shade_3 dark:hover:bg-shade_5 dark:bg-shade_3 transition duration-300 ease-in-out">Reserve</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            animation: gradient 2.5s ease infinite;
            background-size: 200% 200%;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('alert-border-3');
            const alertMessage = document.getElementById('alert-message');
            const testButton = document.getElementById('test-alert');
            const closeButton = alert.querySelector('button[data-dismiss-target="#alert-border-3"]');

            function showAlert(message) {
                alertMessage.textContent = 'Success! ' + message;
                alert.style.display = 'flex';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000);
            }

            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    alert.style.display = 'none';
                });
            }

            testButton.addEventListener('click', function() {
                showAlert('This is a test alert message.');
            });

            // Check for flash message
            @if (session('success'))
                showAlert("{{ session('success') }}");
            @endif
        });
    </script>
</x-guest-layout>
