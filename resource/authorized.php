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


//get now time & date
$userTimeZone ="GMT+1";
$timezone = new \DateTimeZone($userTimeZone);
$date = new \DateTime('@' . time(), $timezone);
$date->setTimezone($timezone);
$now = $date->getTimestamp() + $date->getOffset();




if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
//if(isset ($_SESSION["userid"]) ){ $userid = $_SESSION["userid"]; }

////getting id
$userid = $_SESSION["userid"];
$roleUpdater = $_SESSION["role"];
if (isset($_REQUEST["id"])){$id=$_REQUEST["id"];}
if (isset($_REQUEST["opr"])){$opr=$_REQUEST["opr"];}
if (($id == "undefined") ||($id =="")) {$id=$userid; }
if (($roleUpdater == "1")||($roleUpdater == "2")){}else {$id=$userid;} 

//echo $id;

//if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }


$MakeModel="";
$regNo="";
$color="";
$year ="";
$url="";
$driverName ="";
$driverUrl ="";
$phone ="";
$phone2 ="";
$driversLicenseNo ="";
$expiryDate="";
$location="";
$approverName="";


///Update Completed Trip
$queryU = "update bookinglog set status = 'Completed' where  status = 'Approved' and endTime < $now and createdForD = '$datenow' "; 
$resultS = mysqli_query($link,$queryU) or die('Errant query:  '.$queryU);

/*

$queryS = "select  distinct status from bookinglog where user ='".$id."' order by status asc"; 
$resultS = mysqli_query($link,$queryS) or die('Errant query:  '.$queryS);
if(mysqli_num_rows($resultS)) 
{
  while($rowS = mysqli_fetch_assoc($resultS)) 
		{
            
    */  
/////////////////////////////resent approval history////////////////////////
$query = "select * ,
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  bookinglog.fleet)MakeModel , 
(select regNo from fleet where fleet.id =  bookinglog.fleet)regNo , 
(select color from fleet where fleet.id =  bookinglog.fleet)color , 
(select year from fleet where fleet.id =  bookinglog.fleet)year , 

(select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = bookinglog.user)  ) userUrl, 
(select url from upload,fleet where uploadtype = 'fleet' and referenceid = fleet.id and fleet.id = bookinglog.fleet limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id =  bookinglog.driver)driverName , 
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.user) userName , 
(select url from upload,driver where uploadtype = 'driver' and referenceid = driver.id and bookinglog.driver = driver.id limit 0,1 )driverUrl , 
(select phoneno from driver  where driver.id =  bookinglog.driver) phone ,
(select PhoneNo2 from driver  where driver.id =  bookinglog.driver) Phone2 ,
(select driversLicenseNo from driver  where driver.id =  bookinglog.driver) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  bookinglog.driver) expiryDate ,
(select location from location  where location.id =  bookinglog.location) location,

(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.approvedby) approverName ,
time_created TimeBooked

from bookinglog where 
(
(select approver1 from user where user.id =  bookinglog.user)  = '".$id."' or 
(select approver2 from user where user.id =  bookinglog.user)  = '".$id."' or 
(select approver3 from user where user.id =  bookinglog.user)  = '".$id."' ) 

and  createdForD  = '$datenow'
 "; 


     if ($opr=="all")
                     {
                         $query = "select * ,
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  bookinglog.fleet)MakeModel , 
(select regNo from fleet where fleet.id =  bookinglog.fleet)regNo , 
(select color from fleet where fleet.id =  bookinglog.fleet)color , 
(select year from fleet where fleet.id =  bookinglog.fleet)year , 

(select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = bookinglog.user)  ) userUrl, 
(select url from upload,fleet where uploadtype = 'fleet' and referenceid = fleet.id and fleet.id = bookinglog.fleet limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id =  bookinglog.driver)driverName , 
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.user) userName , 
(select url from upload,driver where uploadtype = 'driver' and referenceid = driver.id and bookinglog.driver = driver.id limit 0,1 )driverUrl , 
(select phoneno from driver  where driver.id =  bookinglog.driver) phone ,
(select PhoneNo2 from driver  where driver.id =  bookinglog.driver) Phone2 ,
(select driversLicenseNo from driver  where driver.id =  bookinglog.driver) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  bookinglog.driver) expiryDate ,
(select location from location  where location.id =  bookinglog.location) location,
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.approvedby) approverName ,
time_created TimeBooked

from bookinglog where  createdForD  = '$datenow'
   "; }
                         
   if ($opr=="myall")
                     {
                         $query = "select * ,
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  bookinglog.fleet)MakeModel , 
(select regNo from fleet where fleet.id =  bookinglog.fleet)regNo , 
(select color from fleet where fleet.id =  bookinglog.fleet)color , 
(select year from fleet where fleet.id =  bookinglog.fleet)year , 

