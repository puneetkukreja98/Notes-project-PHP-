<?php
include"database.php";
session_start();
$id = $_SESSION['id'];

if (isset($_GET["search"]) && isset($_GET["button_search"])) {

	$name=$_GET["search"];
	$sql="SELECT name,id FROM register_table WHERE name LIKE '%$name%'";
	$result = $conn->query($sql);

	$already_like = [];
	$sql="SELECT liked_user FROM liked_user_new WHERE  user_id='".$id."'"; 
	$result_one= $conn->query($sql);

	if ($result_one->num_rows == 1) {
		while($row = $result_one->fetch_assoc()){
			$json = $row['liked_user'];
		}
		$already_like = json_decode( $json );

	}
	
				if ($result->num_rows >= 1) { ?>
					<table class="table_one_one" border=1>
						<thead>
							<tr>
								<th>id</th>
								<th>Names</th>
								<th>Likes</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=1;
							    while($row = $result->fetch_assoc()) {
							    	$u_id = $row["id"];
							    	$like_td = '';
							        echo "<tr>";

							        echo "<td> " . $i ."</td>" ;
							        echo "<td> " . $row["name"] ."</td>" ;

							        // foreach ($already_like as $key => $value) {
							        	if ($u_id == $value) {
							        		$like_td = "<td> <a href='liked_notes.php?name_id={$row["id"]}'>Liked</a> </td>";

							        	}
							        	else
							        	{
							        		$like_td = "<td> <a href='like_notes.php?name_id={$row["id"]}'>Like</a> </td>";
							        	}
							        // }

							        echo $like_td;
							        //echo "<td> <a href='like_notes.php?name_id={$row["id"]}'>Like</a> </td>";



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

}
				?>

							





