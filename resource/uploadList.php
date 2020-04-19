<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];
$myRef ="";
$uploadtype ="";

if (isset($_SESSION["uploadid"])) {$myRef = $_SESSION["uploadid"];}
if (isset($_SESSION["uploadtype"])) {$uploadtype = $_SESSION["uploadtype"];}

if (isset($_REQUEST["id"])) {$myRef = $_REQUEST["id"];}
if (isset($_REQUEST["type"])) {$uploadtype = $_REQUEST["type"];}


//CheckFileExist("payment","untitled.html");


$query = "SELECT * FROM upload WHERE referenceid = '$myRef' and uploadtype ='$uploadtype' ";
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

<!--<img style="height:250px; width:auto; " src="<?php echo $uploadFIle; ?>"/>-->