
<html>
<head>
	
</head>
<body>
	
 	<?php
 	require_once('sql_connection.php');
 		
 	//prepare statement to prevent sql injection

 	$stmt = $conn->prepare("INSERT INTO Feedback_Table (cid,TA_ubit,feedback,TA_description,student_email,student_name,time_stamp) VALUES (?,?,?,?,?,?,?)");
 	$stmt -> bind_param("sssssss",$Course_ID,$UBIT,$Feedback,$TA_desc,$Stu_email,$Stu_name,$Time_stamp);


 	//getting the feedback details from student_page.php
 	$Course_ID = $_POST['course_id'];
 	$UBIT = $_POST['TA_ubit'];
 	$Feedback = $_POST['feedback']; 
 	$TA_desc = $_POST['TA_descr'];
 	$Stu_email = $_POST['stu_email'];
 	$Stu_name = $_POST['stu_name']; 
 	$Time_stamp = date('Y-m-d H:i:s');
    //executing the query 	
 	$stmt->execute();

if ($stmt->affected_rows === 0) {
    echo "Your feedback has not been recorded. Please submit again.";
} else {
    echo "Your feedback has been submitted successfully. Thank You!";
}
$stmt->close();
$conn->close();

	?>
<!-- </div> -->
</body>
</html>