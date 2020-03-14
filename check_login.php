<?php


include "database.php";

/* if (isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["login"])) {

	$email=$_POST["email"];
	$password=$_POST["pass"];

	$sql = "SELECT *  FROM register_table WHERE  email = '".$email."' AND  password = '".$password."'";
	$result = $conn->query($sql);

	//echo $sql;

	$check_email='';
	$check_password='';
	//$check_id='';


	while($row = $result->fetch_assoc()) 
	{


	$check_email=$row['email'];
	$check_password=$row['password'];
	//$check_id=$row['id'];
	}

	if($email == $check_email && $password == $check_password){

		session_start();

		$_SESSION['email'] = $_POST['email'];
		//$_SESSION['id'] = $_POST['id'];		

		header('Location:welcome.php');

	
	}

	else{
		header('Location:login.php?nosaved=1');
	//echo "No match found.";
	}



} */
//$name='';

if (isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["login"])) {



	$email=$_POST["email"];
	$password=$_POST["pass"];

	$sql = "SELECT id, name  FROM register_table WHERE  email = '".$email."' AND  password = '".$password."'";
	$result = $conn->query($sql);
	

	if ($result->num_rows == 1) {


		while($row = $result->fetch_assoc()) {

			$id=$row['id'];
			$name=$row['name'];
			



		}
		session_start();

		
		$_SESSION['id'] = $id;
		//$_SESSION['name'] = $name;	
			

		header('Location:welcome.php');



	}

	else{
		header("Location:login.php?nosaved=1&email=$email");

	}
}else {
	header("Location:login.php?error=2");



}



?>