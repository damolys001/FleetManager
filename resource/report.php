<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$userid  ="";
$datenow = date("Y/m/d");
$dashboard = array(); 
$filename = "excelfilename"; 
$name = $_SESSION["name"];

//get now time & date
$userTimeZone ="GMT+1";
$timezone = new \DateTimeZone($userTimeZone);
$date = new \DateTime('@' . time(), $timezone);
$date->setTimezone($timezone);
$now = $date->getTimestamp() + $date->getOffset();




if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
//if(isset ($_SESSION["userid"]) ){ $userid = $_SESSION["userid"]; }


//var intiation
$id= "";
$opr="";
$sDate="";
$eDate="";
$status ="";
$title ="";

////getting id
$userid = $_SESSION["userid"];
$roleUpdater = $_SESSION["role"];
if (isset($_REQUEST["id"])){$id=$_REQUEST["id"];}
if (isset($_REQUEST["opr"])){$opr=$_REQUEST["opr"];}
if (isset($_REQUEST["sDate"])){$sDate=$_REQUEST["sDate"];}
if (isset($_REQUEST["eDate"])){$eDate=$_REQUEST["eDate"];}
if (isset($_REQUEST["status"])){$status=$_REQUEST["status"];}

if (($roleUpdater == "1")||($roleUpdater == "2")){}else {$id=$userid;} 

//echo $id;


$myStartDateTime = DateTime::createFromFormat('j F Y - H:i', $sDate);
$myEndDateTime = DateTime::createFromFormat('j F Y - H:i', $eDate);

//if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }

if ($opr=="getuser")
{ 
    //get id credential
    $query1 = "select * from user where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $namef =$row["namef"];
        $namel = $row["namel"];
        $title ="<h3>Showing $status  Report(s) for ".$row["namef"]." ".$row["namel"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Users Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status Users Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $namef $namel Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $namef $namel from $sDate to $eDate</h3>";}
    
    
    ?>
    
   
 <div class="col-lg-12">
    <?php echo $title; ?>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   
   if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";

    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";

    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";

    }
    
   
   
   // echo $query;
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ echo "                               <thead>
                                            <tr>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th>Status</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["userName"].'</td>

                               </tr>';
       
       
       }
    } 
    
}

if ($opr=="expuser")
{
                                        $file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
    //get id credential
    $query1 = "select * from user where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $namef =$row["namef"];
        $namel = $row["namel"];
        $title ="<h3>Showing $status  Report(s) for ".$row["namef"]." ".$row["namel"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Users Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status Users Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $namef $namel Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $namef $namel from $sDate to $eDate</h3>";}
    
    ?>
    
   
 <div class="col-lg-12">
    <?php echo $title; ?>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 // echo $query;
  $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   
   if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";

    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";

    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,(select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName  from bookingLog where user ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";

    }
    
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
    
	{ 
	                                    
	   
       
       echo "                               <thead>
                                            <tr>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th>Status</th>
                                                <th>User</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["userName"].'</td>

                               </tr>';
       
       
       }
    } 
   /* 
    $resultexp = mysqli_query($link,$query) or die('Errant query:  '.$query);
    if(mysqli_num_rows($resultexp)) 
	{
		

										$rowNum = mysqli_num_rows($resultexp);
										//header('Content-type: application/json');
										$file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
										/*******Start of Formatting for Excel*******  
										//define separator (defines columns in excel & tabs in word)
										$sep = "\t"; //tabbed character
									
//print field name
while ($property = mysqli_fetch_field($resultexp)) {
    //echo $property->name. "\t";
	$rgg[] = $property->name;
}
print("\n"); 
		
        //print the field values								
		//while($row = mysqli_fetch_assoc($result)) 
		while($row = mysqli_fetch_assoc($resultexp)) 
		{
		$schema_insert = "";
		
        for($j=0; $j<mysqli_num_fields($resultexp);$j++)
        {
			$gh = $rgg[$j];
			 //$schema_insert .= $row['uniqueId'].$sep;
			 if(!isset($row[$gh]))
                $schema_insert .= "".$sep;//$schema_insert .= "NULL".$sep;
            elseif ($row[$gh] != "")
                $schema_insert .= "$row[$gh]".$sep;
            else
                $schema_insert .= "".$sep;
				
		}
			//$schema_insert .= getbalance ($row['uniqueId'],$link).$sep;
		
		
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
		
		}
		
	}*/
    
    
    
}



