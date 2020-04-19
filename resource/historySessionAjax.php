<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

 
//$ref = $_SESSION["ref"];
$datenow = date("Y/m/d");

$query = "SELECT  @a:=@a+1 serial_number,  ghgh.* from (SELECT orders.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created FROM orders
left JOIN payment ON payment.referenceid = orders.referenceid
UNION 
SELECT  payment.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created  FROM orders
right JOIN payment ON payment.referenceid = orders.referenceid) ghgh,(SELECT @a:= 0) AS a
 "; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
	/*	echo "<thead>
                                    <tr>
                                        
                                        <th></th>
										<th>Reference id</th>
                                        <th>product</th>
                                        <th>Price</th>
										<th>Quantity</th>
										<th>Total Cosst + VAT</th>
                                    </tr>
                                </thead>
								<tbody>";*/
/*	<th>Created By</th>
										<th>Date</th>*/
										$rowNum = mysqli_num_rows($result);
										header('Content-type: application/json');
										echo '{
  "data": [';
		while($row = mysqli_fetch_assoc($result)) 
		{ //if ($row["orderid"] == "") {$refForDispla = $row["payid"];  }  else {$refForDispla =$row["orderid"]; }
			
			
			//if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";} "Edit" : "'.$astring.'" ,
			//$astring = "<a class='btn btn-success btn-primary btn-xs productid' id = '".$row["id"]."'>Edit</a>";
			  echo '{
        
		"referenceid" : "'.$row["uniqueId"].'",
        "order" : "'.$row["valueandvat"].'",
		 "payment" : "'.$row["value"].'",
        "balance" : "'.getbalance ($row["uniqueId"],$link).'"
    }';
	if ($row["serial_number"] == $rowNum ) {} 
	 else {echo ",";}
			
			
			/*echo '<tr class="odd gradeX">';
			
                                   echo'<td> <a class="btn btn-success btn-primary btn-xs elementid" id = "'.$row["productid"].'">Edit</a></td>'.
							           '<td>'.$row["referenceid"]. '</td>'.
							           '<td>'.$row["product"]. '</td>'.
                                       '<td>'.$row["price"]. '</td>'.
									   '<td>'.$row["quantity"].'</td>'.
                                       '<td>'.$row["valueAndVat"].'</td>'. 
                                    '</tr>';*/
			/* '<td>'.$row["userCreator"].'</td>'.
                                         '<td>'.$row["created"].'</td>'.*/
			
			
		}
		echo ']}';
		/*echo "	</tbody>";*/
	}
	else {
		header('Content-type: application/json');
										echo '{
  "data": [';
  
  echo '{"referenceid" : "" ,
        "Order" : "",
		"Payment" : "",
        "balance" : ""
		
    }';
	echo ']}';
		}
/* disconnect from the db */
	//@mysqli_close($link);
	
	
/*	
	if ($conn->query($query) === TRUE) {
		
     //echo "Successfully Updated";
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}*/


function getbalance ($refBal,$link)
{
	
	
	$query = "SELECT  sum(valueandvat) orderValue , sum(value) payValue  from (SELECT orders.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created FROM orders
left JOIN payment ON payment.referenceid = orders.referenceid
UNION 
SELECT  payment.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created  FROM orders
right JOIN payment ON payment.referenceid = orders.referenceid) ghgh where  uniqueId <= '$refBal'";
 ; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		while($row = mysqli_fetch_assoc($result)) 
		{ 
		$myBal = $row["payValue"] - $row["orderValue"]; 
			 
			
			//if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";} "Edit" : "'.$astring.'" ,
			//$astring = "<a class='btn btn-success btn-primary btn-xs productid' id = '".$row["id"]."'>Edit</a>";
		}
        
	}
	return $myBal;
	}

?>