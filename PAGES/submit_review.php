<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$name = isset($data['name']) ? $data['name'] : '';
$rating = isset($data['rating']) ? (int)$data['rating'] : 0;
$reviewText = isset($data['reviewText']) ? $data['reviewText'] : '';

if (empty($name) || empty($rating) || empty($reviewText)) {
    echo json_encode(['message' => 'Please fill out all fields.']);
    exit;
}

$mysqli = new mysqli("localhost", "root", "", "jjk");

if ($mysqli->connect_error) {
    die(json_encode(['message' => 'Database connection failed: ' . $mysqli->connect_error]));
}

$query = "INSERT INTO testimonials (name, rating, comment, approved) VALUES (?, ?, ?, 1)";
$stmt = $mysqli->prepare($query);
if ($stmt === false) {
    echo json_encode(['message' => 'Failed to prepare the statement.']);
    $mysqli->close();
    exit;
}

$stmt->bind_param("sis", $name, $rating, $reviewText);
if ($stmt->execute()) {
    echo json_encode(['message' => 'Review submitted successfully!']);
} else {
    echo json_encode(['message' => 'Error submitting review!']);
}

$stmt->close();
$mysqli->close();
?>
