<?php 
//echo 1;
//exit;

include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
require_once('../resource/PHPMailer/PHPMailerAutoload.php');

$datenow = date("Y/m/d");
$opr =""; $phone ="";$email ="";$lname ="";$fname ="";$acceptMarketing ="";$taxExempted =""; $note ="";$tags =""; $fnameAdrs =""; $lnameAdrs = "";$company ="";$address = "";
$addressCount = "";$city ="";$postalcode ="";$country ="";$state ="";$name ="";$custresetLink=""; $shopDomain ="";$mailClientCust = ""; $mailClientIdCust= ""; $domainEmail = "";
$department=""; $gender="";


//if (isset ()) {}
if (isset ($_REQUEST["opr"])) {$opr = $_REQUEST["opr"];}

if (isset ( $_REQUEST["fname"])) { $fname = $_REQUEST["fname"];}
if (isset ($_REQUEST["lname"])) {$lname = $_REQUEST["lname"];}
if (isset ($_REQUEST["email"])) {$email = $_REQUEST["email"];}
if (isset ($_REQUEST["phone"])) {$phone = $_REQUEST["phone"];}
if (isset ($_REQUEST["pass"])) {$pass = $_REQUEST["pass"];}
if (isset ($_REQUEST["department"])) {$department = $_REQUEST["department"];}
if (isset ($_REQUEST["gender"])) {$gender = $_REQUEST["gender"];}

 
if (isset ($_REQUEST["acceptMarketing"])) $acceptMarketing = $_REQUEST["acceptMarketing"];  
if (isset ($_REQUEST["taxExempted"]))$taxExempted = $_REQUEST["taxExempted"];  
if (isset ($_REQUEST["note"]))$note = $_REQUEST["note"];  
if (isset ($_REQUEST["tags"]))$tags = $_REQUEST["tags"];  


if (isset ($_REQUEST["fnameAdrs"]))$fnameAdrs = $_REQUEST["fnameAdrs"];  
if (isset ($_REQUEST["lnameAdrs"]))$lnameAdrs = $_REQUEST["lnameAdrs"];  
if (isset ($_REQUEST["company"]))$company = $_REQUEST["company"];  

if (isset ($_REQUEST["address"]))$address = $_REQUEST["address"];  
if (isset ( $_REQUEST["addressCount"]))$addressCount = $_REQUEST["addressCount"];  
if (isset ($_REQUEST["city"]))$city = $_REQUEST["city"];  
if (isset ($_REQUEST["postalcode"]))$postalcode = $_REQUEST["postalcode"];  
if (isset ($_REQUEST["country"]))$country = $_REQUEST["country"];  
if (isset ($_REQUEST["state"]))$state = $_REQUEST["state"]; 
if (isset ($_REQUEST["lga"]))$lga = $_REQUEST["lga"]; 

if (isset ($_REQUEST["custid"]))$custid = $_REQUEST["custid"]; 
if (isset ($_REQUEST["adrsid"]))$adrsid = $_REQUEST["adrsid"];
if (isset ($_SESSION["name"]))$name = $_SESSION["name"];

if ($name =="")$name = "online";

if (isset ($_REQUEST["custresetLink"]))$custresetLink = $_REQUEST["custresetLink"]; 

$shopname ="";
$customerEmail = "";
	//echo "jhj";

///get shop parameters
$shop = "select * from  shop_basic where id = 1";
    $resultshop = mysqli_query($link,$shop) or die('Errant query:  '.$shop);
	if(mysqli_num_rows($resultshop)) 
	{
		while($row = mysqli_fetch_assoc($resultshop)) 
		{
			$shopname = $row["name"];
			$customerEmail = $row["cutomer_email"];
			$domainEmail = $customerEmail;
			$shopDomain = $row["shopDomain"];
			$mailClientCust = $row["mailClientCust"];; 
			$mailClientIdCust=$row["mailClientIdCust"];
		}
	}




