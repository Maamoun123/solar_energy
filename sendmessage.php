<?php
require_once "includes/db.php";

// Sanitize and validate input
$first_name = isset($_GET['name']) ? trim($_GET['name']) : ''; // Assuming 'name' is the first name field
$first_name = preg_replace('/[^a-zA-Z]/', '', $first_name); // Remove non-alphabetic characters
$last_name = isset($_GET['lname']) ? trim($_GET['lname']) : ''; // Assuming 'lname' is the last name field
$email = isset($_GET['email']) ? trim($_GET['email']) : ''; // Assuming 'email' is the email field
$message = isset($_GET['message']) ? trim($_GET['message']) : ''; // Assuming 'message' is the message field
$last_name = preg_replace('/[^a-zA-Z]/', '', $last_name); // Remove non-alphabetic characters
$agree = isset($_GET['agree']) ? $_GET['agree'] : '';

if (empty($first_name) || empty($last_name) || empty($email) || empty($message) || !$agree) {
    echo "Please fill in all required fields.";
    exit();
}

// Check if user already exists - Modified to work with PDO instead of mysqli
try {
    $stmt = $pdo->prepare("SELECT UserID FROM user WHERE Email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $sender_id = $user['UserID'];
    } else {
        // Insert new user with minimal info (others NULL)
        $stmt = $pdo->prepare("INSERT INTO user (F_Name, L_Name, Email) VALUES (?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email]);
        $sender_id = $pdo->lastInsertId();
    }

    // Insert message into messages table
    $stmt = $pdo->prepare("INSERT INTO message (SenderID, AdminID, messagetext, Date, Reply) VALUES (?, NULL, ?, NOW(), NULL)");
    $stmt->execute([$sender_id, $message]);

    echo "<script>alert('Message sent successfully!'); window.location.href = 'thank-you-page.php?type=message';</script>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
