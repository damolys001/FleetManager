<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$roleid = $_SESSION["role"];
$productid = $_GET["id"];
$_SESSION["productid"] = $productid ;
$query = "SELECT * FROM product WHERE id = '$productid' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["price"];
		}
	}
/* disconnect from the db */
	//@mysqli_close($link);
?>