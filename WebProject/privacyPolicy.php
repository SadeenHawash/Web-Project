<?php
global $con;
include 'config.php';
session_start();

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}else{
    $userId = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- fonts  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
  <!-- icons  -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link href="/website/css/uicons-solid-rounded.css" rel="stylesheet">
  <!-- custom css  -->
  <link rel="stylesheet" href="cssFiles/style.css">
  <!-- for swiper slider  -->
  <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
  <!-- bootstrap  -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <title>Sugar Rush</title>
</head>
<body class="body-fixed">
<!-- preLoader -->
<?php
@include 'preloader.php'
?>
<div class="headerbox"></div>
<?php
@include 'header.php'
?>
<div id="viewport">
  <div id="js-scroll-content">
    <section class="container" style="display: flex; justify-content: center; padding: 80px">
      <div >
        <div class="col-lg-12">
          <div class="sec-title text-center mb-5">
            <h1 class="h1-title mt-5 revealUp">Privacy policy</h1>
          </div>
        </div>
        <div class="tt mt-5" >
          <div style="margin-bottom: 15px;">
            <strong>We will never distribute your information to anyone else.</strong>
          </div>
          <div>
          </div>
          <div >
            <p><strong></strong><span>When you make a purchase or attempt to make a purchase through our website,&nbsp;we collect certain information from you, including your name, billing address, shipping address,payment information, email address,and phone number. </span></p>
            <p><span>We use the order information to fulfill any orders placed through our website which includes providing you with the invoice and order confirmation, processing payment information and arranging for shipping. We may also use this information to communicate with you, protect ourselves from&nbsp;</span><span>potential risk or fraud; and keep you up to date!</span>&nbsp;</p>
            <div>We also reserve the right to use photographs of orders we prepare on our website, Instagram pages and&nbsp;Facebook pages. If you would like to specifically request that we do not use pictures of your order, or that we provide you with a picture of your order we will usually be happy to do so but you must let us know at the time of ordering. We also reserve the right to send you email and sms updates regarding your order and our products.<br>
            </div>
          </div>
        </div>
      </div>
    </section>
      <!-- footer -->
      <?php
      @include 'footer.php'
      ?>
  </div>
</div>
<!-- jquery  -->
<script src="assets/js/jquery-3.5.1.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!-- fontawesome  -->
<script src="assets/js/font-awesome.min.js"></script>

<!-- swiper slider  -->
<script src="assets/js/swiper-bundle.min.js"></script>

<!-- mixitup -- filter  -->
<script src="assets/js/jquery.mixitup.min.js"></script>

<!-- fancy box  -->
<script src="assets/js/jquery.fancybox.min.js"></script>

<!-- parallax  -->
<script src="assets/js/parallax.min.js"></script>

<!-- gsap  -->
<script src="assets/js/gsap.min.js"></script>

<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll to plugin  -->
<script src="assets/js/ScrollToPlugin.min.js"></script>
<!-- rellax  -->
<!-- <script src="assets/js/rellax.min.js"></script> -->
<!-- <script src="assets/js/rellax-custom.js"></script> -->
<!-- smooth scroll  -->
<script src="assets/js/smooth-scroll.js"></script>
<!--=============== MAIN JS ===============-->
<script src="jsFiles/main.js"></script>

</body>
</html>