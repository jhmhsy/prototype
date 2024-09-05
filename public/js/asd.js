// Function to toggle dark mode
function toggleDarkMode(event) {
    event.preventDefault(); // Prevent default action to avoid page reload
    const htmlElement = document.documentElement;
    const isDarkMode = htmlElement.classList.toggle("dark");
    localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
}

// Check localStorage for dark mode preference and apply it
function applyDarkModePreference() {
    const darkModePreference = localStorage.getItem("darkMode");
    if (darkModePreference === "enabled") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}

// Add event listener to the button
document
    .getElementById("toggleDarkMode")
    .addEventListener("click", toggleDarkMode);

// Apply dark mode preference on page load
applyDarkModePreference();

// Function to update the dark mode based on dropdown selection
function updateDarkModeFromDropdown() {
    const dropdown = document.getElementById("darkmode-toggle");
    dropdown.addEventListener("change", function (event) {
        const isDarkMode = event.target.value === "enabled";
        document.documentElement.classList.toggle("dark", isDarkMode);
        localStorage.setItem("darkMode", isDarkMode ? "enabled" : "disabled");
    });

    // Set dropdown value based on localStorage
    const darkModePreference = localStorage.getItem("darkMode") || "disabled";
    dropdown.value = darkModePreference;
}

// Apply dark mode from dropdown on page load
document.addEventListener("DOMContentLoaded", updateDarkModeFromDropdown);
