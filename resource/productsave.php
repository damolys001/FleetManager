<?php 
//$product = $_GET["product"];
//$price = $_GET["price"];


/*myproduct,
description,
myprice,
mypriceCompare,
ckBoxTax,
sku,
Barcode,
quantity,
visibility,
facebook,
mobile,
online,
dateOfPublish,
timeOfPublish,
brand,
Category,
template*/

$myproduct = $_REQUEST["myproduct"];
$description = str_replace("'","''",$_REQUEST["description"]);  
echo $_REQUEST["description"];
$description = str_replace("&quot;","",$description);
$myprice = $_REQUEST["myprice"];
$mypriceCompare = $_REQUEST["mypriceCompare"];
$ckBoxTax = $_REQUEST["ckBoxTax"];
$sku = $_REQUEST["sku"];
$Barcode = $_REQUEST["Barcode"];
$quantity = $_REQUEST["quantity"];
$visibility = $_REQUEST["visibility"];
$facebook = $_REQUEST["facebook"];
$mobile = $_REQUEST["mobile"];
$online = $_REQUEST["online"];
$dateOfPublish = $_REQUEST["dateOfPublish"];
$timeOfPublish = $_REQUEST["timeOfPublish"];
$brand = $_REQUEST["brand"];
$Category = $_REQUEST["Category"];
$template = $_REQUEST["template"];


if ($myproduct == "") {// exit;

}



$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";

if ($myproduct == "" || $myprice =="") { echo "Error: Price or product name not set";}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$productid = $_SESSION["prodid"];


if ($productid == "" ) {

//Check if product name exit
$queryCheck = "select * from product where product = '$myproduct'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			$query = "update product set 
			product = '$myproduct',
			detail  = '$description',
			price = '$myprice',
			priceCompare = '$mypriceCompare',
			taxApply = '$ckBoxTax',
			sku = '$sku',
			barcode = '$Barcode',
			quantity = '$quantity',
			visibility = '$visibility',
			visibility_facebook = '$facebook',
			visibility_mobileapp = '$mobile',
			visibility_online = '$online',
			publishDate = '$dateOfPublish',
			publishTime = '$timeOfPublish',
			brand = '$brand',
			category = '$Category',
			template = '$template'

 			where product ='$myproduct'";

			
			$mode ="updated";
		}
	}
	else
	{
		$query = "insert into product (product,
										detail ,
										price,
										priceCompare,
										taxApply,
										sku,
										barcode,
										quantity,
										visibility,
										visibility_facebook,
										visibility_mobileapp,
										visibility_online,
										publishDate,
										publishTime,
										brand,
										category,
										template
										) values (
										'$myproduct',
										'$description',
										'$myprice',
										'$mypriceCompare',
										'$ckBoxTax',
										'$sku',
										'$Barcode',
										'$quantity',
										'$visibility',
										'$facebook',
										'$mobile',
										'$online',
										'$dateOfPublish',
										'$timeOfPublish',
										'$brand',
										'$Category',
										'$template'
												) ";
		$mode ="saved";
		
		//$queryVariant ="insert into product_variant() values () ";
	}
}


else {
	
	$query = "update product set  product = '$myproduct',
			pagetitle= '$myproduct',
			detail  = '$description',
			price = '$myprice',
			priceCompare = '$mypriceCompare',
			taxApply = '$ckBoxTax',
			sku = '$sku',
			Barcode = '$Barcode',
			quantity = '$quantity',
			visibility = '$visibility',
			visibility_facebook = '$facebook',
			visibility_mobileapp = '$mobile',
			visibility_online = '$online',
			publishDate = '$dateOfPublish',
			publishTime = '$timeOfPublish',
			brand = '$brand',
			category = '$Category',
			template = '$template'
			 where id ='$productid'";
			$mode ="updated";
	}


//echo "Error: ".$query;





//$query = "insert into log (`page_name`,`detail`,`created`,`createdby`) values ('$pagename','$detail','$datenow','$name') ";
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
	
	//mixed mysqli_insert_id ( mysqli $link )
	
	if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 
	 //Add Product Variant
	 if ($mode =="saved"){
		$productid = $conn->insert_id;
		$queryVariant = "insert into product_variant(P_Id) values ('$productid')";
	 if ($conn->query($queryVariant) === TRUE) {}}
	 
	 if ($mode == "updated") {echo "updated" ;} else {echo "saved";} 
} else {
    echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";
}
}
?>