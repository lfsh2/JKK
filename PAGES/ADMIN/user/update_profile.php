<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id']; 
include 'db_connection.php'; 

$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobilenum'];

$sql = "UPDATE users SET first_name = ?, last_name = ?, username = ?, email = ?, mobile = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sssssi', $first_name, $last_name, $username, $email, $mobile, $user_id);

if ($stmt->execute()) {
    header("Location: userpage.php?update=success");
} else {
    echo "Error updating profile: " . $stmt->error;
}

$stmt->close();
?>
