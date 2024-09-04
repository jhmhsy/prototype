<main class="flex-1 pt-10">
    <section class="w-full h-[80vh] bg-white dark:bg-darkmode_light text-textblack dark:text-textwhite">
        <div class="inset-0 bg-gradient-to-t from-gray-800/80 to-gray-800/0"></div>
        <div class="inset-0 flex flex-col items-center justify-center px-4 pt-40 text-center">
            <h1 class="text-4xl font-bold tracking-tighter sm:text-5xl md:text-6xl">
                Elevate Your Fitness Journey With our Fitness System
            </h1>
            <div class="container px-4 md:px-6">
                <div class="flex flex-col items-center justify-center space-y-4 text-center">
                    <div class="space-y-2">

                        <x-input-p class="max-w-[900px] md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                            Our gym reservation system makes it easy to book your sessions, manage your membership,
                            and stay on top of your fitness goals.
                        </x-input-p>
                    </div>
                </div>
                <div class="mx-auto grid max-w-5xl items-center gap-6 py-12 lg:grid-cols-2 lg:gap-12">
                    <div class="flex flex-col justify-center space-y-4">
                        <div class="grid gap-1">
                            <h3 class="text-xl font-bold">Easy Booking</h3>
                            <x-input-p>
                                Reserve your spot in your favorite classes with just a few clicks.
                            </x-input-p>
                        </div>
                        <div class="grid gap-1">
                            <h3 class="text-xl font-bold">Class Schedules</h3>
                            <x-input-p>Stay up-to-date with the latest class schedules and availability.</x-input-p>
                        </div>
                        <div class="grid gap-1">
                            <h3 class="text-xl font-bold">Member Management</h3>
                            <x-input-p>Easily manage your membership details and billing information.</x-input-p>
                        </div>
                    </div>
                    <img src="/placeholder.svg" width="550" height="310" alt="Gym Features"
                        class="mx-auto aspect-video overflow-hidden rounded-xl object-cover object-center sm:w-full lg:order-last" />
                </div>
            </div>
        </div>
    </section>


    <section class="w-full py-12 md:py-24 lg:py-32 bg-gray-200 dark:bg-black text-black dark:text-textwhite">
        <div class="container grid items-center justify-center gap-4 px-4 text-center md:px-6">
            <div class="space-y-3">
                <h2 class="text-3xl font-bold tracking-tighter md:text-4xl/tight">
                    Join Our Vibrant Community
                </h2>
                <x-input-p class="mx-auto max-w-[600px] md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                    Connect with like-minded individuals, attend exclusive events, and take your fitness to new
                    heights.
                </x-input-p>
            </div>
            <div class="mx-auto w-full max-w-sm space-y-2">
                <form class="flex gap-2">
                    <x-text-input class="h-10 w-full rounded-md px-3 py-2 text-sm" placeholder="Enter your email"
                        type="email" />
                    <button
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-300 disabled:pointer-events-none disabled:opacity-50 bg-blue-500 text-white hover:bg-blue-600 h-10 px-4 py-2"
                        type="submit">
                        Join Now
                    </button>
                </form>
                <x-input-p class="text-xs">
                    Sign up to get notified about our latest updates and promotions.
                </x-input-p>
            </div>
        </div>
    </section>
</main>