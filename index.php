<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>JKK Construction Services</title>
	<link rel="shortcut icon" href="ASSETS/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="CSS/navbar.css">
	<link rel="stylesheet" href="CSS/chatbot.css">
	<link rel="stylesheet" href="CSS/footer.css">
	<link rel="stylesheet" href="CSS/home.css">

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

		#review-modal {
			display: none;
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			justify-content: center;
			align-items: center;
			z-index: 1000;
		}

		#review-modal .modal-content {
			background: #FDF2B4;
			padding: 20px;
			border-radius: 8px;
			width: 400px;
			text-align: center;
			position: relative;
			border-top: 10px solid #FFC107;
		}

		#review-modal h2 {
			margin-bottom: 10px;
			font-size: 24px;
			color: #000;
		}

		#review-modal p {
			margin-bottom: 20px;
			font-size: 16px;
			color: #000;
		}

		#review-modal .name-input {
			width: calc(100% - 20px);
			margin-bottom: 15px;
			padding: 10px;
			font-size: 14px;
			border: 1px solid #ddd;
			border-radius: 4px;
			transition: border-color 0.3s, box-shadow 0.3s;
		}

		#review-modal .name-input:focus {
			border-color: #FFC107;
			box-shadow: 0 0 5px #FFC107;
			outline: none;
		}

		#review-modal .star-rating {
			display: flex;
			justify-content: center;
			margin-bottom: 20px;
		}

		#review-modal .star {
			font-size: 30px;
			color: #ddd;
			cursor: pointer;
			margin: 0 5px;
			transition: color 0.3s ease;
		}

		#review-modal .star.selected,
		#review-modal .star:hover,
		#review-modal .star:hover~.star {
			color: #FFC107;
		}

		textarea {
			width: calc(100% - 20px);
			margin-bottom: 20px;
			padding: 10px;
			font-size: 14px;
			border: 1px solid #ddd;
			border-radius: 4px;
			resize: none;
			transition: border-color 0.3s, box-shadow 0.3s;
		}

		textarea:focus {
			border-color: #FFC107;
			box-shadow: 0 0 5px #FFC107;
			outline: none;
		}

		#review-modal .modal-buttons {
			display: flex;
			justify-content: space-between;
			margin-top: 10px;
		}

		#review-modal .submit-button,
		#review-modal .cancel-button {
			padding: 10px 20px;
			font-size: 14px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}

		#review-modal .submit-button {
			background-color: #000;
			color: #fff;
			transition: background-color 0.3s;
		}

		#review-modal .submit-button:hover {
			background-color: #333;
		}

		#review-modal .cancel-button {
			background-color: #fff;
			color: #000;
			border: 1px solid #000;
			transition: background-color 0.3s, color 0.3s;
		}

		#review-modal .cancel-button:hover {
			background-color: #000;
			color: #fff;
		}

		footer {
			.footer-appointment {
				background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), url('ASSETS/appointmentbg.jpg');
			}
		}

		.home {
			.first-section {
				background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("ASSETS/landingbg.jpg");
				background-position: center;
				background-size: cover;
			}

			.testimonials {
				background: linear-gradient(45deg, color-mix(in srgb, #2D2F2A, white 10%), color-mix(in srgb, #4C553E, white 10%));
			}

			.second-section {
				.text-block {
					.text {
						font-size: 2rem;
					}

					h2 {
						font-size: 1rem;
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
				<img src="ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="index.php">HOME</a>
				<a href="PAGES/about.php">ABOUT</a>
				<div class="dropdown">
					<a href="PAGES/SERVICES/services.php" class="service-btn">SERVICES</a>

					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="PAGES/SERVICES/BUILD/newbuild.php">New Build</a>
								<a href="PAGES/SERVICES/BUILD/renovation.php">Renovation</a>
								<a href="PAGES/SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="PAGES/SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="PAGES/SERVICES/DESIGN/architectural.php">Architectural Design</a>
								<a href="PAGES/SERVICES/DESIGN/structural.php">Structural Design</a>
								<a href="PAGES/SERVICES/DESIGN/electrical.php">Electrical Design</a>
								<a href="PAGES/SERVICES/DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="PAGES/SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="PAGES/SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="PAGES/SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
							</div>

							<a href="PAGES/SERVICES/projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="PAGES/projects.php">PROJECTS</a>
			</ul>
			<div class="user-login">
				<button onclick="toggleLoginModal()">Login</button>
			</div>

			<button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
		</nav>


		<div class="responsive-links" id="responsive-dropdown">
			<ul class="links">
				<a href="home.php" class="nav-btn">HOME</a>
				<a href="PAGES/about.php" class="nav-btn">ABOUT</a>
				<div class="dropdown" id="responsiveDropdown">
					<a href="PAGES/SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>

					<div class="dropdown-content">
						<div class="dropdown-subMenu" id="subMenu1">
							<button onclick="toggleResponsiveSubmenu('subMenu1')" class="nav-btn">Build <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="PAGES/SERVICES/BUILD/newbuild.php" class="nav-btn">New Build</a>
								<a href="PAGES/SERVICES/BUILD/renovation.php" class="nav-btn">Renovation</a>
								<a href="PAGES/SERVICES/BUILD/knockdownandrebuild.php" class="nav-btn">Knockdown and Rebuild</a>
								<a href="PAGES/SERVICES/BUILD/electricalinstallation.php" class="nav-btn">Electrical Installation</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu2">
							<button onclick="toggleResponsiveSubmenu('subMenu2')" class="nav-btn">Design <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="PAGES/SERVICES/DESIGN/architectural.php" class="nav-btn">Architectural Design</a>
								<a href="PAGES/SERVICES/DESIGN/structural.php" class="nav-btn">Structural Design</a>
								<a href="PAGES/SERVICES/DESIGN/electrical.php" class="nav-btn">Electrical Design</a>
								<a href="PAGES/SERVICES/DESIGN/interior.php" class="nav-btn">Interior Design</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu3">
							<button onclick="toggleResponsiveSubmenu('subMenu3')" class="nav-btn">Consultation <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="PAGES/SERVICES/CONSULTATION/propertyinspection.php" class="nav-btn">Property Inspection</a>
								<a href="PAGES/SERVICES/CONSULTATION/conceptual.php" class="nav-btn">Conceptual Cost Estimate</a>
								<a href="PAGES/SERVICES/CONSULTATION/projectinception.php" class="nav-btn">Project Inception</a>
							</div>
						</div>
						<a href="PAGES/SERVICES/projectmanagement.php" class="nav-btn service project">
							<p>Project</p>
							<p>Management</p>
						</a>
					</div>
				</div>
				<a href="PAGES/projects.php" class="nav-btn">PROJECTS</a>

				<div class="user-login">
					<button onclick="toggleLoginModal()">Login</button>
				</div>
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

	<div class="home">
		<section class="first-section">
			<h1>BUILD BEYOND LIMITS</h1>
			<p>Ready to build your project? Let's talk about your plans.</p>
			<a href="PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
		</section>

		<section class="second-section">
			<div class="text-block">
				<div class="text">CONSTRUCTION COMPANY IN THE PHILIPPINES</div>
				<h2>You have a building project that needs to match your vision. <br>You want quality work, on time, and within budget. <br>Now, you've found the team to make it happen.<br>Let's get started!</h2>
			</div>

			<div class="slides">
				<img src="ASSETS/home/slider1.png" alt="">
				<img src="ASSETS/home/slider2.png" alt="">
				<img src="ASSETS/home/slider3.png" alt="">
				<img src="ASSETS/home/slider4.png" alt="">
				<img src="ASSETS/home/slider5.png" alt="">
				<img src="ASSETS/home/slider6.png" alt="">
				<img src="ASSETS/home/slider7.png" alt="">
				<img src="ASSETS/home/slider3.png" alt="">
			</div>
		</section>

		<section class="our-service">
			<h1>OUR SERVICES</h1>

			<div class="card-block">
				<div class="card">
					<div class="card-content">
						<div class="img-block">
							<img src="ASSETS/home/consultation.jpg" alt="">
						</div>

						<div class="text-block">
							<h2>Consultation</h2>
							<p>For customers who want to have detailed costing, planning and guidance of their project, our consultants will help you avoid surprises such as extra costs, delays and other problems.</p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-content">
						<div class="img-block">
							<img src="ASSETS/home/design.jpg" alt="">
						</div>

						<div class="text-block">
							<h2>Design</h2>
							<p>We offer a complete design service for residential and commercial spaces, from the development of architectural designs through the final project of interior design and installation.</p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-content">
						<div class="img-block">
							<img src="ASSETS/home/build.jpg" alt="">
						</div>

						<div class="text-block">
							<h2>Build</h2>
							<p>Our construction team is trained to perform any type of building work and service. Our goal is to carry out the works with safety, quality, budget and delivery time in mind.</p>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-content">
						<div class="img-block">
							<img src="ASSETS/home/projectmanagement.png" alt="">
						</div>

						<div class="text-block">
							<h2>Project Management</h2>
							<p>Here’s the solution for those who want to build but do not want to worry about anything, leave it to the experts and let us take care of the workforce and technical management.</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="testimonials">
			<p>TESTIMONIALS</p>
			<h1>What Our Customers Say</h1>

			<div id="reviews-container" class="reviews">
				<?php
				$mysqli = new mysqli("localhost", "root", "", "jjk");

				if ($mysqli->connect_error) {
					die("Connection failed: " . $mysqli->connect_error);
				}

				$result = $mysqli->query("SELECT * FROM testimonials WHERE approved = 1");

				while ($row = $result->fetch_assoc()) {
					echo "<div class='card'>";
					echo "<img src='ASSETS/icons/testimonialsicon.png' alt=''>";
					echo "<div class='comment'><p>&quot;{$row['comment']}&quot;</p></div>";
					echo "<div class='user-name'><h3>{$row['name']}</h3></div>";
					echo "</div>";
				}

				$mysqli->close();
				?>
			</div>

			<div class="dots">
				<span class="dot active" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
				<span class="dot" onclick="currentSlide(3)"></span>
				<span class="dot" onclick="currentSlide(4)"></span>
			</div>

			<div class="next-prev">
				<button class="prev" onclick="moveSlide(-1)"><i class="fa-solid fa-chevron-left"></i></button>
				<button class="next" onclick="moveSlide(1)"><i class="fa-solid fa-chevron-right"></i></button>
			</div>

			<button class="write-review" onclick="toggleModal()">Write Review</button>

			<div id="review-modal" class="modal">
				<div class="modal-content">
					<span class="close" id="close-review-modal">&times;</span>
					<h2>Give Feedback</h2>
					<p>How is your experience with us?</p>

					<input type="text" id="reviewer-name" name="reviewer-name" placeholder="Your Name" class="name-input">

					<!-- Star Rating -->
					<div class="star-rating">
						<span class="star" data-value="1">&#9733;</span>
						<span class="star" data-value="2">&#9733;</span>
						<span class="star" data-value="3">&#9733;</span>
						<span class="star" data-value="4">&#9733;</span>
						<span class="star" data-value="5">&#9733;</span>
					</div>

					<!-- Textarea for review -->
					<textarea id="review-text" name="review-text" rows="4" placeholder="Write something..."></textarea>

					<!-- Buttons -->
					<div class="modal-buttons">
						<button class="submit-button">Submit</button>
						<button class="cancel-button" onclick="toggleModal()">Cancel</button>
					</div>
				</div>
			</div>


		</section>


	</div>


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a href="PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
		</div>

		<div class="contacts-permits">
			<img src="ASSETS/logo.png" alt="" class="logo">

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
					<img src="ASSETS/icons/dti.png" alt="">
					<img src="ASSETS/icons/bir.png" alt="">
					<img src="ASSETS/icons/tanza.png" alt="">
				</div>
			</div>
		</div>
	</footer>


	<script src="script.js"></script>
	<script src="PAGES/chatbot/chatbot.js"></script>
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
	<script>
		function toggleModal() {
			const modal = document.getElementById('review-modal');
			modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
		}

		const stars = document.querySelectorAll('.star');
		stars.forEach((star) => {
			star.addEventListener('click', () => {
				stars.forEach(s => s.classList.remove('selected'));
				star.classList.add('selected');
			});
		});

		function submitReview() {
			const rating = [...stars].findIndex(star => star.classList.contains('selected')) + 1;
			const reviewText = document.getElementById('review-text').value;
			if (rating && reviewText.trim()) {
				alert(`Thank you for your feedback! Rating: ${rating} Stars, Review: ${reviewText}`);
				toggleModal();
			} else {
				alert('Please select a rating and write a review.');
			}
		}
	</script>
	<script>
		document.querySelector('.submit-button').addEventListener('click', () => {
			const name = document.getElementById('reviewer-name').value;
			const rating = [...document.querySelectorAll('#review-modal .star.selected')].length;
			const reviewText = document.getElementById('review-text').value;

			if (!name || !rating || !reviewText) {
				alert('Please fill out all fields and select a rating.');
				return;
			}

			const reviewData = {
				name: name,
				rating: rating,
				reviewText: reviewText
			};

			fetch('submit_review.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify(reviewData)
				})
				.then(response => response.json())
				.then(data => {
					if (data.message) {
						alert(data.message);
						toggleModal();
					} else {
						alert('Something went wrong. Please try again.');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					alert('An error occurred while submitting your review.');
				});
		});
	</script>

	<script>
		const stars = document.querySelectorAll('#review-modal .star');

		stars.forEach((star, index) => {
			star.addEventListener('click', () => {
				stars.forEach((s) => s.classList.remove('selected'));
				for (let i = 0; i <= index; i++) {
					stars[i].classList.add('selected');
				}
			});
		});
	</script>
	<script>
		function toggleLoginModal() {
			const modal = document.getElementById('login-modal');
			modal.style.display = modal.style.display === 'flex' ? 'none' : 'flex';
		}
	</script>
</body>

</html>