<?php
include 'includes/db_connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>About - PALDO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>About PALDO</h1>
        <p>Learn more about our institution and values</p>
    </div>
</section>

<div class="container">

<!--School History-->
<section class="about-section">
    <h2>Our History</h2>
    <p>PALDO was founded in 1967 with a vision to provide quality education to students of all backgrounds. Over the past 59 years, we have grown into one of the leading educational institutions in the region, serving over 3,000 students annually.</p>
</section>

<!--Mission & Vision-->
<section class="mission-vision">
    <div class="mission-card">
        <h3>Our Mission</h3>
        <p>To provide excellence in education through innovative teaching methods, character development, and preparation for future leadership roles in society.</p>
    </div>
    <div class="vision-card">
        <h3>Our Vision</h3>
        <p>To be a leading institution recognized for academic excellence, holistic development, and producing graduates who contribute positively to society.</p>
    </div>
</section>

<!--Values-->
<section class="values-section">
    <h2>Core Values</h2>
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">🎓</div>
            <h3>Excellence</h3>
            <p>We strive for the highest standards in everything we do.</p>
        </div>
        <div class="value-card">
            <div class="value-icon">🤝</div>
            <h3>Integrity</h3>
            <p>Honesty and transparency in all our dealings.</p>
        </div>
        <div class="value-card">
            <div class="value-icon">🌱</div>
            <h3>Growth</h3>
            <p>Continuous improvement and personal development.</p>
        </div>
        <div class="value-card">
            <div class="value-icon">💪</div>
            <h3>Resilience</h3>
            <p>Perseverance in overcoming challenges.</p>
        </div>
    </div>
</section>

<!--Facilities-->
<section class="facilities-section">
    <h2>Our Facilities</h2>
    <div class="facilities-grid">
        <div class="facility-card">
            <div class="facility-icon">🏛️</div>
            <h3>Modern Classrooms</h3>
            <p>Air-conditioned, equipped with smart boards and multimedia facilities</p>
        </div>
        <div class="facility-card">
            <div class="facility-icon">🔬</div>
            <h3>Science Laboratories</h3>
            <p>Fully equipped labs for Biology, Chemistry, and Physics</p>
        </div>
        <div class="facility-card">
            <div class="facility-icon">📚</div>
            <h3>Library</h3>
            <p>Extensive collection of books and digital resources</p>
        </div>
        <div class="facility-card">
            <div class="facility-icon">💻</div>
            <h3>Computer Labs</h3>
            <p>Latest computers with high-speed internet connectivity</p>
        </div>
        <div class="facility-card">
            <div class="facility-icon">⚽</div>
            <h3>Sports Complex</h3>
            <p>Basketball court, volleyball court, and athletic field</p>
        </div>
        <div class="facility-card">
            <div class="facility-icon">🎭</div>
            <h3>Auditorium</h3>
            <p>500-seat venue for events and performances</p>
        </div>
    </div>
</section>

<!--Leadership-->
<section class="leadership-section">
    <h2>School Leadership</h2>
    <div class="leadership-grid">
        <div class="leader-card">
            <div class="leader-avatar">👨‍💼</div>
            <h3>Dr. John Paul Cordova</h3>
            <p><strong>Principal</strong></p>
            <p>Ed.D. in Educational Leadership with 20+ years of experience</p>
        </div>
        <div class="leader-card">
            <div class="leader-avatar">👨‍💼</div>
            <h3>Mr. Jaser Mabaquiao</h3>
            <p><strong>Vice Principal - Academic</strong></p>
            <p>M.Sc. in Curriculum Development</p>
        </div>
        <div class="leader-card">
            <div class="leader-avatar">👨‍💼</div>
            <h3>Mr. Jeoff Eumenda</h3>
            <p><strong>Vice Principal - Administration</strong></p>
            <p>MBA in Educational Administration</p>
        </div>
    </div>
</section>

</div>

<?php include 'includes/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>