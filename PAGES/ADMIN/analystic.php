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

$sql = "
    SELECT 
        DATE(appointment_date) AS date,
        COUNT(*) AS total_appointments,
        SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS confirmed_bookings,
        COUNT(DISTINCT email) AS new_clients
    FROM appointments
    WHERE appointment_date BETWEEN '$startDate' AND '$endDate'
    GROUP BY DATE(appointment_date)
    ORDER BY date ASC
";

$result = $conn->query($sql);
$dataPoints = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoints[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Analytics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <style>
        .container {
            width: 100%;
            max-width: 1000px;
            margin: auto;
        }

        .charts-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .chart-container {
            width: 400px;
            height: 400px;
        }

        .chart-container canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Appointments Analytics</h2>
        <div class="card p-4 mb-3">
            <form id="filter-form" class="d-flex flex-wrap justify-content-center align-items-center gap-2">
                <input type="date" id="start_date" name="start_date" class="form-control w-auto" value="<?php echo $startDate; ?>" required>
                <input type="date" id="end_date" name="end_date" class="form-control w-auto" value="<?php echo $endDate; ?>" required>
                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="button" id="downloadPDF" class="btn btn-success">Download PDF</button>
            </form>
        </div>

        <div class="card p-3">
            <table class="table table-bordered text-center" id="data-table">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Total Appointments</th>
                        <th>Confirmed Bookings</th>
                        <th>New Clients</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataPoints as $point): ?>
                        <tr>
                            <td><?php echo $point['date']; ?></td>
                            <td><?php echo $point['total_appointments']; ?></td>
                            <td><?php echo $point['confirmed_bookings']; ?></td>
                            <td><?php echo $point['new_clients']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card p-4">
            <div class="charts-container">
                <div class="chart-container">
                    <canvas id="barChart"></canvas>
                </div>
                <div class="chart-container">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <script>
        window.onload = function() {
            const labels = <?php echo json_encode(array_column($dataPoints, 'date')); ?>;
            const totalAppointments = <?php echo json_encode(array_column($dataPoints, 'total_appointments')); ?>;
            const confirmedBookings = <?php echo json_encode(array_column($dataPoints, 'confirmed_bookings')); ?>;
            const newClients = <?php echo json_encode(array_column($dataPoints, 'new_clients')); ?>;

            if (labels.length === 0) {
                console.error("No data available for charts");
                return;
            }

            const commonOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            };

            const barChartCanvas = document.getElementById('barChart');
            const pieChartCanvas = document.getElementById('pieChart');

            if (barChartCanvas && pieChartCanvas) {
                new Chart(barChartCanvas.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                                label: 'Total Appointments',
                                data: totalAppointments,
                                backgroundColor: '#00d86c'
                            },
                            {
                                label: 'Confirmed Bookings',
                                data: confirmedBookings,
                                backgroundColor: '#4bc0c0'
                            },
                            {
                                label: 'New Clients',
                                data: newClients,
                                backgroundColor: '#ff6384'
                            }
                        ]
                    },
                    options: {
                        ...commonOptions,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                new Chart(pieChartCanvas.getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: ['Total Appointments', 'Confirmed Bookings', 'New Clients'],
                        datasets: [{
                            data: [
                                totalAppointments.reduce((a, b) => a + parseInt(b), 0),
                                confirmedBookings.reduce((a, b) => a + parseInt(b), 0),
                                newClients.reduce((a, b) => a + parseInt(b), 0)
                            ],
                            backgroundColor: ['#00d86c', '#4bc0c0', '#ff6384']
                        }]
                    },
                    options: commonOptions
                });
            } else {
                console.error("Chart elements not found.");
            }
        };


        document.getElementById('downloadPDF').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const pdf = new jsPDF("p", "mm", "a4");

            pdf.text("Appointments Analytics", 80, 10);
            pdf.autoTable({
                html: '#data-table',
                startY: 20
            });

            const barChartCanvas = document.getElementById('barChart');
            const pieChartCanvas = document.getElementById('pieChart');

            const barImage = barChartCanvas.toDataURL('image/png', 1.0);
            const pieImage = pieChartCanvas.toDataURL('image/png', 1.0);

            pdf.addImage(barImage, 'PNG', 10, pdf.autoTable.previous.finalY + 10, 90, 60);
            pdf.addImage(pieImage, 'PNG', 110, pdf.autoTable.previous.finalY + 10, 90, 60);

            pdf.save("Appointments_Analytics.pdf");
        });
    </script>

</body>

</html>