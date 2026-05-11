<?php
include '../includes/db_connect.php';

$students = $conn->query("SELECT * FROM students ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Admin - Student Applications</h1>
    <p>Total Applications: <?php echo $students->num_rows; ?></p>

    <table class="data-table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Program</th>
            <th>Status</th>
            <th>Date Applied</th>
        </tr>
        <?php
        while ($row = $students->fetch_assoc()) {
            echo "
            <tr>
                <td>" . htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . htmlspecialchars($row['program']) . "</td>
                <td><span class='status-badge'>" . $row['status'] . "</span></td>
                <td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>
            </tr>
            ";
        }
        ?>
    </table>

</div>

</body>
</html>