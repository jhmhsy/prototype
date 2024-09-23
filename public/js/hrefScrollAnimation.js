document.querySelectorAll("x-forms.nav-link").forEach((link) => {
    link.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the default anchor click behavior

        const targetId = this.getAttribute("href"); // Get the target section's ID
        const targetSection = document.querySelector(targetId); // Select the target section

        if (targetSection) {
            // Smoothly scroll to the target section
            targetSection.scrollIntoView({
                behavior: "smooth",
            });
        }
    });
});
