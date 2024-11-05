import "./bootstrap";
import "../css/app.css";
import Alpine from "alpinejs";

import Splide from "@splidejs/splide";
import "@splidejs/splide/css";

window.Alpine = Alpine;

Alpine.start();
let lastScrollTop = 0;
const navbar = document.querySelector("header > div");
let isCollapsed = false;

window.addEventListener("scroll", function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    window.requestAnimationFrame(() => {
        // Expand the navbar when at the very top of the page
        if (scrollTop === 0 && isCollapsed) {
            navbar.classList.remove("collapsed");
            isCollapsed = false;
        }
        // Collapse the navbar only if user has scrolled down from the top
        else if (scrollTop > 50 && !isCollapsed) {
            // Adjust the 50px value based on when you'd like the collapse to start
            navbar.classList.add("collapsed");
            isCollapsed = true;
        }

        lastScrollTop = scrollTop;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var splide = new Splide(".splide", {
        type: "loop", // Enables infinite scrolling
        drag: "free", // Allows free dragging without snapping
        perPage: 4, // Show 5 slides at a time
        gap: "1rem", // Adds spacing between slides
        autoplay: true, // Auto-slide functionality (optional)
        speed: 600, // Speed for smooth transitions
    });

    splide.mount();
});

document.addEventListener("DOMContentLoaded", function () {
    const notification = document.getElementById("notification");
    const closeBtn = document.getElementById("close-notification");

    if (notification) {
        // Auto-hide after 4 seconds
        setTimeout(() => {
            notification && notification.remove();
        }, 4000);

        // Close on button click
        closeBtn.addEventListener("click", () => {
            notification.remove();
        });
    }
});
