<?php

require_once('myAlert.php');
$alert = new sendAlert;


//$alert->DoMail('damola.adeyemi@ensure.com.ng',"Adedamola Adeyemi","The body of my mail","My test Subject",$link)
$alert->DoSMS("08054844402","My testing MSG",$link);
?>