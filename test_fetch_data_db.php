<html>

<?php
require_once('index1.php');
$courses = $conn->query('select * from Employee');
?>

<select>
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



</html>
