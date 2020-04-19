<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";

if (isset($_SESSION["name"])) {echo $_SESSION["name"];} else { echo "<script>window.location ='../pages/login.html'</script>";}
?>
