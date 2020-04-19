<?php 
include_once "session.php";
 
 $name = $_GET["name"];
 $value =  $_GET["value"];
$_SESSION[$name] = $_GET["value"];
 ?>