<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$roleid = $_SESSION["role"];
$query = "SELECT * FROM vat_rate WHERE id = '1' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["myrate"];
		}
	}
/* disconnect from the db */
	//@mysqli_close($link);
?>