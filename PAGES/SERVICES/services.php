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
		<nav class="navbar">
			<div class="logo">
				<img src="../../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../../index.php">HOME</a>
				<a href="../../PAGES/about.php">ABOUT</a>
				<div class="dropdown">
					<a href="../../PAGES/SERVICES/services.php" class="service-btn">SERVICES</a>

					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="../../PAGES/SERVICES/BUILD/newbuild.php">New Build</a>
								<a href="../../PAGES/SERVICES/BUILD/renovation.php">Renovation</a>
								<a href="../../PAGES/SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="../../PAGES/SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="../../PAGES/SERVICES/DESIGN/architectural.php">Architectural Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/structural.php">Structural Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/electrical.php">Electrical Design</a>
								<a href="../../PAGES/SERVICES/DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="../../PAGES/SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="../../PAGES/SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="../../PAGES/SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
							</div>
							
							<a href="../../PAGES/SERVICES/projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="../../PAGES/projects.php">PROJECTS</a>
			</ul>

			<!-- LOGIN modal trigger inside header -->
			<div class="user-login">
				<!-- <button onclick="toggleLoginModal()">Login</button> -->
			</div>

			<button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
		</nav>


		<div class="responsive-links" id="responsive-dropdown">
			<ul class="links">
				<a href="../../home.php" class="nav-btn">HOME</a>
				<a href="../../PAGES/about.php" class="nav-btn">ABOUT</a>
				<div class="dropdown" id="responsiveDropdown">
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
				<a href="../../PAGES/projects.php" class="nav-btn">PROJECTS</a>
				 
				<!-- <div class="user-login">
					<button onclick="toggleLoginModal()">Login</button>
				</div> -->
			</ul>
		</div>

		<!-- User Login Modal
		<div id="login-modal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="toggleLoginModal()">&times;</span>
				<h2>Login</h2>

				<div id="warning-message" class="warning" style="display: none;">
					Incorrect username or password. Please try again.
				</div>

				<form action="PAGES/ADMIN/login.php" method="POST" class="login-form" onsubmit="return validateLogin()">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
					<button type="submit">Login</button>
				</form>

				<a href="PAGES/ADMIN/signup.php" class="signup-btn">Sign Up</a>
			</div>
		</div> -->
	</header>


	<!-- <button class="chatbot-btn" onclick="toggleChatbot()">
            <img src="../../ASSETS/chatbot.png" alt="">
        </button>
        <div class="chat-bot" id="chat-bot">
            <div class="chat-header">
                <img src="../../ASSETS/logoonly.png" alt="">
                <h1>Let's Chat</h1>
            </div>

            <div class="chat">
                <div class="questions">
                    <p>Welcome! Here are some questions you can ask:</p>
                    <div class="text-block">
                        <button>What services does your construction company provide?</button>
                        <button>How long has your company been in business?</button>
                        <button>Are you licensed and insured?</button>
                        <button>What areas do you serve?</button>
                        <button>What  payment methods do you accept?</button>
                        <button>How do I make an appoinment?</button>

                    </div>
                </div>

                <div class="chat-box">
                    <input type="text" name="chat" id="chat" placeholder="Ask a question......">
                    <button type="submit">Send</button>
                </div>
            </div>
        </div> -->


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

			<a href="../../PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
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