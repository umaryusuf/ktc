<?php
include_once 'connection.php';

$rowCount = count($_POST["students"]);
for($i=0;$i<$rowCount;$i++) {
	mysqli_query($dbc, "DELETE FROM students_info WHERE student_id='" . $_POST["students"][$i] . "'");
	mysqli_query($dbc, "DELETE FROM parent_info WHERE student_id='" . $_POST["students"][$i] . "'");
}
header("Location:admin.php");
?>