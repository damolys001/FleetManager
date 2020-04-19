<?php
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
require_once('myAlert.php');
$alert = new sendAlert;

$datenow = date("Y/m/d");
$userid ="";
$msgForUser="";




if (isset ($_SESSION["userid"])) {$userid = $_SESSION["userid"];}
   
$id  = "";
$sDate  = "";
$eDate  = "";
$depature = "";
$destination  = "";
$fleetUser  = "";  
$tripType="";
$startBookHrs = DateTime::createFromFormat('H:i', "06:30");
$endBookHrs = DateTime::createFromFormat('H:i', "18:00");
$maxHour ="4";
$maxPerDept="8";
$approver1Name ="";
$approver2Name ="";
$approver3Name ="";
$approver1Email ="";
$approver2Email ="";
$approver3Email ="";
$userName="";
$userEmail="";
$bookedId ="";
$driverPhone ="";
$driverName ="";
$carMakeModel="";
$chasisNo ="";
$regNo ="";
$opr ="";
$fleetuserName ="";
$fleetuserEmail ="";
$exthrs ="";
$myBookedUserForExt="";
$fleetId ="";
$driverId ="";
$booklogStatus ="";
$rateDriver ="";
$rateFleet ="";
$detail ="";








//get now time & date
$userTimeZone ="GMT+1";
$timezone = new \DateTimeZone($userTimeZone);
$date = new \DateTime('@' . time(), $timezone);
$date->setTimezone($timezone);
$now = $date->getTimestamp() + $date->getOffset();
$nowST = new DateTime();
$nowST->setTimestamp($now);

//get Shop basis
$queryBasic = "select * from shop_basic where id = 1";
   $resultBasic = mysqli_query($link,$queryBasic) or die('Errant query:  '.$queryBasic);     
if(mysqli_num_rows($resultBasic)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultBasic)) 
        {
            $startBookHrs = DateTime::createFromFormat('H:i', $rowOpt["bookingStart"]);
            $endBookHrs = DateTime::createFromFormat('H:i', $rowOpt["bookingEnd"]);
            $maxHour =$rowOpt["maxHour"];
            $maxPerDept = $rowOpt["maxPerDept"];
        }
    }


////Get user details
$queryBasic = "select *,CONCAT_WS(' ',namef,namel)  userName from user where id = '".$_SESSION["userid"]."'";
   $resultBasic = mysqli_query($link,$queryBasic) or die('Errant query:  '.$queryBasic);     
if(mysqli_num_rows($resultBasic)) 
	{	
		
		while($rowUsr= mysqli_fetch_assoc($resultBasic)) 
        {
           $userName=$rowUsr["userName"];
            $userEmail=$rowUsr["email"];
        }
    }






///Variable Posted
if (isset($_REQUEST["id"]))$id = $_REQUEST["id"];
if (isset($_REQUEST["sDate"])) $sDate  = $_REQUEST["sDate"];
if (isset($_REQUEST["eDate"])) $eDate  = $_REQUEST["eDate"];
if (isset($_REQUEST["depature"])) $depature = $_REQUEST["depature"];
if (isset($_REQUEST["destination"])) $destination  = $_REQUEST["destination"];
if (isset($_REQUEST["fleetUser"])) $fleetUser  = $_REQUEST["fleetUser"];
if (isset($_REQUEST["tripType"])) $tripType  = $_REQUEST["tripType"]; 
if (isset($_REQUEST["opr"])) $opr = $_REQUEST["opr"]; 
if (isset($_REQUEST["exthrs"])) $exthrs = $_REQUEST["exthrs"]; 

if (isset($_REQUEST["rateDriver"])) $rateDriver = $_REQUEST["rateDriver"]; 
if (isset($_REQUEST["rateFleet"])) $rateFleet = $_REQUEST["rateFleet"]; 

if (isset($_REQUEST["detail"])) $detail = $_REQUEST["detail"]; 


