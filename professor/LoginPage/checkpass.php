<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Login Page</title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body background="backpic.jpg" style="background-repeat:no-repeat;background-position:center">
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
        <!--<form class="login100-form validate-form flex-sb flex-w">-->
          <span class="login100-form-title p-b-53">
            Sign In
          </span>

          <!--<a href="#" class="btn-face m-b-20">
            <i class="fa fa-facebook-official"></i>
            Facebook
          </a>

          <a href="#" class="btn-google m-b-20">
            <img src="images/icons/icon-google.png" alt="GOOGLE">
            Google
          </a>-->
          
          <!--<form action="CoursePage.php" method="post" id="login"></form>-->
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Username
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Username is required">
            <!--<input class="input100" type="text" name="username" form="login">-->
            <input class="input100" type="text" id="username">
            <span class="focus-input100"></span>
          </div>
          
          <div class="p-t-13 p-b-9">
            <span class="txt1">
              Password
            </span>

            <!--<a href="#" class="txt2 bo1 m-l-5">
              Forgot?
            </a>-->
          </div>
          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <!--<input class="input100" type="password" name="password" form="login" >-->
            <input class="input100" type="password" id="password1">
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <!--<button class="login100-form-btn" type="submit" form="login">-->
            <button class="login100-form-btn" id="button1" type="button">
              Sign In
            </button>
          </div>

          <div class="w-full text-center p-t-55">
            <span class="txt2">
              Not a member?
            </span>

            <a href="NewSignupPage.html" class="txt2 bo1">
              Sign up now
            </a>
          </div>
        <!--</form>-->
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>

<?php
    
    include 'dbconnect.php';

    $ubit=$_POST['username'];
    $password=$_POST['password'];
    setcookie('ubit',$ubit);
    $sql = "SELECT salt FROM login_info_table WHERE ubit = '".$ubit."'";
    $result_salt = $conn->query($sql);
        while($row = $result_salt->fetch_assoc()) {
      $salt= $row["salt"];
        }
    $password_en=sha1($password.$salt);//input password encrept
    $sql = "SELECT password FROM login_info_table WHERE ubit = '".$ubit."'";
    $result_password = $conn->query($sql);
        while($row = $result_password->fetch_assoc()) {
      $password_or= $row["password"];
        }
    $length= strlen($password);
    if(substr_compare($password_or,$password_en, 0 , $length)){
      echo"<script>alert('Wrong Password!'); history.back();</script>";
    }else{
      header("Location:index.php");
    }
?>

</body>
</html>