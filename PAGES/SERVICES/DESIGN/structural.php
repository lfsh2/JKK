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


        <div class="structural build">
            <div class="first-section">
                <h1>Our Services</h1>
                <h4>Structural Design</h4>
            </div>

            <div class="second-section">
                <div class="text-block">
                    <h1>Strong Foundation, Solid Structures</h1>

                    <p>JKK Construction Services specializes in providing comprehensive structural design solutions for various construction projects, ensuring safety, functionality, and aesthetic appeal. </p>
                    <p>Our services cover residential, commercial, industrial, and infrastructural developments. Our design philosophy revolves around innovation, sustainability, and efficiency. </p>
                    <p>We strive to create structures that not only meet regulatory standards but also enhance the quality of life for occupants and contribute positively to the environment.</p>
                </div>

                <div class="img-block">
                    <img src="../../../ASSETS/services/serviceupper.jpg" alt="">
                </div>
            </div>

            <div class="third-section">
                <div class="card-block">
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/Design/struc1.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Our structural engineering services include:</h3>

                            <ul>
                                <li>Conducting feasibility studies for projects</li>
                                <li>Offering structural design services</li>
                                <li>Providing drafting services using Revit and AutoCAD</li>
                                <li>Certification of designs</li>
                                <li>Incorporating structural aspects into master planning</li>
                                <li>Conducting heritage assessments and preparing reports</li>
                                <li>Offering assessments and expert advice on structural issues</li>
                                <li>Preparing comprehensive structural reports</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/Design/struc2.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Why is Structural Design important?</h3>

                            <p>Architectural projects are meticulously planned to meet the needs of those who will use the building, while adhering to quality and safety standards. At JKK Construction Services, we deploy a skilled team and premium materials to conduct thorough analyses and identify optimal techniques and resources for each project. Our architectural designs promise functional and elegant spaces. We're recognized as leaders in our field because we harness our architects' expertise and cutting-edge technology to deliver projects of exceptional quality. We prioritize customer satisfaction with personalized services that ensure transparency, efficiency, and promptness in project development. Whether it's architectural, interior, or structural design, we bring your vision to life. Our residential and commercial projects not only meet immediate needs but also ensure long-term efficiency and quality.</p>
                        </div>
                    </div>

                    <div class="cards">
                        <h1>Selection of Building Method</h1>

                        <p>The construction method should be planned alongside architectural design to avoid needing changes later, like hiding columns and beams. But in reality, it's often up to the Structural Designer to decide on the best structure type.</p>
                    </div>

                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/Design/struc3.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Structural Launch</h3>

                            <p>This is the crucial stage where the designer focuses most of their effort and can really influence the cost of the project. When designing structural elements, the designer seeks the best solutions and evaluates how each decision affects safety, functionality, and cost. Usually, this stage happens at the same time as sizing, so comparisons can be made to choose the option that provides the most advantages.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/Design/struc4.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Structural Sizing</h3>

                            <p>During the Dimensioning phase, engineers calculate how strong the building needs to be to handle all the forces it will face over its lifetime. They adjust and recalculate the structure until they find the best design. By the end of this process, they decide on the exact sizes of all the parts that make up the building's frame. For reinforced concrete buildings, this also includes figuring out how much steel is needed.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="img-block">
                            <img src="../../../ASSETS/services/Design/struc5.jpg" alt="">
                        </div>

                        <div class="text-block">
                            <h3>Structural Detailing</h3>

                            <p>Once measurements are taken, we need to document all project details for the builder to follow. This involves creating detailed drawings for slabs, beams, and pillars, along with plans showing the load and shapes required. </p>
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