//get variable from id
$queryU = "select *,
(select PhoneNo from driver where driver.id = bookinglog.driver ) driverPhone,
(select CONCAT_WS(' ',fName,lName)  from driver where driver.id = bookinglog.driver ) driverName,
(select maker from fleet where fleet.id = bookinglog.fleet ) maker,
(select model from fleet where fleet.id = bookinglog.fleet ) model,
(select chasisNo from fleet where fleet.id = bookinglog.fleet ) chasisNo,
(select regNo from fleet where fleet.id = bookinglog.fleet ) regNo,
(select CONCAT_WS(' ',namef,namel) from user where user.id = bookinglog.user ) userName,
(select email from user where user.id = bookinglog.user ) userEmail
from bookinglog where id = '$id'";
   $resultU = mysqli_query($link,$queryU) or die('Errant query:  '.$queryU);     
if(mysqli_num_rows($resultU)) 
	{	
		
		while($row= mysqli_fetch_assoc($resultU)) 
        {
            $driverName = $row["driverName"]; 
            $driverPhone = $row["driverPhone"];
            $sDate = $row["start"]; 
            $eDate =$row["end"]; 
            $depature =$row["Departure"]; 
            $destination  =$row["destination"];   
            
            $carMakeModel = $row["maker"]." ".$row["model"];
            $chasisNo = $row["chasisNo"]; 
            $regNo = $row["regNo"]; 
            $fleetuserName =$row["userName"]; 
            $fleetuserEmail =$row["userEmail"]; 
            
            $fleetUser =  $row["user"];
            $booklogStatus = $row["status"];
            
          $fleetId = $row["fleet"];
          $driverId=$row["driver"];
           
            if (($row["status"]=="Approved")&& ($opr=="approve"))
            {
                echo "Fleet Request has already been approved.";
                exit;
            }
            if (($row["status"]=="Cancelled")&& ($opr=="cancel"))
            {
                echo "Fleet Request has already been cancelled.";
                exit;
            }
        }
    }








//check if user have an approve booking
$queryBkAct = "select *,
(select CONCAT_WS(' ',namef,namel) from user where user.id = bookinglog.user ) userName,
(select email from user where user.id = bookinglog.user ) userEmail
from  bookinglog where createdForD ='".$datenow."' and fleet = '".$id."' and status = 'Approved' and user ='".$fleetUser."'" ;
$resultBkAct = mysqli_query($link,$queryBkAct) or die('Errant query:  '.$queryBkAct);     
if(mysqli_num_rows($resultBkAct)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkAct)) 
		{   //if aprove booking exsit and end time is less that now then take trip to be completed 
            if ( $row["endTime"] <= $now->getTimestamp() ) 
            {
                $queryBkUpd = "update bookinglog  set status = 'Completed' where id = '".$row["id"]."'";
                $queryBkUpd = mysqli_query($link,$queryBkUpd) or die('Errant query:  '.$queryBkUpd);
                $msgForUser += "Your Request No #".$row["id"]." was updated to completed. ";
                
                $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear ".$row["userName"].",<br/><br/>
Kindly note that the booking request status for the car detailed below has been completed by system<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                   
                
                //$alert->DoMail($row["userEmail"],$row["userName"],$mailBodyUser,"Car Booking trip Completed",$link);
                
            }else
            {
               //exit if approved booking exit in the future 
                echo ("THis user have an approved booking request between ".$row["start"]. " and ".$row["end"].". You must cancel or end trip before you can approve another." );
                exit;
            }
            
            //if ()
            //if ($myStartDateTime->getTimestamp() < $row["startTime"] )
            
        }
    }









$myStartDateTime = DateTime::createFromFormat('Y/m/d H:i', $sDate);
$myEndDateTime = DateTime::createFromFormat('Y/m/d H:i', $eDate);
//if ($fleetUser == ""){$fleetUser=$userid;}



//get user approver / department
$department ="";
$queryUsr = "select *,
 CONCAT_WS(' ',namef,namel) userName,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
