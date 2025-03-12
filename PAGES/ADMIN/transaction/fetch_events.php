<?php
$host = 'localhost'; 
$db = 'jjk';
$user = 'root'; 
$pass = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT id, title, date, description, color, icon FROM events"); 
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $formattedEvents = array_map(function ($event) {
        return [
            'id' => $event['id'],
            'title' => $event['title'],
            'start' => $event['date'],
            'backgroundColor' => $event['color'],
            'extendedProps' => [
                'description' => $event['description'],
                'icon' => $event['icon']
            ]
        ];
    }, $events);

    echo json_encode($formattedEvents);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
