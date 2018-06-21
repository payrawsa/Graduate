<html>

  <head>
    <title>Login Page</title>
    <link href="Professor.css" rel="stylesheet" type="text/css" />
  </head>

  <body style="text-align:center">
    <div class="ublogo">
      <img src="ub-logo.png" />
    </div>

    <div>
    	<p class="welcome_text">Feedback</p>
    </div>

    <?php
      $coursenum=$_POST['coursenum'];
      
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

      $sql = "SELECT feedback, student_name, TA_ubit FROM Feedback_Table WHERE cid = '".$coursenum."'";
      $result = $conn->query($sql);
      //print_r($row);
//echo $result;
	if ($result->num_rows > 0) {
    // output data of each row
    		while($row = $result->fetch_assoc()) {
			echo '<hr>',"Student ", $row["student_name"], " left feedback for: ", $row["TA_ubit"],"...", '<br><br>', $row["feedback"];

    		}
	} 

    ?>

  </body>

</html>
