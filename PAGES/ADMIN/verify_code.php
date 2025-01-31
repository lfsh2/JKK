<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verify1 = trim($_POST['verify1']);
    $verify2 = trim($_POST['verify2']);
    $verify3 = trim($_POST['verify3']);
    $verify4 = trim($_POST['verify4']);
    $verify5 = trim($_POST['verify5']);

    $entered_code = $verify1 . $verify2 . $verify3 . $verify4 . $verify5;

    $email = trim($_GET['email']);

    $sql = "SELECT * FROM pending_users WHERE email = ? AND verification_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $entered_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $sql = "INSERT INTO users (first_name, last_name, username, email, mobile, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $user['first_name'], $user['last_name'], $user['username'], $user['email'], $user['mobile'], $user['password']);
        
        if ($stmt->execute()) {
            $sql = "DELETE FROM pending_users WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            
            echo "Your account has been verified successfully!";
            header("Location: http://localhost/jkk/index.php");
            exit();
        } else {
            echo "Error in creating your account: " . $conn->error;
        }
    } else {
        echo "Invalid verification code. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
