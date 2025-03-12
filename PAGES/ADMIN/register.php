<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['fname']);
    $middle_name = trim($_POST['mname']); 
    $last_name = trim($_POST['lname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobilenum']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['cpassword']);

    $error = '';

    if ($password !== $password_confirm) {
        $error = "Passwords do not match!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters!";
    }

    if (empty($error)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $verification_code = substr(str_shuffle('0123456789'), 0, 5);

        $sql = "INSERT INTO pending_users (first_name, middle_name, last_name, username, email, mobile, password, verification_code) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $first_name, $middle_name, $last_name, $username, $email, $mobile, $password_hashed, $verification_code);

        if ($stmt->execute()) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'jkkconstructionservices@gmail.com';
                $mail->Password = 'sisv fevo jlxj dwqz';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                $mail->Port = 587;

                $mail->setFrom('jkkconstructionservices@gmail.com', 'JJK');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Verification Code';
                $mail->Body    = "Hi $first_name,<br><br>Your verification code is: <strong>$verification_code</strong><br><br>Please enter this code on the <a href='verification.php?email=$email'>verification page</a> to complete your registration.";

                $mail->send();
                header("Location: verification.php?email=$email");
                exit();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    } else {
        echo "<div class='error'>$error</div>";
    }

    $conn->close();
}
?>
