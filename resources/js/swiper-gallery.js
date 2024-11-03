// resources/js/swiper-gallery.js
import Swiper from "swiper/bundle";
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", function () {
    const swiperFull = new Swiper(".swiper-full", {
        autoplay: {
            delay: 3000,
        },
        slidesPerView: "auto",
        centeredSlides: true,
        spaceBetween: 32,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            renderBullet: function (index, className) {
                return (
                    '<span class="' + className + '">' + (index + 1) + "</span>"
                );
            },
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Handle mouse enter/leave events
    const swiperContainer = document.querySelector(".swiper-full");

    if (swiperContainer) {
        swiperContainer.addEventListener("mouseenter", function () {
            swiperFull.autoplay.stop();
        });

        swiperContainer.addEventListener("mouseleave", function () {
            swiperFull.autoplay.start();
        });
    }
});
