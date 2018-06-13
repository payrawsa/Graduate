<html>
require_once('sql_connection.php');
$courses = $conn->query('select * from Employee');
?>
<select name="course" id= "course-list">
<option> Select Course:</option>


<?php
if($courses->num_rows > 0){
        //outputting the courses
        while($row = $courses->fetch_assoc()){  ?>

        <option> <?php echo $row["cid"]; ?></option>
<?php   }
}

?>

</select>



</html>
