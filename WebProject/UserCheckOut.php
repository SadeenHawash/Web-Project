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
        <section class=" mt-5 pt-4" >
            <div style=" display: flex; align-items: center; justify-content: center">
                <div>
                    <div class="form-slogan sign-up">
                        <form class="text-center" style="padding: 30px 30px 30px 40px;" action="UserPlaceOrder.php" method="post" id="checkout_form">
                            <h2 style="margin-bottom: 10px" class="h1-title text-center" >Check Out</h2>
                            <p class="error-msg text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                            <div>
                                <p class="h2-title text-center mt-5">Billing details</p>
                            </div>
                            <div class="input-group checkout_small_element">
                                <input type="text" id="checkout_name" name="name" required placeholder="Name">
                            </div>
                            <div class="input-group checkout_small_element">
                                <input type="email" id="checkout_email"  name="email" required placeholder="Email" >

                            </div>
                            <div class="input-group checkout_small_element">
                                <input type="tel" id="checkout_phone"  name="phone" required placeholder="Phone" >

                            </div>
                            <div class="input-group checkout_small_element">
                                <input type="text" id="checkout_city" name="city" required placeholder="City" >
                            </div>
                            <div class="input-group checkout_large_element">
                                <input type="text" id="checkout_address" name="address" required placeholder="Address" >
                            </div>
                            <div>
                                <p class="h2-title mt-4 text-center">Additional information</p>
                            </div>
                            <div class="input-group checkout_large_element">
                                <input type="text" id="checkout_notes" name="notes" placeholder="Notes about your order, e.g. special notes for delivery" >
                            </div>
                            <input style=" width: 150px; font-size: 24px" type="submit" class="btn checkOutBtn mt-3" name="placeOrder_btn" value="Place Order">
                        </form>
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


