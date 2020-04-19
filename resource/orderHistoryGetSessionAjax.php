<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

 
$ref = $_SESSION["ref"];
$datenow = date("Y/m/d");
$s= "";
  if(isset($_REQUEST['s'])){$s=$_REQUEST['s'];}
if ($s==""){
$query = "SELECT @a:=@a+1 serial_number,  orders.* 
FROM  orders, (SELECT @a:= 0) AS a
order by id desc
 ";}
 else 
 {
	 $query = "SELECT @a:=@a+1 serial_number,  orders.* 
FROM  orders, (SELECT @a:= 0) AS a where orderstatus = '$s'
order by id desc
 ";}
  //where `page_name` = '$pagename'
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
										
										$rows = mysqli_num_rows($result);
										header('Content-type: application/json');
										echo '{
  "data": [';
		while($row = mysqli_fetch_assoc($result)) 
		{
			//if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";}
			$astring = "<a class='btn btn-success btn-primary btn-xs elementid ' href='".'orderDetail.php?id='. $row["id"]."' id = '#".$row["id"]."' >"."#".sprintf("%08d",$row["id"])."</a>";
			  echo '{"Detail" : "'.$astring.'" ,
			  "referenceid" : "'.$row["id"].'",
      	"value" : "'.number_format($row["valueAndVat"] + $row["value"]).'",
        "created" : "'.$row["created"].'",
		 "createdby" : "'.$row["createdby"].'",
        "valueAndVat" : "'.$row["valueAndVat"].'",
		 "status" : "'.$row["orderstatus"].'"
    }';
	 if ($row["serial_number"] == $rows ) {} 
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
	
	else
	{
		echo '{
  "data": [';
   echo '{"Detail" : "" ,
			  "referenceid" : "",
      	"value" : "",
        "created" : "",
		 "createdby" : "",
        "valueAndVat" : "",
		 "status" : ""
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