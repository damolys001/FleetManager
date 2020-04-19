<?php 
        $body="<style>table {border-collapse: collapse;    width: 50%;} th, td { text-align: left; padding: 8px;} tr:nth-child(even){background-color: #f2f2f2}</style>";
$mailBody="
                    Dear Admin,<br/><br/>
Kindly note that a user  was prevent from booking the car detailed below. Because no driver was assigned<br/><br/>
<table align='center' >
<tr><td>Car Make:</td><td> <td></tr>
<tr><td>Car User:</td><td> <td></tr>
<tr><td>Car Registration No: </td><td><td></tr>
<tr><td>Departure Location:</td><td> <td></tr>
<tr><td>Destination:</td><td><td></tr>
<tr><td>Start Date/ Time:</td><td><b></b><td></tr>
<tr><td>End Date/Time:</td><td><b></b><td></tr>
<tr><td>Driver Name:</td><td><td></tr>
<tr><td>Driver Phone:</td><td><td></tr>
</table>
                    ";

      
$mailBody = str_replace("<td","~",$mailBody);
$mailBody = str_replace("<","$",$mailBody);

$mailBody = str_replace("td>","%",$mailBody);
$mailBody = str_replace(">","*",$mailBody);


 $hgj="https://ebusiness.ensure.com.ng/t/services/domailget?senderMask=fleetmanager&header=true&key=AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w&reciveremail=damola.adeyemi@ensure.com.ng&reciveremailCC=&reciveremailBC=&subject=subject&recivername=Damola&msg="+$mailBody+"&filepath=";

/*$response = http_get("https://ebusiness.ensure.com.ng/t/services/domailget/", array('senderMask' => 'user1',
                         'header' => 'true',
                         'key'   => 'AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w',
                         'reciveremail'   => 'damola.adeyemi@ensure.com.ng',
                         'reciveremailCC'   => '',
                         'reciveremailBC'   => '',
                         'subject'   => '',
                         'recivername'   => 'Damola',
                         'msg'   => $mailBody,
                         'filepath'   => ''), $info);
print_r($info);
*/

//echo hash('sha256', $hgj);
//echo  urlencode($hgj);


echo $hgj;


             try{ 
                 
               $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $hgj);
            $content = curl_exec($ch);
            echo $content;  
                 
                 
                 
                 
                 $post = [
                         'senderMask' => 'user1',
                         'header' => 'true',
                         'key'   => 'AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w',
                         'reciveremail'   => 'damola.adeyemi@ensure.com.ng',
                         'reciveremailCC'   => '',
                         'reciveremailBC'   => '',
                         'subject'   => '',
                         'recivername'   => 'Damola',
                         'msg'   => '',
                         'filepath'   => ''
                     
                     
];
//Try 1
                 //$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, 'https://ebusiness.ensure.com.ng/t/services/domailget');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
//$response = curl_exec($ch);
//var_export($response);
                 
    //try 2             
//$ch = curl_init('https://ebusiness.ensure.com.ng/t/services/domailget/');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
//$response = curl_exec($ch);

// close the connection, release resources used
//curl_close($ch);

// do anything you want with your response
//var_dump($response);
                 
            
           } 
        catch(Exception $ei){ echo $ei;}

?>