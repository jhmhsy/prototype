<section class="relative min-h-screen w-full dark:border-white/10 px-10 bg-gradient-to-br dark:from-shade_9 dark:via-main dark:to-tint_1 from-tint_1 via-main to-shade_9">
    <div class="inset-0 flex flex-col sm:flex-row items-center justify-between px-15 pt-40 pb-15">
        <div class="text-white">
            <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl">
                Elevate Your Fitness Journey
            </h1>
            <x-custom.paragraph :dark="true" class="max-w-[900px] md:text-xl lg:text-base xl:text-xl">
                Our gym reservation system makes it easy to book your sessions, manage your membership, and
                stay on top of your fitness goals.
            </x-custom.paragraph>
            <div class="flex justify-start space-x-2 my-5">
                <x-custom.primary-button type="button"
                    onclick="window.location.href = '{{ route('ticket.show') }}'">
                    Book Now
                </x-custom.primary-button>
                <x-custom.primary-button type="button" onclick="window.location.href = '#equipment-section'"
                    :active="request()->routeIs('reservation')" class="px-20 space-x-1 border">
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
        </div>
        <div class="container px-4 md:px-6 m-auto">
            <img class="rounded-xl"
                src="https://img.freepik.com/free-photo/low-angle-view-unrecognizable-muscular-build-man-preparing-lifting-barbell-health-club_637285-2497.jpg?t=st=1727743360~exp=1727746960~hmac=7e0bf7885ab8fcd6befaf8eea6232011cdfce301515c9d57d0ca7bd5c9ade0b1&w=740"
                alt="man-with-barbel">
        </div>
    </div>
</section>