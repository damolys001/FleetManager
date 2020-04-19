<?php 

$db_host = "localhost";

$db_username = "ensurefleet"; 

$db_pass = "ensurefleet123"; 

$db_name = "ensurefleet";

//mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
//mysql_select_db("$db_name") or die ("no database");   


$link = mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die('Cannot connect to the DB');
$conn = mysqli_connect("$db_host","$db_username","$db_pass","$db_name") or die('Cannot connect to the DB');

$defaultPass = 'ensurefleet123';  



	//mysqli_select_db("$db_name",$link) or die('Cannot select the DB');

//$hostname_connSifax = "mysqlv111";
//$database_connSifax = "sifaxdbasen";
//$username_connSifax = "sifax";
//$password_connSifax = "Sifax123";
//$connSifax = mysql_pconnect($hostname_connSifax, $username_connSifax, $password_connSifax) or trigger_error(mysql_error(),E_USER_ERROR); 

//$connSifaxDB = mysql_select_db($database_connSifax) or trigger_error(mysql_error(),E_USER_ERROR); 

?>