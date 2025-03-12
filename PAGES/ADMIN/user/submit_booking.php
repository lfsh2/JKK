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
if (isset($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['appointment_date'], $_POST['appointment_time'], $_POST['services'], $_POST['message'])) {
    $client_name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['mobile'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $service_type = $_POST['services'];
    $message = $_POST['message']; 
    $status = 'Pending';

    $sql = "INSERT INTO appointments (client_name, email, phone_number, appointment_date, appointment_time, status, service_type, message)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $client_name, $email, $phone_number, $appointment_date, $appointment_time, $status, $service_type, $message);

    if ($stmt->execute()) {
        sendReceipt($email, $client_name, $appointment_date, $appointment_time, $service_type);
    
        echo "
        <div style='text-align: center; padding: 20px; background-color: #e0f7fa; border-radius: 10px; max-width: 600px; margin: 50px auto;'>
            <h2 style='color: #00796b;'>Booking Successful!</h2>
            <p>Thank you, <strong>$client_name</strong>! Your booking for <strong>$appointment_date</strong> at <strong>$appointment_time</strong> has been confirmed.</p>
            <p>A receipt has been sent to <strong>$email</strong>.</p>
            <p>Service type: <strong>$service_type</strong></p>
            <p>Message: <strong>$message</strong></p>
            <a href='../index.php' style='color: #ffffff; background-color: #00796b; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Return to Homepage</a>
        </div>
        ";
    } else {
        echo "
        <div style='text-align: center; padding: 20px; background-color: #ffccbc; border-radius: 10px; max-width: 600px; margin: 50px auto;'>
            <h2 style='color: #d32f2f;'>Booking Error</h2>
            <p>We encountered an issue while processing your booking. Please try again later.</p>
            <p>Error Details: " . $stmt->error . "</p>
            <a href='../PAGES/ADMIN/appointments.php' style='color: #ffffff; background-color: #d32f2f; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Try Again</a>
        </div>
        ";
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();

function sendReceipt($email, $client_name, $appointment_date, $appointment_time, $service_type) {
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
                <li><strong>Service Type:</strong> $service_type</li>
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
