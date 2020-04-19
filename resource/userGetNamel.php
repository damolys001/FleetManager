<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$useridforUpdate = $_POST["id"];
$_SESSION["useridforUpdate"] = $useridforUpdate ;
$query = "SELECT * FROM user WHERE id = '$useridforUpdate' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["namel"];
		}
	}
/* disconnect from the db */
	//@mysqli_close($link);
?>