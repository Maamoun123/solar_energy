<?php
// Include database connection
require_once 'includes/db.php';

// Fetch team members from database if needed
try {
  $stmt = $pdo->prepare("SELECT * FROM team ORDER BY id ASC");
  $stmt->execute();
  $team_members = $stmt->fetchAll();
} catch (PDOException $e) {
  // If the team table doesn't exist yet, just continue without data
  $team_members = [];
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="​We Are Happy To ​ Guide You, ​Our People, Contact Us">
  <meta name="description" content="">
  <title>Team</title>
  <link rel="stylesheet" href="nicepage.css" media="screen">
  <link rel="stylesheet" href="Team.css" media="screen">
  <!-- <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script> -->
  <!-- <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
  <!-- <meta name="generator" content="Nicepage 7.7.3, nicepage.com"> -->
  <meta name="referrer" content="origin">
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "solar enegy",
      "logo": "images/default-logo.png"
    }
  </script>
  <meta name="theme-color" content="#c4b35d">
  <meta property="og:title" content="Team">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body data-path-to-root="./" data-include-products="true" class="u-body u-xl-mode" data-lang="en">
  <?php include_once 'header.php'; ?>
  <section class="u-clearfix u-grey-10 u-section-1" id="carousel_a8b9">
    <div class="u-expanded-width u-shape u-shape-rectangle u-white u-shape-1"></div>
    <div class="u-palette-1-base u-shape u-shape-rectangle u-shape-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750"></div>
    <img src="images/close-up-team-working-together_2.jpg" alt="" class="u-image u-image-default u-image-1" data-image-width="1380" data-image-height="920" data-animation-name="customAnimationIn" data-animation-duration="1500">
    <div class="u-align-left u-container-align-left u-container-style u-group u-white u-group-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500">
      <div class="u-container-layout u-valign-middle u-container-layout-1">
        <h1 class="u-align-left u-text u-text-1"> We Are Happy To ​ Guide You</h1>
        <p class="u-align-left u-text u-text-black u-text-2"> We specialize in a wide variety of solar installation and our experts are ready to install your solar system. </p>
        <p class="u-align-left u-text u-text-black u-text-3">Images from <a href="https://www.freepik.com/photos/people" class="u-active-none u-border-1 u-border-black u-border-no-left u-border-no-right u-border-no-top u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-btn-1">Freepik</a>
        </p>
        <a href="#" class="u-active-palette-1-dark-1 u-align-left u-border-active-black u-border-hover-black u-border-none u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-50 u-text-active-white u-text-hover-white u-btn-2">Learn more</a>
      </div>
    </div>
  </section>
  <section class="u-align-center u-clearfix u-container-align-center u-grey-10 u-section-2" id="carousel_bb81">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <h2 class="u-align-center u-text u-text-default u-text-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500"> Our People<br>
      </h2>
      <p class="u-align-center u-text u-text-body-color u-text-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500"> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <div class="u-expanded-width u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-1" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-1">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-1" data-image-width="309" data-image-height="309"></div>
              <h5 class="u-align-center u-text u-text-3">Nat Reynolds</h5>
              <h6 class="u-align-center u-text u-text-default u-text-4"> Senior Partner</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-1">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-be56"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-be56">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-6236"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-6236">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-3fe4"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-3fe4">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-2" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-2">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-2" data-image-width="309" data-image-height="309"></div>
              <h5 class="u-align-center u-text u-text-5"> Betty Nilson</h5>
              <h6 class="u-align-center u-text u-text-default u-text-6"> Senior Partner</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-2">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-497e"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-497e">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-aefe"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-aefe">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-6"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-c0fe"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-c0fe">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-3" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-3">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-3" data-image-width="626" data-image-height="417"></div>
              <h5 class="u-align-center u-text u-text-7">Mattie Smith</h5>
              <h6 class="u-align-center u-text u-text-default u-text-8"> Financial Director</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-3">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-7"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-d156"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-d156">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-8"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-319f"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-319f">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-9"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-8435"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-8435">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-4" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-4">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-4" data-image-width="206" data-image-height="206"></div>
              <h5 class="u-align-center u-text u-text-9"> Betty Nilson</h5>
              <h6 class="u-align-center u-text u-text-default u-text-10"> Chief Accountant</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-4">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-10"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-5848"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-5848">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-11"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-d02e"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-d02e">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-12"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-19b8"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-19b8">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-5" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-5">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-5" data-image-width="206" data-image-height="206"></div>
              <h5 class="u-align-center u-text u-text-11">Bob Roberts</h5>
              <h6 class="u-align-center u-text u-text-default u-text-12">Sales Manager</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-5">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-13"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-1eb3"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-1eb3">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-14"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-c903"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-c903">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-15"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-8963"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-8963">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-6" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="500" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-6">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-6" data-image-width="309" data-image-height="309"></div>
              <h5 class="u-align-center u-text u-text-13">Mattie Smith</h5>
              <h6 class="u-align-center u-text u-text-default u-text-14"> Engineer</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-6">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-16"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-069e"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-069e">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-17"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-aad4"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-aad4">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-18"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-5c42"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-5c42">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-7" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-7">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-7" data-image-width="309" data-image-height="309"></div>
              <h5 class="u-align-center u-text u-text-15"> Roxie Swanson</h5>
              <h6 class="u-align-center u-text u-text-default u-text-16"> Engineer</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-7">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-19"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-ce78"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-ce78">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-20"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-e0a7"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-e0a7">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-21"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-4c04"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-4c04">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
          <div class="u-align-center u-container-align-center u-container-style u-list-item u-repeater-item u-shape-rectangle u-white u-list-item-8" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="750" data-animation-direction="">
            <div class="u-container-layout u-similar-container u-container-layout-8">
              <div alt="" class="u-border-9 u-border-palette-1-base u-image u-image-circle u-image-8" data-image-width="309" data-image-height="309"></div>
              <h5 class="u-align-center u-text u-text-17"> Adrian Scold</h5>
              <h6 class="u-align-center u-text u-text-default u-text-18">Consultant</h6>
              <div class="u-social-icons u-spacing-10 u-social-icons-8">
                <a class="u-social-url" title="facebook" target="_blank" href="https://facebook.com/name"><span class="u-icon u-social-facebook u-social-icon u-text-grey-50 u-icon-22"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-57cc"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-57cc">
                      <path fill="currentColor" d="M75.5,28.8H65.4c-1.5,0-4,0.9-4,4.3v9.4h13.9l-1.5,15.8H61.4v45.1H42.8V58.3h-8.8V42.4h8.8V32.2
