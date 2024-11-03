<div class="items-center w-full text-center relative">
    <section
        class="relative min-h-screen w-full px-4 sm:px-10 flex flex-col items-center justify-center dark:bg-night_1 gap-15">
        <!-- Header Section -->
        <div class="w-full mt-40 grid grid-cols-2 items-center justify-center px-4 sm:px-15 ">
            <div class="space-y-3 z-10 text-left">
                <div class="flex gap-2">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter">GYM ONE</h1>
                    <p>BEST FOR LESS</p>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl tracking-tighter">Begin now or never!</h2>
                <x-custom.paragraph :dark="true" class="max-w-full sm:max-w-[900px] sm:text-xl md:text-lg lg:text-xl">
                    Top-notch Equipments Combined with Affordable Prices
                </x-custom.paragraph>
            </div>
            <div class="h-full"></div>
        </div>
        <!-- Video Section -->
        <div class="w-full flex items-center justify-center mt-1 px-4 ">
            <iframe class="w-[70%] h-[40vh] sm:h-[60vh] md:h-[70vh] lg:h-[80vh]"
                src="https://www.youtube.com/embed/4-zjQvTDnbw" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    </section>

    <div class="w-full py-12 md:py-24 lg:py-32 text-center relative">
        <section
            class="relative min-h-screen w-full px-4 sm:px-10 flex flex-col items-center justify-center dark:bg-night_1 gap-15">
            <div class="grid grid-cols-2 gap-5 w-[70%] mt-20">
                <div class="flex flex-col p-5">
                    <h1 class="text-3xl text-left">Lorem Ipsum</h1>
                    <h3 class="text-left">eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                        adipisci velit.</h3>
                    <h1 class="text-3xl text-left">Ipsum Lorem</h1>
                </div>
                <div class="flex items-center justify-center">
                    <div class="w-[70%] h-[356px] border border-white relative overflow-visible">
                        <img src="/images/public/person_1.jpg" alt="Person 1" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>