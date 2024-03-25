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
}
if (isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    //echo $remove_id;
    mysqli_query($con,"Delete from `cart` where productId =$remove_id ");
    header('location:cart.php');

}
if(isset($_POST['update_product_quantity'])){
    $update_value=$_POST['update_quantity'];
    $update_id=$_POST['update_quantity_id'];
    // query
    $update_quantity_query=mysqli_query($con,"update `cart` set quantity=$update_value where userId = $userId and productId= $update_id");
    if($update_quantity_query){
        header('location:cart.php');
    }
}
$SSTotal =0;
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
                        <h1 class="h1-title mb-5 revealUp text-center">Your Cart</h1>
                    </div>
                </div>
            </div>
            <?php
            $select_cart_products=mysqli_query($con,"select * from `cart` where userId = $userId");
            $grand_total=0;
            $subtotal =0;
            if(mysqli_num_rows($select_cart_products)==0){
                echo"<div class='container mt-5 text-center pt-5 mb-5' style=' width: 100% ; height: 230px ;' > 
                        <h1 class=' h2-title'>Your Cart Is Currently Empty.</h1>
                            <a href='index.php'>
                                <button style='width: 200px; height: 50px; font-size: 20px' class='mt-4 btnSign'>Continue Shopping?</button>
                            </a>
                    </div>";
            }
            else{
                $stmt = $con->prepare("SELECT * FROM cart where userId = $userId");
                $stmt->execute();
                $cartProducts= $stmt->get_result();
            ?>
            <table class="table justify-content-end pt-5">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub Total</th>
                <th>Remove</th>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($cartProducts) ){

                    ?>
                    <tr>
                        <td class="text-center" data-label="Image" ><img style="width: 50px" src="Images/<?php echo $row["image"] ?>" alt=""></td>
                        <td style="padding-top: 40px" data-label="Name"><?php echo $row["name"] ?></td>
                        <td style="padding-top: 40px"  data-label="Price"><?php echo $row["price"] ?><span> &#8362;</span></td>
                        <td style="padding-top: 40px"  data-label="Quantity">
                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $row["productId"] ?>" name="update_quantity_id">
                                <div>
                                    <input style="width: 40px; color: #ec5b59 ; background-color: transparent; border-color: transparent" type="number" min="1" value="<?php echo $row["quantity"] ?>" name="update_quantity">
                                    <button style="color: #ec5b59 ; background-color: transparent; border-color: transparent" type="submit"  name="update_product_quantity">
                                        <i class="ri-edit-fill"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td style="padding-top: 40px" data-label="Sub Total"><?php echo $subtotal=($row['price']*$row['quantity'])?></td>
                        <td style="padding-top: 40px" >
                            <form>
                                <a href="cart.php?remove=<?php echo $row['productId'] ?>">
                                    <i class="ri-delete-bin-6-fill"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $SSTotal+= $subtotal;
                    $_SESSION['total'] = $SSTotal;
                }


                ?>
                </tbody>
            </table>

            <div class="cart_total">
                <table style="font-size: 24px; color: #ec5b59;">
                    <tr>
                        <td>Total</td>
                        <td><b><?php echo $SSTotal ?><span> &#8362;</span></b></td>
                    </tr>
                </table>
            </div>
            <div class="checkOutBtn_container">
                <form method="post" action="UserCheckOut.php">
                    <input type="submit" name="checkOutButton" value="Checkout" style="border-color: transparent; padding-top: -10px; font-size: 22px" class="btnSign text-center align-content-center">
                </form>
            </div>
            <?php
            }
            ?>
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

