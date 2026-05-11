<?php
include 'includes/db_connect.php';

//Announcements for the homepage
$announcements = $conn->query("SELECT * FROM announcements ORDER BY date_posted DESC LIMIT 3");
?>

<!DOCTYPE html>
<html>
<head>
    <title>MySchool - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<!--Top Section-->
<section class="hero">
    <div class="hero-content">
        <h1>Welcome to PALDO School!</h1>
        <p>Excellence in Education, Character, and Leadership</p>
        <a href="/school-website/admissions.php" class="btn btn-primary">Apply Now</a>
        <a href="/school-website/about.php" class="btn btn-secondary">Learn More</a>
    </div>
</section>

<!--Principals Message-->
<section class="principal-message">
    <div class="container">
        <div class="message-card">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100'%3E%3Ccircle cx='50' cy='50' r='50' fill='%237a3db8'/%3E%3Ctext x='50' y='60' text-anchor='middle' fill='white' font-size='60'%3E👨%3C/text%3E%3C/svg%3E" alt="Principal">
            <h2>Principal's Message</h2>
            <p>"At PALDO, we believe in nurturing not just the minds of our students, but also their character and leadership qualities. Our dedicated team of educators works tirelessly to provide an environment where every student can thrive and achieve their full potential."</p>
            <p><strong>- Principal Dr. John Paul Cordova</strong></p>
        </div>
    </div>
</section>

<!--Stats Section-->
<section class="stats">
    <div class="container">
        <div class="stat-card">
            <h3>3,000+</h3>
            <p>Active Students</p>
        </div>
        <div class="stat-card">
            <h3>67+</h3>
            <p>Highly Qualified Teachers</p>
        </div>
        <div class="stat-card">
            <h3>14+</h3>
            <p>Academic Programs</p>
        </div>
        <div class="stat-card">
            <h3>98.9%</h3>
            <p>Success Rate</p>
        </div>
    </div>
</section>

<!--Featured Programs-->
<section class="featured-programs">
    <div class="container">
        <h2>Our Academic Programs</h2>
        <div class="programs-grid">
            <div class="program-card">
                <div class="icon">📚</div>
                <h3>Elementary</h3>
                <p>Strong foundation in basic subjects and critical thinking skills.</p>
            </div>
            <div class="program-card">
                <div class="icon">🔬</div>
                <h3>High School</h3>
                <p>Science and humanities tracks with hands-on laboratory experience.</p>
            </div>
            <div class="program-card">
                <div class="icon">🎓</div>
                <h3>College</h3>
                <p>Advanced degree programs in IT, Business, and Engineering.</p>
            </div>
        </div>
    </div>
</section>

<!--Announcements-->
<section class="announcements-preview">
    <div class="container">
        <h2>Latest News & Announcements</h2>
        <div class="announcements-list">
            <?php
            if ($announcements->num_rows > 0) {
                while ($row = $announcements->fetch_assoc()) {
                    $priority_class = $row['priority'] == 'high' ? 'priority-high' : 'priority-normal';
                    echo "
                    <div class='announcement-item $priority_class'>
                        <div class='announcement-date'>" . date('M d, Y', strtotime($row['date_posted'])) . "</div>
                        <div class='announcement-category'>" . $row['category'] . "</div>
                        <h3>" . htmlspecialchars($row['title']) . "</h3>
                        <p>" . substr($row['content'], 0, 100) . "...</p>
                        <a href='/school-website/announcements.php'>Read more →</a>
                    </div>
                    ";
                }
            } else {
                echo "<p>No announcements yet.</p>";
            }
            ?>
        </div>
    </div>
</section>

<!--container section-->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Join PALDO?</h2>
        <p>Take the first step towards excellence in education</p>
        <a href="/school-website/admissions.php" class="btn btn-primary btn-large">Start Your Application</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>