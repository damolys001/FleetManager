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
$driverId ="";
$maxPerDeptDept ="";
$DeptGroupName ="";






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





///Variable Posted
if (isset($_REQUEST["id"]))$id = $_REQUEST["id"];
if (isset($_REQUEST["sDate"])) $sDate  = $_REQUEST["sDate"];
if (isset($_REQUEST["eDate"])) $eDate  = $_REQUEST["eDate"];
if (isset($_REQUEST["depature"])) $depature = $_REQUEST["depature"];
if (isset($_REQUEST["destination"])) $destination  = $_REQUEST["destination"];
if (isset($_REQUEST["fleetUser"])) $fleetUser  = $_REQUEST["fleetUser"];
if (isset($_REQUEST["tripType"])) $tripType  = $_REQUEST["tripType"]; 
if (isset($_REQUEST["opr"])) $opr = $_REQUEST["opr"]; 





if ($sDate =="" ) 
{
    echo "Please specify start date & time";
        exit;
}

if ($eDate =="") 
{
    echo "Please specify end date & time";
        exit;
}








////
$myStartDateTime = DateTime::createFromFormat('j F Y - H:i', $sDate);
$myEndDateTime = DateTime::createFromFormat('j F Y - H:i', $eDate);
   
if ($fleetUser == ""){$fleetUser=$userid;}



//get user department
$department ="";
$queryUsr = "select *,
 CONCAT_WS(' ',namef,namel)  userName,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
(select email from user where id = main.approver1) approver1Email,
(select email from user where id = main.approver2) approver2Email,
(select email from user where id = main.approver3) approver3Email,
(select maxPerDept from department where department.id = main.department) maxPerDeptDept,
(select description from department where department.id = main.department) DeptGroupName


from user main where id = '".$fleetUser."'";
$resultUsr = mysqli_query($link,$queryUsr) or die('Errant query:  '.$queryUsr);     
if(mysqli_num_rows($resultUsr)) 
	{			
		while($rowUsr= mysqli_fetch_assoc($resultUsr)) 
		{
            $userName=$rowUsr["userName"];
            $userEmail=$rowUsr["email"];
            $department= $rowUsr["department"];
            $approver1Name =$rowUsr["approver1Name"];
            $approver2Name =$rowUsr["approver2Name"];
            $approver3Name =$rowUsr["approver3Name"];
            $approver1Email =$rowUsr["approver1Email"];
            $approver2Email =$rowUsr["approver2Email"];
            $approver3Email =$rowUsr["approver3Email"];
           /// $maxPerDeptDept =$rowUsr["maxPerDeptDept"];
           // $DeptGroupName =$rowUsr["DeptGroupName"];
        }
    }

//if ($opr=="")  
//{ 

//get Driver Phone
$queryDrv = "select *,

(select PhoneNo from driver where driver.id = DriverId and fleet.id = '$id' ) driverPhone,
(select CONCAT_WS(' ',fName,lName)  from driver where driver.id = DriverId and fleet.id = '$id' ) driverName

from fleet where fleet.id = '$id' 
"; //and DriverId = driver.id
$resultDrv = mysqli_query($link,$queryDrv) or die('Errant query:  '.$queryDrv);     
if(mysqli_num_rows($resultDrv)) 
	{			
		while($row= mysqli_fetch_assoc($resultDrv)) 
        {   $driverName = $row["driverName"]; 
            $driverPhone = $row["driverPhone"];
            $carMakeModel = $row["maker"]." ".$row["model"];
            $chasisNo = $row["chasisNo"]; 
            $regNo = $row["regNo"]; 
         
            $driverId = $row["DriverId"]; 

        }
    }



//if ($opr == ""){

if (((($myEndDateTime->getTimestamp() - $myStartDateTime->getTimestamp())/60)>$maxHour*60) && ($tripType =="Intra State") )
{
     echo ("Maximum Hours allow per booking is ".$maxHour."hrs. Please contact General Service for clarification or exception. " );
    exit;
}



