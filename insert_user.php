<?php

include "database.php";

 /* if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["register"])) {

	$name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["pass"];


	$sql = "INSERT INTO register_table (name, email, password) VALUES ('$name', '$email', '$password')";


		if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
	}


	header("Location:home.php?saved=1");
	
}
else {
	echo "Error in inserting data.";
} */

 if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["register"])){

 	$name = $_POST["name"];
 	$email = $_POST["email"];
 	$password = $_POST["pass"];


 	if ($email !="") {

 		$sql = "SELECT * FROM register_table where email='".$email."'";
 		$result = $conn->query($sql);

 		if ($result->num_rows >= 1){

 			//echo "email already exists";
 			header("Location:register.php?save=2&name=$name&email=$email");
 		}

 		else {

 			$sql = "INSERT INTO register_table (name, email, password) VALUES ('$name', '$email', '$password')";

 			if ($conn->query($sql) === TRUE) {
    		echo "New record created successfully";

		} else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		 	header("Location:home.php?saved=1");


 		}
 	}
 } else {
 	header("Location:register.php?error=1");	
 }





?>