<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$f ="j";
$id ="";
$userid = "";
$selectuser="";
if (isset ($_SESSION["userid"])) $userid = $_SESSION["userid"];
$roleUpdater = $_SESSION["role"];
$opr="";

if (isset($_REQUEST["id"])){$id=$_REQUEST["id"];}

if (isset($_REQUEST["f"])){$f=strtolower ($_REQUEST["f"]);}
if (isset($_REQUEST["opr"])){$opr=$_REQUEST["opr"];}

if (($id == "undefined") ||($id =="")) {$id=$userid; }
if (($roleUpdater == "1")||($roleUpdater == "2")){}else {$id=$userid;} 



$query = "SELECT id,CONCAT_WS(' ',namef,namel) UserName, namef,namel,sex, location, department,nameo,email,approver1,approver2,approver3,role,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
(select location from location where id = main.location) locationName,
(select google_picture_link from google_users where google_email = main.email) url

FROM user main where id='".$id."'  order by CONCAT_WS(' ',namef,namel) asc  ";


if ($opr=="getlist"){
$query = "SELECT id, CONCAT_WS(' ',namef,namel) UserName,namef,namel, sex, location, department,nameo,email,approver1,approver2,approver3,role,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
(select location from location where id = main.location) locationName,
(select google_picture_link from google_users where google_email = main.email) url
FROM user main  order by CONCAT_WS(' ',namef,namel) asc  ";
}


//if ($_SESSION["role"] == 1) {$query = "SELECT * FROM user  ";} else { $query = "SELECT * FROM role where id <> 1 ";}

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
			if ($selectuser == $row["id"]) 
			{
			echo '<option selected="selected" value="'.$row["id"].'" >'.$row["UserName"].'</option>';
			}
			else 
			{
			echo '<option value="'.$row["id"].'" >'.$row["UserName"].'</option>';
			}
		}
	  }
    }
?>