if ($date > $myStartDateTime )
{
    echo ("Start date & time can't be less than now ".$date->format("h:i A"));
    exit;
}
if ($myEndDateTime == $myStartDateTime )
{
    echo ("Start date & time can't be the the same as  End date & time");
    exit;
}
if ($myEndDateTime < $myStartDateTime )
{
    echo ("End date & time can't be less than Start date & time");
    exit;
}
if ($depature == "")
{
     echo ("Invalid Field depature location");
    exit;
}
if ($destination == "")
{
     echo ("Invalid Destination  Field ");
    exit;
}

if ($userid=="") 
{
    echo ("Invalid user credentials");
    exit;
}


if (($startBookHrs->format("H:i") >$myStartDateTime->format("H:i")) || ($endBookHrs->format("H:i")<$myStartDateTime->format("H:i")))
{
     echo ("Booking is not available at this hour. You can only book between the hours of ". $startBookHrs->format("h:i A")." and ".$endBookHrs->format("h:i A")."  "); //$myStartDateTime->format("H:i").$startBookHrs->format("H:i")
    exit;
}

if (($datenow < $myEndDateTime->format("y/m/d")))
{
    if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2")){}else 
    {
        if ($tripType =="Intra State")
    {
     echo ("You can't have Intra State booking beyond a day. Please contact general services for clarification.");
     exit;
    }
    }
}







//check if hrs is still available
$queryBkHr = "select * from  bookinglog where createdForD ='".$datenow."' and fleet = '".$id."' and status = 'Approved' and 
(startTime between ".$myStartDateTime->getTimestamp()." and ".$myEndDateTime->getTimestamp()." or ".$myStartDateTime->getTimestamp()." between startTime and endTime )" ;
//and startTime <=".$myStartDateTime->getTimestamp()." and endTime >= ".$myStartDateTime->getTimestamp()."" ;
$resultBkHr = mysqli_query($link,$queryBkHr) or die('Errant query:  '.$queryBkHr);     
if(mysqli_num_rows($resultBkHr)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkHr)) 
		{
            echo ("The booking time you select is not available a booking exist between ".$row["start"]. " and ".$row["end"] );
     exit;
        }
    }




//check if hrs is fall between 30 min of approve bookings
$queryBkHr = "select * from  bookinglog where createdForD ='".$datenow."' and fleet = '".$id."' and status = 'Approved' and 
(".$myStartDateTime->getTimestamp()." between startTime + 1800 and  endTime + 1800 or ".$myEndDateTime->getTimestamp()." between startTime + 1800 and endTime + 1800 )" ;
//echo $queryBkHr ;
//and startTime <=".$myStartDateTime->getTimestamp()." and endTime >= ".$myStartDateTime->getTimestamp()."" ;
$resultBkHr = mysqli_query($link,$queryBkHr) or die('Errant query:  '.$queryBkHr);     
if(mysqli_num_rows($resultBkHr)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkHr)) 
		{
            $mySDToday = DateTime::createFromFormat('Y/m/d H:i', $row["start"]);
                            $myEDToday = DateTime::createFromFormat('Y/m/d H:i', $row["end"]);
            ///echo ("The booking time you select is not available a booking exist between ".$row["start"]. " and ".$row["end"] );
            echo ("There must be at least 30 minutes between booking.  A booking exist for the selected car between ". $mySDToday->format("h:i A")." and ".$myEDToday->format("h:i A") );
     exit;
        }
    }



