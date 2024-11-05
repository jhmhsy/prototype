<div class="items-center w-full text-center relative">
    <section
        class="relative min-h-screen w-full px-4 sm:px-10 flex flex-col items-center justify-center dark:bg-night_1 gap-15">
        <!-- Header Section -->
        <div class="w-full mt-40 grid grid-cols-2 items-center justify-center px-4 sm:px-15 ">
            <div class="space-y-3 z-10 text-left">
                <div class="flex gap-2">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold tracking-tighter">GYM ONE</h1>
                    <div class="flex flex-col items-center justify-center h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30""
                            viewBox="0 0 48 48">
                            <linearGradient id="IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1" x1="9.858" x2="38.142"
                                y1="9.858" y2="38.142" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#9dffce"></stop>
                                <stop offset="1" stop-color="#50d18d"></stop>
                            </linearGradient>
                            <path fill="url(#IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1)"
                                d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                            <linearGradient id="IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2" x1="13" x2="36"
                                y1="24.793" y2="24.793" gradientUnits="userSpaceOnUse">
                                <stop offset=".824" stop-color="#135d36"></stop>
                                <stop offset=".931" stop-color="#125933"></stop>
                                <stop offset="1" stop-color="#11522f"></stop>
                            </linearGradient>
                            <path fill="url(#IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2)"
                                d="M21.293,32.707l-8-8c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414	c0.391-0.391,1.024-0.391,1.414,0L22,27.758l10.879-10.879c0.391-0.391,1.024-0.391,1.414,0l1.414,1.414	c0.391,0.391,0.391,1.024,0,1.414l-13,13C22.317,33.098,21.683,33.098,21.293,32.707z">
                            </path>
                        </svg>
                        <p>BEST FOR LESS</p>
                    </div>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl tracking-tighter">Begin now or never!</h2>
                <x-custom.paragraph :dark="true"
                    class="max-w-full sm:max-w-[900px] sm:text-xl md:text-lg lg:text-xl">
                    Top-notch Equipments Combined with Affordable Prices
                </x-custom.paragraph>
            </div>
            <div class="h-full"></div>
        </div>
        <!-- Video Section -->
        <div class="w-full flex items-center justify-center mt-1 px-4">
            <div class="w-full h-full flex justify-end relative">
                <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
                    <source src="{{ asset('videos/promo-clip.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Add any overlay content here if needed -->
            </div>
        </div>
    </section>
</div>
