<div class="w-full mt-15 bg-tint_2 dark:bg-shade_8 text-shade_8 dark:text-tint_2">
    <div class="w-full md:px-6 lg:px-8 pt-15 grid gap-12 md:gap-16 text-textblack dark:bg-darkmode_dark dark:text-textwhite">
        <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl">
            We Provide
        </h1>
        <section>
            <div class="flex items-center justify-between mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold">Gym Equipments </h2>
                <x-forms.nav-link href="{{ route('features') }}"
                    class="text-sm font-medium hover:underline underline-offset-4">
                    View all
                </x-forms.nav-link>
            </div>

            <div class="grid max-w-6xl sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8 lg:gap-10 m-10">
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main">
                        <path d="M14.4 14.4 9.6 9.6" class=" transition-colors duration-300">
                        </path>
                        <path
                            d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"
                            class=" transition-colors duration-300">
                        </path>
                        <path d="m21.5 21.5-1.4-1.4" class=" transition-colors duration-300">
                        </path>
                        <path d="M3.9 3.9 2.5 2.5" class=" transition-colors duration-300">
                        </path>
                        <path
                            d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z"
                            class=" transition-colors duration-300">
                        </path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">
                        Weights</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Variety of dumbbells and barbells for
                        strength
                        training.</x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <line x1="10" x2="14" y1="2" y2="2"
                            class=" transition-colors duration-300"></line>
                        <line x1="12" x2="15" y1="14" y2="11"
                            class=" transition-colors duration-300"></line>
                        <circle cx="12" cy="14" r="8"
                            class=" transition-colors duration-300">
                        </circle>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Cardio
                        Equipment</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Treadmills, ellipticals, and stationary
                        bikes
                        for
                        cardio.</x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"
                            class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">
                        Stretching Area</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Dedicated space for yoga, Pilates, and other
                        stretching.</x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <rect width="18" height="18" x="3" y="3" rx="2"
                            class=" transition-colors duration-300"></rect>
                        <path d="M3 12h18" class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Rowing
                        Machines</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">High-intensity rowing machines for a
                        full-body
                        workout.</x-forms.input-p>
                </div>
            </div>
        </section>
        <section>
            <div class="flex items-center justify-between mb-6 md:mb-8">
                <h2 class="text-2xl md:text-3xl font-bold">Gym Facilities</h2>
                <x-forms.nav-link href="{{ route('features') }}"
                    class="text-sm font-medium hover:underline underline-offset-4">
                    View all
                </x-forms.nav-link>
            </div>
            <div class="grid max-w-6xl sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8 lg:gap-10 m-10">
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 "
                        class=" transition-colors duration-300">
                        <path d="m4 4 2.5 2.5" class=" transition-colors duration-300"></path>
                        <path d="M13.5 6.5a4.95 4.95 0 0 0-7 7"
                            class=" transition-colors duration-300"></path>
                        <path d="M15 5 5 15" class=" transition-colors duration-300"></path>
                        <path d="M14 17v.01" class=" transition-colors duration-300"></path>
                        <path d="M10 16v.01" class=" transition-colors duration-300"></path>
                        <path d="M13 13v.01" class=" transition-colors duration-300"></path>
                        <path d="M16 10v.01" class=" transition-colors duration-300"></path>
                        <path d="M11 20v.01" class=" transition-colors duration-300"></path>
                        <path d="M17 14v.01" class=" transition-colors duration-300"></path>
                        <path d="M20 11v.01" class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">
                        Locker Rooms</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Spacious locker rooms with showers and
                        changing
                        areas.</x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <path d="M21.66 17.67a1.08 1.08 0 0 1-.04 1.6A12 12 0 0 1 4.73 2.38a1.1 1.1 0 0 1 1.61-.04z"
                            class=" transition-colors duration-300">
                        </path>
                        <path d="M19.65 15.66A8 8 0 0 1 8.35 4.34"
                            class=" transition-colors duration-300"></path>
                        <path d="m14 10-5.5 5.5" class=" transition-colors duration-300">
                        </path>
                        <path d="M14 17.85V10H6.15" class=" transition-colors duration-300">
                        </path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Juice
                        Bar</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Refuel with a variety of healthy smoothies
                        and
                        juices.</x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <path d="M3.5 21 14 3" class=" transition-colors duration-300"></path>
                        <path d="M20.5 21 10 3" class=" transition-colors duration-300">
                        </path>
                        <path d="M15.5 21 12 15l-3.5 6"
                            class=" transition-colors duration-300"></path>
                        <path d="M2 21h20" class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Towel
                        Service</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Complimentary towel service for your workout
                        needs.
                    </x-forms.input-p>
                </div>
                <div
                    class="bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 border coolblue group transition-colors duration-300 border/white-10 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <path d="M12 20h.01" class=" transition-colors duration-300"></path>
                        <path d="M2 8.82a15 15 0 0 1 20 0"
                            class=" transition-colors duration-300"></path>
                        <path d="M5 12.859a10 10 0 0 1 14 0"
                            class=" transition-colors duration-300"></path>
                        <path d="M8.5 16.429a5 5 0 0 1 7 0"
                            class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2  transition-colors duration-300">Free
                        WiFi</h3>
                    <x-forms.input-p class="text-muted-foreground text-sm text-shade_8">Stay connected with high-speed wireless
                        internet
                        access.</x-forms.input-p>
                </div>
            </div>
        </section>

    </div>
</div>
