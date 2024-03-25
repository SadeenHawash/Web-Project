<?php

include 'config.php';
global $con;
$stmt3 = $con->prepare("SELECT * FROM admin_info");
$stmt3->execute();
$admin_info = $stmt3->get_result();
$row = mysqli_fetch_assoc($admin_info);
?>

<!-- footer start  -->
<footer style="color: #ec5b59; margin-top: 50px;" class="site-footer" id="contact">
    <div class="top-footer section">
        <div class="sec-wp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-info">
                            <div class="footer-logo revealUp">
                                <a href="index.php">
                                    <img style="width: 250px; height: 100px;" src="logo.png" alt="">
                                </a>
                            </div>
                            <p class="revealUp">Follow us on social media</p>
                            <div class="social-icon">
                                <a href="#"><i class="ri-instagram-line revealUp"></i></a>
                                <a href="#"><i class="ri-facebook-circle-line revealUp"></i></a>
                                <a href="#"><i class="ri-twitter-line revealUp"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="footer-flex-box">
                            <div class="footer-table-info">
                                <h3 class="h3-title revealUp">Open hours</h3>
                                <ul>
                                    <li class="revealUp"><i class="ri-time-line"></i> Sun-Thu: <?php echo $row["openingTime1"] ?></li>
                                    <li class="revealUp"><i class="ri-time-line"></i> Fri-Sat: <?php echo $row["openingTime2"] ?></li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <h3 class="h3-title revealUp">Links</h3>
                                <ul class="column-2">
                                    <li class="revealUp"><a href="index.php">Home</a></li>
                                    <li class="revealUp"><a href="aboutUs.php">About</a></li>
                                    <li class="revealUp"><a href="menu.php">Menu</a></li>
                                    <li class="revealUp"><a href="#">Shop</a></li>
                                    <li class="revealUp"><a href="UserContact.php">Contact</a></li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <h3 class="h3-title revealUp">Company</h3>
                                <ul>
                                    <li class="revealUp"><a href="TermsAndConditions.php">Terms & Conditions</a></li>
                                    <li class="revealUp"><a href="privacyPolicy.php">Privacy Policy</a></li>
                                    <li class="revealUp"><a href="#">Cookie Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2023 <span class="name">Sugar Rush. </span>All Rights Reserved.</p>
                    </div>
                </div>
            </div>
            <button class="scrolltop"><i class="ri-arrow-up-s-line"></i></button>
        </div>
    </div>
</footer>
