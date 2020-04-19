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


if ($opr=="bookingComment")
{
     if ($detail==""){}else{
   $detail= str_replace ( "'","''",$detail);
         $querAuthoriszed ="insert into mycomment (cmtype,referenceid,detail,user) values ('bookingLog', '$id','$detail','$userid ')";
               if ($conn->query($querAuthoriszed) === TRUE){} 
               // $resultBkActe = mysqli_query($link, $querAuthoriszed) or die('Errant query:  '.$querAuthoriszed); 
               
               // if(mysqli_num_rows($resultBkActe)) 
                            	//else {echo $conn->errors;}
                                }
    //// pull the comment
    {
                    //echo "You have rated this car successfuly";
                    $query = "select *,
                            (select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
                            (select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  
                            from mycomment where referenceid ='$id' and cmtype ='bookingLog'  order by id desc";
                            $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
                            if(mysqli_num_rows($resultDri)) 
                            	{
                            ?>
           <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
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
                                  { $theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
                                  
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div> <br />
                                        <p>
                                            <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
                        <?php 
                                }
                        }
                        
                }
    
    
}




if ($opr=="bookingComRefresh")
{
    
        
                    //echo "You have rated this car successfuly";
                    $query = "select *,
                            (select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
                            (select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  
                            from mycomment where referenceid ='$id' and cmtype ='bookingLog'  order by id desc";
                            $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
                            if(mysqli_num_rows($resultDri)) 
                            	{
                            ?>
           <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
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
                                  { $theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
                                  
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div>
                                        <br />
                                        <p>
                                            <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
                        <?php 
                                }
                        }
                        
                }//else {echo $conn->errors;}
    
    





//////////////FLEET COMMENT SAVEE///////////////////

if ($opr=="fleetComment")
{
    if ($detail==""){}else{
   $detail= str_replace ( "'","''",$detail);
         $querAuthoriszed ="insert into mycomment (cmtype,referenceid,detail,user) values ('fleet', '$id','$detail','$userid ')";
               if ($conn->query($querAuthoriszed) === TRUE) 
               // $resultBkActe = mysqli_query($link, $querAuthoriszed) or die('Errant query:  '.$querAuthoriszed); 
               {}}
               
              ///// pull out the comment 
               {
                    //echo "You have rated this car successfuly";
                    $query = "select *,
                            (select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
                            (select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  
                            from mycomment where referenceid ='$id' and cmtype ='fleet'  order by id desc";
                            $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
                            if(mysqli_num_rows($resultDri)) 
                            	{
                            ?>
           <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
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
                                  { $theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
                                  
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div>  <br />
                                        <p>
                                            <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
                        <?php 
                                }
                        }
                        
                }
               // if(mysqli_num_rows($resultBkActe)) 
                            	//else {echo $conn->errors;}
    
    
}




if ($opr=="fleetComRefresh")
{
    
        
                    //echo "You have rated this car successfuly";
                    $query = "select *,
                            (select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
                            (select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  
                            from mycomment where referenceid ='$id' and cmtype ='fleet'  order by id desc";
                            $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
                            if(mysqli_num_rows($resultDri)) 
                            	{
                            ?>
           <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
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
                                  { $theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
                                  
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div>  <br />
                                        <p>
                                            <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
                        <?php 
                                }
                        }
                        
                }//else {echo $conn->errors;}
    
    






if ($opr=="dashboardRefresh")
{
    
        
                    //echo "You have rated this car successfuly";
                    $query = "select *,
                            (select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = mycomment.user)  ) userUrl, 
                            (select CONCAT_WS(' ',namef,namel) from user where user.id =  mycomment.user) userName  ,
                            (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id =  mycomment.referenceid) fleetName
                            from mycomment where cmtype ='fleet'  order by id desc";
                            $resultDri = mysqli_query($link, $query ) or die('Errant query:  '.$query ); 
                            if(mysqli_num_rows($resultDri)) 
                            	{
                            ?>
           <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
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
                                  { $theTime=$since_start->d."days ". $since_start->h."hrs ".$since_start->i."mins ago";}
                                  
                            ?>
                                <li class="<?php echo $align;?> clearfix">
                                    <span class="chat-img pull-<?php echo $align;?>">
                                        <img src="<?php echo $row["userUrl"];?>" width="50" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?php echo $row["userName"];?></strong>
                                            <small class="pull-<?php echo $align;?> text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> <?php echo $theTime; ?>
                                            </small>
                                        </div>  <br />
                                        <p>
                                            <a href="bookingDetails.php?id=<?php echo $row["referenceid"];?>" class="green btn btn-info btn-xs" >@<?php echo $row["fleetName"];?></a> <?php echo $row["detail"];?>
                                        </p>
                                    </div>
                                </li>
                                
                        <?php 
                                }
                        }
                        
                }//else {echo $conn->errors;}
    
    


exit;


?>
