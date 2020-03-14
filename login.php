<?php

$email ='';
if (isset($_GET['email'])) {
	$email=$_GET['email'];
	
}
if (isset($_GET['error'])) {
	echo "Some error occured"."<br>";
	echo "Please login again";
	# code...
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div>
		<h1>Login form</h1>
	</div>
	<form action="check_login.php" method="POST">
		<label for="email">Email id:</label><br>
		<input type="email" id="email" name="email" value="<?php echo $email  ?>"><br><br>
		<label for="pass"> Enter Password:</label><br>
		<input type="password" id="pass" name="pass" value=""><br><br>
		<input type="submit" name="login" value="Submit">


	</form>
	<div>
		<?php
			if( isset( $_GET[ "nosaved" ] ) ) {
				echo "No email or password match"."<br>";
				echo "Or you should register first";
			}


		?>
	</div>
	
	
</body>
</html>