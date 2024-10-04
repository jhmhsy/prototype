<x-guest-layout>
    <div class="flex min-h-screen flex-col bg-tint_1 dark:bg-shade_9 text-shade_8">
        <header>
            <x-homepage.header-section />
        </header>
        <main class="dark:bg-shade_9 justify-center mt-15 flex">
            <div class="flex flex-col min-h-screen min-w-[600px]">
                <div class="flex-1 grid lg:grid-cols-10 gap-8 px-4 sm:p-6">
                    {{-- Calendar --}}
                    <div class="bg-muted lg:col-span-7 sm:col-span-10 rounded-md">
                        <div class="max-h-[85vh]" id="calendar"></div>
                    </div>

                    {{-- Hours --}}
                    <div class="bg-muted lg:col-span-3 sm:col-span-10 rounded-md">
                        <div class="grid gap-2">
                            <div class="flex items-center justify-between">
                                <div class="font-medium">Available Hours</div>
                                <div id="selectedDate" class="text-sm text-muted-foreground"></div>
                            </div>
                            <div class="grid grid-cols-1 gap-2">
                                <!-- Second div for showing reserved hour details -->
                                <div id="selectionInfo" class="text-xs"></div>
                                <div id="hourDetails"
                                    class="p-4 border border-gray-300 rounded-md h-[160px] overflow-y-auto"></div>
                                <div class="text-sm">
                                    <form action="{{ route('calendar.store') }}" method="POST">
                                        <x-forms.field :value="__('Name')" :errors="$errors->get('regular-name')" :for="'regular-name'">
                                            <input placeholder="Juan Dela Cruz" type="text" id="regular-name"
                                                name="name"
                                                class="w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3"
                                                value="{{ Auth::user() ? Auth::user()->name : '' }}"
                                                @auth disabled @endauth required>
                                        </x-forms.field>
                                        <x-forms.field :value="__('Date')" :errors="$errors->get('regular-date')" :for="'regular-date'">
                                            <input type="date" id="regular-date" name="date"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3"
                                                required>
                                        </x-forms.field>
                                        <x-forms.field :value="__('Time')" :errors="$errors->get('regular-time')" :for="'regular-time'">
                                            <select id="regular-time" name="time"
                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-main dark:bg-tint_3 mb-4"
                                                required>
                                                <option value="" disabled selected>Select an hour</option>
                                                <!-- Loop through 7 to 20 for full hours -->
                                                @for ($i = 7; $i < 21; $i++)
                                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">
                                                        {{ $i > 12 ? $i - 12 : $i }} {{ $i >= 12 ? 'pm' : 'am' }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </x-forms.field><button type="submit"
                                            class="w-full bg-main text-white py-2 px-4 rounded-md hover:bg-shade_3 dark:hover:bg-shade_5 dark:bg-shade_3 transition duration-300 ease-in-out">Reserve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var reservedDates = {};
            var totalReservations = 14; // Adjust this to your actual total reservation count
            var rangeInfo;

            @foreach ($reservedDetails as $booked)
                var dateKey = '{{ \Carbon\Carbon::parse($booked->date)->toISOString() }}';
                if (!reservedDates[dateKey]) {
                    reservedDates[dateKey] = {
                        count: 0,
                        title: 'Reserved',
                        start: dateKey,
                        allDay: true
                    };
                }
                reservedDates[dateKey].count++;
            @endforeach

            var events = Object.values(reservedDates).map(function(reservation) {
                var color;
                var textc = 'white';
                var border = 'none';
                var title;

                if (reservation.count === totalReservations) {
                    title = 'Full';
                    color = '#ff3333';
                    textc = 'white';
                } else if (reservation.count >= 10) {
                    title = 'Almost Full';
                    color = '#ff7133';
                    textc = 'white';
                } else if (reservation.count >= 7) {
                    title = 'Available';
                    color = 'yellow';
                    textc = 'black';
                } else {
                    title = 'Open';
                    color = '#66ff73';
                    textc = 'black';
                }

                return {
                    title: title,
                    start: reservation.start,
                    allDay: reservation.allDay,
                    backgroundColor: color,
                    textColor: textc,
                    borderColor: border,
                    editable: true
                };
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                headerToolbar: {
                    left: 'title',
                    center: 'today prev,next',
                    right: 'dayGridMonth,timeGridDay'
                },
                height: 650,
                events: events,
                select: function(info) {
                    rangeInfo = `From: ${info.startStr} To: ${info.endStr}`;
                    loadReservedHours(info.startStr);
                },
                dateClick: function(info) {
                    loadReservedHours(info.dateStr);
                },
                eventDidMount: function(info) {
                    info.el.addEventListener('click', function() {
                        loadReservedHours(info.event.startStr);
                    });
                }
            });

            calendar.render();

            function loadReservedHours(date) {
                fetch(`/api/reserved-hours?date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        displayReservedHours(data, date);
                    })
                    .catch(error => console.error('Error fetching reserved hours:', error));
            }

            function displayReservedHours(reservedHours, selectedDate) {
                var hourDetailsDiv = document.getElementById('hourDetails');
                hourDetailsDiv.innerHTML = '';

                const allTimes = [];
                for (let hour = 7; hour <= 20; hour++) {
                    const time = (hour % 12 || 12) + ':00 ' + (hour < 12 ? 'AM' : 'PM');
                    allTimes.push(time);
                }

                var list = document.createElement('ul');
                list.className = 'flex flex-col grid grid-cols-2 gap-2 p-0 m-0';

                allTimes.forEach(time => {
                    var listItem = document.createElement('button');
                    listItem.textContent = time;
                    listItem.className = 'w-100% p-6px';
                    listItem.style.borderRadius = '4px';

                    if (reservedHours.includes(time)) {
                        listItem.className =
                            'pointer-events-none select-none inline-flex items-center justify-center text-sm font-medium border bg-background h-10 px-4 py-2 line-through bg-red-500 border text-black';
                    } else {
                        listItem.className =
                            'select-none inline-flex items-center justify-center text-sm font-medium border bg-background h-10 px-4 py-2 border-green-500 text-black hover:bg-green-500 active:bg-green-600';
                        listItem.addEventListener('click', function() {
                            handleTimeSlotSelection(selectedDate, time); // Pass both date and time
                        });
                    }

                    list.appendChild(listItem);
                });

                hourDetailsDiv.appendChild(list);
            }

            // Updated to accept both date and time
            function handleTimeSlotSelection(date, time) {
                var dateInput = document.getElementById('regular-date');
                var timeInput = document.getElementById('regular-time');

                // Set the date
                dateInput.value = date.split('T')[0]; // Convert ISO date to 'YYYY-MM-DD'
                timeInput.value = convertTo24Hour(time); // Set the time
            }

            function convertTo24Hour(time12h) {
                const [time, modifier] = time12h.split(' ');
                let [hours, minutes] = time.split(':');

                if (hours === '12') {
                    hours = '00';
                }

                if (modifier === 'PM') {
                    hours = parseInt(hours, 10) + 12;
                }

                return `${hours.padStart(2, '0')}:${minutes}`;
            }
        });
    </script>

    <style>
        .selected-date,
        .selected-date:hover {
            background-color: #b6e0dd;
        }

        .fc-highlight {
            background-color: #b6e0dd !important;
        }

        .fc-day {
            cursor: pointer;
        }

        .fc-day-today {
            background-color: #85ccc7 !important;
            /* Use tint_5 for today's date */
            position: relative;
            /* Set position relative for absolute positioning of inner border */
            border: 2px solid #0a998f;
            /* Inner border using main color */
            border-radius: 4px;
            /* Optional: to soften the corners */
        }

        .fc-day:hover {
            background-color: #b6e0dd;
            ;
        }

        .fc-day:active {
            background-color: #0a998f;
        }

        .fc-event {
            transition: background-color 0.3s;
        }

        .fc-event:hover {
            cursor: pointer;
            z-index: 0;
            background-color: violet;
        }
    </style>
</x-guest-layout>
