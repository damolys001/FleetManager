<?php 
$id = "";
$driverId ="";
$prodname ="";
If (isset ($_SESSION["uploadid"])) {$id =$_SESSION["uploadid"];}
$desc = str_replace( "'","''",$_REQUEST["fName"]);
if (isset($_REQUEST["driverId"])){$driverId = $_REQUEST["driverId"];}

if (isset($_REQUEST["driversLicenseNo"])){$prodname = str_replace( "'","''",$_REQUEST["driversLicenseNo"]);}
$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";



if ($driverId == "" ) {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$productid = $id; //$_SESSION["productid"];

if ($productid == "" ) {

//Check if product name exit
$queryCheck = "select * from driver where id = '$driverId'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			$id = $row["id"];
			$query = "update driver set  updated ='$datenow', updatedby ='$name' where id ='$driverId'";
			$mode ="updated";
			if ($conn->query($query) === TRUE) {}
		}
	}
	else
	{
		$query = "insert into driver (`fName`,`created`,`createdby`) values ('$desc','$datenow','$name');  ";
		$mode ="saved";
		if ($conn->query($query) === TRUE) 
		{
			 $last_id = $conn->insert_id;
			 $id = $last_id;
			 
		}
	}
}


else {
	$query = "update driver set   updated ='$datenow', updatedby ='$name' where id ='$productid'";
	$mode ="updated";
	if ($conn->query($query) === TRUE) {}
	}








	 if ($mode == "updated" or $mode == "saved") { echo $id;} //else {echo "saved";} 
//}
 else 
{
    //echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}
}

///set session variable fro uplaod
$_SESSION["uploadid"] = $id ;
$_SESSION["uploadtype"] = 'driver' ;
 
?>