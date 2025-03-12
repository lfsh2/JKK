<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../../CSS/navbar.css">
	<link rel="stylesheet" href="../../../CSS/chatbot.css">
	<link rel="stylesheet" href="../../../CSS/footer.css">
	<link rel="stylesheet" href="../../../CSS/services.css">
	<link rel="stylesheet" href="../../../CSS/index2.css">
	<style>
		.chat-bot {
			.chat {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../../../ASSETS/chatbotbg.png');
				background-position: bottom;
				background-size: cover;
			}
		}

		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../../../ASSETS/appointmentbg.jpg');
			}
		}

		.build {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../../ASSETS/landingbg.jpg');
				background-position: center;
				background-size: cover;
			}
		}
	</style>
</head>

<body>
<header>
		<?php
		session_start();
		?>

		<nav class="navbar">
			<div class="logo">
				<img src="../../../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../../../index.php">HOME</a>
				<a href="../../about.php">ABOUT</a>
				<div class="dropdown">
					<a href="../services.php" class="service-btn">SERVICES</a>
					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="../BUILD/newbuild.php">New Build</a>
								<a href="../BUILD/renovation.php">Renovation</a>
								<a href="../BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="../BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="../DESIGN/architectural.php">Architectural Design</a>
								<a href="../DESIGN/structural.php">Structural Design</a>
								<a href="../DESIGN/electrical.php">Electrical Design</a>
								<a href="../DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="propertyinspection.php">Property Inspection</a>
								<a href="conceptual.php">Conceptual Cost Estimate</a>
								<a href="projectinception.php">Project Inception</a>
							</div>

							<a href="../projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="../../projects.php">PROJECTS</a>
			</ul>

			<div class="user-login">
				<?php if (isset($_SESSION["username"])): ?>
					<div class="user-dropdown">
						<button class="user-btn"><?= htmlspecialchars($_SESSION["username"]) ?> ▼</button>
						<div class="user-dropdown-content">
							<a href="../../ADMIN/user/dashboard.php">My Booking</a>
							<a href="../../ADMIN/user/schedule.php">Check Booking Status</a>
							<a href="../../ADMIN/user/appointment.php">Book an Appointment</a>
							<a href="../../ADMIN/user/edit_profile.php">Edit Profile</a>
							<a href="logout.php" class="logout-btn">Logout</a>
						</div>
					</div>
				<?php else: ?>
					<button onclick="toggleLoginModal()">Login</button>
				<?php endif; ?>
			</div>

			<button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
		</nav>

		<div id="login-modal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="toggleLoginModal()">&times;</span>
				<h2 class="modal-title">Login</h2>

				<div id="warning-message" class="warning" style="display: none;">
					Incorrect username or password. Please try again.
				</div>

				<form action="../../login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Enter your username" required>

					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Enter your password" required>

					<button type="submit" class="login-btn">Login</button>
				</form>

				<p class="forgot-password-text">
					<a href="../../fpass/forgetpage.php" class="forgot-password-link">Forgot Password?</a>
				</p>

				<p class="signup-text">
					Don't have an account? <a href="../../ADMIN/signup.php" class="signup-link">Sign Up</a>
				</p>
			</div>
		</div>
	</header>

	<div class="property build">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>Conceptual Cost Estimate</h4>
		</div>

		<div class="second-section">
			<div class="text-block">
				<h1>Consultancy Services for Conceptual Cost </h1>

				<p>Whether you are buying, selling, or maintaining a property, JKK Construction Services provides the insights you need to make informed decisions. Whether you own a property or are a contractor, you need to know how much a construction project will cost. Every project is different, with factors like the site details, building design, and availability of workers affecting the cost.</p>
				<p>Getting the estimate wrong can cause problems and affect the success of your project. But don’t worry. JKK Construction Services offers consultations to help you with cost estimates and budget planning. Contact us today if you need help with your construction budget.</p>
				<p>We provide research and project preparation services, often requested by individuals, businesses, or organizations planning construction, maintenance, or renovations. Our estimates can help you start planning architectural projects.</p>
			</div>

			<div class="img-block">
				<img src="../../../ASSETS/services/serviceupper.jpg" alt="">
			</div>
		</div>

		<div class="third-section">
			<div class="card-block">
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Consultation/conceptual1.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Construction Cost</h3>

						<p>Every construction company, regardless of size, may face budget issues at some point. That's why cost estimation is vital in the market. By effectively organizing the planning and control of projects, it helps minimize problems.
							Our budgeting team ensures accuracy in all administrative procedures. They present various options and thoroughly analyze and explain the estimates to the contractor. This way, the best budget for each project is chosen, ensuring high-quality construction. Choose JKK Construction Services for the best results.</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a onclick="toggleLoginModal()">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
		</div>

		<div class="contacts-permits">
			<img src="../../../ASSETS/logo.png" alt="" class="logo">

			<div class="contacts">
				<div class="block">
					<div class="icon">
						<i class="fa-regular fa-envelope"></i>
					</div>
					<p>jjkconstructionservices@yahoo.com</p>
				</div>
				<div class="block">
					<div class="icon">
						<i class="fa-solid fa-phone"></i>
					</div>
					<p>046-501-8436 / 0998 552 5190 / 0928 453 1506</p>
				</div>
				<div class="block">
					<div class="icon">
						<i class="fa-solid fa-location-dot"></i>
					</div>
					<p>Lot 1 Block 6 Hidden Brooke Executive Village, Amaya 2, Tanza, Cavite</p>
				</div>
			</div>

			<div class="permits">
				<h3>LICENSE AND PERMITS</h3>

				<div class="img-block">
					<img src="../../../ASSETS/icons/dti.png" alt="">
					<img src="../../../ASSETS/icons/bir.png" alt="">
					<img src="../../../ASSETS/icons/tanza.png" alt="">
				</div>
			</div>
		</div>
	</footer>


	<script src="../../../script.js"></script>
</body>

</html>