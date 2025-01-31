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

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];

$sql = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email);
$stmt->fetch();
$stmt->close();

$bookings_sql = "SELECT id, client_name, email, phone_number, appointment_date, appointment_time, status 
FROM appointments WHERE email = ?";
$bookings_stmt = $conn->prepare($bookings_sql);
$bookings_stmt->bind_param('s', $email); 
$bookings_stmt->execute();
$bookings_result = $bookings_stmt->get_result();
$bookings_stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJK Construction Services</title>
    <link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../CSS/userpage.css">
</head>
<body>
    

</html>
<!--
<div class="dashboard-overview">
    <h2>Dashboard Overview</h2>
    <div class="info-cards">
        <div class="card">
            <h3>Total Bookings</h3>
            <p><?php echo $bookings_result->num_rows; ?></p>
        </div>
        <div class="card">
            <h3>Upcoming Bookings</h3>
            <p>2</p> 
        </div>
    </div>
</div>-->

<div class="booking-status">
    <h2>Booking Status</h2>
    <table>
        <thead>
            <tr>
                <!--<th>ID</th>-->
                <th>Client Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $bookings_result->fetch_assoc()): ?>
                <tr>
                    <!--<td><?php echo htmlspecialchars($row['id']); ?></td>-->
                    <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($row['appointment_time']); ?></td>
                    <td>
                        <span class="status <?php echo strtolower($row['status']); ?>">
                            <?php echo ucfirst($row['status']); ?>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>