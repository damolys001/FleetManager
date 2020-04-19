
<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$name ="";
$datenow = date("Y/m/d");
$dashboard = array(); 


if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }


if ($opr =="getlist" && (($f="j" )||($f="json" ) ))
{
    $query = "select * from fleet";
    $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
    header('Content-type: application/json');
	   $rows = array(); 
        while($r = mysqli_fetch_assoc($result)) 
        {
            $rows[] = $r;
        }
    print json_encode($rows);
    exit;
}


////Update approve trip to complete whose time has pass now 
$updateQuery = "update bookingLog set status ='Completed' where endTime < UNIX_TIMESTAMP() and status ='Approved'";
 $queryBkUpdHH = mysqli_query($link,$updateQuery) or die('Errant query:  '.$updateQuery);





$query = "select *,fleet.regno regno,  
(select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid limit 0,1)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid limit 0,1) phone ,
(select location from location  where location.id = fleet.location limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  ) bookingToday
from fleet where id ='".$id."'  ";

$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
if ($id != "")
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
    if(strtolower ($f)=="json")
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
        
        /////////////Do table Generation with status////////////////////////////
        
        $queryS = "select * from fleetStatus;"; //where `page_name` = '$pagename'
	$resultS = mysqli_query($link,$queryS) or die('Errant query:  '.$queryS);

	
	if(mysqli_num_rows($resultS)) 
	{
		
		
	
		while($rowS = mysqli_fetch_assoc($resultS)) 
		{
    
           $counter= 0;
             if (($opr != "dashboard"))
                {
    ?>
                
             <!--star Rating JS -->
     <script src="../vendor/star-rating/js/star-rating.min.js"></script>
   <link href="../vendor/star-rating/css/star-rating.min.css" rel="stylesheet" media="all" rel="stylesheet" type="text/css"/>
   <!-- .............-->
       
                
                
            <div class="col-lg-12">
    <h3><?php echo $rowS["fleetStatus"]?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="<?php echo $rowS["fleetStatus"]?>-table">
                    
         <?php 
                }
							
$query = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid limit 0,1)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid limit 0,1) phone ,
(select location from location  where location.id = fleet.location limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  and ( status ='Approved' or status ='Completed')) bookingToday,
(select count(fleetId) from myRating where fleetId = fleet.id) ratingCount,
(select sum(fleet) from myRating where fleetId = fleet.id) ratingSum,

(select count(driverId) from myRating where driverId = fleet.driverid) ratingCountDrv,
(select sum(driver) from myRating where driverId = fleet.driverid) ratingSumDrv
from fleet 
where status ='".$rowS["id"]."'"; //where `page_name` = '$pagename'
            
      if 	($rowS["id"]== "1") 
      {
          //available fleet
          $query = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid limit 0,1)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid limit 0,1) phone ,
(select location from location  where location.id = fleet.location limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and bookinglog.fleet = fleet.id and ( bookinglog.status ='Approved' or bookinglog.status ='Completed')) bookingToday,
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' limit 0,1) InterStateD,
(select count(fleetId) from myRating where fleetId = fleet.id) ratingCount,
(select sum(fleet) from myRating where fleetId = fleet.id) ratingSum,

(select count(driverId) from myRating where driverId = fleet.driverid) ratingCountDrv,
(select sum(driver) from myRating where driverId = fleet.driverid) ratingSumDrv
from fleet 
where status ='".$rowS["id"]."' and 
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id and ( status ='Approved' or status ='Completed') ) < 4  
";
          /*and(
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) <  '".$datenow."' OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) IS NULL OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) = '')*/
          
      //(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) < 4 and endDate < '".$datenow."'    
      }	
            
             if 	($rowS["id"]== "4") 
      {
          //booked Fleet
          $query = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid limit 0,1)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid limit 0,1) phone ,
(select location from location  where location.id = fleet.location limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  and ( status ='Approved' or status ='Completed')) bookingToday,
(select count(fleetId) from myRating where fleetId = fleet.id) ratingCount,
(select sum(fleet) from myRating where fleetId = fleet.id) ratingSum,

(select count(driverId) from myRating where driverId = fleet.driverid) ratingCountDrv,
(select sum(driver) from myRating where driverId = fleet.driverid) ratingSumDrv

