<?php
global $con;

session_start();
include 'config.php';

$stmt = $con->prepare("SELECT * FROM products where category='Drinks' and productId>5 limit 4");
$stmt->execute();
$all_products = $stmt->get_result();
$stmt1 = $con->prepare("SELECT * FROM products WHERE category = 'cake' and productId>56 limit 4");
$stmt1->execute();
$all_products1 = $stmt1->get_result();


if(isset($_POST['update_product_price'])){
    $update_value=$_POST['update_price'];
    $update_id=$_POST['update_price_id'];
    // query
    $update_price_query=mysqli_query($con,"update `products` set price=$update_value where productId= $update_id");

}
if(isset($_POST['add_to_bestSeller'])){
    $productId = $_POST['productId'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $bgImage =  $_POST['bgImage'];
    $category = $_POST['category'];

    $stmt_search = $con->prepare(" SELECT count(*) FROM bestseller WHERE productId =? ");
    $stmt_search->bind_param('s',$productId);
    $stmt_search->execute();
    $stmt_search->bind_result($num_rows);
    $stmt_search->store_result();
    $stmt_search->fetch();

    if($num_rows != 0){
        $error[] = "Product already In Best Sellers!!";
        header('location: adminBestSeller.php?error = Product already In Best Sellers!!');
    }
    else{
        $stmt = $con->prepare("INSERT INTO bestseller (productId,name,category,type,price,image,bgImage) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss',$productId,$name, $category,$type,$price,$image,$bgImage);
        if($stmt->execute()){
            header('location: adminBestSeller.php?error = Product Added Successfully ');
        }
        else{
            header('location: adminSingleProduct.php?error=Could not add product!!');
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
@include 'adminHeader.php'
?>
<div id="viewport">
    <div id="js-scroll-content">

        <!-- start of filter menu  -->
        <section style="margin-top: 150px" class="container single-product">
            <?php
            if(isset($_GET['productId'])){

                $productId = $_GET['productId'];
                $stmt2 = $con->prepare("SELECT * FROM products where productId = ? limit 1");
                $stmt2->bind_param("i",$productId);
                $stmt2->execute();
                $getProduct = $stmt2->get_result();

                while ($row = $getProduct->fetch_assoc()){ ?>
                    <div style=" display: flex" class="row">
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
                        <div style="margin-left: 30px" class="col-lg-4 col-md-4 col-sm-3 mt-5">
                            <h6 class="h2-title">Shop/<?php echo $row["category"]; ?></h6>
                            <h3 style="font-size: 32px" class="h2-title py-4"><?php echo $row["name"]; ?></h3>
                            <h2 class="h2-title1 mb-3" ><?php echo $row["price"]; ?> <span> &#8362;</span></h2>
                            <div style="display: flex">
                                <button id="showUpdateForm" onclick="showForm()" class="h2-title1 mt-3" style="border: none; cursor: pointer; background-color: transparent; " >
                                    <i class="ri-edit-fill"></i>
                                </button>
                                <form action="#" method="post">
                                    <input type="hidden" name="productId" value="<?php echo $row["productId"]; ?>"/>
                                    <input type="hidden" name="image" value="<?php echo $row["image"]; ?>"/>
                                    <input type="hidden" name="bgImage" value="<?php echo $row["bgImage"]; ?>"/>
                                    <input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/>
                                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>"/>
                                    <input type="hidden" name="category" value="<?php echo $row["category"]; ?>"/>
                                    <input type="hidden" name="type" value="<?php echo $row["type"]; ?>"/>
                                    <button type="submit" name="add_to_bestSeller" class="h2-title1 mt-3" style="border: none; cursor: pointer; background-color: transparent;  margin-left: 30px">
                                        <i class="fa-solid fa-add"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div style="display: none"  id="updatePriceForm" class="col-lg-2 col-md-2 col-sm-12 mt-5 text-center">
                            <h1 class="h2-title mt-5" style="font-size: 35px">Edit Price</h1>
                            <form action=" " method="post">
                                <input type="hidden" value="<?php echo $row["productId"]; ?>" name="update_price_id">
                                <div class="input-group">
                                    <input  type="text" class="priceValue"  name="update_price" style="background:none;">
                                </div>
                                <input type="submit" class="checkOutBtn" value="Update" name="update_product_price" style="margin-top: 10%; width: 100px; height: 50px; background-color:#ec5b59;color: white;border-radius: 25px ; font-size: 25px">
                            </form>
                        </div>
                    </div>
            <?php }
            }
            else{
                header('location: adminSingleProduct.php');
            }

            ?>
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
                        while ($row = mysqli_fetch_assoc($all_products) ){
                            ?>
                            <div style="display: flex; flex-direction: row; flex-wrap: wrap;" class="co">
                                <div style="color: #ec5b59" class="drink-box-wp <?php echo $row["type"]; ?>" data-cat="<?php echo $row["type"]; ?>">
                                    <div style="margin-top: 5px; background-image: url('cardsBG/<?php echo $row["bgImage"]; ?>'); " class="drink-box text-center ">
                                        <div class="drink-img">
                                            <img style="padding-top: 75px" src="Images/<?php echo $row["image"]; ?>" alt="">
                                        </div>
                                        <div class="drink-title mt-5">
                                            <a href="<?php echo "adminSingleProduct.php?productId=".$row["productId"]; ?>"><h3 class="h3-title"><?php echo $row["name"]; ?></h3></a>
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
    function showForm() {
        document.getElementById('updatePriceForm').style.display = "block";
    }
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


