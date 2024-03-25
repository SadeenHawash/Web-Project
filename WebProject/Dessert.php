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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="cssFiles/des.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Suger Rush</title>
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
        <!-- start of slider  -->
        <div class="slider">
            <section>
                <div class="circle"></div>


                <div class="content">

                    <div class="textBox active">
                        <h2 class="h1-title">Closer to love with every
                            <span id="output">Bite</span></h2>
                        <p style="margin-top: 50px; margin-left: 10%" class="h3-title1">Made & Baked with love & passion </p>
                    </div>

                    <div class="imgBox">
                        <img src="Images/dessetPage_croissant.png" alt="" class="starbucks"
                             style="width: 450px; height: 520px;">
                    </div>
                </div>

                <ul class="thumbnails">
                    <li>
                        <img id="changeGreen" src="Images/dessetPage_croissant.png" onclick="imageSlider('Images/dessetPage_croissant.png');
                        " alt="">
                    </li>
                    <li>
                        <img id="changePink1" src="Images/des.png" onclick="imageSlider('des.png');
                             " style="height: 70px;" alt="">
                    </li>
                    <li>
                        <img id="changePink2" src="Images/dessetPage_donut.png" onclick="imageSlider('Images/dessetPage_donut.png');
                            " alt="">
                    </li>
                </ul>
            </section>
        </div>
        <!-- end of carousel slider  -->
        <!-- start of swiper -->
        <section class="best-seller section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h1 class="h1-title revealUp">Sugar, Spice & Everything Nice</h1>
                                <h2 style="margin-top: 60px;" class="h2-title">Best Seller</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ca-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt1 = $con->prepare("SELECT * FROM bestseller where category != 'drinks'");
                            $stmt1->execute();
                            $best_seller = $stmt1->get_result();
                            while ($row = mysqli_fetch_assoc($best_seller) ){
                                ?>
                                <div class="swiper-slide">
                                    <div class="col-lg-3 swiper-slide">
                                        <div style="display: flex; justify-content: center; flex-direction: column; padding: 0"  class="ca-box text-center">
                                            <a style="width: 100%; height: 100%; border-radius: 20px" href="singleProduct.php?productId=<?php echo $row["productId"] ?>" ><img style=" width: 100%; height: 100%; border-radius: 20px" src="Images/<?php echo $row["image"] ?>" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end of swiper -->
        <!-- start of swiper -->
        <section class="whats-new section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 class="h2-title revealUp">What's New</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ca-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt1 = $con->prepare("SELECT * FROM newproducts where category != 'drinks'");
                            $stmt1->execute();
                            $best_seller = $stmt1->get_result();
                            while ($row = mysqli_fetch_assoc($best_seller) ){
                                ?>
                                <div class="swiper-slide">
                                    <div class="col-lg-3 swiper-slide">
                                        <div style="display: flex; justify-content: center; flex-direction: column; padding: 0"  class="ca-box text-center">
                                            <a style="width: 100%; height: 100%; border-radius: 20px" href="singleProduct.php?productId=<?php echo $row["productId"] ?>" ><img style=" width: 100%; height: 100%; border-radius: 20px" src="Images/<?php echo $row["image"] ?>" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of swiper -->
        <!-- start of view cake -->
        <section class="drinksMenu section repeat-img mt-3" >
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center ">
                                <h2 class="h2-title mb-5 ">Donuts</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row cakes" >
                        <div style=" margin-top: 0; display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" >
                            <?php
                            $stmt3 = $con->prepare("SELECT * FROM products WHERE type = 'Donut'");
                            $stmt3->execute();
                            $all_products3 = $stmt3->get_result();
                            while ($row = mysqli_fetch_assoc($all_products3) ){
                                ?>
                                <div style=" padding-top:  display: flex; flex-direction: row; flex-wrap: wrap; " class="co">
                                    <div style="color: #ec5b59;" class="drink-box-wp<?php echo $row["type"] ?>" data-cat="<?php echo $row["type"] ?>">
                                        <div style=" margin-top: 0;" class="drink-box">
                                            <img class=" cake-img" src="Images/<?php echo $row["image"] ?>" alt="">
                                            <div class="info text-center">
                                                <div class="drink-title">
                                                    <h3 class="h3-title"><?php echo $row["name"] ?></h3>
                                                </div>
                                                <div class="drink-bottom-row align-bottom">
                                                    <b><?php echo $row["price"] ?>
                                                        <span> &#8362;</span></b>
                                                    <div>
                                                        <a href="<?php echo "singleProduct.php?productId=".$row['productId'];?>">
                                                            <i class="fa-solid fa-heart "></i>
                                                        </a>
                                                        <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="fa-solid fa-cart-shopping card-btn "></i>
                                                            <button  style="background-color: transparent; border: transparent; margin-right: 0">
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end of view cake -->
        <!-- start of view cake -->
        <section class="drinksMenu section repeat-img mt-3" >
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center ">
                                <h2 class="h2-title mb-5 ">Cupcakes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row cakes" >
                        <div style=" margin-top: 0; display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" >
                            <?php
                            $stmt2 = $con->prepare("SELECT * FROM products WHERE category = 'Cupcake'");
                            $stmt2->execute();
                            $all_products2 = $stmt2->get_result();
                            while ($row = mysqli_fetch_assoc($all_products2) ){
                                ?>
                                <div style=" padding-top:  display: flex; flex-direction: row; flex-wrap: wrap; " class="co">
                                    <div style="color: #ec5b59;" class="drink-box-wp <?php echo $row["type"] ?>" data-cat="<?php echo $row["type"] ?>">
                                        <div style=" margin-top: 0;" class="drink-box">
                                            <img class=" cake-img" src="Images/<?php echo $row["image"] ?>" alt="">
                                            <div class="info text-center">
                                                <div class="drink-title">
                                                    <h3 class="h3-title"><?php echo $row["name"] ?></h3>
                                                </div>
                                                <div class="drink-bottom-row align-bottom">
                                                    <b><?php echo $row["price"] ?>
                                                        <span> &#8362;</span></b>
                                                    <div>
                                                        <a href="<?php echo "singleProduct.php?productId=".$row['productId'];?>">
                                                            <i class="fa-solid fa-heart "></i>
                                                        </a>
                                                        <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="fa-solid fa-cart-shopping card-btn "></i>
                                                            <button  style="background-color: transparent; border: transparent; margin-right: 0">
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end of view cake -->
        <!-- start of filter menu  -->
        <section style=" padding-top: 20px;"
                 class="drinksMenu section repeat-img" id="drinksMenu">
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 class="h2-title revealUp">The Full Cake Collection</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-tab-wp">
                        <div class="row">
                            <div class="col-lg-12 m-auto">
                                <div class="menu-tab text-center">
                                    <ul class="filters">
                                        <div class="filter-active"></div>
                                        <li class="filter" data-filter=".All , .Cakes , .BirthdayCakes, .WeddingCakes, .OtherEvents">
                                            <img src="Images/dessetPage_cake1.png" style="width: 50px; height: 50px;" alt=""> All
                                        </li>
                                        <li class="filter" data-filter=".Cakes">
                                            <img src="Images/dessetPage_lemon.png" style="width: 50px; height: 50px;" alt="">Special Cakes
                                        </li>
                                        <li class="filter" data-filter=".BirthdayCakes">
                                            <img src="Images/birthday-cake.png" style="width: 50px; height: 50px;" alt=""> Birthday
                                        </li>
                                        <li class="filter" data-filter=".WeddingCakes">
                                            <img src="Images/wedding-cake.png" style="width: 50px; height: 50px;" alt=""> Wedding
                                        </li>
                                        <li class="filter" data-filter=".OtherEvents">
                                            <img src="Images/dessertPage_cake.png" style="width: 50px; height: 50px;" alt=""> Other events
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row cakes">
                        <div style="display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" id="menu-drink">
                            <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE category = 'cake'");
                            $stmt->execute();
                            $all_products = $stmt->get_result();

                            while ($row = mysqli_fetch_assoc($all_products) ){
                                ?>
                                <div style="display: flex; flex-direction: row; flex-wrap: wrap; " class="co">
                                    <div style="color: #ec5b59" class="drink-box-wp <?php echo $row["type"] ?>" data-cat="<?php echo $row["type"] ?>">
                                        <div style="background-image: url('loc.png');" class="drink-box">
                                            <img class=" cake-img" src="Images/<?php echo $row["image"] ?>" alt="">
                                            <div class="info text-center">
                                                <div class="drink-title">
                                                    <h3 class="h3-title"><?php echo $row["name"] ?></h3>
                                                </div>
                                                <div class="drink-bottom-row align-bottom">
                                                    <b><?php echo $row["price"] ?>
                                                        <span> &#8362;</span></b>
                                                    <div>
                                                        <a href="<?php echo "singleProduct.php?productId=".$row['productId'];?>">
                                                            <i class="fa-solid fa-heart "></i>
                                                        </a>
                                                        <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="fa-solid fa-cart-shopping card-btn "></i>
                                                            <button  style="background-color: transparent; border: transparent; margin-right: 0">
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- end of filter menu  -->
        <!-- preLoader -->
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
<!-- custom js  -->
<script src="jsFiles/main.js"></script>

</body>

</html>
