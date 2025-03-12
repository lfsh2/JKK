<?php
$mysqli = new mysqli("localhost", "root", "", "jjk");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);

    if (isset($_POST["approve"])) {
        $query = "UPDATE testimonials SET approved = 1 WHERE id = ?";
    } elseif (isset($_POST["reject"])) {
        $query = "DELETE FROM testimonials WHERE id = ?";
    } elseif (isset($_POST["delete"])) {
        $query = "DELETE FROM testimonials WHERE id = ?";
    } else {
        die("Invalid action.");
    }

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Action completed successfully!'); window.location='testimonials.php';</script>";
    } else {
        die("Error executing query: " . $stmt->error);
    }

    $stmt->close();
}

$mysqli->close();
?>
