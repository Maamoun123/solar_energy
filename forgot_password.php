<?php
session_start();
require_once 'includes/db.php';

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$success_message = '';

// First, check if the ResetToken and ResetTokenExpires columns exist in the user table
// If not, add them
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors[] = "Invalid request. Please try again.";
    } else {
        $email = trim($_POST['email'] ?? '');

        // Validate email
        if (empty($email)) {
            $errors[] = "Email address is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        } else {
            try {
                // Check if the email exists in the database
                $stmt = $pdo->prepare("SELECT UserID, Username, Email FROM user WHERE Email = :email");
                $stmt->execute([':email' => $email]);
                $user = $stmt->fetch();

                if ($user) {
                    // Generate reset token
                    $token = bin2hex(random_bytes(32));
                    $expires = date('Y-m-d H:i:s', time() + 3600); // Token valid for 1 hour

                    // Store token in database
                    $stmt = $pdo->prepare("UPDATE user SET ResetToken = :token, ResetTokenExpires = :expires WHERE UserID = :id");
                    $stmt->execute([
                        ':token' => $token,
                        ':expires' => $expires,
                        ':id' => $user['UserID']
                    ]);

                    // Create reset link
                    $reset_link = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/reset_password.php?token=" . $token;

                    // In a production environment, you would send an actual email here
                    // For this implementation, we'll just show the link
                    $success_message = "Password reset instructions have been sent to your email.";

                    // For demonstration purposes only - in production this would be removed
                    // and the actual email would be sent instead
                    $_SESSION['reset_demo_link'] = $reset_link;
                    $_SESSION['reset_demo_email'] = $email;
                } else {
                    // To prevent email enumeration, provide the same message even if email doesn't exist
                    $success_message = "If your email is registered in our system, you will receive password reset instructions shortly.";
                }
            } catch (Exception $e) {
                $errors[] = "An error occurred. Please try again later.";
                // Improved error logging
                error_log("Password reset error: " . $e->getMessage());
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
    <title>Forgot Password - Solar Energy</title>
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

        .demo-link {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            word-break: break-all;
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
            <h2>Forgot Password</h2>
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

        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success_message) ?>
            </div>

            <?php if (isset($_SESSION['reset_demo_link'])): ?>
                <div class="demo-link">
                    <h5>Demo Reset Link (For development only):</h5>
                    <p>This would normally be sent to: <?= htmlspecialchars($_SESSION['reset_demo_email']) ?></p>
                    <a href="<?= htmlspecialchars($_SESSION['reset_demo_link']) ?>" target="_blank">
                        <?= htmlspecialchars($_SESSION['reset_demo_link']) ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (empty($success_message)): ?>
            <form action="forgot_password.php" method="POST" class="bg-white">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                <div class="mb-4">
                    <p class="text-center">Enter your email address below and we'll send you instructions to reset your password.</p>
                </div>

                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-append">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success w-100 mt-3">Reset Password</button>

                <div class="text-center mt-4">
                    <a href="login_form.php"><i class="fas fa-arrow-left me-1"></i> Back to Login</a>
                </div>
            </form>
        <?php else: ?>
            <div class="text-center mt-4">
                <a href="login_form.php" class="btn btn-success"><i class="fas fa-arrow-left me-1"></i> Back to Login</a>
            </div>
        <?php endif; ?>

        <div class="form-footer">
            <p>&copy; 2025 Solar Energy. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>