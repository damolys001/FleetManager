<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["role"];
$selectorder_status ="";
if(isset ($_SESSION['order_status'])) {$selectorder_status = $_SESSION['order_status'];}
  
$query = "SELECT * FROM order_status  ";
//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM order_status  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectorder_status == $row["order_status"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["order_status"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["order_status"].'" >'.$row["order_status"].'</option>';
			}
		}
	}
?>
