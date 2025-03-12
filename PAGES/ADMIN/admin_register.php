<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6c63ff, #a663ff);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .container button {
            width: 100%;
            padding: 12px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .container button:hover {
            background: #534bc1;
        }
        .success, .error {
            margin-top: 20px;
            font-size: 14px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background: #e0ffe0;
            color: #2e7d32;
        }
        .error {
            background: #ffe0e0;
            color: #c62828;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #6c63ff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register Admin</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Register</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT);
            $verification_code = bin2hex(random_bytes(16));

            $conn = new mysqli("localhost", "root", "", "jjk");

            if ($conn->connect_error) {
                die("<div class='error'>Connection failed: " . $conn->connect_error . "</div>");
            }

            $check = "SELECT * FROM admin WHERE username = ? OR email = ?";
            $stmt = $conn->prepare($check);
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='error'>Username or Email already exists!</div>";
            } else {
                $sql = "INSERT INTO admin (username, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $username, $email, $password, $verification_code);

                if ($stmt->execute()) {
                    $mail = new PHPMailer(true);

                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.example.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'your-email@example.com';
                        $mail->Password = 'your-email-password';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port = 587;

                        $mail->setFrom('your-email@example.com', 'Admin Registration');
                        $mail->addAddress($email, $username);

                        $mail->isHTML(true);
                        $mail->Subject = 'Verify Your Email';
                        $mail->Body = "
                            <h1>Email Verification</h1>
                            <p>Thank you for registering as an admin. Please verify your email address by clicking the link below:</p>
                            <a href='http://yourwebsite.com/verify_email.php?code=$verification_code'>Verify Email</a>
                        ";

                        $mail->send();
                        echo "<div class='success'>Registration successful! Please check your email to verify your account.</div>";
                    } catch (Exception $e) {
                        echo "<div class='error'>Verification email could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
                    }
                } else {
                    echo "<div class='error'>Error: " . $stmt->error . "</div>";
                }
            }

            $stmt->close();
            $conn->close();
        }
        ?>

    </div>
</body>
</html>
