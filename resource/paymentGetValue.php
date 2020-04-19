<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$refPayment = $_SESSION["paymentrefforUpdate"];
//$productid = $_GET["id"];
//$_SESSION["productid"] = $productid ;
$query = "SELECT * FROM payment WHERE referenceid = '$refPayment' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["value"];
		}
	}
/* disconnect from the db */
	//@mysqli_close($link);
?>