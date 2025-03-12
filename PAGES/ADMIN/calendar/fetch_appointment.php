<?php
$host = 'localhost'; 
$db = 'jjk';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT client_name, email, appointment_date, appointment_time, service_type 
                           FROM appointment WHERE status = 'Approved'"); 
    $stmt->execute();
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $formattedAppointments = array_map(function ($appointment) {
        return [
            'title' => $appointment['client_name'] . ' - ' . $appointment['service_type'],
            'start' => $appointment['appointment_date'] . 'T' . $appointment['appointment_time'],
            'extendedProps' => [
                'email' => $appointment['email'],
                'service_type' => $appointment['service_type']
            ]
        ];
    }, $appointments);

    echo json_encode($formattedAppointments);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
