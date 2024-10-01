<section x-data="{ currentImage: '/images/public/background-1.jpg', selectedButton: 1 }"
    class="relative min-h-screen w-full flex flex-col md:flex-row items-center justify-center px-4 text-textblack dark:text-textwhite py-10 bg-black bg-opacity-50"> 
    <!-- Content wrapper -->
    <div class="relative w-full flex flex-col md:flex-row items-center justify-center">
        <div class="w-full md:w-2/5 xs:p-3">
            <img :src="currentImage" alt="Gym" class="w-full h-auto rounded-md" />
        </div>
        <div class="w-full md:w-2/5 px-2 md:px-4 space-y-1 md:space-y-2">
            <button @click="currentImage = '/images/public/background-1.jpg'; selectedButton = 1"
                :class="{ 'border-l-4 border-main': selectedButton === 1 }"
                class="text-left w-full px-2 py-1 md:px-4 md:py-2">
                <div
                    class="glass flex flex-col justify-start space-y-1 border-main px-6 py-5 rounded-2xl border-2 group transition-colors duration-300">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            viewBox="0 0 48 48" id="In-Home-Mode--Streamline-Outlined----Material-Symbols">
                            <path class="text-main" fill="currentColor"
                                d="M8 40.0002V20.0002L3.8 23.2002L2 20.8002L24 3.9502L46 20.8002L44.2 23.2002L24 7.7502L11 17.7002V37.0002H20.6V40.0002H8ZM30.55 44.0002L22.8 36.2502L24.9 34.1002L30.55 39.8002L41.9 28.5002L44 30.6002L30.55 44.0002Z"
                                stroke-width="1"></path>
                        </svg>
                        <x-custom.mini-header>Easy Booking</x-custom.mini-header>
                    </div>
                    <p class="text-tint_1">Reserve your spot in your favorite classes with just a few
                        clicks.</p>
                </div>
            </button>
            <button @click="currentImage = '/images/public/background-2.jpg'; selectedButton = 2"
                :class="{ 'border-l-4 border-main': selectedButton === 2 }"
                class="text-left w-full px-2 py-1 md:px-4 md:py-2">
                <div
                    class="glass flex flex-col justify-start space-y-1 border-main px-6 py-5 rounded-2xl border-2 group transition-colors duration-300">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path
                                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"
                                class="text-main " fill="currentColor" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"
                                class="text-main " fill="currentColor" />
                        </svg>
                        <x-custom.mini-header>Class Schedules</x-custom.mini-header>
                    </div>
                    <p class="text-tint_1" >Stay up-to-date with the latest class schedules and
                        availability.</p>
                </div>
            </button>
            <button @click="currentImage = '/images/public/background-3.jpg'; selectedButton = 3"
                :class="{ 'border-l-4 border-main': selectedButton === 3 }"
                class="text-left w-full px-2 py-1 md:px-4 md:py-2">
                <div
                    class="glass flex flex-col justify-start space-y-1 border-main px-6 py-5 rounded-2xl border-2 group transition-colors duration-300">
                    <div class="flex space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-people" viewBox="0 0 16 16">
                            <path
                                d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"
                                class="text-main " fill="currentColor" />
                        </svg>
                        <x-custom.mini-header>Member Management</x-custom.mini-header>
                    </div>
                    <p class="text-tint_1" >Easily manage your membership details and billing
                        information.</p>
                </div>
            </button>
        </div>
    </div>
</section>