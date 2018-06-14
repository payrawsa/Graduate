<html>

<head>
  <title>TA Feedback</title>

  <link href="main.css" rel="stylesheet" type="text/css" />
  <script src="dropdown_menu_disable.js"></script>


</head>

<div class="ublogo">
  <img src="ub-logo.png" />
</div>

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

<br>
<select id="TA_List" <?php if (1==0){?>"javascript:off()"<?php; } else {?> "javascript:off()" <?php ;}?>>


  <option> Select TA:</option>


  <?php
  mysqli_data_seek($courses,0);
  if($courses->num_rows > 0){
    //outputting the courses
    while($row = $courses->fetch_assoc()){
      ?>
      <option>
        <?php
        echo $row["TA"];
        ?>
      </option>
      <?php
    }
  }
  ?>
</select>

<br>

<h5>Rate the TA:</h5>
<!-- Text box for submitting feedback-->
<span>How satisfied are you with the TA? </span>
<div class="rating">
  <span>&#9734; </span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
</div>
<textarea class="feedbackbox" type='text' name="textbox1" size="40" maxlength="100" rows="5" cols="40"></textarea>
<br><br>
<button type="button">Submit Feedback</button>


</html>
