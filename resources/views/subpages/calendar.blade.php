<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet" />
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <style>
    #calendar {
        max-width: 900px;
        margin: 40px auto;
    }
    </style>
</head>

<body>

    <div id="calendar"></div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridDay', // Set your desired initial view
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            events: [
                @foreach($reservedDates as $date) {
                    title: 'Reserved',
                    start: '{{ $date }}', // Ensure this is in 'YYYY-MM-DD HH:mm:ss' format
                    allDay: true // Set to false for hourly bookings
                },
                @endforeach
            ]

        });
        calendar.render();
    });
    </script>


</body>

</html>