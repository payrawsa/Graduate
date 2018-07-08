<html>

  <head>
    <title>Feedback Page</title>
    <link href="Professor.css" rel="stylesheet" type="text/css" />

    <?php

    function news($pageNum = 1, $pageSize = 3, $taname, $coursenum)
    {
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

      //$taname=$_POST['taname'];
      $taname=$_COOKIE['taname'];
      $coursenum=$_COOKIE['coursenum'];

      $sql = "SELECT * FROM feedback_table WHERE TA_ubit = '".$taname."' AND cid = '".$coursenum."' LIMIT ".(($pageNum-1)*$pageSize).",".$pageSize."";
      $result = $conn->query($sql);
      $row = mysqli_fetch_all($result);
      return $row;
    }

    function allNews($taname, $coursenum)
    {
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

      //$taname=$_POST['taname'];
      $taname=$_COOKIE['taname'];
      $coursenum=$_COOKIE['coursenum'];

      $sql = "SELECT * FROM feedback_table WHERE TA_ubit = '".$taname."' AND cid = '".$coursenum."'";
      $count = $conn->query($sql);
      $count=mysqli_num_rows($count);
      return $count;//return total num of rows of result
    }

    @$allNum = allNews($taname, $coursenum);
    @$pageSize = 5;//num of rows each page
    @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
    @$endPage = ceil($allNum/$pageSize);//total num of page
    @$array = news($pageNum,$pageSize, $taname, $coursenum);
    // print_r($pageNum);
    // print_r("///");
    // print_r($endPage);

    ?>

  </head>

  <body background="backpic.jpg" style="background-repeat:no-repeat;background-position:center">
    <div class="ublogo">
      <img src="ub-logo.png" />
    </div>

    <div>
    	<p class="welcome_text">Feedback List</p>
    </div>

    <table border="1" style="text-align: center" cellpadding="0" align="center">
      <tr>
          <td>TA Name</td>
          <td>Feedback</td>
          <td>TA Description</td>
          <td>Course Number</td>
          <td>Student Email</td>
          <td>Student Name</td>
      </tr>

      <?php
      foreach($array as $value){
        echo '<tr>';
          echo '<td>"'.$value[0].'"</td>';
          echo '<td>"'.$value[1].'"</td>';
          echo '<td>"'.$value[2].'"</td>';
          echo '<td>"'.$value[3].'"</td>';
          echo '<td>"'.$value[4].'"</td>';
          echo '<td>"'.$value[5].'"</td>';
        echo '</tr>';
      }
      ?>
    </table>

    <div align="center">
        <a href="?pageNum=1">First Page</a>
        <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">Last Page</a>
        <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">Next Page</a>
        <a href="?pageNum=<?php echo $endPage?>">End Page</a>
    </div>

    

  </body>

</html>