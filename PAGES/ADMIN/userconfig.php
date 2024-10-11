<?php
// userpanel.php

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user information from the database
$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$sql = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email);
$stmt->fetch();
$stmt->close();

// Prepare user name and initial
$user_name = $first_name . ' ' . $last_name;
$user_initial = strtoupper(substr($first_name, 0, 1));

// Fetch total appointments
$sql = "SELECT COUNT(*) FROM appointments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($total_appointments);
$stmt->fetch();
$stmt->close();

// Fetch upcoming appointments
$sql = "SELECT COUNT(*) FROM appointments WHERE user_id = ? AND appointment_date >= CURDATE()";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($upcoming_appointments);
$stmt->fetch();
$stmt->close();

// Fetch pending notifications
$sql = "SELECT COUNT(*) FROM notifications WHERE user_id = ? AND status = 'unread'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($pending_notifications);
$stmt->fetch();
$stmt->close();

// Fetch recent appointments
$sql = "SELECT appointment_date, appointment_time, service, status FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC LIMIT 5";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$recent_appointments = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Close connection
$conn->close();
?>
