<?php

session_start();

global $con;
@include 'config.php';

if(isset($_SESSION['logged_in'])){
    header('location: UserProfile.php');
    exit;
}
// for registration
if(isset($_POST['submit'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['confirmPassword']);

    if($pass !== $cpass){
        //$error[] = "Confirm password not matched!!";
        header('location:SignUp.php?error=Confirm password not matched!!');
    }
    elseif(strlen($pass)< 8){
        //$error[] = "Password must be at least 8 characters!!";
        header('location:SignUp.php?error=Password must be at least 8 characters!!');
    }
    else{
        $stmt1 = $con->prepare(" SELECT count(*) FROM users WHERE email =? ");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if($num_rows != 0){
            $error[] = "User already exists!!";
            header('location:SignUp.php?error=User already exists!!');
        }
        else{
            $str = " ";
            $stmt = $con->prepare("INSERT INTO users (name,email,phone,password,address) VALUES(?,?,?,?,?)");
            $stmt->bind_param('sssss',$name,$email,$str,$pass,$str);
            if($stmt->execute()){
                $userId = $stmt->insert_id;
                $_SESSION['userId'] = $userId;
                $_SESSION['email']= $email;
                $_SESSION['name']= $name;
                $_SESSION['logged_in']= true;
                //$error[] = "User Added Successfully";
                header('location: UserProfile.php?signedUp=User Added Successfully');
            }
            else{
                //$error[] = "Couldn't create an account!!";
                header('location:SignUp.php?error=Could not create an account!!');
            }
        }
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
<div class="headerbox"></div>
<?php
@include 'header.php'
?>
<!--start of log-sign section-->
<div id="viewport">
    <div id="js-scroll-content">
        <section class="container_Sign" id="loginP">
            <div style=" display: flex; align-items: center; justify-content: left">
                <div class="regBox" >
                    <div class="form-slogan sign-up">
                        <form action="SignUp.php" method="post">
                            <h2 style="margin-bottom: 10px" class="h2" >Sign Up</h2>
                            <p class="error-msg text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                            <div class="input-group">
                                <input type="text" name="full_name" required placeholder="Enter ur name">
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" required placeholder="Enter ur email" >

                            </div>
                            <div class="input-group">
                                <input type="password" name="password" required placeholder="Enter password" >

                            </div>
                            <div class="input-group">
                                <input type="password" name="confirmPassword" required placeholder="Confirm password" >

                            </div>
                            <input type="submit" class="btnSign" name="submit" value="Sign Up" id="sign1">
                            <div class="signUp-link">
                                <p>Already have an account?
                                    <a href="SignIn.php" class="signInBtn-link">Sign In</a>
                                </p>

                            </div>
                        </form>
                    </div>
                </div>
                <img src="Images/c1.png" alt="" class="circle">
            </div>
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