(select email from user where id = main.approver1) approver1Email,
(select email from user where id = main.approver2) approver2Email,
(select email from user where id = main.approver3) approver3Email
from user main where id = '".$fleetUser."'";
$resultUsr = mysqli_query($link,$queryUsr) or die('Errant query:  '.$queryUsr);     
if(mysqli_num_rows($resultUsr)) 
	{			
		while($rowUsr= mysqli_fetch_assoc($resultUsr)) 
		{
            //$userName=$rowUsr["userName"];
            //$userEmail=$rowUsr["email"];
            $department= $rowUsr["department"];
            $approver1Name =$rowUsr["approver1Name"];
            $approver2Name =$rowUsr["approver2Name"];
            $approver3Name =$rowUsr["approver3Name"];
            $approver1Email =$rowUsr["approver1Email"];
            $approver2Email =$rowUsr["approver2Email"];
            $approver3Email =$rowUsr["approver3Email"];
            
        }
    }






if ($opr=="approve")

{
    
    
    
        
    //check if hrs is still available
$queryBkHr = "select * from  bookinglog where   fleet = '".$fleetId."' and status = 'Approved' and 
(startTime between ".$myStartDateTime->getTimestamp()." and ".$myEndDateTime->getTimestamp()." or ".$myStartDateTime->getTimestamp()." between startTime and endTime )" ;
    echo $queryBkHr;
$resultBkHr = mysqli_query($link,$queryBkHr) or die('Errant query:  '.$queryBkHr);     
if(mysqli_num_rows($resultBkHr)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkHr)) 
		{
            echo ("The booking time selected is not available a booking exist for the selected car between ".$row["start"]. " and ".$row["end"]." " );
     exit;
        }
    }

    
    
    
    
    
    // check if user have an approve booking 
    $queryCheck="select * from bookinglog ";
    
    
 /* 
$queryBkHr = "select * from  bookinglog where createdForD ='".$datenow."' and fleet = '".$fleetId."' and status = 'Approved' and startTime <=".$myStartDateTime->getTimestamp()." and endTime >= ".$myStartDateTime->getTimestamp()."" ;
$resultBkHr = mysqli_query($link,$queryBkHr) or die('');     
if(mysqli_num_rows($resultBkHr)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkHr)) 
		{
            echo ("The booking time select is not available a booking exist between ".$row["start"]. " and ".$row["end"] );
            exit;
        }
    }

  */  
    
    
    
    $querAuthoriszed ="update bookinglog set status ='Approved', approved='$datenow', approvedBy ='".$_SESSION["userid"]."' where id ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                { 
                  //domail to admin
                    //do mail Body 
                    //$newDateTime = date('h:i A', strtotime($currentDateTime));
                    
                    $mailBody="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear Admin,<br/><br/>
Kindly note that the booking request for the car detailed below had been approved<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                   
                    
                    $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $fleetuserName,<br/><br/>
Kindly note that the booking request for the car detailed below had been approved by $userName<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                   
                    
                   

    
                    $alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBody,"Car Booking Approval",$link);
 
                    //$alert->DoMail('damola.adeyemi@ensure.com.ng',"Adedamola Adeyemi",$mailBody,"Car Booking Approval",$link);
                    
                    $alert->DoMail($fleetuserEmail,$fleetuserName,$mailBodyUser,"Car Booking Approval",$link);
                    
                    //do sms to driver
                    $smsBody ="Hello you have been schedule for a trip. Pickup location:$depature, Destination:$destination, Time/Date:".$myStartDateTime->format('h:i A')." End:".$myEndDateTime->format('h:i A').". By: $fleetuserName";
                    
                    //$driverPhone
                     $alert->DoSMS($driverPhone,$smsBody,$link);
                    
                    echo "Booking was authorized successfully"; //.$mailBodyUser
    
}
            
}


if ($opr=="cancel")

