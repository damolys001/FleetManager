<?php 
include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
$id = "";
$f = "";
$opr = "";
$selectfleetmodel="";
$userId ="";
$datenow = date("Y/m/d");
$dashboard = array(); 


//get now time & date
$userTimeZone ="GMT+1";
$timezone = new \DateTimeZone($userTimeZone);
$date = new \DateTime('@' . time(), $timezone);
$date->setTimezone($timezone);
$now = $date->getTimestamp() + $date->getOffset();
$nowST = new DateTime();
$nowST->setTimestamp($now);




if(isset ($_REQUEST["id"]) ){ $id = $_REQUEST["id"]; }
if(isset ($_REQUEST["f"]) ){ $f = $_REQUEST["f"]; }
if(isset ($_REQUEST["opr"]) ){ $opr = $_REQUEST["opr"]; }
if(isset ($_SESSION["userid"]) ){ $userId= $_SESSION["userid"]; }
//if(isset ($_SESSION["productfleetmodel"]) ){$selectfleetmodel = $_SESSION["productfleetmodel"];  }



///Update Completed Trip
$queryU = "update bookinglog set status = 'Completed' where  status = 'Approved' and endTime < $now and createdForD = '$datenow' "; 
$resultS = mysqli_query($link,$queryU) or die('Errant query:  '.$queryU);


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
(select location from location  where location.id =  bookinglog.location) location

from bookinglog where fleet ='".$id."' and  createdForD ='".$datenow."' and( status ='Approved' or status ='Completed') "; 


//echo $query;
//where `page_name` = '$pagename'
   
            
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{?>	
             <div class="col-lg-12">
    <h3>Booking Details</h3>
     <table width="100%" class="table table-striped table-bordered table-hover" id="bookingD-table">
       <?php
                 if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                 {
                     echo "<thead>
                                            <tr>

                                                <th></th>
                                                <th></th>
                                                <th>Depature</th>
                                                <th>Destination</th>
                                                 <th>Start Time</th>
                                                <td>End Time</th>
                                                <td></th>
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
                                                <td>End Time</th>
                                                <td></th>
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
             $adminBtn = "";
             $nudgeBtn ="";
             $extendBtn ="";
             $rateCommentBtn="";
                        if ($row["status"]=="Completed")
                         {
                            $adminBtn = ' <a class="btn btn-success  btn-xs   " style="float:right" href="fleetEdit?id='.$row["fleet"].'">Edit Fleet</a>
                                           <br/><br/><button class="btn btn-success btn-xs " style="float:right" onclick="cancelBooking('.$row["id"].')" disabled >Cancel Booking</button>
                                           ';
                            $nudgeBtn ='<button class="btn btn-success btn-xs " onclick="cancelNudge('.$row["id"].')" disabled >Nudge to cancel</button>';
                             
                             //set extend btn
                             if ($userId == $row["user"])
                             {
                                $extendBtn ='<br/><br/><button class="btn btn-success btn-xs " onclick="extendBookingHrs('.$row["id"].')" disabled >Extend Booking</button>';
                              $rateCommentBtn='<br/><br/><button class="btn btn-success btn-xs " onclick="rateComment('.$row["id"].')"  >Rate / Comment</button>';
                             }
                             
                         }else if ($row["status"]=="Approved")
                         {
                            $adminBtn=' <a class="btn btn-success  btn-xs   " style="float:right" href="fleetEdit?id='.$row["fleet"].'">Edit Fleet</a>
                                           <br/><br/><button class="btn btn-success btn-xs " style="float:right" onclick="cancelBooking('.$row["id"].')">Cancel Booking</button>
                                           ';
                         $nudgeBtn ='<button class="btn btn-success btn-xs " onclick="cancelNudge('.$row["id"].')">Nudge to cancel</button>';
                                //set extend btn
                                if ($userId == $row["user"])
                                 {
                                     $nudgeBtn ='<button class="btn btn-success btn-xs " onclick="cancelNudge('.$row["id"].')"  disabled >Nudge to cancel</button>';
                        
                                    $extendBtn ='<br/><br/><button class="btn btn-success btn-xs " onclick="extendBookingHrs('.$row["id"].')">Extend Booking</button>';
                                  $rateCommentBtn='<br/><br/><button class="btn btn-success btn-xs " onclick="rateComment('.$row["id"].')"  >Rate / Comment</button>';
                            
                                 }
                         } 
                         
                         
			
                         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                     {
                         echo '<tr class="odd gradeX">';
                         
                          
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td>'.$adminBtn.'</td>'.                                    
                                         '<td><table><tr><td><img src="'.$row["userUrl"].'" style=" width:75px;  border-radius:50%"/></td></tr><tr><td>'.$row["userName"].'</td></tr></table></td>'.
                                           
                                              '<td>'.$row["Departure"].'</td>'.
                                                '<td>'.$row["destination"].'</td>'.
                                                '<td>'.$row["start"].'</td>'.
                                                '<td>'.$row["end"].'</td>'.
                                           
                                               
                                               
                                            '<td>'.$nudgeBtn.$extendBtn.$rateCommentBtn.'</td>

                               </tr>';
                     } 
                        else 
                    {

                        echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                 
                            
                                           '<td><img src="'.$row["userUrl"].'" style=" width:50px;  border-radius:50%"/>'.$row["userName"].'</td>'.
                                       
                                              '<td>'.$row["Departure"].'</td>'.
                                                '<td>'.$row["destination"].'</td>'.
                                                '<td>'.$row["start"].'</td>'.
                                                '<td>'.$row["end"].'</td>'.
                                            '<td>'.$nudgeBtn.$extendBtn.$rateCommentBtn.'</td>

                               </tr>';
                        }
            }
		
		
        
            

            echo "</tbody>	</table></div>";

             
	 
       }
            
          
      
