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
$time = $_POST['time'];
$status = $_POST['status'];

$sql = "UPDATE appointments SET client_name='$client', email='$email', phone_number='$phone', appointment_date='$date', appointment_time='$time', status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success_message'] = "Appointment updated successfully!";
    header('Location: appointment_index.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
