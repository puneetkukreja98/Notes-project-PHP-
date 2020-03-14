<?php


include "database.php";
$id='';
 if (isset($_GET['note_id'])) {
	$id = $_GET['note_id'];
	

	$sql = "DELETE FROM notes_inner_table WHERE id = $id";
	$result = $conn->query($sql);

	header("Location:welcome.php");
}
else{
	header("Location:welcome.php?deleteerror=6");
}

?>