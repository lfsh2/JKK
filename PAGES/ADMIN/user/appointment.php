<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jjk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['id'])) {
	header("Location: login.php");
	exit;
}

$user_id = $_SESSION['id'];

$sql = "SELECT first_name, last_name, email, mobile FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $email, $mobile);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JJK Construction Services</title>
	<link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../../CSS/footer.css">
	<link rel="stylesheet" href="../../../CSS/appointment.css">
	<link rel="stylesheet" href="../../../CSS/navbar.css">
	<link rel="stylesheet" href="../../../CSS/index2.css">
	<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css' rel='stylesheet' />
	<style>
		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('../../../ASSETS/appointmentbg.jpg');
			}
		}

		.appointment {
			.first-section {
				background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../../../ASSETS/landingbg.jpg');
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
        <img src="../../../ASSETS/logo.png" alt="Logo">
    </div>

    <ul class="links">
        <a href="../../../index.php">HOME</a>
        <a href="../../about.php">ABOUT</a>
        <div class="dropdown">
            <a href="../../SERVICES/services.php" class="service-btn">SERVICES</a>
            <div class="dropdown-block">
			<div class="dropdown-content">
                    <button class="submenu-toggle" data-submenu="submenu1">Build</button>
                    <div class="submenu" id="submenu1">
                        <a href="../../SERVICES/BUILD/newbuild.php">New Build</a>
                        <a href="../../SERVICES/BUILD/renovation.php">Renovation</a>
                        <a href="../../SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
                        <a href="../../SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
                    </div>

                    <button class="submenu-toggle" data-submenu="submenu2">Design</button>
                    <div class="submenu" id="submenu2">
                        <a href="../../SERVICES/DESIGN/architectural.php">Architectural Design</a>
                        <a href="../../SERVICES/DESIGN/structural.php">Structural Design</a>
                        <a href="../../SERVICES/DESIGN/electrical.php">Electrical Design</a>
                        <a href="../../SERVICES/DESIGN/interior.php">Interior Design</a>
                    </div>

                    <button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
                    <div class="submenu" id="submenu3">
                        <a href="../../SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
                        <a href="../../SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
                        <a href="../../SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
                    </div>

                    <a href="SERVICES/projectmanagement.php">Project Management</a>
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
                    <a href="dashboard.php">Booking Status</a>
                    <a href="schedule.php">Check My Appointment</a>
                    <a href="appointment.php">Book an Appointment</a>
                    <a href="edit_profile.php">Edit Profile</a>
                    <a href="logout.php" class="logout-btn">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <button onclick="toggleLoginModal()">Login</button>
        <?php endif; ?>
    </div>

    <button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
</nav>
</header>
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
								<input type="email" name="email" id="email" value="<?= htmlspecialchars($email); ?>" readonly>
							</div>

							<div class="input-block">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" value="<?= htmlspecialchars($first_name . ' ' . $last_name); ?>" readonly>
							</div>

							<div class="input-block">
								<label for="mobile">Mobile</label>
								<input type="number" name="mobile" id="mobile" value="<?= htmlspecialchars($mobile); ?>" readonly>
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
								<label for="sub-services">Specific Service</label>
								<select name="sub-services" id="sub-services" required>
									<option value="">Select Specific Service</option>
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
							document.getElementById('name').value = data.first_name + ' ' + data.last_name;
							document.getElementById('mobile').value = data.mobile;
						} else {
							document.getElementById('name').value = '';
							document.getElementById('mobile').value = '';
							alert('Email not found in the database.');
						}
					})
					.catch(error => console.error('Error:', error));
			}
		}
	</script>
	<script>
		function updateSubServices() {
			const service = document.getElementById("services").value;
			const subServices = document.getElementById("sub-services");

			const options = {
				"Build": ["New Build", "Renovation", "Knockdown and Rebuild", "Electrical Installation"],
				"Design": ["Architectural Design", "Structural Design", "Electrical Design", "Interior Design"],
				"Consultation": ["Property Inspection", "Conceptual Cost Estimate", "Project Inception"],
				"Project Management": []
			};

			subServices.innerHTML = '<option value="">Select Specific Service</option>';

			if (options[service] && options[service].length > 0) {
				options[service].forEach(subService => {
					const option = document.createElement("option");
					option.value = subService.toLowerCase().replace(/\s+/g, "-");
					option.textContent = subService;
					subServices.appendChild(option);
				});
			}
		}

		document.getElementById("services").addEventListener("change", updateSubServices);
	</script>
<script src="../../../script.js"></script>


</body>

</html>