import "./bootstrap";
import "../css/app.css";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
let lastScrollTop = 0;
const navbar = document.querySelector('header > div');
let isCollapsed = false;

window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    window.requestAnimationFrame(() => {
        // Expand the navbar when at the very top of the page
        if (scrollTop === 0 && isCollapsed) {
            navbar.classList.remove('collapsed');
            isCollapsed = false;
        }
        // Collapse the navbar only if user has scrolled down from the top
        else if (scrollTop > 50 && !isCollapsed) {  // Adjust the 50px value based on when you'd like the collapse to start
            navbar.classList.add('collapsed');
            isCollapsed = true;
        }

        lastScrollTop = scrollTop;
    });
});