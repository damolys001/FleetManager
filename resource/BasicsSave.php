<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";




$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$name ="";
$bookingStart ="";
$bookingEnd  =""; 
$maxHour  =""; 
$maxPerDept   ="";
$datenow = date("Y/m/d");
$dashboard = array(); 


//shop Basics
$name ="";
$shopDomain ="";
$cutomer_email ="";
$cutomer_maskemail ="";
$legalName ="";
$phone ="";
$street ="";
$apt ="";
$city ="";
$postalcode ="";
$country ="";
$timezone ="";
$unitsystem ="";
$weightDefault ="";
$currency ="";
$currencySymbol ="";
$prifix ="";
$sufix ="";
$mailClient  ="";
$mailClientId  ="";
$mailClientCust  ="";
$mailClientIdCust  ="";
$bookingStart ="";
$bookingEnd  ="";
$maxHour  ="";
$maxPerDept  ="";
$smsName  ="";
$smsAPI  ="";
$adminEmail ="";
$created ="";
$createdby ="";
$detail ="";

//External Email
$aliasName ="";
$provider ="";
$host ="";
$port ="";
$auth ="";
$username ="";
$password ="";
$created ="";
$createdby ="";
$detail ="";
$SHOP_Id ="";






if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $name = $_SESSION["userid"]; }
if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }



//SHOP BASIC 
if(isset ($_REQUEST["id"]) ){ $id= $_REQUEST["id"]; }
if(isset ($_REQUEST["name"]) ){ $name= $_REQUEST["name"]; }
if(isset ($_REQUEST["shopDomain"]) ){ $shopDomain= $_REQUEST["shopDomain"]; }
if(isset ($_REQUEST["cutomer_email"]) ){ $cutomer_email= $_REQUEST["cutomer_email"]; }
if(isset ($_REQUEST["cutomer_maskemail"]) ){ $cutomer_maskemail= $_REQUEST["cutomer_maskemail"]; }
if(isset ($_REQUEST["legalName"]) ){ $legalName= $_REQUEST["legalName"]; }
if(isset ($_REQUEST["phone"]) ){ $phone= $_REQUEST["phone"]; }
if(isset ($_REQUEST["street"]) ){ $street= $_REQUEST["street"]; }
if(isset ($_REQUEST["apt"]) ){ $apt= $_REQUEST["apt"]; }
if(isset ($_REQUEST["city"]) ){ $city= $_REQUEST["city"]; }
if(isset ($_REQUEST["postalcode"]) ){ $postalcode= $_REQUEST["postalcode"]; }
if(isset ($_REQUEST["country"]) ){ $country= $_REQUEST["country"]; }
if(isset ($_REQUEST["timezone"]) ){ $timezone= $_REQUEST["timezone"]; }
if(isset ($_REQUEST["unitsystem"]) ){ $unitsystem= $_REQUEST["unitsystem"]; }
if(isset ($_REQUEST["weightDefault"]) ){ $weightDefault= $_REQUEST["weightDefault"]; }
if(isset ($_REQUEST["currency"]) ){ $currency= $_REQUEST["currency"]; }
if(isset ($_REQUEST["currencySymbol"]) ){ $currencySymbol= $_REQUEST["currencySymbol"]; }
if(isset ($_REQUEST["prifix"]) ){ $prifix= $_REQUEST["prifix"]; }
if(isset ($_REQUEST["sufix"]) ){ $sufix= $_REQUEST["sufix"]; }
if(isset ($_REQUEST["mailClient"]) ){ $mailClient= $_REQUEST["mailClient"]; }
if(isset ($_REQUEST["mailClientId"]) ){ $mailClientId= $_REQUEST["mailClientId"]; }
if(isset ($_REQUEST["mailClientCust"]) ){ $mailClientCust= $_REQUEST["mailClientCust"]; }
if(isset ($_REQUEST["mailClientIdCust"]) ){ $mailClientIdCust= $_REQUEST["mailClientIdCust"]; }
if(isset ($_REQUEST["bookingStart"]) ){ $bookingStart= $_REQUEST["bookingStart"]; }
if(isset ($_REQUEST["bookingEnd"]) ){ $bookingEnd= $_REQUEST["bookingEnd"]; }
if(isset ($_REQUEST["maxHour"]) ){ $maxHour= $_REQUEST["maxHour"]; }
if(isset ($_REQUEST["maxPerDept"]) ){ $maxPerDept= $_REQUEST["maxPerDept"]; }
if(isset ($_REQUEST["smsName"]) ){ $smsName= $_REQUEST["smsName"]; }
if(isset ($_REQUEST["smsAPI"]) ){ $smsAPI= str_replace ('_AND_', "&",$_REQUEST["smsAPI"]);  } //$smsAPI=  str_replace ('&', "'||'&'||'",$smsAPI); echo $smsAPI;
if(isset ($_REQUEST["adminEmail"]) ){ $adminEmail= $_REQUEST["adminEmail"]; }
if(isset ($_REQUEST["created"]) ){ $created= $_REQUEST["created"]; }
if(isset ($_REQUEST["createdby"]) ){ $createdby= $_REQUEST["createdby"]; }
if(isset ($_REQUEST["detail"]) ){ $detail= $_REQUEST["detail"]; }





