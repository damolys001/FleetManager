<?php 
include_once "../resource/session.php";
$Categoryname = $_GET["name"];
$detail = $_GET["detail"];
$Categoryid = $_SESSION ["CategoryUpdatingId"];


$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];

if ($Categoryid == ""){


	if ($Categoryname == "" ) {}else {
		
		$query ="";
		$mode = "";
		//$productid = $_SESSION["productid"];
		
		
		
		//Check if product name exit
		$queryCheck = "select * from Category where Category = '$Categoryname'";
		$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
			
	
		if(mysqli_num_rows($result)) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
				$query = "update Category set Category = '$Categoryname', detail ='$detail' , updated= '$datenow', updatedby ='$name' where Category ='$Category'";
				$mode ="updated";
			}
		}
		else
		{
		
						//inser user into user tabel
				//$adminPass = sha1 ($defaultPass);
				//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
				$query  = "INSERT INTO `Category` (
				 `id`,  `Category`, `detail`,  `created`, `createdby`
				  ) 
				  VALUES 
				  (NULL,
				  '$Categoryname', 
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
	$query = "update Category set Category = '$Categoryname', detail ='$detail' , updated= '$datenow', updatedby ='$name' where id ='$Categoryid'";
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