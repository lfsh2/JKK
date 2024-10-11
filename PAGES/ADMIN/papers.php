<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel - JJK Construction Services</title>
    <link rel="shortcut icon" href="../ASSETS/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../CSS/userpanel.css"> <!-- Create this CSS file -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
    <style>
        /* userpanel.css */

/* General Styles */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f4f6f9;
    color: #333;
}

.dashboard-container {
    display: flex;
    height: 100vh;
    overflow: hidden;
}

/* Sidebar Styles */
.sidebar {
    width: 250px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    padding: 20px;
    position: fixed;
    height: 100%;
    transition: width 0.3s ease;
    z-index: 1000;
}

.sidebar.collapsed {
    width: 80px;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar-logo {
    width: 60px;
    height: 60px;
}

.sidebar-header h2 {
    font-size: 1.5rem;
    margin: 10px 0 0 0;
    display: inline-block;
}

.sidebar-menu {
    list-style: none;
    padding: 0;
}

.sidebar-menu li {
    display: flex;
    align-items: center;
    padding: 15px 10px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.sidebar-menu li:hover,
.sidebar-menu li.active {
    background: rgba(0, 123, 255, 0.1);
}

.sidebar-menu li i {
    margin-right: 15px;
    font-size: 1.2rem;
    width: 25px;
    text-align: center;
}

.sidebar.collapsed .sidebar-header h2,
.sidebar.collapsed .sidebar-menu li span {
    display: none;
}

.sidebar.collapsed .sidebar-logo {
    margin: 0 auto;
}

/* Main Content Styles */
.main-content {
    margin-left: 250px;
    padding: 20px;
    width: calc(100% - 250px);
    transition: margin-left 0.3s ease, width 0.3s ease;
}

.sidebar.collapsed ~ .main-content {
    margin-left: 80px;
    width: calc(100% - 80px);
}

/* Header Styles */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    padding: 10px 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 500;
}

.header-left {
    display: flex;
    align-items: center;
}

.menu-toggle {
    background: none;
    border: none;
    font-size: 1.5rem;
    margin-right: 20px;
    cursor: pointer;
    display: none; /* Hidden on larger screens */
}

.header-left h1 {
    font-size: 1.5rem;
    margin: 0;
}

.header-right {
    display: flex;
    align-items: center;
}

.notification {
    position: relative;
    margin-right: 20px;
    cursor: pointer;
}

.notification .badge {
    position: absolute;
    top: -5px;
    right: -10px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 0.7rem;
}

.user-profile {
    display: flex;
    align-items: center;
    cursor: pointer;
}

.user-profile .avatar {
    width: 35px;
    height: 35px;
    background: #007bff;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-right: 10px;
}

.user-profile .user-name {
    font-size: 1rem;
}

/* Dashboard Overview */
.dashboard-overview {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    flex-wrap: wrap;
}

.card {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    width: 30%;
    min-width: 200px;
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}

.card-icon {
    font-size: 2rem;
    color: #007bff;
    margin-right: 15px;
}

.card-info h3 {
    margin: 0;
    font-size: 1.2rem;
}

.card-info p {
    margin: 5px 0 0 0;
    font-size: 1rem;
    font-weight: bold;
}

/* Recent Appointments */
.recent-appointments {
    margin-top: 40px;
}

.recent-appointments h2 {
    margin-bottom: 20px;
    font-size: 1.5rem;
}

.recent-appointments table {
    width: 100%;
    border-collapse: collapse;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.recent-appointments th, 
.recent-appointments td {
    padding: 15px;
    text-align: left;
}

.recent-appointments th {
    background: #007bff;
    color: white;
}

.recent-appointments tr:nth-child(even) {
    background: rgba(255, 255, 255, 0.6);
}

.status {
    padding: 5px 10px;
    border-radius: 20px;
    color: white;
    font-size: 0.9rem;
    text-transform: uppercase;
    display: inline-block;
}

.status.confirmed {
    background: #28a745;
}

.status.pending {
    background: #ffc107;
}

.status.cancelled {
    background: #dc3545;
}

/* Footer Styles */
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
    text-align: center;
    padding: 10px 0;
    box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .dashboard-overview {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 80%;
    }

    .recent-appointments table {
        font-size: 0.9rem;
    }
}

@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: -250px;
        transition: left 0.3s ease;
    }

    .sidebar.collapsed {
        left: 0;
    }

    .main-content {
        margin-left: 0;
        width: 100%;
    }

    .menu-toggle {
        display: block;
    }
}

    </style>
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="../ASSETS/logo.png" alt="Logo" class="sidebar-logo">
                <h2>JJK Panel</h2>
            </div>
            <ul class="sidebar-menu">
                <li class="active"><i class="fa fa-home"></i> <span>Dashboard</span></li>
                <li><i class="fa fa-calendar"></i> <span>Appointments</span></li>
                <li><i class="fa fa-user"></i> <span>Profile</span></li>
                <li><i class="fa fa-lock"></i> <span>Account Management</span></li>
                <li><i class="fa fa-bell"></i> <span>Notifications</span></li>
                <li><i class="fa fa-sign-out-alt"></i> <span>Logout</span></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle"><i class="fa fa-bars"></i></button>
                    <h1>Dashboard</h1>
                </div>
                <div class="header-right">
                    <div class="notification">
                        <i class="fa fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="user-profile">
                        <div class="avatar">A</div> 
                        <span class="user-name">Shan</span> 
                    </div>
                </div>
            </header>

            <section class="dashboard-overview">
                <div class="card">
                    <div class="card-icon"><i class="fa fa-calendar"></i></div>
                    <div class="card-info">
                        <h3>Total Appointments</h3>
                        <p>5</p> <!-- Replace with dynamic data -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fa fa-clock"></i></div>
                    <div class="card-info">
                        <h3>Upcoming Appointments</h3>
                        <p>2</p> <!-- Replace with dynamic data -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fa fa-comments"></i></div>
                    <div class="card-info">
                        <h3>New Notifications</h3>
                        <p>3</p> <!-- Replace with dynamic data -->
                    </div>
                </div>
            </section>

            <!-- Recent Appointments -->
            <section class="recent-appointments">
                <h2>Recent Appointments</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-10-05</td>
                            <td>10:00 AM</td>
                            <td>New Build Consultation</td>
                            <td><span class="status confirmed">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td>2024-10-10</td>
                            <td>02:00 PM</td>
                            <td>Renovation Planning</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </section>
        </div>
    </div>

    <!-- Footer (Optional) -->
    <footer>
        <p>&copy; 2024 JJK Construction Services. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="../script.js"></script> <!-- Update as needed -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
    <script>
        // JavaScript for interactive elements (e.g., sidebar toggle)
        const menuToggle = document.querySelector('.menu-toggle');
        const sidebar = document.querySelector('.sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>

</html>
