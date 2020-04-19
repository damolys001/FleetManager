
 <!-- jquery UI-->
 <!-- <script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui-1.9.2.custom.js"></script>-->
  
   <script src="../vendor/star-rating/js/star-rating.min.js"></script>
   <link href="../vendor/star-rating/css/star-rating.min.css" rel="stylesheet" media="all" rel="stylesheet" type="text/css"/>
   <!-- .............-->
<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$userid  ="";
$datenow = date("Y/m/d");
$dashboard = array(); 


//get now time & date
$userTimeZone ="GMT+1";
$timezone = new \DateTimeZone($userTimeZone);
$date = new \DateTime('@' . time(), $timezone);
$date->setTimezone($timezone);
$now = $date->getTimestamp() + $date->getOffset();




if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
//if(isset ($_SESSION["userid"]) ){ $userid = $_SESSION["userid"]; }

////getting id
$userid = $_SESSION["userid"];
$roleUpdater = $_SESSION["role"];
if (isset($_REQUEST["id"])){$id=$_REQUEST["id"];}
if (isset($_REQUEST["opr"])){$opr=$_REQUEST["opr"];}
//if (($id == "undefined") ||($id =="")) {$id=$userid; }
//if (($roleUpdater == "1")||($roleUpdater == "2")){}else {$id=$userid;} 

//echo $id;

//if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }


$MakeModel="";
$regNo="";
$color="";
$year ="";
$url="";
$driverName ="";
$driverUrl ="";
$phone ="";
$phone2 ="";
$driversLicenseNo ="";
$expiryDate="";
$location="";
$approverName="";
$rateDriver="";
$rateFleet="";
$disablerating ="disabled";


///Get detail of the trip
$query = "select *,
(select regno from fleet where fleet.id =  bookinglog.fleet )regNo ,   
(select color from fleet where fleet.id =  bookinglog.fleet )color ,  
(select year from fleet where fleet.id =  bookinglog.fleet )year ,  
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  bookinglog.fleet )MakeModel , 
(select url from upload,fleet where uploadtype = 'fleet' and  fleet.id =  bookinglog.fleet  and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookinglog.driver)driverName , 
(select url from driver,upload where driver.id = bookinglog.driver and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = bookinglog.driver) phone ,
(select PhoneNo2 from driver  where driver.id = bookinglog.driver) Phone2 ,


(select driversLicenseNo from driver  where driver.id =  bookinglog.driver) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  bookinglog.driver) expiryDate 

from bookinglog where id ='".$id."' ";
    
//(select location from location,fleet  where location.id = fleet.location and fleet.id = bookinglog.fleet) location,
    
    $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
    {
        
		while($row = mysqli_fetch_assoc($result)) 
		{
            /// set Variable
            
$MakeModel=$row["MakeModel"];
$regNo=$row["regNo"];
$color=$row["color"];
$year =$row["year"];
$url=$row["url"];
$driverName =$row["driverName"];
$driverUrl =$row["driverUrl"];
$phone =$row["phone"];
$phone2 =$row["Phone2"];
$driversLicenseNo =$row["driversLicenseNo"];
$expiryDate=$row["expiryDate"];
$location=$row["location"];
            
   //set disable acction
   if ($row["user"] == $_SESSION["userid"]){$disablerating ="";}
       
        
    }
    
    
  }          
  
  
  ///get rating detail 
  $queryDri = "select * from myRating where referenceid = '$id' " ;
    $resultDri = mysqli_query($link,$queryDri) or die('Errant query:  '.$queryDri);     
if(mysqli_num_rows($resultDri)) 
	{while($row = mysqli_fetch_assoc($resultDri)) 
		{
		  $rateDriver = $row["driver"];
          $rateFleet = $row["fleet"];
          
		}
  }


  
  
?>
<input  type="hidden" id="tripId" value="<?php echo $id;?>"/>
 <div class="row">
      <br/>   <br/>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Driver Infomation
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-4">
                            <img style="max-width: 150px;" src="<?php echo $driverUrl ?>"/>
                            </div>
                            <div  class="col-lg-8">
                            <b>Name:</b><?php echo $driverName ?> <br/>
                                 <b>Phone:</b><?php echo $phone ?> <br/>
                                <b>Phone2:</b><?php echo $phone ?> <br/>
                                 <b>License Expiry Date:</b><?php echo $expiryDate ?> <br/>
                                 
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
      
      
      
       <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Car Infomation
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-4">
                            <img style="max-width: 150px;" src="<?php echo $url ?>"/>
                            </div>
                            <div  class="col-lg-8">
                            <b>Make & Model:</b><?php echo $MakeModel ?> <br/>
                                 <b>Year:</b><?php echo $year ?> <br/>
                                 <b>Colour:</b><?php echo $color ?> <br/>
                                        <b>Reg No:</b><?php echo $regNo ?> <br/>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
      
      
      
      
