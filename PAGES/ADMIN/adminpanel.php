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
    <link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
    <title>JKK ADMIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <aside class="w-64 bg-gray-900 text-white p-4 space-y-6" id="sidebar">
            <div class="text-center">
                <img src="../../ASSETS/logo.png" alt="Logo" class="h-12 mx-auto">
            </div>
            <nav>
                <a href="dashboard.php" target="contentFrame" class="block p-3 rounded-md hover:bg-gray-700"><i class="fas fa-home mr-2"></i>Dashboard</a>
                <a href="transaction.php" target="contentFrame" class="block p-3 rounded-md hover:bg-gray-700"><i class="fas fa-credit-card mr-2"></i>Transactions</a>
                <a href="appointments.php" target="contentFrame" class="block p-3 rounded-md hover:bg-gray-700"><i class="fas fa-calendar-check mr-2"></i>Appointments</a>
                <a href="analystic.php" target="contentFrame" class="block p-3 rounded-md hover:bg-gray-700"><i class="fas fa-chart-line mr-2"></i>Analytics</a>
                <a href="calendar.php" target="contentFrame" class="block p-3 rounded-md hover:bg-gray-700"><i class="fas fa-calendar-alt mr-2"></i>Calendar</a>
                
               

                <button class="w-full text-left p-3 rounded-md hover:bg-gray-700" onclick="toggleDropdown('settingsDropdown')">
                    <i class="fas fa-cog mr-2"></i> Settings
                </button>
                <div id="settingsDropdown" class="hidden ml-5 space-y-2">
                    <a href="testimonials.php" target="contentFrame" class="block p-2 rounded-md hover:bg-gray-700">Manage Testimonials</a>
                    <button class="w-full text-left p-3 rounded-md hover:bg-gray-700" onclick="toggleDropdown('pagesDropdown')">
                    <i class="fas fa-file-alt mr-2"></i> Pages
                </button>
                <div id="pagesDropdown" class="hidden ml-5 space-y-2">
                    <a href="home.php" target="contentFrame" class="block p-2 rounded-md hover:bg-gray-700">Home</a>
                    <a href="about.php" target="contentFrame" class="block p-2 rounded-md hover:bg-gray-700">About</a>
                    <a href="services.php" target="contentFrame" class="block p-2 rounded-md hover:bg-gray-700">Services</a>
                    <a href="projects.php" target="contentFrame" class="block p-2 rounded-md hover:bg-gray-700">Projects</a>
                </div>
                </div>
            </nav>
            <button onclick="logOut()" class="w-full bg-red-600 hover:bg-red-700 p-3 rounded-md mt-6"><i class="fas fa-sign-out-alt mr-2"></i> Log Out</button>
        </aside>

        <div class="flex-1 flex flex-col">
            <nav class="bg-white shadow-md p-4 flex justify-between">
                <button onclick="toggleSidebar()" class="md:hidden text-gray-900">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <i class="fas fa-user-circle text-gray-600 text-xl"></i>
                </div>
            </nav>
            <div class="flex-1 overflow-auto p-6">
                <iframe src="dashboard.php" name="contentFrame" class="w-full h-full border rounded-md"></iframe>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(id) {
            document.getElementById(id).classList.toggle("hidden");
        }

        function logOut() {
            window.location.href = 'adminlogin.php';
        }

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle("hidden");
        }
    </script>
</body>
</html>