{
    $querAuthoriszed ="update bookinglog set status ='Cancelled', approved='$datenow', approvedBy ='".$_SESSION["userid"]."' where id ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                {
                    
                    $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $fleetuserName,<br/><br/>
Kindly note that the booking request for the car detailed below had been canceled by $userName<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                    
                    
                   
                    if ($fleetuserName != $userName)
                     $alert->DoMail($fleetuserEmail,$fleetuserName,$mailBodyUser,"Booking Request Cancellation",$link);
                    
                    
                    /// do mail admin
                    $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear Admin,<br/><br/>
Kindly note that the booking request for the car detailed below had been canceled by $userName<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                    $alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBodyUser,"Booking Request Cancellation",$link);
                    
                    $alert->DoMail('damola.adeyemi@ensure.com.ng',"Fleet Manager",$mailBodyUser,"Booking Request Cancellation",$link);
                    
                    //do sms to driver
                    $smsBody ="Hello $driverName, your scheduled trip has been canceled for Pick location:$depature, Destination:$destination, Time/Date:".$myStartDateTime->format('h:i A').". By: $userName ";
                    
                    //$driverPhone
                     $alert->DoSMS($driverPhone,$smsBody,$link);
                    
                       echo "Cancelation was successfully"; //. $mailBodyUser
                }

}





if ($opr=="cancelNudge")

{
     $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $fleetuserName,<br/><br/>
Kindly help cancel your car request for the car detailed below, so as to avoid disappointment, as the car in question will not be returned at the expected time.
<br/><br/> Staff Requesting:<b>  ".$_SESSION["name"]."</b><br/><br/>

<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $fleetuserName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table>
                    ";
                    if ($fleetuserName != $userName)
                     $alert->DoMail($fleetuserEmail,$fleetuserName,$mailBodyUser,"Car Booking Request Cancellation",$link);
    echo "Cancel Notification to was sent to $fleetuserName.";
    
}



