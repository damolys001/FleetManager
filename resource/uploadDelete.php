<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$deleteId ="";
$myRefUrl ="";

if(isset($_SESSION["DelId"])){$deleteId = $_SESSION["DelId"];}
//if(isset ($_REQUEST["DelId"])){$deleteId = $_REQUEST["DelId"];}
if(isset ($_REQUEST["type"])){$uploadtype = $_REQUEST["type"];}


//CheckFileExist("payment","untitled.html");

//delete Physical from the file
    $query = "SELECT * FROM upload WHERE id = '$deleteId'  ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{while($row = mysqli_fetch_assoc($result)) 
		{
		unlink($row["url"]);
            //set ref id 
            $myRefUrl = $row["referenceid"];
		}
	}
	
	
//delete link from database	
$query = "delete FROM upload WHERE id = '$deleteId'  ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	//if(mysqli_num_rows($result)) 
	//{
		//unlink($row["url"]);
	//}
	
	
	
	////GET THE NEW LIST
	$name = $_SESSION["name"];
//$myRef = $_SESSION["uploadid"];
if (isset ($_SESSION["uploadid"]))$myRef = $_SESSION["uploadid"];
if (isset ($_SESSION["uploadtype"]))$uploadtype = $_SESSION["uploadtype"];


//CheckFileExist("payment","untitled.html");


$query = "SELECT * FROM upload WHERE referenceid = '$myRefUrl' and uploadtype ='$uploadtype' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	echo "<p>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			
/*echo '<li style="list-style:none"><a href="'. $row["url"].'" rel="gallery"  class="pirobox_gall" title="'. $row["detail"].'"><img style="height:100px; display:block; float:left;" src="'. $row["url"].'"  /></a></li>';
*/
			
			
			
	echo '<div style=" width:120px; float:left; "><a class="fancybox" href="'. $row["url"].'" data-fancybox-group="gallery" title="'. $row["detail"].'"><img style="width:115px; display:block; float:left;border-radius:5px; margin:2px; "  src="'. $row["url"].'" alt="" /></a>
	<a class="picdeleteid" id="'.$row["id"].'" ><span class=" btn btn-danger btn-xs ">Delete <span class="glyphicon glyphicon-trash"></span></span></a>
	
	</div>';
			
			//echo '<img style="height:250px; width:auto; " src="'. $row["url"].'"/>';
		}
		echo "</p>";
	}


	
?>

