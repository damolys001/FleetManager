<?php
include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];
$id  ="";
$opr= "";

if(isset($_REQUEST["id"])) then {$id  = $_REQUEST["id"];}
if(isset($_REQUEST["opr"])) then {$opr  = $_REQUEST["opr"];}

$datenow = date("Y/m/d");

if ($id == "")then 
{
$queryOpt = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select fname||' '||lname from driver where driver.id = fleet.driverid)driverName , 
(select phoneno from driver  where driver.id = fleet.driverid) phone ,
(select location from location  where location.id = fleet.location) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) bookingToday
from  fleet ";
   $resultOpt = mysqli_query($link,$queryOpt) or die('Errant query:  '.$queryOpt);     
if(mysqli_num_rows($resultOpt)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultOpt)) 
		{
            echo "<option value='".$rowOpt['id']."'>".$rowOpt['maker']." ".$rowOpt['model']." - ".$rowOpt['regno']."</option>";
        }}
    
    }else if ($id == "")then 
{
    $queryOpt = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select fname||' '||lname from driver where driver.id = fleet.driverid)driverName , 
(select phoneno from driver  where driver.id = fleet.driverid) phone ,
(select url from upload,driver  where driver.id = fleet.driverid and referenceid  = fleet.driverid and uploadtype ='driver') urlDriver ,
(select location from location  where location.id = fleet.location) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) bookingToday
from  fleet where id =".$id."'";
   $resultOpt = mysqli_query($link,$queryOpt) or die('Errant query:  '.$queryOpt);     
if(mysqli_num_rows($resultOpt)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultOpt)) 
		{
            if ($opr=="image")
            {
              echo $rowOpt['url'];  
            }
            if ($opr=="imageDriver")
            {
              echo $rowOpt['urlDriver'];  
            }
        }
    }
    
}



//where status ='1' and 
//(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) < 4

    ?>