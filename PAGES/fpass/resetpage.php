<?php
if (isset($_GET['email']) && isset($_GET['name'])) {
    $email = $_GET['email'];
    $name = $_GET['name'];
} else {
    header("Location: forgotpage.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJK Construction Services</title>
    <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body, html {
            width: 100%;
            height: 100%;
            display: flex;
        }

        .left {
            width: 50%;
            background: #070819;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left img {
            max-width: 70%;
            height: auto;
        }

        .right {
            width: 50%;
            background: #0E1729;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .reset_password {
            width: 90%;
            max-width: 400px;
            background: #1A2138;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .reset_password h2 {
            color: white;
            margin-bottom: 20px;
        }

        .reset_password p.greeting {
            color: #2B5EE3;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .reset_password form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .reset_password label {
            color: white;
            font-size: 1rem;
            text-align: left;
        }

        .reset_password input {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid white;
            outline: none;
            font-size: 1rem;
            background: none;
            color: white;
        }

        .reset_password button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            background: #2B5EE3;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .reset_password button:hover {
            background: #1A3D89;
        }

        @media screen and (max-width: 768px) {
            body, html {
                flex-direction: column;
            }

            .left, .right {
                width: 100%;
                height: 50%;
            }

            .left img {
                max-width: 60%;
            }

            .reset_password {
                width: 100%;
                padding: 20px;
            }

            .reset_password h2 {
                font-size: 1.5rem;
            }

            .reset_password button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="left">
        <img src="../../ASSETS/logo.png" alt="JJK Construction Services Logo">
    </div>

    <div class="right">
        <div class="reset_password">
            <h2>Reset Password</h2>
            <p class="greeting">Hello, <?php echo htmlspecialchars($name); ?>! You can now reset your password.</p>
            
            <form action="reset_password.php" method="post">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" readonly>

                <label for="code">Reset Code</label>
                <input type="text" name="code" id="code" required>

                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password" required>

                <button type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
