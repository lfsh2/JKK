<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Testimonials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        
        th {
            background: #444;
            color: white;
            font-weight: bold;
        }
        
        tr:hover {
            background: #f9f9f9;
            transition: 0.3s;
        }
        
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
            transition: transform 0.3s;
        }
        
        img:hover {
            transform: scale(1.1);
        }
        
        button {
            padding: 7px 12px;
            margin: 3px;
            cursor: pointer;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }
        
        .approve {
            background: #28a745;
            color: white;
        }
        
        .approve:hover {
            background: #218838;
            transform: scale(1.05);
        }
        
        .reject {
            background: #dc3545;
            color: white;
        }
        
        .reject:hover {
            background: #c82333;
            transform: scale(1.05);
        }
        
        .delete {
            background: #343a40;
            color: white;
        }
        
        .delete:hover {
            background: #23272b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h2>Manage Testimonials</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Comment</th>
            <th>Approval</th>
            <th>Actions</th>
        </tr>

        <?php
        $mysqli = new mysqli("localhost", "root", "", "jjk");
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        
        $result = $mysqli->query("SELECT * FROM testimonials ORDER BY id DESC");
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <img src="<?= $row['image_path'] ?: 'ASSETS/icons/testimonialsicon.png' ?>" alt="User Image">
                </td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['comment']) ?></td>
                <td><?= $row['approved'] ? "✅ Approved" : "⏳ Pending" ?></td>
                <td>
                    <?php if (!$row['approved']): ?>
                        <form action="update_testimonials.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="approve" class="approve">Approve</button>
                        </form>
                        <form action="update_testimonials.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="reject" class="reject">Reject</button>
                        </form>
                    <?php endif; ?>
                    <form action="update_testimonials.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete" class="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $mysqli->close(); ?>
