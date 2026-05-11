<?php
include 'includes/db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $program = trim($_POST['program'] ?? '');

    // Validation
    if (empty($firstname) || empty($lastname) || empty($email)) {
        echo json_encode(['success' => false, 'message' => 'All required fields must be filled!']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email address!']);
        exit;
    }

    // Insert into database
    $sql = "INSERT INTO students (firstname, lastname, email, phone, program, admission_date, status) 
            VALUES (?, ?, ?, ?, ?, NOW(), 'pending')";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $phone, $program);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Application submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error submitting application!']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
}
?>