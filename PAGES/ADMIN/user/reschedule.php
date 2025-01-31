<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'jjk';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$appointmentId = $_GET['appointment_id'] ?? null; 
$currentAppointment = [];

if ($appointmentId) {
    $stmt = $conn->prepare("SELECT client_name, email, phone_number, appointment_date, appointment_time, status, message FROM appointments WHERE id = ?");
    $stmt->bind_param('i', $appointmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $currentAppointment = $result->fetch_assoc();
    } else {
        echo "Appointment not found.";
        exit;
    }
    $stmt->close();
} else {
    echo "No appointment selected.";
    exit;
}

$conn->close();
?>
