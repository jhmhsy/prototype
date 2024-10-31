// Checks localStorage for dark mode preference and apply it
function applyDarkModePreference() {
    const darkModePreference = localStorage.getItem("darkMode");
    const isDarkMode = darkModePreference === "enabled";
    document.documentElement.classList.toggle("dark", isDarkMode);
    updateButtonVisibility(isDarkMode); // Updates button visibility on page load
}

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
