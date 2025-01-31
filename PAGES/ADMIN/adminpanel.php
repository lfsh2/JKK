<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JKK Construction Services</title>
    <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../CSS/adminpanel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        iframe {
            padding-right: 30px;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="group">
            <div id="logo">
                <img src="../../ASSETS/logo.png" alt="Logo">
            </div>
    
            <div class="buttons">
                <a href="dashboard.php" target="contentFrame" class="sidebar-btn active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="transaction.php" target="contentFrame" class="sidebar-btn"><i class="fas fa-credit-card"></i> Transactions</a>
                <a href="appointments.php" target="contentFrame" class="sidebar-btn"><i class="fas fa-credit-card"></i> Appointments</a>
                <a href="analystic.php" target="contentFrame" class="sidebar-btn"><i class="fas fa-chart-line"></i> Analytics</a>
                <a href="calendar.php" target="contentFrame" class="sidebar-btn"><i class="fas fa-calendar-alt"></i> Calendar Schedules</a>
        
                <button onclick="toggleDropdown('dropdown1', 'dropdown2', this)" class="sidebar-btn"><i class="fas fa-file-alt"></i> Pages</button>
                <div class="dropdown" id="dropdown1">
                    <a href="home.php" target="contentFrame" class="sidebar-btn">Home</a>
                    <a href="about.php" target="contentFrame" class="sidebar-btn">About</a>
                    <a href="services.php" target="contentFrame" class="sidebar-btn">Services</a>
                    <a href="projects.php" target="contentFrame" class="sidebar-btn">Projects</a>
                </div>
        
                <button onclick="toggleDropdown('dropdown2', 'dropdown1', this)" class="sidebar-btn"><i class="fas fa-cog"></i> Settings</button>
                <div class="dropdown" id="dropdown2">
                    <!--<a href="managefaqbot.php" target="contentFrame" class="sidebar-btn">Manage FAQ Bot</a>-->
                    <a href="testimonials.php" target="contentFrame" class="sidebar-btn">Manage Testimonials</a>
                   <!-- <a href="admin_register.php" target="contentFrame" class="sidebar-btn">Add Admin</a>-->

                </div>
            </div>
        </div>

        <button onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Log Out</button>
    </div>
    
    <div class="container">
        <nav>
            <!-- <i class="fas fa-sun"></i> -->
            <i class="fas fa-user"></i> 
        </nav>

        <div id="content">
            <iframe src="dashboard.php" name="contentFrame"></iframe>
        </div>
    </div>

    <script>
        document.querySelectorAll('.sidebar-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
            });
        });

        function toggleDropdown(showId, hideId, clickedButton) {
            const showDropdown = document.getElementById(showId);
            const hideDropdown = document.getElementById(hideId);
            const buttons = document.querySelectorAll('.buttons button');
            const links = document.querySelectorAll('.buttons a');

            if (showDropdown.style.display === 'none' || showDropdown.style.display === '') {
                showDropdown.style.display = 'block';
                hideDropdown.style.display = 'none'; 
            } else {
                showDropdown.style.display = 'none';
                clickedButton.classList.remove('active');
            }
        }

        function logOut() {
            window.location.href = 'adminlogin.php';
        }
    </script>

</body>
</html>