if ($opr=="ext")
{
    ///check if booking if 2hr to the end off booking time
    if ($date->getTimestamp() < $myEndDateTime->getTimestamp() + 3600)//$myEndDateTime->getTimestamp()
    {
        echo "You can't extend trip until one hour to the end of the trip.";
        exit;
    }
    
    
    if ($exthrs <= 0 ){
        echo "Extenion hours can't be zero";
        exit;
    }
    $maxHour = 2;
    if ($exthrs > $maxHour ){
        echo "Extenion hours can't be more than $maxHour hrs. See General Services for clarification.";
        exit;
    }
    if (($booklogStatus == "Completed") || ($booklogStatus == "Cancelled") )
    {
         echo "You can't extend $booklogStatus  trip.";
        exit;
    }
    
    $mytime = $myEndDateTime->getTimestamp() + $exthrs *60*60;
    //echo $exthrs." ".$mytime. ' ' .$myEndDateTime->getTimestamp()."  <br/><br/><br/>" ;
        $datef = new DateTime();
        $datef->setTimestamp($mytime);
    // $datef->format('Y/m/d H:i');
    
    $querAuthoriszed ="update bookinglog set end ='".$datef->format('Y/m/d H:i')."', endDate='".$datef->format('Y/m/d')."', endTime ='".$datef->getTimestamp()."' where id ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                { 
                  //do mail of extension 
                    $mailBody="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear Admin,<br/><br/>
                    Kindly note that the booking request for the car detailed below had been extended by $userName<br/><br/>
                    <table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
                    <tr><td>Extension(hrs):</td><td> $exthrs hrs<td></tr>
                    <tr><td>Car Make:</td><td> $carMakeModel<td></tr>
                    <tr><td>Car User:</td><td> $fleetuserName<td></tr>
                    <tr><td>Car Registration No: </td><td>$regNo<td></tr>
                    <tr><td>Departure Location:</td><td> $depature<td></tr>
                    <tr><td>Destination:</td><td>$destination<td></tr>
                    <tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
                    <tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
                    <tr><td>New End Date/Time:</td><td><b>".$datef->format('d/m/y h:i A')."</b><td></tr>
                    <tr><td>Driver Name:</td><td>$driverName<td></tr>
                    <tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
                    </table>
                    ";
                    
                    //alert admin
                    $alert->DoMail($fleetuserEmail,$fleetuserName,$mailBody,"Car Booking Extension",$link);
                    $alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBody,"Car Booking Extension",$link);
                    echo "Extension of $exthrs hrs was successful";
                    
                    
                    
                    //get user whose booking fall between extension
                                $queryU = "select *,
                                (select PhoneNo from driver where driver.id = bookinglog.driver ) driverPhone,
                                (select CONCAT_WS(' ',fName,lName)  from driver where driver.id = bookinglog.driver ) driverName,
                                (select maker from fleet where fleet.id = bookinglog.fleet ) maker,
                                (select model from fleet where fleet.id = bookinglog.fleet ) model,
                                (select chasisNo from fleet where fleet.id = bookinglog.fleet ) chasisNo,
                                (select regNo from fleet where fleet.id = bookinglog.fleet ) regNo,
                                (select CONCAT_WS(' ',namef,namel) from user where user.id = bookinglog.user ) userName,
                                (select email from user where user.id = bookinglog.user ) userEmail
                                from bookinglog where user != '$fleetUser' and status = 'Approved' and createdForD  = '$datenow' 
                                and fleet ='$fleetId'";
                                   $resultU = mysqli_query($link,$queryU) or die('Errant query:  '.$queryU);     
                                if(mysqli_num_rows($resultU)) 
                                    {	

                                        while($row= mysqli_fetch_assoc($resultU)) 
                                        {
                                            $driverName = $row["driverName"]; 
                                            $driverPhone = $row["driverPhone"];
                                            $sDate = $row["start"]; 
                                            $eDate =$row["end"]; 
                                            $depature =$row["Departure"]; 
                                            $destination  =$row["destination"];   

                                            $carMakeModel = $row["maker"]." ".$row["model"];
                                            $chasisNo = $row["chasisNo"]; 
                                            $regNo = $row["regNo"]; 
                                            $fleetuserName =$row["userName"]; 
                                            $fleetuserEmail =$row["userEmail"]; 

                                            $fleetUser =  $row["user"];
                                            
                                            $myStartDateTime = DateTime::createFromFormat('Y/m/d H:i', $sDate);
                                            $myEndDateTime = DateTime::createFromFormat('Y/m/d H:i', $eDate);
                                            
                                            $mailBodyAdvise ="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                                                                        Dear $fleetuserName,<br/><br/>
                                                    Kindly note that a trip was extended by $userName, help cancel your car request for the car detailed below, so as to avoid disappointment, as the car in question will not be returned at the expected time<br/><br/>
                                                    <table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
                                                    <tr><td>Car Make:</td><td> $carMakeModel<td></tr>
                                                    <tr><td>Car User:</td><td> $fleetuserName<td></tr>
                                                    <tr><td>Car Registration No: </td><td>$regNo<td></tr>
                                                    <tr><td>Departure Location:</td><td> $depature<td></tr>
                                                    <tr><td>Destination:</td><td>$destination<td></tr>
                                                    <tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
                                                    <tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
                                                    <tr><td>Driver Name:</td><td>$driverName<td></tr>
                                                    <tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
                                                    </table>
                                                    ";
                                            
                                        $alert->DoMail($fleetuserEmail,$fleetuserName,$mailBodyAdvise,"Car Booking Request Cancellation",$link);    
                                            
                                        }
                                    }

                }
    
    
       
        
    
    
}


if ($opr=="endTrip")
{
     if ($booklogStatus == "Cancelled")
                    {
                        echo "You can't do 'End Trip' on a cancelled request.";
                        exit;
                    }
    if ($myStartDateTime->format('Y/m/d H:i') >$date->format('Y/m/d H:i'))
    {
       echo "You can't do 'End Trip' before the trip begin.";
                        exit ;
    }
    
    if ($booklogStatus == "Pending")
    {
       echo "You can't do 'End Trip' on a pending request.";
                        exit ;
    }
    
    if ($booklogStatus == "Completed")
    {
       echo "You can't do 'End Trip' on an ended trip.";
                        exit ;
    }
    
    $querAuthoriszed ="update bookinglog set end ='".$date->format('Y/m/d H:i')."', endDate='".$date->format('Y/m/d')."', endTime ='".$date->getTimestamp()."', status ='Completed' where id ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                { 
    
                   
    echo "End Trip successful.";
                }
}



///resend approval 


