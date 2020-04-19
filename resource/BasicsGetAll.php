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


$query = "select * from shop_basic where id ='".$id."'  ";
$result = mysqli_query($link,$query) or die('Errant query:  '.$query.'');

if ($opr ==""){

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
    
  
    
}
}

else if ($opr =="getExtEmail")
{
   
$query = "select * from shop_ExtMailClient where id ='".$id."'  ";
$result = mysqli_query($link,$query) or die('Errant query:  '.$query.'');
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
}
    
	
	
    exit();

?>
