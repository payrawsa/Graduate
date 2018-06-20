<html>

<body>
<?php
//to include the file for connection

require_once('sql_connection.php');
$query = "SELECT * FROM TA_table where cid='".$_POST["cid"]."'";

$result = $conn->query($query);

?>

<option value=""> Select TA :</option>
<option value="unknown">Don't Know</option>
<?php
  while($rs = $result->fetch_assoc()){
  	?>
  	<option value="<?php echo $rs['ubit'];?>"><?php echo $rs['name'];?></option>

  	<?php
  }
  ?>



</body>
</html>