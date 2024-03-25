<?php

session_start();

global $con;
@include 'config.php';
if(isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
}else{
    $userId = '';
}

if(isset($_POST['sendCandyTableMsg'])){

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
            echo '<script>alert("Your Message Cant Be Send!!")</script>';
        }
        else{
            $str = " ";
            $stmt = $con->prepare("INSERT INTO CandyTablesmessages (userId,name,email,number,message) VALUES(?,?,?,?,?)");
            $stmt->bind_param('sssss',$userId,$name,$email,$phone,$message);
            if($stmt->execute()){
                $id = $stmt->insert_id;
                echo '<script class="input-group">alert("Message Sent Successfully!!")</script>';
            }
            else{
                echo '<script class="input-group">alert("Something Went Wrong!!")</script>';
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
<section class="container mt-5" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 60px">
    <div >
        <div class="col-lg-12">
            <div class="sec-title text-center mb-5">
                <h1 class="h1-title mt-5 revealUp">Customized Candy Tables</h1>
            </div>
        </div>
        <div class="tt mt-5 text-center" >
            <div>
                <strong>Celebrate your special occasion with us! Whether you’re planning for a small or a large event, we will help make your event memorable and beautiful. Our candy tables range for a variety of occasions, we will work with you to create the table display of your dreams!</strong>
            </div>
        </div>
    </div>
    <div class="contact-container mt-5" >
        <div class="contact-form">
            <form action="UserCandyTables.php" method="post">
                <label for="name"></label><input class="contactInput" type="text" id="name" name="name" placeholder="Name" required>
                <label for="phone"></label><input  class="contactInput" style="margin-top: 15px"  type="text" id="phone" name="phone" placeholder="Phone Number" required>
                <label for="email"></label><input  class="contactInput" style="margin-top: 15px"  type="email" id="email" name="email" placeholder="Email" required>
                <label for="message"></label><textarea  class="contactTextArea" style="margin-top: 15px" id="message" name="message" placeholder="Message" required></textarea>
                <input class="contactButton revealUp mt-3" style=" border-radius: 20px" name="sendCandyTableMsg" value="Send" type="submit"/>
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
