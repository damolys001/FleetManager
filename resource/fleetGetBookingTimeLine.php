<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$w="";
$n="";

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
if(isset ($_REQUEST["n"]) ){ $n = $_REQUEST["n"]; }





//(select 0 into @rownum);


$query = "
select  *
from bookinglog m
where created = '$name'  
limit 0, 10  
";

if ($n != "")
{
   $query = "
select  *
from bookinglog m
where created = '$name'  
limit ".$n+1 .",".$n+10 ."  
"; 
}


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
