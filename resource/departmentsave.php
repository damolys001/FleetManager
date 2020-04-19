<?php 
include_once "../resource/session.php";
$departmentname = $_GET["name"];
$detail = $_GET["detail"];
$description = $_GET["description"];
$maxPerDept = $_GET["maxPerDept"];



$departmentid = $_SESSION ["departmentUpdatingId"];


$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];


if ($departmentid == ""){


	if ($departmentname == "" ) {}else {
		
		$query ="";
		$mode = "";
		//$productid = $_SESSION["productid"];
		
		
		
		//Check if product name exit
		$queryCheck = "select * from department where department = '$departmentname'";
		$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
			
	
		if(mysqli_num_rows($result)) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
				$query = "update department set department = '$departmentname', detail ='$detail' , maxPerDept ='$maxPerDept', description='$description', updated= '$datenow', updatedby ='$name' where department ='$department'";
				$mode ="updated";
			}
		}
		else
		{
		
						//inser user into user tabel
				//$adminPass = sha1 ($defaultPass);
				//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
				$query  = "INSERT INTO `department` (
				 `id`,  `department`, `detail`,  `created`, `createdby`,
                 maxPerDept , description
				  ) 
				  VALUES 
				  (NULL,
				  '$departmentname', 
				 '$detail', 
				 '$datenow',
				 '$name',
                '$maxPerDept', '$description' 
				);	"	;
																						
		
		
				//$query = "insert into user (`namef`,`namel`,`created`,`createdby`,maxPerDept ,description ) values ('$product','$price','$datenow','$name',maxPerDept ='$maxPerDept', description='$description', ) ";
				$mode ="saved";
			}
		}
}
else {
	//$adminPass = sha1 ($defaultPass);
	//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
	$query = "update department set department = '$departmentname', detail ='$detail' , maxPerDept ='$maxPerDept', description='$description',  updated= '$datenow', updatedby ='$name' where id ='$departmentid'";
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