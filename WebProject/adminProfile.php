<?php

session_start();

global $con;
@include 'config.php';

if(!isset($_SESSION['admin_logged_in'])){
    header('location: SignIn.php');
    exit;
}
$stmt3 = $con->prepare("SELECT * FROM admin_info");
$stmt3->execute();
$admin_info = $stmt3->get_result();
$row = mysqli_fetch_assoc($admin_info);

if(isset($_GET['SignOut'])){
    if(isset($_SESSION['admin_logged_in'])){
        unset($_SESSION['admin_logged_in']);
        unset($_SESSION['name']);
        unset($_SESSION['number']);
        unset($_SESSION['email']);
        unset($_SESSION['address']);
        header('location: SignIn.php');
        exit;

    }
}
if(isset($_POST['change_password'])){

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $row['email'];
    if($password !== $confirmPassword){
        header('location:adminProfile.php?error=Confirm password not matched!!');
    }
    if(strlen($password)< 8){
        header('location:adminProfile.php?error=Password must be at least 8 characters!!');
    }
    else{
        $password = md5($password);
        $stmt = $con ->prepare(" UPDATE admin_info SET password=? WHERE email=? ");
        $stmt->bind_param('ss', $password, $email);
        if($stmt->execute()){
            header('location:adminProfile.php?passUpdate=Password Has Been Updated Successfully');
        }
        else{
            header('location:adminProfile.php?passFail=Could Not Update Password!!');
        }
    }

}
if(isset($_POST['updateInfoBtn'])){
    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];
    $new_address = $_POST['new_address'];
    $new_open1 = $_POST['new_open1'];
    $new_open2 = $_POST['new_open2'];
    $id = $row['id'];
    $stmt = $con ->prepare(" UPDATE admin_info SET name=? ,email=? , phone=? 
                   , address=? , openingTime1 =? ,openingTime2=?
                  where id= ?");
    $stmt->bind_param('ssssssi', $new_name, $new_email,$new_phone,$new_address,$new_open1,$new_open2,$id);
    if($stmt->execute()){
        header('location:adminProfile.php?UpdateInfo=Information Has Been Updated Successfully');
    }
    else{
        header('location:adminProfile.php?UpdateInfoFail=Could Not Update information!!');
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
        <section class="mt-5 pt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <h2 class="h1-title mt-5 revealUp">Admin Profile</h2>
                    </div>
                </div>
            </div>
            <p class="error-msg text-center "><?php if(isset($_GET['signedIn'])){ echo $_GET['signedIn'];} ?></p>
            <p class="error-msg text-center "><?php if(isset($_GET['signedUp'])){ echo $_GET['signedUp'];} ?></p>
            <div class="container">
                <div style=" display: flex; flex-wrap: wrap; justify-content: center; align-content: center; " class="profileContainer" >
                    <div>
                        <div class="contact_box text-center">
                            <div style="display: flex; gap: 10px;">
                                <div class="h4-title"><i class="fa-solid fa-user "></i></div>
                                <h4 class="h4-title"><?php echo $row["name"] ?></h4>
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <div class="h4-title"><i class="ri-phone-fill"></i></div>
                                <h4 class="h4-title"><?php echo $row["phone"] ?></h4>
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <div class="h4-title"><i class="ri-mail-line"></i></div>
                                <h4 class="h4-title"><?php echo $row["email"] ?></h4>
                            </div>
                            <div style="display: flex; gap: 10px;">
                                <div class="h4-title"><i class="ri-map-pin-line"></i></div>
                                <h4 class="h4-title"><?php echo $row["address"] ?></h4>
                            </div>
                            <a href="#update_infoForm">
                                <button style="margin-top: 20px;" class="btnSign">Update Info</button>
                            </a>
                            <div><a href="UserProfile.php?SignOut=1" style="font-size: 24px; color: #ec5b59; font-weight: bold;">Sign Out</a></div>
                        </div>
                    </div>
                    <div>
                        <form method="post" action="adminProfile.php">
                            <div class="contact_box text-center">
                                <p class="error-msg text-center"><?php if(isset($_GET['passFail'])){ echo $_GET['passFail'];} ?></p>
                                <p class="error-msg text-center"><?php if(isset($_GET['passUpdate'])){ echo $_GET['passUpdate'];} ?></p>
                                <p class="error-msg text-center"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                                <h2 class="changePasswordTitle text-center revealUp">Change Password</h2>
                                <div class="input-group">
                                    <input type="password" name="password" required placeholder="Enter password" >
                                </div>
                                <div class="input-group">
                                    <input type="password" name="confirmPassword" required placeholder="Confirm password" >
                                </div>
                                <input style="width: 150px" type="submit" class="btnSign" name="change_password" value="Change Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="update_infoForm" class="section mt-3 pt-5 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center ">
                        <h2 class="h2-title">Update Info</h2>
                    </div>
                </div>
            </div>
            <p class="error-msg text-center "><?php if(isset($_GET['UpdateInfo'])){ echo $_GET['UpdateInfo'];} ?></p>
            <div class="container">
                <div style=" display: flex; flex-wrap: wrap; justify-content: center; align-content: center; " class="profileContainer" >
                    <div>
                        <form class="text-center" method="post" action="adminProfile.php" >
                            <div class="contact_box">
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title"><i class="fa-solid fa-user "></i></div>
                                    <input type="text" name="new_name" value="<?php echo $row["name"] ?>" class="h4-title profileTextBox">
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title"><i class="ri-phone-fill"></i></div>
                                    <input type="text" name="new_phone" value="<?php echo $row["phone"] ?>" class="h4-title profileTextBox">
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title"><i class="ri-mail-line"></i></div>
                                    <input type="email" name="new_email" value="<?php echo $row["email"] ?>" class="h4-title profileTextBox">
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title"><i class="ri-map-pin-line"></i></div>
                                    <input type="text" name="new_address" value="<?php echo $row["address"] ?>" class="h4-title profileTextBox">
                                </div>
                                <div style="display: flex; gap: 10px">
                                    <div class="h4-title "><i class="ri-time-line "></i></div>
                                    <div style="display: flex; gap: 10px">
                                        <div class="h4-title"><p>Sunday - Thursday</p></div>
                                        <input type="text" style="width: 120px" name="new_open1" value="<?php echo $row["openingTime1"] ?>" class="h4-title profileTextBox">
                                    </div>
                                </div>
                                <div style="display: flex; gap: 10px;">
                                    <div class="h4-title "><i class="ri-time-line "></i></div>
                                    <div style="display: flex; gap: 10px">
                                        <div class="h4-title"><p>Friday - Saturday</p></div>
                                        <input type="text" style="width: 120px" name="new_open2" value="<?php echo $row["openingTime2"] ?>" class="h4-title profileTextBox">
                                    </div>
                                </div>
                                <input style="margin-top: 20px;" type="submit" class="btnSign" name="updateInfoBtn" value="Update Info" >
                            </div>
                        </form>
                    </div>
                </div>
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
