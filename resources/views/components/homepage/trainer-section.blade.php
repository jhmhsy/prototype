<div class="py-12 md:py-24 lg:py-32 bg-white dark:bg-night_3">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl text-center mb-16">Our Trainers</h1>

        <div class="flex flex-col md:flex-row items-center gap-8">

            <div class="relative w-full md:w-1/2 h-[300px]">
                <div class="absolute inset-0 bg-lemon_base"
                    style="clip-path: polygon(0 -30%, 100% -30%, 80% 100%, 0% 100%)">
                    <div class="absolute w-[60%] h-[150%] top-[-40%]">
                        <img src="{{ asset('images/public/trainer_1.png') }}" alt="Trainer"
                            class="object-cover w-full h-full">
                    </div>
                </div>
            </div>

            {{-- Right side content --}}
            <div class="w-full md:w-1/2 p-10 flex flex-col gap-5">
                <div>
                    <h2 class="text-xl">Dumb? Worry no more</h2>
                    <h1 class="text-4xl font-bold">Book a Session with a Private Trainer</h1>
                    <p>#Zero2Hero</p>
                </div>
                <div>
                    <button class="p-2 rounded-lg border border-gray-500 hover:border-lemon_base">
                        Schedule Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.polygon-1-wrapper {
    width: 100%;
    max-width: 500px;
    height: 300px;
    overflow: visible;
}

.polygon-1 {
    width: 100%;
    height: 300px;
    clip-path: polygon(0 -30%, 100% -30%, 80% 100%, 0% 100%);
    position: relative;
    z-index: 10;
}

.polygon-2 {
    width: 100%;
    max-width: 500px;
    height: 300px;
    z-index: 10;
}
</style>