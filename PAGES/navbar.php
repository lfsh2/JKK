<?php
session_start();
?>

<nav class="navbar">
    <div class="logo">
        <img src="ASSETS/logo.png" alt="Logo">
    </div>

    <ul class="links">
        <a href="index.php">HOME</a>
        <a href="PAGES/about.php">ABOUT</a>
        <div class="dropdown">
            <a href="PAGES/SERVICES/services.php" class="service-btn">SERVICES</a>
            <div class="dropdown-block">
                <div class="dropdown-content">
                    <button class="submenu-toggle" data-submenu="submenu1">Build</button>
                    <div class="submenu" id="submenu1">
                        <a href="PAGES/SERVICES/BUILD/newbuild.php">New Build</a>
                        <a href="PAGES/SERVICES/BUILD/renovation.php">Renovation</a>
                        <a href="PAGES/SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
                        <a href="PAGES/SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
                    </div>

                    <button class="submenu-toggle" data-submenu="submenu2">Design</button>
                    <div class="submenu" id="submenu2">
                        <a href="PAGES/SERVICES/DESIGN/architectural.php">Architectural Design</a>
                        <a href="PAGES/SERVICES/DESIGN/structural.php">Structural Design</a>
                        <a href="PAGES/SERVICES/DESIGN/electrical.php">Electrical Design</a>
                        <a href="PAGES/SERVICES/DESIGN/interior.php">Interior Design</a>
                    </div>

                    <button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
                    <div class="submenu" id="submenu3">
                        <a href="PAGES/SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
                        <a href="PAGES/SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
                        <a href="PAGES/SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
                    </div>

                    <a href="PAGES/SERVICES/projectmanagement.php">Project Management</a>
                </div>
            </div>
        </div>
        <a href="PAGES/projects.php">PROJECTS</a>
    </ul>

    <div class="user-login">
        <?php if (isset($_SESSION["username"])): ?>
            <div class="user-dropdown">
                <button class="user-btn"><?= htmlspecialchars($_SESSION["username"]) ?> ▼</button>
                <div class="user-dropdown-content">
                    <a href="PAGES/ADMIN/user/dashboard.php">Booking Status</a>
                    <a href="PAGES/ADMIN/user/schedule.php">Check my Appointment</a>
                    <a href="PAGES/ADMIN/user/appointment.php">Book an Appointment</a>
                    <a href="PAGES/ADMIN/user/edit_profile.php">Edit Profile</a>
                    <a href="PAGES/logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <button onclick="toggleLoginModal()">Login</button>
        <?php endif; ?>
    </div>

    <button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
</nav>

<div class="responsive-links" id="responsive-dropdown">
    <ul class="links">
        <a href="../home.php" class="nav-btn">HOME</a>
        <a href="../PAGES/about.php" class="nav-btn">ABOUT</a>
        <div class="dropdown" id="responsiveDropdown">
            <a href="../PAGES/SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>

            <div class="dropdown-content">
                <div class="dropdown-subMenu" id="subMenu1">
                    <button onclick="toggleResponsiveSubmenu('subMenu1')" class="nav-btn">Build <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="submenu-content">
                        <a href="../PAGES/SERVICES/BUILD/newbuild.php" class="nav-btn">New Build</a>
                        <a href="../PAGES/SERVICES/BUILD/renovation.php" class="nav-btn">Renovation</a>
                        <a href="../PAGES/SERVICES/BUILD/knockdownandrebuild.php" class="nav-btn">Knockdown and Rebuild</a>
                        <a href="../PAGES/SERVICES/BUILD/electricalinstallation.php" class="nav-btn">Electrical Installation</a>
                    </div>
                </div>
                <div class="dropdown-subMenu" id="subMenu2">
                    <button onclick="toggleResponsiveSubmenu('subMenu2')" class="nav-btn">Design <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="submenu-content">
                        <a href="../PAGES/SERVICES/DESIGN/architectural.php" class="nav-btn">Architectural Design</a>
                        <a href="../PAGES/SERVICES/DESIGN/structural.php" class="nav-btn">Structural Design</a>
                        <a href="../PAGES/SERVICES/DESIGN/electrical.php" class="nav-btn">Electrical Design</a>
                        <a href="../PAGES/SERVICES/DESIGN/interior.php" class="nav-btn">Interior Design</a>
                    </div>
                </div>
                <div class="dropdown-subMenu" id="subMenu3">
                    <button onclick="toggleResponsiveSubmenu('subMenu3')" class="nav-btn">Consultation <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="submenu-content">
                        <a href="../PAGES/SERVICES/CONSULTATION/propertyinspection.php" class="nav-btn">Property Inspection</a>
                        <a href="../PAGES/SERVICES/CONSULTATION/conceptual.php" class="nav-btn">Conceptual Cost Estimate</a>
                        <a href="../PAGES/SERVICES/CONSULTATION/projectinception.php" class="nav-btn">Project Inception</a>
                    </div>
                </div>
                <a href="../PAGES/SERVICES/projectmanagement.php" class="nav-btn service project">
                    <p>Project</p>
                    <p>Management</p>
                </a>
            </div>
        </div>
        <a href="../PAGES/projects.php" class="nav-btn">PROJECTS</a>
            
        <!-- <div class="user-login">
            <button onclick="toggleLoginModal()">Login</button>
        </div> -->
    </ul>
</div>

<div id="login-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="toggleLoginModal()">&times;</span>
        <h2 class="modal-title">Login</h2>

        <div id="warning-message" class="warning" style="display: none;">
            Incorrect username or password. Please try again.
        </div>

        <form action="PAGES/login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <p class="forgot-password-text">
            <a href="PAGES/fpass/forgetpage.php" class="forgot-password-link">Forgot Password?</a>
        </p>

        <p class="signup-text">
            Don't have an account? <a href="PAGES/ADMIN/signup.php" class="signup-link">Sign Up</a>
        </p>
    </div>
</div>
