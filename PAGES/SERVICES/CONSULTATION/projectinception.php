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

	

	<div class="project build">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>Project Inception and Planning</h4>
		</div>

		<div class="second-section">
			<div class="text-block">
				<h1>Consultancy Services for Pre Planning</h1>

				<p>Planning ahead is really important for any construction project to succeed. At JKK Construction Services, we believe that good planning makes a big difference.</p>
				<p>Our pre-construction services focus on providing clear and accurate information to both owners and architects. This helps everyone make smart decisions about when things will happen, how much they will cost, and how good they will be. We also think about how much things will cost over the whole life of the building, not just at the beginning.</p>
				<p>We work closely with the project team to find new and better ways of building and using materials. This helps us create buildings that work really well and last a long time, while still fitting into the budget and schedule that everyone agrees on.</p>
				<p>Our main goal is to help our clients get the most out of their money. By planning carefully, we can find ways to save money and make sure that projects go smoothly from the very start to the very end.  At JKK Construction Services, we're here to help you plan for success with clear thinking and working together as a team.</p>
			</div>

			<div class="img-block">
				<img src="../../../ASSETS/services/serviceupper.jpg" alt="">
			</div>
		</div>

		<div class="third-section">
			<div class="card-block">
				<div class="card title">
					<h3>The Range of Construction Pre-Planning</h3>

					<p>Our construction pre-planning services are adapted to suit your specific needs and objectives, taking into account factors such as project details, construction approach, and design stage. The Pre-Construction Team at Pioneer Construction offers a range of services, including:</p>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Consultation/project1.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Conceptual Estimating Budget Development</h3>

						<p>At JKK Construction Services play a crucial role in the early stages of project planning and feasibility assessment. These processes involve generating initial cost estimates and developing comprehensive budgets based on preliminary project information and conceptual designs</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Consultation/project2.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Constructability and Value Engineering Analysis</h3>

						<p>At JKK Construction Services, to assess the feasibility and efficiency of constructing a project. It involves evaluating the construction plans, methods, sequencing, and materials to identify potential challenges and opportunities for improvement before construction begins. The goal is to optimize the construction process to enhance project quality, reduce costs, and minimize construction time. JKK Construction Services utilizes constructability analysis to ensure that projects are built in the most effective and practical manner possible, considering factors like site conditions, logistics, and resource availability.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Consultation/project3.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Scheduling and Planning</h3>

						<p>JKK Construction Services excels in scheduling and planning, ensuring each project meets high standards of efficiency, quality, and client satisfaction. Our process begins with thorough pre-construction phases, including initial consultations to understand client goals and site assessments to identify potential challenges. We provide clear project proposals outlining scope, timelines, and cost estimates. During the planning and design phase, we collaborate closely with architects and engineers to develop detailed plans and select materials based on quality and sustainability. We manage all necessary permits and approvals to ensure compliance.</p>
					</div>
				</div>
				<div class="card special">
					<div class="img-block">
						<img src="../../../ASSETS/services/Consultation/project4.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Contract Document Review</h3>

						<p>a contract document review for JKK Construction Services, the focus is on several critical aspects. This includes meticulously examining the scope of work to ensure it comprehensively outlines all tasks, milestones, and deliverables JKK commits to providing. Additionally, scrutinizing the terms and conditions section is essential to understanding the legal and operational parameters under which JKK Construction Services will operate, encompassing payment schedules, penalties, and liabilities. Ensuring compliance with specified standards, codes, and quality expectations is paramount, as is assessing risks and ensuring adequate protection through insurance or indemnity clauses. Clarifying timelines, responsibilities, and obligations establishes accountability for both JKK and its clients, while verifying that all necessary permits, licenses, and regulatory approvals are in place ensures compliance from the outset. Reviewing provisions for amendments, dispute resolution mechanisms, and conditions for contract termination further solidifies clarity and fairness in contractual relationships. Attention to confidentiality clauses and intellectual property rights protection rounds out a comprehensive review, safeguarding JKK Construction Services' interests and fostering successful project execution.</p>
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