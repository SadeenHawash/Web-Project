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
    <!-- icons  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="cssFiles/IceCream.css">
    <title>Sugar Rush</title>
</head>

<body class="body-fixed">
    <!-- preLoader -->
    <?php
    @include 'preloader.php'
    ?>
    <!-- start of header -->
    <div class="headerbox"></div>
    <?php
    @include 'header.php'
    ?>
    <!-- end of header  -->
    <!-- start of slider  -->
    <section>
        <div class="iceslider">
            <div class="title">Do you know how pleasure tastes?</div>
            <div class="images">
                <div class="iceitem active" style="--i: 1">
                    <img src="IceCreamImages/c.png" id="jj1" alt="">
                </div>
                <div class="iceitem" style="--i: 2">
                    <img src="IceCreamImages/8.png" id="jj2" alt="">
                </div>
                <div class="iceitem" style="--i: 3">
                    <img src="IceCreamImages/7.png" id="jj3" alt="">
                </div>
                <div class="iceitem" style="--i: 5">
                    <img src="IceCreamImages/9.png" id="jj4" alt="">
                </div>
                <div class="iceitem" style="--i: 6">
                    <img src="IceCreamImages/p.png" id="jj5" alt="">
                </div>
                <div class="iceitem" style="--i: 4">
                    <img src="IceCreamImages/3.png" id="jj6" alt="">
                </div>
                <div class="iceitem" style="--i: 7">
                    <img src="IceCreamImages/6.png" id="jj7" alt="">
                </div>

            </div>
            <div class="content">
                <div class="iceitem active" style="color: #ffdd0f; text-shadow: 3px 3px 0 rgb(219, 192, 18);">
                    <h1>Mango & Cream</h1>
                </div>
                <div class="iceitem" style="color: #8e4200; text-shadow: 3px 3px 0 rgb(204, 150, 99);">
                    <h1>Hazelnut</h1>
                </div>
                <div class="iceitem" style="color: #884377; text-shadow: 3px 3px 0 rgb(235, 118, 225);">
                    <h1>Blueberry Cheesecake</h1>
                </div>
                <div class="iceitem" style="color: rgb(213, 37, 37); text-shadow: 3px 3px 0 rgb(240, 160, 160);">
                    <h1>Strawberry</h1>
                </div>
                <div class="iceitem" style="color: #422205; text-shadow: 3px 3px 0 rgb(202, 143, 88);">
                    <h1>Vanilla Brownie</h1>
                </div>
                <div class="iceitem" style="color: #f4ef6b; text-shadow: 3px 3px 0 rgb(157, 194, 97);">
                    <h1>Lemon Sorbet</h1>
                </div>
                <div class="iceitem" style="color: #c66810; text-shadow: 3px 3px 0 rgb(95, 58, 23);">
                    <h1>Hazelnut & Caramel</h1>
                </div>
            </div>
            <button id="prev">
                < </button>
            <button id="next">></button>
        </div>
    </section>
    <img class="drop" style="opacity: .5; position: relative; top: -10px" src="IceCreamImages/buttom.png" alt="">
    <!-- end of slider  -->
    <!-- start of ice view-->
    <section style="margin-top: -130px" class=" repeat-img text-center mb-5">
        <div class="sec_wp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sec-title text-center mb-5">
                            <h2 class="h2-title1 mt-5">Delicious Flavours In One Cup</h2>
                        </div>
                    </div>
                </div>
                <div class="menu-list-row ">
                    <div style="display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show drinksMenu" >
                        <?php
                        $stmt = $con->prepare("SELECT * FROM products WHERE category= 'IceCream'");
                        $stmt->execute();
                        $all_products = $stmt->get_result();
                        while ($row = mysqli_fetch_assoc($all_products) ){
                            ?>
                            <div style="display: flex; flex-direction: row; flex-wrap: wrap;" class="co">
                                <div style="color: #ec5b59" class="drink-box-wp">
                                    <div style="margin-top: 5px; " class="drink-box text-center ">
                                        <div class="drink-img">
                                            <img style="padding-top: 75px" src="Images/<?php echo $row["image"];?>" alt="">
                                        </div>
                                        <div class="drink-title mt-5">
                                            <a href="singleProduct.php?productId=<?php echo $row["productId"];?>" ><h3 class="h3-title"><?php echo $row["name"] ?></h3></a>
                                        </div>
                                        <div class="drink-bottom-row" style="gap: 70px">
                                            <b><?php echo $row["price"];?>
                                                <span> &#8362;</span></b>
                                            <div style="display: flex; gap: 5px">
                                                <form>
                                                    <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                                        <i style="width: 10px; height: 10px; margin-right: 10px" class="fa-solid fa-heart card-btn"></i>
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
    <!-- end of ice view -->

    <section>
        <div class="wrapx"><img class="image-truck" style="height: 250px; width: 250px;" src="truck.png" alt=""></div>
    </section>
    <section style="margin-bottom: 50px;">
        <img class="bis" style="height: 150px;" src="IceCreamImages/bb.png" alt="">
    </section>
    <!-- footer -->
    <?php
    @include 'footer.php'
    ?>

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
    <script src="jsFiles/IceCream.js"></script>
</body>

</html>