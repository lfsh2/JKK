<?php
$host = 'localhost';
$dbname = 'jjk';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$sqlSummary = "SELECT 
                    SUM(total_appointments) AS total_appointments, 
                    SUM(confirmed_bookings) AS confirmed_bookings, 
                    SUM(revenue) AS revenue, 
                    SUM(new_clients) AS new_clients
                FROM analytics_data 
                WHERE date BETWEEN ? AND ?";

$stmtSummary = $conn->prepare($sqlSummary);
$stmtSummary->bind_param('ss', $start_date, $end_date);
$stmtSummary->execute();
$resultSummary = $stmtSummary->get_result();
$dataSummary = $resultSummary->fetch_assoc();

$sqlAppointments = "SELECT 
                        DATE_FORMAT(date, '%Y-%m-%d') AS date, 
                        SUM(total_appointments) AS total_appointments
                    FROM analytics_data 
                    WHERE date BETWEEN ? AND ?
                    GROUP BY DATE_FORMAT(date, '%Y-%m-%d')
                    ORDER BY DATE_FORMAT(date, '%Y-%m-%d')";

$stmtAppointments = $conn->prepare($sqlAppointments);
$stmtAppointments->bind_param('ss', $start_date, $end_date);
$stmtAppointments->execute();
$resultAppointments = $stmtAppointments->get_result();

$appointmentLabels = [];
$appointmentValues = [];
while ($row = $resultAppointments->fetch_assoc()) {
    $appointmentLabels[] = $row['date'];
    $appointmentValues[] = $row['total_appointments'];
}

$sqlRevenue = "SELECT 
                    DATE_FORMAT(date, '%Y-%m-%d') AS date, 
                    SUM(revenue) AS revenue
                FROM analytics_data 
                WHERE date BETWEEN ? AND ?
                GROUP BY DATE_FORMAT(date, '%Y-%m-%d')
                ORDER BY DATE_FORMAT(date, '%Y-%m-%d')";

$stmtRevenue = $conn->prepare($sqlRevenue);
$stmtRevenue->bind_param('ss', $start_date, $end_date);
$stmtRevenue->execute();
$resultRevenue = $stmtRevenue->get_result();

$revenueLabels = [];
$revenueValues = [];
while ($row = $resultRevenue->fetch_assoc()) {
    $revenueLabels[] = $row['date'];
    $revenueValues[] = $row['revenue'];
}

$response = array_merge($dataSummary, [
    'appointment_labels' => $appointmentLabels,
    'appointment_values' => $appointmentValues,
    'revenue_labels' => $revenueLabels,
    'revenue_values' => $revenueValues
]);

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>