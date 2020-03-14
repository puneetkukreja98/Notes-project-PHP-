<?php

include "database.php";
session_start();
$id = $_SESSION['id'];


if (isset($_GET["name_id"])) {

	$likeduser = $_GET["name_id"];
	$liked='';
	$sql = "SELECT liked_user FROM liked_user_new WHERE user_id = '".$id."' ";
	$result = $conn->query($sql);

	if ($result->num_rows == 1){
		while($row = $result->fetch_assoc()) {

			$liked = $row['liked_user'];
		}

		$myArray = json_decode( $liked );

		if ( !is_array( $myArray ) ) {
			$myArray = [];
		}
		array_push( $myArray, $likeduser );

		$json = json_encode( $myArray );
		//print_r($json);

		$sql = " UPDATE liked_user_new SET liked_user = '$json'  WHERE user_id = '".$id."' "; 
		$result = $conn->query($sql);
		header("Location:welcome.php");
		//print_r($sql);
	}elseif ($result->num_rows == 0) {
		$json = json_encode( array( $likeduser ) );
		//print_r($json);

		$sql ="INSERT INTO liked_user_new (user_id,liked_user) VALUES ('$id','$json' )";
		//print_r($sql);
		$result = $conn->query($sql);
		header("Location:welcome.php");
		# code...
	}
}



/* if (isset($_GET["name_id"])){

	$likeduser=$_GET["name_id"];
	$sql = "INSERT INTO liked_user_one_table (user_id,liked_user) VALUES ('$id','$likeduser' )";
	if ($conn->query($sql) === TRUE) {

		//session_start();
		//$likeduser = $_SESSION["name_id"];
		//$id = $_SESSION["id"];

    	header("Location:welcome.php?likeddone=1&$likeduser");
    	
} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}

	



} */

//if (isset($_GET["note_id"])){

	//$likeduser=$_GET["note_id"];


 //	if ($likeduser !="") {

 	//	$sql = "SELECT * FROM liked_user_one_table where liked_user='".$likeduser."'";
 	//	$result = $conn->query($sql);

 	//	if ($result->num_rows >= 1){

 			//echo "email already exists";
 		//}

 		//else {

 		//	$sql = "INSERT INTO liked_user_one_table (user_id,liked_user) VALUES ('$id','$likeduser' )";

 		//	if ($conn->query($sql) === TRUE) {
    	//	header("Location:welcome.php?likeddone=1&note_id=$likeduser");

		//} else {
    	//	echo "Error: " . $sql . "<br>" . $conn->error;
	//	}

		 	


 		//}
 //	}
 //} else {
 //	header("Location:welcome.php?error=1");	
 //}




?>