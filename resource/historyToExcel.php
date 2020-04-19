<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";
$filename = "excelfilename"; 
$name = $_SESSION["name"];

 
//$ref = $_SESSION["ref"];
$datenow = date("Y/m/d");

$query = "SELECT   ghgh.uniqueId,  ghgh.uniqueId Date, ghgh.valueandvat 'orders Place', ghgh.value Payment from (SELECT orders.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created FROM orders
left JOIN payment ON payment.referenceid = orders.referenceid 
UNION 
SELECT  payment.referenceid uniqueId, orders.referenceid orderid,payment.referenceid payid, valueandvat, orders.created oc, payment.value, payment.created  FROM orders
right JOIN payment ON payment.referenceid = orders.referenceid    ) ghgh order by uniqueId asc
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
										//header('Content-type: application/json');
										$file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
										/*******Start of Formatting for Excel*******/   
										//define separator (defines columns in excel & tabs in word)
										$sep = "\t"; //tabbed character
										//start of printing column names as names of MySQL fields
										
										//start of printing column names as names of MySQL fields
/*for ($i = 0; $i < mysqli_num_fields($result); $i++) {
echo mysqli_field_name($result,$i) . "\t";
}*/

while ($property = mysqli_fetch_field($result)) {
    echo $property->name. "\t";
	$rgg[] = $property->name;
}
print("\n"); 
										
		//while($row = mysqli_fetch_assoc($result)) 
		while($row = mysqli_fetch_assoc($result)) 
		{
		$schema_insert = "";
		/*while ($row = $result->fetch_assoc())
		{ 
		
		echo "I want enter";
		   while ($property = mysqli_fetch_field($result)) {
    $bbb =  $property->name;
	echo $bbb;
	 $schema_insert .= $row[$$bbb ].$sep;
}
		   
		echo "I done enter";	*/   
		   
		   
		    
				
        for($j=0; $j<mysqli_num_fields($result);$j++)
        {
			$gh = $rgg[$j];
			 //$schema_insert .= $row['uniqueId'].$sep;
			 if(!isset($row[$gh]))
                $schema_insert .= "".$sep;//$schema_insert .= "NULL".$sep;
            elseif ($row[$gh] != "")
                $schema_insert .= "$row[$gh]".$sep;
            else
                $schema_insert .= "".$sep;
				
		}
			$schema_insert .= getbalance ($row['uniqueId'],$link).$sep;
		
			
			/*while ($property = mysqli_fetch_field($result)) {
    $columName =  $property->name;
	 $schema_insert .= $row[$columName].$sep;
	 
			if(!isset($row[$columName]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$columName] != "")
                $schema_insert .= $row[$columName].$sep;
            else
                $schema_insert .= "".$sep;*/

			// $schema_insert .= "$row[$j]".$sep;
            
        //}
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
		
		}
		
	}
	else {
		
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
	///Get orders
	$query = "SELECT  sum(valueandvat) orderValue FROM orders where  referenceId <= '$refBal' order by referenceid asc  "; 
	$result = mysqli_query($link,$query) or die( $link->error.'Errant query:  '.$query);
	
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{ 
		$orderValue = $row["orderValue"]; 
		//$myBal = $row["payValue"] - $row["orderValue"]; 
	    }
  }
	
	
	
	///Get payment
	$query = "SELECT  sum(value) payValue  FROM payment where  referenceId <= '$refBal' order by referenceid asc  "; 
	$result = mysqli_query($link,$query) or die( $link->error.'Errant query:  '.$query);
	
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{ 
		$payValue = $row["payValue"]; 
		//$myBal = $row["payValue"] - $row["orderValue"]; 
	    }
  }
	
	
	$myBal = $payValue  - $orderValue;
	
	
	
	return $myBal;
	}

?>