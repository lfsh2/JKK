<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Overview</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #eef1f7;
            padding: 20px;
        }
        .dashboard-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .stats-box, .chart-container, .transaction-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .stats-box:hover, .chart-container:hover, .transaction-container:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .chart-box {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .chart-container {
            height: 400px;
            padding: 15px;
        }
        .table-striped tbody tr:hover {
            background: #f1f3f7;
        }
    </style>
</head>
<body>
    <h3 class="mb-4 text-center">Dashboard Overview</h3>

    <?php
        $conn = new mysqli("localhost", "root", "", "jjk");
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        $totalAppointments = $conn->query("SELECT COUNT(*) AS count FROM appointments")->fetch_assoc()['count'];
        $confirmedBookings = $conn->query("SELECT COUNT(*) AS count FROM appointments WHERE status = 'Confirmed'")->fetch_assoc()['count'];
        $newClients = $conn->query("SELECT COUNT(*) AS count FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE())")->fetch_assoc()['count'];
        $cancelledAppointments = $conn->query("SELECT COUNT(*) AS count FROM appointments WHERE status = 'Cancelled'")->fetch_assoc()['count'];
        $pendingRequests = $conn->query("SELECT COUNT(*) AS count FROM appointments WHERE status = 'Pending'")->fetch_assoc()['count'];
        
        $serviceTypes = $conn->query("SELECT service_type, COUNT(*) AS count FROM appointments GROUP BY service_type");
        $services = [];
        while ($row = $serviceTypes->fetch_assoc()) {
            $services[$row['service_type']] = $row['count'];
        }

        $monthlyAppointments = $conn->query("SELECT DATE_FORMAT(appointment_date, '%M') as month, COUNT(*) as count FROM appointments GROUP BY DATE_FORMAT(appointment_date, '%M') ORDER BY MIN(appointment_date)");
        $appointmentTrends = [];
        while ($row = $monthlyAppointments->fetch_assoc()) {
            $appointmentTrends[$row['month']] = $row['count'];
        }

        $transactions = $conn->query("SELECT client_name, service_type, status FROM appointments ORDER BY appointment_date DESC LIMIT 5");
    ?>

    <div class="dashboard-container">
        <div class="stats-box">
            <i class="fas fa-calendar-check text-primary fa-2x"></i>
            <h5>Total Appointments</h5>
            <p class="fs-4 fw-bold"><?php echo $totalAppointments; ?></p>
        </div>
        <div class="stats-box">
            <i class="fas fa-check-circle text-success fa-2x"></i>
            <h5>Confirmed Bookings</h5>
            <p class="fs-4 fw-bold"><?php echo $confirmedBookings; ?></p>
        </div>
        <div class="stats-box">
            <i class="fas fa-user-plus text-info fa-2x"></i>
            <h5>New Clients This Month</h5>
            <p class="fs-4 fw-bold"><?php echo $newClients; ?></p>
        </div>
    </div>

    <div class="chart-box mt-4">
        <div class="chart-container">
            <h5>Appointments Trend</h5>
            <canvas id="appointmentsChart"></canvas>
        </div>
        <div class="chart-container">
            <h5>Service Types Booked</h5>
            <canvas id="serviceChart"></canvas>
        </div>
    </div>

    <div class="transaction-container">
        <h5>Recent Transactions</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $transactions->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['client_name']; ?></td>
                    <td><?php echo $row['service_type']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
    function createGradient(ctx, height, color1, color2) {
        let gradient = ctx.createLinearGradient(0, 0, 0, height);
        gradient.addColorStop(0, color1);
        gradient.addColorStop(1, color2);
        return gradient;
    }

    const appointmentsCtx = document.getElementById('appointmentsChart').getContext('2d');
    const appointmentsGradient = createGradient(appointmentsCtx, 400, 'rgba(75, 192, 192, 0.5)', 'rgba(75, 192, 192, 0)');
    new Chart(appointmentsCtx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_keys($appointmentTrends)); ?>,
            datasets: [{
                label: 'Monthly Appointments',
                data: <?php echo json_encode(array_values($appointmentTrends)); ?>,
                borderColor: '#4BC0C0',
                backgroundColor: appointmentsGradient,
                borderWidth: 2,
                fill: true,
                tension: 0.4, 
                pointBackgroundColor: '#4BC0C0',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { position: 'top' },
                tooltip: { enabled: true }
            },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: '#ddd' } }
            }
        }
    });

    const serviceCtx = document.getElementById('serviceChart').getContext('2d');
    new Chart(serviceCtx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode(array_keys($services)); ?>,
            datasets: [{
                label: 'Service Bookings',
                data: <?php echo json_encode(array_values($services)); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>

</body>
</html>
