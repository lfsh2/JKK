<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$startDate = date('Y-m-d', strtotime('-1 month'));
$endDate = date('Y-m-d');

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
}

$sql = "SELECT date, total_appointments, confirmed_bookings, revenue, new_clients FROM analytics_data WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date ASC"; 

$result = $conn->query($sql);

$data = [
    'title' => 'Analytics Report',
    'startDate' => $startDate,
    'endDate' => $endDate,
    'dataPoints' => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data['dataPoints'][] = [
            'date' => $row['date'],
            'totalAppointments' => $row['total_appointments'],
            'confirmedBookings' => $row['confirmed_bookings'],
            'revenue' => '₱' . number_format($row['revenue'], 2), 
            'newClients' => $row['new_clients']
        ];
    }
} else {
    echo "No data found for the selected date range.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Report</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .filter-form {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .chart-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            margin-top: 20px;
        }
        .date-input {
            width: 200px;
            margin: 0 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1><?php echo $data['title']; ?></h1>

    <form method="post" class="filter-form">
        <label for="start_date">Start Date:</label>
        <input type="text" id="start_date" name="start_date" class="date-input" value="<?php echo $data['startDate']; ?>" required>
        
        <label for="end_date">End Date:</label>
        <input type="text" id="end_date" name="end_date" class="date-input" value="<?php echo $data['endDate']; ?>" required>
        
        <button type="submit" class="btn btn-custom">Filter</button>
    </form>

    <p class="text-center">Showing data from: <strong><?php echo $data['startDate']; ?></strong> to <strong><?php echo $data['endDate']; ?></strong></p>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>Date</th>
                <th>Total Appointments</th>
                <th>Confirmed Bookings</th>
                <th>Revenue</th>
                <th>New Clients</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['dataPoints'] as $point): ?>
            <tr>
                <td><?php echo $point['date']; ?></td>
                <td><?php echo $point['totalAppointments']; ?></td>
                <td><?php echo $point['confirmedBookings']; ?></td>
                <td><?php echo $point['revenue']; ?></td>
                <td><?php echo $point['newClients']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    const labels = <?php echo json_encode(array_column($data['dataPoints'], 'date')); ?>;
    const totalAppointments = <?php echo json_encode(array_column($data['dataPoints'], 'totalAppointments')); ?>;
    const confirmedBookings = <?php echo json_encode(array_column($data['dataPoints'], 'confirmedBookings')); ?>;
    const revenues = <?php echo json_encode(array_column($data['dataPoints'], 'revenue')); ?>.map(value => {
        return parseFloat(value.replace('₱', '').replace(',', ''));
    });
    const newClients = <?php echo json_encode(array_column($data['dataPoints'], 'newClients')); ?>;

    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', 
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total Appointments',
                    data: totalAppointments,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Confirmed Bookings',
                    data: confirmedBookings,
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Revenue',
                    data: revenues,
                    backgroundColor: 'rgba(255, 159, 64, 0.5)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                },
                {
                    label: 'New Clients',
                    data: newClients,
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    $(function() {
        $("#start_date, #end_date").datepicker({
            dateFormat: "yy-mm-dd", 
            changeMonth: true,
            changeYear: true,
            maxDate: new Date() 
        });
    });
</script>

</body>
</html>
