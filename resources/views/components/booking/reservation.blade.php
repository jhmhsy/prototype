<x-guest-layout>
    <div>
        <header>
            <x-homepage.header-section />
        </header>
        <div
            class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-darkmode_dark pt-20 px-4 sm:px-6 lg:px-8">
            <div x-data="{ userType: null }" class="w-full max-w-md mb-3">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="pt-6 px-6">
                        <h2 class="text-2xl font-bold text-center mb-6">Gym Reservation</h2>

                        <!-- User Type Selection -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-3">Select User Type:</h3>
                            <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                                <button @click="userType = userType === 'regular' ? null : 'regular'"
                                    :class="{ 'bg-blue-500 text-white': userType === 'regular', 'bg-gray-200 text-gray-700': userType !== 'regular' }"
                                    class="px-4 py-2 rounded-md transition duration-300 ease-in-out w-full sm:w-auto hover:scale-105">
                                    Regular User
                                </button>
                                @if (Auth::user())
                                <x-custom.rainbow-button @click="userType = userType === 'premium' ? null : 'premium'">
                                    Premium User
                                </x-custom.rainbow-button>
                                @else
                                <a href="{{ route('login') }}">
                                    <x-custom.rainbow-button
                                        @click="userType = userType === 'premium' ? null : 'premium'">
                                        Premium User
                                    </x-custom.rainbow-button>
                                </a>
                                @endif
                            </div>
                            <!-- Regular User Form -->
                            <div x-show="userType === 'regular'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-4"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-4" class="mt-6">
                                <form>
                                    <div class="mb-4">
                                        <label for="regular-name"
                                            class="block text-gray-700 font-semibold mb-2">Name</label>
                                        <input type="text" id="regular-name" name="name"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="regular-email"
                                            class="items-center flex text-gray-700 font-semibold mb-2">Email &nbsp;<p
                                                class="text-xs italic text-blue-500">(Optional)</p></label>
                                        <input type="email" id="regular-email" name="email"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="regular-room"
                                            class="block text-gray-700 font-semibold mb-2">Room</label>
                                        <select id="regular-room" name="room"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                            <option value="">Select a room</option>
                                            <option value="yoga">Yoga Room</option>
                                            <option value="weights">Weights Room</option>
                                            <option value="cardio">Cardio Room</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="regular-date"
                                            class="block text-gray-700 font-semibold mb-2">Date</label>
                                        <input type="date" id="regular-date" name="date"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="regular-time"
                                            class="block text-gray-700 font-semibold mb-2">Time</label>
                                        <input type="time" id="regular-time" name="time"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                            required>
                                    </div>
                                    <button type="submit"
                                        class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Reserve</button>
                                </form>
                            </div>

                            <!-- Premium User Form -->
                            <div x-show="userType === 'premium'" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-y-4"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform translate-y-4" class="mt-6">
                                <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-6 rounded-lg shadow-lg">
                                    @if (Auth::user())
                                    <form>
                                        <div class="mb-4">
                                            <label for="premium-room"
                                                class="block text-white font-semibold mb-2">Room</label>
                                            <select id="premium-room" name="room"
                                                class="w-full px-3 py-2 border border-purple-300 rounded-md focus:outline-none text-white focus:text-black  bg-white bg-opacity-20  placeholder-white::placeholder"
                                                required>
                                                <option value="">Select a room</option>
                                                <option value="yoga">Yoga Room</option>
                                                <option value="weights">Weights Room</option>
                                                <option value="cardio">Cardio Room</option>
                                                <option value="spa">Spa Room</option>
                                                <option value="pool">Pool</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="premium-date"
                                                class="block text-white font-semibold mb-2">Date</label>
                                            <input type="date" id="premium-date" name="date"
                                                class="w-full px-3 py-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white bg-opacity-20 text-white"
                                                required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="premium-time"
                                                class="block text-white font-semibold mb-2">Time</label>
                                            <input type="time" id="premium-time" name="time"
                                                class="w-full px-3 py-2 border border-purple-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white bg-opacity-20 text-white"
                                                required>
                                        </div>
                                        <button type="submit"
                                            class="w-full bg-white text-purple-600 py-2 px-4 rounded-md hover:bg-purple-100 transition duration-300 ease-in-out font-semibold">Reserve
                                            Now</button>
                                    </form>
                                    @else
                                    <div class="uppercase text-center text-xl font-extrabold text-white">
                                        <h1>You need to log in first 🤪</h1>
                                    </div>
                                    @endif
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
</x-guest-layout>