if ($opr ==  "add" or $opr ==  "addfrmUser") 
{
    if (isset ($_SESSION["Gmail"])) {$myAuthEmail =$_SESSION["Gmail"]; }
  ///Check if user account exits and redirect to dashboad    
        $resultUser = $conn->query("SELECT  * FROM user WHERE email='".$myAuthEmail."'") ; //, COUNT(email) as usercount
    	if(mysqli_num_rows($resultUser)) 
        {
            while($row = mysqli_fetch_assoc($resultUser)) 
		{
            $email = str_replace(' ', '', $email);
            $email = preg_replace('/\s+/', '', $email);
            $pass = str_replace(' ', '', $pass);
            $pass = preg_replace('/\s+/', '', $pass);
            
                    $adminPass = sha1 ($pass);
					$adminPassSalt = sha1 ($email.'_'.$pass);
					$query_user_cust  = "update `user` set
					 namef ='$fname', 
                     namel ='$lname', 
                     department ='$department',
                     sex ='$gender',
                     `email` ='$email',
                     `passHash` ='$adminPass',
                     `passSalt` ='$adminPassSalt', 
                     `role` ='4', 
                     `status` ='1', 
                     `created` ='$datenow', 
                     `createdby` ='online',
                     `firstTime` ='1' where email ='".$email."'";
            
                    $_SESSION["customer_email"] =$email;
					$_SESSION["email"]=$email;
					$_SESSION["name"]=$fname. " " . $lname;
					$_SESSION["role"]="4";
                   $_SESSION["userid"]=$row["id"];  
            
					if ($conn->query($query_user_cust ) === TRUE)
                    {echo "1";
                     
                                                              
                    } else {echo "Error: " . "<br> ".$query_user_cust."<br/>" . $conn->error."<br/><br/>";}
        }
				
        }
    else {
            $email = str_replace(' ', '', $email);
            $email = preg_replace('/\s+/', '', $email);
            $pass = str_replace(' ', '', $pass);
            $pass = preg_replace('/\s+/', '', $pass);
        
          $adminPass = sha1 ($pass);
					$adminPassSalt = sha1 ($email.'_'.$pass);
					$query_user_cust  = "INSERT INTO `user` (
					 namef, namel, department,sex,`email`,`passHash`,`passSalt`, `role`, `status`, `created`, `createdby`,`firstTime`
					  ) 
					  VALUES 
					  ('$fname',
                      '$lname',
                      '$department',
                      '$gender',
                      '$email',
					  '$adminPass',
					 '$adminPassSalt',
					 '4',
					 '1',
					 '$datenow',
					 'online',
                     '1'
					);	"	;
					
					$_SESSION["customer_email"] =$email;
					$_SESSION["email"]=$email;
					$_SESSION["name"]=$fname. " " . $lname;
					$_SESSION["role"]="4";
                   
					if ($conn->query($query_user_cust ) === TRUE)
                    {echo "1";
                     
                        $custid = $conn->insert_id;
					    $_SESSION["userid"]=$custid;                                          
                                                                 
                                                                 
                    } else {echo "Error: " . "<br> ".$query_user_cust."<br/>" . $conn->error."<br/><br/>";}


}


}






if ($opr ==  "resetPassword")  
{
//echo $email;
//exit;
	$queryCheck = "select CONCAT( namef, ' ', namel) custname from user where email = '$email'";
    $resultsm = mysqli_query($link,$queryCheck) or die('Errant query:  '.$queryCheck);
	if(mysqli_num_rows($resultsm)) 
	{
		while($row = mysqli_fetch_assoc($resultsm)) 
		{   
		 $custname =   $row["custname"]   ; 
		 $resetMailSent = false;
		
		              
			$pass ="Ensure123";
                    $adminPass = sha1 ($pass);
					$adminPassSalt = sha1 ($email.'_'.$pass);

	 $query_user_cust  = "update `user` set				 
			     		 `passHash` ='$adminPass',
						 `passSalt` ='$adminPassSalt'
						 where email = '$email'
					 
						 ";
				 $result = mysqli_query($link,$query_user_cust) or die('Errant query:  '.$query_user_cust);		 
		
		echo "1";
	}
  }else {
	echo "2"; //"The email you specified doesn't exist on our system";
  }
}		
	










