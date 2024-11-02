<div class=" items-center w-full py-12 md:py-24 lg:py-32 text-center relative">
    <div class=" grid items-center justify-center gap-4 px-4 text-center md:px-6 m-auto">
        <section
            class="relative w-full px-4 sm:px-10 flex flex-col items-center justify-center sm:justify-between dark:bg-night_1 gap-5">
            <div class="w-full grid grid-cols-2 items-center justify-center px-4 sm:px-15 py-10 sm:py-0 space-y-3">
                <div class="md:text-left space-y-3 z-10 ">
                    <div class="flex gap-2">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter text-left">
                            GYM ONE
                        </h1>
                        <p>BEST FOR LESS</p>
                    </div>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl tracking-tighter">Begin now or never!</h2>
                    <x-custom.paragraph :dark="true"
                        class="max-w-full sm:max-w-[900px] sm:text-xl md:text-lg lg:text-xl">
                        Top-notch Equipments Combined with Affordable Prices
                    </x-custom.paragraph>

                </div>
                <div class=" h-[100%]"> </div>
            </div>
            <div class="flex items-center justify-center mt-1 px-4">
                <video class="w-[70%]" controls>
                    <source src="{{ asset('videos/promo-clip.mp4') }}" type="video/mp4">
                    <p>Your browser does not support the video tag. Please try another browser.</p>
                    <a href="{{ asset('videos/promo-clip.mp4') }}">Download the video</a>
                </video>
            </div>
        </section>
    </div>
</div>
<div class=" items-center w-full py-12 md:py-24 lg:py-32 text-center relative">
    <div class=" grid items-center justify-center gap-4 px-4 text-center md:px-6 m-auto">
        <section
            class="relative w-full px-4 sm:px-10 flex flex-col items-center justify-center sm:justify-between dark:bg-night_1 gap-15">
            <div class="grid grid-cols-2 gap-5 w-[70%] ">
                <div class="w-full  flex flex-col p-5">
                    <h1 class="text-3xl text-left">Lorem Ipsum</h1>
                    <h3 class=" text-left">eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                        adipisci
                        velit.</h3>
                    <h1 class="text-3xl text-left">Ipsum Lorem</h1>
                </div>

                <div class="w-full flex items-center justify-center">
                    <!-- First Layer with Background Image -->
                    <div class="w-full flex items-center justify-center">
                        <!-- First Layer -->
                        <div class="w-[70%] h-[356px] border border-white relative overflow-visible">
                            <img src="/images/public/person_1.jpg" alt="Person 1" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>