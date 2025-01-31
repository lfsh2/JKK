<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="../../CSS/adminpanel.css.css">
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
            scrollbar-width: none;
            color: black !important;
        }
        .container {
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        #calendar {
            color: white !important;
            border-color: red !important;
        }
        .calendar-modal .modal-content {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .icon-preview {
            font-size: 20px;
            margin-left: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div id="calendar"></div>
</div>

<div id="modal-add-event" class="modal fade calendar-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="add-event-form">
                <input type="hidden" id="event-id" name="id">
                <div class="modal-body">
                    <h4 class="text-blue h4 mb-10">Add Event Detail</h4>
                    <div class="form-group">
                        <label for="event-title">Event Name</label>
                        <input type="text" class="form-control" id="event-title" name="title" required placeholder="Enter event name">
                    </div>
                    <div class="form-group">
                        <label for="event-description">Event Description</label>
                        <textarea class="form-control" id="event-description" name="description" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="event-date">Event Date</label>
                        <input type="text" class="form-control" id="event-date" name="date" readonly>
                    </div>
                    <div class="form-group">
                        <label for="event-color">Event Color</label>
                        <select class="form-control" id="event-color" name="color">
                            <option value="#ff0000" style="background-color: #ff0000;">Red</option>
                            <option value="#00ff00" style="background-color: #00ff00;">Green</option>
                            <option value="#0000ff" style="background-color: #0000ff;">Blue</option>
                            <option value="#ffff00" style="background-color: #ffff00;">Yellow</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="event-icon">Event Icon</label>
                        <select class="form-control" id="event-icon" name="icon">
                            <option value="fas fa-star">Star</option>
                            <option value="fas fa-birthday-cake">Birthday Cake</option>
                            <option value="fas fa-briefcase">Briefcase</option>
                            <option value="fas fa-music">Music</option>
                            <option value="fas fa-heart">Heart</option>
                        </select>
                        <span class="icon-preview"><i class="fas fa-star"></i></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" id="delete-event" class="btn btn-danger" style="display: none;">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            editable: true,
            events: 'calendar/fetch_events.php',
            dateClick: function (info) {
                $('#event-id').val('');
                $('#event-title').val('');
                $('#event-description').val('');
                $('#event-date').val(info.dateStr);
                $('#event-color').val('#ff0000');
                $('#event-icon').val('fas fa-star');
                $('.icon-preview i').attr('class', 'fas fa-star');
                $('#delete-event').hide();
                $('#modal-add-event').modal('show');
            },
            eventClick: function (info) {
                var event = info.event;
                $('#event-id').val(event.id);
                $('#event-title').val(event.title);
                $('#event-description').val(event.extendedProps.description);
                $('#event-date').val(event.startStr);
                $('#event-color').val(event.backgroundColor);
                $('#event-icon').val(event.extendedProps.icon);
                $('.icon-preview i').attr('class', event.extendedProps.icon);
                $('#delete-event').show();
                $('#modal-add-event').modal('show');
            },
            eventContent: function (arg) {
                let iconClass = arg.event.extendedProps.icon || '';
                let title = arg.event.title || '';
                return {
                    html: `<i class="${iconClass}" style="color: ${arg.event.backgroundColor};"></i> ${title}`
                };
            },
            eventDrop: function (info) {
                updateEvent(info.event);
            },
            eventResize: function (info) {
                updateEvent(info.event);
            }
        });

        calendar.render();

        $('#event-color').on('change', function () {
            $('.icon-preview').css('background-color', $(this).val());
        });

        $('#event-icon').on('change', function () {
            $('.icon-preview i').attr('class', $(this).val());
        });

        $('#add-event-form').on('submit', function (e) {
            e.preventDefault();

            var eventData = {
                id: $('#event-id').val(),
                title: $('#event-title').val(),
                date: $('#event-date').val(),
                description: $('#event-description').val(),
                color: $('#event-color').val(),
                icon: $('#event-icon').val()
            };

            var url = eventData.id ? 'calendar/update_event.php' : 'calendar/save_event.php';

            $.ajax({
                url: url,
                type: 'POST',
                data: eventData,
                dataType: 'json', 
                success: function (response) {
                    if (response.success) {
                        calendar.refetchEvents();
                        $('#modal-add-event').modal('hide');
                    } else {
                        alert('Error saving event: ' + response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(`Error saving event. Status: ${textStatus}. Error: ${errorThrown}. Response: ${jqXHR.responseText}`);
                    console.error('Full error response:', jqXHR);
                }
            });
        });

        $('#delete-event').on('click', function () {
            var eventId = $('#event-id').val();
            if (eventId) {
                if (confirm('Are you sure you want to delete this event?')) {
                    $.ajax({
                        url: 'calendar/delete_event.php',
                        type: 'POST',
                        data: { id: eventId },
                        dataType: 'json', 
                        success: function (response) {
                            if (response.success) {
                                calendar.refetchEvents();
                                $('#modal-add-event').modal('hide');
                            } else {
                                alert('Error deleting event: ' + response.message);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert(`Error deleting event. Status: ${textStatus}. Error: ${errorThrown}. Response: ${jqXHR.responseText}`);
                            console.error('Full error response:', jqXHR);
                        }
                    });
                }
            }
        });

        function updateEvent(event) {
            var eventData = {
                id: event.id,
                title: event.title,
                date: event.startStr,
                description: event.extendedProps.description,
                color: event.backgroundColor,
                icon: event.extendedProps.icon
            };

            $.ajax({
                url: 'calendar/update_event.php',
                type: 'POST',
                data: eventData,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        calendar.refetchEvents();
                    } else {
                        alert('Error updating event: ' + response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(`Error updating event. Status: ${textStatus}. Error: ${errorThrown}. Response: ${jqXHR.responseText}`);
                    console.error('Full error response:', jqXHR);
                }
            });
        }
    });
</script>

</body>
</html>
