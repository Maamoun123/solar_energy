<?php
session_start();
require_once 'includes/db.php';

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$success = false;
$token = $_GET['token'] ?? '';

// First, check if the ResetToken and ResetTokenExpires columns exist in the user table
// If not, add them (for consistency with forgot_password.php)
try {
    $stmt = $pdo->prepare("SHOW COLUMNS FROM user LIKE 'ResetToken'");
    $stmt->execute();
    $resetTokenExists = $stmt->fetch();

    $stmt = $pdo->prepare("SHOW COLUMNS FROM user LIKE 'ResetTokenExpires'");
    $stmt->execute();
    $resetTokenExpiresExists = $stmt->fetch();

    // If the columns don't exist, add them
    if (!$resetTokenExists) {
        $pdo->exec("ALTER TABLE user ADD COLUMN ResetToken VARCHAR(255) DEFAULT NULL");
    }

    if (!$resetTokenExpiresExists) {
        $pdo->exec("ALTER TABLE user ADD COLUMN ResetTokenExpires DATETIME DEFAULT NULL");
    }
} catch (Exception $e) {
    // Log the error but don't show it to the user
    error_log("Error checking/creating columns: " . $e->getMessage());
}

// Check if token is provided
if (empty($token)) {
    $errors[] = "Invalid or missing reset token.";
}

// Verify token is valid and not expired
if (empty($errors)) {
    try {
        $stmt = $pdo->prepare("SELECT UserID, Username, Email, ResetToken, ResetTokenExpires FROM user 
                              WHERE ResetToken = :token");
        $stmt->execute([':token' => $token]);
        $user = $stmt->fetch();

        // Check if user exists and token is valid
        if (!$user || empty($user['ResetToken'])) {
            $errors[] = "Invalid reset token.";
        }
        // Check if token has expired
        elseif (strtotime($user['ResetTokenExpires']) < time()) {
            $errors[] = "This password reset link has expired. Please request a new one.";

            // Clear expired token
            $stmt = $pdo->prepare("UPDATE user SET ResetToken = NULL, ResetTokenExpires = NULL WHERE UserID = :id");
            $stmt->execute([':id' => $user['UserID']]);
        }
    } catch (Exception $e) {
        $errors[] = "An error occurred. Please try again later.";
        error_log("Password reset verification error: " . $e->getMessage());
        // For debugging only - remove in production
        $_SESSION['debug_error'] = $e->getMessage();
    }
}

// Handle form submission for new password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors)) {
    // CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = "Invalid request. Please try again.";
    } else {
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';

        // Validate passwords
        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        } elseif ($password !== $confirm_password) {
            $errors[] = "Passwords do not match.";
        } else {
            try {
                // Update password and clear reset token
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE user SET 
                                        Password = :password,
                                        ResetToken = NULL,
                                        ResetTokenExpires = NULL
                                      WHERE UserID = :id");
                $stmt->execute([
                    ':password' => $hashed_password,
                    ':id' => $user['UserID']
                ]);

                $success = true;

                // Log the user out if they were logged in
                if (isset($_SESSION['user_id'])) {
                    // Just clear the session variables, not the entire session
                    unset($_SESSION['user_id']);
                    unset($_SESSION['username']);
                    unset($_SESSION['user_fullname']);
                    unset($_SESSION['user_email']);
                    unset($_SESSION['is_admin']);
                    unset($_SESSION['logged_in']);
                }
            } catch (Exception $e) {
                $errors[] = "An error occurred while updating your password. Please try again later.";
                error_log("Password update error: " . $e->getMessage());
                // For debugging only - remove in production
                $_SESSION['debug_error'] = $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Solar Energy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
            padding-bottom: 60px;
        }

        .background-container {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            overflow: hidden;
        }

        .background-placeholder {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .background-video {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .container {
            max-width: 500px;
            margin-top: 60px;
        }

        .brand-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand-container h2 {
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
            font-weight: 700;
            font-size: 2.2rem;
        }

        form.bg-white {
            background-color: white !important;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 35px !important;
        }

        label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            padding-left: 45px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .input-group {
            position: relative;
        }

        .input-group-append {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            color: #6b7280;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }

        .btn-success {
            background-color: #4CAF50 !important;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 17px;
            padding: 13px 24px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #3e8e41 !important;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            color: #3e8e41;
            text-decoration: underline;
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: white;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .password-requirements {
            font-size: 14px;
            color: #6b7280;
            margin-top: 5px;
        }

        .debug-info {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
            font-family: monospace;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="background-container">
        <img src="assets/images/solar-background-placeholder.jpg" class="background-placeholder" alt="Solar Background">
        <video autoplay loop muted playsinline class="background-video" preload="auto">
            <source src="assets/videos/solar-background.mp4" type="video/mp4">
        </video>
    </div>

    <div class="container py-5">
        <div class="brand-container">
            <h2>Solar Energy</h2>
            <h2>Reset Your Password</h2>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php if (isset($_SESSION['debug_error']) && !empty($_SESSION['debug_error'])): ?>
                <div class="debug-info">
                    <strong>Debug Error (Remove in production):</strong><br>
                    <?= htmlspecialchars($_SESSION['debug_error']) ?>
                </div>
                <?php unset($_SESSION['debug_error']); ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <p>Your password has been successfully reset!</p>
            </div>
            <div class="bg-white p-4 text-center rounded shadow">
                <p>You can now log in with your new password.</p>
                <a href="login_form.php" class="btn btn-success mt-3">Go to Login</a>
            </div>
        <?php elseif (empty($errors)): ?>
            <form action="reset_password.php?token=<?= htmlspecialchars($token) ?>" method="POST" class="bg-white">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                <div class="mb-4">
                    <p class="text-center">Please enter your new password below.</p>
                </div>

                <div class="mb-3">
                    <label for="password">New Password</label>
                    <div class="input-group">
                        <span class="input-group-append">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <span class="password-toggle">
                            <i class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                    <div class="password-requirements">
                        Password must be at least 8 characters long.
                    </div>
                </div>

                <div class="mb-4">
                    <label for="confirm_password">Confirm New Password</label>
                    <div class="input-group">
                        <span class="input-group-append">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                        <span class="password-toggle">
                            <i class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Reset Password</button>
            </form>
        <?php else: ?>
            <div class="text-center mt-4">
                <a href="forgot_password.php" class="btn btn-success">
                    <i class="fas fa-arrow-left me-1"></i> Back to Forgot Password
                </a>
            </div>
        <?php endif; ?>

        <div class="form-footer">
            <p>&copy; 2025 Solar Energy. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.querySelectorAll('.password-toggle').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const passwordInput = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                }
            });
        });
    </script>
</body>

</html>