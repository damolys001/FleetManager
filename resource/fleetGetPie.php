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


 $query = "";

if ($opr == "department")
{
   $query = "
SELECT allocation ,count(*) 'data', 
(select department from department where fleet.allocation = department.id) 
label from fleet group by allocation, label "; 
}

if ($opr=="location")
{
     $query = " SELECT location ,count(*) 'data', 
(select location from location where fleet.location = location.id) 
label from fleet group by location, label ";
    
}


//echo  $query;

$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');

{
    if((strtolower ($f)=="json") ||(strtolower ($f)=="j"))
    {
        header('Content-type: application/json');
	    $rows = array();
         //$rowNum= 0;
        while($r = mysqli_fetch_assoc($result)) 
        {
            //$rowNum +=1;
            $rows[] = $r;
           
        }

	        
        print json_encode($rows );

    }
    
    
}
    
 




	
	
    exit();

?>
