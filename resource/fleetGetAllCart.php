<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$w="";

$selectfleetmodel="";
$name ="";
$datenow = date("Y/m/d");
$dashboard = array(); 




if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }
if(isset ($_REQUEST["w"]) ){ $w = $_REQUEST["w"]; }


if ($w == ""){
$monday = date( 'Y/m/d', strtotime( 'monday this week' ) );
    
    }else
{
   $monday = week_start_date($w, date("Y") );
}
$tue = date('Y/m/d', strtotime('+1 days', strtotime($monday)));
$wed = date('Y/m/d', strtotime('+2 days', strtotime($monday)));
$thur = date('Y/m/d', strtotime('+3 days', strtotime($monday)));
$fri = date('Y/m/d', strtotime('+4 days', strtotime($monday)));
$sat = date('Y/m/d', strtotime('+5 days', strtotime($monday)));
$sun = date('Y/m/d', strtotime('+6 days', strtotime($monday)));





//(select 0 into @rownum);


$query = "
select  DATE_FORMAT(startDate,'%Y-%m-%d') Day, dayname(startDate) DayName, startDate DayDate,
(select COUNT(startDate) from bookinglog where startDate = m.startDate  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = m.startDate  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = m.startDate  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = m.startDate  and status = 'Completed') 'Completed'
from bookinglog m
where startDate between '$monday' and '$sun' 
GROUP by m.startDate, startDate 
";

/*
from php my admin
select DISTINCT DATE_FORMAT('2017/02/06','%Y-%m-%d') Day, dayname('2017/02/06') DayName, '2017/02/06' DayDate,
(select COUNT(startDate) from bookinglog where startDate ='2017/02/06' and status = 'Pending') 'Unapproved', 
(select COUNT(startDate) from bookinglog where startDate ='2017/02/06' and status = 'Approved') 'Approved', 
(select COUNT(startDate) from bookinglog where startDate ='2017/02/06' and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '2017/02/06' and status = 'Completed') 'Completed' 
from bookinglog m
*/



$query = "
select  DISTINCT   DATE_FORMAT('$monday','%Y-%m-%d') Day, dayname('$monday') DayName, '$monday' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$monday'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$monday'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$monday'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$monday'  and status = 'Completed') 'Completed'
from bookinglog m


union 
select  DISTINCT  DATE_FORMAT('$tue','%Y-%m-%d') Day, dayname('$tue') DayName, '$tue' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$tue'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$tue'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$tue'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$tue'  and status = 'Completed') 'Completed'
from bookinglog m


union 
select  DISTINCT  DATE_FORMAT('$wed','%Y-%m-%d') Day, dayname('$wed') DayName, '$wed' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$wed'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$wed'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$wed'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$wed'  and status = 'Completed') 'Completed'
from bookinglog m


union 
select  DISTINCT  DATE_FORMAT('$thur','%Y-%m-%d') Day, dayname('$thur') DayName, '$thur' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$thur'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$thur'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$thur'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$thur'  and status = 'Completed') 'Completed'
from bookinglog m


union 
select  DISTINCT  DATE_FORMAT('$fri','%Y-%m-%d') Day, dayname('$fri') DayName, '$fri' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$fri'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$fri'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$fri'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$fri'  and status = 'Completed') 'Completed'
from bookinglog m


union 
select  DISTINCT  DATE_FORMAT('$sat','%Y-%m-%d') Day, dayname('$sat') DayName, '$sat' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$sat'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$sat'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$sat'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$sat'  and status = 'Completed') 'Completed'
from bookinglog m
 

union 
select  DISTINCT  DATE_FORMAT('$sun','%Y-%m-%d') Day, dayname('$sun') DayName, '$sun' DayDate,
(select COUNT(startDate) from bookinglog where startDate = '$sun'  and status = 'Pending') 'Unapproved',
(select COUNT(startDate) from bookinglog where startDate = '$sun'  and status = 'Approved') 'Approved',
(select COUNT(startDate) from bookinglog where startDate = '$sun'  and status = 'Cancelled') 'Cancelled',
(select COUNT(startDate) from bookinglog where startDate = '$sun'  and status = 'Completed') 'Completed'
from bookinglog m



";
//GROUP by m.startDate, startDate 

//echo $query;
//echo  $query;

$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
if ($id != "")
{  
    	header('Content-type: application/json');
	   $rows = array(); 
        $rowNum= 0;
        while($r = mysqli_fetch_assoc($result)) 
        {
            $rows[] = $r;
            
            
        }
    print json_encode($rows);
}
else 
{
    if((strtolower ($f)=="json") ||(strtolower ($f)=="j"))
    {
        header('Content-type: application/json');
	    $rows = array();
         $rowNum= 0;
        while($r = mysqli_fetch_assoc($result)) 
        {
            $rowNum +=1;
            $rows[] = $r;
           // $rows[][$rowNum-1] += "myDay"=> $rowNum ;
        }
        print json_encode($rows);
    }
    
    
}
    
    
/**
 * Get starting date from week number and year
 * Monday is first day of week
 *
 * @param unknown_type $wk_num
 * @param unknown_type $yr
 * @param unknown_type $first
 * @param unknown_type $format
 * @return unknown
 */
function week_start_date($week, $year, $format = 'Y/m/d', $date = FALSE) {
    
    if ($date) {
        $week = date("W", strtotime($date));
        $year = date("o", strtotime($date));
    }

    $week = sprintf("%02s", $week);

    $desiredMonday = date($format, strtotime("$year-W$week-1"));

    return $desiredMonday;
}





	
	
    exit();

?>
