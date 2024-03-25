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
if(isset($_POST['orderDetails']) && isset($_POST['orderId'])){
    $orderId = $_POST['orderId'];

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
                        <h1 class="h1-title revealUp text-center">Order Details</h1>
                    </div>
                </div>
            </div>
            <table style="" class="table justify-content-end">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                </thead>
                <tbody>

                <?php
                $stmt = $con->prepare("SELECT * FROM order_items where orderId = $orderId");
                $stmt->execute();
                $orderItems= $stmt->get_result();
                while ($row = mysqli_fetch_assoc($orderItems) ){?>
                    <tr>
                        <td class="text-center" data-label="Image" ><img style="width: 50px" src="Images/<?php echo $row["image"] ?>" alt=""></td>
                        <td data-label="Name"><?php echo $row["name"] ?></td>
                        <td data-label="Price"><?php echo $row["price"] ?><span> &#8362;</span></td>
                        <td data-label="Quantity"><?php echo $row["quantity"] ?></td>
                    </tr>
                    <?php
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


