<x-guest-layout>
    <x-custom.loader2 />
    <div class="bg-tint_1 dark:bg-shade_7 text-foreground">
        <header>
            <x-homepage.header-section />
        </header>
        <div class="pt-15 px-15 sm:px-10 xs:px-5">
            <div class="flex items-center">
                <x-forms.nav-link href="{{ route('welcome') }}/#equipment-section"
                    class="text-sm font-medium hover:underline underline-offset-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="h-5 w-5">
                        <path d="m12 19-7-7 7-7"></path>
                        <path d="M19 12H5"></path>
                    </svg>
                </x-forms.nav-link>
                <h2 class="inline-block rounded-lg bg-muted px-3 text-xl py-1 font-medium">Features</h2>
            </div>
            <div class="py-10 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach (['Acme Portable Blender', 'Acme Camping Stove', 'Acme Hiking Boots', 'Acme Camping Tent', 'Acme Water Filter'] as $item)
                            <x-custom.equipment-card
                                class="flex flex-col justify-between rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden h-full">
                                <div class="p-6 md:p-0">
                                    <h3 class="text-xl font-semibold mb-2">{{ $item }}</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </x-custom.equipment-card>
                        @endforeach

                        <div
                            class="col-span-1 sm:col-span-2 rounded-xl shadow-lg overflow-hidden flex flex-col justify-between h-full bg-cover bg-center"
                            style="background-image: url('https://t4.ftcdn.net/jpg/01/79/81/77/360_F_179817756_QzTocli57q9G6a1Oe7kJtoMS5dNMU8cl.jpg');">
                            <div class="p-8 bg-gradient-to-br from-blue-500/60 to-purple-600/60 h-full flex flex-col justify-center">
                                <h2 class="text-3xl font-bold mb-4 text-white drop-shadow-md">Essential Equipment for a Complete Workout</h2>
                                <p class="text-lg text-white drop-shadow">
                                    Whether you're looking to blend your favorite post-workout smoothie or ensure proper
                                    hydration during your session, having the right equipment can make all the
                                    difference. Our selection of gym essentials, from portable blenders to water filters
                                    and solar chargers, ensures you're fully equipped to stay energized, focused, and
                                    ready for every workout.
                                </p>
                            </div>
                        </div>

                        <x-custom.equipment-card
                            class="flex flex-col justify-between rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden h-full">
                            <div class="p-6 md:p-0">
                                <h3 class="text-xl font-semibold mb-2">Acme Solar Charger</h3>
                                <p>
                                    Keep your devices powered up off the grid with this efficient solar charging panel.
                                </p>
                            </div>
                        </x-custom.equipment-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>