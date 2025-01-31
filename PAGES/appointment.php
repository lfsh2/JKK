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
	<link rel="stylesheet" href="../CSS/appointment.css">
	<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
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

		.appointment {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../ASSETS/landingbg.jpg');
				background-position-y: -55vh;
				background-size: cover;
			}
		}

		@media screen and (max-width: 992px) {
			.appointment {
				.first-section {
					height: auto;
					background-position: center;
				}
			}
		}
	</style>
</head>

<body>
	<header>
		<nav class="navbar">
			<div class="logo">
				<img src="../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../index.php">HOME</a>
				<a href="../PAGES/about.php">ABOUT</a>
				<div class="dropdown">
					<a href="../PAGES/SERVICES/services.php" class="service-btn">SERVICES</a>

					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="../PAGES/SERVICES/BUILD/newbuild.php">New Build</a>
								<a href="../PAGES/SERVICES/BUILD/renovation.php">Renovation</a>
								<a href="../PAGES/SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="../PAGES/SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="../PAGES/SERVICES/DESIGN/architectural.php">Architectural Design</a>
								<a href="../PAGES/SERVICES/DESIGN/structural.php">Structural Design</a>
								<a href="../PAGES/SERVICES/DESIGN/electrical.php">Electrical Design</a>
								<a href="../PAGES/SERVICES/DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="../PAGES/SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="../PAGES/SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="../PAGES/SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
							</div>

							<a href="../PAGES/SERVICES/projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="../PAGES/projects.php">PROJECTS</a>
			</ul>

			<!-- LOGIN modal trigger inside header -->
			<div class="user-login">
				<!-- <button onclick="toggleLoginModal()">Login</button> -->
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
		</div>-->
	</header>

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


	<div class="appointment">
        <section class="first-section">
            <h1>Book an Appointment</h1>
            <h1>With Us</h1>
        </section>

        <section class="second-section">
            <div class="client-details">
                <h1>Client Details</h1>
            </div>

            <div class="book-appointment">
                <div class="form">
                    <form action="submit_booking.php" method="POST">
                        <div class="input-group">
						<div class="input-block">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email" required onblur="validateEmail()">
                    </div>


                            <div class="input-block">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Your Name" required>
                            </div>

                            <div class="input-block">
                                <label for="mobile">Mobile</label>
                                <input type="number" name="mobile" id="mobile" placeholder="09123456789" required>
                            </div>

                            <div class="text">
                                <h1>Book an Appointment</h1>
                                <p>Please take a moment to fill in the form.</p>
                            </div>

                           <!-- <div class="input-block">
                                <label for="payment">Type of Payments</label>
                                <select name="payment_type" id="payment" required>
                                    <option value="Gcash">Gcash</option>
                                </select>
                            </div>-->

                            <div class="input-block">
                                <label for="services">Type of Services</label>
                                <select name="services" id="services" required>
                                    <option value="Build">Build</option>
                                    <option value="Design">Design</option>
                                    <option value="Consultation">Consultation</option>
                                    <option value="Project Management">Project Management</option>
                                </select>
                            </div>

                            <div class="input-block">
                                <label for="appointment-date">Select Date:</label>
                                <input type="date" name="appointment_date" id="appointment-date" required>
                            </div>

                            <div class="input-block">
                                <label for="appointment-time">Select Time:</label>
                                <select name="appointment_time" id="appointment-time" required>
                                    <option value="8-10am">8:00 AM - 10:00 AM</option>
                                    <option value="10-12pm">10:00 AM - 12:00 PM</option>
                                    <option value="1-3pm">1:00 PM - 3:00 PM</option>
                                    <option value="3-5pm">3:00 PM - 5:00 PM</option>
                                </select>
                            </div>

                            <div class="input-block">
                                <label for="message">Message (Optional)</label>
                                <textarea name="message" id="message" placeholder="Enter any additional information or requests here..." rows="5"></textarea>
                            </div>

                            <button type="submit">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

	<footer>

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
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js'></script>
	<script>
		window.chtlConfig = {
			chatbotId: "6989296199"
		}
	</script>
	<script async data-id="6989296199" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
	</script>
	<script>
		const today = new Date().toISOString().split('T')[0];
		document.getElementById('appointment-date').setAttribute('min', today);
	</script>
	<script>
        function validateEmail() {
    const email = document.getElementById('email').value;
    if (email) {
        fetch('fetch_client_details.php?email=' + encodeURIComponent(email))
            .then(response => response.json())
            .then(data => {
                if (data) {
                    // Populate Name and Mobile fields
                    document.getElementById('name').value = data.first_name + ' ' + data.last_name;
                    document.getElementById('mobile').value = data.mobile;
                } else {
                    // Clear fields and notify if email is not found
                    document.getElementById('name').value = '';
                    document.getElementById('mobile').value = '';
                    alert('Email not found in the database.');
                }
            })
            .catch(error => console.error('Error:', error));
    }
}

    </script>
</body>

</html>