/////get department
if ($opr=="getdepartment")
{
    //get id credential
    
    $query1 = "select * from department where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $department = $row["department"];
        $title ="<h3>Showing  Report for $status ".$row["department"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Departments Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status  Departments Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $department Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $department from $sDate to $eDate</h3>";}
    
    
    
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
  $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
 
  if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') 
 ";
    }
    else if ($id=="" && $status!="")
    {
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') 
 ";
    }
    else if ($id!="" && $status!="")
    {
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
    }
    
    
 
 
   // echo $query;
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ echo "                               <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                <th >Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["userName"].'</td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["departmentName"].'</td>

                               </tr>';
       
       
       }
    } 
    
}

if ($opr=="expdepartment")
{
    $file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
    
    //get id credential
   //get id credential
    
    $query1 = "select * from department where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $department = $row["department"];
        $title ="<h3>Showing  Report for $status ".$row["department"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Department Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status  Department Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $department Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $department from $sDate to $eDate</h3>";}
    
    
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
 
  if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') 
 ";
    }
    else if ($id=="" && $status!="")
    {
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') 
 ";
    }
    else if ($id!="" && $status!="")
    {
        $query = "select *, TIMEDIFF(end, start)hrs ,
 (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName
  from bookingLog where department ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or 
 end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'
 ";
    }
 
 
   // echo $query;
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ 
                                        
                                        
       echo "                               <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                <th >Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["userName"].'</td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["departmentName"].'</td>

                               </tr>';
       
       
       }
    } 
    
    
    
    
}




/////get fleet
if ($opr=="getfleet")
{
    //get id credential
    $query1 = "select * from fleet where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $fleetDesc = $row["regNo"]." ".$row["maker"]." ".$row["model"];
        $title ="<h3>Showing  Report for $status ".$row["regNo"]." ".$row["maker"]." ".$row["model"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Fleet Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status Fleet Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $fleetDesc Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $fleetDesc from $sDate to $eDate</h3>";}
    
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName
   from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   // echo $query;
    if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
    
    
   
   
   
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ echo "                               <thead>
                                            <tr>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                 <th >Fleet</th>
                                                  <th >Driver</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["fleetName"].'</td>
                                                <td >'.$row["driverName"].'</td>

                               </tr>';
       
       
       }
    } 
    
}

if ($opr=="expfleet")
{
                                         $file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
    //get id credential
    $query1 = "select * from fleet where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $fleetDesc = $row["regNo"]." ".$row["maker"]." ".$row["model"];
        $title ="<h3>Showing  Report for $status ".$row["regNo"]." ".$row["maker"]." ".$row["model"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
   
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Fleet Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status Fleet Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $fleetDesc Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $fleetDesc from $sDate to $eDate</h3>";}
    
    
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName
   from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   // echo $query;
    if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where fleet ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
    
    
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ 
	                                    
       echo "                               <thead>
                                            <tr>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                 <th >Fleet</th>
                                                  <th >Driver</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["fleetName"].'</td>
                                                <td >'.$row["driverName"].'</td>

                               </tr>';
       
       
       }
    
}

}




/////get Driver
if ($opr=="getdriver")
{
    //get id credential
    $query1 = "select * from driver where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $driverDesc = $row["fName"]." ".$row["lName"];
       $title ="<h3>Showing  Report for $status ".$row["fName"]." ".$row["lName"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Drivers Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status  Driver Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $driverDesc Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $driverDesc from $sDate to $eDate</h3>";}
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
 $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   // echo $query;
   if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
    
    
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ echo "                                <thead>
                                            <tr>
                                             <th>Trip Id</th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                  <th >Driver</th> 
                                                  <th >Driver Rating</th>
                                                  <th >Fleet</th>
                                                <th >User</th> 
                                                  <th >Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["id"].'</td>'.
                                               '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                               <td >'.$row["driverName"].'</td> 
                                               <td >'.round($row["driverRating"],2).'</td>
                                               
                                               <td >'.$row["fleetName"].'</td>
                                               <td >'.$row["userName"].'</td> 
                                               <td >'.$row["departmentName"].'</td> 

                               </tr>';
       
       
       }
    } 
    
}

