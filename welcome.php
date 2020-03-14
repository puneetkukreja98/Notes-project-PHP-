<?php
	include "database.php";
	session_start();
	$id = $_SESSION['id'];
	//$name = $_SESSION['name'];

	//session coming from like_notes.php
	//$likeduser='';
	//if (isset($_GET['likeddone']) && isset($_GET['note_id'])) {
	//	$likeduser=$_GET["name_id"];

	
	//}


	if ( ! $_SESSION['id'] ) {
		header('Location:home.php');
	}

	
	

	if (isset($_GET['erroroccur'])) {

		echo "Some error occured"."<br>";
		echo "Please submit notes again";
		
	}
	if (isset($_GET['errord'])) {
		echo "Some error occur, update again";
		# code...
	}
	if (isset($_GET['deleteerror'])) {

		echo "Some error occur, please try again";
		
	}
	$sql = "SELECT name  FROM register_table WHERE  id = '".$id."'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {


		while($row = $result->fetch_assoc()) {

			$name=$row['name'];
			



		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Welcome</title>
	<link rel="stylesheet" href="">
</head>
<style>
	.log_out{
		text-decoration: none;
		color: #ffffff;
    	background: red;
    	font-size: 25px;
    	padding:15px 10px;

	}
	.button_searched{
		margin-top: 25px;
	}
	.box{
		border: 1px solid black;
		margin: 10px 0px;

		
	}
</style>
<body>
	

<h1>Welcome <?php echo $name; ?> - <?php echo $id; ?> </h1>

<div>
	<a class="log_out" href="logout.php" title="">Logout</a>
</div>
<div>
	<form action="insert_notes.php" method=" GET">
		<textarea name="notes" rows="4" cols="50"></textarea>
		<input type="submit" name="save">
	</form>
</div>
<div>
			<?php
			/*
			include"database.php";


				$sql = "SELECT * FROM notes_inner_table WHERE user_id='".$id."'";
				$result = $conn->query($sql);

				if ($result->num_rows >= 1) { ?>
					<table class="table_one" border=1>
						<thead>
							<tr>
								<th>Id</th>
								<th>Notes</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=1;
							    while($row = $result->fetch_assoc()) {
							        echo "<tr>";

							        echo "<td> " . $i ."</td>" ;
							        echo "<td> " . $row["notes"] ."</td>";
							        echo "<td> <a href='edit_notes.php?note_id={$row["id"]}'>Edit</a> </td>";
							        echo "<td> <a href='delete_notes.php?note_id={$row["id"]}'>Delete</a> </td>";
							        
							        echo "</tr>";
							        $i++;
							    }
								?>
						</tbody>
					</table>

							<?php
				}else {
				    echo " ";
				}
				*/


				

				
			
			
			
			?>
	
	
</div>

<div class="button_searched">
	<form action="search_user.php" method="GET">
      <input type="text" placeholder="Search.." name="search">
      <input type="submit" name="button_search" value="Submit">
    </form>
</div>
<div>
	
	<div>
		<?php
		$sql ="SELECT * FROM liked_user_new WHERE user_id='".$id."' ";
		$result = $conn->query($sql);
		$likeduser = '';
		//$userid='';
		if ($result->num_rows >= 1) {

			while($row = $result->fetch_assoc()) {

				$likeduser = $row['liked_user'];
				//$userid = $row['user_id'];
			}


		}
		$myArray = json_decode( $likeduser );
		if ( !is_array( $myArray ) ) {
			$myArray = [];
		}
		array_push( $myArray, $id );
		//$likeduser .= $id;
		//echo "<h2>" . $likeduser . "</h2>";
		//echo "<h2>" . $userid . "</h2>";
		//print_r($myArray);
		$json = join(',', $myArray );
		//echo "$json";

	
		$sql = "SELECT register_table.name,notes_inner_table.notes,notes_inner_table.user_id,notes_inner_table.id
		FROM register_table
		INNER JOIN
		notes_inner_table
		ON register_table.id=notes_inner_table.user_id
		WHERE notes_inner_table.user_id IN ($json)";
		$result = $conn->query($sql);
		//echo $sql;

		//print_r($result);
		//echo $sql;
		if ($result->num_rows>=1) {
			while ($row = $result->fetch_assoc()) {
				$name=$row['name'];
				$notes=$row['notes'];
				$userid=$row['user_id']; ?>
				<div class="box">
					<div><?php
						echo "<h3>" . $name . "</h3>";
						echo "<p>" . $notes . "</p>"; ?>
					</div> <?php 
					if ($id == $userid) { ?>
						<div>
							<?php echo "<p> <a href='edit_notes.php?note_id={$row["id"]}'>Edit</a> " . " <a href='delete_notes.php?note_id={$row["id"]}'>Delete</a>";    ?>
						</div>
						<?php 
					}
				echo '</div>';
							
				

			}
			
		}
		




		?>
	</div>
</div>


	
</body>
</html>