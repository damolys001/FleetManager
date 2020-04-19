<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

 
$ref = $_SESSION["ref"];
$datenow = date("Y/m/d");

$query = "SELECT * 
FROM  order_line
WHERE referenceid = '$ref'
 "; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th></th>
										<th>Reference id</th>
                                        <th>product</th>
                                        <th>Price</th>
										<th>Quantity</th>
										<th>Total Cosst + VAT</th>
                                    </tr>
                                </thead>
								<tbody>";
/*	<th>Created By</th>
										<th>Date</th>*/
		while($row = mysqli_fetch_assoc($result)) 
		{
			//if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";}
			
			echo '<tr class="odd gradeX">';
			
                                   echo'<td> <a class="btn btn-success btn-primary btn-xs elementid" id = "'.$row["productid"].'">Edit</a></td>'.
							           '<td>'.$row["referenceid"]. '</td>'.
							           '<td>'.$row["product"]. '</td>'.
                                       '<td>'.$row["price"]. '</td>'.
									   '<td>'.$row["quantity"].'</td>'.
                                       '<td>'.$row["valueAndVat"].'</td>'. 
                                    '</tr>';
			/* '<td>'.$row["userCreator"].'</td>'.
                                         '<td>'.$row["created"].'</td>'.*/
			
			
		}
		
		echo "	</tbody>";
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