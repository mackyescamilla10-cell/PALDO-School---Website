<?php
include '../includes/db_connect.php';

$message = '';

// Handle Add Program
if (isset($_POST['add_program'])) {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $duration = trim($_POST['duration'] ?? '');
    $level = trim($_POST['level'] ?? '');

    if (!empty($name)) {
        $sql = "INSERT INTO programs (name, description, duration, level) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $duration, $level);
        
        if ($stmt->execute()) {
            $message = "✅ Program added successfully!";
        }
        $stmt->close();
    }
}

// Handle Delete Program
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM programs WHERE id = $id");
    $message = "✅ Program deleted!";
}

$programs = $conn->query("SELECT * FROM programs ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Programs - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Admin - Manage Programs</h1>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST" class="form">
        <h2>Add New Program</h2>
        <input type="text" name="name" class="inp" placeholder="Program Name" required>
        <textarea name="description" class="inp" placeholder="Description" rows="3"></textarea>
        <input type="text" name="duration" class="inp" placeholder="Duration (e.g., 2 years)">
        <select name="level" class="inp">
            <option>Elementary</option>
            <option>High School</option>
            <option>College</option>
            <option>Training</option>
        </select>
        <button type="submit" name="add_program" class="save-btn">Add Program</button>
    </form>

    <h2>Existing Programs</h2>
    <table class="data-table">
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $programs->fetch_assoc()) {
            echo "
            <tr>
                <td>" . $row['name'] . "</td>
                <td>" . $row['level'] . "</td>
                <td>" . $row['duration'] . "</td>
                <td><a href='?delete=" . $row['id'] . "' onclick='return confirm(\"Delete?\")' class='btn btn-delete'>Delete</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</div>

</body>
</html>