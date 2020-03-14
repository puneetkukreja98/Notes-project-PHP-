<?php

if(isset($_GET["save"])){
	echo "email already exist";
}
$name ='';
if (isset($_GET["name"])) {
	$name=$_GET["name"];
	
}
$email = '';
if (isset($_GET["email"])) {
	$email = $_GET["email"];
	# code...
}
if( isset( $_GET[ "error" ] ) ) {
				echo "Some error occured"."<br>";
				echo "Please try again";
			}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="insert_user.php" method="POST">
		<label for="name">Enter name:</label><br>
  		<input type="text" id="name" name="name" value="<?php echo $name  ?>" required><br>
		<label for="email">Email id:</label><br>
		<input type="email" id="email" name="email" value="<?php echo $email  ?>" required><br><br>
		<label for="pass"> Create Password:</label><br>
		<input type="password" id="pass" name="pass" value="" required><br><br>
		<input type="submit" name="register" value="Submit">
	</form>
	
</body>
</html>

