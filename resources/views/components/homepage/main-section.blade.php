<style>
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOutLeft {
        from {
            opacity: 1;
            transform: translateX(0);
        }

        to {
            opacity: 0;
            transform: translateX(-20px);
        }
    }

    @keyframes fadeInTop {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-right {
        animation: fadeInRight 1s ease-out forwards;
    }

    .animate-fade-out-left {
        animation: fadeOutLeft 0.5s ease-out forwards;
    }

    .animate-fade-in-top {
        animation: fadeInTop 1s ease-out forwards;
    }
</style>

<section
    class="bg-peak-4 relative flex items-center justify-center w-full min-h-screen px-4 sm:px-10 stars sm:justify-between"
    style="background: url('images/public/background-4.webp') right 2.3rem / cover no-repeat;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div
        class="flex flex-col w-1/2 items-center px-4 py-10 space-y-3 justify-evenly mt-13 md:flex-row sm:px-15 sm:py-0 relative z-10">
        <div class="text-primary z-10 space-y-3">
            <div class="flex justify-start space-x-2">
                <h1 class="font-raleway tracking-wider text-6xl font-bold">
                    GYM ONE
                </h1>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" viewBox="0 0 48 48">
                        <linearGradient id="IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1" x1="9.858" x2="38.142" y1="9.858"
                            y2="38.142" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#9dffce"></stop>
                            <stop offset="1" stop-color="#50d18d"></stop>
                        </linearGradient>
                        <path fill="url(#IMoH7gpu5un5Dx2vID39Ra_pIPl8tqh3igN_gr1)"
                            d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                        <linearGradient id="IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2" x1="13" x2="36" y1="24.793"
                            y2="24.793" gradientUnits="userSpaceOnUse">
                            <stop offset=".824" stop-color="#135d36"></stop>
                            <stop offset=".931" stop-color="#125933"></stop>
                            <stop offset="1" stop-color="#11522f"></stop>
                        </linearGradient>
                        <path fill="url(#IMoH7gpu5un5Dx2vID39Rb_pIPl8tqh3igN_gr2)"
                            d="M21.293,32.707l-8-8c-0.391-0.391-0.391-1.024,0-1.414l1.414-1.414	c0.391-0.391,1.024-0.391,1.414,0L22,27.758l10.879-10.879c0.391-0.391,1.024-0.391,1.414,0l1.414,1.414	c0.391,0.391,0.391,1.024,0,1.414l-13,13C22.317,33.098,21.683,33.098,21.293,32.707z">
                        </path>
                    </svg>
                    <p class="font-nunito font-italic text-xs font-bold">
                        BEST FOR LESS
                    </p>
                </div>
            </div>
            <p class="max-w-full sm:max-w-[900px] sm:text-xl md:text-lg lg:text-xl">
                Top-notch Equipments Combined with Affordable Prices
            </p>
            <div class="flex gap-2 md:flex-row">
                <x-custom.secondary-button type="button" onclick="window.location.href = '{{ route('ticket.show') }}'"
                    class="border text-bold">
                    Book Now
                </x-custom.secondary-button>
                <x-custom.secondary-button type="button" onclick="window.location.href = '#equipment-section'"
                    :active="request()->routeIs('reservation')" class="border">
                    Learn More
                </x-custom.secondary-button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observerCallback = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-top');
                    entry.target.classList.remove('animate-fade-out-left');
                } else {
                    entry.target.classList.remove('animate-fade-in-top');
                    entry.target.classList.add('animate-fade-out-left');
                }
            });
        };

        const observer = new IntersectionObserver(observerCallback, observerOptions);

        // Select all elements within the specific section
        const section = document.querySelector('section.bg-peak-4');
        const elementsToAnimate = section.querySelectorAll('.text-primary *');
        elementsToAnimate.forEach(element => observer.observe(element));
    });
</script>