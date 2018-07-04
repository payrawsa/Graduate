<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="viewport" content="width=device-width">
  <title>TA Feedback Review</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="UI-layout.css" rel="stylesheet">
  

  <link data-require="bootstrap-css" data-semver="3.3.6" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <!-- <script data-require="angular.js@1.4.x" src="https://code.angularjs.org/1.4.9/angular.js" data-semver="1.4.9"></script> -->
  <!-- <script data-require="angular.js@1.4.xanimate" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0/angular-animate.js" data-semver="1.4.9"></script> -->
  <!-- <script data-require="angular.js@1.4.xMsg" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0/angular-messages.js" data-semver="1.4.9"></script> -->
  <!-- <script data-require="angularRoute@14" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.0/angular-route.js" ></script> -->
  <script data-require="jquery" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <script data-require="bootstrap" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
  
  

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
          <!-- <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle" style="  background: #e4e4e4; color:black; padding-top: 10px">Toggle Menu</a>
 -->
          <div class="col">
            <h1 style="text-align:center; color:white; font:38px/1.1 Georgia,serif">Course Management</h1> </div>
        </div>
      </div>
    </div>


  <?php

   //Getting the ubit id from the login page  
   session_start();     
   $ubit=$_SESSION['ubit'];
  
  // echo "professor is $ubit";

  //Preparing the select query
  
  $selectSQL = "SELECT * FROM professor_table where ubit = '".$ubit."'";
 

  $result = $conn->query($selectSQL);
  if (!$result) {
  die ('SQL Error: ' . mysqli_error($conn));
  }
    
  
  ?>
  <table class="table table-bordered table-hover" style="margin: 20px">
  <thead  class="thead-light">
    <tr>
      
      <th scope="col">Course</th>
      <th scope="col">Status</th> 
      
    </tr>
  </thead>
  <tbody>
<?php
   while ($row = $result->fetch_assoc()) {

    //$C_id = $row["cid"];
    echo '<tr>
    <td>'.$row['cid'].'</td>';
    ?>
    <!-- <td>
        <button class="btn btn-primary" type="submit">Available</button>
      </td> -->
      <td>
        <div>
          
          <input id="toggle-one" type="checkbox"  data-toggle="toggle" data-on="Yes" data-off="No" >

        </div>
      </td>
      
      <?php
    echo '<tr>';
  } ?>



    </tbody>
  </table>

  </div>
  <!-- <script src="jquery.min.js"></script> -->
  <!-- <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script> -->
  <script type="text/javascript">
    $('#toggle-one').bootstrapToggle();
  </script>>
  
</body>

</html>
