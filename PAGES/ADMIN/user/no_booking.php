<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Booking</title>
    <link rel="stylesheet" href="../../../CSS/userpage.css">
</head>
<body>
    <div class="container">
        <h1>No Current Booking for Today</h1>
        <p>You currently have no active bookings. Please book a new appointment if needed.</p>
        <!--<a href="userpage.php" class="btn">Go Back to Dashboard</a>-->
    </div>
</body>
</html>
