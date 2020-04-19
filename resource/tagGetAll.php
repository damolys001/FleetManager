<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["role"];
$query = "SELECT * FROM tag  ";
//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM brand  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo '<option value="'.$row["id"].'" >'.$row["tag"].'</option>';
		}
	}
?>
