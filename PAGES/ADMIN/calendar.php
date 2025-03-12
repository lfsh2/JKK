<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body, html {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            height: 100%;
            color: black !important;
        }
        .container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        #calendar {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 10px;
        }
        .month-label {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="calendar"></div>
    <div class="month-label" id="month-label">Current Month</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var monthLabelEl = document.getElementById('month-label');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: 'calendar/fetch_events.php',
            eventContent: function (arg) {
                let clientName = arg.event.title || 'No Name';
                let serviceType = arg.event.extendedProps.service_type || 'No Service';
                let eventTime = arg.event.extendedProps.appointment_time || 'No Time';
                return {
                    html: `<div>
                        <strong>${clientName}</strong><br>
                        <span>${serviceType}</span> <br>
                        <span class="fc-event-time">${eventTime}</span>
                    </div>`
                };
            },
            datesSet: function () {
                var currentMonth = calendar.view.title;
                monthLabelEl.textContent = currentMonth;
            }
        });

        calendar.render();
    });
</script>

</body>
</html>
