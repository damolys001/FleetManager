<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= ""; ?>
<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= ""; 

$datenow = date("Y/m/d");

include_once "../reuseable/connect_db_link.php"; ?>
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ensure Fleet Manager</title>

    <!-- Bootstrap Core CSS --
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS --
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS --
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts --
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
 <!-- jQuery --
    <script src="../vendor/jquery/jquery.min.js"></script>
    
     <script src="../vendor/jquery/ajaxSubmitMini.js"></script>
    
    <!-- Bootstrap Core JavaScript --
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript --
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <!-------------------------------->
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
     <script src="../vendor/jquery/ajaxSubmitMini.js"></script>
    

    
    
     <!-- date Time Picker JavaScript --

    <link href="../vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="../vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
     <script src="../vendor/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.ua.js"></script>
    
    <!-- Custom Theme JavaScript --
    <script src="../dist/js/sb-admin-2.js"></script>
<!-- This is what you need integration --
  <script src="../sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css">
  <!--.......................--
  
  <!-- jquery UI-->
 <!-- <script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui-1.9.2.custom.js"></script>-->
   <script src="../vendor/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
   <link href="../vendor/jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
   <!-- .............--
  
   -->
    
    
    
    
    
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

 <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    
     <script src="../vendor/jquery/ajaxSubmitMini.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 

     <!-- date Time Picker JavaScript -->

    <link href="../vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="../vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script> 
     <script src="../vendor/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.ua.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
<!-- This is what you need integration -->
  <script src="../sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css"/>
  <script src="../sweetalert-master/dist/swal-forms.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/swal-forms.css"/>
  <!--.......................-->
  
  <!-- jquery UI-->
 <!-- <script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui-1.9.2.custom.js"></script>-->
   <script src="../vendor/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
   <link href="../vendor/jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet"/>
   <!-- .............-->
  
  
     
 <link href="styleCustom.css" rel="stylesheet">
 
 
   
 <script src="../vendor/star-rating/js/star-rating.min.js"></script>
   <link href="../vendor/star-rating/css/star-rating.min.css" rel="stylesheet" media="all" rel="stylesheet" type="text/css"/>
   <!-- .............-->
 

<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../vendor/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../vendor/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../vendor/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
      
  
</head>

<body>

<div class="modal fade  " id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="false"  >
            <div class="modal-dialog modal-lg " >

                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align:center" id="Login">Book for a Fleet</h4>
                    </div>
                    <div class="modal-body" >
                       <div class="row">
                        <div class="col-lg-8">
                            <div class="col-md-6 col-md-offset-3">
                                 
                                  <label class="control-label" for="fleetid-modal"> Car List</label>
                                
                                  
                                <select id='fleetid-modal' class="form-control input-group form-group">
                                <option></option>
                                    
                                    <?php
                                    $queryOpt = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select CONCAT_WS(' ',fName,lName) from driver where driver.id = fleet.driverid limit 0,1)driverName , 
(select url from driver,upload where driver.id = fleet.driverid and referenceid = driver.id and  uploadtype = 'driver'  limit 0,1)driverUrl , 
(select phoneno from driver  where driver.id = fleet.driverid limit 0,1) phone ,
(select location from location  where location.id = fleet.location limit 0,1) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id and ( status ='Approved' or status ='Completed')) bookingToday,
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' limit 0,1) InterStateD,
(select count(fleetId) from myRating where fleetId = fleet.id) ratingCount,
(select sum(fleet) from myRating where fleetId = fleet.id) ratingSum,

(select count(driverId) from myRating where driverId = fleet.driverid) ratingCountDrv,
(select sum(driver) from myRating where driverId = fleet.driverid) ratingSumDrv
from fleet 
where status ='1' and 
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id and ( status ='Approved' or status ='Completed') ) < 4";
                                    /*"
                                    select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select fname||' '||lname from driver where driver.id = fleet.driverid)driverName , 
(select phoneno from driver  where driver.id = fleet.driverid) phone ,
(select location from location  where location.id = fleet.location) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) bookingToday
from  fleet where status ='1' and 
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id  and ( status ='Approved' or status ='Completed')) < 4
and(
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) <  '".$datenow."' OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) IS NULL OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) = '')

";*/
   $resultOpt = mysqli_query($link,$queryOpt) or die('Errant query:  '.$queryOpt);     
