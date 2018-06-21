
<html>
<head>
	<title>TA Feedback</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="main.css" rel="stylesheet" type="text/css" />
	<script src="dropdown_menu_disable.js"></script>
<style type ="text/css" >
   .footer{
       position: fixed;
       text-align: center;
       bottom: 0px;
       width: 100%;
   }
</style>

</head><?php include "sql_connection.php"; ?>
<div class = "footer">

<p> This is a webpage created in an effort to report the student's opinion about the performance of an individual TA </p>

</div>


<body>
	<div class="ublogo">
		<img src="ub-logo.png" />
	</div>

	<br>

<h1 style='text-align: center';> Ta Feedback Form </h1>

<hr>
		<label>Select the Course:</label>
		<!--this.value will pass the cid to the function-->
		<select id='course_list' onChange="getTA(this.value);check();" name="course_id">
			<!-- <option value="Select Course:">Select Course:</option> -->
			<option value="">Select Course:</option>
			<?php
			$sql = "SELECT * from TA_table";
			$result = $conn->query($sql);
			while($row=$result->fetch_assoc()){
				?>
				<option value="<?php echo $row["cid"]; ?>"><?php echo $row["cid"]; ?></option>
				<?php
			}
			?>
		</select>
<br><br>
		<label>Select the TA:</label>
		<select id='TA_list' disabled name="TA_ubit">
			<option value="">Select TA:</option>

		</select>


		<h3>Rate the TA:</h3>
		<!-- Text box for submitting feedback-->
		<span>How satisfied are you with the TA? </span>
		<div class="container">
		  <div class="row">
		    <div class="col-xs-12">
		        <p class="page-header">1 is bad, 10 is excellent (i.e., "How was your experience with the TA?")</p>
		        <div class="chart-scale">
		          <button class="btn btn-scale btn-scale-desc-1">1</button>
		          <button class="btn btn-scale btn-scale-desc-2">2</button>
		          <button class="btn btn-scale btn-scale-desc-3">3</button>
		          <button class="btn btn-scale btn-scale-desc-4">4</button>
		          <button class="btn btn-scale btn-scale-desc-5">5</button>
		          <button class="btn btn-scale btn-scale-desc-6">6</button>
		          <button class="btn btn-scale btn-scale-desc-7">7</button>
		          <button class="btn btn-scale btn-scale-desc-8">8</button>
		          <button class="btn btn-scale btn-scale-desc-9">9</button>
		          <button class="btn btn-scale btn-scale-desc-10">10</button>
		</div>
		      </div>
		    </div>
		</div>
<br>
              	<label>Please provide feedback:</label>

		<br>
		<textarea class="feedbackbox" type='text' name="feedback" size="40" maxlength="100" rows="5" cols="40"></textarea>
		<br>Do you want to be contacted?
		<input type="checkbox" name="contact" value="contactback" id="contact_checkbox" onclick="checkbox_clicked()">
		<br><br>
		<div id="contact_info" style="display:none">
			Name: <input type="text" size="34" name="stu_name"><br><br>
            Email: <input type="text" size="34" name="stu_email">
		<br><br>
		</div>
	<form action="feedback_submit.php" method="post" onsubmit="return validateForm()" name="myForm">
		
		<!--<button value="submit" onClick="return showMsg();">Submit</button> -->
		<button value="submit" >Submit</button>
	</form>
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

$("#TA_list").change(function(){
	//console.log($(this).val());
    if($(this).val() == 'unknown'){
      $("#TA_desc").show();
    }else{
      $("#TA_desc").hide();
      document.getElementById('TA_val').style.display = "none";
    }

});


function checkbox_clicked(){
	var checkBox = document.getElementById("contact_checkbox");
	var contactInfo = document.getElementById("contact_info");
	if(checkBox.checked == true){
		contactInfo.style.display = "block";

	}
	else{
		contactInfo.style.display = "none";
	}
}

function validateForm(){
	var ubit = document.forms["myForm"]["TA_ubit"].value ;
	var feedback = document.forms["myForm"]["feedback"].value; 
	var ta_desc = document.forms["myForm"]["TA_descr"].value;
	var checkBox = document.getElementById("contact_checkbox");
	var stud_name = document.forms["myForm"]["stu_name"].value
	var stud_val = document.forms["myForm"]["stu_value"].value 
	// if(ubit == "" || feedback == "" || (ubit == "unknown" && ta_desc == "") || (checkBox.checked == true && (stud_name == "" || stud_val == ""))){
	if(ubit == "" || feedback == "" || ta_desc == ""){
		alert("Please fill out all the values");
		return false;
	}
}
// 	if(ubit == "unknown"){
// 		if(ta_desc == ""){
// 			alert("Please fill out TA description");
// 			return false;
// 		}
// 	}
// 	if(checkBox.checked == true){
// 		if(stud_name == "" || stud_val == ""){
// 			alert("Please fill out your the contact details");
// 			return false;
// 		}

// }
// }

</script>
</body>
</html>
