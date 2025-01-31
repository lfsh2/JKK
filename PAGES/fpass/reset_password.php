<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $code = $_POST['code'];
    $newPassword = $_POST['new_password'];

    if (empty($email) || empty($code) || empty($newPassword)) {
        echo "Please fill in all fields.";
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password_reset_token = ?");
    $stmt->bind_param("ss", $email, $code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $stmtUpdate = $conn->prepare("UPDATE users SET password = ?, password_reset_token = NULL WHERE email = ?");
        $stmtUpdate->bind_param("ss", $hashedPassword, $email);
        $resultUpdate = $stmtUpdate->execute();

        if ($resultUpdate) {
            echo 'Password reset successfully';
            header("Location: /JKK/index.php"); 
            exit();
        } else {   
            echo 'Error updating the database';
        }
    } else {
        echo 'Invalid reset code or email';
    }

    $stmt->close();
}

$conn->close();
?>