if ($opr ==  "add" or $opr ==  "addfrmCustomer") 
{
	if ($email == ""){echo "Email address cant be blanck";exit;}
	$queryCheck = "select *,(select distinct email from user_customer where email ='$email')userEmail from customer where email = '$email'";
    $result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$queryCheck);
	if(mysqli_num_rows($result)) 
	{while($row = mysqli_fetch_assoc($result)) 
		{ 
		$custid =   $row["id"];
		if ($opr ==  "addfrmCustomer") {$fnameAdrs = $fname; $lnameAdrs = $lname;$name ="online";
				$query = "update customer set 
					fname = '$fname', 
					lname = '$lname', 
					email = '$email'
					where id = '$email'";
		}else
	{
		$query = "update customer set 
			fname = '$fname', 
			lname = '$lname', 
			email = '$email', 
			acceptMarketing = '$acceptMarketing', 
			taxExempted = '$taxExempted', 
			note = '$note', 
			tags = '$tags', 
			updated = '$datenow',
			updatedby = '$name'
			where id = '$email'";}
 		$mode ="updated";
			
			
			
			$queryAdrs = "update customer_address set 
			fname = '$fnameAdrs', 
			lname = '$lnameAdrs', 
			company = '$company', 
			phone = '$phone', 
			address = '$address', 
			addressCount = '$addressCount', 
			city = '$city', 
			postalcode = '$postalcode', 
			country = '$country', 
			state = '$state' ,
			updated = '$datenow',
			updatedby = '$name'
			where id = '".$row["defaultAddress"]."'";
 		
	//update customer table		
    $resultUpC = mysqli_query($link,$query) or die('Errant query:  '.$query);
	//update address table 
	$resultAdrs = mysqli_query($link,$queryAdrs) or die('Errant query:  '.$queryAdrs);
	//Insert into Customer Login table
	if ($row["userEmail"] <> $email){
	createdCust_User ($opr,$pass,$email,$fname,$lname,$datenow,$custid,$conn)  ;
	}
		}
	}

	else
	{
		if ($opr ==  "addfrmCustomer") {$fnameAdrs = $fname; $lnameAdrs = $lname;$name ="online";
		//insert Afresh
		$query = "insert into customer (fname, 
										lname, 
										email, 
										acceptMarketing, 
										taxExempted, 
										note, 
										tags,
										created,
										createdby 
										) values (
										'$fname', 
										'$lname', 
										'$email', 
										'$acceptMarketing', 
										'$taxExempted', 
										'$note', 
										'$tags',
										'$datenow',
										'$name'
												) ";
		$mode ="saved";
				
		
		if ($conn->query($query) === TRUE) 
		{ 
			//get insert id of customer
			$custid = $conn->insert_id;
			//check if customer is creation log in account
			if ($opr ==  "addfrmCustomer") {$fnameAdrs = $fname; $lnameAdrs = $lname;$name ="online";}
			
			$queryAdrs = "insert into customer_address (CUST_Id,fname, lname, company, phone, address, addressCount, city,	postalcode, country, state ,created,createdby 
			) values ('$custid','$fnameAdrs', 
			'$lnameAdrs', 
			'$company', 
			'$phone', 
			'$address', 
			'$addressCount', 
			'$city', 
			'$postalcode', 
			'$country', 
			'$state',
			'$datenow',
			'$name' 
			)";
			//insert  address table and get defauld addrss id  
	        if ($conn->query($queryAdrs) === TRUE) 
			 {	   /*Update customer with defaul address */  //->insert_id;   mysqli_insert_id($conn);
				   $addindAddid = $conn->insert_id;   $updateCustDefaultAdd ="update customer set defaultAddress = '$addindAddid' where id = '$custid'"; 
					if ($conn->query($updateCustDefaultAdd ) === TRUE){} else {echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";}
			  }
	
			//Insert into Customer Login table
			createdCust_User ($opr,$pass,$email,$fname,$lname,$datenow,$custid,$conn)  ;
			
		}
	}


}
}