if(mysqli_num_rows($resultOpt)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultOpt)) 
		{
            echo "<option value='".$rowOpt['id']."'>".$rowOpt['maker']." ".$rowOpt['model']." - ".$rowOpt['regno']." - ".$rowOpt['location']."</option>";
        }}
    ?>
                                    
                                    
                                    
                                </select>
                                    
                                
                            </div>
                            
                             <div class="col-md-6 col-md-offset-3">
                           
                        <label class="control-label" for="tripType-modal"> Trip Type</label>
                       
                            <select id='tripType-modal'  class="form-control  input-group form-group ">
                                <option value="Intra State">Intra State</option>
                                 <option value="Inter State">Inter State</option>   
                                     
                                </select>
                           </div>
                                 
                             
                            
                            
                            <div class="col-lg-6 ">
                               <label class="control-label" for="fromDS-modal">  Start Date / Start Time</label>    
                           <input type="text" class="form-control  " value="" id="fromDS-modal"  placeholder="Start Date">
                         
                           </div>
                        
                                                        
                            <div class="col-lg-6 ">
                            <label class="control-label" for="fromDE-modal"> End Date / End Time</label>  
                                <input type="text" class="form-control " id="fromDE-modal"   placeholder="End Date">
                               <!-- <span class="add-on"><i class="icon-remove"></i></span>
                                 <span class="add-on"><i class="icon-calendar"></i></span>-->
                           
                              
                            </div>
                            
                            
                            
                            <div class="col-lg-6 ">
                            <label class="control-label" for="depature-modal"> Depature Location</label>
                                <input type="text" class="form-control  " value="" id="depature-modal"  placeholder="Depature Location">
                          </div>
                            
                        <div class="col-lg-6 DivState col-sm-6">
                            <label class="control-label" for="Satedepature-modal"> Depature State</label>
                                  <select id='Satedepature-modal' class=" form-control  ">
                               </select>
                         
                           </div>
                            
                            <div class="col-lg-6 ">
                            <label class="control-label" for="destination-modal"> Destination</label>
                                <input type="text" class="form-control  " value="" id="destination-modal"  placeholder="Destination">
                        
                           </div>
                            
                             <div class="col-lg-6 DivState ">
                           <label class="control-label" for="Satedestination-modal"> Destination State</label>
                                <select id='Satedestination-modal' class="form-control "></select>
                        
                           </div>
                         
                          
                        </div>
                        <div class="col-lg-4">
                             <!--   <img id="my_driver_img" src="" style=" width:100%; max-height:200px; max-width:200px;  border-radius:5px"/>
                        <img id="my_fleet_img" src="" style=" width:100%; max-height:200px; max-width:200px;  border-radius:5px"/>
                        -->
                            <img id="my_driver_img" src="" style=" width:150px;  height:225px;   border-radius:5%; border-width:0px "/>
                                <img id="my_fleet_img" src="" style=" height:150px;  width:225px; border-radius:5px;border-width:0px"/>
                        
                        </div>
                       
                          <div class=" col-lg-12" style="clear:both" >
                         <p class="text-center text-muted">
                                <button class="btn btn-primary" onClick="justBook()"><i class="fa fa-save"></i> Book</button>
                            </p>
                        </div>

                           

                       <style>
                           .form-control { margin-bottom:15px; }
                        </style>

                       </div> 
                    </div>
                </div>
            </div>
        </div>



        
       <script>
   
   $(document).ready(function(){
       
       //don't display state
       $(".DivState").css("display","none");
       //pre-load state
       $.ajax({
            type:"POST",
            url:"../resource/stateGetAll.php" ,
            data:"f=j",
            success:function(df)
			{
                var options = '<option value=""></option>';
                                for (var i = 0; i < df.length; i++) 
                                {
                                    options += '<option value="' + df[i].state + '">' + df[i].state+ '</option>';
                                }
                                  $("select#Satedepature-modal").html(options);
                                  $("select#Satedestination-modal").html(options);
			}
			
         });
       
       //handle what to display when trip type change
        $('#tripType-modal').change(function() {
           var tripType = $("#tripType-modal option:selected").val()
     if (tripType == "Intra State")
     {
          $(".DivState").css("display","none");
     }
           else
    {
          $(".DivState").css("display","block");
     }     

    
    
});
       
       
       
       
       
       
       
//pre-load fleet
$('#fleetid-modal').change(function() {
     var fleetid = $("#fleetid-modal option:selected").val()
 $.ajax({
            type:"POST",
            url:"../resource/fleetGetAll.php" ,
            data:"&id="+fleetid+"&f=j",
            success:function(data)
			{ var d = data[0];
             $('#my_fleet_img').attr('src',d.url);
             $('#my_driver_img').attr('src',d.driverUrl);
			}
			
         });
    
    
});


       
      

   
       
          //make datefield date selectable  
       
        
    
           
           
           //Handles Available now 
       $('#nowDate').change(function() {
  
     var dateNow = $("#nowDate").val()
 $.ajax({
            type:"POST",
            url:"../resource/fleetGetAllNow.php" ,
            data:"&timeNow="+dateNow,
            success:function(data)
			{ //var d = data[0];
             $('#nowPane').html(data);
             //$('#my_driver_img').attr('src',d.driverUrl);
			}
			
         });
  
});
     
       
       
  
       
    });
   

     
           
           
           
           
           
             function justBook() 
    {
      swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'images/loading.gif',
							  animation: true
							})
