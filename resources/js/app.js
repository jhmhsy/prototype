import "./bootstrap";
import "../css/app.css";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
let lastScrollTop = 0;
const navbar = document.querySelector('header > div');

window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        navbar.classList.add('collapsed');
    } else {
        navbar.classList.remove('collapsed');
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
});