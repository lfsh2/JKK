<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "jjk";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments as transactions
$sql = "SELECT client_name, email, phone_number, appointment_date, appointment_time FROM appointments ORDER BY appointment_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="../../CSS/adminadmin.css">
    <style>
        body {
            background: white;
            color: black;
        }
        .transactions-container {
            max-width: 100%;
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }
        h2 {
            padding-bottom: 15px;
            border-bottom: 1px solid black;
        }
        .transactions-table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }
        .transactions-table th, .transactions-table td {
            padding: 15px;
            text-align: center;
            font-size: 1em;
            border-bottom: 1px solid black;
        }
        .transactions-table th {
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .transactions-table td {
            font-weight: 0;
        }
    </style>
</head>
<body>
    <div class="transactions-container">
        <h2>Clients Appointment</h2>

        <table class="transactions-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['client_name']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['phone_number']) ?></td>
                            <td><?= date('d M Y', strtotime($row['appointment_date'])) ?></td>
                            <td><?= htmlspecialchars($row['appointment_time']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No transactions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
