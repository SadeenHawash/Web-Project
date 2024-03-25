<?php

session_start();

global $con;
@include 'config.php';

if(!isset($_SESSION['admin_logged_in'])){
    header('location: SignIn.php');
    exit;
}
$stmt = $con->prepare("SELECT * FROM orders");
$stmt->execute();
$all_users = $stmt->get_result();

if(isset($_POST['update_order_status'])){
    $update_status=$_POST['update_status'];
    $update_status_id=$_POST['update_status_id'];

    $stmt = $con->prepare("UPDATE orders SET status = ? where orderId= ?");
    $stmt->bind_param('si',$update_status, $update_status_id);
    if($stmt->execute()){
        header('location:adminViewOrders.php');
    }else{
        header('location:adminDashboard.php');
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
<div id="headerbox" class="headerbox"></div>
<?php
@include 'adminHeader.php'
?>
<!--start of log-sign section-->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="tableView mt-5 pt-5 justify-content-center" style="padding: 40px">
            <div class="mt-5">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h1 class="h1-title revealUp text-center">View Orders</h1>
                    </div>
                </div>
            </div>
            <table class="table2">
                <thead>
                <th>Order ID</th>
                <th>Order Cost</th>
                <th>Order Status</th>
                <th>Order Date</th>
                <th>User Name</th>
                <th>Phone No.</th>
                <th>Email</th>
                <th>Address</th>
                <th>View Order</th>
                </thead>
                <tbody>

                <?php
                $stmt = $con->prepare("SELECT * FROM orders");
                $stmt->execute();
                $orders= $stmt->get_result();
                while ($row = mysqli_fetch_assoc($orders) ){

                    ?>
                    <tr>
                        <td data-label="Order Id"><?php echo $row["orderId"] ?></td>
                        <td data-label="Order Cost"><?php echo $row["orderCost"] ?><span> &#8362;</span></td>
                        <td data-label="Order Status">
                            <form action="" method="post">
                                <input type="hidden" value="<?php echo $row["orderId"] ?>" name="update_status_id">
                                <div>
                                    <input style="width: 80px; color: #ec5b59 ; background-color: transparent; border-color: transparent" type="text" value="<?php echo $row["status"] ?>" name="update_status">
                                    <button style="color: #ec5b59 ; background-color: transparent; border-color: transparent" type="submit"  name="update_order_status">
                                        <i class="ri-edit-fill"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td data-label="Order Date"><?php echo $row["date"] ?></td>
                        <td data-label="Order Date"><?php echo $row["name"] ?></td>
                        <td data-label="Order Date"><?php echo $row["phone"] ?></td>
                        <td data-label="Order Date"><?php echo $row["email"] ?></td>
                        <td data-label="Order Date"><?php echo $row["address"] ?></td>
                        <td class="text-center" data-label="View Details">
                            <form action="UserOrderDetails.php" method="post">
                                <input type="hidden" value="<?php echo $row["orderId"] ?>" name="orderId">
                                <input type="submit" class="checkOutBtn text-center" style="border-color: transparent; font-size: 18px; height: 40px" name="orderDetails" value="View Order" >
                            </form>
                        </td>
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

