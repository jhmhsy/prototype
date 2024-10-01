<x-guest-layout>
    <div>
        <header>
            <x-homepage.header-section />
        </header>
        <div class="flex items-center justify-center min-h-screen bg-tint_1 dark:bg-shade_9 pt-20 px-4 sm:px-6 lg:px-8">
            <div x-data="{ userType: null }" class="w-full max-w-md mb-3">
                <div class="bg-tint_3 dark:bg-tint_9 shadow-md rounded-lg overflow-hidden">
                    <div class="pt-6 px-6">
                        <h2 class="text-2xl font-bold text-center mb-6">Gym Reservation</h2>
                        <x-forms.reserve></x-forms.reserve>
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