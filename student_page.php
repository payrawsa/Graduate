<html lang="en">
    <head>
        <title>TA Feedback Form</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
        <script src="dropdown_menu_disable.js"></script>

    </head>
    <!-- new code -->
    <?php include "sql_connection.php"; ?>
    <!-- new code -->

    <body >
        <div class="container">
            <div class="imagebg"></div>
            <div class="row " style="margin-top: 50px">
                <div >
                            <div class="col-sm-12 form-group">

                    <h1 style="color:white; text-align:center">TA Feedback Form</h2> 
</div>
                    <form action="feedback_submit.php" method="post" onsubmit="return validateForm()" name="myForm">
                        <div class="row">
                            <div class="col-sm-12 formgroup">
                                <!-- this is new code -->
<hr>
                                <label style="font-weight:bold; color:white">Select the Course:</label>
                                <!--this.value will pass the cid to the function-->
                                <select id='course_list' onChange="getTA(this.value);check();" name="course_id">
                                    <!-- <option value="Select Course:">Select Course:</option> -->
                                    <option value="">Select Course:</option>
                                    <?php
                                    $sql = "SELECT * from TA_table";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row["cid"]; ?>"><?php echo $row["cid"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <br> <br>
                                <label style="font-weight:bold; color:white">Select the TA:</label>
                                <select id='TA_list' disabled name="TA_ubit">
                                    <option value="">Select TA:</option>

                                </select>
                                <br>
                                <div id="TA_desc">
                                    <br>
                                    <label style="color:white">Describe the TA:</label>
                                    <br>
                                <textarea class="form-control" type="textarea" name="TA_descr" id="comments" placeholder="Describe how the TA looks" maxlength="6000" rows="2"></textarea>
                                </div>
<hr>
                                <label style="color:white">How do you rate your overall experience?</label>
                                <p>
                                <p style="color:white">1 is bad, 10 is excellent</p>
                                <div class="chart-scale">
                                    <button class="btn btn-scale btn-scale-desc-1" type='button' value=1>1</button>
                                    <button class="btn btn-scale btn-scale-desc-2"type='button' value=2>2</button>
                                    <button class="btn btn-scale btn-scale-desc-3"type='button'value=3>3</button>
                                    <button class="btn btn-scale btn-scale-desc-4"type='button'value=4>4</button>
                                    <button class="btn btn-scale btn-scale-desc-5"type='button'value=5>5</button>
                                    <button class="btn btn-scale btn-scale-desc-6"type='button'value=6>6</button>
                                    <button class="btn btn-scale btn-scale-desc-7"type='button'value=7>7</button>
                                    <button class="btn btn-scale btn-scale-desc-8"type='button'value=8>8</button>
                                    <button class="btn btn-scale btn-scale-desc-9"type='button'value=9>9</button>
                                    <button class="btn btn-scale btn-scale-desc-10"type='button'value=10>10</button>
                                </div>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments" style="color:white"> Feedback:</label>
                                <textarea class="form-control" type="textarea" name="feedback" id="comments" placeholder="Please give your feedback" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        
							<!-- <textarea class="feedbackbox" type='text' name="feedback" size="40" maxlength="100" rows="5" cols="40"></textarea> -->
							<div class="col-sm-12 form-group">
							<br>Do you want to be contacted?
							<input type="checkbox" name="contact" value="contactback" id="contact_checkbox" onclick="checkbox_clicked()">
							</div>
							<br><br>
                        <div class="row" id="contact_info" style="display:none">
                            <div class="col-sm-6 form-group" style="color:white">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="stu_name" >
                            </div>
                            <div class="col-sm-6 form-group" style="color:white">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="stu_email" >
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 form-group"> 
                                <button type="submit" class="btn btn-lg btn-warning btn-block" value="submit">Submit </button>
                            </div>
                        </div> 
                    </form>
                    <!-- <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Your feedback has been submitted successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry! There was an error with your submission. Please try again. </div>
                </div>
            </div> -->
        </div>
        <script>
            function getTA(val) {
                //ajax call to pass cid to get_TAs
                $.ajax({
                    type: "POST",
                    url: "get_TAs.php",
                    data: 'cid=' + val,
                    success: function (data) {
                        $("#TA_list").html(data);
                    }
                });
            }

            $("#TA_list").change(function () {
                //console.log($(this).val());
                if ($(this).val() == 'unknown') {
                    $("#TA_desc").show();
                } else {
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


            function validateForm() {
                var ubit = document.forms["myForm"]["TA_ubit"].value;
                var feedback = document.forms["myForm"]["feedback"].value;
                var ta_desc = document.forms["myForm"]["TA_descr"].value;
                var checkBox = document.getElementById("contact_checkbox");
                var stud_name = document.forms["myForm"]["stu_name"].value
                var stud_val = document.forms["myForm"]["stu_email"].value
                //Display error message when the required fields are not keyed in the TA feedback page
                if (ubit == "" || feedback == "" || (ubit == "unknown" && ta_desc == "") || (checkBox.checked == true && (stud_name == "" || stud_val == ""))) {
                    alert("Please fill out all the given fields");
                    return false;
                }
            }


        </script>
    </body>
</html>