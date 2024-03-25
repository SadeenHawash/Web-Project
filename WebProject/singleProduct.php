<?php
global $con;

session_start();
include 'config.php';


if(isset($_GET['productId'])){

    $productId = $_GET['productId'];
    $stmt2 = $con->prepare("SELECT * FROM products where productId = ? limit 1");
    $stmt2->bind_param("i",$productId);
    $stmt2->execute();
    $getProduct = $stmt2->get_result();
}
else{
    header('location: singleProduct.php');
}

if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}else{
    $userId = '';
}
if(isset($_POST['add_to_cart'])){
    if($userId == ''){
        header('location: SignIn.php');
        exit;
    }
    else{
        $productId = $_POST['productId'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_POST['image'];

        $stmt_search = $con->prepare(" SELECT count(*) FROM cart WHERE userId=? and
                                 productId =? ");
        $stmt_search->bind_param('ii',$userId,$productId);
        $stmt_search->execute();
        $stmt_search->bind_result($num_rows);
        $stmt_search->store_result();
        $stmt_search->fetch();

        if($num_rows != 0){
            $error[] = "Product already In The Cart!!";
            header('location: cart.php?error = Product already In The Cart!!');
        }
        else{
            $stmt = $con->prepare("INSERT INTO cart (userId,productId,name,price,quantity,image) VALUES(?,?,?,?,?,?)");
            $stmt->bind_param('iissss',$userId, $productId,$name,$price,$quantity,$image);
            if($stmt->execute()){
                header('location: cart.php?error=Added Successfully!!');
            }
            else{
                header('location: singleProduct.php?error=Could not add product!!');
            }
        }
    }
}
if(isset($_POST['add_to_wishlist'])){
    if($userId == ''){
        header('location: SignIn.php');
        exit;
    }else{
        $productId = $_POST['productId'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $stmt_search = $con->prepare(" SELECT count(*) FROM cart WHERE userId= ? and productId =? ");
        $stmt_search->bind_param('ii',$userId,$productId);
        $stmt_search->execute();
        $stmt_search->bind_result($num_rows);
        $stmt_search->store_result();
        $stmt_search->fetch();
        $stmt_search1 = $con->prepare(" SELECT count(*) FROM wishList WHERE userId=? and productId =? ");
        $stmt_search1->bind_param('ii',$userId,$productId);
        $stmt_search1->execute();
        $stmt_search1->bind_result($num_rows1);
        $stmt_search1->store_result();
        $stmt_search1->fetch();

        if($num_rows != 0){
            $error[] = "Product already In The Cart!!";
            header('location: cart.php?error = Product already In The Cart!!');
        }
        elseif ($num_rows1 != 0){
            header('location: singleProduct.php?error=product already in wish list!!');
        }
        else{
            $stmt1 = $con->prepare("INSERT INTO wishList (userId,productId,name,price,image) VALUES(?,?,?,?,?)");
            $stmt1->bind_param('iisss',$userId, $productId,$name,$price,$image);
            if($stmt1->execute()){
                header('location: wishList.php?error=Added Successfully to the wish list!!');
            }
            else{
                header('location: singleProduct.php?error=Could not add product!!');
            }
            /*$stmt_search1 = $con->prepare(" SELECT count(*) FROM wishList WHERE userId=? and productId =? ");
            $stmt_search1->bind_param('ii',$userId,$productId);
            $stmt_search1->execute();
            $stmt_search1->bind_result($num_rows);
            $stmt_search1->store_result();
            $stmt_search1->fetch();
            if($num_rows == 0){
                $stmt1 = $con->prepare("INSERT INTO wishList (userId,productId,name,price,image) VALUES(?,?,?,?,?)");
                $stmt1->bind_param('iisss',$userId, $productId,$name,$price,$image);
                if($stmt1->execute()){
                    header('location: wishList.php?error=Added Successfully to the wish list!!');
                }
                else{
                    header('location: singleProduct.php?error=Could not add product!!');
                }
            }
            else{
                header('location: singleProduct.php?error=product already in wish list!!');
            }*/
        }
    }
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

        <!-- start of filter menu  -->
        <section style="margin-top: 150px" class="container single-product ">
            <?php while ($row = $getProduct->fetch_assoc()){ ?>
            <div style="display: flex" class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <div style="display: flex; flex-direction: row; justify-content: center">
                            <div class="product_cont" style="background-image: url('cardsBG/<?php echo $row["bgImage"]; ?>'); " id="main-img-bg">
                                <img style="width:60%; border-radius: 30px" alt="" id="main-img" src="Images/<?php echo $row["image"]; ?>">
                            </div>
                        </div>
                        <div class="small-image-group mt-5" style="gap: 10px">
                            <div class="small-img-col" style="width: 20%;" >
                                <img style="border-radius: 10px" class="small-img" src="Images/cookie_dough_chocolate_cake.jpg" alt="" >
                            </div>
                            <div class="small-img-col" style="width: 20%">
                                <img style="border-radius: 10px" class="small-img" src="Images/lemon-blueberry-cake.jpg" alt="">
                            </div>
                            <div class="small-img-col" style="width: 20%">
                                <img style="border-radius: 10px" class="small-img" src="Images/mint-chocolate-chip-cake.jpg" alt="" >
                            </div>
                            <div class="small-img-col" style="width: 20%">
                                <img style="border-radius: 10px" class="small-img" src="Images/chocolate-strawberry-cake.jpg" alt="" >
                            </div>
                        </div>
                    </div>
                    <div style="margin: 30px" class="col-lg-4 col-md-4 col-sm-12">
                        <h6 class="h2-title">Shop/<?php echo $row["category"]; ?></h6>
                        <h3 style="font-size: 32px" class="h2-title py-4"><?php echo $row["name"]; ?></h3>
                        <h2 class="h2-title1 mb-3" ><?php echo $row["price"]; ?> <span> &#8362;</span></h2>
                        <div style="display: flex">
                            <form action="#" method="post">
                                <input type="hidden" name="productId" value="<?php echo $row["productId"]; ?>"/>
                                <input class="cart mt-3" type="number" name="quantity" value="1" min="1"/>
                                <input type="hidden" name="image" value="<?php echo $row["image"]; ?>"/>
                                <input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/>
                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>"/>
                                <button type="submit" name="add_to_cart" class="h2-title1 mt-3" style="border: none; cursor: pointer; background-color: transparent;  margin-left: 20px" >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>
                            <form action="#" method="post">
                                <input type="hidden" name="productId" value="<?php echo $row["productId"]; ?>"/>
                                <input type="hidden" name="image" value="<?php echo $row["image"]; ?>"/>
                                <input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/>
                                <input type="hidden" name="price" value="<?php echo $row["price"]; ?>"/>
                                <button type="submit" name="add_to_wishlist" class="h2-title1 mt-3" style="border: none; cursor: pointer; background-color: transparent;  margin-left: 30px">
                                    <i class="fa-solid fa-heart "></i>
                                </button>
                            </form>

                        </div>
                    </div>
            </div>
            <?php } ?>
        </section>
        <!-- start of view drink -->
        <section class=" repeat-img text-center mt-4">
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <h2 class="h2-title mt-5">You May Also Like</h2>
                            </div>
                        </div>
                    </div>
                    <div style="display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" id="menu-drink">
                        <?php
                        $stmt = $con->prepare("SELECT * FROM products where category='Drinks' and productId>8 limit 4");
                        $stmt->execute();
                        $all_products = $stmt->get_result();
                        while ($row = mysqli_fetch_assoc($all_products) ){
                            ?>
                            <div style="display: flex; flex-direction: row; flex-wrap: wrap;" class="co">
                                <div style="color: #ec5b59" class="drink-box-wp <?php echo $row["type"]; ?>" data-cat="<?php echo $row["type"]; ?>">
                                    <div style="margin-top: 5px; background-image: url('cardsBG/<?php echo $row["bgImage"]; ?>'); " class="drink-box text-center ">
                                        <div class="drink-img">
                                            <img style="padding-top: 75px" src="Images/<?php echo $row["image"]; ?>" alt="">
                                        </div>
                                        <div class="drink-title mt-5">
                                            <a href="<?php echo "singleProduct.php?productId=".$row["productId"]; ?>"><h3 class="h3-title"><?php echo $row["name"]; ?></h3></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <a href="drinks.php" style="font-size: 30px" class="h2-title mt-0">View More</a>
                </div>
            </div>
        </section>
        <!-- end of view drink -->
        <!-- start of view cake -->
        <section class="text-center section repeat-img mt-5" >
            <div class="sec_wp">
                <div class="container">
                    <div class="menu-list-row cakes" >
                        <div style=" margin-top: 0; display: flex; flex-wrap: wrap; justify-content: center;" class="g-xxl-5 bydefault_show" >
                            <?php
                            $stmt1 = $con->prepare("SELECT * FROM products WHERE category = 'cake' and productId>56 limit 4");
                            $stmt1->execute();
                            $all_products1 = $stmt1->get_result();
                            while ($row = mysqli_fetch_assoc($all_products1) ){
                                ?>
                                <div style=" padding-top:  display: flex; flex-direction: row; flex-wrap: wrap; " class="co">
                                    <div style="color: #ec5b59;" class="drink-box-wp <?php echo $row["type"]; ?>" data-cat="<?php echo $row["type"]; ?>">
                                        <div style="background-image: url('loc.png'); margin-top: 0;" class="drink-box">
                                            <img class=" cake-img" src="Images/<?php echo $row["image"]; ?>" alt="">
                                            <div class="info text-center">
                                                <div class="drink-title">
                                                    <a href="<?php echo "singleProduct.php?productId=".$row["productId"]; ?>"><h3 class="h3-title mt-3"><?php echo $row["name"]; ?></h3></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <a href="Dessert.php" style="font-size: 30px" class="h2-title mt-0">View More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of view cake -->
        <!-- footer -->
        <?php
        @include 'footer.php'
        ?>
    </div>
</div>
<script>
    const mainImg = document.getElementById("main-img");
    const smallImg = document.getElementsByClassName("small-img");
    smallImg[0].onclick = function (){
        mainImg.src = smallImg[0].src;
    }
    smallImg[1].onclick = function (){
        mainImg.src = smallImg[1].src;
    }
    smallImg[2].onclick = function (){
        mainImg.src = smallImg[2].src;
    }
    smallImg[3].onclick = function (){
        mainImg.src = smallImg[3].src;
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

