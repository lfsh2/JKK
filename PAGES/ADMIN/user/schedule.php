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

$sql = "SELECT first_name, last_name, email FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email);
$stmt->fetch();
$stmt->close();

$currentAppointment = [];
$bookings_sql = "SELECT appointment_date, appointment_time, message, service_type 
                 FROM appointments 
                 WHERE email = ? AND status = 'approved' 
                 ORDER BY appointment_date ASC 
                 LIMIT 1";

$bookings_stmt = $conn->prepare($bookings_sql);
if (!$bookings_stmt) {
    die("Prepare failed: " . $conn->error);
}
$bookings_stmt->bind_param('s', $email);
if (!$bookings_stmt->execute()) {
    die("Execute failed: " . $bookings_stmt->error);
}
$bookings_result = $bookings_stmt->get_result();

if ($bookings_result->num_rows > 0) {
    $currentAppointment = $bookings_result->fetch_assoc();
} else {
    $currentAppointment = [
        'appointment_date' => 'No appointment',
        'appointment_time' => 'No appointment',
        'message' => 'No service booked',
        'service_type' => 'No service type'
    ];
}
$bookings_stmt->close();
$conn->close();
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
    <style>

body{
    display: inherit;
    justify-content: center;
}
.schedule {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 1200px;
    margin: auto;
    text-align: center;
    height: 100%;
    overflow-y: auto;
}

.schedule .notice {
    background: #ffeb3b;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    font-weight: bold;
}

.schedule .reschedule-appointment {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.schedule h1 {
    color: #333;
    margin-bottom: 10px;
}

.schedule .input-group {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.schedule .input-block {
    display: flex;
    flex-direction: column;
    text-align: left;
    margin-bottom: 10px;
}

.schedule .input-block label {
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}

.schedule .input-block input, select {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: 0.3s ease-in-out;
    width: 100%;
    background: #fff;
}

.schedule .input-block input:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.schedule .input-blocks {
    margin-bottom: 20px;
    text-align: left;
}

.schedule .input-blocks h4 {
    margin-bottom: 10px;
}

.schedule .group {
    display: flex;
    align-items: center;
    gap: 10px;
}

.schedule .button-block {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 20px;
    color: black;
}

.schedule button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    color: white;
}

.schedule button:hover {
    background: #0056b3;
}

.schedule button:nth-child(1) {
    background: #6c757d;
}

.schedule button:nth-child(1):hover {
    background: #5a6268;
}

.schedule button:nth-child(3) {
    background: #dc3545;
}

.schedule button:nth-child(3):hover {
    background: #c82333;
}

@media (max-width: 480px) {
    .schedule .button-block {
        flex-direction: column;
        gap: 10px;
    }
}

    </style>
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

    <div class="schedule">
        <div class="notice">
            <p>Reschedule Notice. Your appointment booking can only be rescheduled once and 1 day before the appointed date and time.</p>
        </div>

        <div class="reschedule-appointment">
            <div class="top-text">
                <h1>Reschedule Appointment</h1>
                <p>Please take a moment to edit the form</p>
            </div>

            <form action="process_reschedule.php" method="POST">
                <h2>Appointment Details:</h2>

                <div class="current input-group">
                    <h3>Current Appointment</h3>

                    <div class="input-block">
                        <label>Date:</label>
                        <input type="text" value="<?= htmlspecialchars($currentAppointment['appointment_date']) ?>" readonly>
                    </div>
                    <div class="input-block">
                        <label>Time:</label>
                        <input type="text" value="<?= htmlspecialchars($currentAppointment['appointment_time']) ?>" readonly>
                    </div>
                    <div class="input-block">
                        <label>Service:</label>
                        <input type="text" value="<?= htmlspecialchars($currentAppointment['service_type']) ?>" readonly>
                    </div>
                    <div class="input-block">
                        <label>Message:</label>
                        <input type="text" value="<?= htmlspecialchars($currentAppointment['message']) ?>" readonly>
                    </div>
                </div>

                <div class="new-date input-group">
                    <h3>Choose New Date, Time, and Service</h3>

                    <div class="input-block">
                        <label>New Date:</label>
                        <input type="date" id="appointment-date" name="new_date" required>
                    </div>
                    <div class="input-block">
                        <label for="appointment-time">Select Time:</label>
                        <select name="appointment_time" id="appointment-time" required>
                            <option value="8-10am">8:00 AM - 10:00 AM</option>
                            <option value="10-12pm">10:00 AM - 12:00 PM</option>
                            <option value="1-3pm">1:00 PM - 3:00 PM</option>
                            <option value="3-5pm">3:00 PM - 5:00 PM</option>
                        </select>
                    </div>

                    <div class="input-block">
                        <label>Service:</label>
                        <select name="new_service" required>
                            <option value="" disabled selected>Select a Service</option>
                            <option value="Build">Build</option>
                            <option value="Design">Design</option>
                            <option value="Consultation">Consultation</option>
                            <option value="Project Management">Project Management</option>
                        </select>
                    </div>
                </div>

                <div class="input-blocks">
                    <h4>Reason for Rescheduling:</h4>
                    <select name="reason" required>
                        <option value="" disabled selected>Choose your reason</option>
                        <option value="Personal reasons">Personal reasons</option>
                        <option value="Schedule conflict">Schedule conflict</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="input-blocks">
                    <h4>Agreement:</h4>
                    <div class="group">
                        <input type="checkbox" name="agreement" required>
                        <span>I understand that rescheduling may cause changes in the project timeline.</span>
                    </div>
                </div>

                <div class="button-block">
                    <button type="button" onclick="window.history.back();">Back</button>
                    <button type="submit">Confirm Reschedule</button>
                    <button type="button" onclick="cancelBooking()">Cancel Booking</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('appointment-date').setAttribute('min', today);
    </script>
    <script>
        function cancelBooking() {
            if (confirm("Are you sure you want to cancel this appointment?")) {
                window.location.href = "cancel_booking.php";
            }
        }
    </script>

    <script src="../../../script.js"></script>

</body>

</html>
