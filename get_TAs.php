<html>

<body>
<?php
//to include the file for connection
//include "index1.php";
require_once('index1.php');
$query = "SELECT * FROM Employee where cid='".$_POST["cid"]."'";

$result = $conn->query($query);

?>

<option value=""> Select TA :</option>
<?php
  while($rs = $result->fetch_assoc()){
  	?>
  	<option value=""><?php echo $rs['TA'];?></option>

  	<?php
  }

?>
</body>
</html>