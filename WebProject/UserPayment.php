<?php

session_start();

global $con;
@include 'config.php';

if(!isset($_SESSION['logged_in'])){
    header('location: SignIn.php');
    exit;
}

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}else{
    $userId = '';
    header('location: SignIn.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <!-- icons  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- custom css  -->
    <link rel="stylesheet" href="cssFiles/style.css">
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
<!--start of log-sign section-->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="container" style="display: flex; justify-content: center; padding: 50px">
            <div>
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h1 style="margin-top: 100px;" class="h1-title revealUp">Payment</h1>
                    </div>
                </div>
                <div class="tt" >
                    <div class="revealUp" style="margin-bottom: 15px;">
                        <p class="tt mt-4 text-center">We provide only Cash on Delivery (COD), Please make sure<br> cash is available on hand!</p>
                    </div>
                    <hr class="mt-4" style="color: #ec5b59">
                    <div>
                        <p style="color: #ec5b59" class="tt mt-1 text-center">Your personal data will be used to process your order, support your experience<br> throughout this website, and for other purposes described in our<a href="privacyPolicy.php"> privacy policy</a>.</p>
                    </div>
                    <div>
                        <br>
                        <p style="color: #ec5b59" class="h2-title1 mt-1 text-center">Total payment: <?php echo $_SESSION['total'] ?><span> &#8362;</span></p>
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
<!-- gsap  -->
<script src="assets/js/gsap.min.js"></script>
<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll to plugin  -->
<script src="assets/js/ScrollToPlugin.min.js"></script>
<!-- smooth scroll  -->
<script src="assets/js/smooth-scroll.js"></script>
<script src="jsFiles/main.js"></script>
</body>
</html>



