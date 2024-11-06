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

/* Admin tabular action field name; 3 dot button js */
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".action-dropdown").forEach((dropdown) => {
        const button = dropdown.querySelector(".dropdown-button");
        const menu = dropdown.querySelector(".action-dropdown-menu");

        // Handle button click
        button.addEventListener("click", (e) => {
            e.stopPropagation();

            // Close other dropdowns
            document
                .querySelectorAll(".action-dropdown-menu.show")
                .forEach((m) => m !== menu && m.classList.remove("show"));

            // Toggle current dropdown
            menu.classList.toggle("show");

            if (menu.classList.contains("show")) {
                // Position the dropdown
                const rect = button.getBoundingClientRect();
                const menuRect = menu.getBoundingClientRect();
                const spaceRight = window.innerWidth - rect.right - 10;

                menu.style.top = `${rect.top}px`;
                menu.style.left =
                    spaceRight > menuRect.width
                        ? `${rect.right}px`
                        : `${rect.left - menuRect.width}px`;

                // Keep in viewport
                const bounds = menu.getBoundingClientRect();
                if (bounds.right > window.innerWidth - 10) {
                    menu.style.left = `${
                        window.innerWidth - menuRect.width - 10
                    }px`;
                }
                if (bounds.bottom > window.innerHeight - 10) {
                    menu.style.top = `${
                        window.innerHeight - menuRect.height - 10
                    }px`;
                }
            }
        });

        // Close on outside click or scroll/resize
        ["click", "scroll", "resize"].forEach((event) => {
            (event === "scroll" ? document : window).addEventListener(
                event,
                () => {
                    menu.classList.remove("show");
                },
                event === "scroll"
            );
        });
    });
});
