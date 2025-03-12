<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "your_database";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get the date range from the request
$start_date = $_POST['start_date'] ?? date('Y-m-01');
$end_date = $_POST['end_date'] ?? date('Y-m-t');

// Query to fetch stats
$sql = "
    SELECT 
        (SELECT COUNT(*) FROM appointments WHERE appointment_date BETWEEN '$start_date' AND '$end_date') AS total_appointments,
        (SELECT COUNT(*) FROM appointments WHERE status = 'confirmed' AND appointment_date BETWEEN '$start_date' AND '$end_date') AS confirmed_bookings,
        (SELECT COUNT(*) FROM appointments WHERE status = 'cancelled' AND appointment_date BETWEEN '$start_date' AND '$end_date') AS cancelled_appointments,
        (SELECT COUNT(*) FROM appointments WHERE status = 'pending' AND appointment_date BETWEEN '$start_date' AND '$end_date') AS pending_requests,
        (SELECT COUNT(DISTINCT email) FROM appointments WHERE appointment_date BETWEEN '$start_date' AND '$end_date') AS new_clients
";

$result = $conn->query($sql);
$data = $result->fetch_assoc() ?? [];

// Query for appointment trend chart
$appointment_labels = [];
$appointment_values = [];

$chart_sql = "
    SELECT DATE(appointment_date) as appointment_date, COUNT(*) as count 
    FROM appointments 
    WHERE appointment_date BETWEEN '$start_date' AND '$end_date' 
    GROUP BY DATE(appointment_date)
";
$chart_result = $conn->query($chart_sql);

while ($row = $chart_result->fetch_assoc()) {
    $appointment_labels[] = $row['appointment_date'];
    $appointment_values[] = $row['count'];
}

$data['appointment_labels'] = $appointment_labels;
$data['appointment_values'] = $appointment_values;

echo json_encode($data);
?>
