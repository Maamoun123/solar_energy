<?php
session_start();
include_once "includes/functions.php";


if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check for success messages
$register_success = $_SESSION['register_success'] ?? false;
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['register_success'], $_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SolarEnergy Lebanon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add AOS library for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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

        .login-tabs {
            display: flex;
            justify-content: center;
            border-radius: 10px 10px 0 0;
            overflow: hidden;
            margin-bottom: 0;
        }

        .tab {
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.8);
            border: none;
            font-weight: 600;
            font-size: 16px;
            color: #4b5563;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 50%;
            text-align: center;
        }

        .tab.active {
            background: #198754;
            color: white;
        }

        form.bg-white {
            background-color: white !important;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 35px !important;
            margin-top: 0;
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
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.2);
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
            background-color: #198754 !important;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 17px;
            padding: 13px 24px;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #146c43 !important;
        }

        a {
            color: #198754;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            color: #146c43;
            text-decoration: underline;
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
            color: white;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* Navbar spacing for login page */
        .navbar-spacer {
            height: 80px;
        }

        /* Make the form responsive */
        @media (max-width: 576px) {
            .container {
                margin-top: 20px;
                padding-left: 20px;
                padding-right: 20px;
            }

            .tab {
                padding: 12px 15px;
                font-size: 14px;
            }

            form.bg-white {
                padding: 25px !important;
            }

            .form-control {
                height: 45px;
                font-size: 14px;
            }

            .btn-success {
                font-size: 16px;
                padding: 10px 20px;
            }
        }

        .home-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .home-button:hover {
            background-color: white;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- Home button -->
    <a href="index.php" class="home-button" data-aos="fade-in">
        <i class="fas fa-home fa-lg text-success"></i>
    </a>

    <div class="background-container">
        <img src="images/photovoltaics-solar-power-statio.jpg" class="background-placeholder" alt="Solar Background">
        <video autoplay loop muted playsinline class="background-video" preload="auto">
            <source src="assets/videos/solar-background.mp4" type="video/mp4">
        </video>
    </div>

    <div class="container py-5">
        <div class="brand-container" data-aos="fade-down">
            <h2>SolarEnergy Lebanon</h2>
            <h2>Sign In</h2>
        </div>

        <?php if ($register_success): ?>
            <div class="alert alert-success" data-aos="fade-in">
                Registration successful! Please login with your new account.
            </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" data-aos="fade-in">
                <ul class="mb-0">
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="login-tabs" data-aos="fade-up" data-aos-delay="100">
            <button class="tab active" data-tab="user">User Login</button>
            <button class="tab" data-tab="admin">Admin Login</button>
        </div>

        <!-- User Login Form -->
        <form id="user-form" action="login.php" method="POST" class="bg-white" data-aos="fade-up" data-aos-delay="200">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input type="hidden" name="login_type" value="user">

            <div class="mb-3">
                <label for="username">Username or Email</label>
                <div class="input-group">
                    <span class="input-group-append">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" id="username" name="login_id" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-append">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <span class="password-toggle">
                        <i class="fas fa-eye-slash"></i>
                    </span>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div>
                <a href="forgot_password.php">Forgot password?</a>
            </div>

            <button class="btn btn-success w-100">Sign In</button>

            <div class="text-center mt-3">
                Don't have an account? <a href="register_form.php">Register here</a>
            </div>
        </form>

        <!-- Admin Login Form -->
        <form id="admin-form" action="login.php" method="POST" class="bg-white d-none" data-aos="fade-up" data-aos-delay="200">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
            <input type="hidden" name="login_type" value="admin">

            <div class="mb-3">
                <label for="admin-username">Admin Username</label>
                <div class="input-group">
                    <span class="input-group-append">
                        <i class="fas fa-user-shield"></i>
                    </span>
                    <input type="text" id="admin-username" name="login_id" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="admin-password">Password</label>
                <div class="input-group">
                    <span class="input-group-append">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="admin-password" name="password" class="form-control" required>
                    <span class="password-toggle">
                        <i class="fas fa-eye-slash"></i>
                    </span>
                </div>
            </div>

            <button class="btn btn-success w-100">Admin Sign In</button>
        </form>

        <div class="form-footer" data-aos="fade-up" data-aos-delay="300">
            <p>&copy; 2025 SolarEnergy Lebanon. All rights reserved.</p>
            <a href="index.php" class="btn btn-outline-light mt-2">
                <i class="fas fa-arrow-left me-2"></i>Back to Homepage
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize AOS animations
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

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

            // Tab switching
            document.querySelectorAll('.tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    // Update active tab
                    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Show appropriate form
                    const tabType = this.getAttribute('data-tab');
                    if (tabType === 'user') {
                        document.getElementById('user-form').classList.remove('d-none');
                        document.getElementById('admin-form').classList.add('d-none');
                    } else {
                        document.getElementById('user-form').classList.add('d-none');
                        document.getElementById('admin-form').classList.remove('d-none');
                    }
                });
            });
        });
    </script>
</body>

</html>