var fleetid  = "";
var sDate   = "";
var eDate   = "";
var depature  = "";
var destination    = "";  
 var error    = ""; 
      tripType = $("#tripType-modal option:selected").val() 
	 fleetid  = $("#fleetid-modal option:selected").val()
	 sDate  = document.getElementById("fromDS-modal").value
	 eDate  = document.getElementById("fromDE-modal").value
     depature = $("#depature-modal").val()
     destination = $("#destination-modal").val()
     
     sState = $("select#Satedepature-modal").val();
     eState = $("select#Satedestination-modal").val();
                                  
     
     
      //now client side validation
     
    if (fleetid == ""){ error +="Please select from fleet dropdown.<br/>";}
        if (sDate == ""){ error +="Please select start date and time.<br/>";}
        if (eDate == ""){ error +="Please select end date and time.<br/>";}
        if (depature  == ""){ error +="Please type in depature location.<br/>";}
        if (destination   == ""){ error +="Please type in destination.<br/>";}
        if (tripType == "Inter State" &&   sState == ""){ error +="Please select depature state.<br/>";}
        if (tripType == "Inter State" &&   eState == ""){ error +="Please select destination state.<br/>";}
        if (sState == eState &&   eState != ""){ error +="Your Depature State and Destination State can't be the same for inter state booking.<br/>";}
        
        if (error =="")
        {
            var myUrlQery = "&id="+fleetid+"&sDate="+sDate+"&eDate="+eDate+"&depature="+depature+"&destination="+destination+"&tripType="+tripType;
            if (tripType == "Inter State")
                {
                    myUrlQery = "&id="+fleetid+"&sDate="+sDate+"&eDate="+eDate+"&depature="+depature+", "+sState+"&destination="+destination+", "+eState+"&tripType="+tripType;
                }
            
            $.ajax({
            type:"POST",
            url:"../resource/fleetBook.php" ,
            data:myUrlQery,
            success:function(data)
			{
              //$("#namef").val(data);
			 //$('#my_fleet_img').attr('src',data);
             // swal ('Info',data)
              if (data =="Car was booked successfully")
                {

                        swal({ 
					   title: "Info",
					   text: data,
						type: "info" 
					  },
					  function(){
						window.location.reload() ;
					});
                    
                }
                else    
                    {
                         swal({ 
					  title: "Error",
					   text: data,
						type: "error", 
                        html:data
					  })
                    }
            }
		 });
        } else 
        {
            swal({title: 'Error!',   type: 'error',   html: error  })
            
        }
        
        //var startDate = new Date("1/1/1900" + sDate);
        //alert(startDate )
       /*  var endDate = new Date("1/1/1900 " + eDate);

        if (startDate > endDate)
            {
        alert("invalid time range");
        else
        alert("valid time range");
        }
  */
    }
		

 function delFleet(id)
           {
               console.log("../resource/fleetsave.php?id="+id+"&fleetid="+id+"&status=del&chasisNo=001&regNo=001")
              swal({ 
					   title: "Info",
					   text: 'Are you sure, you want to delete',
						type: "info",
                        showCancelButton: true,
                        confirmButtonText: 'Submit',
                        showLoaderOnConfirm: true
					  },
					  function(){
                  $.ajax({
            type:"GET",
            url:"../resource/fleetsave.php" ,
            data:"&id="+id+"&fleetid="+id+"&status=del&chasisNo=001&regNo=001",
            success:function(data)
			{
						window.location.reload() ;
                     //alert (data)
                  
                  
					}
                  })
                  }
                  )
           }
          
             
