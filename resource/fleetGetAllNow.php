<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";

//$date = new DateTime(null, new DateTimeZone('GMT+1'));
//$tz = $date->getTimezone();
//echo $tz->getName();

//date_default_timezone_set('GMT+1');
$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$name ="";
$datenow = date("Y/m/d");
$now = new DateTime(null, new DateTimeZone('GMT+1'));
$timeNow ="";
$timeNowQ="";

//$myTimeStamp = DateTime::createFromFormat('j F Y - H:i', $eDate); getTimestamp()
$myTimeStamp = date('j F Y - H:i');


$dashboard = array(); 

if(isset ($_REQUEST["timeNow"]) ){ $timeNowQ = $_REQUEST["timeNow"]; }
if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }

$timeNow = DateTime::createFromFormat('j F Y - H:i', $timeNowQ);

 $query = "
select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid  limit 0,1)driverName , 
(select url from driver where driver.id = fleet.driverid  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid  limit 0,1) phone ,
(select location from location  where location.id = fleet.location  limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  limit 0,1) bookingToday,
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != ''  limit 0,1) InterStateD,
(select 'True' from bookinglog where bookinglog.fleet = fleet.id and bookinglog.startTime < ".$timeNow->getTimestamp()." and bookinglog.endTime > ".$timeNow->getTimestamp()." and status ='Approved' ) booknow
from fleet 
where status ='1' 
and 
   (
        (select COUNT(fleet) from bookinglog where createdForD ='2017/01/26' and fleet = fleet.id and status ='Approved' 
        ) < 4 
    ) 
    and 
    (
        select 'True' from bookinglog where bookinglog.fleet = fleet.id and bookinglog.startTime < ".$timeNow->getTimestamp()." and bookinglog.endTime > ".$timeNow->getTimestamp()." and status ='Approved' 
    ) is NULL  ";
//echo $query;

$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
 if(mysqli_num_rows($result)) 
	{   
        if((strtolower ($f)=="json")||(strtolower ($f)=="j"))
        {
            header('Content-type: application/json');
            $rows = array(); 
            while($r = mysqli_fetch_assoc($result)) 
            {
                $rows[] = $r;
            }
            print json_encode($rows);
        }

    else
    {
       
        
        echo ' <table width="100%" class="table table-striped table-bordered table-hover" id="availableNow-table">';
       
                 if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                 {
                     echo "<thead>
                                            <tr>

                                              <th></th>
                                                <th></th>
                                                <th>Reg No</th>
                                                <th>Location</th>
                                                <th>Driver Name</th>
                                                 <th>Drver Phone</th>
                                                <td>Bookings Today</th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                 }
                else 
                {
                 echo "<thead>
                                            <tr>


                                                <th></th>
                                                <th>Reg No</th>
                                                <th>Location</th>
                                                <th>Driver Name</th>
                                                 <th>Drver Phone</th>
                                                <td>Bookings Today</th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                }
	
		while($row = mysqli_fetch_assoc($result)) 
		{
          
			
			
                         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                     {
                         echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td><a class="btn btn-success  " style="float:right" href="fleetEdit.php?id='.$row["id"].'">Edit</a></td>'.
                                               ' <td><img src="'.$row["url"].'" width="75px"/></td>'.
                                           ' <td>'.$row["regno"].'</td>'.
                                            '<td>'.$row["location"].'</td>'.
                                            '<td>'.$row["driverName"].'</td>'.
                                            '<td>'.$row["phone"].'</td>'.
                                            '<td>'.$row["bookingToday"].'<a class="btn btn-success btn-xs getBookD" style="float:right"   href="bookingDetails.php?id='.$row["id"].'">Details</a></td>

                               </tr>';
                     } 
                        else {

                        echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                          ' <td><img src="'.$row["url"].'" width="75px"/></td>'.
                                           ' <td>'.$row["regno"].'</td>'.
                                            '<td>'.$row["location"].'</td>'.
                                            '<td>'.$row["driverName"].'</td>'.
                                            '<td>'.$row["phone"].'</td>'.
                                            '<td>'.$row["bookingToday"].'<a class="btn btn-success btn-xs getBookD" style="float:right"  href="bookingDetails.php?id='.$row["id"].'">Details</a></td>

                               </tr>';
                        }
            }
           
       echo "</tbody>	</table></div>";
     }	
            
            
            
	
	
	
}
		
        
           

            

              
	 
       

        
    
        
      
        
        
        
  
        
        
        /////////////////////////////////// fleet table generation Ends///////////////////////////
   
    
	
	
    exit();

?>