function createdCust_User ($opr,$pass,$email,$fname,$lname,$datenow,$custid,$conn) 
{
if ($opr ==  "addfrmCustomer") 
			{	//inser user into user tabel
					$adminPass = sha1 ($pass);
					$adminPassSalt = sha1 ($email.'_'.$pass);
					$query_user_cust  = "INSERT INTO `user_customer` (
					 `CUST_Id`,`email`,`passHash`,`passSalt`, `role`, `status`, `created`, `createdby`
					  ) 
					  VALUES 
					  ('$custid',
					  '$email',
					  '$adminPass',
					 '$adminPassSalt',
					 '11',
					 '1',
					 '$datenow',
					 'online'
					);	"	;
					
					$_SESSION["customer_email"] =$email;
					$_SESSION["email"]=$email;
					$_SESSION["name"]=$fname. " " . $lname;
					$_SESSION["role"]="11";
					$_SESSION["userid"]=$custid;
					if ($conn->query($query_user_cust ) === TRUE){echo "1";} else {echo "Error: " . "<br> ".$query_user_cust."<br/>" . $conn->error."<br/><br/>";}

			//update Cart
			$a = session_id();
			if(empty($a)) session_start();
			$queryCart = "update  basket set customer_id = '$custid',customer_email ='$email'  where session_id = '$a' ";
	        $resulCartt = mysqli_query($conn,$queryCart) or die('Errant query:  '.$queryCart);
			}
	
	}



if ($opr ==  "update")  

{
	$query = "update customer set  
			fname = '$fname', 
			lname = '$lname', 
			email = '$email', 
			acceptMarketing = '$acceptMarketing', 
			taxExempted = '$taxExempted', 
			note = '$note', 
			tags = '$tags',
			updated = '$datenow',
			updatedby = '$name'
			where id = '$custid'";
			if ($conn->query($query) === TRUE) { }else	{ echo "Error: " . "<br> ".$query."<br/>" . $conn->error."<br/><br/>";}
	$mode ="updated";
	}

if ($opr ==  "updateAdrs")  
{
			
			$queryAdrs = "update customer_address set 
			fname = '$fnameAdrs', 
			lname = '$lnameAdrs', 
			company = '$company', 
			phone = '$phone', 
			address = '$address', 
			addressCount = '$addressCount', 
			city = '$city', 
			postalcode = '$postalcode', 
			country = '$country', 
			state = '$state' ,
			updated = '$datenow',
			updatedby = '$name'
			where id = '".$adrsid."'";
			if ($conn->query($queryAdrs) === TRUE) { }else	{ echo "Error: " . "<br> ".$queryAdrs."<br/>" . $conn->error."<br/><br/>";}
	$mode ="updated";
	}
	
	
	if ($opr ==  "addAdrs")  
{
	
			if ($adrsid == "" )
			{
				$queryAdrs = "insert into customer_address (CUST_Id,fname, lname, company, phone, address, addressCount, city,	postalcode, country, state,lga ,created,createdby 
			) values ('$custid','$fnameAdrs', 
			'$lnameAdrs', 
			'$company', 
			'$phone', 
			'$address', 
			'$addressCount', 
			'$city', 
			'$postalcode', 
			'$country', 
			'$state',
			'$lga',
			'$datenow',
			'$name' 
			)";
				
			}else {
				
				$queryAdrs = "update customer_address set 
			fname = '$fnameAdrs', 
			lname = '$lnameAdrs', 
			company = '$company', 
			phone = '$phone', 
			address = '$address', 
			addressCount = '$addressCount', 
			city = '$city', 
			postalcode = '$postalcode', 
			country = '$country', 
			state = '$state' ,
			lga = '$lga',
			updated = '$datenow',
			updatedby = '$name'
			where id = '".$adrsid."'";
				
			}
			
			
			
			
			
		if ($conn->query($queryAdrs) === TRUE) { echo "1";}else	{ echo "Error: " . "<br> ".$queryAdrs."<br/>" . $conn->error."<br/><br/>";}
	//$mode ="saved";
}
	


