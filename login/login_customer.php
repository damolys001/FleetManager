<?php
$userLoginCode="";	
/* require the user as the parameter */
if(isset($_GET['user']) && isset($_GET['pass'])) {

	/* soak in the passed variable or set our own */
	//$number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; //10 is the default
	
	$format ="";
	try 
	{
    $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; //xml is the default
	$format = strtolower($_GET['format']) == '' ? '' : $format ; 
} catch (Exception $e) {
    //echo 'Caught exception: ',  $e->getMessage(), "\n";
	$format ="";
}
	
	$user_id = strtolower($_GET['user']); //no default
	$user_pass = $_GET['pass'];
	
	$user_id = str_replace(' ', '', $user_id);
$user_id = preg_replace('/\s+/', '', $user_id);
$user_pass = str_replace(' ', '', $user_pass);
$user_pass = preg_replace('/\s+/', '', $user_pass);

$pass1 = sha1($user_pass);
$pass2 = sha1($user_id."_".$user_pass);
	/* connect to the db */
	/*$link = mysql_connect('localhost','username','password') or die('Cannot connect to the DB');
	mysql_select_db('db_name',$link) or die('Cannot select the DB');*/

include_once "../reuseable/connect_db_link.php";





	/* grab the posts from the db */
	$query = "SELECT customer.id,pic,fname,lname,user_customer.email,role, status, user_customer.created FROM user_customer, customer WHERE user_customer.email = '$user_id' and  passHash = '$pass1' and passSalt = '$pass2' and CUST_Id = customer.id";
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
			if ($row["status"] == "0") {$userLoginCode="0";} else
			{
				include_once "../resource/session.php";
				$_SESSION["email"]=$row["email"];
				$_SESSION["name"]=$row["fname"]. " " . $row["lname"];
				$_SESSION["role"]=$row["role"];
				$_SESSION["userid"]=$row["id"];
				$userLoginCode="1";
				$_SESSION["customer_email"] =$row["email"];
				$email = $row["email"];
				$custid = $row["id"];
				
				//update Cart
			$a = session_id();
			if(empty($a)) session_start();
			$queryCart = "update  basket set customer_id = '$custid',customer_email ='$email'  where session_id = '$a' ";
	        $resulCartt = mysqli_query($conn,$queryCart) or die('Errant query:  '.$queryCart);
	
	
			}
			
			
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
		$_SESSION["customer_email"] =$posts["email"];
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