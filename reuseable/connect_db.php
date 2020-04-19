<?php 

$db_host = "localhost";

$db_username = "solidview"; 

$db_pass = "solidview123"; 

$db_name = "solidview";

mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");

$defaultPass = 'solidview123';   


//$hostname_connSifax = "mysqlv111";
//$database_connSifax = "sifaxdbasen";
//$username_connSifax = "sifax";
//$password_connSifax = "Sifax123";
//$connSifax = mysql_pconnect($hostname_connSifax, $username_connSifax, $password_connSifax) or trigger_error(mysql_error(),E_USER_ERROR); 

//$connSifaxDB = mysql_select_db($database_connSifax) or trigger_error(mysql_error(),E_USER_ERROR); 

?>