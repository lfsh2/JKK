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
		<nav class="navbar">
			<div class="logo">
				<img src="../../../ASSETS/logo.png" alt="Logo">
			</div>

			<ul class="links">
				<a href="../../../index.php">HOME</a>
				<a href="../../../PAGES/about.php">ABOUT</a>
				<div class="dropdown">
					<a href="../../../PAGES/SERVICES/services.php" class="service-btn">SERVICES</a>

					<div class="dropdown-block">
						<div class="dropdown-content">
							<button class="submenu-toggle" data-submenu="submenu1">Build</button>
							<div class="submenu" id="submenu1">
								<a href="../../../PAGES/SERVICES/BUILD/newbuild.php">New Build</a>
								<a href="../../../PAGES/SERVICES/BUILD/renovation.php">Renovation</a>
								<a href="../../../PAGES/SERVICES/BUILD/knockdownandrebuild.php">Knockdown and Rebuild</a>
								<a href="../../../PAGES/SERVICES/BUILD/electricalinstallation.php">Electrical Installation</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu2">Design</button>
							<div class="submenu" id="submenu2">
								<a href="../../../PAGES/SERVICES/DESIGN/architectural.php">Architectural Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/structural.php">Structural Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/electrical.php">Electrical Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/interior.php">Interior Design</a>
							</div>

							<button class="submenu-toggle" data-submenu="submenu3">Consultation</button>
							<div class="submenu" id="submenu3">
								<a href="../../../PAGES/SERVICES/CONSULTATION/propertyinspection.php">Property Inspection</a>
								<a href="../../../PAGES/SERVICES/CONSULTATION/conceptual.php">Conceptual Cost Estimate</a>
								<a href="../../../PAGES/SERVICES/CONSULTATION/projectinception.php">Project Inception</a>
							</div>
							
							<a href="../../../PAGES/SERVICES/projectmanagement.php">Project Management</a>
						</div>
					</div>
				</div>
				<a href="../../../PAGES/projects.php">PROJECTS</a>
			</ul>

			<!-- LOGIN modal trigger inside header -->
			<div class="user-login">
				<!-- <button onclick="toggleLoginModal()">Login</button> -->
			</div>

			<button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
		</nav>


		<div class="responsive-links" id="responsive-dropdown">
			<ul class="links">
				<a href="../../../home.php" class="nav-btn">HOME</a>
				<a href="../../../PAGES/about.php" class="nav-btn">ABOUT</a>
				<div class="dropdown" id="responsiveDropdown">
					<a href="../../../PAGES/SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>

					<div class="dropdown-content">
						<div class="dropdown-subMenu" id="subMenu1">
							<button onclick="toggleResponsiveSubmenu('subMenu1')" class="nav-btn">Build <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../../PAGES/SERVICES/BUILD/newbuild.php" class="nav-btn">New Build</a>
								<a href="../../../PAGES/SERVICES/BUILD/renovation.php" class="nav-btn">Renovation</a>
								<a href="../../../PAGES/SERVICES/BUILD/knockdownandrebuild.php" class="nav-btn">Knockdown and Rebuild</a>
								<a href="../../../PAGES/SERVICES/BUILD/electricalinstallation.php" class="nav-btn">Electrical Installation</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu2">
							<button onclick="toggleResponsiveSubmenu('subMenu2')" class="nav-btn">Design <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../../PAGES/SERVICES/DESIGN/architectural.php" class="nav-btn">Architectural Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/structural.php" class="nav-btn">Structural Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/electrical.php" class="nav-btn">Electrical Design</a>
								<a href="../../../PAGES/SERVICES/DESIGN/interior.php" class="nav-btn">Interior Design</a>
							</div>
						</div>
						<div class="dropdown-subMenu" id="subMenu3">
							<button onclick="toggleResponsiveSubmenu('subMenu3')" class="nav-btn">Consultation <i class="fa-solid fa-chevron-down"></i></button>
							<div class="submenu-content">
								<a href="../../../PAGES/SERVICES/CONSULTATION/propertyinspection.php" class="nav-btn">Property Inspection</a>
								<a href="../../../PAGES/SERVICES/CONSULTATION/conceptual.php" class="nav-btn">Conceptual Cost Estimate</a>
								<a href="../../../PAGES/SERVICES/CONSULTATION/projectinception.php" class="nav-btn">Project Inception</a>
							</div>
						</div>
						<a href="../../../PAGES/SERVICES/projectmanagement.php" class="nav-btn service project">
							<p>Project</p>
							<p>Management</p>
						</a>
					</div>
				</div>
				<a href="../../../PAGES/projects.php" class="nav-btn">PROJECTS</a>
				 
				<!-- <div class="user-login">
					<button onclick="toggleLoginModal()">Login</button>
				</div> -->
			</ul>
		</div>

	</header>

	<!--
        <button class="chatbot-btn" onclick="toggleChatbot()">
            <img src="../../../ASSETS/chatbot.png" alt="">
        </button>
        <div class="chat-bot" id="chat-bot">
            <div class="chat-header">
                <img src="../../../ASSETS/logoonly.png" alt="">
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
        </div>

        
        <button class="chatbot-btn" onclick="toggleChatbot()">
            <img src="../../../ASSETS/chatbot.png" alt="">
        </button>
        <div class="chat-bot" id="chat-bot">
            <div class="chat-header">
                <img src="../../../ASSETS/logoonly.png" alt="">
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
        </div>-->


	<div class="interior build">
		<div class="first-section">
			<h1>Our Services</h1>
			<h4>Interior Deisgn</h4>
		</div>

		<div class="second-section">
			<div class="text-block">
				<h1>Motivational and Innovative Interior Design and Decoration</h1>

				<p>JKK Construction Services is a leading construction firm known for its exceptional quality and innovative approach in the construction industry. With a focus on delivering superior craftsmanship and attention to detail, JKK Construction Services is committed to creating spaces that are not only functional but also aesthetically pleasing. The interior design and decoration services offered by JKK are an extension of this commitment, aiming to transform any space into a harmonious blend of style, comfort, and functionality. JKK Construction Services embraces a client-centric design philosophy, ensuring that each project reflects the unique tastes, lifestyle, and needs of the client. The company's design approach combines modern trends with timeless elegance, creating interiors that are both contemporary and enduring. Sustainability and environmental consciousness are also integral to JKK's design ethos, with a strong emphasis on using eco-friendly materials and practices.</p>
			</div>

			<div class="img-block">
				<img src="../../../ASSETS/services/serviceupper.jpg" alt="">
			</div>
		</div>

		<div class="third-section">
			<div class="card-block">
				<h1>Our Interior Deisign</h1>

				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte1.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>House Interior Design</h3>

						<p>When you're building, renovating, extending, or just decorating your home, it's crucial to create a space that feels harmonious, balanced, and comfortable, while also reflecting your personal style. At JKK Construction Services, we specialize in interior design and decorating. We're here to assist you in combining all the elements that come together to create your ideal home.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte2.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Small House Interior Design</h3>

						<p>Do you live in the city with a small house and big dreams? Having a small apartment or home doesn't mean you have to give up on style. You can create a stunningly beautiful small space with the right interior design. Our interior designers specialize in making the most out of small houses, ensuring you can enjoy a stylish and well-decorated home.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte3.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Office Interior Design</h3>

						<p>We specialize in designing commercial, corporate, and office interiors that are welcoming to customers. Our goal is to create spaces that showcase your products or services effectively. We arrange objects strategically to enhance comfort and encourage customers to explore. Our designs focus on themes and aesthetics that make users and customers feel satisfied and at ease.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte4.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>External Interiors</h3>

						<p>Outdoor spaces, although not indoors, are integral to the overall design and ambiance. We aim to transform them into wonderful spots for gatherings with friends and family, or simply serene retreats. With a mix of plants, flowers, comfortable armchairs, and cushions, these outdoor areas are designed to offer moments of enjoyment and relaxation.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte5.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Furniture Design and Selection</h3>

						<p>In addition to offering furniture selection, we provide comprehensive solutions tailored to your needs. Whether you need individual pieces or are planning furniture for a single room or an entire house, we've got you covered. Our specialty lies in designing custom furniture that fits perfectly into your spaces. We also handle custom upholstery and help you choose finishes that enhance your overall interior design. We collaborate closely with skilled artisans and suppliers to ensure every detail complements your vision.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte6.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>Interior Design for Renovation</h3>

						<p>Interior design plays a crucial role in renovations. Our interior designer possesses both technical expertise and psychological insight to enhance environments in terms of functionality, aesthetics, ergonomics, and comfort. They select the best materials and products tailored to each space's specific purpose and needs.</p>
					</div>
				</div>
				<div class="card">
					<div class="img-block">
						<img src="../../../ASSETS/services/Design/inte7.jpg" alt="">
					</div>

					<div class="text-block">
						<h3>School Building Interior</h3>

						<p>Thoughtful interior design in our school buildings aims to create spaces that are not only practical but also inspiring, supporting a conducive environment for learning and growth.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="fourth-section">
			<h1>Interior Design Process</h1>

			<div class="text-block">
				<img src="../../../ASSETS/services/Design/inte8.jpg" alt="">

				<p>Our interior design process is thorough and comprehensive, covering every aspect from initial concept to final decoration. We ensure that every detail is meticulously planned and executed, right down to the flowers in the vase and pictures on the wall.</p>

				<p><b>Initial Consultation-</b> During a face-to-face meeting, we listen carefully to our client's needs, desires, and questions regarding the spaces to be designed. This helps us understand their preferences and priorities through meaningful discussions, showing samples, and discussing options for materials, colors, and styles that will shape the project.</p>

				<p><b>Design Development:</b> Based on the initial consultation, we develop several layout options. To aid visualization, we present 3D renderings and photographic references that capture the essence of the project concept. The client plays a crucial role in this phase, actively participating and providing feedback until we reach a final approved layout.</p>

				<p><b>Budgeting and Planning:</b> We create detailed executive drawings and meticulously budget all products and services required for the design. This includes presenting a clear spreadsheet outlining the total investment and estimated timeline for execution.</p>

				<p><b>Project Management:</b> Throughout the entire process, we maintain close involvement, ensuring that all aspects align with the client's vision and interests. We liaise with suppliers, oversee scheduling, and supervise the installation of joinery, delivery of furniture, and all finishing touches.</p>

				<p><b>Final Production and Decoration</b> Once construction and installation are complete, we focus on enhancing the ambiance with decorative elements. We schedule a final day to meticulously style the interiors, placing decorative objects to add the finishing touches. By the end of this day, we present the completed property to the client, ready to be enjoyed with all details in place, from framed pictures to carefully arranged flowers. This commitment to delivering fully finished and decorated spaces sets us apart in our industry.</p>
			</div>
		</div>
	</div>


	<footer>
		<div class="footer-appointment">
			<h1>Still Having Doubt about your plan <br>Contact Us!</h1>

			<a href="../../../PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
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