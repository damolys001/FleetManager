
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

if ($opr=="getUnrated")
{
    ///Check if user have an unapprove rating
$queryBkAct = "select * from  bookinglog where user ='".$name."' and status = 'Completed' and (select count(referenceid) from myRating where referenceid = bookingLog.id) = 0 " ; //  and fleet = '".$id."' 
$resultBkAct = mysqli_query($link,$queryBkAct) or die('Errant query:  '.$queryBkAct);     
  $counter = 0;
if(mysqli_num_rows($resultBkAct)) 
	{	
	 
		while($row= mysqli_fetch_assoc($resultBkAct)) 
		{    $counter += 1;
           
        }
        }//echo "You currently have  $countUnrated  unrated completed trip(s). Please rate the driver and the car before making another booking <a class='btn btn-warning' href='mybookings.php'>My Bookings</a>";
    $rows = array(); 
    header('Content-type: application/json');
    $rows  = array ("unrated" => $counter);
    print json_encode($rows);
    exit;
    

}



if ($opr=="getUnapproved")
{
    ///Check if user have an unapprove rating
$queryBkAct = "select * from bookinglog where 
(
(select approver1 from user where user.id =  bookinglog.user)  = '".$name."' or 
(select approver2 from user where user.id =  bookinglog.user)  = '".$name."' or 
(select approver3 from user where user.id =  bookinglog.user)  = '".$name."' 
) 

and  createdForD  = '$datenow' and status='Pending'
 "; $resultBkAct = mysqli_query($link,$queryBkAct) or die('Errant query:  '.$queryBkAct);     
 $counter = 0;
if(mysqli_num_rows($resultBkAct)) 
	{	
	  
		while($row= mysqli_fetch_assoc($resultBkAct)) 
		{    $counter += 1;
           
        }
        } //echo "You currently have  $countUnrated  unrated completed trip(s). Please rate the driver and the car before making another booking <a class='btn btn-warning' href='mybookings.php'>My Bookings</a>";
     
    header('Content-type: application/json');
     $dashboard += array ('unapprove' => $counter);
    print json_encode($dashboard);
    exit;
   

}




	
	
    exit();

?>
