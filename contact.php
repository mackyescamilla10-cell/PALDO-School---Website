<?php
include 'includes/db_connect.php';

$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
        $error_message = "❌ Please fill in all required fields!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "❌ Please enter a valid email address!";
    } else {
        // Insert into database
        $sql = "INSERT INTO inquiries (firstname, lastname, email, phone, subject, message) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $subject, $message);
        
        if ($stmt->execute()) {
            $success_message = "✅ Thank you for your inquiry! We will respond within 24 hours.";
        } else {
            $error_message = "❌ Error sending inquiry. Please try again!";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact - MySchool</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We're here to help. Get in touch with us today!</p>
    </div>
</section>

<div class="container">

<div class="contact-layout">

<!--Contact Form-->
<section class="contact-form-section">
    <h2>Send us a Message</h2>
    
    <?php if (!empty($error_message)): ?>
        <div class="alert alert-error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    
    <?php if (!empty($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <form method="POST" class="form">
        <div class="form-group">
            <label>First Name *</label>
            <input type="text" name="firstname" class="inp" required>
        </div>

        <div class="form-group">
            <label>Last Name *</label>
            <input type="text" name="lastname" class="inp" required>
        </div>

        <div class="form-group">
            <label>Email *</label>
            <input type="email" name="email" class="inp" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="tel" name="phone" class="inp">
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" class="inp">
        </div>

        <div class="form-group">
            <label>Message *</label>
            <textarea name="message" class="inp" rows="5" required></textarea>
        </div>

        <button type="submit" class="save-btn">Send Message</button>
    </form>
</section>

<!--Contact Info-->
<section class="contact-info-section">
    <h2>Contact Information</h2>
    
    <div class="contact-card">
        <h3>📍 Address</h3>
        <p>5VW7+JP3, Negros South Road<br> Binalbagan, Negros Occidental <br>Philippines</p>
    </div>

    <div class="contact-card">
        <h3>📞 Phone</h3>
        <p>Main: (63+) 9123456789<br>Admissions: (63+) 9676767676<br>Available Mon-Fri, 8AM-5PM</p>
    </div>

    <div class="contact-card">
        <h3>✉️ Email</h3>
        <p>General: info@paldo.edu<br>Admissions: admissions@paldo.edu<br>Support: support@paldo.edu</p>
    </div>

    <div class="contact-card">
        <h3>🕐 Office Hours</h3>
        <p>Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: CLOSED</p>
    </div>
</section>

</div>

<!--Google Map-->
<section class="map-section">
    <h2>Find Us On The Map</h2>
    <div class="map-container">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.8165683954963!2d123.1678900!3d10.3041700!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99e3e0000001%3A0x0!2sBinalbagan%20Catholic%20College%2C%20Inc.!5e0!3m2!1sen!2sph!4v1683564789123" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php include 'includes/footer.php';?>

<script src="js/script.js"></script>

</body>
</html>