(select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = bookinglog.user)  ) userUrl, 
(select url from upload,fleet where uploadtype = 'fleet' and referenceid = fleet.id and fleet.id = bookinglog.fleet limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id =  bookinglog.driver)driverName , 
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.user) userName , 
(select url from upload,driver where uploadtype = 'driver' and referenceid = driver.id and bookinglog.driver = driver.id limit 0,1 )driverUrl , 
(select phoneno from driver  where driver.id =  bookinglog.driver) phone ,
(select PhoneNo2 from driver  where driver.id =  bookinglog.driver) Phone2 ,
(select driversLicenseNo from driver  where driver.id =  bookinglog.driver) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  bookinglog.driver) expiryDate ,
(select location from location  where location.id =  bookinglog.location) location,
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.approvedby) approverName,
time_created TimeBooked 

from bookinglog where (
(select approver1 from user where user.id =  bookinglog.user)  = '".$id."' or 
(select approver2 from user where user.id =  bookinglog.user)  = '".$id."' or 
(select approver3 from user where user.id =  bookinglog.user)  = '".$id."' ) 
   "; }
                         
    if ($opr=="allall")
                     {
                         $query = "select * ,
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  bookinglog.fleet)MakeModel , 
(select regNo from fleet where fleet.id =  bookinglog.fleet)regNo , 
(select color from fleet where fleet.id =  bookinglog.fleet)color , 
(select year from fleet where fleet.id =  bookinglog.fleet)year , 

(select google_picture_link from google_users,user where  user.email= google_users.google_email  and google_users.google_email = (select email from user where user.id = bookinglog.user)  ) userUrl, 
(select url from upload,fleet where uploadtype = 'fleet' and referenceid = fleet.id and fleet.id = bookinglog.fleet limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id =  bookinglog.driver)driverName , 
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.user) userName , 
(select url from upload,driver where uploadtype = 'driver' and referenceid = driver.id and bookinglog.driver = driver.id limit 0,1 )driverUrl , 
(select phoneno from driver  where driver.id =  bookinglog.driver) phone ,
(select PhoneNo2 from driver  where driver.id =  bookinglog.driver) Phone2 ,
(select driversLicenseNo from driver  where driver.id =  bookinglog.driver) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  bookinglog.driver) expiryDate ,
(select location from location  where location.id =  bookinglog.location) location,
(select CONCAT_WS(' ',namef,namel) from user where user.id =  bookinglog.approvedby) approverName,
time_created TimeBooked 

