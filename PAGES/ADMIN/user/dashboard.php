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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../../CSS/navbar.css">
    <link rel="stylesheet" href="../../../CSS/index2.css">
    <link rel="stylesheet" href="../../../CSS/userpage.css">
    

</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../../ASSETS/logo.png" alt="Logo">
            </div>

            <ul class="links">
                <a href="../../../index.php">HOME</a>
                <a href="../../about.php">ABOUT</a>
                <div class="dropdown">
                    <a href="../../SERVICES/services.php" class="service-btn">SERVICES</a>
                    <div class="dropdown-block">
                        <div class="dropdown-content">
                            <button class="submenu-toggle" data-submenu="submenu1">Build</button>
                            <div class="submenu" id="submenu1">
                                <a href="../../SERVICES/BUILD/newbuild.php">New Build</a>
                                <a href="../../SERVICES/BUILD/renovation.php">Renovation</a>
                                <a href="../../SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
                                <a href="../../SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
                            </div>

                            <button class="submenu-toggle" data-submenu="submenu2">Design</button>
                            <div class="submenu" id="submenu2">
                                <a href="../../SERVICES/DESIGN/architectural.php">Architectural Design</a>
                                <a href="../../SERVICES/DESIGN/structural.php">Structural Design</a>
                                <a href="../../SERVICES/DESIGN/electrical.php">Electrical Design</a>
                                <a href="../../SERVICES/DESIGN/interior.php">Interior Design</a>
                            </div>

                            <button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
                            <div class="submenu" id="submenu3">
                                <a href="../../SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
                                <a href="../../SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
                                <a href="../../SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
                            </div>

                            <a href="SERVICES/projectmanagement.php">Project Management</a>
                        </div>
                    </div>
                </div>
                <a href="../../projects.php">PROJECTS</a>
            </ul>

            <div class="user-login">
                <?php if (isset($_SESSION["username"])): ?>
                    <div class="user-dropdown">
                        <button class="user-btn"><?= htmlspecialchars($_SESSION["username"]) ?> ▼</button>
                        <div class="user-dropdown-content">
                            <a href="dashboard.php">Booking Status</a>
                            <a href="schedule.php">Check My Appointment</a>
                            <a href="appointment.php">Book an Appointment</a>
                            <a href="edit_profile.php">Edit Profile</a>
                            <a href="logout.php" class="logout-btn">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <button onclick="toggleLoginModal()">Login</button>
                <?php endif; ?>
            </div>

            <button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
        </nav>
    </header>

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

<script src="../../../script.js"></script>

</body>
</html>
