<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../../CSS/services.css">
	<link rel="stylesheet" href="../../../CSS/footer.css">
	<link rel="stylesheet" href="../../../CSS/home.css">
	<link rel="stylesheet" href="../../../CSS/navbar.css">

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
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../../../ASSETS/appointmentbg.jpg');
			}
		}


		.services {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../../ASSETS/landingbg.jpg');
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

		.navbar {
			width: 100%;
		}
		.links {
			width: 100%;
			justify-content: center;
		}
	</style>
</head>

<body>
<header>
		<nav class="navbar">
			<div class="logo">
			</div>

			<ul class="links">
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
			</ul>

			<!-- LOGIN modal trigger inside header -->
			<div class="user-login">
				<!-- <button onclick="toggleLoginModal()">Login</button> -->
			</div>

			<button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
		</nav>


		<div class="responsive-links" id="responsive-dropdown">
			<ul class="links">
					<a href="../../PAGES/SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>
					<div class="dropdown-content">
						<div class="dropdown-subMenu" id="subMenu1">
							<button onclick="toggleResponsiveSubmenu('subMenu1')" class="nav-btn">Build <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../PAGES/SERVICES/BUILD/newbuild.php" class="nav-btn">New Build</a>
								<a href="../../PAGES/SERVICES/BUILD/renovation.php" class="nav-btn">Renovation</a>
								<a href="../../PAGES/SERVICES/BUILD/knockdownandrebuild.php" class="nav-btn">Knockdown and Rebuild</a>
								<a href="../../PAGES/SERVICES/BUILD/electricalinstallation.php" class="nav-btn">Electrical Installation</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu2">
							<button onclick="toggleResponsiveSubmenu('subMenu2')" class="nav-btn">Design <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../PAGES/SERVICES/DESIGN/architectural.php" class="nav-btn">Architectural Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/structural.php" class="nav-btn">Structural Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/electrical.php" class="nav-btn">Electrical Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/interior.php" class="nav-btn">Interior Design</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu3">
							<button onclick="toggleResponsiveSubmenu('subMenu3')" class="nav-btn">Consultation <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../PAGES/SERVICES/CONSULTATION/propertyinspection.php" class="nav-btn">Property Inspection</a>
								<a href="../../PAGES/SERVICES/CONSULTATION/conceptual.php" class="nav-btn">Conceptual Cost Estimate</a>
								<a href="../../PAGES/SERVICES/CONSULTATION/projectinception.php" class="nav-btn">Project Inception</a>
							</div>
						</div>
						<a href="../../PAGES/SERVICES/projectmanagement.php" class="nav-btn service project">
							<p>Project</p>
							<p>Management</p>
						</a>
					</div>
				</div>

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

				<form action="PAGES/ADMIN/login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
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
	</header>




	<div class="services">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>When you need us for improve your business, then come with us to help your then come have reach it, you just sir and feel that goal</h4>
		</div>

	
		<div class="third-section">
			<div class="card-block">
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/home/consultation.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Consultation</h2>
						<p>JKK Construction Services offers comprehensive consultation services tailored to meet the specific needs of residential, commercial and other construction projects. With a commitment to quality and efficiency, our expert consultants provide valuable insights and guidance at every stage of your construction endeavor, ensuring seamless project execution and optimal results.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/home/design.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Design</h2>
						<p>At JKK Construction Services, is a meticulous blend of innovation and functionality. With a commitment to delivering architectural excellence, we specialize in creating spaces that harmonize aesthetic appeal with practicality, ensuring every project reflects our client's vision while adhering to the highest standards of quality and craftsmanship.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/home/build.jpg" alt="">
					</div>

					<div class="text-block">
						<h2>Build</h2>
						<p>JKK Construction Services is renowned for its build approach, emphasizing Best practices, unparalleled craftsmanship, Innovative solutions, Leadership in project management, and Dedication to client satisfaction.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/home/projectmanagement.png" alt="">
					</div>

					<div class="text-block">
						<h2>Project Managament</h2>
						<p>Our construction management team oversees every aspect of your project from inception to completion, ensuring that careful planning, coordination, and oversight lead to a project that aligns with your budget, schedule, and quality expectations. We offer comprehensive support including pre-planning, design, construction, engineering, and management expertise to achieve optimal outcomes.</p>
					</div>
				</div>
			</div>
		</div>
	</div>


	
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
	<script src="../../../script.js"></script>
	<script>
		window.chtlConfig = {
			chatbotId: "6989296199"
		}
	</script>
	<script async data-id="6989296199" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
	</script>

</body>

</html>