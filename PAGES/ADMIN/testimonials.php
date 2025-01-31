<?php
session_start();
// if (!isset($_SESSION['admin_logged_in'])) {
//     header("Location: login.php");
//     exit;
// }

$mysqli = new mysqli("localhost", "root", "", "jjk");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['approve_id'])) {
    $id = intval($_POST['approve_id']);
    $stmt = $mysqli->prepare("UPDATE testimonials SET approved = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

if (isset($_POST['reject_id'])) {
    $id = intval($_POST['reject_id']);
    $stmt = $mysqli->prepare("DELETE FROM testimonials WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$result = $mysqli->query("SELECT * FROM testimonials WHERE approved = 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Reviews</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .actions form { display: inline; }
    </style>
</head>
<body>

<h1>Pending Reviews</h1>

<table id="reviews-table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['comment']); ?></td>
                <td class="actions">
                    <form method="post">
                        <button type="submit" name="approve_id" value="<?php echo $row['id']; ?>">Approve</button>
                    </form>
                    <form method="post">
                        <button type="submit" name="reject_id" value="<?php echo $row['id']; ?>">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#reviews-table').DataTable({
            "pageLength": 5, 
            "lengthChange": false, 
            "order": [[0, 'asc']] 
        });
    });
</script>

<?php
$mysqli->close();
?>

</body>
</html>


