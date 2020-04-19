<?php 
include_once "../resource/session.php";
$menuid ="";
$roleid ="";
$detail ="";
$menu =  "";


if(isset($_REQUEST["menuid"])) $menuid =  $_REQUEST["menuid"];
if(isset($_REQUEST["roleid"])) $roleid = $_REQUEST["roleid"];
if(isset($_REQUEST["detail"]))$detail = $_REQUEST["detail"];
if(isset($_REQUEST["menu"])) $menu =   $_REQUEST["menu"];
$menuid = $_SESSION ["menuUpdatingId"];


$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];

if ($menuid == ""){


	/*if ($roleid == "" ) {}else {
		
		$query ="";
		$mode = "";
		//$productid = $_SESSION["productid"];
		
		
		
		//Check if product name exit
		$queryCheck = "select * from menu where roleid = '$roleid'";
		$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
			
	
		if(mysqli_num_rows($result)) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
				$query = "update menu set menu = '$menu', detail ='$detail' , updated= '$datenow', updatedby ='$name' where roleid ='$roleid'";
				$mode ="updated";
			}
		}
		else
		{
		
		*/
        //inser user into user tabel
				//$adminPass = sha1 ($defaultPass);
				//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
				$query  = "INSERT INTO `menu` (
				 `id`,  `menu`, `detail`, `roleid`, `created`, `createdby`
				  ) 
				  VALUES 
				  (NULL,
				  '$menu', 
				 '$detail',
                  '$roleid', 
				 '$datenow',
				 '$name'
				);	"	;
																						
		
		
				//$query = "insert into user (`namef`,`namel`,`created`,`createdby`) values ('$product','$price','$datenow','$name') ";
				$mode ="saved";
			//}
		}

else {
	//$adminPass = sha1 ($defaultPass);
	//$adminPassSalt = sha1 ($email.'_'.$defaultPass);
	$query = "update menu set menu = '$menu',  detail ='$detail' where id ='$menuid'";
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