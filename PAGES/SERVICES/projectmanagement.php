<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../CSS/navbar.css">
	<link rel="stylesheet" href="../../CSS/chatbot.css">
	<link rel="stylesheet" href="../../CSS/footer.css">
	<link rel="stylesheet" href="../../CSS/home.css">
	<link rel="stylesheet" href="../../CSS/services.css">
	<link rel="stylesheet" href="../../CSS/index2.css">
	<style>
		.chat-bot {
			.chat {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../../ASSETS/chatbotbg.png');
				background-position: bottom;
				background-size: cover;
			}
		}

		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../../ASSETS/appointmentbg.jpg');
			}
		}


		.build {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../ASSETS/landingbg.jpg');
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
				<img src="../../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../../index.php">HOME</a>
				<a href="../about.php">ABOUT</a>
				<div class="dropdown">
					<a href="services.php" class="service-btn">SERVICES</a>
					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="BUILD/newbuild.php">New Build</a>
								<a href="BUILD/renovation.php">Renovation</a>
								<a href="BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="DESIGN/architectural.php">Architectural Design</a>
								<a href="DESIGN/structural.php">Structural Design</a>
								<a href="DESIGN/electrical.php">Electrical Design</a>
								<a href="DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="CONSULTATION/projectinception.php">Project Inception</a>
							</div>

							<a href="projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="../projects.php">PROJECTS</a>
			</ul>

			<div class="user-login">
				<?php if (isset($_SESSION["username"])): ?>
					<div class="user-dropdown">
						<button class="user-btn"><?= htmlspecialchars($_SESSION["username"]) ?> ▼</button>
						<div class="user-dropdown-content">
							<a href="../ADMIN/user/dashboard.php">My Booking</a>
							<a href="../ADMIN/user/schedule.php">Check Booking Status</a>
							<a href="../ADMIN/user/appointment.php">Book an Appointment</a>
							<a href="../ADMIN/user/edit_profile.php">Edit Profile</a>
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

				<form action="../login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Enter your username" required>

					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Enter your password" required>

					<button type="submit" class="login-btn">Login</button>
				</form>

				<p class="forgot-password-text">
					<a href="../fpass/forgetpage.php" class="forgot-password-link">Forgot Password?</a>
				</p>

				<p class="signup-text">
					Don't have an account? <a href="../ADMIN/signup.php" class="signup-link">Sign Up</a>
				</p>
			</div>
		</div>
	</header>

	<div class="renovation build">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>Project Management</h4>
		</div>

		<div class="second-section">
			<div class="text-block">
				<h1>Construction Management</h1>

				<p>JKK Construction Services is a reputable firm specializing in comprehensive construction management solutions. With a commitment to excellence, JKK Construction Services handles projects across various sectors including residential, commercial, industrial, and institutional developments. Their expertise encompasses project planning, scheduling, budgeting, and quality control, ensuring efficient and timely project delivery.</p>
				<p>JKK Construction Services prides itself on its skilled workforce and strategic partnerships, enabling them to tackle projects of varying complexity with professionalism and innovation. They adhere to stringent safety standards and environmental regulations, emphasizing sustainability in their construction practices.</p>
				<p>Client satisfaction is paramount to JKK Construction Services, reflected in their client-centric approach and transparent communication throughout the project lifecycle. Whether it's new construction, renovation, or infrastructure development, JKK Construction Services stands out for their reliability, integrity, and commitment to excellence in the construction management sector in the Philippines.</p>
			</div>

			<div class="img-block">
				<img src="../../ASSETS/services/serviceupper.jpg" alt="">
			</div>
		</div>
	</div>


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a onclick="toggleLoginModal()">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
		</div>

		<div class="contacts-permits">
			<img src="../../ASSETS/logo.png" alt="" class="logo">

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
					<img src="../../ASSETS/icons/dti.png" alt="">
					<img src="../../ASSETS/icons/bir.png" alt="">
					<img src="../../ASSETS/icons/tanza.png" alt="">
				</div>
			</div>
		</div>
	</footer>


	<script src="../../script.js"></script>
	<script>
		window.chtlConfig = {
			chatbotId: "6989296199"
		}
	</script>
	<script async data-id="6989296199" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
	</script>
</body>

</html>