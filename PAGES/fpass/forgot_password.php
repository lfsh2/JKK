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

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $name = $user['name']; 
        
        $resetToken = generateRandomCode();
        $tokenExpiry = date('Y-m-d H:i:s', strtotime('+1 hour')); 

        $sql = "UPDATE users SET password_reset_token = '$resetToken', token_expiry = '$tokenExpiry' WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result) {
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
                $mail->Subject = 'Password Reset Code';
                $mail->Body = 'Your password reset code is: ' . $resetToken;

                $mail->send();

                header("Location: resetpage.php?email=$email&name=$name");
                exit();
            } catch (Exception $e) {
                echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        } else {
            echo 'Error updating the database';
        }
    } else {
        echo 'Email not found in the database';
    }
}

$conn->close();

function generateRandomCode($length = 6) {
    return strtoupper(bin2hex(random_bytes($length)));
}
?>

