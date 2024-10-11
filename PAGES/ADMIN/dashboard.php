<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJK Construction Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet">
    <style>
        body, html {
            font-family: 'Poppins', sans-serif;
            background: white;
            color: black;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .dashboard-container {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            height: 100%;
            background: white;
        }

        .dashboard-header {
            width: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .date-picker {
            font-size: 1rem;
            position: relative;
            background: none;
            border: 1px solid white;
            display: flex;
            align-items: center;
        }

        .date-picker input, .date-picker input:focus {
            border: none;
            outline: none;
            background: none;
            color: black;
            font-size: 16px;
            border: 1px solid black;
        }

        .content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: auto;
            scrollbar-width: none;
            gap: 10px;
        }

        .stats-container, .charts-container {
            width: 100%;
            padding: 10px;
            display: flex;
            gap: 20px;
            flex-grow: 1;
            flex-wrap: wrap
        }

        .stats-box, .chart {
            background: white;
            border: 1px solid rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            flex-grow: 1;
        }

        .stats-box {
            width: 150px;
            padding: 20px;
            height: 100%;
            max-height: 100px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            box-shadow: 2px 2px rgba(0, 0, 0, 0.3);
        }

        .stats-box h3 {
            margin: 0;
            font-size: 1rem;
        }

        .stats-box p {
            font-size: 18px;
            color: #b0b0b0;
        }

        .chart {
            flex: 1 1 48%;
            padding: 20px;
            min-height: 300px;
        }

        .chart canvas {
            width: 100%;
            height: 100%;
        }

        .daterangepicker {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }

        .daterangepicker .calendar {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .daterangepicker .calendar thead, .daterangepicker .calendar thead th, .daterangepicker .calendar tbody td {
            color: #fff;
        }

        .daterangepicker .calendar tbody td.available {
            background: #25293c;
            border-radius: 50%;
            cursor: pointer;
        }

        .daterangepicker .calendar tbody td.in-range, .daterangepicker .calendar tbody td.active, .daterangepicker .calendar tbody td.start-date, .daterangepicker .calendar tbody td.end-date {
            background: #ff4081;
            color: #fff;
            border-radius: 50%;
        }

        .daterangepicker .ranges, .daterangepicker .ranges li, .daterangepicker .applyBtn, .daterangepicker .cancelBtn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .daterangepicker .applyBtn:hover, .daterangepicker .cancelBtn:hover {
            background: #e03575;
        }
    </style>
</head>
<body>

<div class="container-fluid dashboard-container" id="dashboard">
    <div class="dashboard-header">
        <div class="date-picker">
            <input type="text" id="dateRange" class="form-control" style="width: 250px;">
        </div>
    </div>

    <div class="content-wrapper">
        <div class="stats-container">
            <div class="stats-box">
                <h3>Total Appointments</h3>
                <p id="totalAppointments">0</p>
            </div>
            <div class="stats-box">
                <h3>Confirmed Book</h3>
                <p id="confirmedBookings">0</p>
            </div>
            <div class="stats-box">
                <h3>Revenue</h3>
                <p id="revenue">$0.00</p>
            </div>
            <div class="stats-box">
                <h3>New Clients</h3>
                <p id="newClients">0</p>
            </div>
            <div class="stats-box">
                <h3>Cancelled Appointments</h3>
                <p id="cancelledAppointments">0</p>
            </div>
            <div class="stats-box">
                <h3>Pending Requests</h3>
                <p id="pendingRequests">0</p>
            </div>
        </div>

        <div class="charts-container">
            <div class="chart">
                <canvas id="appointmentsChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="revenueChart"></canvas>
            </div>
            <div class="chart">
                <canvas id="cancellationChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(function() {
        $('#dateRange').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month')
        }, function(start, end) {
            fetchData(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
        });

        fetchData(moment().startOf('month').format('YYYY-MM-DD'), moment().endOf('month').format('YYYY-MM-DD'));
    });

    function fetchData(startDate, endDate) {
        $.ajax({
            url: 'fetch_data.php',
            type: 'POST',
            data: {
                start_date: startDate,
                end_date: endDate
            },
            dataType: 'json',
            success: function(response) {
                $('#totalAppointments').text(response.total_appointments);
                $('#confirmedBookings').text(response.confirmed_bookings);
                $('#revenue').text('₱' + parseFloat(response.revenue).toFixed(2));
                $('#newClients').text(response.new_clients);
                $('#cancelledAppointments').text(response.cancelled_appointments);
                $('#pendingRequests').text(response.pending_requests);
                
                updateCharts(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    const ctxAppointments = document.getElementById('appointmentsChart').getContext('2d');
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const ctxCancellation = document.getElementById('cancellationChart').getContext('2d');

    const appointmentsChart = new Chart(ctxAppointments, {
        type: 'bar',
        data: {
            labels: [], 
            datasets: [{
                label: 'Appointments',
                data: [], 
                backgroundColor: '#4e73df',
                borderColor: '#4e73df',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const revenueChart = new Chart(ctxRevenue, {
        type: 'line',
        data: {
            labels: [], 
            datasets: [{
                label: 'Revenue',
                data: [], 
                backgroundColor: '#1cc88a',
                borderColor: '#1cc88a',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const cancellationChart = new Chart(ctxCancellation, {
        type: 'pie',
        data: {
            labels: [], 
            datasets: [{
                label: 'Cancelled Appointments',
                data: [], 
                backgroundColor: ['#e74a3b', '#f6c23e'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    function updateCharts(response) {
    appointmentsChart.data.labels = response.appointment_labels;
    appointmentsChart.data.datasets[0].data = response.appointment_values;
    appointmentsChart.update();

    revenueChart.data.labels = response.revenue_labels;
    revenueChart.data.datasets[0].data = response.revenue_values;
    revenueChart.update();

    cancellationChart.data.labels = ['Cancelled', 'Confirmed'];
    cancellationChart.data.datasets[0].data = [
        response.cancelled_appointments,
        response.total_appointments - response.cancelled_appointments
    ];
    cancellationChart.update();
}

</script>

</body>
</html>
