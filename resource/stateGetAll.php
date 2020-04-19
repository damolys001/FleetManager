<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$f ="";


if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}

$query = "SELECT * FROM state  ";


//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM state  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

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
	
		/*while($row = mysqli_fetch_assoc($result)) 
		{ 
			if ($selectstate == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["state"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["state"].'</option>';
			}
		}*/
	  }
    }
?>
