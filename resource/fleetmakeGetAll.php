<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$selectfleetmake = "";
$name = "";
$f ="";
if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}


if (isset ($_SESSION["productfleetmake"])){$selectfleetmake = $_SESSION["productfleetmake"]; }
if (isset ($_SESSION["userid"])){$name = $_SESSION["userid"]; }

$query = "SELECT * FROM fleetmake";


//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM fleetmake  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

	$result = mysqli_query($link,$query) or die('<option >'.'Errant query:  '.$query.'</option>');
	
	
	if(mysqli_num_rows($result)) 
	{
	
        if (($f=="j")||($f=="json")) 
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
        
		while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectfleetmake == $row["fleetmake"]) 
			{
			echo '<option selected="selected" value="'.$row["fleetmake"].'" >'.$row["fleetmake"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["fleetmake"].'" >'.$row["fleetmake"].'</option>';
			}
		}
	   }
    }
?>
