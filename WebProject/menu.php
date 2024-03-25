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
        <section class="mt-5 pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center">
                        <h1 class="h2-title mb-5">Cake</h1>
                        <p class="h2-title1 text-center">Full Size Round Cake Serving</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="cakeMenu">
                    <div class="text-center contact_box">
                        <div style="display: flex; gap: 10px;">
                            <h2 class="h2-title1 mt-5"><strong>Small</strong><br>size</h2>
                            <img class="mt-3" src="Images/c1.png" style="width: 150px;height: 120px;" alt="">
                            <h2 class="tt mt-5">Up to<br><strong>8</strong><br>persons</h2>
                        </div>
                    </div>
                    <div class="text-center contact_box">
                        <div style="display: flex; gap: 10px;">
                            <h2 class="h2-title1 mt-5"><strong>Large</strong><br>size</h2>
                            <img src="Images/c1.png" style="width: 170px;height: 140px;" alt="">
                            <h2 class="tt mt-5">Up to<br><strong>16</strong><br>persons</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="cakeMenu">
                    <div class="text-center contact_box">
                        <div style="display: flex; gap: 10px;">
                            <h4 class="tt">Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                    </div>
                    <div class="text-center contact_box">
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h4>Strawberry Cake with Mascarpone</h4>
                            <h2 class="tt text-center">..........<strong> 8 </strong></h2>
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