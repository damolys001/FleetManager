<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$f ="";
if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}



//$name = $_SESSION["role"];
// $selectdepartment = $_SESSION["productdepartment"]; 
$query = "SELECT * FROM department  ";
	
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
			if ($selectdepartment == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["department"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["department"].'</option>';
			}
		}
	}
    }
?>
