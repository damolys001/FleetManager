<?php 
include_once "../resource/session.php";
$prod = $_POST["prod"];
$quant = $_POST["quant"];
$ref = $_POST["ref"];
$_SESSION["ref"] = $ref ;
//$prodidforUpdate = $_SESSION["prodidforUpdate"];




$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";











//if ($prod == "" || $quant =="") {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$prodPrice ="";
$vatrate ="";
$datenow = date("Y/m/d");


$myPrice =  getProductPrice ($prod,$link);

checkorder_line ($prod,$quant,$ref,$link,$conn);
echo chechOrders($prod,$quant,$ref,$link,$conn);

 












// get product price 

function getProductPrice ($productid,$link)
{
	$query = "SELECT * FROM product WHERE id = '$productid' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$price = $row["price"];
		}
	}
	return $price;
}
function getProductName ($productid,$link)
{
	$query = "SELECT * FROM product WHERE id = '$productid' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$price = $row["product"];
		}
	}
	return $price;
}

//get vat rate

function getVatRate ($link)
{
	$query = "SELECT * FROM vat_rate WHERE id = '1' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$myVat =  $row["myrate"];;
		}
	}
	return $myVat;
}

//check if product exit on order line with ref
 //if exit update else save afresh
function checkorder_line ($prod,$quant,$ref,$link,$conn)
{ $exist ="False";
$datenow = date("Y/m/d");
$name = $_SESSION["name"];
	$query = "SELECT * FROM order_line where productid = '$prod' and referenceid ='$ref'";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{   $price = getProductPrice ($prod, $link);
			$product = getProductName ($prod, $link);
            $value = $price * $quant;
			$valueAndVat = $value + ($value * getVatRate($link) );
			$exist =  "True";
			$queryOrderLine = "update order_line set 
			referenceid = '$ref', 
			product = '$product' , 
			productid = '$prod', 
			value = '$value', 
			valueAndVat  = '$valueAndVat', 
			quantity = '$quant', 
			price = '$price', 
			updated ='$datenow' ,
			updatedby ='$name' 
			where 
			productid = '$prod' and referenceid ='$ref'";
			$mode ="updated";
		}
	}
	else {
		$price = getProductPrice ($prod, $link);
		$product = getProductName ($prod, $link);
        $value = $price  * $quant;
		$valueAndVat = $value + ($value * getVatRate($link) );
	$queryOrderLine = 	 "INSERT INTO `order_line` (
  `referenceid`, `product`, `productid`, `value`,`valueAndVat`,`quantity`,price, `created`,  `createdby`   ) 
  VALUES 
  ( '$ref',  '$product', '$prod', '$value','$valueAndVat', '$quant','$price' ,  '$datenow'  , '$name')";
}

if ($conn->query($queryOrderLine) === TRUE) {
    //echo "User Table created successfully<br/>";
} else {
    echo "Error: " . $queryOrderLine . "<br>" . $conn->error."<br/><br/>";
}

	return $exist ;
}

//calculate sum for refid
function getSumValue ($ref,$link)
{
	$query = "SELECT sum(value) mysum FROM order_line WHERE referenceid = '$ref' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$mysum =  $row["mysum"];
		}
	}
	return $mysum;
}
 
 //calculate sum with VAT for refid
 function getSumValueandVat ($ref,$link)
{
	$query = "SELECT sum(valueAndVat) mysum FROM order_line WHERE referenceid = '$ref' ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$mysum =  $row["mysum"];
		}
	}
	return $mysum;
}
 
//check if refid exist on orders table 

function chechOrders ($prod,$quant,$ref,$link,$conn)
{
	 $exist ="False";
	 $datenow = date("Y/m/d");
	 $name = $_SESSION["name"];
	$query = "SELECT * FROM orders where  referenceid ='$ref'";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			
            $value = getSumValue ($ref,$link);
			$valueAndVat = getSumValueandVat($ref,$link);
			//$exist =  "True";
			$exist = $valueAndVat ;
			$queryOrderLine = "update orders set 
			referenceid = '$ref', 
			value = '$value', 
			valueAndVat  = '$valueAndVat', 
			updated ='$datenow' ,
			updatedby ='$name' 
			where 
			referenceid ='$ref'";
			$mode ="updated";
		}
	}
	else {
		$product = getProductName ($prod, $link);
        $value = getProductPrice ($prod, $link) * $quant;
		$valueAndVat = $value + ($value * getVatRate($link) );
		$exist = $valueAndVat ;
	$queryOrderLine = 	 "INSERT INTO `orders` (
  `referenceid`,  `value`,`valueAndVat`, `created`,  `createdby`   ) 
  VALUES 
  ( '$ref',  '$value','$valueAndVat', '$datenow'  , '$name')";
}

if ($conn->query($queryOrderLine) === TRUE) {
    //echo "User Table created successfully<br/>";
} else {
    echo "Error: " . $queryOrderLine . "<br>" . $conn->error."<br/><br/>";
}

	return $exist ;
	
	
	}

// if exit calculate sum and update
//if not calsulate sum and insert
//then save



//}

?>