if ($opr=="expdriver")
{	                                   $file_ending = "xls";
										//header info for browser
										header("Content-Type: application/xls");    
										header("Content-Disposition: attachment; filename=$filename.xls");  
										header("Pragma: no-cache"); 
										header("Expires: 0");
    //get id credential
    $query1 = "select * from driver where id ='$id'";
    $result = mysqli_query($link,$query1) or die('Errant query:  '.$query1);
	if(mysqli_num_rows($result)) 
	{ while($row = mysqli_fetch_assoc($result)) 
        {
	    $driverDesc = $row["fName"]." ".$row["lName"];
       $title ="<h3>Showing  Report for $status ".$row["fName"]." ".$row["lName"]." request from $sDate to $eDate</h3>";
       }
    }
    
    
    if ($id=="" && $status=="")
    { $title ="<h3>Showing Drivers Report(s) from $sDate to $eDate</h3>";}
    else if ($id=="" && $status!="")
    { $title ="<h3>Showing $status  Driver Report(s) from $sDate to $eDate</h3>";}
     else if ($id!="" && $status=="")
    { $title ="<h3>Showing $driverDesc Report(s) from $sDate to $eDate</h3>";}
    else if ($id!="" && $status!="")
    { $title ="<h3>Showing $status  Report(s) for $driverDesc from $sDate to $eDate</h3>";}
    
    
    ?>
    
   
 <div class="col-lg-12">
    <h3><?php echo $title; ?></h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
     <?php
///Get the report for user 
  $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
   // echo $query;
   if ($id=="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where  (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id=="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
     else if ($id!="" && $status=="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') ";
    }
    else if ($id!="" && $status!="")
    { 
        $query = "select *, TIMEDIFF(end, start)hrs,
 (select CONCAT_WS(' ',regNo,maker,model) from fleet where fleet.id = bookingLog.fleet) fleetName,
  (select CONCAT_WS(' ',namef,namel) from user where user.id = bookingLog.user) userName,
 (select department from department where department.id = bookingLog.department) departmentName,
 (select driver from myRating where referenceid = bookingLog.id) driverRating,
 (select CONCAT_WS(' ',fName,lName) from driver where driver.id = bookingLog.driver) driverName  from bookingLog where driver ='$id' and (start between '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."' or end between  '".$myStartDateTime->format('Y/m/d H:i')."' and '".$myEndDateTime->format('Y/m/d H:i')."') and status = '$status'";
    }
    
    
    $resultw = mysqli_query($link,$query) or die('Errant query:  '.$query);
	if(mysqli_num_rows($resultw)) 
	{ 

       echo "                                <thead>
                                            <tr>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Time (H:M:S)</th>
                                                <th >Status</th>
                                                  <th >Driver</th>
                                                  <th >Driver Rating</th> 
                                                  <th >Fleet</th>
                                                <th >User</th> 
                                                  <th >Department</th>
                                            </tr>
                                        </thead>
                                        <tbody>";
	   
       while($row = mysqli_fetch_assoc($resultw)) 
        {
	   $hrs = explode('.',$row["hrs"]);
       echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                            '<td >'.$row["Departure"].'</td>'.
                                                '<td >'.$row["destination"].'</td>'.
                                                '<td >'.$row["start"].'</td>'.
                                                '<td >'.$row["end"].'</td>'.
                                                '<td >'.$hrs[0].'</td>
                                                <td >'.$row["status"].'</td>
                                                <td >'.$row["driverName"].'</td>
                                                 <td >'. round($row["driverRating"],2).'</td>
                                                <td >'.$row["fleetName"].'</td>
                                                 <td >'.$row["userName"].'</td> 
                                               <td >'.$row["departmentName"].'</td>

                               </tr>';
       
       
       }
    } 
    
    
    
    
}










      exit();

?>