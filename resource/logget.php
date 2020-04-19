<?php 

$pagename = $_GET["page"];
$datenow = date("Y/m/d");
include_once "session.php";
include_once "../reuseable/connect_db_link.php";

$name = $_SESSION["name"];

$query = "select * from log where `page_name` = '$pagename' order by `id` desc ";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
		
		echo "<thead>
                                    <tr>
                                        
                                        <th>Detail</th>
                                        <th>Date</th>
                                        <th>By</th>
                                    </tr>
                                </thead>
								<tbody>";
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			echo '<tr class="odd gradeX">';
                               echo' <td>'.$row["detail"].'</td>'.
                                       '<td>'.$row["time_created"].'</td>'.
                                        '<td>'.$row["createdby"].'</td>
                                        
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