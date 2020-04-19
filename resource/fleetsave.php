<?php

include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];
$datenow = date("Y/m/d");
$fleetid = "";
//$fleet = $_GET["fleet"];
//$price = $_GET["price"];


/*
maker 
model 
color 
year 
engineNo 
regNo 
location 
allocation 
DriverId 
chasisNo 
type 
    status
*/    
    
    
    $maker ="";$model  ="";$color  ="";$year  ="";$engineNo  ="";$regNo  ="";$location  ="";$allocation  ="";$DriverId  ="";$chasisNo  ="";$type  ="";
    $status ="";


if(isset($_REQUEST["maker"])){$maker =$_REQUEST["maker"];} 
if(isset($_REQUEST["model"])){$model =$_REQUEST["model"];}
if(isset($_REQUEST["color"])){$color =$_REQUEST["color"];}
if(isset($_REQUEST["year"])){$year =$_REQUEST["year"];}
if(isset($_REQUEST["engineNo"])){$engineNo =$_REQUEST["engineNo"];}
if(isset($_REQUEST["regNo"])){$regNo =$_REQUEST["regNo"];}
if(isset($_REQUEST["location"])){$location=$_REQUEST["location"];}
if(isset($_REQUEST["allocation"])){$allocation =$_REQUEST["allocation"];}
if(isset($_REQUEST["DriverId"])){$DriverId =$_REQUEST["DriverId"];}
if(isset($_REQUEST["chasisNo"])){$chasisNo =$_REQUEST["chasisNo"];}
if(isset($_REQUEST["type"])){$type =$_REQUEST["chasisNo"];}
if(isset($_REQUEST["status"])){$status =$_REQUEST["status"];}

if(isset($_REQUEST["fleetid"])){$fleetid =$_REQUEST["fleetid"];}

if ($fleetid =="")
if(isset($_SESSION["fleetid"])){$fleetid = $_SESSION["fleetid"];}



//if ($chasisNo == "") { 
    
   // exit;

//}



if ($status =='del'){}

else if ($chasisNo == "" || $regNo =="") 
{ echo "Error: Please enter chasis number and registration number";
exit ;
}//else {


$query ="";
$mode = "";



if ($fleetid == "" ) {

//Check if fleet name exit
$queryCheck = "select * from fleet where chasisNo = '$chasisNo'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
               
            
			$query = "update fleet set 
			chasisNo = '$chasisNo',
			maker  = '$maker',
			model = '$model',
			color = '$color',
			year = '$year',
			engineNo = '$engineNo',
			regNo = '$regNo',
			location = '$location',
			allocation = '$allocation',
			DriverId = '$DriverId',
			type = '$type',
			status = '$status',
			 updated='$datenow',
            updatedby='$name'

 			where chasisNo ='$chasisNo'";

			
			$mode ="updated";
		}
	}
	else
	{
		$query = "insert into fleet (
maker, 
model, 
color, 
year, 
engineNo, 
regNo, 
location, 
allocation, 
DriverId, 
chasisNo, 
type, 
    status,
    created,
    createdby
    
										) values (
										
'$maker', 
'$model', 
'$color', 
'$year', 
'$engineNo', 
'$regNo', 
'$location', 
'$allocation', 
'$DriverId', 
'$chasisNo', 
'$type', 
    '$status',
    '$datenow',
    '$name'
												) ";
		$mode ="saved";
		
		//$queryVariant ="insert into fleet_variant() values () ";
	}
}


else
{
	if( (($_SESSION["role"]== '1') ||($_SESSION["role"]== '2')  ) &&( $status =='del'))
    { 
        $query = "update fleet set 
			
			status = '$status',
            updated='$datenow',
            updatedby='$name'
            where id ='$fleetid'";
			$mode ="updated";
    }else{
	$query = "update fleet set 
			chasisNo = '$chasisNo',
			maker  = '$maker',
			model = '$model',
			color = '$color',
			year = '$year',
			engineNo = '$engineNo',
			regNo = '$regNo',
			location = '$location',
			allocation = '$allocation',
			DriverId = '$DriverId',
			type = '$type',
			status = '$status',
             updated='$datenow',
            updatedby='$name'
			 where id ='$fleetid'";
			$mode ="updated";
	}
}

//echo "Error: ".$query;




	
	if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 
	 if ($mode == "updated") {echo "updated" ;} else {echo "saved";} 
} else {
    echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";
}

?>