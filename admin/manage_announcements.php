<?php
include '../includes/db_connect.php';

$message = '';

// Handle Add Announcement
if (isset($_POST['add_announcement'])) {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $priority = trim($_POST['priority'] ?? 'normal');

    if (!empty($title) && !empty($content)) {
        $sql = "INSERT INTO announcements (title, content, date_posted, category, priority) 
                VALUES (?, ?, CURDATE(), ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $content, $category, $priority);
        
        if ($stmt->execute()) {
            $message = "✅ Announcement posted successfully!";
        }
        $stmt->close();
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM announcements WHERE id = $id");
    $message = "✅ Announcement deleted!";
}

$announcements = $conn->query("SELECT * FROM announcements ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Announcements - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Admin - Manage Announcements</h1>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST" class="form">
        <h2>Post New Announcement</h2>
        <input type="text" name="title" class="inp" placeholder="Title" required>
        <textarea name="content" class="inp" placeholder="Content" rows="5" required></textarea>
        <input type="text" name="category" class="inp" placeholder="Category (e.g., Important, Event)">
        <select name="priority" class="inp">
            <option value="normal">Normal Priority</option>
            <option value="high">High Priority</option>
        </select>
        <button type="submit" name="add_announcement" class="save-btn">Post Announcement</button>
    </form>

    <h2>Existing Announcements</h2>
    <table class="data-table">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Date</th>
            <th>Priority</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $announcements->fetch_assoc()) {
            echo "
            <tr>
                <td>" . substr($row['title'], 0, 30) . "...</td>
                <td>" . $row['category'] . "</td>
                <td>" . $row['date_posted'] . "</td>
                <td>" . $row['priority'] . "</td>
                <td><a href='?delete=" . $row['id'] . "' onclick='return confirm(\"Delete?\")' class='btn btn-delete'>Delete</a></td>
            </tr>
            ";
        }
        ?>
    </table>

</div>

</body>
</html>