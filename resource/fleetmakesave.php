<?php 
include_once "../resource/session.php";
$fleetmakename = $_GET["name"];
$detail = $_GET["detail"];
$fleetmakeid = $_SESSION ["fleetmakeUpdatingId"];


$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];

if ($fleetmakeid == ""){


	if ($fleetmakename == "" ) {}else {
		
		$query ="";
		$mode = "";
		//$productid = $_SESSION["productid"];
		
		
		
		//Check if product name exit
		$queryCheck = "select * from fleetmake where fleetmake = '$fleetmakename'";
		$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
			
	
		if(mysqli_num_rows($result)) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
				$query = "update fleetmake set fleetmake = '$fleetmakename', detail ='$detail' , updated= '$datenow', updatedby ='$name' where fleetmake ='$fleetmake'";
				$mode ="updated";
			}
		}
		else
		{
		
						//inser user into user tabel
				//$adminPass = sha1 ($defaultPass);
				//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
				$query  = "INSERT INTO `fleetmake` (
				 `id`,  `fleetmake`, `detail`,  `created`, `createdby`
				  ) 
				  VALUES 
				  (NULL,
				  '$fleetmakename', 
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
	$query = "update fleetmake set fleetmake = '$fleetmakename', detail ='$detail' , updated= '$datenow', updatedby ='$name' where id ='$fleetmakeid'";
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