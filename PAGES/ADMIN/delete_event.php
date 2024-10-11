<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$sql = "DELETE FROM events WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$response = ['success' => false, 'message' => ''];

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['message'] = "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>