//check if user have an approve booking
$queryBkAct = "select * from  bookinglog where createdForD ='".$datenow."'  and user ='".$fleetUser."' and status = 'Approved'" ; //  and fleet = '".$id."' 
$resultBkAct = mysqli_query($link,$queryBkAct) or die('Errant query:  '.$queryBkAct);     
if(mysqli_num_rows($resultBkAct)) 
	{			
		while($row= mysqli_fetch_assoc($resultBkAct)) 
		{   //if aprove booking exsit and end time is less that now then take trip to be completed 
            if ( $row["endTime"] < $date->getTimestamp() ) 
            {
                $queryBkUpd = "update bookinglog  set status = 'Completed' where id = '".$row["id"]."'";
                $queryBkUpd = mysqli_query($link,$queryBkUpd) or die('Errant query:  '.$queryBkUpd);
                $msgForUser += "Your Request No #".$row["id"]." was updated to completed. <br/> ";
                
            }else
            {
               //exit if approved booking exit in the future 
                echo ("You have an approved booking request between ".$row["start"]. " and ".$row["end"].". You must cancel or end trip before you can book another." );
                exit;
            }
            
            //if ()
            //if ($myStartDateTime->getTimestamp() < $row["startTime"] )
            
        }
    }


///Check if user have an unapprove rating
$queryBkAct = "select * from  bookinglog where user ='".$fleetUser."' and status = 'Completed' and (select count(referenceid) from myRating where referenceid = bookingLog.id) = 0 " ; //  and fleet = '".$id."' 
$resultBkAct = mysqli_query($link,$queryBkAct) or die('Errant query:  '.$queryBkAct);     
if(mysqli_num_rows($resultBkAct)) 
	{	
	   $countUnrated = 0;
		while($row= mysqli_fetch_assoc($resultBkAct)) 
		{   //if aprove booking exsit and end time is less that now then take trip to be completed 
            
             $countUnrated += 1;
            //if ()
            //if ($myStartDateTime->getTimestamp() < $row["startTime"] )
            
        }
        echo "You currently have  $countUnrated  unrated completed trip(s). Please rate the driver and the car before making another booking <a class='btn btn-warning' href='mybookings.php'>My Bookings</a>";
    exit;
    }

///////////Department booking count validation
 $queryForD =  "
 
 select count(fleet) countDept from  bookinglog where createdForD ='".$datenow."' and (select description from department where department.id = bookinglog.department  ) ='$DeptGroupName' and  bookinglog.status = 'Approved' 
 ";
$resultForD = mysqli_query($link,$queryForD) or die('Errant query:  '.$queryForD);     
                if(mysqli_num_rows($resultForD)) 
                {
                    //// department count booking Validation
                            if (($maxPerDeptDept == "" ) || (maxPerDeptDept=="0"))
                            {
                            if ($rowForD["countDept"] <= $maxPerDept){}else
                            {
                                echo ("Your departmental booking has reached its maximum. Please try again later");
                                     exit;
                            }
                            } 
                            else
                            {
                             if ($rowForD["countDept"] <= $maxPerDeptDept){}else
                            {
                                echo ("$DeptGroupName booking has reached its maximum '$maxPerDeptDept'. Please try again later");
                                     exit;
                            }   
                            }
                }






////some more validaion
 $queryForD =  "select *,
 (select COUNT(fleet) from  bookinglog  where createdForD ='".$datenow."' and bookinglog.fleet = '".$id."' and bookinglog.status = 'Approved') countBooking,
 (select count(fleet) from  bookinglog where createdForD ='".$datenow."' and department ='$department' and  bookinglog.status = 'Approved' ) countDept
 from  bookinglog where createdForD ='".$datenow."' and fleet = '".$id."' and status = 'Approved'";



        
            $resultForD = mysqli_query($link,$queryForD) or die('Errant query:  '.$queryForD);     
                if(mysqli_num_rows($resultForD)) 
                    {	

                        while($rowForD= mysqli_fetch_assoc($resultForD)) 
                        {
                            $mySDToday = DateTime::createFromFormat('Y/m/d H:i', $rowForD["start"]);
                            $myEDToday = DateTime::createFromFormat('Y/m/d H:i', $rowForD["end"]);
                          
                            if (($myStartDateTime->getTimestamp() >= $rowForD["startTime"] ) &&
                                (($myStartDateTime->getTimestamp() <= $rowForD["endTime"] )) ) 
                            {
                                
                                echo ("You can't book this car for the selected period. A booking exist for the selected car between ". $mySDToday->format("H:i")." and ".$myEDToday->format("H:i") );
                            exit;
                            }
                            if (( $rowForD["endTime"] +1800 > $myStartDateTime->getTimestamp() ) 
                                || ( $rowForD["startTime"] -1800 <= $myEndDateTime->getTimestamp() )
                               ) 
                            {
                                //
                              // echo ("There must be at least 30 minutes between booking.  A booking exist for the selected car between ". $mySDToday->format("H:i")." and ".$myEDToday->format("H:i") );
                            //exit;
                            }
                            
                            if ($rowForD["countBooking"] <= 4){}
                            else 
                            {
                                 echo ("This car has received maximum bookings today and is no longer available.");
                                     exit;
                            }
                            
                            
                            
                                
                        }
                    }







