<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$refPayment = $_SESSION["paymentrefforUpdate"];
//$productid = $_GET["id"];
//$_SESSION["productid"] = $productid ;
$query = "SELECT * FROM upload WHERE referenceid = '$refPayment' and uploadtype ='payment' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	echo "<p>";
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			
/*echo '<li style="list-style:none"><a href="'. $row["url"].'" rel="gallery"  class="pirobox_gall" title="'. $row["detail"].'"><img style="height:100px; display:block; float:left;" src="'. $row["url"].'"  /></a></li>';
*/
			
			
			
	echo '<a class="fancybox" href="'. $row["url"].'" data-fancybox-group="gallery" title="'. $row["detail"].'"><img style="height:100px; display:block; float:left;"  src="'. $row["url"].'" alt="" /></a>';
			
			//echo '<img style="height:250px; width:auto; " src="'. $row["url"].'"/>';
		}
		echo "</p>";
	}
/* disconnect from the db */
	//@mysqli_close($link);
?>
