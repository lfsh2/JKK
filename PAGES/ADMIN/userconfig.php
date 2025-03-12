<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email);
$stmt->fetch();
$stmt->close();

$user_name = $first_name . ' ' . $last_name;
$user_initial = strtoupper(substr($first_name, 0, 1));

$sql = "SELECT COUNT(*) FROM appointments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_appointments);
$stmt->fetch();
$stmt->close();

$sql = "SELECT COUNT(*) FROM appointments WHERE user_id = ? AND appointment_date >= CURDATE()";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($upcoming_appointments);
$stmt->fetch();
$stmt->close();

$sql = "SELECT COUNT(*) FROM notifications WHERE user_id = ? AND status = 'unread'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($pending_notifications);
$stmt->fetch();
$stmt->close();

$sql = "SELECT appointment_date, appointment_time, service, status FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$recent_appointments = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$conn->close();
?>
