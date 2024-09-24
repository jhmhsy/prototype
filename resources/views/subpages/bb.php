<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        <header class="bg-background border-b flex items-center justify-between px-4 py-3 sm:px-6">
            {{-- Search Bar --}}
            <div class="flex items-center gap-4 w-full">
                <div class="relative flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-muted-foreground">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input type="search" placeholder="Search..."
                        class="flex h-10 border border-input px-3 text-sm rounded-md w-full bg-muted pl-10" />
                </div>
            </div>

            <div class="flex items-center gap-4">
                {{-- Help Button --}}
                <button class="h-10 w-10 rounded-full flex items-center justify-center hover:bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-5 h-5">
                        <path d="M12 17h.01"></path>
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path>
                        <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"></path>
                    </svg>
                </button>
                {{-- Notifications Button --}}
                <button class="h-10 w-10 rounded-full flex items-center justify-center hover:bg-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="w-5 h-5">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                </button>
                {{-- Profile Button --}}
                <button class="h-10 w-10 rounded-full flex items-center justify-center hover:bg-accent">
                    <img src="/placeholder.svg" alt="Avatar" class="rounded-full w-full h-full object-cover" />
                </button>
            </div>
        </header>

        <main class="flex-1 grid grid-cols-[70%_30%] gap-4 p-4 sm:p-6">
            {{-- Calendar --}}
            <div class="bg-muted rounded-md">
                <div class="max-h-[85vh]" id="calendar"></div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek'
                        },
                        events: @json($reservedDetails),
                        dateClick: function(info) {
                            loadReservedHours(info.dateStr);
                        }
                    });
                    calendar.render();
                });

                function loadReservedHours(date) {
                    fetch(`/api/reserved-hours?date=${date}`)
                        .then(response => response.json())
                        .then(data => {
                            displayReservedHours(data);
                        })
                        .catch(error => console.error('Error fetching reserved hours:', error));
                }

                function displayReservedHours(reservedHours) {
                    var hourDetailsDiv = document.getElementById('hourDetails');
                    hourDetailsDiv.innerHTML = ''; // Clear previous content

                    // Generate times from 7 AM to 9 PM
                    const allTimes = [];
                    for (let hour = 7; hour <= 21; hour++) {
                        const time = (hour % 12 || 12) + ':00 ' + (hour < 12 ? 'AM' : 'PM');
                        allTimes.push(time);
                    }

                    // Create a list to display reserved hours
                    var list = document.createElement('ul');

                    allTimes.forEach(time => {
                        var listItem = document.createElement('li');
                        listItem.textContent = time; // Display the time

                        // Check if the time is reserved
                        if (reservedHours.includes(time)) {
                            listItem.style.color = 'green'; // Color reserved time green
                        } else {
                            listItem.style.color = 'black'; // Default color for unreserved times
                        }

                        list.appendChild(listItem);
                    });

                    hourDetailsDiv.appendChild(list);
                }
                </script>
            </div>

            {{-- Reserved Hours --}}
            <div class="bg-muted rounded-md p-4">
                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <div class="font-medium">Reserved Hours</div>
                        <div id="selectedDate" class="text-sm text-muted-foreground"></div>
                    </div>
                    <div id="hourDetails" class="mt-4 p-4 border border-gray-300 rounded-md"></div>
                </div>
            </div>
        </main>
    </div>

    <style>
    .fc-day {
        cursor: pointer;
    }

    .fc-day:hover {
        background-color: seagreen;
    }

    .fc-day:active {
        background-color: darkgreen;
    }
    </style>
</x-guest-layout>