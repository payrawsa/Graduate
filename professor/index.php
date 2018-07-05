<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width">
  <title>TA Feedback Review</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="UI-layout.css" rel="stylesheet">


</head>
    <?php include "../sql_connection.php"; ?>

<body>
<div class="imagebg"> </div>

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
       <!--   <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="  background: #e4e4e4; color:black; padding-top: 10px">Toggle Menu</a>
-->
          <div class="col">
            <h1 style="text-align:center; color:white; font:38px/1.1 Georgia,serif">Dashboard</h1> </div>
        </div>
      </div>
    </div>
    <div class="col align-self-center" style="padding-top: 20px">
<table class="table table-dark" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course</th>
      <th scope="col">TA Name/Description</th>
      <th scope="col">Rating</th>
      <th scope="col">Feedback</th>
      <th scope="col">Date/Time</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>CSE586</td>
      <td>Anton Fischer</td>
      <td>10</td>
      <td>Not Applicable</td>
      <td>7/3/2018 8:00AM</td>

    </tr>
    <tr>
      <th scope="row">2</th>
      <td>CSE474/574</td>
      <td> 4 pm tuesday office hour.... He had Red Hair</td>
      <td>1</td>
      <td>I hate this TA. Instead of clarifying my doubts, he kept on flirting with me asking about dinner dates and my availability. I can't believe he is even allowed to be a TA. I came for help not to be harassed.
      </td>
      <td>7/1/2018 4:46PM</td>

    </tr>

    <tr>
      <th scope="row">3</th>
      <td>CSE474/574	</td>
      <td>James Smith</td>
      <td>3</td>
      <td>He was able to answer my questions but he was acting very superior like I was stupid or something... not cool.
      He was very rude to me and ignoring.</td>
      
      <td>7/1/2018 4:10PM </td>

    </tr>
  </tbody>
</table>
</div>



<?php
session_start();
    $ubit=$_POST['username'];
    $password=$_POST['password'];
$_SESSION['ubit'] = $ubit;
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
echo
"<script>alert('Wrong Password!'); history.back();</script>";
    }
?>


  </div>
  <script src="jquery.min.js"></script>
<!--

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
-->
</body>

</html>
