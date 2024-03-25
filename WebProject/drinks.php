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
    <link rel="stylesheet" href="cssFiles/drinks.css">
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
        <!-- start of carousel  -->
        <section>
            <div class="carousel">
                <div class="list">
                    <div class="item active" style="--background: #CC3030">
                        <div class="content">Milk&nbsp;shake</div>
                        <img src="Images/fruit_strawberry.png" class="fruit" alt="">
                        <img src="Images/coffee.png" class="cup" alt="">
                    </div>
                    <div class="item" style="--background: #7F4A25">
                        <div class="content">&nbsp;Hot&nbsp;Drink</div>
                        <img src="Images/coffee_beans.png" class="fruit" alt="">
                        <img src="Images/j2.png" class="cup" alt="">
                    </div>
                    <div class="item hidden" style="--background: #EEB02C">
                        <div class="content">Fresh&nbsp;Juice</div>
                        <img src="Images/fruit_orange.png" class="fruit" alt="">
                        <img src="Images/milkshake.png" class="cup" alt="">
                    </div>
                </div>
                <div class="shadow"></div>
            </div>
        </section>
        <!-- end of carousel  -->
        <!-- start of swiper -->
        <section class="best-seller section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h1 class="h1-title revealUp">Delicious Flavors In One Cup</h1>
                                <h2 style="margin-top: 60px;" class="h2-title revealUp">Best Seller</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ca-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt1 = $con->prepare("SELECT * FROM bestseller where category= 'drinks'");
                            $stmt1->execute();
                            $best_seller = $stmt1->get_result();

                            while ($row = mysqli_fetch_assoc($best_seller) ){
                                ?>
                                <div class="swiper-slide">
                                    <div style="background-image: url('cardsBG/<?php echo $row["bgImage"] ?>');" class="ca-box text-center">
                                        <div class="ca-img back-img">
                                            <img src="Images/<?php echo $row["image"] ?>" alt="">
                                        </div>
                                        <h3 style="font-size: 22px" class="h3-title"><a href="singleProduct.php?productId=<?php echo $row["productId"];?>"><?php echo $row["name"] ?></a></h3>
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
        <section class="best-seller section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 style="margin-top: 60px;" class="h2-title revealUp">What's New</h2>
                            </div>
                        </div>
                    </div>
                    <div class="ca-slider">
                        <div class="swiper-wrapper">
                            <?php
                            $stmt2 = $con->prepare("SELECT * FROM newproducts where category= 'drinks'");
                            $stmt2->execute();
                            $whatsNew = $stmt2->get_result();
                            while ($row = mysqli_fetch_assoc($whatsNew) ){
                                ?>
                                <div class="swiper-slide">
                                    <div style=" background-image: url('cardsBG/<?php echo $row["bgImage"] ?>');" class="ca-box text-center pb-5">
                                        <div class="ca-img back-img mb-2">
                                            <img src="Images/<?php echo $row["image"] ?>" alt="">
                                        </div>
                                        <h3 style="font-size: 22px" class="h3-title mt-5"><a href="singleProduct.php?productId=<?php echo $row["productId"];?>"><?php echo $row["name"] ?></a></h3>
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
        <!-- start of filter menu  -->
        <section style=" padding-top: 20px;"
                 class="drinksMenu section repeat-img" id="drinksMenu">
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 class="h2-title revealUp">Menu</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-tab-wp">
                        <div class="row">
                            <div class="col-lg-12 m-auto">
                                <div class="menu-tab text-center">
                                    <ul class="filters">
                                        <div class="filter-active"></div>
                                        <li class="filter" data-filter=".all , .milkshake , .freshjuice, .hotdrink">
                                            <img src="Images/alldrink.png" style="width: 50px; height: 50px;" alt=""> All
                                        </li>
                                        <li class="filter" data-filter=".milkshake">
                                            <img src="Images/milk-shake.png" style="width: 50px; height: 50px;" alt="">Milkshake
                                        </li>
                                        <li class="filter" data-filter=".freshjuice">
                                            <img src="Images/freshjuice.png" style="width: 50px; height: 50px;" alt=""> Fresh Juice
                                        </li>
                                        <li class="filter" data-filter=".hotdrink">
                                            <img src="Images/coffee-cup.png" style="width: 50px; height: 50px;" alt=""> Hot Drink
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row">
                        <div style="display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" id="menu-drink">
                            <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE category = 'drinks'");
                            $stmt->execute();
                            $all_products = $stmt->get_result();
                            while ($row = mysqli_fetch_assoc($all_products) ){
                                ?>
                                <div style="display: flex; flex-direction: row; flex-wrap: wrap; " class="co">

                                    <div style="color: #ec5b59" class="drink-box-wp <?php echo $row["type"]; ?>" data-cat="<?php echo $row["type"]; ?>">
                                        <div href="singleProductDrink.php?productId=<?php echo $row["productId"]; ?>;" style="background-image: url('cardsBG/<?php echo $row["bgImage"] ?>'); " class="drink-box text-center ">
                                            <div class="drink-img">
                                                <img src="Images/<?php echo $row["image"]; ?>" alt="">
                                            </div>
                                            <div class="drink-title">
                                                <h3 class="h3-title"><?php echo $row["name"]; ?></h3>
                                            </div>

                                            <div class="drink-bottom-row">
                                                <b><?php echo $row["price"];?>
                                                    <span> &#8362;</span></b>
                                                <div style="display: flex; gap: 5px">
                                                    <form>
                                                        <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="fa-solid fa-heart card-btn"></i>
                                                            <button type="submit"  name="add_to_wishList" style="background-color: transparent; border: transparent" >
                                                            </button>
                                                        </a>
                                                    </form>
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
