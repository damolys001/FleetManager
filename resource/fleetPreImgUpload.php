<?php 
$id = "";
If (isset ($_SESSION["uploadid"])) {$id =$_SESSION["uploadid"];}
$desc = str_replace( "'","''",$_REQUEST["regNo"]);
$prodname = str_replace( "'","''",$_REQUEST["chasisNo"]);
$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";



if ($prodname == "" ) {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$productid = $id; //$_SESSION["productid"];

if ($productid == "" ) {

//Check if product name exit
$queryCheck = "select * from fleet where chasisNo = '$prodname'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			$id = $row["id"];
			$query = "update fleet set  updated ='$datenow', updatedby ='$name' where chasisNo ='$prodname'";
			$mode ="updated";
			if ($conn->query($query) === TRUE) {}
			
		}
	}
	else
	{
		$query = "insert into fleet (`chasisNo`,`regNo`,`created`,`createdby`) values ('$prodname','$desc','$datenow','$name');  ";
		$mode ="saved";
		if ($conn->query($query) === TRUE) 
		{
			 $last_id = $conn->insert_id;
			 $id = $last_id;
			 
		}
	}
}


else {
	$query = "update fleet set  chasisNo = '$prodname', updated ='$datenow', updatedby ='$name' where id ='$productid'";
	$mode ="updated";
	if ($conn->query($query) === TRUE) {}
	}








	 if ($mode == "updated" or $mode == "saved") { echo $id;} //else {echo "saved";} 
//}
 else 
{
    //echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}
}

///set session variable fro uplaod
$_SESSION["uploadid"] = $id ;
$_SESSION["uploadtype"] = 'fleet' ;
 
?>