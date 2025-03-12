
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
                            header("Location: ../../PAGES/ADMIN/user/userpage.php");
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
