
<html>
<head>
	<title>TA Feedback</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="main.css" rel="stylesheet" type="text/css" />
	<script src="dropdown_menu_disable.js"></script>

</head><?php include "sql_connection.php"; ?>

<script>
function getTA(val){
	//ajax call to pass cid to get_TAs
	$.ajax({
		type : "POST",
		url: "get_TAs.php",
		data: 'cid=' +val,
		success: function(data){
			$("#TA_list").html(data);
		}
	});
}
// function showMsg(){

// }

</script>


<body>
	<div class="ublogo">
		<img src="ub-logo.png" />
	</div>

	<br>
		<label>Course:</label>
		<!--this.value will pass the cid to the function-->
		<select id='course_list' onChange="getTA(this.value);check();">
			<option value="Select Course:">Select Course:</option>
			<?php
			$sql = "SELECT * from Employee";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc()){
				?>
				<option value="<?php echo $row["cid"]; ?>"><?php echo $row["cid"]; ?></option>
				<?php
			}
			?>
		</select>
		<label>TA:</label>
		<select id='TA_list' disabled>
			<option value="">Select TA:</option>

		</select>


		<br>

		<h5>Rate the TA:</h5>
		<!-- Text box for submitting feedback-->
		<span>How satisfied are you with the TA? </span>
		<div class="rating">
			<span>&#9734; </span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
		</div>
		<textarea class="feedbackbox" type='text' name="textbox1" size="40" maxlength="100" rows="5" cols="40"></textarea>
		<br><br>
		<!--<button value="submit" onClick="return showMsg();">Submit</button> -->
		<button value="submit">Submit</button>

</body>
</html>
