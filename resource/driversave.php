<?php

include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];
$datenow = date("Y/m/d");
$driverid = "";
//$driver = $_GET["driver"];
//$price = $_GET["price"];


/*
fName 
lName
Oname
driversLicenseNo
empDate
location
PhoneNo
PhoneNo2
PhoneNo3
expiryDate

status 

*/    
    
    
   

 

$fName  ="";
$lName ="";
$Oname ="";
$driversLicenseNo ="";
$empDate ="";
$location ="";
$PhoneNo ="";
$PhoneNo2 ="";
$PhoneNo3 ="";
$expiryDate ="";
$driverid ="";
$status  ="";










if(isset($_REQUEST["fName"])){$fName =$_REQUEST["fName"];} 
if(isset($_REQUEST["lName"])){$lName =$_REQUEST["lName"];}
if(isset($_REQUEST["Oname"])){$Oname =$_REQUEST["Oname"];}
if(isset($_REQUEST["driversLicenseNo"])){$driversLicenseNo =$_REQUEST["driversLicenseNo"];}
if(isset($_REQUEST["empDate"])){$empDate =$_REQUEST["empDate"];}
if(isset($_REQUEST["PhoneNo"])){$PhoneNo =$_REQUEST["PhoneNo"];}
if(isset($_REQUEST["PhoneNo2"])){$PhoneNo2=$_REQUEST["PhoneNo2"];}
if(isset($_REQUEST["PhoneNo3"])){$PhoneNo3 =$_REQUEST["PhoneNo3"];}
if(isset($_REQUEST["expiryDate"])){$expiryDate =$_REQUEST["expiryDate"];}
if(isset($_REQUEST["status"])){$status =$_REQUEST["status"];}

if(isset($_REQUEST["driverid"])){$driverid =$_REQUEST["driverid"];}

if ($driverid  == "") {
    if (isset($_SESSION["driverid"])){$driverid = $_SESSION["driverid"];}
}

 if (isset($_SESSION["driverIDupdate"])){$driverid = $_SESSION["driverIDupdate"];}
//if ($driversLicenseNo  == "") { exit;

//}


if ($status== "del") {} 
else if ($driversLicenseNo  == "" || $fName =="") {
    echo "Error: Please enter Driver license number  and Driver first name";
exit;
}//else {


$query ="";
$mode = "";



if ($driverid == "" ) {

//Check if driver name exit
$queryCheck = "select * from driver where driversLicenseNo = '$driversLicenseNo'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
             



   
            
			$query = "update driver set 
			fName = '$fName',
			lName  = '$lName',
			Oname = '$Oname',
			driversLicenseNo = '$driversLicenseNo',
			empDate = '$empDate',
			PhoneNo = '$PhoneNo',
			PhoneNo2 = '$PhoneNo2',
			PhoneNo3 = '$PhoneNo3',
			expiryDate = '$expiryDate',
			
			status = '$status',
			 updated='$datenow',
            updatedby='$name'

 			where driversLicenseNo='$driversLicenseNo'";

			
			$mode ="updated";
		}
	}
	else
	{
		$query = "insert into driver (
fName, 
lName,
Oname,
driversLicenseNo,
empDate,

PhoneNo,
PhoneNo2,
PhoneNo3,
expiryDate,

status,
created,
createdby
										) values (
	'$fName',  
'$lName', 
'$Oname', 
'$driversLicenseNo', 
'$empDate', 
'$PhoneNo', 
'$PhoneNo2', 
'$PhoneNo3', 
'$expiryDate', 
'$status',
'$datenow',
'$name'

												) ";
		$mode ="saved";
		
		//$queryVariant ="insert into driver_variant() values () ";
	}
}


else {
    
    if( (($_SESSION["role"]== '1') ||($_SESSION["role"]== '2')  ) &&( $status =='del'))
    { if(isset($_REQUEST["driverid"])){$driverid =$_REQUEST["driverid"];}
        $query = "update driver set 
			
			status = '$status',
            updated='$datenow',
            updatedby='$name'
            where id ='$driverid'";
			$mode ="Deleted";
    }else{
	
	$query = "update driver set 
			fName = '$fName',
			lName  = '$lName',
			Oname = '$Oname',
			driversLicenseNo = '$driversLicenseNo',
			empDate = '$empDate',
			PhoneNo = '$PhoneNo',
			PhoneNo2 = '$PhoneNo2',
			PhoneNo3 = '$PhoneNo3',
			expiryDate = '$expiryDate',
			status = '$status',
            updated='$datenow',
            updatedby='$name'
			 where id ='$driverid'";
			$mode ="updated";
	}
}


//echo "Error: ".$query;




	
	if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 echo $mode ;
	 //if ($mode == "updated") {echo "updated" ;} else {echo "saved";} 
} else {
    echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";
}
//}
?>