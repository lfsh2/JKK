<?php
$mysqli = new mysqli("localhost", "root", "", "jjk");

if (isset($_POST['approve_id'])) {
    $id = intval($_POST['approve_id']);
    $mysqli->query("UPDATE testimonials SET approved = 1 WHERE id = $id");
}

if (isset($_POST['reject_id'])) {
    $id = intval($_POST['reject_id']);
    $mysqli->query("DELETE FROM testimonials WHERE id = $id");
}

$result = $mysqli->query("SELECT * FROM testimonials WHERE approved = 0");
while ($row = $result->fetch_assoc()) {
    echo "<div>{$row['name']} - {$row['comment']}</div>";
    echo "<form method='post'>
            <button type='submit' name='approve_id' value='{$row['id']}'>Approve</button>
            <button type='submit' name='reject_id' value='{$row['id']}'>Reject</button>
          </form>";
}
$mysqli->close();
?>
