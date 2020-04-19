<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$value = $_POST["value"];
$detail = $_POST["detail"];
$ref = $_POST["ref"];
$_SESSION["refPayment"] = $ref ;


if ($value == "" || $ref =="") {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$datenow = date("Y/m/d");



//Check if ref exist name exit
$queryCheck = "select * from payment where referenceid = '$ref'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			$query = "update payment set value = '$value', updated ='$datenow', updatedby ='$name', detail = '$detail'  where referenceid ='$ref'";
			$mode ="updated";
		}
	}
	else
	{
		$query = "insert into payment (`value`,`referenceid`,`created`,`createdby`,`detail`) values ('$value','$ref','$datenow','$name','$detail') ";
		$mode ="saved";
	}











//$query = "insert into log (`page_name`,`detail`,`created`,`createdby`) values ('$pagename','$detail','$datenow','$name') ";
	/*$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["detail"];
		}
	}*/
/* disconnect from the db */
	//@mysqli_close($link);
	
	
	
	if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 
	 if ($mode == "updated") {echo "updated" ;} else {echo "saved";} 
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}
}
?>