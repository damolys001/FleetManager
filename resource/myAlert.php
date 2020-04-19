<?php
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
require_once('PHPMailer/PHPMailerAutoload.php');

interface sendAlert_interface
{
    public function sendMail($to,$toName,$mailBody, $subject);
    
}

class sendAlert  //implements sendMailSend_interface
{
    
public function DoMail($to,$toName,$mailBody, $subject,$link)
    { 
            $shopname = "";
			$customerEmail = "";
			$domainEmail = "";
			$shopDomain = "";
			$mailClientCust = ""; 
			$mailClientIdCust="";
        
        $shop = "select * from  shop_basic where id = 1";
    $resultshop = mysqli_query($link,$shop) or die('Errant query:  '.$shop);
	if(mysqli_num_rows($resultshop)) 
	{
		while($row = mysqli_fetch_assoc($resultshop)) 
		{
            $MailSent = false;
			$shopname = $row["name"];
			$customerEmail = $row["cutomer_email"];
			$domainEmail = $customerEmail;
			$shopDomain = $row["shopDomain"];
			$mailClientCust = $row["mailClientCust"];; 
			$mailClientIdCust=$row["mailClientIdCust"];
            
            
		}
	}
        
        
        if ($mailClientCust == "external")
		{
			$MailSent = ExternalSend ($to,$toName,$mailBody,$mailClientIdCust,$link,$shopname,$subject ) ;
		}
		else 
		{
			 $MailSent = domailDomainMail($to,$toName,$shopname,$mailBody,$domainEmail ,$subject  );
		}
        
        
    
    }
        

   public function DoSMS ($to,$body,$link)
   {
    $smsName="";
    $shop = "select smsName,smsAPI from  shop_basic where id = 1";
    $resultshop = mysqli_query($link,$shop) or die('Errant query:  '.$shop);
	if(mysqli_num_rows($resultshop)) 
	{
		while($row = mysqli_fetch_assoc($resultshop)) 
		{           
			$smsName = $row["smsName"];
            $smsLink = $row["smsAPI"];
		}
	}
        
       
      $to = substr($to,1);
       $body =urlencode($body);
       if ($smsLink =="" )
       {
         $smsLink="http://api2.infobip.com/api/sendsms/plain?user=Ensure&password=Ensureit1234&type=LongSMS&appid=20RW5zdXJlOkVuc3VyZWl0MTIzNA==&sender=$smsName&GSM=+234$to&SMSText=$body"; 
       }// echo $smsLink;
       $smsLink="http://api2.infobip.com/api/sendsms/plain?user=Ensure&password=Ensureit1234&type=LongSMS&appid=20RW5zdXJlOkVuc3VyZWl0MTIzNA==&sender=$smsName&GSM=+234$to&SMSText=$body"; 
          $curl_handle=curl_init();
          curl_setopt($curl_handle,CURLOPT_URL,$smsLink);
          curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
          curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
          $buffer = curl_exec($curl_handle);
          curl_close($curl_handle);
          if (empty($buffer))
          {
              print "Nothing returned from url.<p>";
          }
          else
          {
              //print $buffer;
          }
   }
        
}



 function domailDomainMail($email,$emailName,$shopname,$body,$domainEmail ,$subject ){	
// Multiple recipients
$to = $email; // note the comma
$toName =$emailName;
     
     
// Subject
$subject = $subject;

// Message
$message = $body;

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = "To: $toName<$to>";
$headers[] = "From: $shopname <$domainEmail>";
//$headers[] = 'Cc: birthdayarchive@example.com';
//$headers[] = 'Bcc: birthdaycheck@example.com';

// Mail it
if (mail($to, $subject, $message, implode("\r\n", $headers))) {$mailSent=true;} else {$mailSent=false;}
return $mailSent;}

///generic external mail client

function ExternalSend ($email,$emailName,$body,$mailClientIdCust,$link,$shopname,$subject ) 
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

	$mail->AddAddress($email, $emailName);
	$mail->SetFrom($username, $shopname);//$shopname
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->IsHTML(true);
    
    try{
        $mail->Send();
        } 
    catch(Exception $e)
    {
   
	
    $sendMailInt ="https://ebusiness.ensure.com.ng/t/services/domailget?senderMask=$shopname&header=true&key=AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w&reciveremail=$email&reciveremailCC=&reciveremailBC=&subject=$subject&recivername=$emailName&msg=$body&filepath=";
    //echo $sendMailInt;
        try{ 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $sendMailInt);
            $content = curl_exec($ch);
            echo $content;
            $mailSent = true;
           } 
        catch(Exception $ei){ echo $ei;}
    
     }
	try{
    //
       // $mail->Send();
       
	//$mailSent = true;
   // //echo "Success!";
} catch(Exception $e){
         
        
        //print $e;
    //urlencode($userinput)
       
     /*   
        file_get_contents("https://ebusiness.ensure.com.ng/t/services/domailget?senderMask=$shopname&header=true&key=AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w&reciveremail=$email&reciveremailCC=&reciveremailBC=&subject=$subject&recivername=$emailName&msg=$body&filepath=");
       
        $response = http_get("https://ebusiness.ensure.com.ng/t/services/domailget/", array("timeout"=>1), $info);
print_r($info);
        
        
        /*
       try{ 
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $mailLink);
            $content = curl_exec($ch);
            echo $content;
           } 
        catch(Exception $ei){ echo $ei;}
        
         print $mailLink;
          $curl_handle=curl_init();
          curl_setopt($curl_handle,CURLOPT_URL,$mailLink);
          curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
          curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
          $buffer = curl_exec($curl_handle);
          curl_close($curl_handle);
          if (empty($buffer))
          {
              print "Nothing returned from url.<p> " +  $mailLink;
          }
          else
          {
              //print $buffer;
          }*/
        
        
        //Something went bad
	 //echo "Fail - " . $mail->ErrorInfo . $e;
}
	
return $mailSent;
}

?>