/////////////check if driver is assign to fleet and prevent booking if no driver 
if ($driverName == "")
{
    echo "This car is unavailable: No Driver is assigned to it.";
    $mailBody="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear Admin,<br/><br/>
Kindly note that a user $userName was prevent from booking the car detaied below. Because no driver was assigned<br/><br/>
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
</table>
                    ";
      $alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBody,"Car Booking Rejection: No Driver Assigned",$link);
    exit;
}











$InsertFleet= "";


       
if ($tripType == "Inter State" ) { $createdInterStateD =$myEndDateTime->format('Y/m/d'); } else { $createdInterStateD ="";}
$queryInst ="insert into bookinglog  
(
fleet,
driver,
user,
department,
start, 
end, 
startDate, 
endDate, 
startTime, 
endTime,
createdForD, 
status,
created,
createdby,
createdInterStateD,
tripType,
Departure,
destination) 
values 
(
'".$id."',
'".$driverId."',
'".$_SESSION["userid"]."',
'".$department."',
'".$myStartDateTime->format('Y/m/d H:i')."',
'".$myEndDateTime->format('Y/m/d H:i')."',
'".$myStartDateTime->format('Y/m/d')."',
'".$myEndDateTime->format('Y/m/d')."',
'".$myStartDateTime->getTimestamp()."',
'".$myEndDateTime->getTimestamp()."',
'".$myStartDateTime->format('Y/m/d')."',
'"."Pending"."',
'".$datenow."',
'".$_SESSION["userid"]."',
'".$createdInterStateD."',
'".$tripType."',
'".$depature."',
'".$destination."'
)
";
            

if ($conn->query($queryInst) === TRUE) 
		{ 
			//get insert id of customer
			$bookedId = $conn->insert_id;
             echo ("Car was booked successfully" );
            
            //do authorization is bookin id is approver
            if (($userEmail == $approver1Email)||($userEmail == $approver2Email)||($userEmail == $approver3Email))
            {
                $querAuthoriszed ="update bookinglog set status ='Approved', approved='$datenow', approvedBy ='".$_SESSION["userid"]."' where id ='$bookedId' ";
                if ($conn->query($querAuthoriszed) === TRUE) 
                { 
                  //domail to admin
                    //do mail Body 
                    //$newDateTime = date('h:i A', strtotime($currentDateTime));
                    
                    $mailBody="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear Admin,<br/><br/>
Kindly note that the booking request for the car detaied below had been approved<br/><br/>
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
</table>
                    ";
                   
                    
                   

    
                   $alert->DoMail('fleetmanagers@ensure.com.ng',"Fleet Manager",$mailBody,"Car Booking Approval",$link);
 
                    $alert->DoMail('damola.adeyemi@ensure.com.ng',"Adedamola Adeyemi",$mailBody,"Car Booking Approval",$link);
                    //do sms to driver
                    $smsBody ="Hello $driverName, you have been schedule for a trip. Pick location:$depature, Destination:$destination, Time/Date:".$myStartDateTime->format('h:i A').". By: $userName ";
                     //$driverPhone
                     $alert->DoSMS($driverPhone,$smsBody,$link);
                }
            }
            else 
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
                $alert->DoMail('damola.adeyemi@ensure.com.ng',"Adedamola Adeyemi",$mailBody3,"Car Booking Approval",$link);
            }
                
        }
        
            
   
//}





?>