if ($opr ==  "setdefaultAdrs")  
{
	   $updateCustDefaultAdd ="update customer set defaultAddress = '$adrsid' where id = '$custid'"; 
	if ($conn->query($updateCustDefaultAdd ) === TRUE){} else {echo "Error: " . "<br> ".$updateCustDefaultAdd."<br/>" . $conn->error."<br/><br/>";}
}
	
	
if ($opr ==  "getCust")  
{
	$queryCheck = "select * from customer where id = '$custid'";
    $result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{   header('Content-type: application/json');
		echo json_encode(array('posts'=>$row));
		}
		}

}	
	
	
if ($opr ==  "getCustAdrss")  
{
	$queryCheck = "select * from customer_address where CUST_Id = '$custid'";
    $result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{   
		header('Content-type: application/json');
		echo json_encode(array('posts'=>$row));
		}
		}

}	
	
	
	if ($opr ==  "getAdrs")  
{
	$queryCheck = "select * from customer_address where Id = '$adrsid'";
    $result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{   
		header('Content-type: application/json');
		echo json_encode(array('posts'=>$row));
		}
		}

}		
	
	
	
 
 
			
if ($opr ==  "resetMailFrmCust")  
{
	$queryCheck = "select *, (select  CONCAT( fname, ' ', lname) from customer where customer.id = CUST_Id) custname from user_customer where email = '$email'";
    $resultsm = mysqli_query($link,$queryCheck) or die('Errant query:  '.$queryCheck);
	if(mysqli_num_rows($resultsm)) 
	{
		while($row = mysqli_fetch_assoc($resultsm)) 
		{   
		 $custname =   $row["custname"]   ; 
		 $resetLink = generateRandomStringPassrestLing(50);
		 $resetMailSent = false;
		
		if ($mailClientCust == "external")
		{
			$resetMailSent = ExternalSend ($email,BuidBodyResetMail($custname,$resetLink,$shopDomain), $shopname,$mailClientIdCust,$custname,$link ) ;
		}
		else 
		{
			 $resetMailSent = domailDomainMail($email,$shopname,BuidBodyResetMail($custname,$resetLink,$shopDomain),$domainEmail  );
		}
		
		
		if ($resetMailSent == true)
		{  $query_user_cust  = "update `user_customer` set					 
						 detail = '$resetLink'
						 where email = '$email'"	;
				 $result = mysqli_query($link,$query_user_cust) or die('Errant query:  '.$query_user_cust);		 
		}
		echo "1";
	}
  }else {
	echo "The email you specified doesn't exist on our system";
  }
}		
	
	
	
	
	
	
	
	
function BuidBodyResetMail ($custname, $resetLink,$shopDomain)	{
		$body ='
		<table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                
                                                
<tbody><tr>
<td align="left" class="m_-3555458350901398510text m_-3555458350901398510h3" style="color:#575a5b;font-family:'."'Open Sans'".',Verdana,Helvetica,Arial,sans-serif;font-size:24px;font-weight:bold;line-height:36px">
Hey '.$custname.',
 </td>
 </tr>
                                                
                                                
<tr>
<td align="left" class="m_-3555458350901398510text" style="color:#393d40;font-family:'."'Open Sans'".',Verdana,Helvetica,Arial,sans-serif;font-size:16px;line-height:24px;padding-top:8px">
 Someone has requested a link to change the <b>password</b> for your account. You can do so using the link below:
</td>
</tr>
                                                
                                                
<tr>
 <td align="center" style="padding-top:16px">
                                                        
                                                        
<a class="m_-3555458350901398510btn-a" href="'.$shopDomain."/custrest.php?p=".$resetLink.'" style="background-color:#21abc7;border-radius:100px;color:#ffffff;display:inline-block;font-family:'."'Open Sans'".',Verdana,Helvetica,Arial,sans-serif;font-size:14px;font-weight:600;line-height:40px;text-align:center;text-decoration:none;width:200px" target="_blank" >Change My <b>Password</b></a>
                                                        
                                                        
</td>
 </tr>
                                                
                                                
<tr>
<td align="left" class="m_-3555458350901398510text" style="color:#393d40;font-family:'."'Open Sans'".',Verdana,Helvetica,Arial,sans-serif;font-size:14px;line-height:21px;padding-top:16px">
 If you didn'."'".'t ask for a new <b>password</b>, you can safely ignore or delete this email.
</td>
</tr>
                                                
</tbody></table>
		';
return $body;		
		}
	
	
	
		
