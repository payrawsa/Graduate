<html>

  <head>
    <title>Course Page</title>
    <link href="Professor.css" rel="stylesheet" type="text/css" />
    <!--<script src="jquery.min.js"></script>
    <script src="LoginPage.js"></script>-->
  </head>

  <body>
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
    $ubit=$_POST['username'];
    
    $servername = "tethys.cse.buffalo.edu";
    $username = "szhang53";
    $password = "Zs944900!";
    $dbname= "cse442_542_2018_summer_team01_db";
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";

    $sql = "SELECT cid FROM professor_table WHERE ubit = '".$ubit."'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_all($result);
    //print_r($row);
    // echo '<form action="TaPage.php" method="post">';
    echo '<form action="FeedbackPage.php" method="post">';
    echo '<a class="select" id="select">';
    echo '<select name="coursenum">';
      foreach($row as $coursenum){
        foreach($coursenum as $num){
          echo '<option value="'.$num.'">'.$num.'</option>';
        }
      }
    echo '</select>';
    echo '</a>';
    echo '</br>';
    echo '<input class="login_button" type="submit" id="btn_login" value="Confirm"/>';
    echo '</form>';

    ?>

  </body>

</html>