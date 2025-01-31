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

$cancel_sql = "UPDATE appointments SET status = 'cancelled' WHERE email = ? AND status = 'approved' ORDER BY appointment_date ASC LIMIT 1";
$cancel_stmt = $conn->prepare($cancel_sql);
$cancel_stmt->bind_param('s', $email);

if ($cancel_stmt->execute()) {
    header("Location: no_booking.php");
    exit();
} else {
    echo "<script>alert('Failed to cancel the appointment. Please try again later.'); window.history.back();</script>";
}

$cancel_stmt->close();
$conn->close();
?>
