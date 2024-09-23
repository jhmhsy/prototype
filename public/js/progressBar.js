document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("progress-bar");
    const totalSteps = 3; // Total number of files
    let currentStep = 0;

    // Function to update the progress bar
    function updateProgress(step) {
        currentStep = step;
        const progressPercentage = (currentStep / totalSteps) * 100;
        progressBar.style.width = `${progressPercentage}%`;
    }

    // Example function to call when navigating to a file
    function navigateToStep(step) {
        // Logic to navigate to the respective file
        updateProgress(step);
    }

    // Call navigateToStep with the respective step when changing files
    // For example:
    // navigateToStep(1); // For the first file
    // navigateToStep(2); // For the second file
    // navigateToStep(3); // For the third file
});
