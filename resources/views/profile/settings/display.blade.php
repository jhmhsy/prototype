<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-darkmode_light text-textblack dark:text-textwhite shadow sm:rounded-lg">
            <!-- Dropdown menu for dark mode -->
            <label for="darkmode-toggle" class="block text-sm font-medium ">Dark
                Mode</label>
            <select id="darkmode-toggle"
                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm bg-white dark:bg-darkmode_dark">
                <option id="toggleDarkMode" value="enabled">On</option>
                <option id="toggleLightMode" value="disabled">Off</option>
            </select>
        </div>
    </div>
    <div class="hidden">
        <x-custom.darkmode />
    </div>
</div>





<script>
function applyDarkModePreference() {
    let darkMode = localStorage.getItem("dark-mode");
    let isDarkMode = darkMode === "true";
    document.documentElement.classList.toggle("dark", isDarkMode);
    document.getElementById("toggleDarkLightMode").checked = isDarkMode;
    document.getElementById("darkmode-toggle").value = isDarkMode ? "enabled" : "disabled";
}
document.getElementById("toggleDarkLightMode").addEventListener("change", function() {
    let isChecked = this.checked;
    document.documentElement.classList.toggle("dark", isChecked);
    localStorage.setItem("dark-mode", isChecked);
    document.getElementById("darkmode-toggle").value = isChecked ? "enabled" : "disabled";
});
document.getElementById("darkmode-toggle").addEventListener("change", function() {
    let isEnabled = this.value === "enabled";
    document.documentElement.classList.toggle("dark", isEnabled);
    localStorage.setItem("dark-mode", isEnabled);
    document.getElementById("toggleDarkLightMode").checked = isEnabled;
});
applyDarkModePreference();
</script>