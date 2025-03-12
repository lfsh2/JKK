<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../CSS/navbar.css">
	<link rel="stylesheet" href="../CSS/chatbot.css">
	<link rel="stylesheet" href="../CSS/footer.css">
	<link rel="stylesheet" href="../CSS/projects.css">
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

		.projects {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../ASSETS/landingbg.jpg');
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


	<div class="projects">
		<div class="first-section">
			<h1>Our Projects</h1>
			<h4>Sample of our works</h4>
		</div>

		<div class="second-section">
			<nav>
				<button onclick="showAll()" class="all">All</button>
				<button onclick="filterItems('building')">Building</button>
				<button onclick="filterItems('commercial')">Commercial</button>
				<button onclick="filterItems('consultancy')">Consultancy</button>
				<button onclick="filterItems('contractor')">Contractor</button>
				<button onclick="filterItems('design')">Design</button>
				<button onclick="filterItems('fitout')">Fitout</button>
				<button onclick="filterItems('renovation')">Renovation</button>
				<button onclick="filterItems('residential')">Residential</button>
			</nav>

			<div class="card-block">
				<div class="card fitout building residential">
					<img src="../ASSETS/projects/fit1.jpg" alt="">
					<div class="text-block">
						<p>Completion of 3 Storey Commercial / Residential Building of Mr. and Mrs. Gurel</p>
					</div>
				</div>
				<div class="card building commercial residential">
					<img src="../ASSETS/projects/building2.jpg" alt="">
					<div class="text-block">
						<p>Completion of 3 Storey Commercial / Residential Building of Mr. and Mrs. Gurel</p>
					</div>
				</div>
				<div class="card building">
					<img src="../ASSETS/projects/building3.jpg" alt="">
					<div class="text-block">
						<p>Child Development Center, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno1.jpg" alt="">
					<div class="text-block">
						<p>Improvement of Electrical System of University Gym including Installation of Transformer at Cavite State University , Indang Cavite</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con1.jpg" alt="">
					<div class="text-block">
						<p>Rural Electrification in Malbog, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con2.jpg" alt="">
					<div class="text-block">
						<p>Rural Electrification in Aguada Sur, Magallanes Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con3.jpg" alt="">
					<div class="text-block">
						<p>Concreting of Barangay Road-Sitio Dumalwa, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con4.jpg" alt="">
					<div class="text-block">
						<p>Construction of Brgy. Road Sitio Gimantao, Biton, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con5.jpg" alt="">
					<div class="text-block">
						<p>Concreting of Brgy Road, Sitio Binaluyuhan , Brgy. Caditaan, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con6.jpg" alt="">
					<div class="text-block">
						<p>Construction of Drainage at Purok 7, Cawit Extension</p>
					</div>
				</div>
				<div class="card building">
					<img src="../ASSETS/projects/building5.jpg" alt="">
					<div class="text-block">
						<p>Construction of Four Storey Eight Classroom School Building at V.P. Villanueva MS (Pala – Pala), Dasmariñas City, Cavite</p>
					</div>
				</div>
				<div class="card building">
					<img src="../ASSETS/projects/building4.jpg" alt="">
					<div class="text-block">
						<p>Development of MRF located at Aguada Sur, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card commercial">
					<img src="../ASSETS/projects/comm2.png" alt="">
					<div class="text-block">
						<p>Sparkling Aqua Water Refilling Station</p>
					</div>
				</div>
				<div class="card building">
					<img src="../ASSETS/projects/building6.jpg" alt="">
					<div class="text-block">
						<p>Electrical Works at HEPC Building, CEPZ, Rosario, Cavite</p>
					</div>
				</div>
				<div class="card building">
					<img src="../ASSETS/projects/building7.jpg" alt="">
					<div class="text-block">
						<p>Electrification San Roque Elementary School, Naic, Cavite</p>
					</div>
				</div>
				<div class="card commercial">
					<img src="../ASSETS/projects/comm1.jpg" alt="">
					<div class="text-block">
						<p>Magallanes Negosyo Center, Brgy. Poblacion Central Magallanes Sorsogon</p>
					</div>
				</div>
				<div class="card fitout">
					<img src="../ASSETS/projects/fit2.jpg" alt="">
					<div class="text-block">
						<p>Furniture, interior</p>
					</div>
				</div>
				<div class="card fitout">
					<img src="../ASSETS/projects/fit3.jpg" alt="">
					<div class="text-block">
						<p>Furniture, interior</p>
					</div>
				</div>
				<div class="card fitout">
					<img src="../ASSETS/projects/fit4.jpg" alt="">
					<div class="text-block">
						<p>Furniture, interior</p>
					</div>
				</div>
				<div class="card fitout">
					<img src="../ASSETS/projects/fit5.jpg" alt="">
					<div class="text-block">
						<p>Furniture, interior</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con7.jpg" alt="">
					<div class="text-block">
						<p>Rural Electrification in Pawik, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con8.jpg" alt="">
					<div class="text-block">
						<p>Installation of Streetlights in Pier Site Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card contractor">
					<img src="../ASSETS/projects/con9.jpg" alt="">
					<div class="text-block">
						<p>Rural Electrification in Tula Tula Norte , Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card design">
					<img src="../ASSETS/projects/design1.jpg" alt="">
					<div class="text-block">
						<p>Tiffany Water Refilling Station</p>
					</div>
				</div>
				<div class="card fitout">
					<img src="../ASSETS/projects/fit6.jpg" alt="">
					<div class="text-block">
						<p>Furniture, interior</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno2.jpg" alt="">
					<div class="text-block">
						<p>Repair of Classrooms at Bukal Elementary School, Silang, Cavite</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno3.jpg" alt="">
					<div class="text-block">
						<p>Repair/Rehabilitation of Classrooms at Magallanes, Elementary School</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno4.jpg" alt="">
					<div class="text-block">
						<p>Classrooms at Bulihan Sites and Service Project Elementary School</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno5.jpg" alt="">
					<div class="text-block">
						<p>Rehabilitation of Drainage Canal along I. Mella St., Brgy. Cawit Extension, Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno6.jpg" alt="">
					<div class="text-block">
						<p>Repair of School Building at Julian Felipe Elementary School</p>
					</div>
				</div>
				<div class="card renovation">
					<img src="../ASSETS/projects/reno7.jpg" alt="">
					<div class="text-block">
						<p>Intermediate Electrical Post and Replacement of Damaged and Leaning Concrete Intermediate Electrical Post at Southville 3 Housing Project, Brgy. Poblacion Muntinlupa City</p>
					</div>
				</div>
				<div class="card residential">
					<img src="../ASSETS/projects/resi1.jpg" alt="">
					<div class="text-block">
						<p>Development of Resettlement Area Phase II , Magallanes, Sorsogon</p>
					</div>
				</div>
				<div class="card consultancy">
					<h4>No Available Data</h4>
				</div>
			</div>
		</div>
	</div>
	<!--
        <button class="chatbot-btn" onclick="toggleChatbot()">
            <img src="../ASSETS/chatbot.png" alt="">
        </button>

        <div class="chat-bot" id="chat-bot">
            <div class="chat-header">
                <img src="../ASSETS/logoonly.png" alt="">
                <h1>Let's Chat</h1>
            </div>

            <div class="chat">
                <div class="question-block">
                    <div class="questions">
                        <p>Welcome! Here are some questions you can ask:</p>
                        <div class="text-block">
                            <button onclick="sendQuestion('What services does your construction company provide?')">What services does your construction company provide?</button>
                            <button onclick="sendQuestion('How long has your company been in business?')">How long has your company been in business?</button>
                            <button onclick="sendQuestion('Are you licensed and insured?')">Are you licensed and insured?</button>
                            <button onclick="sendQuestion('What areas do you serve?')">What areas do you serve?</button>
                            <button onclick="sendQuestion('What payment methods do you accept?')">What payment methods do you accept?</button>
                            <button onclick="sendQuestion('How do I make an appointment?')">How do I make an appointment?</button>
                        </div>
                    </div>
    
                    <div class="messages" id="messages">
                        <div class="chat-message bot">Hello! How can I assist you today?</div>
                    </div>
                </div>
                
                <div class="chat-box">
                    <input type="text" name="chat" id="chat" placeholder="Ask a question......" onkeypress="checkEnter(event)">
                    <button type="submit" onclick="sendChat()">Send</button>
                </div>
            </div>
        </div>-->


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a href="../PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
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
</body>

</html>