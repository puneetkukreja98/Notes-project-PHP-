<?php
session_start();
	
	if (  isset($_SESSION['id']) ) {
		header('Location:welcome.php');
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome to Home</title>
	<link rel="stylesheet" href="home_style.css">
</head>
<body>

	

	<h1>Welcome To My Website.</h1>
	<div class="user_form">
		<a href="register.php" class="register" target="_blank">Register</a>
		<a href="login.php" class="login" target="_blank">Login</a>
	</div>
	<div class="regis_succ">
		<?php
			if( isset( $_GET[ "saved" ] ) ) {
				echo "Registeration successfully done"."<br>";
				echo "You can login now";
			}


		?>
		
	</div>

	
</body>
</html>