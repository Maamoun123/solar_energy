<?php
// register_form.php
session_start();
include_once "includes/functions.php";

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$old = $_SESSION['old'] ?? [];
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['old'], $_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SolarEnergy Lebanon</title>
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
            max-width: 700px;
            margin-top: 40px;
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
            padding-left: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.2);
        }

        .input-group-append {
            position: absolute;
            right: 15px;
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

        .register-steps {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-weight: 600;
            margin: 0 15px;
            position: relative;
        }

        .step.active {
            background-color: #198754;
            color: white;
        }

        .step:not(:last-child):after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background-color: #e5e7eb;
            right: -40px;
            top: 50%;
            transform: translateY(-50%);
        }

        .step.active:not(:last-child):after {
            background-color: #198754;
        }

        .password-strength {
            height: 5px;
            margin-top: 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .password-strength.weak {
            background-color: #ef4444;
            width: 30%;
        }

        .password-strength.medium {
            background-color: #f59e0b;
            width: 70%;
        }

        .password-strength.strong {
            background-color: #10b981;
            width: 100%;
        }

        /* Make the form responsive */
        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
                padding-left: 20px;
                padding-right: 20px;
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

            .register-steps {
                margin-bottom: 20px;
            }

            .step {
                width: 35px;
                height: 35px;
                margin: 0 10px;
            }

            .step:not(:last-child):after {
                width: 20px;
                right: -20px;
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
        <img src="images/solar-energy-panel-light-bulb-gr.jpg" class="background-placeholder" alt="Solar Background">
        <video autoplay loop muted playsinline class="background-video" preload="auto">
            <source src="assets/videos/solar-background.mp4" type="video/mp4">
        </video>
    </div>

    <div class="container py-5">
        <div class="brand-container" data-aos="fade-down">
            <h2>SolarEnergy Lebanon</h2>
            <h2>Create Your Account</h2>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger" data-aos="fade-in">
                <ul class="mb-0">
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="bg-white shadow-lg rounded-4" data-aos="fade-up">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

            <div class="register-steps">
                <div class="step active" data-step="1">1</div>
                <div class="step" data-step="2">2</div>
                <div class="step" data-step="3">3</div>
            </div>

            <!-- Step 1: Basic Information -->
            <div class="step-content" id="step-1">
                <h4 class="mb-4 text-center">Personal Information</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="f_name">First Name</label>
                        <div class="input-group">
                            <input type="text" id="f_name" name="f_name" class="form-control" value="<?= htmlspecialchars($old['f_name'] ?? '') ?>" required>
                            <div class="input-group-append">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="l_name">Last Name</label>
                        <div class="input-group">
                            <input type="text" id="l_name" name="l_name" class="form-control" value="<?= htmlspecialchars($old['l_name'] ?? '') ?>" required>
                            <div class="input-group-append">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
                        <div class="input-group-append">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number (optional)</label>
                    <div class="input-group">
                        <input type="tel" id="phone" name="phone" class="form-control" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                        <div class="input-group-append">
                            <i class="fas fa-phone"></i>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-success next-step" data-next="2">Continue <i class="fas fa-arrow-right ml-2"></i></button>
                </div>
            </div>

            <!-- Step 2: Account Information -->
            <div class="step-content d-none" id="step-2">
                <h4 class="mb-4 text-center">Account Information</h4>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" id="username" name="username" class="form-control" value="<?= htmlspecialchars($old['username'] ?? '') ?>" required>
                        <div class="input-group-append">
                            <i class="fas fa-at"></i>
                        </div>
                    </div>
                    <small class="text-muted">Your username will be used to log in to your account.</small>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" required>
                            <div class="input-group-append password-toggle">
                                <i class="fas fa-eye-slash"></i>
                            </div>
                        </div>
                        <div class="password-strength"></div>
                        <small class="text-muted mt-1 d-block">Use at least 8 characters including letters, numbers, and symbols</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            <div class="input-group-append password-toggle">
                                <i class="fas fa-eye-slash"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary prev-step" data-prev="1"><i class="fas fa-arrow-left mr-2"></i> Back</button>
                    <button type="button" class="btn btn-success next-step" data-next="3">Continue <i class="fas fa-arrow-right ml-2"></i></button>
                </div>
            </div>

            <!-- Step 3: Address Information -->
            <div class="step-content d-none" id="step-3">
                <h4 class="mb-4 text-center">Address Information <span class="text-muted fs-6 fw-normal">(optional)</span></h4>

                <div class="mb-3">
                    <label for="address">Street Address</label>
                    <div class="input-group">
                        <input type="text" id="address" name="address" class="form-control" value="<?= htmlspecialchars($old['address'] ?? '') ?>">
                        <div class="input-group-append">
                            <i class="fas fa-home"></i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" value="<?= htmlspecialchars($old['city'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">Province</label>
                        <input type="text" id="state" name="state" class="form-control" value="<?= htmlspecialchars($old['state'] ?? '') ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-select form-control">
                            <option value="Lebanon" selected>Lebanon</option>
                            <option value="Syria">Syria</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 form-check mt-4">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary prev-step" data-prev="2"><i class="fas fa-arrow-left mr-2"></i> Back</button>
                    <button type="submit" class="btn btn-success">Create Account</button>
                </div>
            </div>
        </form>

        <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="200">
            <a href="login_form.php" class="btn btn-outline-light">
                <i class="fas fa-arrow-left me-2"></i>Already have an account? Sign In
            </a>
        </div>

        <div class="form-footer" data-aos="fade-up" data-aos-delay="300">
            <p>&copy; 2025 SolarEnergy Lebanon. All rights reserved.</p>
            <a href="index.php" class="btn btn-outline-light mt-2">
                <i class="fas fa-home me-2"></i>Back to Homepage
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

            // Simple password strength indicator
            const passwordInput = document.getElementById('password');
            const strengthIndicator = document.querySelector('.password-strength');
            const confirmPassword = document.getElementById('confirm_password');

            passwordInput.addEventListener('input', function() {
                const value = this.value;

                // Check password match
                if (confirmPassword.value && confirmPassword.value !== this.value) {
                    confirmPassword.setCustomValidity("Passwords don't match");
                } else {
                    confirmPassword.setCustomValidity('');
                }

                if (value.length === 0) {
                    strengthIndicator.className = 'password-strength';
                } else if (value.length < 6) {
                    strengthIndicator.className = 'password-strength weak';
                } else if (value.length < 10 || !/[0-9]/.test(value) || !/[a-zA-Z]/.test(value)) {
                    strengthIndicator.className = 'password-strength medium';
                } else {
                    strengthIndicator.className = 'password-strength strong';
                }
            });

            confirmPassword.addEventListener('input', function() {
                if (this.value !== passwordInput.value) {
                    this.setCustomValidity("Passwords don't match");
                } else {
                    this.setCustomValidity('');
                }
            });

            // Multi-step form navigation
            const steps = document.querySelectorAll('.step');
            const nextButtons = document.querySelectorAll('.next-step');
            const prevButtons = document.querySelectorAll('.prev-step');
            const stepContents = document.querySelectorAll('.step-content');

            // Next step button click handler
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nextStepNum = parseInt(this.getAttribute('data-next'));
                    const currentStepNum = nextStepNum - 1;

                    // Validate current step inputs
                    const currentStep = document.getElementById(`step-${currentStepNum}`);
                    const requiredFields = currentStep.querySelectorAll('[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value) {
                            isValid = false;
                            field.classList.add('is-invalid');
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    if (!isValid) {
                        return;
                    }

                    // Move to next step
                    steps.forEach(step => {
                        const stepNum = parseInt(step.getAttribute('data-step'));
                        if (stepNum === nextStepNum) {
                            step.classList.add('active');
                        } else if (stepNum < nextStepNum) {
                            step.classList.add('active');
                        }
                    });

                    stepContents.forEach(content => {
                        content.classList.add('d-none');
                    });

                    document.getElementById(`step-${nextStepNum}`).classList.remove('d-none');
                });
            });

            // Previous step button click handler
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const prevStepNum = parseInt(this.getAttribute('data-prev'));
                    const currentStepNum = prevStepNum + 1;

                    // Update step indicators
                    steps.forEach(step => {
                        const stepNum = parseInt(step.getAttribute('data-step'));
                        if (stepNum === currentStepNum) {
                            step.classList.remove('active');
                        }
                    });

                    // Show previous step content
                    stepContents.forEach(content => {
                        content.classList.add('d-none');
                    });

                    document.getElementById(`step-${prevStepNum}`).classList.remove('d-none');
                });
            });
        });
    </script>
</body>

</html>