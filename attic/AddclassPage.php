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

    $newcoursenum=$_POST['newcoursenum'];
    $ubit=$_COOKIE['ubit'];

    $sql="INSERT INTO professor_table(ubit, cid) VALUES ('".$ubit."','".$newcoursenum."')";
    $conn->query($sql);
	echo"<script>alert('Successfully Add a Course!');history.back();</script>";
	//??auto refresh after go back??

?>