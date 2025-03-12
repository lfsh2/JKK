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

$query = "SELECT * FROM appointments WHERE appointment_date = CURDATE() + INTERVAL 3 DAY";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($appointment = $result->fetch_assoc()) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jkkconstructionservices@gmail.com';
            $mail->Password = 'sisv fevo jlxj dwqz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('jkkconstructionservices@gmail.com', 'JKK');
            $mail->addAddress($appointment['email'], $appointment['client_name']);
            $mail->isHTML(true);
            $mail->Subject = "Reminder: Upcoming Appointment with JKK";
            $mail->Body = "
                <p>Hello <strong>{$appointment['client_name']}</strong>,</p>
                <p>This is a friendly reminder that you have an appointment scheduled in 3 days.</p>
                <p><strong>Appointment Details:</strong></p>
                <ul>
                    <li><strong>Service Type:</strong> {$appointment['service_type']}</li>
                    <li><strong>Date:</strong> {$appointment['appointment_date']}</li>
                    <li><strong>Time:</strong> {$appointment['appointment_time']}</li>
                </ul>
                <p>If you have any questions, feel free to contact us.</p>
                <p>Thank you,</p>
                <p><strong>JJK Construction Services</strong></p>
            ";

            $mail->send();
            echo "Email sent to: {$appointment['email']} ({$appointment['client_name']})<br>";
        } catch (Exception $e) {
            echo "Email failed to {$appointment['email']}: {$mail->ErrorInfo}<br>";
        }
    }
} else {
    echo "No upcoming appointments found.<br>";
}

$conn->close();
?>
