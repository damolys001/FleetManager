<?php 
include_once "../resource/session.php";
$id = $_REQUEST["id"];
$status = $_REQUEST["status"];

//$prodidforUpdate = $_SESSION["prodidforUpdate"];




$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";











//if ($prod == "" || $quant =="") {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$prodPrice ="";
$vatrate ="";
$datenow = date("Y/m/d");

$query = "update orders set orderstatus = '$status', updated = '$datenow', updatedby = '$name' where id = '$id'";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	/*if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			//$price = $row["price"];
		}
	}*/








?>