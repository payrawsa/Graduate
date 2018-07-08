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

    $coursenum=$_POST['coursenum'];
    $ubit=$_COOKIE['ubit'];

    $sql="DELETE FROM professor_table WHERE ubit='".$ubit."' AND cid='".$coursenum."'";
    $conn->query($sql);
	echo"<script>alert('Successfully Drop a Course!');history.back();</script>";
	//??auto refresh after go back??

?>