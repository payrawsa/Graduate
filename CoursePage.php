<html>

  <head>
    <title>Course Page</title>
    <link href="Professor.css" rel="stylesheet" type="text/css" />
    <!--<script src="jquery.min.js"></script>
    <script src="LoginPage.js"></script>-->
  </head>

  <body background="backpic.jpg" style="background-repeat:no-repeat;background-position:center">
    <div class="ublogo">
      <img src="ub-logo.png" />
    </div>

    <div>
    	<p class="welcome_text">Course List</p>
    </div>

    <!--<div>
      <a href="TA1.html">CSE586</a>
      <a href="TA2.html">CSE708</a>
    </div>-->

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "Zs944900!";
    $dbname= "cse442_542_2018_summer_team01_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $ubit=$_POST['username'];
    $password=$_POST['password'];

    setcookie('ubit',$ubit);

    $sql = "SELECT salt FROM login_info_table WHERE ubit = '".$ubit."'";
    $result_salt = $conn->query($sql);
    $result_salt = mysqli_fetch_all($result_salt);
    foreach($result_salt as $mid){
          foreach($mid as $salt){
            $salt=$salt;
          }
        }
    $password_en=sha1($password.$salt);//input password encrept

    $sql = "SELECT password FROM login_info_table WHERE ubit = '".$ubit."'";
    $result_password = $conn->query($sql);
    $result_password = mysqli_fetch_all($result_password);
    foreach($result_password as $mid1){
          foreach($mid1 as $password_or){
            $password_or=$password_or;
          }
        }

    if($password_en==$password_or){
      $sql = "SELECT cid FROM professor_table WHERE ubit = '".$ubit."'";
      $result = $conn->query($sql);
      $row = mysqli_fetch_all($result);
      //print_r($row);

      echo '<table width="100%" align="center">';
      echo '<tr>';
      echo '<th width="33%" style="float: left;margin: 0px;padding: 0px;">';
      // echo '<form action="TaPage.php" method="post">';
      echo '<form action="TaPage.php" method="post">';
      echo '<select name="coursenum">';
        foreach($row as $coursenum){
          foreach($coursenum as $num){
            echo '<option value="'.$num.'">'.$num.'</option>';
          }
        }
      echo '</select>';
      echo '</br>';
      echo '<input class="view_button" type="submit" id="btn_login" value="View"/>'; 
      //echo '<input class="dropclass_button" type="button" id="btn_login" value="Drop Class"/>';
      echo '</form>';
      echo '</th>';

      echo '<th width="33%" style="float: left;margin: 0px;padding: 0px;">';
      echo '<form action="AddclassPage.php" method="post">';
      echo '<label class="label_input_addclass">Course#:&nbsp</label><input class="text_input_addclass" type="text" name="newcoursenum"/>';
      echo '</br>';
      echo '<input class="addclass_button" type="submit" id="btn_login" value="Add Class"/>';
      echo '</form>';
      echo '</th>';

      echo '<th width="33%" style="float: left;margin: 0px;padding: 0px;">';
      echo '<form action="DropclassPage.php" method="post">';
      echo '<select name="coursenum">';
        foreach($row as $coursenum){
          foreach($coursenum as $num){
            echo '<option value="'.$num.'">'.$num.'</option>';
          }
        }
      echo '</select>';
      echo '</br>';
      //echo '<input class="view_button" type="submit" id="btn_login" value="View"/>'; 
      echo '<input class="dropclass_button" type="submit" id="btn_login" value="Drop Class"/>';
      echo '</form>';
      echo '</th>';
      echo '</tr>';
      echo '</table>';
      
    }else{
      echo"<script>alert('Wrong Password!');history.back();</script>";
      // print_r($salt);
      // print("////");
      // print_r($password_or);
      // print("////");
      // print_r($password_en);
      // print("////");
      // print_r($password);
    }
    //??log out?? user name??
    ?>

  </body>

</html>