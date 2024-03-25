<?php
global $con, $conn;
include 'config.php';

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
            <li><a href="index.php" class="nav__link">Home</a></li>

            <li><a href="aboutUs.php" class="nav__link">About</a></li>

            <li><a href="menu.php" class="nav__link">Menu</a></li>

            <!--=============== DROPDOWN 2 ===============-->
            <li class="dropdown__item">
                <div class="nav__link">
                    Shop <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                </div>

                <ul class="dropdown__menu">
                    <li>
                        <a href="drinks.php" class="dropdown__link" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="ri-goblet-fill"></i> Drink
                        </a>
                    </li>

                    <li>
                        <a href="Dessert.php" class="dropdown__link">
                            <i class="ri-cake-3-line"></i> Dessert
                        </a>
                    </li>

                    <li>
                        <a href="IceCream.php" class="dropdown__link" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                            <i class="fa-solid fa-ice-cream"></i> IceCream
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="UserContact.php" class="nav__link">Contact</a></li>
        </ul>
    </div>
    <div class="header-right">
        <a href="UserProfile.php" class="header-btn header-user" id="header-user-btn">
            <i class="fa-solid fa-user "></i>
        </a>
        <?php
        $userId = $_SESSION['userId'] ?? '';
        $stmt_search = $con->prepare(" SELECT count(*) FROM wishList WHERE userId =? ");
        $stmt_search->bind_param('s',$userId);
        $stmt_search->execute();
        $stmt_search->bind_result($num_rows1);
        $stmt_search->store_result();
        $stmt_search->fetch();

        ?>
        <a href="wishList.php" class="header-btn header-heart">
            <i class="fa-solid fa-heart "></i>
            <span class="cart-number"><?php echo $num_rows1 ?></span>
        </a>
        <?php
        $userId = $_SESSION['userId'] ?? '';
        $stmt_search = $con->prepare(" SELECT count(*) FROM cart WHERE userId =? ");
        $stmt_search->bind_param('s',$userId);
        $stmt_search->execute();
        $stmt_search->bind_result($num_rows);
        $stmt_search->store_result();
        $stmt_search->fetch();

        ?>

        <a href="cart.php" class="header-btn header-cart">
            <i class="fa-solid fa-cart-shopping "></i>
            <span class="cart-number"><?php echo $num_rows ?></span>

        </a>

        <div class="nav__data">
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__burger"></i>
                <i class="ri-close-line nav__close"></i>
            </div>
        </div>

    </div>

</header>