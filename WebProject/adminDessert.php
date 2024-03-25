<?php
global $con;
include 'config.php';


if(isset($_POST['add_product'])){
    $p_name = $_POST['p_name'];
    $type = $_POST['p_type'];
    $price = $_POST['p_price'];
    $image = $_FILES['p_image']['name'];
    $image_temp_name = $_FILES['p_image']['tmp_name'];
    $image_folder = 'Images/'.$image;

    $stmt_search = $con->prepare(" SELECT count(*) FROM products WHERE name =? ");
    $stmt_search->bind_param('s',$p_name);
    $stmt_search->execute();
    $stmt_search->bind_result($num_rows);
    $stmt_search->store_result();
    $stmt_search->fetch();

    if($num_rows != 0){
        $error[] = "Product already Added!!";
        header('location: adminDessert.php?error = Product already In Products!!');
    }
    else{
        $str = "Dessert";
        $str1 = " ";
        $stmt = $con->prepare("INSERT INTO products (name,category,type,price,image,bgImage) VALUES(?,?,?,?,?,?)" );
        $stmt1 = $con->prepare("INSERT INTO newproducts (productId,name,category,type,price,image,bgImage) VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssss',$p_name,$str,$type,$price,$image,$str1);
        $stmt1->bind_param('sssssss',$productId,$p_name,$str,$type,$price,$image,$str1);
        if($stmt->execute()){
            move_uploaded_file($image_temp_name,$image_folder);
            header('location: adminDessert.php?error=Product Added Successfully');
        }
        if($stmt1->execute()){
            move_uploaded_file($image_temp_name,$image_folder);
            //header('location: adminDessert.php?error=Product Added Successfully');
        }
        else{
            header('location: adminDessert.php?error=Could not add product!!');
        }
    }
}

if (isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    //echo $remove_id;
    mysqli_query($con,"Delete from `products` where productId =$remove_id ");
    header('location:adminDessert.php');

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
@include 'adminHeader.php'
?>
<div id="viewport">
    <div id="js-scroll-content">
        <!-- start of view cake -->
        <section class="drinksMenu section repeat-img mt-5" >
            <div class="sec_wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center ">
                                <h1 style="font-size: 60px" class="h1-title mt-5">Unique Creations For Unique Occasions</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center ">
                                <h2 class="h2-title mb-5 mt-5">Donuts</h2>
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
                                                    <div style="display: flex">
                                                        <form>
                                                            <a style="margin-right: 10px" href="adminDessert.php?remove=<?php echo $row['productId'] ?>">
                                                                <i class="ri-delete-bin-6-fill"></i>
                                                            </a>
                                                        </form>
                                                        <a href="adminSingleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="ri-edit-fill"></i>
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
                            $stmt2 = $con->prepare("SELECT * FROM products WHERE type = 'Cupcakes'");
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
                                                    <div style="display: flex">
                                                        <form>
                                                            <a style="margin-right: 10px" href="adminDessert.php?remove=<?php echo $row['productId'] ?>">
                                                                <i class="ri-delete-bin-6-fill"></i>
                                                            </a>
                                                        </form>
                                                        <a href="adminSingleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="ri-edit-fill"></i>
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
                            $stmt = $con->prepare("SELECT * FROM products WHERE type = 'Cakes' or type = 'BirthdayCakes' or type = 'WeddingCakes' or type = 'OtherEvents' ");
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
                                                    <div style="display: flex">
                                                        <form >
                                                            <a style="margin-right: 10px" href="adminDessert.php?remove=<?php echo $row['productId'] ?>">
                                                                <i class="ri-delete-bin-6-fill"></i>
                                                            </a>
                                                        </form>
                                                        <a href="adminSingleProduct.php?productId=<?php echo $row["productId"];?>">
                                                            <i class="ri-edit-fill"></i>
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
        <section class="container">
            <div style=" display: flex; align-items: center; justify-content: left">
                <div class="container text-center" >
                    <div class="form-slogan">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h2 style="margin-bottom: 10px" class="h2-title" >New Dessert ?</h2>
                            <p class="error-msg text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                            <div class="input-group">
                                <input type="text" name="p_name" required placeholder="Product name">
                            </div>
                            <div>
                                <h4 style="color: #ec5b59;" class=" text-center">Cakes - Birthday Cakes - Wedding Cakes<br>
                                    Other Events - Cupcakes - Donut</h4>
                            </div>
                            <div class="input-group">
                                <input type="text" name="p_type" required placeholder="Product type">
                            </div>
                            <div class="input-group">
                                <input type="text" name="p_price" required placeholder="Product price" >
                            </div>
                            <div class="input-group">
                                <input type="file" name="p_image" placeholder="Product image" required accept="image/png, image/jpg, image/jpeg, image/webp" >
                            </div>
                            <input type="submit" class="btnSign text-center" name="add_product" value="Add Product">
                        </form>
                    </div>
                </div>
            </div>
        </section>
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

