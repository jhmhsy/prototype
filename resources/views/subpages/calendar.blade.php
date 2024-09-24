<x-guest-layout>

    <div class="flex flex-col min-h-screen">
        <header class="bg-background border-b flex items-center justify-between px-4 py-3 sm:px-6">

            {{-- search bar--}}
            <div class="flex items-center gap-4 w-full ">
                <div class="relative flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                    <input
                        class="flex h-10 border border-input px-3 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 pl-10 pr-4 py-3 rounded-md w-full bg-muted focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary sm:w-[400px] md:w-[500px] lg:w-[600px]"
                        placeholder="Search..." type="search" />
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-5 h-5">
                        <path d="M12 17h.01"></path>
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"></path>
                        <path d="M9.1 9a3 3 0 0 1 5.82 1c0 2-3 3-3 3"></path>
                    </svg>
                    <span class="sr-only">Help</span>
                </button>
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="w-5 h-5">
                        <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                        <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                    </svg>
                    <span class="sr-only">Notifications</span>
                </button>
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 rounded-full">
                    <img src="/placeholder.svg" width="32" height="32" alt="Avatar" class="rounded-full"
                        style="aspect-ratio: 32 / 32; object-fit: cover;" />
                    <span class="sr-only">Profile</span>
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
                        events: [
                            @foreach($reservedDetails as $booked) {
                                title: '{{ $booked->name }}',
                                start: '{{ \Carbon\Carbon::parse($booked->date . '
                                ' . $booked->time)->toISOString() }}',
                                allDay: false
                            },
                            @endforeach
                        ],
                        dateClick: function(info) {
                            loadReservedHours(info
                                .dateStr); // Load reserved hours for the clicked date
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
                    list.className = 'flex flex-col grid grid-cols-2 gap-2 p-0 m-0';


                    allTimes.forEach(time => {
                        var listItem = document.createElement('button');
                        listItem.textContent = time; // Display the time
                        listItem.style.width = '100%';
                        listItem.style.padding = '6px';
                        listItem.style.borderRadius = '4px';


                        // Check if the time is reserved
                        if (reservedHours.includes(time)) {
                            listItem.className =
                                'pointer-events-none select-none inline-flex items-center justify-center text-sm font-medium border bg-background h-10 px-4 py-2 bg-red-500 text-white';
                        } else {
                            listItem.className =
                                'select-none inline-flex items-center justify-center text-sm font-medium border bg-background h-10 px-4 py-2 border-green-500 text-black hover:bg-green-500 active:bg-green-600';

                        }

                        list.appendChild(listItem);
                    });

                    hourDetailsDiv.appendChild(list);
                }
                </script>
            </div>

            {{-- Hours --}}
            <div class="bg-muted rounded-md p-4">
                <div class="grid gap-2">
                    <div class="flex items-center justify-between">
                        <div class="font-medium">Available Hours</div>
                        <div id="selectedDate" class="text-sm text-muted-foreground"></div>
                    </div>
                    <div class="grid grid-cols-1 gap-2">
                        <!-- Second div for showing reserved hour details -->
                        <div id="hourDetails" class="mt-4 p-4 border border-gray-300 rounded-md"></div>
                    </div>
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