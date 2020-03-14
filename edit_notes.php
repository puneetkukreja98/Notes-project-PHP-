
		
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php

	include "database.php";
	$notes='';

	if (isset($_GET["note_id"])) {
		$id = $_GET["note_id"];
		$sql="SELECT * FROM notes_inner_table WHERE id = $id";
		$result = $conn->query($sql);

		// echo $sql;
		// print_r($result);

		if ($result->num_rows ==1) {
			while($row = $result->fetch_assoc()) {
				       $notes=$row["notes"];
				       // print_r($row);
				    }

		}

	}
	else {
		echo "Some Error occured.";
	}

	 ?>
	 <form action="update_notes.php" method="GET">
		<label> Edit Notes: </label>
		<textarea name="notes" rows="10" cols="80"><?php echo $notes; ?></textarea>
		<input type="hidden" name="id" value="<?php echo $id  ?>">
		<input type="submit" name="update">
	</form>
	
	
</body>
</html>