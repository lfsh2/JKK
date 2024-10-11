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

$bookings_sql = "SELECT appointment_date, appointment_time, status FROM appointments WHERE id = ?";
$bookings_stmt = $conn->prepare($bookings_sql);
$bookings_stmt->bind_param('i', $user_id);
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
    <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/userpage.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        .user-dashboard {
            display: flex;
        }

        .sidebar {
            width: 250px;
            color: white;
            height: 100vh;
            padding: 20px;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            padding: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        
        .logo img{
            display: flex;
            width: 150px;
            padding: 10px 5px;
        }

        .sidebar-menu li {
            padding: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .sidebar-menu li.active {
            background-color: #45a049;
        }

        .sidebar-menu li:hover {
            background-color: #388e3c;
        }

        .sidebar-menu i {
            margin-right: 10px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .avatar {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: bold;
        }

        .notifications {
            position: relative;
        }

        .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
        }

        .dashboard-overview {
            margin-bottom: 20px;
        }

        .info-cards {
            display: flex;
            gap: 20px;
        }

        .card {
            flex: 1;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .booking-status table {
            width: 100%;
            border-collapse: collapse;
        }

        .booking-status th,
        .booking-status td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .status {
            padding: 5px;
            border-radius: 3px;
            color: white;
        }

        .status.confirmed {
            background-color: green;
        }

        .status.cancelled {
            background-color: red;
        }

        .status.pending {
            background-color: orange;
        }
    </style>
</head>

<body>
    <div class="user-dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="../../ASSETS/logo.png" alt="Logo">
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><i class="fa fa-home"></i> <span>Dashboard</span></li>
                <li><i class="fa fa-calendar"></i> <span>My Bookings</span></li>
                <li><i class="fa fa-user"></i> <span>Profile</span></li>
                <li><i class="fa fa-bell"></i> <span>Notifications</span></li>
                <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> <span>Logout</span></a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="header">
                <div class="user-info">
                    <div class="avatar"><?php echo strtoupper($first_name[0]); ?></div>
                    <div class="user-name"><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></div>
                </div>
                <div class="notifications">
                    <i class="fa fa-bell"></i>
                    <span class="badge">3</span>
                </div>
            </header>

            <section class="dashboard-overview">
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
            </section>

            <section class="booking-status">
                <h2>Booking Status</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $bookings_result->fetch_assoc()) {
                            $appointment_date = $row['appointment_date'];
                            $appointment_time = $row['appointment_time'];
                            $status = $row['status'];

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($appointment_date) . "</td>";
                            echo "<td>" . htmlspecialchars($appointment_time) . "</td>";
                            echo "<td><span class='status " . strtolower($status) . "'>" . ucfirst($status) . "</span></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <script src="../JS/userpage.js"></script>
</body>

</html>