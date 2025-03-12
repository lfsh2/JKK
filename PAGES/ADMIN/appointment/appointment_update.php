<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$client = $_POST['client'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['appointment_time'];
$status = $_POST['status'];

$allowed_times = ['8-10am', '10-12pm', '1-3pm', '3-5pm'];
if (!in_array($time, $allowed_times)) {
    die("Invalid appointment time selected.");
}


$sql = "UPDATE appointments SET client_name='$client', email='$email', phone_number='$phone', appointment_date='$date', appointment_time='$time', status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Appointment updated successfully!";
    header('Location: ../appointments.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
