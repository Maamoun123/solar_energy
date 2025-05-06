<?php
// login.php - Authentication Logic (Backend)
// This file processes login requests for both users and admins
// It validates credentials, creates sessions, and handles authentication errors

session_start();
require_once 'includes/db.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login_form.php");
    exit();
}

$errors = [];

// CSRF Check
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $errors[] = "Invalid request. Please try again.";
    $_SESSION['errors'] = $errors;
    header("Location: login_form.php");
    exit();
}

// Determine login type (user or admin)
$login_type = $_POST['login_type'] ?? 'user';

// Validate inputs
$login_id = trim($_POST['login_id'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

if (empty($login_id) || empty($password)) {
    $errors[] = "All fields are required.";
    $_SESSION['errors'] = $errors;
    header("Location: login_form.php");
    exit();
}

try {
    if ($login_type === 'user') {
        // User login (check by username or email)
        $stmt = $pdo->prepare("SELECT UserID, Username, Password, F_Name, L_Name, Email FROM user 
                              WHERE Username = :id OR Email = :id");
        $stmt->execute([':id' => $login_id]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['Password'])) {
            // Create user session
            $_SESSION['user_id'] = $user['UserID'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['user_fullname'] = $user['F_Name'] . ' ' . $user['L_Name'];
            $_SESSION['user_email'] = $user['Email'];
            $_SESSION['is_admin'] = false;
            $_SESSION['logged_in'] = true;

            // Set remember me cookie if requested (30 days)
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $expires = time() + (86400 * 30); // 30 days

                // Store token in database
                $stmt = $pdo->prepare("UPDATE user SET RememberToken = :token, TokenExpires = :expires 
                                      WHERE UserID = :id");
                $stmt->execute([
                    ':token' => password_hash($token, PASSWORD_DEFAULT),
                    ':expires' => date('Y-m-d H:i:s', $expires),
                    ':id' => $user['UserID']
                ]);

                // Set cookie
                setcookie('remember_user', $user['UserID'] . ':' . $token, $expires, '/', '', true, true);
            }

            // Redirect to dashboard or homepage
            header("Location: dashboard/user.php");
            exit();
        } else {
            $errors[] = "Invalid username/email or password.";
        }
    } else {
        // Admin login
        $stmt = $pdo->prepare("SELECT AdminID, Admin_name, Password, Email FROM admin 
                              WHERE Admin_name = :id OR Email = :id");
        $stmt->execute([':id' => $login_id]);
        $admin = $stmt->fetch();

        if ($admin) {
            // For debugging purposes
            error_log("Admin found: " . $admin['Admin_name']);
            error_log("Password verification: " . ($admin && password_verify($password, $admin['Password']) ? "Success" : "Failed"));

            if (password_verify($password, $admin['Password'])) {
                // Create admin session
                $_SESSION['admin_id'] = $admin['AdminID'];
                $_SESSION['admin_name'] = $admin['Admin_name'];
                $_SESSION['admin_email'] = $admin['Email'];
                $_SESSION['is_admin'] = true;
                $_SESSION['logged_in'] = true;

                // Redirect to admin dashboard
                header("Location: dashboard/admin.php");
                exit();
            } else {
                $errors[] = "Invalid admin credentials.";
            }
        } else {
            $errors[] = "Invalid admin credentials.";
        }
    }
} catch (Exception $e) {
    $errors[] = "An error occurred. Please try again later.";
    // Log the error for administrator (don't show to user)
    error_log("Login error: " . $e->getMessage());
}

// If we're here, authentication failed
$_SESSION['errors'] = $errors;
header("Location: login_form.php");
exit();
