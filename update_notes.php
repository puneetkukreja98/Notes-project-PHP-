<?php


include "database.php";

$notes='';
$id='';
if (isset($_GET['update']) && isset($_GET['notes']) && isset($_GET['id']) ) {
	$notes = $_GET["notes"];
	$id = $_GET["id"];

	$sql = "UPDATE notes_inner_table SET notes='$notes' WHERE id = $id";
	$result = $conn->query($sql);
	//echo $sql;
	//print_r($result);

	header("Location:welcome.php");
}
else{
	header("Location:welcome.php?errord=1");

}


	









?>