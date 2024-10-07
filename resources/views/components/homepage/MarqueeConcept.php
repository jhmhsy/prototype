<div
    class="w-full sm:px-4 md:px-6 lg:px-8 py-8 md:py-10 lg:py-10 bg-gradient-to-bl from-tint_1 via-tint_5 to-main dark:from-shade_5 dark:via-shade_8 dark:to-main ">
    <section class="px-5 sm:px-6 md:px-8 overflow-hidden ">
        <div class="flex items-center justify-between mb-6 md:mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-tint_1">Gym Equipment</h2>
            <a href="{{ route('features') }}"
                class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-300 hover:underline underline-offset-4">
                View all
            </a>
            <div id="size-indicator" class="size-indicator  text-black  font-bold">
                Current Size: <h1 id="breakpoint">Loading...</h1>
            </div>
        </div>


        <div class="relative w-full h-[30vh] ">
            <div
                class="xss:w-[800%] xs:w-[600%] sm:w-[500%] md:w-[400%] lg:w-[300%] xl:w-[200%] grid grid-cols-10 gap-6 animate-marquee">
                <div style="border-radius: 40% 60% 30% 70% / 70% 40% 60% 30%"
                    class="xs:p-4 hover:-translate-y-6 bg-muted p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="w-12 h-12 mb-4 text-blue-500"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main">
                        <path d="M14.4 14.4 9.6 9.6" class=" transition-colors duration-300"></path>
                        <path
                            d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"
                            class=" transition-colors duration-300"></path>
                        <path d="m21.5 21.5-1.4-1.4" class=" transition-colors duration-300"></path>
                        <path d="M3.9 3.9 2.5 2.5" class=" transition-colors duration-300"></path>
                        <path
                            d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z"
                            class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Weights</h3>
                    <h2 class="text-shade_8 text-muted-foreground text-sm ">Variety of
                        dumbbells and barbells
                        for strength training.</h2>
                </div>

                <div style="border-radius: 45% 55% 35% 65% / 65% 45% 55% 35%"
                    class="hover:-translate-y-6 bg-muted p-4 xs:p-0 md:p-2 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-12 h-12 mb-4 text-green-500"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <line x1="10" x2="14" y1="2" y2="2" class=" transition-colors duration-300"></line>
                        <line x1="12" x2="15" y1="14" y2="11" class=" transition-colors duration-300"></line>
                        <circle cx="12" cy="14" r="8" class=" transition-colors duration-300">
                        </circle>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Cardio
                        Equipment</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Treadmills,
                        ellipticals, and
                        stationary
                        bikes
                        for
                        cardio.</h2>
                </div>
                <div style="border-radius: 70% 30% 60% 40% / 40% 70% 30% 60%"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-4 text-purple-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">
                        Stretching Area</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Dedicated space
                        for yoga,
                        Pilates, and other
                        stretching.</h2>
                </div>
                <div style="border-radius: 59% 41% 60% 40% / 64% 66% 34% 36%;"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg fill="currentColor" height="50" width="50" class="w-12 h-12 mb-4 text-red-500" version="1.1"
                        id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 297.001 297.001" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M236.111,160.088c-12.577-12.577-29.95-18.736-47.428-17.065l74.944-74.944c8.778,3.376,19.127,1.532,26.197-5.539 c9.568-9.569,9.568-25.138,0-34.706L269.165,7.175c-9.569-9.567-25.137-9.566-34.706,0.001c-4.635,4.635-7.188,10.798-7.188,17.353 c0,3.077,0.563,6.067,1.639,8.853l-80.41,80.41l-80.419-80.42c3.377-8.78,1.531-19.127-5.539-26.197 c-9.569-9.569-25.137-9.567-34.706,0L7.176,27.834c-9.568,9.568-9.568,25.137,0.001,34.707c7.069,7.069,17.417,8.914,26.196,5.538 l74.944,74.943c-17.482-1.674-34.851,4.487-47.428,17.066L7.22,213.758c-9.626,9.626-9.626,25.29,0,34.916l41.107,41.107 c4.814,4.813,11.136,7.22,17.458,7.22c6.322,0,12.644-2.407,17.458-7.22l53.669-53.67c4.844-4.844,8.735-10.4,11.595-16.398 c2.858,5.997,6.738,11.555,11.581,16.398l53.669,53.669c4.814,4.813,11.136,7.22,17.458,7.22s12.644-2.407,17.458-7.22 l41.107-41.107c9.626-9.626,9.626-25.29,0-34.916L236.111,160.088z M34.859,45.584c-2.635,0-5.161,1.047-7.025,2.909 c-1.82,1.822-4.786,1.823-6.609,0.001c-1.822-1.823-1.823-4.788,0-6.61l20.658-20.658c1.822-1.822,4.787-1.821,6.609-0.001 c1.822,1.823,1.823,4.788,0,6.61c-3.879,3.879-3.879,10.17,0,14.049l85.958,85.958l-6.609,6.609L41.884,48.493 C40.02,46.63,37.494,45.584,34.859,45.584z M134.611,168.998c-2.349,2.349-3.368,5.716-2.716,8.973l1.718,8.587 c2.582,12.917-1.436,26.189-10.75,35.503l-53.669,53.67c-1.88,1.88-4.938,1.88-6.818,0l-41.107-41.107 c-1.88-1.88-1.88-4.939,0-6.818l53.669-53.669c7.455-7.456,17.444-11.518,27.76-11.518c2.572,0,5.166,0.253,7.743,0.768l8.588,1.717 c3.258,0.653,6.624-0.368,8.972-2.716L248.507,41.883c3.879-3.879,3.879-10.17,0-14.049c-1.822-1.822-1.822-4.786,0-6.608 c1.822-1.824,4.787-1.823,6.609-0.001l20.658,20.658c1.823,1.822,1.822,4.787,0.001,6.609c-1.824,1.822-4.788,1.822-6.61,0 c-1.864-1.863-4.39-2.909-7.025-2.909c-2.635,0-5.161,1.047-7.025,2.909L134.611,168.998z M275.732,234.624l-41.107,41.107 c-1.88,1.88-4.938,1.88-6.818,0l-53.669-53.669c-9.314-9.314-13.332-22.586-10.75-35.502l1.718-8.588 c0.637-3.183-0.331-6.464-2.567-8.804l6.629-6.629c2.341,2.235,5.621,3.204,8.804,2.567l8.588-1.718h-0.001 c12.916-2.579,26.189,1.436,35.503,10.75l53.669,53.669C277.612,229.686,277.612,232.744,275.732,234.624z">
                            </path>
                        </g>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Rowing
                        Machines</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">High-intensity
                        rowing machines
                        for a
                        full-body
                        workout.</h2>
                </div>
                <div style="border-radius: 44% 56% 52% 48% / 70% 54% 46% 30%; width: 100%;"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-12 h-12 mb-4 text-yellow-500">
                        <path d="m4 4 2.5 2.5" class=" transition-colors duration-300"></path>
                        <path d="M13.5 6.5a4.95 4.95 0 0 0-7 7" class=" transition-colors duration-300"></path>
                        <path d="M15 5 5 15" class=" transition-colors duration-300"></path>
                        <path d="M14 17v.01" class=" transition-colors duration-300"></path>
                        <path d="M10 16v.01" class=" transition-colors duration-300"></path>
                        <path d="M13 13v.01" class=" transition-colors duration-300"></path>
                        <path d="M16 10v.01" class=" transition-colors duration-300"></path>
                        <path d="M11 20v.01" class=" transition-colors duration-300"></path>
                        <path d="M17 14v.01" class=" transition-colors duration-300"></path>
                        <path d="M20 11v.01" class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Locker Rooms</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Spacious
                        locker rooms with showers
                        and changing areas.</h2>
                </div>
                <div style="border-radius: 40% 60% 30% 70% / 70% 40% 60% 30%"
                    class="xs:p-4 hover:-translate-y-6 bg-muted p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="w-12 h-12 mb-4 text-blue-500"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main">
                        <path d="M14.4 14.4 9.6 9.6" class=" transition-colors duration-300"></path>
                        <path
                            d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"
                            class=" transition-colors duration-300"></path>
                        <path d="m21.5 21.5-1.4-1.4" class=" transition-colors duration-300"></path>
                        <path d="M3.9 3.9 2.5 2.5" class=" transition-colors duration-300"></path>
                        <path
                            d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z"
                            class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Weights</h3>
                    <h2 class="text-shade_8 text-muted-foreground text-sm ">Variety of
                        dumbbells and barbells
                        for strength training.</h2>
                </div>

                <div style="border-radius: 45% 55% 35% 65% / 65% 45% 55% 35%"
                    class="hover:-translate-y-6 bg-muted p-4 xs:p-0 md:p-2 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-12 h-12 mb-4 text-green-500"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-10 h-10 mb-4 group-hover:text-main text-shade_9 ">
                        <line x1="10" x2="14" y1="2" y2="2" class=" transition-colors duration-300"></line>
                        <line x1="12" x2="15" y1="14" y2="11" class=" transition-colors duration-300"></line>
                        <circle cx="12" cy="14" r="8" class=" transition-colors duration-300">
                        </circle>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Cardio
                        Equipment</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Treadmills,
                        ellipticals, and
                        stationary
                        bikes
                        for
                        cardio.</h2>
                </div>
                <div style="border-radius: 70% 30% 60% 40% / 40% 70% 30% 60%"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-4 text-purple-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">
                        Stretching Area</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Dedicated space
                        for yoga,
                        Pilates, and other
                        stretching.</h2>
                </div>
                <div style="border-radius: 59% 41% 60% 40% / 64% 66% 34% 36%;"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg fill="currentColor" height="50" width="50" class="w-12 h-12 mb-4 text-red-500" version="1.1"
                        id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 297.001 297.001" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M236.111,160.088c-12.577-12.577-29.95-18.736-47.428-17.065l74.944-74.944c8.778,3.376,19.127,1.532,26.197-5.539 c9.568-9.569,9.568-25.138,0-34.706L269.165,7.175c-9.569-9.567-25.137-9.566-34.706,0.001c-4.635,4.635-7.188,10.798-7.188,17.353 c0,3.077,0.563,6.067,1.639,8.853l-80.41,80.41l-80.419-80.42c3.377-8.78,1.531-19.127-5.539-26.197 c-9.569-9.569-25.137-9.567-34.706,0L7.176,27.834c-9.568,9.568-9.568,25.137,0.001,34.707c7.069,7.069,17.417,8.914,26.196,5.538 l74.944,74.943c-17.482-1.674-34.851,4.487-47.428,17.066L7.22,213.758c-9.626,9.626-9.626,25.29,0,34.916l41.107,41.107 c4.814,4.813,11.136,7.22,17.458,7.22c6.322,0,12.644-2.407,17.458-7.22l53.669-53.67c4.844-4.844,8.735-10.4,11.595-16.398 c2.858,5.997,6.738,11.555,11.581,16.398l53.669,53.669c4.814,4.813,11.136,7.22,17.458,7.22s12.644-2.407,17.458-7.22 l41.107-41.107c9.626-9.626,9.626-25.29,0-34.916L236.111,160.088z M34.859,45.584c-2.635,0-5.161,1.047-7.025,2.909 c-1.82,1.822-4.786,1.823-6.609,0.001c-1.822-1.823-1.823-4.788,0-6.61l20.658-20.658c1.822-1.822,4.787-1.821,6.609-0.001 c1.822,1.823,1.823,4.788,0,6.61c-3.879,3.879-3.879,10.17,0,14.049l85.958,85.958l-6.609,6.609L41.884,48.493 C40.02,46.63,37.494,45.584,34.859,45.584z M134.611,168.998c-2.349,2.349-3.368,5.716-2.716,8.973l1.718,8.587 c2.582,12.917-1.436,26.189-10.75,35.503l-53.669,53.67c-1.88,1.88-4.938,1.88-6.818,0l-41.107-41.107 c-1.88-1.88-1.88-4.939,0-6.818l53.669-53.669c7.455-7.456,17.444-11.518,27.76-11.518c2.572,0,5.166,0.253,7.743,0.768l8.588,1.717 c3.258,0.653,6.624-0.368,8.972-2.716L248.507,41.883c3.879-3.879,3.879-10.17,0-14.049c-1.822-1.822-1.822-4.786,0-6.608 c1.822-1.824,4.787-1.823,6.609-0.001l20.658,20.658c1.823,1.822,1.822,4.787,0.001,6.609c-1.824,1.822-4.788,1.822-6.61,0 c-1.864-1.863-4.39-2.909-7.025-2.909c-2.635,0-5.161,1.047-7.025,2.909L134.611,168.998z M275.732,234.624l-41.107,41.107 c-1.88,1.88-4.938,1.88-6.818,0l-53.669-53.669c-9.314-9.314-13.332-22.586-10.75-35.502l1.718-8.588 c0.637-3.183-0.331-6.464-2.567-8.804l6.629-6.629c2.341,2.235,5.621,3.204,8.804,2.567l8.588-1.718h-0.001 c12.916-2.579,26.189,1.436,35.503,10.75l53.669,53.669C277.612,229.686,277.612,232.744,275.732,234.624z">
                            </path>
                        </g>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Rowing
                        Machines</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">High-intensity
                        rowing machines
                        for a
                        full-body
                        workout.</h2>
                </div>
                <div style="border-radius: 44% 56% 52% 48% / 70% 54% 46% 30%; width: 100%;"
                    class="hover:-translate-y-6 bg-muted rounded-lg p-4 md:p-6 flex flex-col items-center text-center bg-primary dark:bg-tint_5 dark:text-shade_9 group transition-all duration-300 ease-in-out border/white-10 border border-main">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-12 h-12 mb-4 text-yellow-500">
                        <path d="m4 4 2.5 2.5" class=" transition-colors duration-300"></path>
                        <path d="M13.5 6.5a4.95 4.95 0 0 0-7 7" class=" transition-colors duration-300"></path>
                        <path d="M15 5 5 15" class=" transition-colors duration-300"></path>
                        <path d="M14 17v.01" class=" transition-colors duration-300"></path>
                        <path d="M10 16v.01" class=" transition-colors duration-300"></path>
                        <path d="M13 13v.01" class=" transition-colors duration-300"></path>
                        <path d="M16 10v.01" class=" transition-colors duration-300"></path>
                        <path d="M11 20v.01" class=" transition-colors duration-300"></path>
                        <path d="M17 14v.01" class=" transition-colors duration-300"></path>
                        <path d="M20 11v.01" class=" transition-colors duration-300"></path>
                    </svg>
                    <h3 class="text-lg font-medium mb-2 transition-colors duration-300">Locker Rooms</h3>
                    <h2 class="text-muted-foreground text-sm text-shade_8">Spacious
                        locker rooms with showers
                        and changing areas.</h2>
                </div>

            </div>
        </div>
    </section>
</div>

<style>
@keyframes marquee {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-50%);
    }
}

.animate-marquee {
    animation: marquee 30s linear infinite;
}
</style>