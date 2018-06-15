  <?php
  $servername = "tethys.cse.buffalo.edu";
  $username = "payrawsa";
  $password = "Graduates";
  $dbname= "test";
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  ?>
