<?php
session_start(); //session start

require_once ('libraries/Google/autoload.php');
include_once "../reuseable/connect_db_link.php";

//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '38377875518-re8hho7g5t18ql2omd3jj85ddsmtmngo.apps.googleusercontent.com'; 
$client_secret = 'dlOYshPOJVFMfF_o5zUEa1A_';
//$redirect_uri = 'https://ebusiness.ensure.com.ng'; //
$redirect_uri = 'http://fleetmanager.ensure.com.ng:1559/google-login-api/index.php';

//database
$db_username = "ensurefleet"; //Database Username
$db_password = "ensurefleet123"; //Database Password
$host_name = "localhost"; //Mysql Hostname
$db_name = 'ensurefleet'; //Database Name

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
echo '<div style="margin:20px">';
if (isset($authUrl)){ 
	//show login url
	echo '<div align="center">';
	echo '<!--<h3>Login with Google -- Demo</h3>-->';
	echo '<div>Please click login button to connect to Google.</div>';
	echo '<a class="login" href="' . $authUrl . '"><img src="images/googleSignin1.png"  style="Width:200px;"/></a>';
	echo '</div>';
	
} else {
	
	$user = $service->userinfo->get(); //get user info 
	
	// connect to database
	$mysqli = new mysqli($host_name, $db_username, $db_password, $db_name);
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
	
	//check if user exist in database using COUNT
	//$result = $mysqli->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
	//$user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
	
    
$result = $conn->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id") ;
$user_count = $result->fetch_object()->usercount; 	
	
	//show user picture
	echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
	
	if($user_count) //if user already exist change greeting text to "Welcome Back"
    {
        if  ( $conn->query("update google_users set  google_picture_link = '". $user->picture."' where google_email =  '". $user->email."'") === TRUE)
      { }
        
        echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		//header("Location: ../pages/index.php");
		$_SESSION["familyName"] = $user->familyName;
		$_SESSION["givenName"] = $user->givenName;
		$_SESSION["picture"] = $user->picture;
		$_SESSION["Gmail"] = $user->email;
		$_SESSION["gender"] = $user->gender;
        
        
        ///Check if user account exits and redirect to dashboad    
       /* $resultUser = $conn->query("SELECT  * FROM user WHERE email='".$user->email."'") ; //, COUNT(email) as usercount
        //$userUser_count = $resultUser->fetch_object()->id; 	
	if(mysqli_num_rows($resultUser)) 
	{
        while($row = mysqli_fetch_assoc($resultUser)) 
		{
			
			if ($row["status"] == "0") {$userLoginCode="0";header("Location: ../pages/userNotAllow.php");} else
			{
				include_once "../resource/session.php";
				$_SESSION["email"]=$row["email"];
				$_SESSION["name"]=$row["namef"]. " " . $row["namel"];
				$_SESSION["role"]=$row["role"];
				$_SESSION["userid"]=$row["id"];
				$userLoginCode="1";
//header("Location: ../pages/index.php");
                 echo "<script >window.location='../pages/index.php'</scrip>";
			}
		}
    }*/
        
        
        
        
       // if($user_count) //if user already exist change greeting text to "Welcome Back"
           // {       
           // header("Location: ../pages/index.php");
           // }
        
        
    }
	else //else greeting text "Thanks for registering"
	{ 
        echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
        
        
		/*
        $statement = $mysqli->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
		$statement->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
		$statement->execute();
		echo $mysqli->error;
        */
      if  ( $conn->query("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES ('".$user->id ."','".  $user->name."','". $user->email."','". $user->link."','". $user->picture."')") === TRUE)
      {              echo "Inserted"; }
        else echo $conn->error;
		
		
		$_SESSION["familyName"] = $user->familyName;
		$_SESSION["givenName"] = $user->givenName;
		$_SESSION["picture"] = $user->picture;
		$_SESSION["Gmail"] = $user->email;
		$_SESSION["gender"] = $user->gender;
    }
    
    
    //Handel thr reouting to expected page
    if  (preg_match('/ensure.com.ng/',$user->email ) == true) 
		{     $_SESSION["fromGooglePage"] = "true";
         
         
         
			header("Location: ../pages/userCreate.php");
            
        } 
    else 
        {
			header("Location: ../pages/userNotAllow.php");
        }
    
    
	
	//print user details
	echo '<pre>';
	print_r($user);
	echo '</pre>';
}
echo '</div>';


?>