from fleet 
where status ='".$rowS["id"]."' or 
(
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  and ( status ='Approved' or status ='Completed')) >= 4 )

";
          
          //or (
//(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) >=  '".$datenow."' )
    //echo $query;      
      }	
            
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{	
        if (($opr != "dashboard"))
        {
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
                                                <th>Bookings Today</th>
                                                <th>Fleet Rating</th>
                                                 <th>Driver Rating</th>
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
                                                <th>Bookings Today</th>
                                                <th>Driver Rating</th>

                                            </tr>
                                        </thead>
                                        <tbody>";
                }
	}
		while($row = mysqli_fetch_assoc($result)) 
		{
            $counter = $counter + 1;
			if (($opr != "dashboard"))
            {
            if ($row["ratingCount"] > 0 )
            {
			$theRating =  round($row["ratingSum"]/$row["ratingCount"],2);
            }
            else 
            {$theRating = 0;}
            
            if ($row["ratingCountDrv"] > 0 )
            {
                $theRatingDrv =  round($row["ratingSumDrv"]/$row["ratingCountDrv"],2);
            }
            else 
            {$theRatingDrv = 0;}
                
                
			
                         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                     {
                         echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td><a class="btn btn-success   " style="float:right" href="fleetEdit.php?id='.$row["id"].'">Edit Fleet</a><br/><br/>
                                           <a class="btn btn-success btn-xs  " style="float:right" href="driverEdit.php?id='.$row["DriverId"].'">Edit Driver</a>
                                           <br/><br/><button class="btn btn-danger btn-xs" style="float:right" onclick="delFleet('.$row["id"].')">Delete Fleet</button>
                                           </td>'.
                                               ' <td><table><tr><td><img src="'.$row["driverUrl"].'" width="75px"/></td><td><img src="'.$row["url"].'" width="75px"/></td></tr></table></td>'.
                                           ' <td>'.$row["regno"].'</td>'.
                                            '<td>'.$row["location"].'</td>'.
                                            '<td>'.$row["driverName"].'</td>'.
                                            '<td>'.$row["phone"].'</td>'.
                                            '<td>'.$row["bookingToday"].'<a class="btn btn-success btn-xs getBookD" style="float:right"   href="bookingDetails.php?id='.$row["id"].'">Details</a></td>
                                            <td>'.
                                '<label  class="control-label">'.$theRating.' from '.$row["ratingCount"].' Rating(s)</label>
<input class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled value="'.$theRating.'" /></td>

<td>'.
                                '<label  class="control-label">'.$theRatingDrv.' from '.$row["ratingCountDrv"].' Rating(s)</label>
<input class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled value="'.$theRatingDrv.'" /></td>

                               </tr>';
                     } 
                        else {

                        echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td><table><tr><td><img src="'.$row["driverUrl"].'" width="75px"/></td><td><img src="'.$row["url"].'" width="75px"/></td></tr></table></td>'.
                                           ' <td>'.$row["regno"].'</td>'.
                                            '<td>'.$row["location"].'</td>'.
                                            '<td>'.$row["driverName"].'</td>'.
                                            '<td>'.$row["phone"].'</td>'.
                                            '<td>'.$row["bookingToday"].'<a class="btn btn-success btn-xs getBookD" style="float:right"   href="bookingDetails.php?id='.$row["id"].'">Details</a></td>

<td>'.
                                '<label  class="control-label">'.$theRatingDrv.' from '.$row["ratingCountDrv"].' Rating(s)</label>
<input class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-size="xs" disabled value="'.$theRatingDrv.'" /></td>


                               </tr>';
                        }
            }
		}
		
        
            if (($opr != "dashboard"))
                {

            echo "</tbody>	</table></div>";

               }
	 
       }
            
            $dashboard += array ($rowS["fleetStatus"] => $counter);
        }
    
        
        if (($opr == "dashboard"))
                {

           header('Content-type: application/json');
	        
        print json_encode($dashboard );

               }
        
        
        
    }
        
        
        /////////////////////////////////// fleet table generation Ends///////////////////////////
    }
    }
    
    
	
	
    exit();

?>
