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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../CSS/userpage.css">
</head>

<body>
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
                <h3>Appointment Details:</h3>

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
</body>

</html>
