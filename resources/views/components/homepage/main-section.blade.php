<style>
    /* Removed keyframes and animation classes */
</style>

<section class="bg-peak-4 relative flex items-center justify-center w-full min-h-screen px-4 md:px-10 md:justify-between"
    style="background: url('images/public/background-4.webp') right 2.3rem / cover no-repeat;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div
        class="flex flex-col w-full md:w-1/2 items-center px-4 py-10 space-y-3 justify-evenly mt-13 lg:flex-row lg:py-0 relative z-10">
        <div class="text-primary z-10 space-y-3">
            <div
                class="flex flex-col md:flex-row justify-start gap-2 animate-fade-in-down animate__animated animate__fadeInDown">
                <h1 class="font-raleway tracking-wider text-4xl md:text-6xl font-bold items-center">
                    GYM ONE
                </h1>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30"
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
                            d="M21.293,32.707l-8-8c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414	c0.391-0.391,1.024-0.391,1.414,0L22,27.758l10.879-10.879c0.391-0.391,1.024-0.391,1.414,0l1.414,1.414	c0.391-0.391,0.391,1.024,0,1.414l-13,13C22.317,33.098,21.683,33.098,21.293,32.707z">
                        </path>
                    </svg>
                    <p class="font-nunito font-italic text-xs font-bold m-0">
                        BEST FOR LESS
                    </p>
                </div>
            </div>

            <p
                class="max-w-full text-base sm:text-xl md:max-w-[900px] md:text-lg lg:text-xl text-center md:text-left animate-fade-in-down animate__animated animate__fadeInDown">
                Top-notch Equipments Combined with Affordable Prices
            </p>
            <div class="gap-2 text-center md:text-left">
                @if (!Auth::user())
                    <x-custom.secondary-button type="button" onclick="window.location.href = '{{ route('register') }}'"
                        class="border font-bold animate-fade-in-down animate__animated animate__fadeInDown">
                        Register Now
                    </x-custom.secondary-button>
                @else
                    <x-custom.secondary-button type="button"
                        onclick="window.location.href = '{{ route('services.index') }}'"
                        class="border font-bold animate-fade-in-down animate__animated animate__fadeInDown">
                        My Services
                    </x-custom.secondary-button>
                    @can('system-admin')
                        <x-custom.secondary-button type="button"
                            onclick="window.location.href = '{{ route('administrator.overview') }}'"
                            class="border font-bold animate-fade-in-down animate__animated animate__fadeInDown">
                            Dashboard
                        </x-custom.secondary-button>
                    @endcan
                @endif
            </div>

        </div>
    </div>
    <script>
        // JavaScript to observe elements and add 'animate__animated' class on scroll
        document.addEventListener("DOMContentLoaded", function() {
            const animateOnScrollElements = document.querySelectorAll('.animate-fade-in-down');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add("animate__fadeInDown");
                        }, 50); // 200 milliseconds delay
                    } else {
                        setTimeout(() => {
                            entry.target.classList.remove("animate__fadeInDown");
                        }, 200); // 200 milliseconds delay
                    }
                });
            });

            animateOnScrollElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</section>
