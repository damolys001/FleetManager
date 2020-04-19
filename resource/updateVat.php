<?php 
$myrate = $_GET["myrate"];


include_once "../reuseable/connect_db_link.php";

$query = "update vat_rate set myrate ='$myrate' where id = 1 ";
	/*$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["detail"];
		}
	}*/
/* disconnect from the db */
	//@mysqli_close($link);
	
	
	
	if ($conn->query($query) === TRUE) {
     echo "Successfully Updated";
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}
?>