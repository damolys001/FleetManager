<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$make = "";
$selectfleetmodel="";
$name ="";
$f ="";
if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}

if(isset ($_REQUEST["make"]) ){ $make = $_REQUEST["make"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }

$query = "SELECT * FROM fleetmodel  ";

if ($make != ""){$query =$query = "SELECT distinct fleetmodel  FROM fleetmodel where make = '".$make."'  "; }



//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM fleetmodel  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
if ($make != "")
{  
    	header('Content-type: application/json');
	       $rows = array(); 
        while($r = mysqli_fetch_assoc($result)) 
        {
            $rows[] = $r;
        }
    print json_encode($rows);
}else 
{
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectfleetmodel == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["fleetmodel"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["fleetmodel"].'</option>';
			}
		}
	}
    
}
?>