</div>


<label for="input-d" class="control-label">Rate This Driver</label>
<input id="input-d" name="input-d" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" <?php echo $disablerating; ?> value="<?php echo $rateDriver?>" />

<label for="input-c" class="control-label">Rate This Car</label>
<input id="input-c" name="input-c" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" <?php echo $disablerating; ?> value="<?php echo $rateFleet?>"/>

<hr/>
<?php
/*$to_time = strtotime("2008-12-15 10:42:00");
$from_time = strtotime("2008-12-13 10:21:00");
echo round(abs($to_time - $from_time) / 60,2). " minute";

$start_date = new DateTime('2007-09-01 04:10:58');
$since_start = $start_date->diff(new DateTime('2012-09-11 10:25:00'));
echo $since_start->days.' days total<br>';
echo $since_start->y.' years<br>';
echo $since_start->m.' months<br>';
echo $since_start->d.' days<br>';
echo $since_start->h.' hours<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';
*/

?>
 <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat" id="myBookingLogComment">
<?php
$query = "select *,
(select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
(select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  
from mycomment where referenceid ='$id' and cmtype ='bookingLog' ";
 $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
if(mysqli_num_rows($resultDri)) 
	{
?>
          
                            <?php 
                            while($row = mysqli_fetch_assoc($resultDri)) 
		{
		  if($row["user"]== $userid) {$align = "right"; }else {$align="left";}
          $date = new DateTime();
          $date->setTimestamp($now);
          $start_date = new DateTime($row["time_created"]);
          $since_start = $start_date->diff($date);
        
          if ($since_start->d == 0){$theTime=$since_start->h."hrs ".$since_start->i."mins ago"; }
          else
          {$theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
          
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>"  width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div>
                                        <p>
                                            <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
<?php 
        }
}
?>       
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="cmtDetail" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Comment
                                    </button>
                                </span>
                            </div>
                        </div>
                        <br /> <br /> <br />
                        <!-- /.panel-footer -->
                        
                        
                        
                        <script>
                          $('#input-d').change(function() {
    
     var rateNow = $("#input-d").val()
     var id = $("#tripId").val()
     
 $.ajax({
            type:"POST",
            url:"../resource/fleetBookApproved.php" ,
            data:"&opr=rateDriver&rateDriver="+rateNow+"&id="+id,
            success:function(data)
			{ 
             swal('Info',data, 'info')
			}
			
         });
    
    
});

 $('#input-c').change(function() {
    
     var rateNow = $("#input-c").val()
     var id = $("#tripId").val()
     
 $.ajax({
            type:"POST",
            url:"../resource/fleetBookApproved.php" ,
            data:"&opr=rateFleet&rateFleet="+rateNow+"&id="+id,
            success:function(data)
			{ 
             swal('Info',data, 'info')
			}
			
         });
    
    
});
     
     
$('#btn-chat').click(function () {
   var detail = $("#cmtDetail").val()
     var id = $("#tripId").val()
     
 $.ajax({
            type:"POST",
            url:"../resource/commentSave.php" ,
            data:"&opr=bookingComment&detail="+detail+"&id="+id,
            success:function(data)
			{ 
			 //swal('',data)
			 $("#myBookingLogComment").html(data)
             //swal('Info',data, 'info')
             $("#cmtDetail").val("")
			}
			
         }); 
    
})

setInterval(refreshMessages, 30000);
function refreshMessages() {
         var id = $("#tripId").val()
  $.ajax({
            type:"POST",
            url:"../resource/commentSave.php" ,
            data:"&opr=bookingComRefresh"+"&id="+id,
            success:function(data)
			{ 
			 //swal('',data)
			 $("#myBookingLogComment").html(data)
             //swal('Info',data, 'info')
             //$("#cmtDetail").val("")
			},
    error: function() {
      $('#myBookingLogComment').prepend('Error retrieving new messages..');
    }
			
         });
}

$('#cmtDetail').keypress(function(e){
      if(e.keyCode==13)
      $('#btn-chat').click();
    });
                        </script>
                        
<?php
      exit();
?>
