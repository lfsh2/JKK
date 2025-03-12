<?php
header("Content-Type: application/json");

$mysqli = new mysqli("localhost", "root", "", "jjk");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$data = json_decode(file_get_contents("php://input"));
$name = $mysqli->real_escape_string($data->name);
$comment = $mysqli->real_escape_string($data->comment);

$sql = "INSERT INTO testimonials (name, comment, approved) VALUES ('$name', '$comment', 0)";
if ($mysqli->query($sql) === TRUE) {
    echo json_encode(["message" => "Review submitted for approval"]);
} else {
    echo json_encode(["message" => "Error: " . $mysqli->error]);
}

$mysqli->close();
?>
