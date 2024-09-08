function showSection(section) {
    // Hide all sections
    document.querySelectorAll(".section-content").forEach((el) => {
        el.classList.add("hidden");
    });

    // Remove 'active' class from all nav links
    document.querySelectorAll(".nav-link").forEach((el) => {
        el.classList.remove(
            "bg-thirdy",
            "dark:bg-darkmode_lighter",
            "text-accent-foreground"
        );
    });

    // Show the selected section
    document.getElementById(section + "-section").classList.remove("hidden");

    // Add 'active' class to the clicked links
    document
        .querySelector(`[data-section="${section}"]`)
        .classList.add(
            "bg-thirdy",
            "dark:bg-darkmode_lighter",
            "text-accent-foreground"
        );

    // Store the current section in localStorage
    localStorage.setItem("activeSection", section);
}

// Show the default section on page load or the one stored in localStorage
document.addEventListener("DOMContentLoaded", () => {
    const savedSection = localStorage.getItem("activeSection") || "dashboard";
    showSection(savedSection);
});
