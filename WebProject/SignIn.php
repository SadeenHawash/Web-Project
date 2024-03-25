<?php

session_start();

global $con;
@include 'config.php';

if (isset($_SESSION['logged_in'])){
    header('location: UserProfile.php');
    exit;
}
$userId = $_SESSION['userId'] ?? '';

// for Sign in
if(isset($_POST['SignIn_btn'])){

    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    if($email === "sugarrush0cakeshop@gmail.com" and $pass === "6ebe76c9fb411be97b3b0d48b791a7c9"){
        $_SESSION['admin_logged_in'] = true;
        header('location: adminDashboard.php?signedIn=Signed In Successfully');
    }
    else{
        $stmt = $con->prepare("SELECT userId,name,email,phone,password,address FROM users WHERE email = ? and password = ? LIMIT 1");
        $stmt->bind_param('ss', $email,$pass);
        if($stmt->execute()){
            $stmt->bind_result($userId, $name,$email,$number,$password,$address);
            $stmt->store_result();

            if($stmt->num_rows() == 1){
                $stmt->fetch();
                $_SESSION['userId'] = $userId;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['number'] = $number;
                $_SESSION['password'] = $password;
                $_SESSION['address'] = $address;
                $_SESSION['logged_in'] = true;

                //$error[] = "Signed In Successfully";
                header('location: UserProfile.php?signedIn=Signed In Successfully');
            }
        }
        else{
            $error[] = "Something Went Wrong!!";
            header('location: SignIn.php?error=Something Went Wrong!!');
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
<div id="headerbox" class="headerbox"></div>
<?php
@include 'header.php'
?>
<!--start of log-sign section-->
<div id="viewport">
  <div id="js-scroll-content">
    <section class="container_Sign" id="loginP">
      <div style=" display: flex; align-items: center; justify-content: left">
        <div class="regBox">
          <div class="form-slogan sign-in" id="signin">
            <form method="post" action="SignIn.php">
              <h2 style="margin-bottom: 10px" class="h2">Sign In</h2>
                <p class="error-msg text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
              <div class="input-group">
                <input type="text" name="email" required placeholder="Enter ur email" >
              </div>
              <div class="input-group">
                <input type="password" name="password" required placeholder="Enter password" >
              </div>
              <input type="submit" class="btnSign" name="SignIn_btn" value="Sign In" >
              <div class="signUp-link">
                <p>Don't have an account ?
                  <a href="SignUp.php" class="signUpBtn-link">Sign Up</a>
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