<!-- 
<html>

<body> -->



<?php
require_once('sql_connection.php');


// $sql = "INSERT INTO TA_table (cid,name,ubit)
// VALUES ('CSE421/521','Farshad Ghanei','f1@buffalo.edu'),
// ('CSE442/542','Andrew Gabriel','a1@buffalo.edu')";

// $sql = "INSERT INTO Feedback_Table (cid,name,ubit)
// VALUES ('CSE421/521','Farshad Ghanei','f1@buffalo.edu'),
// ('CSE442/542','Andrew Gabriel','a1@buffalo.edu')";

// $sql = "INSERT INTO TA_table (cid,name,ubit)
// VALUES ('CSE586','Anton Fischer','anton1'),
// ('CSE587','Deen Dayal','deen1'),
// ('CSE708','John Oliver','joliver1')";

// $sql = "INSERT INTO professor_table (cid,ubit)
// VALUES ('CSE474/574','varun1')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>
<!-- </body>
</html> -->
