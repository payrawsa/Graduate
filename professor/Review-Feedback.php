<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width">
  <title>Instructor Dashboard</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="UI-layout.css" rel="stylesheet">
  <link href="button.css" rel="stylesheet" type="text/css" />

</head>
    <!--<?php include "../sql_connection.php"; ?>-->

<body>
    <div class="imagebg"></div>

  <div id="wrapper">

    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a href="#">
            Main Menu
                    </a>
        </li>
        <img src="bulls.jpg" width="100%" height="100%" style="bottom:0;">

        <li>
          <a href="index.php">Dashboard</a>
        </li>
        <li>
          <a href="Manage-Courses.php">Manage Courses</a>
        </li>
        <li>
          <a href="Review-Feedback.php">Review Feedback</a>
        </li>
        <li>
          <a href="TA-Progress.php">TA Progress Overview</a>
        </li>
      </ul>
    </div>
    <div id="page-content-wrapper" style="   background:#001A33;">
      <div class=container>
        <div class=row>
          <!--<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="  background: #e4e4e4; color:black; padding-top: 10px">Toggle Menu</a>-->

          <div class="col">
            <h1 style="text-align:center; color:white; font:38px/1.1 Georgia,serif">Instructor Feedback Review</h1> 
          </div>
          
        </div>
      </div>


    </div>
      <div style="text-align:center">
          <input class="first_button" type="submit" id="btn_login" value="CSE000"/></br>
          <input class="login_button" type="submit" id="btn_login" value="CSE111"/></br>
          <input class="login_button" type="submit" id="btn_login" value="CSE222"/></br>
          <input class="login_button" type="submit" id="btn_login" value="CSE333"/></br>
      </div></br>

<?php
//     $ubit=$_POST['username'];
//     $password=$_POST['password'];
//     setcookie('ubit',$ubit);
//     $sql = "SELECT salt FROM login_info_table WHERE ubit = '".$ubit."'";
//     $result_salt = $conn->query($sql);
//     		while($row = $result_salt->fetch_assoc()) {
// 			$salt= $row["salt"];
//     		}
//     $password_en=sha1($password.$salt);//input password encrept
//     $sql = "SELECT password FROM login_info_table WHERE ubit = '".$ubit."'";
//     $result_password = $conn->query($sql);
//     		while($row = $result_password->fetch_assoc()) {
// 			$password_or= $row["password"];
//     		}
// $length= strlen($password);
// if(substr_compare($password_or,$password_en, 0 , $length)){
// echo
// "<script>alert('Wrong Password!'); history.back();</script>";
//     }
?>



  </div>
  <script src="jquery.min.js"></script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>

</html>