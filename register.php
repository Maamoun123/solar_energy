<?php
//register.php – Registration Logic (Backend)
session_start();
require_once 'includes/db.php';

$errors = [];
$fields = ['f_name', 'l_name', 'username', 'email', 'password', 'confirm_password', 'address', 'city', 'state', 'country'];
$data = [];

foreach ($fields as $field) {
    $data[$field] = trim($_POST[$field] ?? '');
}

// CSRF Check
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $errors[] = "Invalid CSRF token.";
}

// Basic Validation
if (empty($data['f_name']) || strlen($data['f_name']) > 50) $errors[] = "Invalid first name.";
if (empty($data['l_name']) || strlen($data['l_name']) > 50) $errors[] = "Invalid last name.";
if (empty($data['username']) || strlen($data['username']) > 50) $errors[] = "Invalid username.";
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['email']) > 255) $errors[] = "Invalid email.";
if (
    strlen($data['password']) < 8 ||
    !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])/', $data['password'])
) {
    $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, number, and symbol.";
}
if ($data['password'] !== $data['confirm_password']) $errors[] = "Passwords do not match.";

// Check for duplicate username/email
try {
    $stmt = $pdo->prepare("SELECT UserID FROM user WHERE Username = :u OR Email = :e");
    $stmt->execute([':u' => $data['username'], ':e' => $data['email']]);
    if ($stmt->fetch()) {
        $errors[] = "Username or email already in use.";
    }
} catch (Exception $e) {
    $errors[] = "Database error.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $data;
    header("Location: register_form.php");
    exit();
}

// Insert into DB
try {
    $stmt = $pdo->prepare("INSERT INTO user (F_Name, L_Name, Username, Password, Email, Address, City, State, Country)
        VALUES (:f, :l, :u, :p, :e, :a, :c, :s, :co)");
    $stmt->execute([
        ':f' => $data['f_name'],
        ':l' => $data['l_name'],
        ':u' => $data['username'],
        ':p' => password_hash($data['password'], PASSWORD_DEFAULT),
        ':e' => $data['email'],
        ':a' => $data['address'],
        ':c' => $data['city'],
        ':s' => $data['state'],
        ':co' => $data['country']
    ]);
    $_SESSION['register_success'] = true;
    header("Location: thank-you-page.php?type=registration");
    exit();
} catch (Exception $e) {
    $_SESSION['errors'] = ["Failed to register. Please try again."];
    $_SESSION['old'] = $data;
    header("Location: register_form.php");
    exit();
}
