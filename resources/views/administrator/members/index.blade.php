<x-dash-layout>
    @if(session('success'))
        <div id="notification" class="notification">
            <button id="close-notification" class="close-btn">&times;</button>
            <p class="notification-message">{{ session('success') }}</p>
            <div id="time-bar" class="time-bar"></div>
        </div>
    @endif


    <div class="bg-gray-100 dark:bg-peak_1" x-data="{ serviceFilter: 'all', statusFilter: 'current' }">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4 dark:text-white">Member List</h1>
            <form action="{{ route('members.index') }}" method="GET" class="mt-4">
                <div class="flex mb-5 relative">
                    <button type="submit"
                        class="absolute inset-y-0 left-0 flex items-center p-2 text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span> <!-- For accessibility -->
                    </button>

                    <input type="text" name="search" id="searchInput" placeholder="Search by ID Number"
                        value="{{ request('search') }}" value="{{ request('search') }}"
                        class="block w-full py-2 pl-10 pr-4 text-sm border border-gray-300 rounded-md dark:border-gray-800 dark:bg-peak_2 dark:text-white" />
                </div>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if($members->isEmpty())
                    <p>No members yet.</p>
                @else
                    @foreach($members as $member)
                        <div class="bg-white dark:bg-peak_2 p-4 rounded shadow"
                            x-data="{ open: false, extendOpen: false, lockerOption: false ,extendLockerOpen:false,rentLockerOpen: false,  extendTreadmill: false }">
                            <h2 class="text-xl font-semibold dark:text-white">{{ $member->name }}</h2>
                            <p class="text-gray-500">{{ $member->email }}</p>
                            <button @click="open = true"
                                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                View Details
                            </button>

                            <!-- users detail panel -->
                            @include ('administrator.members.detail')


                            @include ('administrator.members.extend-service')
                            @include ('administrator.members.extend-locker')
                            @include ('administrator.members.extend-treadmill')

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-dash-layout>

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