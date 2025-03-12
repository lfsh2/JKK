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
		.modal {
			display: none;
			position: fixed;
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.4);
			justify-content: center;
			align-items: center;
		}

		.modal-content {
			background-color: #fff;
			margin: auto;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			width: 90%;
			max-width: 400px;
			position: relative;
			animation: fadeIn 0.3s ease-in-out;
		}

		.close {
			color: #aaa;
			font-size: 24px;
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
		}

		.close:hover {
			color: #000;
		}

		/* Form Inputs */
		.login-form label {
			display: block;
			margin-bottom: 5px;
			font-weight: 600;
		}

		.login-form input {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 14px;
		}

		.login-form .login-btn {
			width: 100%;
			padding: 10px;
			background-color: #007BFF;
			color: #fff;
			border: none;
			border-radius: 4px;
			font-size: 16px;
			cursor: pointer;
			transition: background-color 0.3s;
		}

		.login-form .login-btn:hover {
			background-color: #0056b3;
		}

		/* Warning Message */
		.warning {
			color: #d9534f;
			background-color: #f8d7da;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #f5c6cb;
			border-radius: 4px;
		}

		.forgot-password-link,
		.signup-link {
			color: #007BFF;
			text-decoration: none;
			transition: color 0.3s;
		}

		.forgot-password-link:hover,
		.signup-link:hover {
			color: #0056b3;
		}

		.forgot-password-text,
		.signup-text {
			text-align: center;
			margin-top: 10px;
			font-size: 14px;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(-20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../../ASSETS/appointmentbg.jpg');
			}
		}


		.services {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../ASSETS/landingbg.jpg');
				background-position: center;
				background-size: cover;
			}

			.third-section h2 {
				padding: 0 0 5px;
			}
		}

		@media screen and (max-width: 992px) {
			.services {
				.second-section {
					height: auto;
					flex-direction: column;

					.text-block {
						width: 100%;
					}

					.img-block {
						width: 100%;
					}
				}
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

	<div class="services">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>When you need us for improve your business, then come with us to help your then come have reach it, you just sir and feel that goal</h4>
		</div>

		<div class="second-section">
			<div class="text-block">
				<h1>JKK Construction Services</h1>

				<img src="../../ASSETS/services/services1.jpg" alt="">

				<p>The expertise we have gained in the construction industry has equipped JKK Construction Services with the knowledge, experience, and skills needed to deliver comprehensive construction solutions. We offer a wide range of services including building construction, consulting, project planning, design, project management, and electrical work. From project inception to handing over the keys to your new home or construction project, we manage every aspect of your project with care.</p>
			</div>

			<div class="img-block">
				<img src="../../ASSETS/services/serviceupper.jpg" alt="">
			</div>
		</div>

		<div class="third-section">
			<div class="card-block">
				<div class="card">
					<div class="img-block">
						<img src="../../ASSETS/home/consultation.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Consultation</h2>
						<p>JKK Construction Services offers comprehensive consultation services tailored to meet the specific needs of residential, commercial and other construction projects. With a commitment to quality and efficiency, our expert consultants provide valuable insights and guidance at every stage of your construction endeavor, ensuring seamless project execution and optimal results.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../ASSETS/home/design.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Design</h2>
						<p>At JKK Construction Services, is a meticulous blend of innovation and functionality. With a commitment to delivering architectural excellence, we specialize in creating spaces that harmonize aesthetic appeal with practicality, ensuring every project reflects our client's vision while adhering to the highest standards of quality and craftsmanship.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../ASSETS/home/build.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Build</h2>
						<p>JKK Construction Services is renowned for its build approach, emphasizing Best practices, unparalleled craftsmanship, Innovative solutions, Leadership in project management, and Dedication to client satisfaction.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../ASSETS/home/projectmanagement.png" alt="">
					</div>

					<div class="text-block">
						<h2>Project Managament</h2>
						<p>Our construction management team oversees every aspect of your project from inception to completion, ensuring that careful planning, coordination, and oversight lead to a project that aligns with your budget, schedule, and quality expectations. We offer comprehensive support including pre-planning, design, construction, engineering, and management expertise to achieve optimal outcomes.</p>
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

	<script>
		function toggleLoginModal() {
			const modal = document.getElementById('login-modal');
			modal.style.display = modal.style.display === 'block' ? 'none' : 'block';
		}

		window.onclick = function(event) {
			const modal = document.getElementById('login-modal');
			if (event.target === modal) {
				modal.style.display = 'none';
			}
		};

		function validateLogin() {
			const username = document.getElementById('username').value;
			const password = document.getElementById('password').value;


			if (username === "wrong" || password === "wrong") {
				document.getElementById('warning-message').style.display = "block";
				return false;
			}
			return true;
		}
	</script>
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