from bookinglog  
   "; 
                             
                         
                         
                         
                         
                         //status = 'Pending' and
                     }
            
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
?>	
             <div class="col-lg-12">
    <h3>Trip Request Pending on Me</h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="Pending-Booking">
       <?php
                 if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                 {
                     echo "            <thead>
                                            <tr>

                                                <th></th>
                                                <th></th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <th>End Time</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>";
                 }
                else 
                {
                 echo "<thead>
                                         <tr>
                                                <th></th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>";
                }
	
		while($row = mysqli_fetch_assoc($result)) 
		{
            /// set Variable
            
$MakeModel=$row["MakeModel"];
$regNo=$row["regNo"];
$color=$row["color"];
$year =$row["year"];
$url=$row["url"];
$driverName =$row["driverName"];
$driverUrl =$row["driverUrl"];
$phone =$row["phone"];
$phone2 =$row["Phone2"];
$driversLicenseNo =$row["driversLicenseNo"];
$expiryDate=$row["expiryDate"];
$location=$row["location"];
            
            
            //$counter = $counter + 1;
            $class="";
             $myStatus=$row["status"];
            $btnAcction ="";
            if (($row["status"]=="Pending")&&($row["endTime"]< $now))
            { 
                $class="alert alert-danger";$myStatus="Expired";
                
               //$btnAcction =' <button class="btn btn-success btn-xs " disabled>Cancel Booking</button>' ;
               /* $btnAcction ='
               <button class="btn btn-success btn-xs extendBooking" onclick="extendBookingHrs('.$row["id"].')" disabled>Extend Booking</button><br/><br/>
               <button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')" disabled>Cancel Booking</button><br/><br/>
               <button class="btn btn-success btn-xs disabled" onclick="endTrip('.$row["id"].')" disabled>End Trip</button><br/><br/>
               <button class="btn btn-success btn-xs " onclick="authorizeBooking('.$row["id"].')" disabled>Authorize Request</button><br/><br/>
               ' ;
               */
            }
            
            
            else if (($row["status"]=="Pending")&&(($row["startTime"]> $now)||($row["endTime"]> $now)))
            {
               $btnAcction ='
              <button class="btn btn-success btn-xs " onclick="authorizeBooking('.$row["id"].')">Authorize Request</button><br/><br/>
               <button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')">Reject Request</button><br/>@'.$row["TimeBooked"].'

               
               
              
               
               ' ;
             
            }
            else if (($row["status"]=="Approved")&&($row["startTime"]> $now))
            {
               $btnAcction ='
               
               <button class="btn btn-success btn-xs extendBooking" onclick="extendBookingHrs('.$row["id"].')">Extend Booking</button><br/><br/>
               <button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')">Cancel Booking</button><br/>@'.$row["TimeBooked"].'<br/><br/>
               
               ' ;
             
            }
            else if (($row["status"]=="Approved")&&($row["startTime"]< $now) && ($row["endTime"]> $now))
            {
               $btnAcction ='
                
                <button class="btn btn-success btn-xs extendBooking" onclick="extendBookingHrs('.$row["id"].')">Extend Booking</button><br/><br/>
                <button class="btn btn-success btn-xs " onclick="endTrip('.$row["id"].')">End Trip</button><br/>@'.$row["TimeBooked"].'<br/><br/>
               ' ;
             if ((($_SESSION["role"] == "1")||($_SESSION["role"] == "2")) && $row["status"]="Approved")
            {
                 $btnAcction =$btnAcction.'<button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')">Cancel Booking</button><br/>@'.$row["TimeBooked"].''; 
            }
            
            }
            
            else if (($row["status"]=="Approved")&& ($row["endTime"] < $now))
            {
               $btnAcction ='
                
                <button class="btn btn-success btn-xs" onclick="extendBookingHrs('.$row["id"].') disabled">Extend Booking</button><br/><br/>
                <button class="btn btn-success btn-xs " onclick="endTrip('.$row["id"].')"  disabled>End Trip</button><br/>@'.$row["TimeBooked"].'<br/><br/>
               ' ;
             
            }
            
            
          /*  if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
           {
               $btnAcction ='<a class="btn btn-success btn-xs  " onclick="authorizeBooking('.$row["id"].')"  >Authorize Request</a><br/><br/>
               <button class="btn btn-success btn-xs " onclick="RejectApproval('.$row["id"].')">Reject Request</button>' ;
             
           }//*/
            
            ///Driver and car info
            $dra = '<table><tr><td><img src="'.$row["driverUrl"].'" style=" width:75px;  border-radius:50%"/></td>
                <td>
                <table>
                    <tr><td>'.$row["driverName"].' </td></tr>
                    <tr><td>'.$row["phone"].'</td></tr>
                    <tr><td>'.$row["regNo"].'</td></tr>
                </table>
                
                </td></tr></table>';
			
            if ($row["approverName"] != ""){
               $approverName ="Authorized by ".$row["approverName"]." on ".$row["approved"];
            }else {$approverName ="";}
			
                         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                     {
                         
                         
                         echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td class="'.$class.'">'.$row["status"].'<br/>'.$btnAcction .'@'.$row["TimeBooked"].'</td>'.
                                            '<td class="'.$class.'"><table><tr><td><img src="'.$row["userUrl"].'" style=" width:75px;  border-radius:50%"/></td></tr><tr><td>'.$row["userName"].'</td></tr></table></td>'.
                                                '<td class="'.$class.'">'.$row["Departure"].'</td>'.
                                                '<td class="'.$class.'">'.$row["destination"].'</td>'.
                                                '<td class="'.$class.'">'.$row["start"].'</td>'.
                                                '<td class="'.$class.'">'.$row["end"].'</td>'.
                                                '<td class="'.$class.'">'.$dra.'</td>
                                                <td class="'.$class.'">'.$approverName.'</td>

                               </tr>';
                     } 
                        else 
                    {

                        echo '<tr class="odd gradeX">';
                        //' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           echo
                                               
                                 
                            
                                            ' <td class="'.$class.'">'.$row["status"].'<br/>'.$btnAcction .'@'.$row["TimeBooked"].'</td>'.
                                             '<td class="'.$class.'"><table><tr><td><img src="'.$row["userUrl"].'" style=" width:75px;  border-radius:50%"/></td></tr><tr><td>'.$row["userName"].'</td></tr></table></td>'.
                                                '<td class="'.$class.'">'.$row["Departure"].'</td>'.
                                                '<td class="'.$class.'">'.$row["destination"].'</td>'.
                                                '<td class="'.$class.'">'.$row["start"].'</td>'.
                                                '<td class="'.$class.'">'.$row["end"].'</td>'.
                                                '<td class="'.$class.'">'.$dra.'</td>
                                                 <td class="'.$class.'">'.$approverName.'</td>
                               </tr>';
                        }
            }
		
		
        
            

            echo "</tbody>	</table></div>";

             
	 
       }
    






