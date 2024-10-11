<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>JJK Construction Services</title>
        <link rel="shortcut icon" href="../ASSETS/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="../CSS/navbar.css">
        <link rel="stylesheet" href="../CSS/chatbot.css">
        <link rel="stylesheet" href="../CSS/footer.css">
        <link rel="stylesheet" href="../CSS/about.css">
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

            .about {
                .first-section {
                    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../ASSETS/appointmentbg.jpg');
                    background-position: center;
                    background-size: cover;
                }
                .sixth-section {
                    background: linear-gradient(to bottom, rgba(255, 255, 255, 0.7),rgba(255, 255, 255, 0.7)), url('../ASSETS/appointmentbg.jpg');
                    background-blend-mode: normal;
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
                    <img src="../ASSETS/logo.png" alt="">
                </div>
    
                <ul class="links">
                    <a href="../home.php">HOME</a>
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
    
                <div class="admin-login">
                    <a href="../PAGES/ADMIN/login.php">LOGIN</a>
                </div>
    
                <button class="toggle-btn" onclick="toggle()"><i class="fa-solid fa-bars"></i></button>
            </nav>

            <div class="responsive-links" id="responsive-dropdown">
                <ul class="links">
                    <a href="../home.php" class="nav-btn">HOME</a>
                    <a href="../PAGES/about.php" class="nav-btn">ABOUT</a>
                    <div class="dropdown" id="responsiveDropdown">
                        <a href="./SERVICES/services.php" class="nav-btn service">SERVICES <i class="fa-solid fa-chevron-down"></i></a>
    
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
                            <a href="../PAGES/SERVICES/projectmanagement.php" class="nav-btn service project"><p>Project</p> <p>Management</p></a>
                        </div>
                    </div>
                    <a href="../PAGES/projects.php" class="nav-btn">PROJECTS</a>
                    <a href="../PAGES/ADMIN/login.php" class="nav-btn">LOGIN</a>
                </ul>
            </div>
        </header>

        
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
        </div>


        <div class="about">
            <div class="first-section">
                <h1>Our Company</h1>
                <h4>when you need us for improve your business, then come with us to help your then come have reach it, you just sit and feel that goal</h4>
            </div>

            <div class="second-section">
                <div class="img-block">
                    <img src="../ASSETS/about/first.png" alt="">
                </div>

                <div class="text-block">
                    <p>
                        <b>JKK CONSTRUCTION SERVICES</b> is a sole proprietorship duly organized under the laws of the Republic of the Philippines, owned and managed by spouses JEDDAH M. CAREL JR., and LEA DONES CAREL with its head office at Hidden Brooke Executive Village, Amaya 2, Tanza, Cavite, the company was registered in the Department of Trade and Industry on August 12,  2020 to expire on August 12, 2025. <br><br>
                        JKK Construction Services is dedicated to exceeding customer expectations by providing high-quality services. Our commitment to honesty, integrity, and a proactive approach to embracing changes and innovation sets us apart in the construction industry. As a company owned by its employees, we consistently go the extra mile on every project, ensuring that we fulfill our promises with utmost integrity. 
                    </p>
                </div>
            </div>

            <div class="third-section">
                <div class="img-block">
                    <img src="../ASSETS/about/second.png" alt="">
                </div>
                <div class="top-left-square"></div>
                <div class="mask-white"></div>
                <div class="bottom-right-black-square"></div>
            </div>

            <div class="fourth-section">
                <div class="title-block">
                    <h1>How we work with our <br> Clients.</h1>
                </div>

                <div class="text-block">
                    The main purpose of the company is to enter and make a mark in the Construction industry. It focuses on the construction of buildings of any kind of nature, offers consultation services, including property inspection, conceptual cost estimate and project inception and planning. Additionally, the company provides design services such as architectural design, structural design, electrical design, interior design, and build services like new builds, renovations, knockdown and rebuild, expertise in electrical installation and maintenance, and project management. Additionally, the company provides design services such as architectural design, structural design, electrical design, interior design, and build services like new builds, renovations, knockdown and rebuild, expertise in electrical installation and maintenance, and project management.
                </div>
            </div>

            <div class="fifth-section">
                <div class="img-block">
                    <img src="../ASSETS/about/third.jpg" alt="">
                </div>

                <h5>Furthermore, JKK CONSTRUCTION SERVICES has licensed civil engineers, electrical engineers, Sanitary Engineers, materials engineer, construction supervisors, and several construction laborers.</h5>
            </div>

            <div class="sixth-section">
                <h1>Our Core <br>Value</h1>
                <p>Our values shape the culture of our organization and define the character of our company</p>

                <div class="card-block">
                    <div class="card">
                        <img src="../ASSETS/icons/mission.png" alt="">

                        <h3>Mission</h3>

                        <p>To build enduring structures that inspire and enrich communities, driven by innovation, integrity, and excellence in construction.</p>
                    </div>

                    <div class="card">
                        <img src="../ASSETS/icons/vision.webp" alt="">

                        <h3>Vision</h3>

                        <p>To build enduring structures that inspire and enrich communities, driven by innovation, integrity, and excellence in construction.</p>
                    </div>
                </div>

                <div class="org-chart">
                    <h1>Organizational Chart</h1>

                    <img src="../ASSETS/jjkorgchart.png" alt="">
                </div>
            </div>

            <div class="seventh-section">
                <div class="img-block">
                    <img src="../ASSETS/about/owner.jpg" alt="">
                </div>

                <div class="owner">
                    <h1>Jeddah Malayo Carel Jr.</h1>
                    <h3>Owner / General Manager / Safety Officer</h3>
                    <p>He is the owner, General Manager, and Safety Officer of the company, bringing a lot of experience and expertise to his role.</p>
                    <p>He specializes in Roads and Vertical Structures and has worked for over 10 years at R.A. Del Rosario Construction. During this time, he has overseen many projects, ensuring they meet high standards of quality and safety.</p>
                    <p>He pays close attention to detail and is passionate about making sure every part of a project is done right. His leadership has helped the company grow and become well-respected in the industry.</p>
                    <p>He is known for working well with others and building strong relationships with clients and his team. He believes in clear communication and being involved in every aspect of a project.</p>
                    <p>His career shows how dedicated he is to construction, and his work has made a big impact on every project he's been a part of. He continues to lead the company, focusing on new ideas and ways to make projects better and more sustainable.</p>
                </div>
            </div>

            <div class="eighth-section">
                <h1>JKK SAFETY AND HEALTH OBJECTIVES</h1>

                <div class="card-block">
                    <div class="group">
                        <div class="card">
                            <img src="../ASSETS/about/safety1.jpg" alt="">
                            <p>Making each foreman a qualified safety person.</p>
                        </div>
                        <div class="card">
                            <img src="../ASSETS/about/safety2.jpg" alt="">
                            <p>Making Daily job site safety inspections.</p>
                        </div>
                        <div class="card">
                            <img src="../ASSETS/about/safety3.jpeg" alt="">
                            <p>Enforcing the use of safety equipment.</p>
                        </div>
                    </div>

                    <div class="group">
                        <div class="card">
                            <img src="../ASSETS/about/safety4.jpg" alt="">
                            <p>Following the safety procedures and rules.</p>
                        </div>
                        <div class="card">
                            <img src="../ASSETS/about/safety5.jpg" alt="">
                            <p>Providing on-going safety training.</p>
                        </div>
                        <div class="card">
                            <img src="../ASSETS/about/safety6.jpg" alt="">
                            <p>Enforcing safety rules and using appropriate discipline.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
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
    </body>
</html>