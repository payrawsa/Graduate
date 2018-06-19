
<html>
<head>
	
</head>
<body>
 	<?php
 	require_once('sql_connection.php');
 	//getting the values for course_id, ubit name and feedback from student_page.php
 	$Course_ID = $_POST["course_id"];
 	$UBIT = $_POST["TA_ubit"];
 	$Feedback = $_POST["feedback"]; 

	$sql = "INSERT INTO Feedback_Table (cid,ubit,feedback) VALUES ('$Course_ID','$UBIT','$Feedback')";
 	
//executing the query

if ($conn->query($sql) === TRUE) {
    echo "New record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

	?>

</body>
</html>