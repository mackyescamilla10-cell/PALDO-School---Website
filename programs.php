<?php
include 'includes/db_connect.php';

// Get all programs
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$query = "SELECT * FROM programs WHERE 1=1";

if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $query .= " AND (name LIKE '%$search_safe%' OR description LIKE '%$search_safe%')";
}

if (!empty($filter)) {
    $filter_safe = $conn->real_escape_string($filter);
    $query .= " AND level = '$filter_safe'";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Academic Programs - PALDO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Academic Programs</h1>
        <p>Explore our comprehensive range of educational programs</p>
    </div>
</section>

<div class="container">

<!-- Search & Filter -->
<section class="search-section">
    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search programs..." value="<?php echo htmlspecialchars($search); ?>" class="inp">
        <select name="filter" class="inp" style="width: 25%;">
            <option value="">All Levels</option>
            <option value="Elementary" <?php echo $filter === 'Elementary' ? 'selected' : ''; ?>>Elementary</option>
            <option value="High School" <?php echo $filter === 'High School' ? 'selected' : ''; ?>>High School</option>
            <option value="College" <?php echo $filter === 'College' ? 'selected' : ''; ?>>College</option>
            <option value="Training" <?php echo $filter === 'Training' ? 'selected' : ''; ?>>Training</option>
        </select>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</section>

<!-- Programs Grid -->
<section class="programs-section">
    <div class="programs-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='program-card-full'>
                    <div class='program-header'>
                        <h3>" . htmlspecialchars($row['name']) . "</h3>
                        <span class='level-badge'>" . $row['level'] . "</span>
                    </div>
                    <p>" . htmlspecialchars($row['description']) . "</p>
                    <div class='program-details'>
                        <p><strong>Duration:</strong> " . $row['duration'] . "</p>
                        <p><strong>Capacity:</strong> " . $row['capacity'] . " students</p>
                    </div>
                    <a href='/school-website/admissions.php' class='btn btn-secondary'>Apply for this Program</a>
                </div>
                ";
            }
        } else {
            echo "<p style='text-align: center; grid-column: 1/-1;'>No programs found.</p>";
        }
        ?>
    </div>
</section>

</div>

<?php include 'includes/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>