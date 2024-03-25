<?php

session_start();

global $con;
@include 'config.php';
$stmt3 = $con->prepare("SELECT * FROM admin_info");
$stmt3->execute();
$admin_info = $stmt3->get_result();
$row = mysqli_fetch_assoc($admin_info);
// for registration
if(isset($_POST['sendMsg'])){

    if(isset($_SESSION['logged_in'])){
        $userId = $_SESSION['userId'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone =  $_POST['phone'];
        $message =  $_POST['message'];

        $stmt1 = $con->prepare(" SELECT count(*) FROM users WHERE userId =? ");
        $stmt1->bind_param('s',$userId);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if($num_rows == 0){
            $error[] = "Your Message Can't Be Send!!";
        }
        else{
            $str = " ";
            $stmt = $con->prepare("INSERT INTO messages (userId,name,email,number,message) VALUES(?,?,?,?,?)");
            $stmt->bind_param('sssss',$userId,$name,$email,$phone,$message);
            if($stmt->execute()){
                $id = $stmt->insert_id;

                header('location: UserContact.php?signedUp=Message Sent Successfully');
            }
            else{
                //$error[] = "Couldn't create an account!!";
                header('location:UserContact.php?error=Something Went Wrong!!');
            }
        }
    }
    else{
        header('location: SignIn.php');
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
    <!-- custom css  -->
    <link rel="stylesheet" href="cssFiles/style.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Sugar Rush</title>
</head>

<body class="body-fixed">
<!-- preLoader -->
<?php
@include 'preloader.php'
?>
<!-- start of header -->
<div class="headerbox"></div>
<?php
@include 'header.php'
?>
<section class="f_contact" style="display: flex; flex-direction: column; align-items: center; margin-top: 120px">
    <h1 style="margin-top: 10px; margin-bottom: 20px" class="h1-title revealUp">Contact Us</h1>
    <p class="tt"><strong>Don't be shy, we love talking to you!</strong></p>
    <p class="tt text-center">If you'd like to get in touch to talk cake, discuss an order <br>or anything else we're a button away. The easiest way to  <br>contact us is by filling in this form, and we'll answer asap, <br>if it is a cake emergency then give us a call!</p>
</section>
<section class="align-content-center" >
    <div class="info_container" style="display: flex; align-items: center; flex-wrap: wrap; gap: 100px; padding: 10px; margin-top: 60px">
        <div style="display: flex; flex-direction: column; align-items: center">
            <h3 style="margin-bottom: 30px" class="h2-title1 revealUp">Open hours</h3>
            <p class="tt text-center"><i class="ri-time-line "></i> Sunday - Thursday<br> <?php echo $row["openingTime1"] ?></p>
            <p class="tt text-center"><i class="ri-time-line "></i> Friday - Saturday<br> <?php echo $row["openingTime2"] ?></p>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center">
            <h3 style="margin-bottom: 30px" class="h2-title1 revealUp">Our Contacts</h3>
            <p class="tt"><i class="ri-map-pin-line"></i>&nbsp;&nbsp;<?php echo $row["address"] ?></p>
            <p class="tt"><i class="ri-mail-line"></i>&nbsp;&nbsp;<?php echo $row["email"] ?></p>
            <p class="tt"><i class="ri-phone-fill"></i>&nbsp;&nbsp;<?php echo $row["phone"] ?></p>
        </div>
    </div>
</section>
<section class="align-content-center" style="display: flex; flex-direction: column; align-items: center; margin-top: 20px">
    <p style="margin-top: 50px" class="h2-title1 revealUp"><strong>Send Message</strong></p>
    <div class="contact-container" >
        <div class="contact-form">
            <form action="UserContact.php" method="post">
                <input class="contactInput" style="margin-top: 15px" type="text" id="name" name="name" placeholder="Name" required>
                <input  class="contactInput" style="margin-top: 15px"  type="text" id="phone" name="phone" placeholder="Phone Number" required>
                <input  class="contactInput" style="margin-top: 15px"  type="email" id="email" name="email" placeholder="Email" required>
                <textarea  class="contactTextArea" style="margin-top: 15px" id="message" name="message" placeholder="Message" required></textarea>
                <input class="contactButton revealUp" style=" border-radius: 20px" name="sendMsg" value="Send" type="submit"/>
            </form>
        </div>
    </div>
</section>
<!-- footer -->
<?php
@include 'footer.php'
?>

<!--=============== end of circular slider ===============-->
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
<!--=============== MAIN JS ===============-->
<script src="jsFiles/main.js"></script>

</body>
</html>