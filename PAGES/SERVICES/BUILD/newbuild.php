<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JJK Construction Services</title>
        <link rel="shortcut icon" href="../../../ASSETS/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                    <img src="../../../ASSETS/logo.png" alt="">
                </div>
    
                <ul class="links">
                    <a href="../../../home.php">HOME</a>
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
    
                <div class="admin-login">
                    <a href="../../../PAGES/ADMIN/login.php">LOGIN</a>
                </div>
    
                <button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
            </nav>

            <div class="responsive-links" id="responsive-dropdown">
                <ul class="links">
                    <a href="../../../home.php" class="nav-btn">HOME</a>
                    <a href="../../../PAGES/about.php" class="nav-btn">ABOUT</a>
                    <div class="dropdown" id="responsiveDropdown">
                        <a href="../../SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>
    
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
                            <a href="../../../PAGES/SERVICES/projectmanagement.php" class="nav-btn service project"><p>Project</p> <p>Management</p></a>
                        </div>
                    </div>
                    <a href="../../../PAGES/projects.php" class="nav-btn">PROJECTS</a>
                    <a href="../../../PAGES/ADMIN/login.php" class="nav-btn">LOGIN</a>
                </ul>
            </div>
        </header>

        
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


        <div class="new-build build">
            <div class="first-section">
                <h1>Our Services</h1>
                <h4>New Build</h4>
            </div>

            <div class="second-section">
                <div class="text-block">
                    <h1>Construction Services For New Builds</h1>

                    <p>When planning a new construction project, it's crucial to choose a company that specializes in building new properties, whether they're homes or businesses. This company will take the architectural designs created by a team of architects and engineers and ensure that the construction meets all required standards for safety and quality.</p>
                    <p>Our commitment is to deliver high-quality work from start to finish, emphasizing innovation and customer satisfaction in everything we do. When you hire us, you gain access to comprehensive solutions across the building industry. This includes expertise in hydraulic and electrical systems, fire safety measures, custom interior designs, and flooring applications. Our team ensures that every aspect of your project is meticulously planned and executed according to your initial plans and budget, resulting in top-notch construction quality.</p>
                    <p>Choosing JKK Construction Services means partnering with a company dedicated to exceeding expectations. Join our long list of satisfied customers and partners who have relied on our expertise. Contact us today if you're looking for a reliable construction company for your new building project.</p>
                </div>

                <div class="img-block">
                    <img src="../../../ASSETS/services/serviceupper.jpg" alt="">
                </div>
            </div>

            <div class="third-section">
                <div class="card-block">
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/build/new1.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Custom Home Building Services</h3>

                            <p>Transform your dreams into reality with JKK Construction Services' new home construction services. Our expert builders specialize in crafting homes that Filipino families cherish—spaces that are comfortable, distinctive, and inspiring, while also enhancing the resale value of your property. When you choose JKK, you partner with a seasoned design team dedicated to bringing your vision to life with practicality, style, and allure. Your new home will showcase the latest in design trends and sustainable living practices, yet will uphold timeless standards of quality and durability. From initial concept to final execution, we handle every detail to ensure your home is a testament to your aspirations and expectations.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/build/new2.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Custom Commercial Building Services</h3>

                            <p>In the field of new commercial construction, our team of experienced professionals has successfully completed numerous projects that have left our clients highly satisfied. Our construction managers play a crucial role as trusted advisors, ensuring that our clients' visions are realized to their exact specifications. Our skilled construction staff are trained, certified, and experienced in managing all aspects of top-quality new commercial construction projects in the Philippines. We view ourselves as partners with our clients, sharing in the responsibility to ensure the success of their businesses through exceptional building projects. Our ability to understand our clients' goals and seamlessly integrate our expertise to achieve them is what distinguishes us as one of the most trusted construction companies in the Philippines.</p>
                        </div>
                    </div>
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