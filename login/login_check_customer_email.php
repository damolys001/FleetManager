<?php
$userLoginCode="";	
/* require the user as the parameter */
if(isset($_REQUEST['email']) ) {

	/* soak in the passed variable or set our own */
	//$number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; //10 is the default
	
	$format ="";
	try 
	{
    $format = strtolower($_REQUEST['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$format = strtolower($_REQUEST['format']) == '' ? '' : $format ; 
} catch (Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
	$format ="";
}
	
	$email = strtolower($_REQUEST['email']); //no default
	//$user_pass = $_GET['pass'];
	
	$email = str_replace(' ', '', $email);
$email = preg_replace('/\s+/', '', $email);


include_once "../reuseable/connect_db_link.php";





	/* grab the posts from the db */
	$query = "SELECT customer.id,fname,lname,email,(select phone from customer_address  where CUST_Id = customer.id )phone, (select user_customer.email from user_customer where CUST_Id = customer.id ) signUpemail,customer.id CUST_Id FROM customer WHERE email =  '".$email."'";
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);


/*if ($conn->query($user) === TRUE) {
    echo "User Table created successfully<br/>";
} else {
    echo "Error: " . $user . "<br>" . $conn->error."<br/><br/>";
}*/


if ($format == "") 
{
	//echo "diidi<br/>".$pass1."<br/>".$pass2."<br/>".$user_id."<br/>".$user_pass."<br/>".$query;

	
	/*while($row = $result-> mysql_fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["namef"]. " " . $row["namel"].  $row["email"]."<br>";
    }
	*/
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			//echo "id: " . $row["id"]. " - Name: " . $row["namef"]. " " . $row["namel"].  $row["email"]."<br>";
			//$posts[] = array('post'=>$row);

			
			//do analsis
			/*if ($row["status"] == "0") {$userLoginCode="0";} else
			{
				include_once "../resource/session.php";
				$_SESSION["email"]=$row["email"];
				$_SESSION["name"]=$row["namef"]. " " . $row["namel"];
				$_SESSION["role"]=$row["role"];
				$_SESSION["userid"]=$row["id"];
				$userLoginCode="1";
			}*/
			
			
		}
	}
	else{
	$userLoginCode="2";
	}
	echo $userLoginCode;
	}
	
	
	
	 else 
	{

	/* create one master array of the records */
	$posts = array();
	if(mysqli_num_rows($result)) {
		/*while($post = mysql_fetch_assoc($result)) 
		{
			$posts[] = array('post'=>$post);
			
		}*/
		$posts = mysqli_fetch_assoc($result);
	}
	
	
	

	/* output in necessary format */
	if($format == 'json') {
		header('Content-type: application/json');
		echo json_encode(array('posts'=>$posts));
	}
	else {
		header('Content-type: text/xml');
		echo '<posts>';
		if(is_array($posts)) {
		foreach($posts as $tag => $value) {
							echo '<',$tag,'>',htmlentities($value),'</',$tag,'>';
						}
		}
		/*foreach($posts as $index => $post) {
			if(is_array($post)) {
				foreach($post as $key => $value) {
					echo '<',$key,'>';
					if(is_array($value)) {
						foreach($value as $tag => $val) {
							echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
						}
					}
					echo '</',$key,'>';
				}
			}
		}*/
		echo '</posts>';
	}
}
	/* disconnect from the db */
	@mysqli_close($link);
}

?>