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
<!-- end of header  -->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="container" style="display: flex; justify-content: center; padding: 50px">
            <div>
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h1 style="margin-top: 100px;" class="h1-title revealUp">Terms & conditions</h1>
                    </div>
                </div>
                <div class="tt" >
                    <div class="revealUp" style="margin-bottom: 15px;">
                        <strong>By ordering from Sugar Rush cake shop you agree to the following Terms & Conditions.</strong>
                    </div>
                    <div>
                    </div>
                    <div >
                        <div class="revealUp"><span> If you need to change the date of your order or cancel it please contact us as far in advance as possible! Telephone and online orders cancelled 4 days or more before the delivery/collection date will receive a full refund on the order total;
                        those cancelled within 2-4 days of delivery/collection will be entitled to a 50% refund; those cancelled within 48 hours of the order date will not be entitled to a refund (although refunds and credit notes may still be provided at Nino's discretion).
                        </span></div>
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
<!-- smooth scroll  -->
<script src="assets/js/smooth-scroll.js"></script>
<!--=============== MAIN JS ===============-->
<script src="jsFiles/main.js"></script>

</body>
</html>