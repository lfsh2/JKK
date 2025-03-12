<?php
include('db_connection.php');

$events = [];

$sql = "SELECT * FROM appointments WHERE status = 'approved'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $startDateTime = $row['appointment_date'] . 'T' . $row['appointment_time']; 
    
    $events[] = [
        'title' => $row['service_type'], 
        'start' => $startDateTime,         
        'description' => $row['message'],  
        'color' => '#28a745',              
        'icon' => 'fas fa-check-circle'    
    ];
}

echo json_encode($events);
?>
