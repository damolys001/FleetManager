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

$fname = $_POST["fname"];  
$lname = $_POST["lname"];  
$email = $_POST["email"];  
$acceptMarketing = $_POST["acceptMarketing"];  
$taxExempted = $_POST["taxExempted"];  
$note = $_POST["note"];  
$tags = $_POST["tags"];  


$fnameAdrs = $_POST["fnameAdrs"];  
$lnameAdrs = $_POST["lnameAdrs"];  
$company = $_POST["company"];  
$phone = $_POST["phone"];  
$address = $_POST["address"];  
$addressCount = $_POST["addressCount"];  
$city = $_POST["city"];  
$postalcode = $_POST["postalcode"];  
$country = $_POST["country"];  
$state = $_POST["state"];  
  







$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";

if ($email == "" || $fname =="") {}else {

$name = $_SESSION["name"];
$query ="";
$mode = "";
$custid = $_SESSION["custid"];

if ($custid == "" ) {

//Check if product name exit
$queryCheck = "select * from customer where email = '$email'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{while($row = mysqli_fetch_assoc($result)) 
		{
			$query = "update customer set 
			fname = '$fname', 
			lname = '$lname', 
			email = '$email', 
			acceptMarketing = '$acceptMarketing', 
			taxExempted = '$taxExempted', 
			note = '$note', 
			tags = '$tags', 
			updated = '$datenow',
			updatedby = '$name'
			where id = '$email'";
 			
			
			$mode ="updated";
			
			$queryAdrs = "update customer_address set 
			fname = '$fnameAdrs', 
			lname = '$lnameAdrs', 
			company = '$company', 
			phone = '$phone', 
			address = '$address', 
			addressCount = '$addressCount', 
			city = '$city', 
			postalcode = '$postalcode', 
			country = '$country', 
			state = '$state' ,
			updated = '$datenow',
			updatedby = '$name'
            where id = '".$row["defaultAddress"]."'";
			
 		}
	}
	else
	{
		$query = "insert into customer (fname, 
										lname, 
										email, 
										acceptMarketing, 
										taxExempted, 
										note, 
										tags,
										created,
										createdby 
										) values (
										'$fname', 
										'$lname', 
										'$email', 
										'$acceptMarketing', 
										'$taxExempted', 
										'$note', 
										'$tags',
										'$datenow',
										'$name'
												) ";
		$mode ="saved";
		
		//$queryVariant ="insert into product_variant() values () ";
	}
}


else {
	$query = "update customer set  
			fname = '$fname', 
			lname = '$lname', 
			email = '$email', 
			acceptMarketing = '$acceptMarketing', 
			taxExempted = '$taxExempted', 
			note = '$note', 
			tags = '$tags',
			updated = '$datenow',
			updatedby = '$name'
				where id = '$custid'";
 			
			
			$mode ="updated";
			
			$queryAdrs = "update customer_address set 
			fname = '$fnameAdrs', 
			lname = '$lnameAdrs', 
			company = '$company', 
			phone = '$phone', 
			address = '$address', 
			addressCount = '$addressCount', 
			city = '$city', 
			postalcode = '$postalcode', 
			country = '$country', 
			state = '$state' ,
			updated = '$datenow',
			updatedby = '$name'
where id = '".$_SESSION["defaultAddressttoUpdate"]."'";
//echo $queryAdrs;
	}








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
	
if ($conn->query($query) === TRUE) 
{
     //echo "Successfully Updated";
	 
	 //Add customer address Variant
	 if ($mode =="saved")
	 {
		$custid = $conn->insert_id;
					$queryAdrs = "insert into customer_address (CUST_Id,fname, lname, company, phone, address, addressCount, city,	postalcode, country, state ,created,createdby 
			) values ('$custid','$fnameAdrs', 
			'$lnameAdrs', 
			'$company', 
			'$phone', 
			'$address', 
			'$addressCount', 
			'$city', 
			'$postalcode', 
			'$country', 
			'$state',
			'$datenow',
			'$name' 
			)";

			 if ($conn->query($queryAdrs) === TRUE) 
			 {
				   /*Update customer with defaul address */  //->insert_id;
				   $addindAddid =  mysqli_insert_id($conn);   $updateCustDefaultAdd ="update customer set defaultAddress = '$addindAddid' where id = '$custid'"; 
					if ($conn->query($updateCustDefaultAdd ) === TRUE){} else {echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";}
			// echo 'Error'.$updateCustDefaultAdd;
			  }
			  else 
			  {
				 echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";
			  }
       }
	 //Add customer address ends
	 
	 
	  //Update Default Address 
	 if ($mode == "updated"){
	 if ($conn->query($queryAdrs) === TRUE) { }else	{ echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";}}
	 
	 
	 
	 if ($mode == "updated") {echo "updated" ;} else {echo "saved";} 
	 
	 
	
	 
	 
} else {
    echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";
}
}


?>