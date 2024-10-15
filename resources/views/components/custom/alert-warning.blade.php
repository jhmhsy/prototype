<div id="warning-alert"
    class="absolute bottom-4 left-1/2 transform -translate-x-1/2 justify-center z-50 flex p-2 bg-red-200 text-red-800 text-sm rounded border border-red-300 my-3 opacity-0 transition-opacity duration-500"  style="display: none;z-index: 9999;">
    <div class="flex-shrink mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="flex-grow">{{ $slot ?? 'Success' }}</div>
</div>

<script>
    function warningAlert() {
        var alertBox = document.getElementById('warning-alert');
        alertBox.style.display = 'flex';
        setTimeout(function() {
            alertBox.classList.remove('opacity-0'); // Show the alert 
            alertBox.classList.add('opacity-100');
        }, 10); // Small timeout for transition 

        // Hide after 5 seconds
        setTimeout(function() {
            alertBox.classList.remove('opacity-100'); // Fade out
            alertBox.classList.add('opacity-0');
            setTimeout(function() {
                alertBox.style.display = 'none'; // Remove from view
            }, 500); // Wait for fade out transition to finish before hiding completely
        }, 5000);
    }
</script>