if ($opr ==  "resetPassFrmCust")  
{
	$queryCheck = "select * from user_customer where  detail = '$custresetLink'"; //email = '$email' and
    $result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{         $email = $row["email"];
					 $adminPass = sha1 ($pass);
					$adminPassSalt = sha1 ($email.'_'.$pass);
		
		            $query_user_cust  = "update `user_customer`  set
					 passHash = '$adminPass',
					 passSalt= '$adminPassSalt',
					 detail = ''
					 where detail  = '$custresetLink'
					 	"	;
					 $resultre = mysqli_query($link,$query_user_cust) or die('Errant query:  '.$query_user_cust);	
					 echo "1";
					 exit;
		
		}
	}
	else {echo "Invalid pasword reset link";}

}		
	









	
	
	
function generateRandomString($length = 10) {
    $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; //'0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;}
function generateRandomStringPassrestLing($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;}

function domailDomainMail($email,$shopname,$body,$domainEmail  ){	
// Multiple recipients
$to = $email; // note the comma

// Subject
$subject = $shopname. ' - Password Recovery';

// Message
$message = $body;

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = "To: $to";
$headers[] = "From: $shopname <$domainEmail>";
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
if (mail($to, $subject, $message, implode("\r\n", $headers))) {$mailSent=true;} else {$mailSent=false;}
return $mailSent;}

///generic external mail client

function ExternalSend ($email,$body, $shopname,$mailClientIdCust,$custname,$link ) 
{
			$host="";   	$port="";  		$auth="";    $username="";      $password=""; $mailSent = false;
	
	$query = "select * from shop_ExtMailClient where id = '$mailClientIdCust'";
    $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($result)) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{  $host = $row["host"]; $port= $row["port"];  $auth=$row["auth"];   $username=$row["username"];     $password=$row["password"];}
	}
	
	$mail = new PHPMailer(true);
	
	$mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = $auth; // enable SMTP authentication
    //$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = $host; // sets GMAIL as the SMTP server //smtp.gmail.com 
    $mail->Port =$port ; // set the SMTP port for the GMAIL server  //$port
    $mail->Username = $username; // GMAIL username
    $mail->Password = $password; // GMAIL password

	$mail->AddAddress($email, $custname);
	$mail->SetFrom($username, $shopname);//$shopname
	$mail->Subject = $shopname. " - Pawssword Recovery";
	$mail->Body = $body;
	$mail->IsHTML(true);
	
	try{
    $mail->Send();
	$mailSent = true;
    //echo "Success!";
} catch(Exception $e){
    //Something went bad
	 echo "Fail - " . $mail->ErrorInfo . $e;
}
	
return $mailSent;
}













//gmail send mail 
function gmailSend ($email,$body, $googleEmail,$googlePassword,$shopname ) 
{
$from = '<$shopname>';
//$to = '<toaddress@yahoo.com>';
$subject = $shopname. ' - Password Recovery';
//$body = "Hi,\n\nHow are you?";

$headers = array(
    'From' => $from,
    'To' => $email,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', 
	array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => $googleEmail,
        'password' => $googlePassword
    ));

$mail = $smtp->send($email, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>' ); $mailSent=false;
} else {
    echo('<p>Message successfully sent!</p>'); $mailSent=true;
}
return $mailSent;}


//another gmail 
function gmailSend2($email,$body, $googleEmail,$googlePassword,$shopname) 
{
$mail = new PHPMailer(true);
$send_using_gmail = true;
//Send mail using gmail
if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "ssl://smtp.gmail.com"; // sets GMAIL as the SMTP server //smtp.gmail.com 
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "adedamolaiadeyemi@gmail.com"; // GMAIL username
    $mail->Password = "Dragon@001"; // GMAIL password
}

/*$mail->AddAddress($email, $name);
$mail->SetFrom($email_from, $name_from);
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";*/
//Typical mail data
$mail->AddAddress("adedamola.adeyemi@live.com", "Damola");
$mail->SetFrom("adedamolaiadeyemi@gmail.com", "Adedamola Adeyemi");
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo . $e;
}

}
	@mysqli_close($link);
	
	

	
	 //echo $mode ;
	 //if ($mode == "updated") {echo "updated" ;} else if ($mode == "updated") {echo "saved";} else {}

?>