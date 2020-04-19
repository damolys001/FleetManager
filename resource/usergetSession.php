<?php 


include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

$pagename = $_SESSION["pagename"];
$datenow = date("Y/m/d");


$query = "SELECT *, main.createdby as userCreator, 
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
main.id as userid 
FROM user main, role
WHERE main.role = role.id and main.id != 1
 ";
if ($_SESSION["userid"] == '1') {$query = "
SELECT *, main.createdby as userCreator, 
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver1) approver1Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver2) approver2Name,
(select CONCAT_WS(' ',namef,namel) from user where id = main.approver3) approver3Name,
main.id as userid 
FROM user main, role
WHERE main.role = role.id 
 ";} //and user.id 
 
  //where `page_name` = '$pagename'
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th></th>
										<th>User Name</th>
                                        <th>Full Name</th>
                                         <th>Approver 1</th>
                                          <th>Approver 2</th>
                                           <th>Approver 3</th>
                                        <th>Status</th>
										 <th>Role</th>
										
                                    </tr>
                                </thead>
								<tbody>";
/*	<th>Created By</th>
										<th>Date</th>  elementid*/
		while($row = mysqli_fetch_assoc($result)) 
		{
			if ($row["firstTime"] == 0) {$status = "Disable";} else {$status = "Enable";}
			
			echo '<tr class="odd gradeX">';
			
                               echo' <td> <a class="btn btn-success btn-primary btn-xs " href="mydetails.php?id='.$row["userid"].'" id = "'.$row["userid"].'">Edit</a><br/><br/>
                               <a class="btn btn-success btn-primary btn-xs " href="mybookings.php?id='.$row["userid"].'" id = "'.$row["userid"].'">Booking(s)</a>
                               </td>'.
							    ' <td>'.$row["email"]. '</td>'.
							   ' <td>'.$row["namef"]. " " .$row["namel"].'</td>'.
                                     '<td>'.$row["approver1Name"].'</td>'.
                                     '<td>'.$row["approver2Name"].'</td>'.
                                     '<td>'.$row["approver3Name"].'</td>'.
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