if ($regNo=="" ){

$query = "select *,fleet.regno regno,  
(select CONCAT_WS(' ',maker,model) from fleet where fleet.id =  '$id')MakeModel , 
(select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid) phone ,
(select PhoneNo2 from driver  where driver.id = fleet.driverid) Phone2 ,
(select location from location  where location.id = fleet.location) location,

(select driversLicenseNo from driver  where driver.id =  fleet.driverid) driversLicenseNo ,
(select expiryDate from driver  where driver.id =  fleet.driverid) expiryDate 

from fleet where id ='".$id."' ";
    

    
    $result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
    {
        
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
            
        
        
    }
    
    
  }      
        /////////////////////////////////// fleet table generation Ends///////////////////////////
   
}
    
?>


  <div class="row">
      <br/>   <br/>
      
      <div class="col-lg-4">
      <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Comment(s)
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                               
                                <textarea id="cmtDetail" class="form-control input-sm" placeholder="Type your message here..."></textarea>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Comment
                                    </button>
                                </span>
                            </div>
                        </div>
      <div class="panel-body">
                            <ul class="chat" id="myBookingLogComment">
     
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        
                        <br /> <br /> <br />
                        <!-- /.panel-footer -->
                        
                        
      </div>
      </div>
      
      
      
      
                <div class="col-lg-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Driver Infomation
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-4">
                            <img width="100%" src="<?php echo $driverUrl ?>"/>
                            </div>
                            <div  class="col-lg-8">
                            <b>Name:</b><?php echo $driverName ?> <br/>
                                 <b>Phone:</b><?php echo $phone ?> <br/>
                                <b>Phone2:</b><?php echo $phone ?> <br/>
                                 <b>License Expiry Date:</b><?php echo $expiryDate ?> <br/>
                                 
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
      
      
      
       <div class="col-lg-4">
       <input type="hidden" id="fleetid" value="<?php echo $id;?>" />
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Car Infomation
                        </div>
                        <div class="panel-body">
                            <div  class="col-lg-4">
                            <img width="100%" src="<?php echo $url ?>"/>
                            </div>
                            <div  class="col-lg-8">
                            <b>Make & Model:</b><?php echo $MakeModel ?> <br/>
                                 <b>Year:</b><?php echo $year ?> <br/>
                                 <b>Colour:</b><?php echo $color ?> <br/>
                                        <b>Reg No:</b><?php echo $regNo ?> <br/>
                            </div>
                        
                        </div>
                        
                    </div>
                </div>
      
      
      
      
</div>
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
          reject(''+$.isNumeric(number))
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
  
})
      }






$('#btn-chat').click(function () {
   var detail = $("#cmtDetail").val()
      var id = $("#fleetid").val()
     
 $.ajax({
            type:"POST",
            url:"../resource/commentSave.php" ,
            data:"&opr=fleetComment&detail="+detail+"&id="+id,
            success:function(data)
			{ 
			 //swal('',data)
			 $("#myBookingLogComment").html(data)
             //swal('Info',data, 'info')
             $("#cmtDetail").val("")
			}
			
         }); 
    
})

refreshMessages()
setInterval(refreshMessages, 10000);
function refreshMessages() {
         var id = $("#fleetid").val()
  $.ajax({
            type:"POST",
            url:"../resource/commentSave.php" ,
            data:"&opr=fleetComRefresh"+"&id="+id,
            success:function(data)
			{ 
			 //swal('',data)
			 $("#myBookingLogComment").html(data)
             //swal('Info',data, 'info')
             //$("#cmtDetail").val("")
			},
    error: function() {
      $('#myBookingLogComment').prepend('Error retrieving new messages..');
    }
			
         });
}

$('#cmtDetail').keypress(function(e){
      if(e.keyCode==13)
      $('#btn-chat').click();
    });
              
</script>
<?php
      exit();
?>
