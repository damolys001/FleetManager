<?php 
include_once "session.php";
include_once "../reuseable/connect_db_link.php";
require_once('myAlert.php');

$alert = new sendAlert;

$name="";
if(isset($_SESSION["name"]))$name = $_SESSION["name"]; //if ($name=""){echo "invalid access cridential";exit;}
$roleSaver =$_SESSION["role"];
$query ="";
$mode = "";
$resetpass="";
$useridforUpdate ="";


$datenow = date("Y/m/d");


$pic ="";
$namef  ="";
$namel  ="";
$nameo  ="";
$email  ="";

$role  ="";
$location  ="";
$sex  ="";
$department ="";
$detail  ="";
 
$approver1  ="";
$approver2  ="";
$approver3  ="";
$status ="";
$shopDomain ="";
$shopName ="";

if(isset($_REQUEST["namef"]))$namef = $_REQUEST["namef"];
if(isset($_REQUEST["namel"]))$namel = $_REQUEST["namel"];
if(isset($_REQUEST["nameo"]))$nameo = $_REQUEST["nameo"];
if(isset($_REQUEST["email"]))$email = $_REQUEST["email"];
if(isset($_REQUEST["role"]))$role = $_REQUEST["role"];
if(isset($_REQUEST["sex"])) $sex = $_REQUEST["sex"];
if(isset($_REQUEST["location"]))$location =  $_REQUEST["location"];
if(isset($_REQUEST["department"]))$department =$_REQUEST["department"];
if(isset($_REQUEST["approver1"]))$approver1 =$_REQUEST["approver1"];
if(isset($_REQUEST["approver2"]))$approver2 =$_REQUEST["approver2"];
if(isset($_REQUEST["approver3"]))$approver3 =$_REQUEST["approver3"];
if(isset($_REQUEST["status"]))$status =$_REQUEST["status"];

 
if(isset($_REQUEST["resetpass"]))$resetpass = $_REQUEST["resetpass"];

if(isset($_SESSION["useridforUpdate"])) $useridforUpdate = $_SESSION["useridforUpdate"];




//get Shop basis
$queryBasic = "select * from shop_basic where id = 1";
   $resultBasic = mysqli_query($link,$queryBasic) or die('Errant query:  '.$queryBasic);     
if(mysqli_num_rows($resultBasic)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultBasic)) 
        {
            $startBookHrs = DateTime::createFromFormat('H:i', $rowOpt["bookingStart"]);
            $endBookHrs = DateTime::createFromFormat('H:i', $rowOpt["bookingEnd"]);
            $maxHour =$rowOpt["maxHour"];
            $maxPerDept = $rowOpt["maxPerDept"];
            $shopDomain  = $rowOpt["shopDomain"];
            $shopName = $rowOpt["name"];
        }
    }





if ($email == "" || $role =="") {}else {
	
if (!filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
  echo("$email is not a valid email address");
} else {


//$productid = $_SESSION["productid"];

if ($resetpass == "" ) {

//Check if product name exit
$queryCheck = "select * from user where email = '$email'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
            if (($roleSaver =="2")||($roleSaver =="1"))
            {
            $query = "update user set 
                    namef = '$namef', 
                    namel ='$namel' , 
                    nameo ='$nameo' , 
                    role ='$role', 
                    status ='$status',
                    location  ='$location',
                    sex ='$sex',
                    department ='$department',
                    detail ='$detail',
                    
                    approver1 ='$approver1',
                    approver2 ='$approver2',
                    approver3 ='$approver3',
                  

                    updated= '$datenow',
                    updatedby ='$name' 
                    where email ='$email'";
                    $mode ="Updated";
            }
            else if (($roleSaver =="3")||($roleSaver =="4"))
            {
               
                    $query = "update user set 
                    namef = '$namef', 
                    namel ='$namel', 
                    nameo ='$nameo', 
                    sex ='$sex', 
                    updated= '$datenow',
                    updatedby ='$name' 
                    where email ='$email'";
                    $mode ="Updated";
            }
        else 
        {
            echo "invalid role";
        }
    
    }
            else
        {
		
           if (($roleSaver =="2")||($roleSaver =="1"))
            {   
            
                //inser user into user table
                    $adminPass = sha1 ($defaultPass);
                    $adminPassSalt = sha1 ($email.'_'.$defaultPass);
                $query  = "INSERT INTO `user` (
                 `id`,  `email`, `namel`, `namef`, `passHash`,`passSalt`, `role`, `status`, `created`, `createdby`
                  ) 
                  VALUES 
                  (NULL,
                  '$email', 
                 '$namef', 
                 '$namel', 
                 '$adminPass',
                 '$adminPassSalt',
                 '$role',
                 '1',
                 '$datenow',
                 '$name'
                );	"	;
             
                
                 $mailBodyUser="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>
                    Dear ".$namef." ".$namel.",<br/><br/>
Kindly note that an account has been creted for you on  $shopName <br/><br/>

You can login at   $shopDomain <br/><br/>
<div style='background: rgba(179,220,237,1);
background: -moz-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(179,220,237,1)), color-stop(50%, rgba(41,184,229,1)), color-stop(100%, rgba(188,224,238,1)));
background: -webkit-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
background: -o-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 background: -ms-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 background: linear-gradient(135deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3dced', endColorstr='#bce0ee', GradientType=1 );
border-radius:5px;'>
<table align='center' class='table001' >
<tr><td>User Name:</td><td> $email<td></tr>
<tr><td>password:</td><td> $defaultPass<td></tr>

</table>
</div>
<style>
.table001
{
background: rgba(179,220,237,1);
/* Old Browsers */background: -moz-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 /* FF3.6+ */background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(179,220,237,1)), color-stop(50%, rgba(41,184,229,1)), color-stop(100%, rgba(188,224,238,1)));
/* Chrome, Safari4+ */background: -webkit-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 /* Chrome10+,Safari5.1+ */background: -o-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 /* Opera 11.10+ */background: -ms-linear-gradient(-45deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
 /* IE 10+ */background: linear-gradient(135deg, rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 100%);
/* W3C */filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b3dced', endColorstr='#bce0ee', GradientType=1 );
/* IE6-9 fallback on horizontal gradient */
border-radius:5px;
}
</style>

                    ";
                
                $alert->DoMail($email,$namef.' '.$namel,$mailBodyUser,"User Account Creation",$link);
                
                echo "Created";
            }
        }

	/*	
		
		//$query = "insert into user (`namef`,`namel`,`created`,`createdby`) values ('$product','$price','$datenow','$name') ";
		$mode ="saved";

    */
}


else {
	$adminPass = sha1 ($defaultPass);
	$adminPassSalt = sha1 ($email.'_'.$defaultPass);
	$query = "update user set  passHash = '$adminPass', passSalt = '$adminPassSalt', updated ='$datenow', updatedby ='$name' where id ='$useridforUpdate'";
			$mode ="reset";
	}








//$query = "insert into log (`page_name`,`detail`,`created`,`createdby`) values ('$pagename','$detail','$datenow','$name') ";
	/*$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo $row["detail"];
		}
	}*/
/* disconnect from the db */
	//@mysqli_close($link);
	
	
	
	if ($conn->query($query) === TRUE) {
     //echo "Successfully Updated";
	 echo $mode ;
	 //if ($mode == "updated") {echo "updated" ;} else if ($mode == "updated") {echo "saved";} else {}
} else {
    echo "Error: " . "<br>" . $conn->error."<br/><br/>";
}
}
}
?>