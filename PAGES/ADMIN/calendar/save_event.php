<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

    $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

$id = isset($_POST['id']) ? $_POST['id'] : '';
$title = isset($_POST['title']) ? $_POST['title'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$color = isset($_POST['color']) ? $_POST['color'] : '';
$icon = isset($_POST['icon']) ? $_POST['icon'] : '';

$response = array('success' => false);

if ($title && $date && $color && $icon) {
    if ($id) {
        $stmt = $conn->prepare("UPDATE events SET title=?, date=?, description=?, color=?, icon=? WHERE id=?");
        $stmt->bind_param("sssssi", $title, $date, $description, $color, $icon, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO events (title, date, description, color, icon) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $title, $date, $description, $color, $icon);
    }

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['message'] = 'Error executing query: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Missing required data';
}

$conn->close();
echo json_encode($response);
?>
