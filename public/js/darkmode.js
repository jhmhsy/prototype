// Function to toggle dark mode
function toggleDarkMode(event) {
    event.preventDefault(); // Prevent default action to avoid page reload
    const htmlElement = document.documentElement;
    const isDarkMode = htmlElement.classList.toggle("dark");
    localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
    updateButtonVisibility(isDarkMode); // Update button visibility based on mode
}

// Checks localStorage for dark mode preference and apply it
function applyDarkModePreference() {
    const darkModePreference = localStorage.getItem("darkMode");
    const isDarkMode = darkModePreference === "enabled";
    document.documentElement.classList.toggle("dark", isDarkMode);
    updateButtonVisibility(isDarkMode); // Updates button visibility on page load
}

// Updates the visibility of the light and dark mode buttons
function updateButtonVisibility(isDarkMode) {
    const lightModeButton = document.getElementById("toggleLightMode");
    const darkModeButton = document.getElementById("toggleDarkMode");

    if (isDarkMode) {
        lightModeButton.classList.remove("hidden");
        darkModeButton.classList.add("hidden");
    } else {
        lightModeButton.classList.add("hidden");
        darkModeButton.classList.remove("hidden");
    }
}

// Add event listener to both buttons
document
    .getElementById("toggleLightMode")
    ?.addEventListener("click", toggleDarkMode);
document
    .getElementById("toggleDarkMode")
    ?.addEventListener("click", toggleDarkMode);

// Apply dark mode preference on page load
applyDarkModePreference();

// Function to update the dark mode based on dropdown selection
function updateDarkModeFromDropdown() {
    const dropdown = document.getElementById("darkmode-toggle");
    if (dropdown) {
        dropdown.addEventListener("change", function (event) {
            const isDarkMode = event.target.value === "enabled";
            document.documentElement.classList.toggle("dark", isDarkMode);
            localStorage.setItem(
                "darkMode",
                isDarkMode ? "enabled" : "disabled"
            );
            updateButtonVisibility(isDarkMode); // Update buttons based on dropdown selection
        });

        // Set dropdown value based on localStorage
        const darkModePreference =
            localStorage.getItem("darkMode") || "disabled";
        dropdown.value = darkModePreference;
    }
}

// Apply dark mode from dropdown on page load
document.addEventListener("DOMContentLoaded", updateDarkModeFromDropdown);
