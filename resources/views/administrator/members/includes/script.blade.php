<script>
    // Downlods qrcode
    function downloadQrCode(imageUrl, idNumber) {
        const fileName = `QRCODE-${idNumber}.png`;
        fetch(imageUrl)
            .then(response => response.blob())
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = fileName;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            })
            .catch(error => console.error('Error downloading QR code:', error));
    }
</script>

<script>
    // refresh / set date automatically
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize all forms with current dates
        document.querySelectorAll('.service-form').forEach(form => {
            const memberId = form.id.split('-').pop();
            refreshDate(memberId, 'services', 'service');
        });

        document.querySelectorAll('.locker-form').forEach(form => {
            const memberId = form.id.split('-').pop();
            refreshDate(memberId, 'lockers', 'locker');
        });

        document.querySelectorAll('.treadmill-form').forEach(form => {
            const memberId = form.id.split('-').pop();
            refreshDate(memberId, 'treadmills', 'treadmill');
        });
    });

    function refreshDate(memberId, relation, inputPrefix) {
        const dateInput = document.getElementById(`${inputPrefix}_start_date_${memberId}`);
        const refreshButton = dateInput.nextElementSibling;
        const svgIcon = refreshButton.querySelector("svg"); // Select the SVG icon inside the button

        // Disable the input, show a loading state, and add a spin to the icon
        dateInput.disabled = true;
        dateInput.classList.add('opacity-50', 'cursor-wait');
        refreshButton.disabled = true;
        svgIcon.classList.add('animate-spin'); // Start spinning

        fetch(`/members/${memberId}/start-date/${relation}`)
            .then(response => response.json())
            .then(data => {
                dateInput.value = data.start_date;
            })
            .catch(error => {
                console.error('Error:', error);
                // aaalert(`Error fetching ${relation} date. Please try again.`);
            })
            .finally(() => {
                // Re-enable the input, remove loading state, and stop spinning
                dateInput.disabled = false;
                dateInput.classList.remove('opacity-50', 'cursor-wait');
                refreshButton.disabled = false;
                svgIcon.classList.remove('animate-spin'); // Stop spinning
            });
    }

    function refreshDates(memberId, inputPrefix) {
        const dateInput = document.getElementById(`${inputPrefix}_start_date_${memberId}`);

        // Set date to today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0];
        dateInput.value = today;
    }
</script>

<!-- tool tip to see information when hover on button -->
<link href="{{ asset('css/tooltip.css') }}" rel="stylesheet" defer>
<script src="{{ asset('js/tooltip.js') }}" defer></script>