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
            max-width: 80%;
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

        .forget_password {
            width: 90%;
            max-width: 400px;
            background: #1A2138;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .forget_password h2 {
            color: white;
            margin-bottom: 20px;
        }

        .forget_password form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .forget_password label {
            color: white;
            font-size: 1rem;
            text-align: left;
        }

        .forget_password input {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid white;
            outline: none;
            font-size: 1rem;
            background: none;
            color: white;
        }

        .forget_password button {
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

        .forget_password button:hover {
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

            .forget_password {
                width: 100%;
                padding: 20px;
            }

            .forget_password h2 {
                font-size: 1.5rem;
            }

            .forget_password button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="left">
        <img src="../../ASSETS/logo.png" alt="JJK Construction Logo">
    </div>

    <div class="right">
        <div class="forget_password">
            <h2>Forget Password</h2>
            <form action="forgot_password.php" method="post">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <button type="submit">Get Code</button>
            </form>
        </div>
    </div>
</body>
</html>
