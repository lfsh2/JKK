<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="../../CSS/adminadmin.css">
    <style>
        body,
        html {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            background: white;
            color: black;
        }

        .group,
        h1 {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .block {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            align-items: end;
            flex-direction: column;
            gap: 5px;

            button {
                width: 100px;
                padding: 3px;
                background: black;
                color: white;
                border: none;
                border-radius: 10px;
            }

            .search {
                display: flex;

                .search-box {
                    width: 150px;
                    margin-right: 3px;
                    background: transparent;
                    border: 1px solid rgba(0, 0, 0, 0.3);
                }
            }
        }

        table {
            width: 100%;
            text-align: center;
            margin-top: 30px;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid black;
        }

        td a {
            padding: 3px 5px;
            background: black;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="group">
        <h1>Client Details</h1>

        <div class="block">
            <button>Filter</button>
            <div class="search">
                <div class="search-box"></div>
                <button>Search</button>
            </div>
        </div>
    </div>

    <table id="appointmentsTable" class="display">
        <thead>
            <tr>
                <th>Client Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "jjk";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM appointments");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['client_name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone_number']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['appointment_time']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <a href='./appointment/appointment_edit.php?id={$row['id']}'>Edit</a> |
                            <a href='./appointment/appointment_delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#appointmentsTable').DataTable();
        });
    </script>

</body>

</html>