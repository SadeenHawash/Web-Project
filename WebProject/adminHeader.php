<?php
global $con, $conn;
include 'config.php';

session_start();

if(isset($message)){
    foreach($message as $message){
        echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}

?>


<header id="header" class="header">
    <div class="col-lg-2">
        <div class="header-logo">
            <a href="index.php">
                <img style=" width: 190px; height: 90px" src="logo.png" alt="Logo">
            </a>
        </div>
    </div>

    <!--=============== NAV MENU ===============-->
    <div style="padding-top: 20px " class="nav__menu" id="nav-menu">
        <ul class="nav__list ">
            <li><a href="adminDashboard.php" class="nav__link">Dashboard</a></li>

            <li><a href="adminBestSeller.php" class="nav__link">Best Seller</a></li>

            <li><a href="adminNewProducts.php" class="nav__link">New Products</a></li>

            <!--=============== DROPDOWN 2 ===============-->
            <li class="dropdown__item">
                <div class="nav__link">
                    Products <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>

                <ul class="dropdown__menu">
                    <li>
                        <a href="adminDrinks.php" class="dropdown__link" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="ri-goblet-fill"></i> Drink
                        </a>
                    </li>

                    <li>
                        <a href="adminDessert.php" class="dropdown__link">
                            <i class="ri-cake-3-line"></i> Dessert
                        </a>
                    </li>

                    <li>
                        <a href="adminIceCream.php" class="dropdown__link" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <i class="fa-solid fa-ice-cream"></i> IceCream
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <?php
    $select_messages=mysqli_query($con,"select * from `messages`") or die ('query failed');
    $row_count_messages=mysqli_num_rows( $select_messages);

    $select_orders=mysqli_query($con,"select * from `orders`") or die ('query failed');
    $row_count_orders=mysqli_num_rows( $select_orders);

    $select_users=mysqli_query($con,"select * from `users`") or die ('query failed');
    $row_count_users=mysqli_num_rows( $select_users);

    ?>
    <div class="header-right">
        <a href="adminProfile.php" class="header-btn header-user">
            <i class="fa-solid fa-user "></i>
        </a>
        <a href="adminViewCustomers.php" class="header-btn header-user" id="header-user-btn">
            <img style="width: 75%" src="adminImages/multiple-users-silhouette.png" alt="">
            <span class="cart-number"><?php echo $row_count_users ?></span>
        </a>
        <a href="adminViewMessages.php" class="header-btn">
            <img style="width: 70%;" src="adminImages/email.png" alt="">
            <span class="cart-number"><?php echo $row_count_messages ?></span>
        </a>
        <a href="adminViewOrders.php" class="header-btn header-heart">
            <img style="width: 70%" src="adminImages/delivery-box.png" alt="">
            <span class="cart-number"><?php echo $row_count_orders ?></span>
        </a>
        <div class="nav__data">
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__burger"></i>
                <i class="ri-close-line nav__close"></i>
            </div>
        </div>

    </div>

</header>
