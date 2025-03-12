<?php
require 'db_connection.php'; 

header('Content-Type: application/json');

$sql = "SELECT id, client_name AS title, appointment_date AS start, appointment_time, service_type 
        FROM appointments 
        WHERE status = 'approved'";
$result = $conn->query($sql);

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        'id' => $row['id'],
        'title' => $row['title'],  
        'start' => $row['start'],  
        'appointment_time' => $row['appointment_time'],
        'service_type' => $row['service_type'] 
    ];
}

echo json_encode($events);
?>
