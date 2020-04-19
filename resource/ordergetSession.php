<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

$pagename = $_SESSION["pagename"];
$datenow = date("Y/m/d");

$query = "SELECT *, user.createdby as userCreator,  user.id as userid 
FROM user, role
WHERE user.role = role.id
 "; //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th></th>
										<th>User Name</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
										 <th>Role</th>
										
                                    </tr>
                                </thead>
								<tbody>";
/*	<th>Created By</th>
										<th>Date</th>*/
		while($row = mysqli_fetch_assoc($result)) 
		{
			if ($row["status"] == "1") {$status = "Enable";} else {$status = "Disable";}
			
			echo '<tr class="odd gradeX">';
			
                               echo' <td> <a class="btn btn-success btn-primary btn-xs elementid" id = "'.$row["userid"].'">Edit</a></td>'.
							    ' <td>'.$row["email"]. '</td>'.
							   ' <td>'.$row["namef"]. " " .$row["namel"].'</td>'.
                                       '<td>'.$status.'</td>'.
									   '<td>'.$row["detail"].'</td>'.
                                       
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