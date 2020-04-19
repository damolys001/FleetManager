<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["role"];
 $selectBrand = $_SESSION["countryCustEdit"]; 
$query = "SELECT * FROM country  ";
//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM brand  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectBrand == $row["country"]) 
			{
			echo '<option selected="selected" value="'.$row["country"].'" >'.$row["country"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["country"].'" >'.$row["country"].'</option>';
			}
			
			//echo '<option value="'.$row["country"].'" >'.$row["country"].'</option>';
			
		}
	}
?>