/////////////////////////////////// Exprire Pending//////////////////////////////////////






?>

         
         
         
         
         
         
         
         
         
         
         
         
  <script>
            
  function authorizeBooking (id)
      
      {
          swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=approve&id="+id ,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
      
    function  RejectApproval(id) 
       {
        swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=cancel&id="+id ,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
      
       function  Cancel(id) 
       {
          swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=cancel&id="+id ,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
      
       function  cancelNudge(id) 
       {
          swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=cancelNudge&id="+id ,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
 
      function  cancelBooking(id) 
       {
        swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})  
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=cancel&id="+id,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
      
      
    
      function   endTrip(id) 
       {
                    swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=endTrip&id="+id,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
      }
      
      
     


function extendBookingHrs (id)
      {
       swal({
  title: 'Enter extention time in hour(s)',
  input: 'number',
  showCancelButton: true,
  confirmButtonText: 'Submit',
  showLoaderOnConfirm: true,
  preConfirm: function (number) {
    
    return new Promise(function (resolve, reject) {
      setTimeout(function() {
        if ($.isNumeric(number) === false) {
          reject('This email is already taken.'+$.isNumeric(number))
        } else {
          resolve()
        }
      })
    })
  },
  allowOutsideClick: false
}).then(function (number) {
  
                        swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
   $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=ext&exthrs="+number+"&id="+id,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
  
  
  /*swal({
    type: 'success',
    title: 'Ajax request finished!',
    html: 'Submitted email: ' + email + id
  })*/
})
      }
  
  function rateComment(id)
{
      swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
     $.ajax({
            type:"GET",
            url:"../resource/bookingcomment.php?id="+id,
          
            success:function(data)
			{
               $("#listDiv").html(data)
               swal({
				 title: 'Success!',
				text: '',
				 timer: 100
				})
			}
        });
    
} 
      
      
      
      
      $( "#allall" ).click(function() {

swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})


          $.ajax({
            type:"POST",
            url:"../resource/authorized.php",
        data:"opr=allall",
            success:function(data)
			{
                $("#listDiv").html(data)
                swal({
				 title: 'Success!',
				text: '',
				 timer: 100
				})
                if ( $.fn.dataTable.isDataTable( '#Pending-Booking' ) ) 
                            {
                                    table = $('#Pending-Booking').DataTable( );
                                     table.destroy();
                            }
                    $('#Pending-Booking').DataTable({responsive: true });
            }
        });
});
      
      
        
$( "#myall" ).click(function() {
 
 swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
 
          $.ajax({
            type:"POST",
            url:"../resource/authorized.php",
        data:"opr=myall",
            success:function(data)
			{
                $("#listDiv").html(data)
                swal({
				 title: 'Success!',
				text: '',
				 timer: 100
				})
                
                {
                      if ( $.fn.dataTable.isDataTable( '#Pending-Booking' ) ) 
                            {
                                    table = $('#Pending-Booking').DataTable( );
                                     table.destroy();
                            }
                    $('#Pending-Booking').DataTable({responsive: true });
                            /*table = $('#Pending-Booking').DataTable( {
                                         "ajax": "../resource/historySessionAjax.php",
                                         "columns":[
                                                                        { data: 'referenceid' },
                                                                        { data: 'order' },
                                                                        { data: 'payment' },
                                                                        { data: 'balance' }
                                                    ],
                                                     responsive: true

                              } );*/

	  }
            }
        });
});
      
              
$( "#all" ).click(function() {

swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})


          $.ajax({
            type:"POST",
            url:"../resource/authorized.php",
        data:"opr=all",
            success:function(data)
			{
                $("#listDiv").html(data)
                swal({
				 title: 'Success!',
				text: '',
				 timer: 100
				})
                if ( $.fn.dataTable.isDataTable( '#Pending-Booking' ) ) 
                            {
                                    table = $('#Pending-Booking').DataTable( );
                                     table.destroy();
                            }
                    $('#Pending-Booking').DataTable({responsive: true });
            }
        });
});
    /*  $(document).ready(function() {
    $("a.elementid").click(function(event) {
        alert(event.target.id);
		
		var bbb = event.target.id;
		 //productGetForUpdate(bbb);
        $.ajax({
            type:"GET",
            url:"../resource/fleetBook.php?opr=approve&id="+id ,
          
            success:function(data)
			{
              swal('info',data,'info')
			}
        });
    });
});*/
     //alert ("vkv") 


</script>



<?php
      exit();
?>
