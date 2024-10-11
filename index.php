<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JKK Construction Services</title>
        <link rel="shortcut icon" href="ASSETS/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="CSS/navbar.css">
        <link rel="stylesheet" href="CSS/chatbot.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/home.css">
        
        <style>
            .chat-bot {
                .chat {
                    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('ASSETS/chatbotbg.png');
                    background-position: bottom;
                    background-size: cover;
                }
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
                    background: linear-gradient(45deg, color-mix(in srgb, #2D2F2A, white 10%), color-mix(in srgb,#4C553E, white 10%));
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
                    <img src="ASSETS/logo.png" alt="">
                </div>
    
                <ul class="links">
                    <a href="home.php">HOME</a>
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
    
                <div class="admin-login">
                    <a href="PAGES/ADMIN/login.php">LOGIN</a>
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
                            <a href="PAGES/SERVICES/projectmanagement.php" class="nav-btn service project"><p>Project</p> <p>Management</p></a>
                        </div>
                    </div>
                    <a href="PAGES/projects.php" class="nav-btn">PROJECTS</a>
                    <a href="PAGES/ADMIN/login.php" class="nav-btn">LOGIN</a>
                </ul>
            </div>
        </header>

        
        <button class="chatbot-btn" onclick="toggleChatbot()">
            <img src="ASSETS/chatbot.png" alt="">
        </button>

        <div class="chat-bot" id="chat-bot">
            <div class="chat-header">
                <img src="ASSETS/logoonly.png" alt="">
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
        </div>
        
        <div class="home">
            <section class="first-section">
                <h1>BUILD BEYOND LIMITS</h1>
                <p>Ready to build your project? Let's talk about your plans.</p>
                <a href="PAGES/appointment.php">Get an Appointment <i class="fa-regular fa-paper-plane"></i></a>
            </section>
    
            <section class="second-section">
                <div class="text-block">
                    <div class="text">CONSTRUCTION COMPANY IN THE PHILIPPINES</div>
                    <h2>You have a building project that needs to match your vision. <br>You want quality work, on time, and within budget.  <br>Now, you've found the team to make it happen.<br>Let's get started!</h2>
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
    
                <div class="reviews">
                    <div class="card-block">
                        <div class="card">
                            <img src="ASSETS/icons/testimonialsicon.png" alt="">
        
                            <div class="comment">
                                <p>"JKK Construction Company exceeded my expectations with their attention to detail and timely project completion. Highly recommend!"</p>
                            </div>
        
                            <div class="user-name">
                                <h3>Mike Torello</h3>
                            </div>
                        </div>
                        <div class="card">
                            <img src="ASSETS/icons/testimonialsicon.png" alt="">
        
                            <div class="comment">
                                <p>"Professionalism at its best! JKK Construction Company turned our vision into reality with precision and expertise."</p>
                            </div>
        
                            <div class="user-name">
                                <h3>Rick Wright</h3>
                            </div>
                        </div>
                        <div class="card">
                            <img src="ASSETS/icons/testimonialsicon.png" alt="">
        
                            <div class="comment">
                                <p>"From start to finish, JKK Construction Company demonstrated reliability and skill. Couldn't be happier with the results!"</p>
                            </div>
        
                            <div class="user-name">
                                <h3>Devon Miles</h3>
                            </div>
                        </div>
                        <div class="card">
                            <img src="ASSETS/icons/testimonialsicon.png" alt="">
        
                            <div class="comment">
                                <p>"Choosing JKK Construction Company was the best decision we made for our home renovation. Exceptional workmanship and exceptional service."</p>
                            </div>
        
                            <div class="user-name">
                                <h3>Wen Dee</h3>
                            </div>
                        </div>
                        <div class="card">
                            <img src="ASSETS/icons/testimonialsicon.png" alt="">
        
                            <div class="comment">
                                <p>"Impressed by the quality craftsmanship and commitment to customer satisfaction. JKK Construction Company is my go-to for all future projects."</p>
                            </div>
        
                            <div class="user-name">
                                <h3>Jo Nash</h3>
                            </div>
                        </div>
                    </div>
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
    
                <button class="write-review">Write Review</button>
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
    </body>
</html>
