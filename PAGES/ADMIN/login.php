<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JJK Construction Services</title>
    <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../CSS/admin.css">
    <style>
        @media screen and (max-width: 992px) {
            .admin {
                height: 100vh;
            }

            .img-block {
                display: none;
            }

            .form,
            .verification {
                width: 100%;
            }
        }

        .signup {
            height: auto;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="admin">
        <div class="img-block">
            <img src="../../ASSETS/logo.png" alt="">
        </div>

        <div class="form">
            <form action="" method="POST">
                <nav>
                    <a href="../../PAGES/ADMIN/login.php">User</a>
                    <a href="../../PAGES/ADMIN/adminlogin.php">Admin</a>
                </nav>

                <img src="../../ASSETS/logo.png" alt="">

                <h1>Login</h1>

                <div class="input-block">
                    <input type="text" name="username" id="username" placeholder=" " required>
                    <label for="username">Username</label>
                </div>
                <div class="input-block">
                    <input type="password" name="password" id="password" placeholder=" " required>
                    <label for="password">Password</label>
                </div>

                <?php
                session_start();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = trim($_POST['username']);
                    $password = trim($_POST['password']);

                    $conn = new mysqli("localhost", "root", "", "jjk");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM users WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();

                        if (password_verify($password, $user['password'])) {
                            $_SESSION['id'] = $user['id'];
                            header("Location: userpage.php");
                            exit();
                        } else {
                            echo "<div class='error'>Incorrect password.</div>";
                        }
                    } else {
                        echo "<div class='error'>Username not found.</div>";
                    }

                    $stmt->close();
                    $conn->close();
                }
                ?>

                <p>Don't have an account? <a href="../../PAGES/ADMIN/signup.php">Signup</a></p>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>