c0-7.4,3.4-18.8,18.8-18.8h13.8v15.4H75.5z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="twitter" target="_blank" href="https://twitter.com/name"><span class="u-icon u-social-icon u-social-twitter u-text-grey-50 u-icon-23"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-b37c"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-b37c">
                      <path fill="currentColor" d="M92.2,38.2c0,0.8,0,1.6,0,2.3c0,24.3-18.6,52.4-52.6,52.4c-10.6,0.1-20.2-2.9-28.5-8.2
	c1.4,0.2,2.9,0.2,4.4,0.2c8.7,0,16.7-2.9,23-7.9c-8.1-0.2-14.9-5.5-17.3-12.8c1.1,0.2,2.4,0.2,3.4,0.2c1.6,0,3.3-0.2,4.8-0.7
	c-8.4-1.6-14.9-9.2-14.9-18c0-0.2,0-0.2,0-0.2c2.5,1.4,5.4,2.2,8.4,2.3c-5-3.3-8.3-8.9-8.3-15.4c0-3.4,1-6.5,2.5-9.2
	c9.1,11.1,22.7,18.5,38,19.2c-0.2-1.4-0.4-2.8-0.4-4.3c0.1-10,8.3-18.2,18.5-18.2c5.4,0,10.1,2.2,13.5,5.7c4.3-0.8,8.1-2.3,11.7-4.5
	c-1.4,4.3-4.3,7.9-8.1,10.1c3.7-0.4,7.3-1.4,10.6-2.9C98.9,32.3,95.7,35.5,92.2,38.2z"></path>
                    </svg></span>
                </a>
                <a class="u-social-url" title="instagram" target="_blank" href="https://instagram.com/name"><span class="u-icon u-social-icon u-social-instagram u-text-grey-50 u-icon-24"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style="">
                      <use xlink:href="#svg-509b"></use>
                    </svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-509b">
                      <path fill="currentColor" d="M55.9,32.9c-12.8,0-23.2,10.4-23.2,23.2s10.4,23.2,23.2,23.2s23.2-10.4,23.2-23.2S68.7,32.9,55.9,32.9z
	 M55.9,69.4c-7.4,0-13.3-6-13.3-13.3c-0.1-7.4,6-13.3,13.3-13.3s13.3,6,13.3,13.3C69.3,63.5,63.3,69.4,55.9,69.4z"></path>
                      <path fill="#FFFFFF" d="M79.7,26.8c-3,0-5.4,2.5-5.4,5.4s2.5,5.4,5.4,5.4c3,0,5.4-2.5,5.4-5.4S82.7,26.8,79.7,26.8z"></path>
                      <path fill="currentColor" d="M78.2,11H33.5C21,11,10.8,21.3,10.8,33.7v44.7c0,12.6,10.2,22.8,22.7,22.8h44.7c12.6,0,22.7-10.2,22.7-22.7
	V33.7C100.8,21.1,90.6,11,78.2,11z M91,78.4c0,7.1-5.8,12.8-12.8,12.8H33.5c-7.1,0-12.8-5.8-12.8-12.8V33.7
	c0-7.1,5.8-12.8,12.8-12.8h44.7c7.1,0,12.8,5.8,12.8,12.8V78.4z"></path>
                    </svg></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="u-align-center u-text u-text-default u-text-19" data-animation-name="customAnimationIn" data-animation-duration="1500" data-animation-delay="1000">Images from <a href="https://freepik.com/photos/people" class="u-active-none u-border-2 u-border-active-black u-border-hover-black u-border-no-left u-border-no-right u-border-no-top u-border-palette-1-base u-btn u-button-link u-button-style u-hover-none u-none u-text-active-palette-1-base u-text-body-color u-text-hover-palette-1-base u-btn-1" target="_blank">Freepik</a>
      </p>
    </div>
    <style data-mode="XXL" data-visited="true">
      @media (max-width: 0px) {
        .u-section-2 {
          background-image: none;
        }

        .u-section-2 .u-sheet-1 {
          min-height: 1077px;
        }

        .u-section-2 .u-text-1 {
          margin-top: 60px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-2 {
          font-size: 1.25rem;
          width: 711px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-section-2 .u-list-1 {
          margin-top: 50px;
          margin-bottom: 0;
        }

        .u-section-2 .u-repeater-1 {
          grid-template-columns: repeat(4, calc(25% - 16.5px));
          min-height: 664px;
          grid-gap: 22px;
        }

        .u-section-2 .u-list-item-1 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-1 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-1 {
          width: 133px;
          height: 133px;
          background-image: url("images/ec6da3db-d4a7-cbc8-c959-57cb2f78738d.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-3 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-4 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-125 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-126 {
          background-image: none;
        }

        .u-block-e685-127 {
          background-image: none;
        }

        .u-block-e685-128 {
          background-image: none;
        }

        .u-section-2 .u-list-item-2 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-2 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-2 {
          width: 133px;
          height: 133px;
          background-image: url("images/tyty.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-5 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-6 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-129 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-130 {
          background-image: none;
        }

        .u-block-e685-131 {
          background-image: none;
        }

        .u-block-e685-132 {
          background-image: none;
        }

        .u-section-2 .u-list-item-3 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-3 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-3 {
          width: 133px;
          height: 133px;
          background-image: url("images/gggg.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-7 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-8 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-133 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-134 {
          background-image: none;
        }

        .u-block-e685-135 {
          background-image: none;
        }

        .u-block-e685-136 {
          background-image: none;
        }

        .u-section-2 .u-list-item-4 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-4 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-4 {
          width: 133px;
          height: 133px;
          background-image: url("images/ds.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-9 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-10 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-137 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-138 {
          background-image: none;
        }

        .u-block-e685-139 {
          background-image: none;
        }

        .u-block-e685-140 {
          background-image: none;
        }

        .u-section-2 .u-list-item-5 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-5 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-5 {
          width: 133px;
          height: 133px;
          background-image: url("images/hgghgh.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-11 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-12 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-141 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-142 {
          background-image: none;
        }

        .u-block-e685-143 {
          background-image: none;
        }

        .u-block-e685-144 {
          background-image: none;
        }

        .u-section-2 .u-list-item-6 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-6 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-6 {
          width: 133px;
          height: 133px;
          background-image: url("images/bfc62dcf-11dc-f72c-9f80-d5d6784457fc.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-13 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-14 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-145 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-146 {
          background-image: none;
        }

        .u-block-e685-147 {
          background-image: none;
        }

        .u-block-e685-148 {
          background-image: none;
        }

        .u-section-2 .u-list-item-7 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-7 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-7 {
          width: 133px;
          height: 133px;
          background-image: url("images/trtrrt.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-15 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-16 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-149 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-150 {
          background-image: none;
        }

        .u-block-e685-151 {
          background-image: none;
        }

        .u-block-e685-152 {
          background-image: none;
        }

        .u-section-2 .u-list-item-8 {
          box-shadow: 5px 5px 19px 0 rgba(0, 0, 0, 0.15);
        }

        .u-section-2 .u-container-layout-8 {
          padding-top: 30px;
          padding-bottom: 30px;
          padding-left: 24px;
          padding-right: 24px;
        }

        .u-section-2 .u-image-8 {
          width: 133px;
          height: 133px;
          background-image: url("images/tytyt54.jpg");
          background-position: 50% 50%;
          text-shadow: 0px 0px 0 rgba(0, 0, 0, 0);
          margin-top: 0;
          margin-bottom: 0;
          margin-left: auto;
          margin-right: auto;
        }

        .u-section-2 .u-text-17 {
          text-transform: none;
          letter-spacing: normal;
          font-weight: 700;
          font-size: 1.5rem;
          margin-top: 20px;
          margin-left: 2px;
          margin-right: 2px;
          margin-bottom: 0;
        }

        .u-section-2 .u-text-18 {
          font-weight: 500;
          margin-top: 14px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
          font-size: 1rem;
        }

        .u-block-e685-153 {
          height: 26px;
          min-height: 16px;
          width: 104px;
          min-width: 74px;
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 0;
        }

        .u-block-e685-154 {
          background-image: none;
        }

        .u-block-e685-155 {
          background-image: none;
        }

        .u-block-e685-156 {
          background-image: none;
        }

        .u-section-2 .u-text-19 {
          margin-top: 30px;
          margin-left: auto;
          margin-right: auto;
          margin-bottom: 60px;
        }

        .u-section-2 .u-btn-1 {
          padding-top: 0;
          padding-bottom: 0;
          padding-left: 0;
          padding-right: 0;
        }
      }
    </style>
  </section>
  <section class="u-clearfix u-white u-section-3" id="carousel_8d97">
    <div class="u-clearfix u-sheet u-sheet-1">
      <div class="u-clearfix u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-container-style u-image u-layout-cell u-left-cell u-size-30-lg u-size-30-xl u-size-60-md u-size-60-sm u-size-60-xs u-image-1" data-image-width="717" data-image-height="910">
              <div class="u-container-layout u-valign-bottom u-container-layout-1"></div>
            </div>
            <div class="u-container-style u-layout-cell u-right-cell u-size-30-lg u-size-30-xl u-size-60-md u-size-60-sm u-size-60-xs u-white u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h2 class="u-align-center u-text u-text-default u-text-1" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction="">Contact Us</h2>
                <div class="u-expanded-width u-form u-form-1">
                  <form action="sendmessage.php" method="get" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 0;" source="email" name="form">
                    <div class="u-form-group u-form-name">
                      <label for="name-daf4" class="u-label">first Name</label>
                      <input type="text" placeholder="Enter your Name" id="name-daf4" name="name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-name">
                      <label for="name-daf4" class="u-label">Last Name</label>
                      <input type="text" placeholder="Enter your Last Name" id="name-daf4" name="lname" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-email u-form-group">
                      <label for="email-daf4" class="u-label">Email</label>
                      <input type="email" placeholder="Enter a valid email address" id="email-daf4" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required="">
                    </div>
                    <div class="u-form-group u-form-message">
                      <label for="message-daf4" class="u-label">Message</label>
                      <textarea placeholder="" rows="4" cols="50" id="message-daf4" name="message" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle" required=""></textarea>
                    </div>
                    <div class="u-form-agree u-form-group u-form-group-4">
                      <label class="u-block-d6bd-42 u-field-label" style=""></label>
                      <input type="checkbox" id="agree-f183" name="agree" class="u-agree-checkbox u-field-input" required="">
                      <label for="agree-f183" class="u-block-d6bd-38 u-field-label" style="">I accept the <a href="#">Terms of Service</a>
                      </label>
                    </div>
                    <div class="u-align-left u-form-group u-form-submit">
                      <button type="submit" class="u-active-grey-75 u-border-none u-btn u-btn-round u-button-style u-hover-grey-75 u-palette-3-base u-radius-50 u-btn-1">Submit</button>
                    </div>
                    <div class="u-form-send-message u-form-send-success">Thank you! Your message has been sent.</div>
                    <div class="u-form-send-error u-form-send-message">Unable to send your message. Please fix errors then try again.</div>
                    <input type="hidden" name="formServices" value="">
                  </form>
                </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include_once 'footer.php'; ?>
</body>

</html>