<section
    class="relative min-h-screen w-full dark:border-white/10 px-4 sm:px-10 bg-gradient-to-br dark:from-shade_9 dark:via-main dark:to-tint_1 from-tint_1 via-main to-shade_9 flex items-center justify-center sm:justify-between">
    <div
        class="w-full mt-13 flex flex-col md:flex-row items-center justify-center px-4 sm:px-15 py-10 sm:py-0 space-y-3">
        <div class="text-white text-center md:text-left space-y-3">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter">
                Elevate Your Fitness Journey
            </h1>
            <x-custom.paragraph :dark="true"
                class="max-w-full sm:max-w-[900px] text-base sm:text-xl md:text-lg lg:text-xl">
                Our gym reservation system makes it easy to book your sessions, manage your membership, and
                stay on top of your fitness goals.
            </x-custom.paragraph>
            <div class="items-center">
                <div class="flex flex-col md:flex-row items-center gap-2 ">
                    <x-custom.secondary-button type="button" onclick="window.location.href = '{{ route('ticket.show') }}'"
                    class="w-auto h-10 px-4 py-2 border">
                    Book Now
                </x-custom.secondary-button>
                <x-custom.secondary-button type="button" onclick="window.location.href = '#equipment-section'"
                    :active="request()->routeIs('reservation')" class="items-center w-auto h-10 px-4 py-2 space-x-1 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor"
                        class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5" />
                        <path fill-rule="evenodd"
                            d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z" />
                    </svg>
                    <p>Learn More</p>
                </x-custom.secondary-button>
                </div>
            </div>
        </div>
        <div class="container flex justify-center px-2 sm:px-4 md:px-6">
            <img class="rounded-xl w-full"
                src="https://img.freepik.com/free-photo/low-angle-view-unrecognizable-muscular-build-man-preparing-lifting-barbell-health-club_637285-2497.jpg?t=st=1727743360~exp=1727746960~hmac=7e0bf7885ab8fcd6befaf8eea6232011cdfce301515c9d57d0ca7bd5c9ade0b1&w=740"
                alt="man-with-barbel">
        </div>
    </div>
</section>
