<?php
include 'includes/db_connect.php';

// Get all announcements
$filter = isset($_GET['category']) ? $_GET['category'] : '';

$query = "SELECT * FROM announcements WHERE 1=1";

if (!empty($filter)) {
    $filter_safe = $conn->real_escape_string($filter);
    $query .= " AND category = '$filter_safe'";
}

$query .= " ORDER BY date_posted DESC";
$result = $conn->query($query);

// Get unique categories
$categories = $conn->query("SELECT DISTINCT category FROM announcements ORDER BY category");
?>

<!DOCTYPE html>
<html>
<head>
    <title>News & Announcements - MySchool</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>News & Announcements</h1>
        <p>Stay updated with the latest school news and events</p>
    </div>
</section>

<div class="container">

<!-- Category Filter -->
<section class="filter-section">
    <h3>Filter by Category:</h3>
    <div class="category-buttons">
        <a href="announcements.php" class="filter-btn <?php echo empty($filter) ? 'active' : ''; ?>">All</a>
        <?php
        while ($cat = $categories->fetch_assoc()) {
            $active = ($filter === $cat['category']) ? 'active' : '';
            echo "<a href='?category=" . urlencode($cat['category']) . "' class='filter-btn $active'>" . $cat['category'] . "</a>";
        }
        ?>
    </div>
</section>

<!-- Announcements List -->
<section class="announcements-full">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $priority_class = $row['priority'] == 'high' ? 'priority-high' : 'priority-normal';
            echo "
            <div class='announcement-full $priority_class'>
                <div class='announcement-top'>
                    <div class='announcement-date'>" . date('F d, Y', strtotime($row['date_posted'])) . "</div>
                    <div class='announcement-category'>" . $row['category'] . "</div>
                </div>
                <h2>" . htmlspecialchars($row['title']) . "</h2>
                <div class='announcement-content'>" . htmlspecialchars_decode($row['content']) . "</div>
            </div>
            ";
        }
    } else {
        echo "<p style='text-align: center;'>No announcements found.</p>";
    }
    ?>
</section>

</div>

<?php include 'includes/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>