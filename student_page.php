<html>

 <head>
  <title>Students Forum</title>
  
  <link href="main.css" rel="stylesheet" type="text/css" />


 </head>


   <div class="ublogo">
      <img src="ub-logo.png" />
   </div>
   <!-- <button type="button">Professor Log In</button> -->
   <br>
   
   <?php
   require_once('index1.php');
   $courses = $conn->query('select * from Employee');
   ?>

   <select id="course-list">
   <option> Select Course:</option>


   <?php
   if($courses->num_rows > 0){
        //outputting the courses
        while($row = $courses->fetch_assoc()){
?>
        <option>
                <?php
                echo $row["cid"];
                ?>
        </option>
<?php
}
}
?>
</select>   
   

   <!-- <h3 class="twoption">Select the TA:</h3> -->
   <!-- Creating drop-down for the TA's of the courses -->
   
   <br>

   <h5>Rate the TA:</h5>
   <!-- Text box for submitting feedback-->
   <span>How satisfied are you with the TA? </span>
   <div class="rating">
<span>&#9734; </span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
</div>
   <textarea class="feedbackbox" type='text' name="textbox1" size="40" maxlength="100" rows="5" cols="40"></textarea>
   <br>
   <button type="button">Submit Feedback</button>

  
</html>
