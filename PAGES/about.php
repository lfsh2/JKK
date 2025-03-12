<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../CSS/navbar.css">
	<link rel="stylesheet" href="../CSS/footer.css">
	<link rel="stylesheet" href="../CSS/about.css">
	<link rel="stylesheet" href="../CSS/index2.css">
	<style>
		.chat-bot {
			.chat {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../ASSETS/chatbotbg.png');
				background-position: bottom;
				background-size: cover;
			}
		}

		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../ASSETS/appointmentbg.jpg');
			}
		}

		.about {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../ASSETS/appointmentbg.jpg');
				background-position: center;
				background-size: cover;
			}

			.sixth-section {
				background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('../ASSETS/appointmentbg.jpg');
				background-blend-mode: normal;
				background-position: center;
				background-size: cover;
			}
		}

		.map-wrapper {
			width: 100%;
			max-width: 700px;
			margin: 20px auto;
			padding: 20px;
			border: 5px solid #007BFF;
			border-radius: 15px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			background-color: #f9f9f9;
			display: flex;
			flex-direction: column;
			text-align: center;
		}

		.map-title {
			font-size: 24px;
			margin-bottom: 15px;
			font-weight: bold;
			color: #333;
		}

		.map-container {
			width: 100%;
			height: 500px;
			border-radius: 10px;
			overflow: hidden;
			border: 3px solid #007BFF;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			text-align: center;
		}

		.map-container iframe {
			width: 100%;
			height: 100%;
			border: none;
			border-radius: 10px;
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
				<img src="../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../index.php">HOME</a>
				<a href="about.php">ABOUT</a>
				<div class="dropdown">
					<a href="SERVICES/services.php" class="service-btn">SERVICES</a>
					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="SERVICES/BUILD/newbuild.php">New Build</a>
								<a href="SERVICES/BUILD/renovation.php">Renovation</a>
								<a href="SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="SERVICES/DESIGN/architectural.php">Architectural Design</a>
								<a href="SERVICES/DESIGN/structural.php">Structural Design</a>
								<a href="SERVICES/DESIGN/electrical.php">Electrical Design</a>
								<a href="SERVICES/DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
							</div>

							<a href="SERVICES/projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="projects.php">PROJECTS</a>
			</ul>

			<div class="user-login">
				<?php if (isset($_SESSION["username"])): ?>
					<div class="user-dropdown">
						<button class="user-btn"><?= htmlspecialchars($_SESSION["username"]) ?> ▼</button>
						<div class="user-dropdown-content">
							<a href="ADMIN/user/dashboard.php">My Booking</a>
							<a href="ADMIN/user/schedule.php">Check Booking Status</a>
							<a href="ADMIN/user/appointment.php">Book an Appointment</a>
							<a href="ADMIN/user/edit_profile.php">Edit Profile</a>
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

				<form action="login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" placeholder="Enter your username" required>

					<label for="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Enter your password" required>

					<button type="submit" class="login-btn">Login</button>
				</form>

				<p class="forgot-password-text">
					<a href="fpass/forgetpage.php" class="forgot-password-link">Forgot Password?</a>
				</p>

				<p class="signup-text">
					Don't have an account? <a href="ADMIN/signup.php" class="signup-link">Sign Up</a>
				</p>
			</div>
		</div>
	</header>


	<div class="about">
		<div class="first-section">
			<h1>Our Company</h1>
			<h4>when you need us for improve your business, then come with us to help your then come have reach it, you just sit and feel that goal</h4>
		</div>

		<div class="second-section">
			<div class="img-block">
				<img src="../ASSETS/about/first.png" alt="">
			</div>

			<div class="text-block">
				<p>
					<b>JKK CONSTRUCTION SERVICES</b> is a sole proprietorship duly organized under the laws of the Republic of the Philippines, owned and managed by spouses JEDDAH M. CAREL JR., and LEA DONES CAREL with its head office at Hidden Brooke Executive Village, Amaya 2, Tanza, Cavite, the company was registered in the Department of Trade and Industry on August 12, 2020 to expire on August 12, 2025. <br><br>
					JKK Construction Services is dedicated to exceeding customer expectations by providing high-quality services. Our commitment to honesty, integrity, and a proactive approach to embracing changes and innovation sets us apart in the construction industry. As a company owned by its employees, we consistently go the extra mile on every project, ensuring that we fulfill our promises with utmost integrity.
				</p>
			</div>
		</div>

		<div class="third-section">
			<div class="img-block">
				<img src="../ASSETS/about/second.png" alt="">
			</div>
			<div class="top-left-square"></div>
			<div class="mask-white"></div>
			<div class="bottom-right-black-square"></div>
		</div>

		<div class="fourth-section">
			<div class="title-block">
				<h1>How we work with our <br> Clients.</h1>
			</div>

			<div class="text-block">
				The main purpose of the company is to enter and make a mark in the Construction industry. It focuses on the construction of buildings of any kind of nature, offers consultation services, including property inspection, conceptual cost estimate and project inception and planning. Additionally, the company provides design services such as architectural design, structural design, electrical design, interior design, and build services like new builds, renovations, knockdown and rebuild, expertise in electrical installation and maintenance, and project management. Additionally, the company provides design services such as architectural design, structural design, electrical design, interior design, and build services like new builds, renovations, knockdown and rebuild, expertise in electrical installation and maintenance, and project management.
			</div>
		</div>

		<div class="fifth-section">
			<div class="img-block">
				<img src="../ASSETS/about/third.jpg" alt="">
			</div>

			<h5>Furthermore, JKK CONSTRUCTION SERVICES has licensed civil engineers, electrical engineers, Sanitary Engineers, materials engineer, construction supervisors, and several construction laborers.</h5>
		</div>

		<div class="sixth-section">
			<h1>Our Core <br>Value</h1>
			<p>Our values shape the culture of our organization and define the character of our company</p>

			<div class="card-block">
				<div class="card">
					<img src="../ASSETS/icons/mission.png" alt="">

					<h3>Mission</h3>

					<p>To build enduring structures that inspire and enrich communities, driven by innovation, integrity, and excellence in construction.</p>
				</div>

				<div class="card">
					<img src="../ASSETS/icons/vision.webp" alt="">

					<h3>Vision</h3>

					<p>To build enduring structures that inspire and enrich communities, driven by innovation, integrity, and excellence in construction.</p>
				</div>
			</div>

			<div class="org-chart">
				<h1>Organizational Chart</h1>

				<img src="../ASSETS/jjkorgchart.png" alt="">
			</div>
		</div>

		<div class="seventh-section">
			<div class="img-block">
				<img src="../ASSETS/about/owner.jpg" alt="">
			</div>

			<div class="owner">
				<h1>Jeddah Malayo Carel Jr.</h1>
				<h3>Owner / General Manager / Safety Officer</h3>
				<p>He is the owner, General Manager, and Safety Officer of the company, bringing a lot of experience and expertise to his role.</p>
				<p>He specializes in roads and vertical structures and has worked as an electrical supervisor for over 8 years at JC Bolos Construction Corporation and 6 years at R.A. Del Rosario Construction. During this time, he has successfully overseen numerous projects, ensuring they meet high standards of quality and safety.</p>
				<p>He pays close attention to detail and is passionate about making sure every part of a project is done right. His leadership has helped the company grow and become well-respected in the industry.</p>
				<p>He is known for working well with others and building strong relationships with clients and his team. He believes in clear communication and being involved in every aspect of a project.</p>
				<p>His career shows how dedicated he is to construction, and his work has made a big impact on every project he's been a part of. He continues to lead the company, focusing on new ideas and ways to make projects better and more sustainable.</p>
			</div>
		</div>

		<div class="eighth-section">
			<h1>JKK SAFETY AND HEALTH OBJECTIVES</h1>

			<div class="card-block">
				<div class="group">
					<div class="card">
						<img src="../ASSETS/about/safety1.jpg" alt="">
						<p>Making each foreman a qualified safety person.</p>
					</div>
					<div class="card">
						<img src="../ASSETS/about/safety2.jpg" alt="">
						<p>Making Daily job site safety inspections.</p>
					</div>
					<div class="card">
						<img src="../ASSETS/about/safety3.jpeg" alt="">
						<p>Enforcing the use of safety equipment.</p>
					</div>
				</div>

				<div class="group">
					<div class="card">
						<img src="../ASSETS/about/safety4.jpg" alt="">
						<p>Following the safety procedures and rules.</p>
					</div>
					<div class="card">
						<img src="../ASSETS/about/safety5.jpg" alt="">
						<p>Providing on-going safety training.</p>
					</div>
					<div class="card">
						<img src="../ASSETS/about/safety6.jpg" alt="">
						<p>Enforcing safety rules and using appropriate discipline.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="map-container" style="position: relative; text-align: center;">
		<h2 class="map-title">Here We Are Located</h2>

		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2027.6035090727642!2d120.90952641873257!3d14.413101881107794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd987b3d8a98a9%3A0x5b2a8c75f57c938f!2sLot%201%20Block%206%20Hidden%20Brooke%20Executive%20Village%2C%20Amaya%202%2C%20Tanza%2C%20Cavite!5e0!3m2!1sen!2sus!4v1674136484778!5m2!1sen!2sus"
			width="600" height="450" style="border:0; display: block; margin: auto;" allowfullscreen="" loading="lazy">
		</iframe>

		<div class="address-box" style="
        position: absolute; 
        bottom: 10px; 
        left: 50%; 
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.9); 
        padding: 10px; 
        border-radius: 5px; 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        font-size: 14px;
        font-weight: bold;">
			📍 Lot 1 Block 6, Hidden Brooke Executive Village, Amaya 2, Tanza, Cavite
		</div>
	</div>


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a onclick="toggleLoginModal()">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
		</div>

		<div class="contacts-permits">
			<img src="../ASSETS/logo.png" alt="" class="logo">

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
					<img src="../ASSETS/icons/dti.png" alt="">
					<img src="../ASSETS/icons/bir.png" alt="">
					<img src="../ASSETS/icons/tanza.png" alt="">
				</div>
			</div>
		</div>
	</footer>


	<script src="../script.js"></script>
	<script src="chatbot/chatbot.js"></script>
	<script>
		window.chtlConfig = {
			chatbotId: "6989296199"
		}
	</script>
	<script async data-id="6989296199" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
	</script>
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
</script>
</body>

</html>