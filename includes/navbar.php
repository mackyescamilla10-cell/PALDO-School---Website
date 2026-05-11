<?php
// Navigation Bar
?>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <h1>🏫 PALDO! School</h1>
        </div>
        <div class="nav-toggle" id="navToggle">☰</div>
        <ul class="nav-menu" id="navMenu">
            <li><a href="/school-website/index.php">🏠 Home</a></li>
            <li><a href="/school-website/about.php">ℹ️ About</a></li>
            <li><a href="/school-website/programs.php">📚 Programs</a></li>
            <li><a href="/school-website/admissions.php">📋 Admissions</a></li>
            <li><a href="/school-website/announcements.php">📢 News</a></li>
            <li><a href="/school-website/contact.php">✉️ Contact</a></li>
        </ul>
    </div>
</nav>

<script>
// Mobile Menu Toggle
document.getElementById('navToggle').addEventListener('click', function() {
    const menu = document.getElementById('navMenu');
    menu.classList.toggle('active');
});
</script>