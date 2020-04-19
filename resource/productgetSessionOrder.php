<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

$pagename = $_SESSION["pagename"];
$datenow = date("Y/m/d");

$query = "select *, (select brand from brand where brand.id = product.brand)brand , (select category from category where category.id = product.category) category,(select count(*) from product_variant where P_Id = product.id) variant   from product  "; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th></th>
                                        <th>Product</th>
                                        <th>Price</th>
										 <th>Inventory</th>
										<th>Type/Category</th>
										<th>Brand</th>
                                    </tr>
                                </thead>
								<tbody>";
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			echo '<tr class="odd gradeX">';
                               echo' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
							   ' <td>'.$row["product"].'</td>'.
                                       '<td>'.$row["price"].'</td>'.
									    '<td>'.$row["quantity"].' in Stock for '.$row["variant"].' Variant</td>'.
                                        '<td>'.$row["category"].'</td>'.
                                        '<td>'.$row["brand"].'</td>
                                    </tr>';
			
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