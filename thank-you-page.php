<?php
// Get the type parameter to customize the thank you message
$type = isset($_GET['type']) ? $_GET['type'] : 'default';

// Set appropriate thank you message based on the type
$title = "Thank You";
$message = "Your request has been processed successfully.";

if ($type === 'message') {
  $title = "Thank You for Your Message";
  $message = "We have received your message and will get back to you shortly.";
} elseif ($type === 'registration') {
  $title = "Thank You for Registering";
  $message = "Your account has been created successfully. You can now log in.";
} elseif ($type === 'order') {
  $title = "Thank You for Your Order";
  $message = "Your order has been placed successfully. We'll process it as soon as possible.";
}
?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="<?php echo $title; ?>">
  <meta name="description" content="">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Thank-You-Page-Template.css" media="screen">
  <!-- <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script> -->
  <!-- <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
  <!-- <meta name="generator" content="Nicepage 7.7.3, nicepage.com"> -->



  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "solar enegy",
      "logo": "images/default-logo.png"
    }
  </script>
  <meta name="theme-color" content="#c4b35d">
  <meta property="og:title" content="Thank You">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en">
  
  <section class="u-align-center u-clearfix u-container-align-center u-section-1" id="block-1">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h2 class="u-align-center u-text u-text-default u-text-1"><?php echo $title; ?></h2>
      <p class="u-align-center u-text u-text-default u-text-2"><?php echo $message; ?></p>
      <div class="u-align-center u-margin-top-medium">
        <a href="index.php" class="u-button-style u-btn u-btn-round u-radius-10 u-btn-1">Return to Home</a>
      </div>
    </div>
  </section>



  <footer class="u-align-center u-clearfix u-container-align-center u-footer u-grey-80 u-footer" id="sec-ee3d">
    <div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-small-text u-text u-text-variant u-text-1">© <?php echo date('Y'); ?> Solar Energy. All rights reserved.</p>
    </div>
  </footer>
</body>

</html>