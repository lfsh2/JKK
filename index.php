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
	<link rel="stylesheet" href="CSS/index2.css">

	<style>
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
		<?php include 'PAGES/navbar.php'; ?>
	</header>

	<div class="home">
		<section class="first-section">
			<h1>BUILD BEYOND LIMITS</h1>
			<a href="PAGES/services/services.php">See the services that we offer <i class="fas fa-hat-wizard"></i></a>
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

				$result = $mysqli->query("SELECT name, comment, image_path, rating FROM testimonials WHERE approved = 1");

				while ($row = $result->fetch_assoc()) {
					$imagePath = !empty($row['image_path']) ? "PAGES/ADMIN/" . $row['image_path'] : "ASSETS/icons/testimonialsicon.png";
					$rating = intval($row['rating']);

					echo "<div class='testimonial-card'>";
					echo "    <div class='profile-img'>";
					echo "        <img src='" . htmlspecialchars($imagePath) . "' alt='User Image'>";
					echo "    </div>";
					echo "    <div class='comment'><p>&quot;" . htmlspecialchars($row['comment']) . "&quot;</p></div>";
					echo "    <div class='user-name'><h3>" . htmlspecialchars($row['name']) . "</h3></div>";

					echo "    <div class='star-rating'>";
					for ($i = 1; $i <= 5; $i++) {
						if ($i <= $rating) {
							echo "<span class='star'>&#9733;</span>";
						} else {
							echo "<span class='star'>&#9734;</span>";
						}
					}
					echo "    </div>";

					echo "</div>";
				}

				$mysqli->close();
				?>
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

					<form action="PAGES/ADMIN/submit_testimonials.php" method="POST" enctype="multipart/form-data">
						<input type="text" id="reviewer-name" name="reviewer-name" placeholder="Your Name" class="name-input">

						<input type="hidden" id="rating-input" name="rating" value="5">
						<div class="star-rating">
							<span class="star" data-value="1">&#9733;</span>
							<span class="star" data-value="2">&#9733;</span>
							<span class="star" data-value="3">&#9733;</span>
							<span class="star" data-value="4">&#9733;</span>
							<span class="star" data-value="5">&#9733;</span>
						</div>

						<textarea id="review-text" name="review-text" rows="4" placeholder="Write something..."></textarea>

						<input type="file" name="image" accept="image/*" class="image-input">

						<div class="modal-buttons">
							<!-- <button class="submit-button">Cancel</button>-->
							<button class="cancel-button" onclick="toggleModal()">Submit</button>
						</div>
				</div>
			</div>


		</section>


	</div>


	<footer>
		<?php include 'PAGES/footer.php' ?>
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

		window.onclick = function(event) {
			var modal = document.getElementById("review-modal");
			if (event.target === modal) {
				modal.style.display = "none";
			}
		};
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