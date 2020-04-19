<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

$pagename = $_SESSION["pagename"];
$datenow = date("Y/m/d");

$query = "select *, 
(select city from customer_address where CUST_Id = customer.id and defaultAddress = customer_address.id )Location , 
(select orders.id  from orders where CUST_Id = customer.id order by orders.id desc limit 1 ) lastorder,
(select  SUM(valueAndVat + value)  from orders where CUST_Id = customer.id  and (orderstatus != 'Pending' or orderstatus != 'Cancelled')  ) TotalSpent,
(select count(*) from orders  where CUST_Id = customer.id ) ordercount   from customer  "; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th></th>
                                        <th>Name</th>
                                        <th>Location</th>
										 <th>Orders</th>
										<th>Last Order</th>
										<th>Total Spent </th>
                                    </tr>
                                </thead>
								<tbody>";
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			if ($row["ordercount"] == 0 ) {$lastorder ="";} else {$lastorder='<a class="btn btn-success btn-primary btn-xs productid" href= "orderDetail.php?id='.$row["lastorder"].'">#'.$row["lastorder"].'#</a>';}
			echo '<tr class="odd gradeX">';
                               echo' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "customerEdit.php?custid='.$row["id"].'">Edit</a></td>'.							   
                                       '<td>'.$row["fname"]." ".$row["lname"].'</td>'.
									    '<td>'.$row["Location"].' </td>'.
                                        '<td>'.$row["ordercount"].'</td>'.
                                        '<td>'.$lastorder.'</td>'.
										' <td>'.$row["TotalSpent"].'</td>'.
                                    '</tr>';
			
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