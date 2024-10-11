<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['date'])) {
    $selected_date = $_GET['date'];

    $query = "SELECT appointment_time FROM appointments WHERE appointment_date = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $selected_date);
    $stmt->execute();
    $result = $stmt->get_result();

    $booked_times = [];
    while ($row = $result->fetch_assoc()) {
        $booked_times[] = $row['appointment_time'];
    }

    $all_times = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00'];

    $available_times = array_diff($all_times, $booked_times);

    echo json_encode(array_values($available_times));
}

$stmt->close();
$conn->close();
?>
