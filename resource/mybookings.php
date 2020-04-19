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

////Update Completed Trip
$queryU = "update bookinglog set status = 'Completed' where  status = 'Approved' and endTime < $now  "; //and createdForD = '$datenow'
$resultS = mysqli_query($link,$queryU) or die('Errant query:  '.$queryU);



$queryS = "select  distinct status from bookinglog where user ='".$id."' order by status asc"; 
$resultS = mysqli_query($link,$queryS) or die('Errant query:  '.$queryS);
if(mysqli_num_rows($resultS)) 
{
  while($rowS = mysqli_fetch_assoc($resultS)) 
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
(select driver from myRating where referenceid = bookingLog.id) driverRating,
(select fleet from myRating where referenceid = bookingLog.id) fleetRating

from bookinglog where user ='".$id."' and status = '".$rowS["status"]."' "; 

            
	$result = mysqli_query($link,$query) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
?>	
             <div class="col-lg-12">
    <?php if ($rowS["status"] =="Completed"){echo '<h3>'.$rowS["status"]."-Trip(s)</h3>";} else if($rowS["status"]=="Approved"){ echo '<h3>'.$rowS["status"]."/Active-Booking(s)</h3>";} else echo '<h3>'.$rowS["status"]."-Booking(s)</h3>"; ?>
     <table width="100%" class="table table-striped table-bordered table-hover" id="<?php echo $rowS["status"]."-Booking"; ?>">
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
                                                <th>End Time</th>
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
            if (($row["status"]=="Pending")&&($row["startTime"]< $now))
            { 
                $class="alert alert-danger";$myStatus="Expired";
                
               //$btnAcction =' <button class="btn btn-success btn-xs " disabled>Cancel Booking</button>' ;
            }
            else if (($row["status"]=="Pending")&&($row["startTime"]> $now))
            {
               $btnAcction ='<button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')">Cancel Request</button><br/><br/>
               <button class="btn btn-success btn-xs " onclick="resendApproval('.$row["id"].')">Re-send Approval Request</button>' ;
             
            }
            else if (($row["status"]=="Approved")&&($row["startTime"]> $now))
            {
               $btnAcction ='
            
               <button class="btn btn-success btn-xs " onclick="cancelBooking('.$row["id"].')">Cancel Booking</button><br/><br/>
              <button class="btn btn-success btn-xs extendBooking()" onclick="extendBookingHrs('.$row["id"].')">Extend Booking</button><br/><br/>
               <button class="btn btn-success btn-xs disabled" >End Trip</button><br/><br/>
               ' ;
             
            }
            else if (($row["status"]=="Approved")&&($row["startTime"]< $now) && ($row["endTime"]> $now))
            {
               $btnAcction ='
                <button class="btn btn-success btn-xs disabled" >Cancel Booking</button><br/><br/>
                <button class="btn btn-success btn-xs " onclick="extendBookingHrs('.$row["id"].')">Extend Booking</button><br/><br/>
                <button class="btn btn-success btn-xs " onclick="endTrip('.$row["id"].')">End Trip</button><br/><br/>
               ' ;
             
            }
            if ($row["status"]=="Completed"){
                 $rateCommentBtn='<button class="btn btn-success btn-xs " onclick="rateComment('.$row["id"].')"  >Rate / Comment</button>
                 <br/>
                 My Rating<br/>
                 Driver:'.round($row["driverRating"],2).'<br/>
                 Car:'.round ($row["fleetRating"],2).'
                 ';
                 }
                 else
                 {$rateCommentBtn='';}       
            ///Driver and car info
            $dra = '<table><tr><td><img src="'.$row["driverUrl"].'" style=" width:75px;  border-radius:50%"/></td>
                <td>
                <table>
                    <tr><td>'.$row["driverName"].' </td></tr>
                    <tr><td>'.$row["phone"].'</td></tr>
                    <tr><td>'.$row["regNo"].'</td></tr>
                </table>
                
                </td></tr></table>';
			
			
                         if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2"))
                     {
                         
                         
                         echo '<tr class="odd gradeX">';
                                           echo//' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           ' <td class="'.$class.'">'.$btnAcction .$rateCommentBtn.'</td>'.
                                    
                                         '<td class="'.$class.'"><table><tr><td><img src="'.$row["userUrl"].'" style=" width:75px;  border-radius:50%"/></td></tr><tr><td>'.$row["userName"].'</td></tr></table></td>'.
                                                '<td class="'.$class.'">'.$row["Departure"].'</td>'.
                                                '<td class="'.$class.'">'.$row["destination"].'</td>'.
                                                '<td class="'.$class.'">'.$row["start"].'</td>'.
                                                '<td class="'.$class.'">'.$row["end"].'</td>'.
                                                '<td class="'.$class.'">'.$dra.'</td>

                               </tr>';
                     } 
                        else 
                    {

                        echo '<tr class="odd gradeX">';
                        //' <td> <a class="btn btn-success btn-primary btn-xs productid" href= "productEdit.php?prodid='.$row["id"].'">Edit</a></td>'.
                                           echo
                                               
                                 
                            
                                            ' <td class="'.$class.'">'.$btnAcction .$rateCommentBtn.'</td>'.
                                    
                                         
                                                '<td class="'.$class.'">'.$row["Departure"].'</td>'.
                                                '<td class="'.$class.'">'.$row["destination"].'</td>'.
                                                '<td class="'.$class.'">'.$row["start"].'</td>'.
                                                '<td class="'.$class.'">'.$row["end"].'</td>'.
                                                '<td class="'.$class.'">'.$dra.'</td>
                               </tr>';
                               //'<td class="'.$class.'"><table><tr><td><img src="'.$row["userUrl"].'" style=" width:75px;  border-radius:50%"/></td></tr><tr><td>'.$row["userName"].'</td></tr></table></td>'.
                        }
            }
		
		
        
            

            echo "</tbody>	</table></div>";

             
	 
       }
            
          
   
  /////Status bracket          
  }
    
}

?>

  <script>
     //alert ("vkv") 
$(document).ready(function(){
        //alert ("vkv")
 ///////////HANDEL DATA TABLE////////////////

                <?php $queryS2 = "select  distinct status from bookinglog where user ='".$userid."';"; //where `page_name` = '$pagename'
                $resultS2 = mysqli_query($link,$queryS2) or die('Errant query:  '.$queryS2);


                if(mysqli_num_rows($resultS2)) 
                {
                    while($rowS2 = mysqli_fetch_assoc($resultS2)) 
                    {
                        ?>
    $("#<?php echo $rowS2["status"]; ?>-Booking").DataTable({responsive: true });
                        <?php 
                    } 
                }      
                ?>
            
               }); 


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
      
    
      function   resendApproval(id) 
       {
                    swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
          
           $.ajax({
            type:"GET",
            url:"../resource/fleetBookApproved.php?opr=resendApproval&id="+id,
          
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
</script>



<?php
      exit();
?>
