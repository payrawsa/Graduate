  <?php
  $servername = "tethys.cse.buffalo.edu";
  $username = "payrawsa";
  $password = "Graduates";
  // $dbname = "test";
  $dbname= "cse442_542_2018_summer_team01_db"; 	
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  ?>
