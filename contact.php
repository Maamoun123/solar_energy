<?php
session_start();
include_once 'includes/db.php';

// Initialize variables for form handling
$message_sent = false;
$error = '';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contactSubmit'])) {
    // Basic form validation
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $inquiry_type = isset($_POST['inquiry_type']) ? trim($_POST['inquiry_type']) : '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        // In a real implementation, you would:
        // 1. Save to database
        // 2. Send notification email
        // 3. Set up auto-responder

        // For now, we'll simulate a successful submission
        $message_sent = true;
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Contact SolarEnergy Lebanon, Solar Energy Lebanon Contact, Solar Installation Lebanon">
    <meta name="description" content="Get in touch with SolarEnergy Lebanon for solar panel installation, maintenance, or consultation. Our team of experts is ready to help with your solar energy needs.">
    <title>Contact Us - SolarEnergy Lebanon</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="index.css" media="screen">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <!-- <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Intl Tel Input for phone validation -->
    <link rel="stylesheet" href="intlTelInput/intlTelInput.css">
    <style>
        .contact-header {
            background-color: #f8f9fa;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .contact-info-card {
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .contact-icon {
            font-size: 2rem;
            color: #198754;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }

        .map-container {
            height: 400px;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
        }

        .iti {
            width: 100%;
        }

        .contact-form-container {
            position: relative;
            z-index: 1;
        }

        .contact-form-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-success-message {
            background-color: #e8f5e9;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
        }

        .contact-success-icon {
            font-size: 4rem;
            color: #198754;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="u-body u-xl-mode" data-lang="en">

    <?php include_once 'header.php'; ?>


    <!-- Contact Header Section -->
    <section class="contact-header bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="fw-bold mb-3">Get in <span class="text-success">Touch</span></h1>
                    <p class="lead mb-4">Have questions about solar energy? Ready to start your solar journey? Contact our expert team today for personalized assistance.</p>
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">Customer Support Hotline</p>
                            <p class="mb-0 h5">+961 1 234 567</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="images/business-person-planning-alterna.jpg" alt="Contact SolarEnergy Lebanon" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Information Cards -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-map-marker-alt contact-icon"></i>
                            </div>
                            <h3 class="h5 card-title">Visit Our Office</h3>
                            <p class="card-text">123 Solar Street, Beirut<br>Lebanon</p>
                            <a href="https://goo.gl/maps/yourGoogleMapsLink" target="_blank" class="btn btn-outline-success mt-2">Get Directions</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-phone-alt contact-icon"></i>
                            </div>
                            <h3 class="h5 card-title">Call Us</h3>
                            <p class="card-text">Sales: +961 1 234 567<br>Support: +961 1 234 568</p>
                            <a href="tel:+9611234567" class="btn btn-outline-success mt-2">Call Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card contact-info-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-envelope contact-icon"></i>
                            </div>
                            <h3 class="h5 card-title">Email Us</h3>
                            <p class="card-text">info@solarenergy-lb.com<br>support@solarenergy-lb.com</p>
                            <a href="mailto:info@solarenergy-lb.com" class="btn btn-outline-success mt-2">Send Email</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Left Side - Form -->
                <div class="col-lg-7 mb-4 mb-lg-0 contact-form-container">
                    <?php if ($message_sent): ?>
                        <!-- Success Message -->
                        <div class="contact-success-message">
                            <i class="fas fa-check-circle contact-success-icon"></i>
                            <h2 class="h4 mb-3">Thank You for Contacting Us!</h2>
                            <p>Your message has been successfully sent. Our team will review your inquiry and get back to you as soon as possible, typically within 24 hours.</p>
                            <a href="index.php" class="btn btn-success mt-3">Return to Homepage</a>
                        </div>
                    <?php else: ?>
                        <!-- Contact Form -->
                        <div class="card border-0 contact-form-card">
                            <div class="card-body p-4 p-md-5">
                                <h2 class="card-title mb-4">Send Us a Message</h2>

                                <?php if (!empty($error)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="contactForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Full Name *</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your phone number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inquiry_type" class="form-label">Inquiry Type *</label>
                                            <select class="form-select" id="inquiry_type" name="inquiry_type" required>
                                                <option value="" selected disabled>Select an option</option>
                                                <option value="residential">Residential Solar Installation</option>
                                                <option value="commercial">Commercial Solar Project</option>
                                                <option value="maintenance">Maintenance & Repair</option>
                                                <option value="consultation">Free Consultation</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject *</label>
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Message subject" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message *</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="How can we help you?" required></textarea>
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="privacy_consent" name="privacy_consent" required>
                                        <label class="form-check-label" for="privacy_consent">
                                            I agree to the <a href="privacy.php" class="text-success">Privacy Policy</a> and consent to being contacted regarding my inquiry.
                                        </label>
                                    </div>

                                    <div class="text-center text-md-start">
                                        <button type="submit" name="contactSubmit" class="btn btn-success btn-lg px-5">
                                            <i class="fas fa-paper-plane me-2"></i> Send Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right Side - Map and Working Hours -->
                <div class="col-lg-5">
                    <!-- Map -->
                    <div class="map-container mb-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d106456.96538175908!2d35.44004752143069!3d33.88892847623399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17215880a78f%3A0x729182bae99836b4!2sBeirut%2C%20Lebanon!5e0!3m2!1sen!2sus!4v1651234567890!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Working Hours -->
                    <div class="card contact-info-card">
                        <div class="card-body p-4">
                            <h3 class="h5 card-title mb-3"><i class="fas fa-clock text-success me-2"></i> Working Hours</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-calendar-day me-2 text-success"></i> Monday - Friday</span>
                                    <span class="badge bg-success rounded-pill">8:00 AM - 6:00 PM</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-calendar-day me-2 text-success"></i> Saturday</span>
                                    <span class="badge bg-success rounded-pill">9:00 AM - 1:00 PM</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-calendar-day me-2 text-success"></i> Sunday</span>
                                    <span class="badge bg-secondary rounded-pill">Closed</span>
                                </li>
                            </ul>
                            <p class="mt-3 mb-0 text-muted fst-italic">
                                <small><i class="fas fa-info-circle me-1"></i> For emergencies outside working hours, please call our 24/7 support line at +961 1 234 569</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Frequently Asked Questions</h2>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="contactFaq">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How quickly will I receive a response to my inquiry?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    We aim to respond to all inquiries within 24 hours during business days. For urgent matters, we recommend calling our customer support hotline at +961 1 234 567 for immediate assistance.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Do you offer free consultations for solar installations?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    Yes, we provide free consultations for both residential and commercial solar installation projects. Our experts will assess your energy needs, property specifics, and provide a detailed quote with estimated costs and savings.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can I visit your showroom to see solar products in person?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    Absolutely! We welcome you to visit our showroom in Beirut where you can see our solar panels, inverters, batteries, and other products in person. Our team will be happy to demonstrate how they work and answer any questions you might have.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faqFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Do you service areas outside Beirut?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#contactFaq">
                                <div class="accordion-body">
                                    Yes, we provide solar installation and maintenance services across all regions of Lebanon, including Tripoli, Sidon, Tyre, Mount Lebanon, Bekaa Valley, and other areas. Contact us with your location details for more information.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-success text-white">
        <div class="container text-center">
            <h2 class="mb-4">Join thousands of satisfied customers across Lebanon</h2>
            <p class="lead mb-4">Start your journey towards energy independence and sustainability today</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="calculator.php" class="btn btn-light btn-lg px-4">
                    <i class="fas fa-calculator me-2"></i> Calculate Savings
                </a>
                <a href="tel:+9611234567" class="btn btn-outline-light btn-lg px-4">
                    <i class="fas fa-phone-alt me-2"></i> Call Us Now
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once 'footer.php'; ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="intlTelInput/intlTelInput.min.js"></script>
    <script src="intlTelInput/utils.js"></script>

    <script>
        // International Telephone Input
        document.addEventListener('DOMContentLoaded', function() {
            var phoneInput = document.getElementById('phone');
            if (phoneInput) {
                var iti = window.intlTelInput(phoneInput, {
                    utilsScript: "intlTelInput/utils.js",
                    initialCountry: "lb",
                    preferredCountries: ["lb", "us", "gb"],
                    autoPlaceholder: "aggressive"
                });

                // Store the selected country code and phone number when submitting the form
                var contactForm = document.getElementById('contactForm');
                if (contactForm) {
                    contactForm.addEventListener('submit', function(e) {
                        var fullNumber = iti.getNumber();
                        document.getElementById('phone').value = fullNumber;
                    });
                }
            }
        });
    </script>
</body>

</html>