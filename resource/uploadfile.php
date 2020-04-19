<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$name = $_SESSION["name"];
$uploadid = $_SESSION["uploadid"];
$uploadtype = $_SESSION["uploadtype"];

//CheckFileExist("payment","untitled.html");

if ($uploadtype=="payment") {
	$path = $_FILES['userImage']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
	$filename = $_SESSION["paymentrefforUpdate"].'.'.$ext ;
	$myRef = $_SESSION["paymentrefforUpdate"];
	}
	else if ($uploadtype=="order")
	{
	$path = $_FILES['userImage']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
	$filename = $_SESSION["ref"].'.'.$ext ;
	$myRef = $_SESSION["ref"];
	}
	else {
	$path = $_FILES['userImage']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
	$filename = $uploadid.'.'.$ext ;
	$myRef = $uploadid;
	}
	
	
$uploadFIle = CheckFileExist($uploadtype,$filename,0);
$datenow = date("Y/m/d");

    if ( 0 < $_FILES['userImage']['error'] ) {
        echo 'Error: ' . $_FILES['userImage']['error'] . '<br>';
    }
    else {
        move_uploaded_file($_FILES['userImage']['tmp_name'], $uploadFIle );
    }

 function CheckFileExist ($type,$filename,$startAt)
{
	$part0 = "../uploads/$type/$startAt-" . $filename;
	for ($x = $startAt; $x <= 100; $x++) 
	{ 
	
		$part = "../uploads/$type/$x-" . $filename;
		
        $fileexitr = file_exists($part);
			if ($fileexitr  == false )
			{	//$mynext = $x + 1;
			    $part = "../uploads/$type/$x-" . $filename;	
						
				//echo $part."<br/>"; 
				return $part; //CheckFileExist ($type,$part,$mynext); 
				break;
			}
			else
			{
				// echo $x."<br/>";
			}
	}
		//echo $part0;
        return $part0;
}


$query = "insert into upload (`referenceid`,`uploadtype`,`url`,`created`,`createdby`) values ('$myRef','$uploadtype','$uploadFIle','$datenow','$name') ";
		$mode ="saved";



if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 
if ($mode == "updated") {echo "updated" ;} else {//echo "saved";
} 
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}




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
	//echo '<a class="fancybox" href="'. $row["url"].'" data-fancybox-group="gallery" title="'. $row["detail"].'"><img style="height:100px; display:block; float:left;"  src="'. $row["url"].'" alt="" /></a>';
			
			//echo '<img style="height:250px; width:auto; " src="'. $row["url"].'"/>';
		}
		echo "</p>";
	}


?>

<!--<img style="height:250px; width:auto; " src="<?php echo $uploadFIle; ?>"/>-->