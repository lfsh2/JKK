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
    <title>Reschedule Successful</title>
    <link rel="stylesheet" href="../../../CSS/userpage.css">
</head>
<body>
    <div class="container">
        <h1>Appointment Rescheduled Successfully 🎉</h1>
        <p>Your appointment has been successfully rescheduled. Please check your dashboard for updated details.</p>
        <!--<a href="user_dashboard.php" class="btn">Go to Dashboard</a>-->
    </div>
</body>
</html>
