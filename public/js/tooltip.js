document.querySelectorAll(".tooltip-button").forEach((button) => {
    let tooltipTimeout;

    button.addEventListener("mouseenter", () => {
        tooltipTimeout = setTimeout(() => {
            const tooltip = button.nextElementSibling;
            tooltip.classList.remove("hidden");
            tooltip.classList.add("visible"); // Show tooltip after 4 seconds
        }, 1000); // 4 seconds delay
    });

    button.addEventListener("mouseleave", () => {
        clearTimeout(tooltipTimeout); // Cancel the timeout if mouse leaves early
        const tooltip = button.nextElementSibling;
        tooltip.classList.add("hidden");
        tooltip.classList.remove("visible"); // Hide tooltip immediately
    });
});
