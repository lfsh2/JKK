<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id'];
include 'db_connection.php';

$sql = "SELECT first_name, middle_name, last_name, username, email, mobile, profile_image FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $middle_name, $last_name, $username, $email, $mobile, $profile_image);
$stmt->fetch();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['fname'];
    $middle_name = $_POST['mname'];
    $last_name = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobilenum'];

    $uploadDir = "uploads/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $profileImagePath = $profile_image; 
    if (!empty($_FILES["profile_image"]["name"])) {
        $fileName = basename($_FILES["profile_image"]["name"]);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];

        if (in_array($fileType, $allowedTypes)) {
            $profileImagePath = $uploadDir . time() . "_" . $fileName;
            if (!move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profileImagePath)) {
                die("Error uploading file.");
            }
        } else {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF allowed.");
        }
    }

    $sql = "UPDATE users SET first_name=?, middle_name=?, last_name=?, username=?, email=?, mobile=?, profile_image=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssi', $first_name, $middle_name, $last_name, $username, $email, $mobile, $profileImagePath, $user_id);

    if ($stmt->execute()) {
        header("Location: edit_profile.php?success=1");
        exit();
    } else {
        die("Error updating profile: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="../../../CSS/navbar.css">
    <link rel="stylesheet" href="../../../CSS/index2.css">
    <style>

        .container {
            width: 80%;
            margin: auto;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            background: #f4f4f4;
            border-radius: 10px;
        }
        .profile-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
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


    <div class="container">
        <h1>Edit Profile</h1>

        <?php if (isset($_GET['success'])): ?>
            <p style="color: green;">Profile updated successfully!</p>
        <?php endif; ?>

        <div class="profile-container">
            <?php if (!empty($profile_image)): ?>
                <img src="<?php echo htmlspecialchars($profile_image); ?>" alt="Profile Picture" class="profile-avatar">
            <?php else: ?>
                <img src="../../../ASSETS/default-avatar.png" alt="Default Avatar" class="profile-avatar">
            <?php endif; ?>
        </div>

        <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($first_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="mname">Middle Name</label>
                <input type="text" name="mname" id="mname" value="<?php echo htmlspecialchars($middle_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($last_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="mobilenum">Mobile Number</label>
                <input type="text" name="mobilenum" id="mobilenum" value="<?php echo htmlspecialchars($mobile); ?>" required>
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*">
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>

    <script src="../../../script.js"></script>

</body>
</html>
