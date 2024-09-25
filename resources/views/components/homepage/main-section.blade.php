<section class="relative min-h-screen w-full  dark:border-white/10 dark:text-tint_1 text-shade_9">
    <div class="inset-0 flex flex-col items-center justify-center px-4 pt-40 text-center">
        <div>
            <h1 class="text-tint_1 text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl">
                Elevate Your Fitness Journey
            </h1>
            <p class="text-tint_1 max-w-[900px] md:text-xl lg:text-base xl:text-xl">
                Our gym reservation system makes it easy to book your sessions, manage your membership, and
                stay on top of your fitness goals.
            </p>
        </div>
        <div class="container px-4 md:px-6 m-auto">
            <div class="mx-auto grid max-w-5xl gap-6 pt-10 pb-6 lg:grid-cols-3 lg:gap-12">
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2 group transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        viewBox="0 0 48 48" id="In-Home-Mode--Streamline-Outlined----Material-Symbols">
                        <path class="text-main" fill="currentColor"
                            d="M8 40.0002V20.0002L3.8 23.2002L2 20.8002L24 3.9502L46 20.8002L44.2 23.2002L24 7.7502L11 17.7002V37.0002H20.6V40.0002H8ZM30.55 44.0002L22.8 36.2502L24.9 34.1002L30.55 39.8002L41.9 28.5002L44 30.6002L30.55 44.0002Z"
                            stroke-width="1"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Easy Booking</h3>
                    <p class="text-tint_1">Reserve your spot in your favorite classes with just a few clicks.</p>
                </div>
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-calendar-check" viewBox="0 0 16 16">
                        <path
                            d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"
                            class="text-main " fill="currentColor" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"
                            class="text-main " fill="currentColor" />
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Class Schedules</h3>
                    <p class="text-tint_1">Stay up-to-date with the latest class schedules and availability.</p>
                </div>
                <div
                    class="glass flex flex-col items-center space-y-4 text-center border-main px-6 py-5 rounded-2xl border-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"
                            class="text-main " fill="currentColor" />
                    </svg>
                    <h3 class="text-xl font-bold text-tint_1 dark:text-tint_6">Member Management</h3>
                    <p class="text-tint_1">Easily manage your membership details and billing information.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center space-x-2 my-5">
        <x-custom.primary-button class="dark:hover:text-white" type="button"
            onclick="window.location.href = '{{ route('ticket.show') }}'">
            Book Now
        </x-custom.primary-button>
        <x-custom.primary-button type="button" onclick="window.location.href = '#equipment-section'"
            :active="request()->routeIs('reservation')"
            class="px-20 space-x-1 border border-main/20 text-white dark:hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                <path fill-rule="evenodd"
                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
            </svg>
            <p>Learn More</p>
        </x-custom.primary-button>
    </div>
</section>

<section x-data="{ currentImage: '/images/public/background-1.jpg', selectedButton: 1 }"
    class="flex flex-col md:flex-row items-center justify-center p-8 bg-white text-textblack dark:bg-black dark:text-textwhite">

    <div class="w-full md:w-1/1 xl:w-1/2 p-4">
        <img :src="currentImage" alt="Gym" class="sm:w-lg lg:w-full h-auto rounded-md" />
    </div>

    <div class="w-full md:w-1/2 p-4 space-y-8">
        <button @click="currentImage = '/images/public/background-1.jpg'; selectedButton = 1"
            :class="{'border-l-4 border-black dark:border-white': selectedButton === 1}" class="text-left w-full  p-4">
            <h2 class="sm:text-lg md:text-1xl lg:text-3xl xl:text-5xl font-bold">Personal Training</h2>
            <p class="sm:text-sm md:text-xl xl:text-2xl">Get personalized training sessions with our expert trainers.
            </p>
        </button>

        <button @click="currentImage = '/images/public/background-2.jpg'; selectedButton = 2"
            :class="{'border-l-4 border-black dark:border-white': selectedButton === 2}" class="text-left w-full p-4 ">
            <h2 class="sm:text-lg md:text-1xl lg:text-3xl xl:text-5xl font-bold">Group Classes</h2>
            <p class="sm:text-sm md:text-xl xl:text-2xl">Join our group classes and stay motivated with others.</p>
        </button>



        <button @click="currentImage = '/images/public/background-3.jpg'; selectedButton = 3"
            :class="{'border-l-4 border-black dark:border-white': selectedButton === 3}" class="text-left w-full  p-4">
            <h2 class="sm:text-lg md:text-1xl lg:text-3xl xl:text-5xl font-bold">State-of-the-Art Equipment</h2>
            <p class="sm:text-sm md:text-xl xl:text-2xl">Access the latest and best equipment for your workouts.</p>
        </button>
    </div>
</section>