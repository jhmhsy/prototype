<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Gallery</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    html,
    body {
        margin: 0;
        padding: 0;
        font-family: "Quattrocento Sans", sans-serif;
        font-weight: 400;
        font-style: normal;
        background-color: #e0e0e0;
    }

    .equipment-slider {
        position: relative;
        margin: 2rem 0;
    }

    .equipment-card {
        background: white;
        border-radius: 2rem;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .equipment-image {
        position: relative;
        width: 100%;
        height: 300px;
        overflow: hidden;
    }

    .equipment-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .equipment-info {
        padding: 1.5rem;
    }

    .equipment-info h3 {
        margin: 0 0 0.5rem;
        font-size: 1.25rem;
        color: #333;
    }

    .equipment-type {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .equipment-details {
        color: #444;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .swiper-full {
        width: 100%;
        padding: 1rem 0 3rem;
        margin: 2rem 0;
        overflow: hidden;
    }

    .swiper-full .swiper-slide {
        width: 350px;
        height: auto;
    }

    @media screen and (max-width: 768px) {
        .swiper-full .swiper-slide {
            width: 300px;
        }
    }

    .swiper-full .swiper-button-next,
    .swiper-full .swiper-button-prev {
        color: #fff;
        height: 40px;
        width: 40px;
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
        border-radius: 100px;
    }

    .swiper-full .swiper-button-next:after,
    .swiper-full .swiper-button-prev:after {
        font-size: 1rem;
    }

    .swiper-full .swiper-pagination {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        padding: 8px 16px;
        border-radius: 100px;
        background-color: rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        width: auto;
    }

    .swiper-full .swiper-pagination .swiper-pagination-bullet {
        height: 0.8rem;
        width: 0.8rem;
        margin: 0 4px;
        border-radius: 1rem;
        transition: all 0.4s ease-in-out;
        background-color: rgba(255, 255, 255, 0.5);
    }

    .swiper-full .swiper-pagination .swiper-pagination-bullet-active {
        background-color: #fff;
        width: 2rem;
    }

    .image-counter {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.8rem;
        backdrop-filter: blur(4px);
    }

    .swiper-slide-visible .equipment-image img {
        transition: opacity 0.3s ease;
    }

    .swiper-wrapper {
        will-change: transform;
    }

    .equipment-card {
        transform: translateZ(0);
        backface-visibility: hidden;
        perspective: 1000px;
    }
    </style>
</head>

<body>
    <div class="top-footer items-center w-full text-center relative">
        <div class="container grid items-center w-[70%] justify-center gap-4 px-4 text-center md:px-6 m-auto">
            <div class="equipment-slider">
                <div class="swiper-full">
                    <div class="swiper-wrapper" id="swiperWrapper">
                        {{-- First Set (Pre-render) --}}
                        @foreach($equipments as $equipment)
                        <div class="swiper-slide" data-set="first">
                            <div class="equipment-card">
                                <div class="equipment-image">
                                    @if(is_array($equipment->images) && count($equipment->images) > 0)
                                    <img src="{{ Storage::url($equipment->images[0]) }}" alt="{{ $equipment->name }}"
                                        loading="eager">
                                    <div class="image-counter">
                                        {{ count($equipment->images) }}
                                        {{ Str::plural('image', count($equipment->images)) }}
                                    </div>
                                    @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                                        loading="eager">
                                    @endif
                                </div>
                                <div class="equipment-info">
                                    <h3>{{ $equipment->name }}</h3>
                                    <div class="equipment-type">{{ $equipment->type }}</div>
                                    <div class="equipment-details">{{ $equipment->details }}</div>
                                    @if($equipment->extra_details)
                                    <div class="equipment-details">{{ $equipment->extra_details }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- Primary Set --}}
                        @foreach($equipments as $equipment)
                        <div class="swiper-slide" data-set="primary">
                            <div class="equipment-card">
                                <div class="equipment-image">
                                    @if(is_array($equipment->images) && count($equipment->images) > 0)
                                    <img src="{{ Storage::url($equipment->images[0]) }}" alt="{{ $equipment->name }}"
                                        loading="eager">
                                    <div class="image-counter">
                                        {{ count($equipment->images) }}
                                        {{ Str::plural('image', count($equipment->images)) }}
                                    </div>
                                    @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                                        loading="eager">
                                    @endif
                                </div>
                                <div class="equipment-info">
                                    <h3>{{ $equipment->name }}</h3>
                                    <div class="equipment-type">{{ $equipment->type }}</div>
                                    <div class="equipment-details">{{ $equipment->details }}</div>
                                    @if($equipment->extra_details)
                                    <div class="equipment-details">{{ $equipment->extra_details }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- Second Set (Post-render) --}}
                        @foreach($equipments as $equipment)
                        <div class="swiper-slide" data-set="second">
                            <div class="equipment-card">
                                <div class="equipment-image">
                                    @if(is_array($equipment->images) && count($equipment->images) > 0)
                                    <img src="{{ Storage::url($equipment->images[0]) }}" alt="{{ $equipment->name }}"
                                        loading="eager">
                                    <div class="image-counter">
                                        {{ count($equipment->images) }}
                                        {{ Str::plural('image', count($equipment->images)) }}
                                    </div>
                                    @else
                                    <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                                        loading="eager">
                                    @endif
                                </div>
                                <div class="equipment-info">
                                    <h3>{{ $equipment->name }}</h3>
                                    <div class="equipment-type">{{ $equipment->type }}</div>
                                    <div class="equipment-details">{{ $equipment->details }}</div>
                                    @if($equipment->extra_details)
                                    <div class="equipment-details">{{ $equipment->extra_details }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalSlides = document.querySelectorAll('[data-set="primary"]').length;

        const swiperFull = new Swiper(".swiper-full", {
            slidesPerView: 'auto',
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            speed: 800,
            preloadImages: true,
            updateOnImagesReady: true,
            watchSlidesProgress: true,
            initialSlide: totalSlides, // Start at the beginning of the primary set
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '"></span>';
                }
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                320: {
                    slidesPerView: 'auto',
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 'auto',
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 'auto',
                    spaceBetween: 30
                }
            },
            on: {
                init: function() {
                    // Preload images for better performance
                    const images = document.querySelectorAll('.equipment-image img');
                    images.forEach(img => {
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                        }
                    });
                }
            }
        });

        const swiperContainer = document.querySelector('.swiper-full');

        if (swiperContainer) {
            swiperContainer.addEventListener('mouseenter', function() {
                swiperFull.autoplay.stop();
            });

            swiperContainer.addEventListener('mouseleave', function() {
                swiperFull.autoplay.start();
            });
        }
    });
    </script>
</body>

</html>