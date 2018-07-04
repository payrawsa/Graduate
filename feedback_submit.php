<html>
<head>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="main.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="form.css" >
</head>
<body>
	
 	<?php
 	require_once('sql_connection.php');?>

 	<div class="container">
    <div class="imagebg"></div>
    <div class="row " style="margin-top: 50px">
      <div >
        <div class="col-sm-12 form-group">

 	<?php	
 	//prepare statement to prevent sql injection
 	$stmt = $conn->prepare("INSERT INTO Feedback_Table (cid,TA_ubit,feedback,TA_description,student_email,student_name,time_stamp) VALUES (?,?,?,?,?,?,?)");
 	$stmt -> bind_param("sssssss",$Course_ID,$UBIT,$Feedback,$TA_desc,$Stu_email,$Stu_name,$Time_stamp);
 	//getting the feedback details from student_page.php
 	//real_escape_string() used to escape special characters
 	$Course_ID = $conn->real_escape_string($_POST['course_id']);
 	$UBIT = $conn->real_escape_string($_POST['TA_ubit']);
 	$Feedback = $conn->real_escape_string($_POST['feedback']); 
 	$TA_desc = $conn->real_escape_string($_POST['TA_descr']);
 	$Stu_email = $conn->real_escape_string($_POST['stu_email']);
 	$Stu_name = $conn->real_escape_string($_POST['stu_name']); 
 	$Time_stamp = date('Y-m-d H:i:s');
    //executing the query 	
 	$stmt->execute();
if ($stmt->affected_rows === 0) {
    echo "<font color='white' size='50' face='Arial'><center>Your feedback has not been recorded. Please submit again.</center>";
} else {
    echo "<font color='white' size='50' face='Arial'><center>Your feedback has been submitted successfully. Thank You!</center>";
}
$stmt->close();
$conn->close();
	?>
<!-- </div> -->
</body>
</html>