// EXTERNAL EMAIL
if(isset ($_REQUEST["aliasName"]) ){ $aliasName= $_REQUEST["aliasName"]; }
if(isset ($_REQUEST["provider"]) ){ $provider= $_REQUEST["provider"]; }
if(isset ($_REQUEST["host"]) ){ $host= $_REQUEST["host"]; }
if(isset ($_REQUEST["port"]) ){ $port= $_REQUEST["port"]; }
if(isset ($_REQUEST["auth"]) ){ $auth= $_REQUEST["auth"]; }
if(isset ($_REQUEST["username"]) ){ $username= $_REQUEST["username"]; }
if(isset ($_REQUEST["password"]) ){ $password= $_REQUEST["password"]; }
if(isset ($_REQUEST["created"]) ){ $created= $_REQUEST["created"]; }
if(isset ($_REQUEST["createdby"]) ){ $createdby= $_REQUEST["createdby"]; }
if(isset ($_REQUEST["detail"]) ){ $detail= $_REQUEST["detail"]; }
if(isset ($_REQUEST["SHOP_Id"]) ){ $SHOP_Id= $_REQUEST["SHOP_Id"]; }

				

//Session role access validation
if ($_SESSION["role"] == "1" || $_SESSION["role"] == "2"){}
else {
    echo "No access for the requested operation";
    exit;
}


 

  if ($opr=="admin"||$opr=="booking")
  {
      $query = "
      update shop_basic set 
      bookingStart = '$bookingStart', 
      bookingEnd   = '$bookingEnd',  
      maxHour   = '$maxHour',  
      maxPerDept  = '$maxPerDept'  
      where id ='".$id."'  ";
      
     
      if ($conn->query($query) === TRUE) 
      {
        echo "Successfully Updated";
      }
      else
      {
          echo "Error: " . "<br>" . $conn->error."<br/><br/>"; 
      }

  }
  
  
if ($opr=="appName")
{
    $query = "
      update shop_basic set 
      name = '$name', 
      shopDomain   = '$shopDomain',  
      adminEmail   = '$adminEmail' 
      where id ='".$id."'  ";
      
     
      if ($conn->query($query) === TRUE) 
      {
        echo "Successfully Updated";
      }
      else
      {
          echo "Error: " . "<br>" . $conn->error."<br/><br/>"; 
      }
    
}

    
   if ($opr=="email")
{
    $query = "
      update shop_basic set 
      cutomer_email = '$cutomer_email', 
      mailClientCust = '$mailClientCust'

      where id ='".$id."'  ";
      
     
      if ($conn->query($query) === TRUE) 
      {
        echo "Successfully Updated";
      }
      else
      {
          echo "Error: " . "<br>" . $conn->error."<br/><br/>"; 
      }
    
} 
	



if ($opr=="extEmail")
{
    $query = "
      update shop_ExtMailClient set 
      aliasName = '$aliasName', 
        provider = '$provider', 
        host = '$host', 
        port = '$port', 
        auth = '$auth', 
        username = '$username', 
        password = '$password'


      where id ='".$mailClientIdCust."'  ";
      
     
      if ($conn->query($query) === TRUE) 
      {
        echo "Successfully Updated";
      }
      else
      {
          echo "Error: " . "<br>" . $conn->error."<br/><br/>"; 
      }
    
} 


if ($opr=="sms")
{
    $query = "
      update shop_basic set 
      smsName = '$smsName', 
      smsAPI = '$smsAPI'
       
     where id ='".$id."'  ";
      //echo $query ;
     
      if ($conn->query($query) === TRUE) 
      {
        echo "Successfully Updated";
      }
      else
      {
          echo "Error: " . "<br>" . $conn->error."<br/><br/>"; 
      }
    
} 

	
    exit();

?>
