// Function to update the size indicator
function updateSize() {
    const breakpointElement = document.getElementById("breakpoint");
    const width = window.innerWidth;

    if (width < 360) {
        breakpointElement.textContent = "xss"; // Extra small
    } else if (width < 640) {
        breakpointElement.textContent = "xs"; // Extra small
    } else if (width < 768) {
        breakpointElement.textContent = "sm"; // Small
    } else if (width < 1024) {
        breakpointElement.textContent = "md"; // Medium
    } else if (width < 1280) {
        breakpointElement.textContent = "lg"; // Large
    } else {
        breakpointElement.textContent = "xl"; // Extra large
    }
}

// Update size on load and on resize
window.addEventListener("load", updateSize);
window.addEventListener("resize", updateSize);