</script> 


    <div id="wrapper">

        <!-- Navigation -->
           <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index-01.html">Ensure Fleet Manager</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              <!--  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages --
                </li>
                <!-- /.dropdown 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks --
                </li>
                <!-- /.dropdown --
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts --
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"> <?php include_once("../resource/getUserName.php")?>  </i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li id="btnSettings"><a href="mydetails.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
              <?php include_once "../resource/menu.php" ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Fleet</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="col-lg-12">
               
                <a href="#"  class="btn btn-success" data-toggle="modal" data-target="#login-modal1">Book a Car</a>
                <?php if (($_SESSION["role"]== "1")|| ($_SESSION["role"]== "2")){ ?>
                <a href="fleetNew.php"  class="btn btn-success" style=" "  > New</a>
                <?php }?>
                </div>
                
                  <br/><br/>
                
                
                
                 <div>
                    
                         <div class="col-lg-4 col-sm-4">
                           
                            <label class="control-label" for="nowDate">  <h2>Available as at </h2> </label>
                                <input type="text" class="form-control  " value="" id="nowDate" placeholder="Select date & time">
                        
                           </div>
                      
                <div id="nowPane">
                
                </div>
                </div>
                
                <br/><br/>
                
                <div id="listDiv">
                
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery --
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript --
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript --
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript --
    <script src="../dist/js/sb-admin-2.js"></script>
    
    
    
    <!-- DataTables JavaScript --
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> 
-->
<script>
    loadFleetTable() 
 function loadFleetTable() 
{
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/fleetGetAll.php",
        data:"opr=table",
            success:function(data)
			{
                $("#listDiv").html(data)
                
                
                
                
                 $(document).ready(function(){
 ///////////HANDEL DATA TABLE////////////////
        
		<?php $queryS2 = "select distinct fleetstatus from fleet, fleetstatus where fleet.status = fleetstatus.id;"; //where `page_name` = '$pagename'
	$resultS2 = mysqli_query($link,$queryS2) or die('Errant query:  '.$queryS2);
	
	
	if(mysqli_num_rows($resultS2)) 
	{
        while($rowS2 = mysqli_fetch_assoc($resultS2)) 
		{
            ?>$("#<?php echo $rowS2["fleetstatus"]; ?>-table").DataTable({responsive: true });<?php 
        } 
    }      
        ?>
        $('#dataTables-example').DataTable({
            responsive: true
        }); 
    }); 
                
                
                
                
                
			}
        });
 }
  
      //alert ("kdjfkdks")
        /*$("#nowDate").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
    */    
    
    $("#fromDS-modal, #fromDE-modal, #nowDate").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    }); 
</script>
</body>

</html>
