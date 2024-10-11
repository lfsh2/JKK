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

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM appointments WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('ASSETS');
            background-size: cover;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Appointment</h2>

    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<p class='success'>{$_SESSION['success_message']}</p>";
        unset($_SESSION['success_message']); 
    }
    ?>

    <form action="appointment_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="form-group">
            <label for="client">Client Name:</label>
            <input type="text" id="client" name="client" value="<?= $row['client_name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $row['email'] ?>" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?= $row['phone_number'] ?>" required>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?= $row['appointment_date'] ?>" required>
        </div>

        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" value="<?= $row['appointment_time'] ?>" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
                <option value="Canceled" <?= $row['status'] == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>
