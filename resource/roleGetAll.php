<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$myrole = $_SESSION["role"];
$f="";


if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}


if ($myrole == 1) {$query = "SELECT * FROM role  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

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
            if ($myrole == $row["id"])
            {
                echo '<option value="'.$row["id"].'"  selected>'.$row["detail"].'</option>';
            }
            else 
            {
			echo '<option value="'.$row["id"].'" >'.$row["detail"].'</option>';
                }
		}
        }
	}
?>
