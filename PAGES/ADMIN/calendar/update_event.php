<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

$id = $_POST['id'] ?? '';
$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
$description = $_POST['description'] ?? '';

if (empty($id) || empty($title) || empty($date)) {
    echo json_encode(['success' => false, 'message' => 'ID, Title, and Date are required.']);
    exit();
}

$sql = "UPDATE events SET title = ?, start = ?, description = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param('sssi', $title, $date, $description, $id);

$response = ['success' => false, 'message' => ''];
if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['message'] = 'Failed to update event: ' . $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
