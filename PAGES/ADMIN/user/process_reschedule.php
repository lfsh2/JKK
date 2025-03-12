<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

$new_date = $_POST['new_date'];
$new_time = $_POST['appointment_time'];
$new_service = $_POST['new_service'];
$reason = $_POST['reason'];

if (empty($new_date) || empty($new_time) || empty($new_service) || empty($reason)) {
    echo "<script>alert('All fields are required.'); window.history.back();</script>";
    exit();
}

$update_sql = "UPDATE appointments 
               SET appointment_date = ?, appointment_time = ?, service_type = ?, status = 'Reschedule' 
               WHERE email = ? AND status = 'approved' 
               ORDER BY appointment_date ASC 
               LIMIT 1";

$update_stmt = $conn->prepare($update_sql);
$update_stmt->bind_param('ssss', $new_date, $new_time, $new_service, $email);

if ($update_stmt->execute()) {
    header("Location: reschedule_success.php");
    exit();
} else {
    echo "<script>alert('Failed to reschedule the appointment. Please try again.'); window.history.back();</script>";
}

$update_stmt->close();
$conn->close();
?>
