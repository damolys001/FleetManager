<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["role"];
$f ="";
if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}

 //$selectfleetStatus = $_SESSION["productfleetStatus"]; 
$query = "SELECT * FROM fleetStatus  ";
//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM fleetStatus  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

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
			if ($selectfleetStatus == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["fleetStatus"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["fleetStatus"].'</option>';
			}
		}
	}
    }
?>
