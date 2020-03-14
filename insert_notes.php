<?php
session_start();
$id = $_SESSION['id'];

include "database.php";


if (isset($_GET["notes"]) && isset($_GET["save"]) ) {

	$notes = $_GET["notes"];

	$sql = "INSERT INTO notes_inner_table (notes,user_id) VALUES ('$notes','$id' )";


		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("Location:welcome.php?savedis=3");
}else {
	header("Location:welcome.php?erroroccur=1");

}





?>