
<html>
<head>
	<title>TA Feedback</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="main.css" rel="stylesheet" type="text/css" />
	<script src="dropdown_menu_disable.js"></script>

</head><?php include "sql_connection.php"; ?>




<body>
	<div class="ublogo">
		<img src="ub-logo.png" />
	</div>

	<br>
	<form action="feedback_submit.php" method="post" onsubmit="return validateForm()" name="myForm">
		<label>Course:</label>
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
		<label>TA:</label>
		<select id='TA_list' disabled name="TA_ubit">
			<option value="">Select TA:</option>

		</select>


		<br>
		<div id="TA_desc">
			<br>
		<label>Describe the TA:</label>
		<br>
		<textarea class="feedbackbox" type='text' name="TA_descr" size="40" maxlength="100" rows="5" cols="40" id="TA_val"></textarea>  
	    </div>
		<br>

		<h5>Rate the TA:</h5>
		<!-- Text box for submitting feedback-->
		<span>How satisfied are you with the TA? </span>
		<div class="rating">
			<span>&#9734; </span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
		</div>
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
      //document.getElementById('TA_val').style.display = "none";
     document.getElementById('TA_val').value = ""; 
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
	// var checkBox1 = document.getElementById("contact_checkbox");
	// var stud_name = document.forms["myForm"]["stu_name"].value;
	// var stud_val = document.forms["myForm"]["stu_value"].value ;
	
	if(ubit == "" || feedback == ""){
		alert("Please fill out all the values");
		return false;
	}

	if(ubit == "unknown"){
		if(ta_desc == ""){
			alert("Please fill out TA description");
			return false;
		}
	}
}

// 	if(checkBox1.checked == true){
// 		if(stud_name == "" || stud_val == ""){
// 			alert("Please fill out your the contact details");
// 			return false;
// 		}

// }
//  }

</script>
</body>
</html>
