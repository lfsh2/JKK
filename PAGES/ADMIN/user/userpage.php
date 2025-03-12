<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['id'];
$sql = "SELECT first_name, last_name, email, profile_image FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $profile_image);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKK Construction Services</title>
    <link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../CSS/userpage.css">
    <style>
        .main-content {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        iframe {
            width: 100%;
            height: calc(100vh - 100px); 
            border: none;
        }

        .sidebar-menu li.active a {
            font-weight: bold;
            color: rgb(159, 164, 198); 
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ccc;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="user-dashboard">
        <aside class="sidebar" id="useradmin-sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="../../../ASSETS/logo.png" alt="Logo">
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><a href="#" onclick="loadPage('dashboard.php')"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="#" onclick="loadPage('edit_profile.php')"><i class="fa fa-user"></i> <span>Edit Profile</span></a></li>
                <li><a href="#" onclick="loadPage('schedule.php')"><i class="fa fa-calendar"></i> <span>Schedule</span></a></li>
                <li><a href="#" onclick="loadPage('appointment.php')"><i class="fa fa-calendar"></i> <span>Appointment</span></a></li>
                <li><a href="#" onclick="loadPage('services.php')"><i class="fa fa-rocket"></i> <span>Services</span></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> <span>Logout</span></a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header class="header">
                <div class="user-info">
                    <div class="avatar">
                        <?php if (!empty($profile_image)): ?>
                            <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Profile Picture">
                        <?php else: ?>
                            <span><?php echo strtoupper($first_name[0]); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="user-name"><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></div>
                </div>

                
                <button onclick="toggleSidebar()" class="toggleSidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </header>

            <iframe id="contentFrame" src="dashboard.php"></iframe>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('useradmin-sidebar');
            sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
        }

        function loadPage(pageUrl) {
            document.getElementById('contentFrame').src = pageUrl;

            var links = document.querySelectorAll('.sidebar-menu li');
            links.forEach(function(link) {
                link.classList.remove('active');
            });
            event.target.parentElement.classList.add('active');
        }
    </script>
</body>

</html>