if ($opr=="resendApproval")
{

 //do mail to authorizer
                $mailBody1="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $approver1Name,<br/><br/>
Kindly note that the booking request for the car detailed below had been request by $userName for your approval. You can login at http://fleetmanager.ensure.com.ng<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $userName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table> ";
                
                $mailBody2="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $approver2Name,<br/><br/>
Kindly note that the booking request for the car detailed below had been request by $userName for your approval. You can login at http://fleetmanager.ensure.com.ng<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $userName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>
</table> ";
                
                $mailBody3="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear $approver3Name,<br/><br/>
Kindly note that the booking request for the car detailed below had been request by $userName for your approval. You can login at http://fleetmanager.ensure.com.ng<br/><br/>
<table align='center' style='border-collapse: collapse;    width: 50%; tr:nth-child(even):background-color: #f2f2f2}'>
<tr><td>Car Make:</td><td> $carMakeModel<td></tr>
<tr><td>Car User:</td><td> $userName<td></tr>
<tr><td>Car Registration No: </td><td>$regNo<td></tr>
<tr><td>Departure Location:</td><td> $depature<td></tr>
<tr><td>Destination:</td><td>$destination<td></tr>
<tr><td>Start Date/ Time:</td><td><b>".$myStartDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>End Date/Time:</td><td><b>".$myEndDateTime->format('d/m/y h:i A')."</b><td></tr>
<tr><td>Driver Name:</td><td>$driverName<td></tr>
<tr><td>Driver Phone:</td><td>$driverPhone<td></tr>

</table> ";
                
                //$alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBody,"Car Booking Approval",$link);
 
                if ($approver1Name!="")
                {
                
                    $alert->DoMail($approver1Email,$approver1Name,$mailBody1,"Fleet Manager Approval Request",$link);
                }
                if ($approver2Name!="")
                {
                
                    $alert->DoMail($approver2Email,$approver2Name,$mailBody2,"Fleet Manager Approval Request",$link);
                }
                 if ($approver3Name!="")
                {
                
                    $alert->DoMail($approver3Email,$approver3Name,$mailBody3,"Fleet Manager Approval Request",$link);
                }
                $alert->DoMail('damola.adeyemi@ensure.com.ng',"Adedamola Adeyemi",$mailBody3,"Car Booking Approval Resend Approval",$link);
echo "Approval request was sent successful";


}









////Rate Driver
if ($opr=="rateDriver")
{
    $queryDri = "select * from myRating where referenceid = '$id' " ;
    $resultDri = mysqli_query($link,$queryDri) or die('Errant query:  '.$queryDri);     
if(mysqli_num_rows($resultDri)) 
	{			
		while($row= mysqli_fetch_assoc($resultDri)) 
		{ 
		  if ($driverId=="")$driverId=0;
		  //echo $row["driver"].$row["referenceid"]."<br/>";
		    $querAuthoriszed ="update myRating set driver ='$rateDriver',driverId = '$driverId' where referenceid ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                {
                     echo "You have rated this driver successfuly ";
                }
                else echo $querAuthoriszed;
		}
    }
    else 
    {
        if ($driverId=="")$driverId=0;
         $querAuthoriszed ="insert into myRating (driver,referenceid,driverId) values ('$rateDriver', '$id','$driverId' )";
                if ($conn->query($querAuthoriszed) === TRUE) 
                {
                    echo "You have rated this driver successfuly";
                }
                else echo $querAuthoriszed;
    }
    
}


////rate fleet
if ($opr=="rateFleet")
{
    $queryDri = "select * from myRating where referenceid = '$id' " ;
    $resultDri = mysqli_query($link,$queryDri) or die('Errant query:  '.$queryDri);     
if(mysqli_num_rows($resultDri)) 
	{			
		while($row= mysqli_fetch_assoc($resultDri)) 
		{ if ($fleetId=="")$fleetId=0;
		    $querAuthoriszed ="update myRating set fleet ='$rateFleet', fleetId= '$fleetId' where referenceid ='$id' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                {
                    echo "You have rated this car successfuly";
                }
		}
    }
    else 
    {if ($fleetId=="")$fleetId=0;
         $querAuthoriszed ="insert into myRating (fleet,referenceid,fleetId) values ('$rateFleet', '$id','$fleetId' )";
                if ($conn->query($querAuthoriszed) === TRUE) 
                {
                    echo "You have rated this car successfuly";
                }
    }
    
}

?>
