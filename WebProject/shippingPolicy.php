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
                        <h1 class="h1-title mt-5 mb-5 revealUp">Shipping policy</h1>
                    </div>
                </div>
                <div class="tt mt-5" >
                    <div>
                        <p><br>
                            Please ensure someone is available at the delivery address on the day;
                            if there is no-one on hand to receive the order please do contact us to arrange.
                            We will do our very best to leave it in a safe place (with a neighbour, caretaker etc.)
                            but we cannot keep hold of the order for re-delivery and they will be left at the address
                            you have given us at your responsibility. If you would like us to deliver to your place of
                            work or somewhere else we would be happy to do so but please note that we cannot accept any
                            liability for the treatment of your order or mishandling once a delivery has been made and
                            signed for.
                        </p>
                    </div>
                    <div>
                    </div>
                    <div >
                        <p><br>Please make sure cash is available at the location as we cannot change the payment method to an online payment after the order has been sent out for delivery.</p>
                        <p><span><br>All our drivers are highly trained in the proper way of handling and delivering cakes, and will always pass this information on to any other courier. However once the cakes are signed for we cannot accept liability for the subsequent handling of your order.</span>&nbsp;</p>
                        <div><br>If arranging your own courier collection we would advise always booking a van or car and avoid a motorcycle. Once cakes have left our bakery we can not be held liable for any damage that occurs on transit. Any issues should be handled directly with the courier company you have chosen to use.
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
