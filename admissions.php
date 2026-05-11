<?php
include 'includes/db_connect.php';

// Get programs for dropdown
$programs_list = $conn->query("SELECT DISTINCT name FROM programs ORDER BY name");
$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $program = trim($_POST['program'] ?? '');

    // Validation
    if (empty($firstname) || empty($lastname) || empty($email)) {
        $error_message = "❌ Please fill in all required fields!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "❌ Please enter a valid email address!";
    } else {
        // Insert into database
        $sql = "INSERT INTO students (firstname, lastname, email, phone, program, admission_date) 
                VALUES (?, ?, ?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $phone, $program);
        
        if ($stmt->execute()) {
            $success_message = "✅ Application submitted successfully! We will contact you soon.";
            header("Refresh: 3; url=index.php"); // Redirect after 3 seconds
        } else {
            $error_message = "❌ Error submitting application. Please try again!";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admissions - MySchool</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<section class="page-header">
    <div class="container">
        <h1>Admissions</h1>
        <p>Join our community of learners and achievers</p>
    </div>
</section>

<div class="container">

<!-- Admission Requirements -->
<section class="requirements-section">
    <h2>Admission Requirements</h2>
    <div class="requirements-list">
        <div class="requirement-item">
            <span class="requirement-number">1</span>
            <h3>Complete Application Form</h3>
            <p>Fill out the admission form below with accurate information</p>
        </div>
        <div class="requirement-item">
            <span class="requirement-number">2</span>
            <h3>Valid Government ID</h3>
            <p>Original or photocopy of birth certificate or passport</p>
        </div>
        <div class="requirement-item">
            <span class="requirement-number">3</span>
            <h3>Academic Records</h3>
            <p>Transcripts from previous school or institution</p>
        </div>
        <div class="requirement-item">
            <span class="requirement-number">4</span>
            <h3>Health Certificate</h3>
            <p>Proof of vaccination and general health assessment</p>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="application-form-section">
    <h2>Application Form</h2>
    
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
            <label>Email Address *</label>
            <input type="email" name="email" class="inp" required>
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" name="phone" class="inp">
        </div>

        <div class="form-group">
            <label>Desired Program</label>
            <select name="program" class="inp">
                <option value="">-- Select a Program --</option>
                <?php
                while ($program = $programs_list->fetch_assoc()) {
                    echo "<option value='" . $program['name'] . "'>" . $program['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="save-btn">Submit Application</button>
    </form>
</section>

<!-- Important Dates -->
<section class="important-dates">
    <h2>Important Dates</h2>
    <table class="dates-table">
        <tr>
            <th>Event</th>
            <th>Date</th>
        </tr>
        <tr>
            <td>Application Deadline</td>
            <td>May 31, 2026</td>
        </tr>
        <tr>
            <td>Entrance Exam</td>
            <td>June 10, 2026</td>
        </tr>
        <tr>
            <td>Results Announcement</td>
            <td>June 20, 2026</td>
        </tr>
        <tr>
            <td>School Reopening</td>
            <td>July 1, 2026</td>
        </tr>
    </table>
</section>

</div>

<?php include 'includes/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>