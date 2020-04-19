<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$roleid = $_SESSION["role"];
$query = "SELECT * FROM menu WHERE roleid = '$roleid' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["detail"];
		}
	}
	
	if (isset ($_SESSION["role"]))
{
	if ($_SESSION["role"] > 10){header('Location: ../../shop');}
}
/* disconnect from the db */
	//@mysqli_close($link);
?>