<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

 
//$ref = $_SESSION["refPayment"];
$datenow = date("Y/m/d");

$query = "SELECT  @a:=@a+1 serial_number,  payment.*  
FROM  payment ,(SELECT @a:= 0) AS a
 
 "; //where `page_name` = '$pagename'  WHERE referenceid = '$ref'
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
		{
			//if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";}
			if (($_SESSION["role"] == 1) ||($_SESSION["role"] == 2) ) {$astring = "<a class='btn btn-success btn-primary btn-xs productid elementid' id = '".$row["referenceid"]."'>Edit</a>";} else {$astring ="#";}
			
			  echo '{"Edit" : "'.$astring.'" ,
        "value" : "'.$row["value"].'",
		"referenceid" : "'.$row["referenceid"].'",
        "createdBy" : "'.$row["createdby"].'",
		 "created" : "'.$row["created"].'",
		 "detail" : "'.$row["detail"].'"
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
  
  echo '{"Edit" : "" ,
        "value" : "",
		"referenceid" : "",
        "createdBy" : "",
		 "created" : "",
		 "detail" : ""
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
?>