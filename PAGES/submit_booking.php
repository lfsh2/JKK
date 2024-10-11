<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'ADMIN/PHPMailer/src/Exception.php';
require 'ADMIN/PHPMailer/src/PHPMailer.php';
require 'ADMIN/PHPMailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['appointment_date'], $_POST['appointment_time'], $_POST['payment_type'])) {
        $client_name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['mobile'];
        $appointment_date = $_POST['appointment_date'];
        $appointment_time = $_POST['appointment_time'];
        $payment_type = $_POST['payment_type'];
        
        $status = 'Pending';

        $sql = "INSERT INTO appointments (client_name, email, phone_number, appointment_date, appointment_time, status)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $client_name, $email, $phone_number, $appointment_date, $appointment_time, $status);

        if ($stmt->execute()) {
            sendReceipt($email, $client_name, $appointment_date, $appointment_time, $payment_type);
            echo "Booking successful! A receipt has been sent to your email.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}

$conn->close();

function sendReceipt($email, $client_name, $appointment_date, $appointment_time, $payment_type) {
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
        $mail->Subject = 'Appointment Booking Receipt';
        $mail->Body    = "
            <h1>Thank you for your booking!</h1>
            <p>Dear $client_name,</p>
            <p>We have received your booking for the following:</p>
            <ul>
                <li><strong>Date:</strong> $appointment_date</li>
                <li><strong>Time:</strong> $appointment_time</li>
                <li><strong>Payment Type:</strong> $payment_type</li>
            </ul>
            <p>We look forward to serving you.</p>
            <p>Best regards,<br>JJK</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        echo "Receipt could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
