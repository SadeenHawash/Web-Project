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
    <link rel="stylesheet" href="cssFiles/style.css">
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
<div id="cookies">
    <div class="container">
        <div class="sub-container">
            <div class="cookies">
                <div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div id="viewport">
    <div id="js-scroll-content">
        <!-- start of carousel slider  -->
        <section class="text-center">
            <div class="carouselHP text-center">
                <div class="listHP">
                    <img src="Images/ss1.jpg" class="sliderimg" alt="">
                    <img src="Images/ss2.jpg" class="sliderimg" alt="">
                    <img src="Images/ss3.jpg" class="sliderimg" alt="">
                    <img src="Images/ss2.jpg" class="sliderimg" alt="">
                    <img src="Images/ss3.jpg" class="sliderimg" alt="">
                    <img src="Images/ss1.jpg" class="sliderimg" alt="">
                    <img src="Images/ss2.jpg" class="sliderimg" alt="">
                </div>
                <div>
                    <p class="carouselText revealUp ">Today & Every Day</p>
                </div>
                <div class="black-trans" width=100%></div>
            </div>
        </section>
        <!-- end of carousel slider  -->
        <!-- start of what we offer -->
        <section style="margin-top: 30px;" class="what-we-offer section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 style="margin-top: 15px;" class="h2-title revealUp">What We Offer</h2>
                            </div>
                        </div>
                    </div>
                    <div class="what-we-offer-info">
                        <div style=" display: flex; flex-wrap: wrap; justify-content: center;" class="what-we-offer">
                            <div>
                                <div class="text-center">
                                    <img src="Images/gateau.png" style="width: 65px; height: 65px;" alt="">
                                    <div class="h4-title revealUp"><h4>Gateau</h4></div>
                                </div>
                            </div>
                            <div >
                                <div class=" text-center">
                                    <img src="Images/cake.png" style="width: 65px; height: 70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Cake</h4></div>
                                </div>
                            </div>
                            <div>
                                <div class=" text-center">
                                    <img src="Images/croisant.png" style="width: 73px; height: 70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Croissant</h4></div>
                                </div>
                            </div>
                            <div>
                                <div class=" text-center ">
                                    <img src="Images/cupcake2.png" style="width: 70px; height:70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Cupcake</h4></div>
                                </div>
                            </div>
                            <div>
                                <div class="text-center">
                                    <img src="Images/donut.png" style="width: 70px; height: 70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Donuts</h4></div>
                                </div>
                            </div>
                            <div>
                                <div class=" text-center">
                                    <img src="Images/ice-cream.png" style="width: 70px; height: 70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Ice cream</h4></div>
                                </div>
                            </div>
                            <div>
                                <div class=" text-center">
                                    <img src="Images/cocktail.png" style="width: 70px; height: 70px;" alt="">
                                    <div class="h4-title revealUp"><h4>Drinks</h4></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of what we offer -->
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
        <!-- start of swiper -->
        <section class="best-seller section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 style="margin-top: 60px;" class="h2-title revealUp">Best Seller</h2>
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
        <!-- start of why us -->
        <section class="why-us-table section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 style="margin-top: 10px;" class="h2-title text-center revealUp">Our Skills</h2>
                            </div>
                        </div>
                    </div>
                    <div class="why-us-info">
                        <div style="display: flex; flex-wrap: wrap; " class="whyuscont ">
                            <div class="cad col-lg-4">
                                <img src="Images/cupcake.png" style="width: 70px; height: 70px;" alt="">
                                <div class="exp revealUp"><h4>Lovingly Baked</h4>Made & Baked with love & passion</div>
                            </div>
                            <div class="cad col-lg-4">
                                <img src="Images/product.png" style="width: 70px; height: 70px;" alt="">
                                <div class="exp revealUp"><h4>Natural Ingredients</h4> We use natural & fresh products&#160&#160&#160</div>
                            </div>
                            <div class="cad col-lg-4">
                                <img src="Images/scooter.png" style="width: 70px; height: 70px;" alt="">
                                <div class="exp revealUp"><h4>Fast Delivery</h4>Deliver orders as fast as possible&#160&#160</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of why us -->
        <!-- Order a cake -->
        <section  style=" margin-top: 20px;" class="container order-cake section text-center">
            <div class="sec-wp">
                <div class="container align-content-center text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h1 style="margin-top: 15px;" class="h1-title revealUp">Special Flavors</h1>
                            </div>
                        </div>
                    </div>
                    <div  class="container containerf">
                        <div class="container flavors">
                            <div class="imgbx active" style="--i:1;" data-id="content1">
                                <img src="Images/i1.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:2;" data-id="content2">
                                <img src="Images/i2.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:3;" data-id="content3">
                                <img src="Images/i3.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:4;" data-id="content4">
                                <img src="Images/i4.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:5;" data-id="content5">
                                <img src="Images/i5.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:6;" data-id="content6">
                                <img src="Images/i6.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:7;" data-id="content7">
                                <img src="Images/i7.png" alt="">
                            </div>
                            <div class="imgbx" style="--i:8;" data-id="content8">
                                <img src="Images/i8.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                            <div  class="contentbx active" id="content1">
                                <div  class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c8.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1 text-center">Blueberry Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content2">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img style="margin-left: 30px" src="Images/c18.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Coconut Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content3">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c7.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Black Forest Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content4">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c1.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Raspberry Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content5">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c16.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Lemon Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content6">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c6.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Strawberry Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content7">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c13.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Chocolate Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="contentbx" id="content8">
                                <div class="circleslidecard">
                                    <div class="imgbx">
                                        <img src="Images/c15.png" alt="">
                                    </div>
                                    <div class="textbx">
                                        <h2 class="h2-title1">Mango Cake</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="Dessert.php" class="h2-title mt-4" aria-label="Order Now!: Mermaid Dreams Cake">Order Now!</a>
        </section>
        <!-- end of odder a cake -->
        <!-- mermaid-cake-->
        <section class="mt-3" id="mermaid-cake" style="padding: 40px;">
            <div class="container">
                <div style=" display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;" class="mermaid-cake">
                    <div>
                        <img style="width: 360px; height: 450px; border-radius: 30px" src="Images/mermaid.webp" alt="">
                   </div>
                    <div >
                        <div class="contact_box">
                            <h2 class="h2-title">Edible Work Of Art!</h2>
                            <div class=" tt"><p>Dive into an ocean of beauty with our Magical Mermaid<br>Cake! A delicious filling, that tastes as good as it looks,<br>adorned with lustrous fondant shells and tails!</p></div>
                            <a href="Dessert.php" class="h2-title1" aria-label="Order Now!: Mermaid Dreams Cake">Order Now!</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- mermaid-cake-->
        <!-- start of drinks view-->
        <section class=" repeat-img text-center ">
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 class="h2-title mt-5">Delicious Flavours In One Cup</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row ">
                        <div style="display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show drinksMenu" >
                            <?php
                            $stmt = $con->prepare("SELECT * FROM products WHERE category= 'drinks' and productId>5 limit 4");
                            $stmt->execute();
                            $all_products = $stmt->get_result();
                            while ($row = mysqli_fetch_assoc($all_products) ){
                                ?>
                                <div style="display: flex; flex-direction: row; flex-wrap: wrap;" class="co">
                                    <div style="color: #ec5b59" class="drink-box-wp">
                                        <div style="margin-top: 5px; background-image: url('cardsBG/<?php echo $row["bgImage"] ?>'); " class="drink-box text-center ">
                                            <div class="drink-img">
                                                <img style="padding-top: 75px" src="Images/<?php echo $row["image"] ?>" alt="">
                                            </div>
                                            <div class="drink-title mt-5">
                                                <a href="singleProduct.php?productId=<?php echo $row["productId"];?>" ><h3 class="h3-title"><?php echo $row["name"] ?></h3></a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a href="drinks.php" style="font-size: 30px" class="h2-title mt-0">View More</a>
                </div>
            </div>
        </section>
        <!-- end of drinks view -->
        <!-- start of carousel slider  -->
        <section class="slider2 container py-0 my-5">
            <div class="my-slideshow">
                <div  class="my fade">
                    <img src="Images/ca4.jpeg" style="width:100%; opacity: .8; border-radius: 30px" alt="">
                    <div class="text ">
                        <p style="font-size: 30px" class=" h2-title">Customized Candy Tables</p>
                        <p style="font-size: 20px; color: #ec5b59;" class="tt ">Created To Match Your Theme & Design</p>
                        <a href="UserCandyTables.php" style="width: 250px; padding: 10px; font-size: 24px" class="checkOutBtn"><span>Find Out More</span></a>
                    </div>
                </div>
                <div class="my fade">
                    <img src="Images/ca2.jpeg" style="width:100%;border-radius: 30px;opacity: .8;" alt="">
                    <div class="text ">
                        <p style="font-size: 30px" class=" h1-title">Designed Just For You!</p>
                        <p style="font-size: 20px; color: #ec5b59;" class="tt ">3 Cakes Instead Of One, Who Won't Love That?</p>
                        <a href="Dessert.php" style="width: 250px; padding: 10px; font-size: 24px" class="checkOutBtn text-center"><span>Find Out More</span></a>
                    </div>
                </div>

                <div class="my fade">
                    <img src="Images/ca1.jpeg" style="width:100%;border-radius: 30px;opacity: .8;" alt="">
                    <div class="text ">
                        <p style="font-size: 26px" class="h1-title">Unique Creations For Unique Occasions</p>
                        <br>
                        <a href="Dessert.php" style="width: 250px; padding: 10px; font-size: 24px" class="checkOutBtn text-center"><span>Find Out More</span></a>
                    </div>
                </div>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </section>
        <!-- end of carousel slider  -->
        <!-- start of view cake -->
        <section class=" section repeat-img mt-0" >
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center ">
                                <h2 class="h2-title revealUp mb-5 ">Cake Collection</h2>
                            </div>
                        </div>
                    </div>
                    <div class="menu-list-row cakes" >
                        <div style=" margin-top: 0; display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" >
                            <?php
                            $stmt1 = $con->prepare("SELECT * FROM products WHERE category = 'Cake' and productId>60 limit 8");
                            $stmt1->execute();
                            $all_products1 = $stmt1->get_result();
                            while ($row = mysqli_fetch_assoc($all_products1) ){
                                ?>
                                <div style=" padding-top:  display: flex; flex-direction: row; flex-wrap: wrap; " class="co">
                                    <div style="color: #ec5b59;" class="drink-box-wp <?php echo $row["type"] ?>" data-cat="<?php echo $row["type"] ?>">
                                        <div style="background-image: url('loc.png'); margin-top: 0;" class="drink-box">
                                            <img class=" cake-img" src="Images/<?php echo $row["image"] ?>" alt="">
                                            <div class="info text-center">
                                                <div class="drink-title">
                                                    <a href="singleProduct.php?productId=<?php echo $row["productId"];?>" ><h3 class="h3-title mt-3"><?php echo $row["name"] ?></h3></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center ">
                                    <a href="Dessert.php" style="font-size: 30px" class="text-center h2-title mt-0">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end of view cake -->
        <!-- start of delivery -->
        <section style="padding: 30px" class="mt-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h2 style="margin-top: 10px;" class="h1-title revealUp">Delivery</h2>
                    </div>
                </div>
            </div>
            <div  style="display: flex; justify-content: center; align-content: center;">
                <section class="container" style="display: flex; justify-content: center; padding: 20px 30px 30px;">
                    <div >
                        <div class="tt" >
                            <div >
                                <p>
                                    All our deliveries are made between 1pm till 8pm, we operate using a time slot system. We strive to drop off your order at the most convenient time, but we cannot promise a specific time.
                                    <br>
                                    <br> 12:00-14:00pm: West Bank cities.
                                    <br> 14:00-17:00pm: Villages in the West Bank.
                                    <br> 15:00-20:00pm: The 48 Occupied territories.
                                    <br><br>
                                    Pre-12pm delivery slots are available for an additional cost. For multi-drop deliveries, timed/earlier deliveries or large orders going further afield please contact us directly!
                                    <br><br>
                                    Our delivery team will contact you 30 mins to an hour prior to delivery to let you know when to expect your order.
                                    <br><br>
                                    Please read our <span><a href="shippingPolicy.php">Shipping policy</a></span> for more information.
                                </p>
                        </div>
                    </div>
                </section>
                <div  style="display: flex;" class="ss">
                    <img class="delivery_image" style="width: 400px; height: 450px; padding-top: 50px" src="Images/dd.png" alt="">
                </div>
            </div>
        </section>
        <!-- end of delivery -->
        <!-- start of get in touch-->
        <section id="getintouch" style="background-image: url('loc.png'); padding-bottom: 40px; padding-top: 20px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h2 style="margin-top: 10px;" class="h1-title revealUp">Get In Touch</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <p style="margin-top: 10px;" class="tt revealUp">If you'd like to get in touch to talk cake, discuss an order or anything else we'd love to hear from you.</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div style=" display: flex; flex-wrap: wrap; justify-content: center; align-content: center; padding-bottom: 40px" class="getintouchcont">
                    <div class="wow fadeInUpBig delay-2000  animated" data-wow-duration="3s" style="visibility: visible; animation-duration: 3s; animation-name: fadeInUpBig;">
                        <section class="google-map text-center p-0" id="map">
                            <embed class="map1" style="border-radius: 20px;" width="500px" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=32.224042, 35.242418&amp;hl=es;z=14&amp;output=embed">
                        </section>
                    </div>
                    <div>
                        <?php
                        $stmt3 = $con->prepare("SELECT * FROM admin_info");
                        $stmt3->execute();
                        $admin_info = $stmt3->get_result();
                        $row = mysqli_fetch_assoc($admin_info);
                            ?>
                            <div class="contact_box">
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title revealUp"><i class="fa-solid fa-user "></i></div>
                                    <a href="https://www.google.com/maps/search/vanilla+nablus/@32.2243029,35.2475076,14z/data=!3m1!4b1?entry=ttu"><h4 class="h4-title revealUp"><?php echo $row["address"] ?></h4></a>
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title revealUp"><i class="ri-phone-fill"></i></div>
                                    <h4 class="h4-title revealUp"> <?php echo $row["phone"] ?></h4>
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title revealUp"><i class="ri-mail-line"></i></div>
                                    <div class="h4-title revealUp"><a href="mailto:<?php echo $row["email"] ?>"><?php echo $row["email"] ?></a></div>
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title revealUp"><i class="ri-time-line"></i></div>
                                    <div class="h4-title revealUp"><p>Sun-Thu: <?php echo $row["openingTime1"] ?><br>Fri-Sat: <?php echo $row["openingTime2"] ?></p></div>
                                </div>
                                <div style="font-size: 25px; margin-top: 10px; gap: 25px;" class="h4-title social-icon">
                                    <a href="#"><i class="ri-instagram-line revealUp"></i></a>
                                    <a href="#"><i class="ri-facebook-circle-line revealUp"></i></a>
                                    <a href="#"><i class="ri-twitter-line revealUp"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of get in touch-->

        <!-- footer -->
        <?php
        @include 'footer.php'
        ?>
    </div>
</div>
<script>
    new Splide( '#image-slider' ).mount();
</script>
<script>
    let imgbx = document.querySelectorAll('.imgbx');
    let contentbx = document.querySelectorAll('.contentbx');
    for(let i=0; i<imgbx.length; i++){
        imgbx[i].addEventListener('mouseover', function(){
            for(let i=0; i<contentbx.length; i++){
                contentbx[i].className ='contentbx';
            }
            document.getElementById(this.dataset.id).
                className = 'contentbx active';

            for(let i=0; i<imgbx.length; i++){
                imgbx[i].className = 'imgbx';
            }
            this.className = 'imgbx active';
        })
    }
</script>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("my");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace("active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000);
    }
</script>

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
