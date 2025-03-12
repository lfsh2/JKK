<?php
$mysqli = new mysqli("localhost", "root", "", "jjk");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $mysqli->real_escape_string($_POST["reviewer-name"]);
    $comment = $mysqli->real_escape_string($_POST["review-text"]);
    
    $rating = isset($_POST["rating"]) ? intval($_POST["rating"]) : 0;
    $imagePath = "";

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $imageName = basename($_FILES["image"]["name"]);
        $imagePath = $targetDir . time() . "_" . $imageName;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            die("<script>alert('Error uploading image.');</script>");
        }
    }

    $query = "INSERT INTO testimonials (name, comment, image_path, rating, approved) 
              VALUES ('$name', '$comment', '$imagePath', '$rating', 0)";

    if ($mysqli->query($query)) {
        echo "<script>alert('Your review has been submitted for approval!'); window.location=document.referrer;</script>";
    } else {
        echo "<script>alert('Error submitting review: " . $mysqli->error . "');</script>";
    }
}

$mysqli->close();
?>
