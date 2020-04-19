<?php 
include_once "../resource/session.php";
$driverStatusname = $_REQUEST["name"];
$detail = $_REQUEST["detail"];
$driverStatusid = $_SESSION ["driverStatusUpdatingId"];


$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];

if ($driverStatusid == ""){


	if ($driverStatusname == "" ) {}else {
		
		$query ="";
		$mode = "";
		//$productid = $_SESSION["productid"];
		
		
		
		//Check if product name exit
		$queryCheck = "select * from driverStatus where driverStatus = '$driverStatusname'";
		$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
			
	
		if(mysqli_num_rows($result)) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
				$query = "update driverStatus set driverStatus = '$driverStatusname', detail ='$detail' , updated= '$datenow', updatedby ='$name' where driverStatus ='$driverStatus'";
				$mode ="updated";
			}
		}
		else
		{
		
						//inser user into user tabel
				//$adminPass = sha1 ($defaultPass);
				//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
				$query  = "INSERT INTO `driverStatus` (
				 `id`,  `driverStatus`, `detail`,  `created`, `createdby`
				  ) 
				  VALUES 
				  (NULL,
				  '$driverStatusname', 
				 '$detail', 
				 '$datenow',
				 '$name'
				);	"	;
																						
		
		
				//$query = "insert into user (`namef`,`namel`,`created`,`createdby`) values ('$product','$price','$datenow','$name') ";
				$mode ="saved";
			}
		}
}
else {
	//$adminPass = sha1 ($defaultPass);
	//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
	$query = "update driverStatus set driverStatus = '$driverStatusname', detail ='$detail' , updated= '$datenow', updatedby ='$name' where id ='$driverStatusid'";
						$mode ="updated";
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
	 echo $mode ;
	 //if ($mode == "updated") {echo "updated" ;} else if ($mode == "updated") {echo "saved";} else {}
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}


?>