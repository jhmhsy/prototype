<div id="alert"
    class="absolute bottom-4 left-1/2 transform -translate-x-1/2 justify-center z-50 flex p-2 bg-green-200 text-green-800 text-sm rounded border border-green-300 my-3 opacity-0 transition-opacity duration-500"
    style="display: none;">
    <div class="flex-shrink mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="flex-grow">{{ $slot ?? 'Success' }}</div>
</div>

<script>
    function successAlert() {
        var alertBox = document.getElementById('alert');
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
