<div x-data="{ isOpen: false }" class="fixed right-0 top-1/2 -translate-y-1/2 z-50 select-none flex items-center">
    <!-- Sliding Panel -->

    <div style="display:none;" x-show="isOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100"
        x-transition:leave-end="translate-x-full opacity-0"
        class="absolute right-0 bg-peak_2 shadow-2xl rounded-lg overflow-hidden border-l-4 border-yellow-300 w-80">
        <div class="relative">
            <button @click="isOpen = false" class="absolute top-2 right-2 text-gray-500 z-30 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="swiper-container events-swiper">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)

                    <div class="swiper-slide">
                        <!-- Event Image -->
                        <div class="images-swiper-container overflow-hidden group">
                            <div class="h-48 bg-cover bg-center transition-transform duration-500 ease-in-out group-hover:scale-110 origin-center"
                                style="background-image: url('{{ asset('storage/' . $event->image) }}');">
                                <div class="absolute inset-0 bg-black bg-opacity-5"></div>
                            </div>
                        </div>

                        <!-- Event Details -->
                        <div class="p-5">
                            <h2 class="text-xl font-bold text-gray-300 mb-2">{{ $event->name }}</h2>

                            <div class="space-y-3 text-gray-600">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-400">
                                        {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                                    </span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-lienjoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-gray-400">
                                        {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }} -
                                        {{ \Carbon\Carbon::parse($event->time)->addHours(8)->format('g:i A') }}
                                    </span>
                                </div>

                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-yellow-300"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span class="text-gray-400">{{ $event->location }}</span>
                                </div>
                            </div>

                            <div class="mt-5">
                                <p class="text-sm text-gray-300 mb-3">{{ $event->details }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Events Swiper Pagination -->
                <div class="swiper-pagination events-swiper-pagination"></div>
            </div>

            <!-- Initialize Swipers -->
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Events Swiper
                var eventsSwiper = new Swiper('.events-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    pagination: {
                        el: '.events-swiper-pagination',
                        clickable: true
                    }
                });

                // Images Swipers for each event
                document.querySelectorAll('.images-swiper').forEach(function(imagesSwiper) {
                    new Swiper(imagesSwiper, {
                        slidesPerView: 1,
                        spaceBetween: 10,
                        pagination: {
                            el: imagesSwiper.querySelector('.images-swiper-pagination'),
                            clickable: true
                        }
                    });
                });
            });
            </script>
        </div>
    </div>

    <!-- Toggle Button -->
    <button @click="isOpen = !isOpen" x-show="!isOpen" class="bg-none p-2 rounded-l-md shadow-lg mr-4 text-gray-500 ">
        <svg class="w-6 h-6 text-gray-800 hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m15 19-7-7 7-7" />
        </svg>

    </button>


</div>