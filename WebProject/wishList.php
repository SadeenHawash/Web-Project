<?php

session_start();

global $con;
@include 'config.php';

if(!isset($_SESSION['logged_in'])){
    header('location: SignIn.php');
    exit;
}
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}else{
    header('location: SignIn.php');
    exit;
}
if (isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    //echo $remove_id;
    mysqli_query($con,"Delete from `wishList` where productId =$remove_id ");
    header('location:wishList.php');

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
    <link rel="stylesheet" href="cssFiles/style.css">
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
<!--start of log-sign section-->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="tableView mt-5 pt-5 justify-content-center" style="padding: 40px">
            <div class="mt-5">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h1 class="h1-title revealUp text-center">Your Wish List</h1>
                    </div>
                </div>
            </div>
            <table style="" class="table justify-content-end">
                <?php
                $select_wishList_products=mysqli_query($con,"select * from `wishList` where userId = $userId");
                if(mysqli_num_rows($select_wishList_products)==0){
                    echo"<div class='container mt-5 text-center pt-5 mb-5' style=' width: 100% ; height: 230px ;' > 
                        <h1 class=' h2-title'>Your Wish List Is Currently Empty.</h1>
                            <a href='index.php'>
                                <button style='width: 200px; height: 50px; font-size: 20px' class='mt-4 btnSign'>Continue Shopping?</button>
                            </a>
                    </div>";
                }
                else{
                    $stmt = $con->prepare("SELECT * FROM wishList where userId = $userId");
                    $stmt->execute();
                    $wishProducts= $stmt->get_result();

                ?>
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Add to cart</th>
                <th>Remove</th>
                </thead>
                <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($wishProducts) ){
                    ?>
                    <tr>
                        <td class="text-center" data-label="Image" ><img style="width: 50px" src="Images/<?php echo $row["image"] ?>" alt=""></td>
                        <td style="padding-top: 40px"  data-label="Name"><?php echo $row["name"] ?></td>
                        <td style="padding-top: 40px"  data-label="Price"><?php echo $row["price"] ?></td>
                        <td style="padding-top: 40px"  data-label="Add to cart">
                            <a href="singleProduct.php?productId=<?php echo $row["productId"];?>">
                                <i class="fa-solid fa-cart-shopping card-btn "></i>
                                <button  style="background-color: transparent; border: transparent; margin-right: 0">
                                </button>
                            </a>
                        </td>
                        <td style="padding-top: 40px" >
                            <form>
                                <a href="wishList.php?remove=<?php echo $row['productId'] ?>">
                                    <i class="ri-delete-bin-6-fill"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                }
                ?>
                </tbody>
            </table>
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
<!-- gsap  -->
<script src="assets/js/gsap.min.js"></script>
<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll trigger  -->
<script src="assets/js/ScrollTrigger.min.js"></script>
<!-- scroll to plugin  -->
<script src="assets/js/ScrollToPlugin.min.js"></script>
<!-- smooth scroll  -->
<script src="assets/js/smooth-scroll.js"></script>
<script src="jsFiles/main.js"></script>
</body>
</html>


