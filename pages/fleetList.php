<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= ""; ?>
<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= ""; 	
$datenow = date("Y/m/d");
include_once "../resource/menu.php"; ?>
<!DOCTYPE html>
<html lang="en" ><!-- InstanceBegin template="/Templates/templateMain.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Ensure Fleet Manager</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
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
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css">
  <!--.......................-->
  
  <!-- jquery UI-->
 <!-- <script src="js/jquery-1.8.3.js"></script>
	<script src="js/jquery-ui-1.9.2.custom.js"></script>-->
   <script src="../vendor/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
   <link href="../vendor/jquery-ui/css/ui-lightness/jquery-ui-1.9.2.custom.css" rel="stylesheet">
   <!-- .............-->
  
  
     
 <link href="styleCustom.css" rel="stylesheet">
 
 
   
 
 <!--Copy pirobox image popup and paste the code below, into your <head> section </head>-->
 
<!--<link rel="stylesheet" type="text/css" href="../vendor/pirobox_extended/css_pirobox/style_1/style.css"/>-->
<!--::: OR :::-->
<!--<link rel="stylesheet" type="text/css" href="../vendor/pirobox_extended/css_pirobox/style_2/style.css"/>-->
<!--::: it depends on which style you choose :::-->
 
<!--
<script type="text/javascript" src="../vendor/pirobox_extended/js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="../vendor/pirobox_extended/js/jquery.min.js"></script>
-->

<!--<script type="text/javascript" src="../vendor/pirobox_extended/js/pirobox_extended.js"></script>-->
 
<!-- or use minified version  "pirobox_extended_min.js"  -->
<!--<link href="http://www.pirolab.it/pirobox/css_pirobox/style_5/style.css" rel="stylesheet" />
<script type="text/javascript" src="http://www.pirolab.it/pirobox/js/jquery_1.5-jquery_ui.min.js"></script>
<script type="text/javascript" src="http://www.pirolab.it/pirobox/js/pirobox_extended_feb_2011.js"></script>-->
<!--<script type="text/javascript">
$(document).ready(function() {
   $.piroBox_ext({
						piro_speed :700,
						bg_alpha : 0.5,
						piro_scroll : true,
						piro_drag :false,
						piro_nav_pos: 'bottom'
					});
});
</script>-->

<!-- light Box
 <link href="../vendor/lightbox2-master/dist/css/lightbox.min.css" rel="stylesheet">
    <script src="../vendor/lightbox2-master/dist/js/lightbox-plus-jquery.min.js"></script>-->


<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../vendor/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../vendor/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../vendor/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>

<body >
     
      <div class="modal fade  " id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="false"  >
            <div class="modal-dialog modal-lg " >

                <div class="modal-content" >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Book for a Fleet</h4>
                    </div>
                    <div class="modal-body" >
                       <div class="row">
                        <div class="col-lg-8">
                            <div class="col-md-6 col-xs-offset-3">
                                 Car List<br/>
                                
                                <div class=" form-group ">
                                    
                                    
                                <select id='fleetid-modal' class="input-group dropdown-menu">
                                <option></option>
                                    
                                    <?php
                                    $queryOpt = "select *,fleet.regno regno,  (select url from upload where uploadtype = 'fleet' and referenceid = fleet.id limit 0,1 ) url, 
(select fname||' '||lname from driver where driver.id = fleet.driverid)driverName , 
(select phoneno from driver  where driver.id = fleet.driverid) phone ,
(select location from location  where location.id = fleet.location) location,
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) bookingToday
from  fleet where status ='1' and 
(select COUNT(fleet) from  bookinglog where createdForD ='".$datenow."' and fleet = fleet.id) < 4
and(
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) <  '".$datenow."' OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) IS NULL OR 
(select  createdInterStateD from  bookinglog where fleet = fleet.id and createdInterStateD != '' ORDER BY createdInterStateD DESC LIMIT 0, 1 ) = '')

";
   $resultOpt = mysqli_query($link,$queryOpt) or die('Errant query:  '.$queryOpt);     
if(mysqli_num_rows($resultOpt)) 
	{	
		
		while($rowOpt= mysqli_fetch_assoc($resultOpt)) 
		{
            echo "<option value='".$rowOpt['id']."'>".$rowOpt['maker']." ".$rowOpt['model']." - ".$rowOpt['regno']." - ".$rowOpt['location']."</option>";
        }}
    ?>
                                    
                                    
                                    
                                </select>
                                    <br/><br/>
                                </div>
                            </div>
                            
                            
                            
                            
                             <div class="col-md-6 col-xs-offset-3">
                                 Trip Type<br/>
                                
                                <div class=" form-group ">
                                    
                                    
                                <select id='tripType-modal' class="input-group dropdown-menu">
                                <option value="Intra State">Intra State</option>
                                 <option value="Inter State">Inter State</option>   
                                    
                                    
                                    
                                    
                                </select>
                                    <br/><br/>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-lg-6">
                                
                            <div class="input-append date form_datetime form-group input-group">
                                Start Date / Start Time<br/>
                                <input type="text" class="form-control  " value="" id="fromDS-modal"  readonly placeholder="Start Date">
                           </div>
                           </div>
                        
                                                        
                            <div class="col-lg-6">
                            <div class="input-append date form_datetime form-group input-group">
                                End Date / End Time<br/>
                                <input type="text" class="form-control " id="fromDE-modal"  readonly="readonly" placeholder="End Date">
                               <!-- <span class="add-on"><i class="icon-remove"></i></span>
                                 <span class="add-on"><i class="icon-calendar"></i></span>-->
                            </div>
                              
                            </div>
                            
                            
                            
                            <div class="col-lg-6">
                            <div class="input-append date form_datetime form-group input-group">
                               Depature Location<br/>
                                <input type="text" class="form-control  " value="" id="depature-modal"  placeholder="Depature Location">
                           </div>
                           </div>
                            <div class="col-lg-6">
                            <div class="input-append date form_datetime form-group input-group">
                               Destination<br/>
                                <input type="text" class="form-control  " value="" id="destination-modal"  placeholder="Destination">
                           </div>
                           </div>
                            
                         
                          
                        </div>
                        <div class="col-lg-4">
                        <img id="my_fleet_img" src="" style=" width:100%; max-height:200px; max-width:200px;  border-radius:5px"/>
                            <img id="my_driver_img" src="" style=" width:100%; max-height:200px; max-width:200px;  border-radius:5px"/>
                        </div>
                       
                          <div class=" col-lg-12" style="clear:both" >
                         <p class="text-center text-muted">
                                <button class="btn btn-primary" onClick="justBook()"><i class="fa fa-save"></i> Book</button>
                            </p>
                        </div>

                           

                       

                       </div> 
                    </div>
                </div>
            </div>
        </div>

    
    
        
        
        
     
    
    
   
        
       <script>
   

        // alert ("kdjfkdks")
        $("#fromDS-modal, #fromDE-modal").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
        
         
             function justBook() 
    {
        //alert ("ljfdfj");
var fleetid  = "";
var sDate   = "";
var eDate   = "";
var depature  = "";
var destination    = "";  
 var error    = ""; 
      tripType = $("tripType-modal option:selected").val() 
	 fleetid  = $("#fleetid-modal option:selected").val()
	 sDate  = document.getElementById("fromDS-modal").value
	 eDate  = document.getElementById("fromDE-modal").value
     depature = $("#depature-modal").val()
     destination = $("#destination-modal").val()
      //now client side validation
     
    if (fleetid == ""){ error +="Please select from fleet dropdown.<br/>";}
        if (sDate == ""){ error +="Please select start date and time.<br/>";}
        if (eDate == ""){ error +="Please select end date and time.<br/>";}
        if (depature  == ""){ error +="Please select type in depature location.<br/>";}
         if (destination   == ""){ error +="Please select type in destination.<br/>";}
        
        if (error =="")
        {
            
            $.ajax({
            type:"POST",
            url:"../resource/fleetBook.php" ,
            data:"&id="+fleetid+"&sDate="+sDate+"&eDate="+eDate+"&depature="+depature+"&destination="+destination+"&tripType="+tripType,
            success:function(data)
			{
              //$("#namef").val(data);
			 //$('#my_fleet_img').attr('src',data);
swal ('Info',data)
			
            }
		 });
        } else 
        {
            swal({title: 'Error!',   text: error,   html: true  })
            
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
                <!-- /.dropdown modal fade-->
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"> <?php include_once("../resource/getUserName.php")?>  </i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a id="btnProfile" href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li id="btnSettings"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
            
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <!-- InstanceBeginEditable name="PageTitle" -->
                 Fleet
                 
  <!--<span id="divdate"></span>-->
                    <!-- InstanceEndEditable -->
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="col-lg-12">
               
                <a href="#"  class="btn btn-success" data-toggle="modal" data-target="#login-modal1">Book a Car</a>
                </div>
                
                
                
            <div id="listDiv">
               
          
       
            
         
         
                </div>
                </div>
            
            
              <script>
                  loadFleetTable() 
           function loadFleetTable() 
{
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/fleetGetAll.php",
            success:function(data)
			{
                $("#listDiv").html(data)
			}
        });
 }
  
                  
              	 
			 /*$(function () {
                $('#datePiker').datepicker({
			inline: true,
			 dateFormat: 'yy/mm/dd'
		});
            });*/
	
                  
           
			
			
			
	



	$(document).on("click","a.elementid", function () 	{
		var bbb = event.target.id;
					//alert (bbb)
					$.ajax({
							type:"GET",
							url:"../resource/sessionSetVariable.php?name=ref&value="+bbb ,
							success:function(data)
								{
								refreshOrder_line ()
								}
						   });
    			/*});*/
		
				 })
	

/*$('a').live('click',function() {
    // runs your code when any "a.link" is clicked
	alert ("jfksk")
});


$('#orderHistory').delegate('a', 'click', function() {
	alert ("fhd")
    // runs your code when an "a.link" inside of "some_container" is clicked
});*/



$("#datePiker").change(function() { 
      $.ajax({
            type:"GET",
            url:"../resource/sessionSetVariable.php?name=ref&value="+$(this).val() ,
            success:function(data)
			{
			refreshOrder_line ()
			}
			});
})

$("#product").change(function() {
  //alert( "Handler for .change() called." );
  var myval = $(this).val()
  $.ajax({
            type:"GET",
            url:"../resource/productGetprice.php?id="+myval ,
            success:function(data)
			{
				var krk = commaSeparateNumber(data)
              $("#prodPrice").html(krk);
				//alert (data)
            productPrice = data;
            var totalPrice = $("#myQuantity").val()* productPrice
			totalPriceS = commaSeparateNumber(totalPrice)
			$("#totalPrice").html(totalPriceS)
			
			$.ajax({
            type:"GET",
            url:"../resource/getVat.php" ,
            success:function(data)
			{ vatrate = data ;
			var vatCharge = totalPrice * data/100
			vatCharges =commaSeparateNumber(vatCharge)
			$("#vatCharge").html(vatCharges)
			var totalCost = totalPrice + vatCharge
			totalCost = commaSeparateNumber(totalCost)
			$("#totalCost").html(totalCost)
			
				}
});


			}
});});

$("#myQuantity").change(function(){
	//get product price from db
	var productPrice;
	var vatrate;
	var quantity = $(this).val()
    var myval = $("#product").val()
  $.ajax({
            type:"GET",
            url:"../resource/productGetprice.php?id="+myval ,
            success:function(data)
			{ productPrice = data ;
			
			var totalPrice = $("#myQuantity").val()* productPrice
			totalPriceS = commaSeparateNumber(totalPrice)
			$("#totalPrice").html(totalPriceS)
			
			$.ajax({
            type:"GET",
            url:"../resource/getVat.php" ,
            success:function(data)
			{ vatrate = data ;
			var vatCharge = totalPrice * data/100
			vatCharges =commaSeparateNumber(vatCharge)
			$("#vatCharge").html(vatCharges)
			var totalCost = totalPrice + vatCharge
			totalCost = commaSeparateNumber(totalCost)
			$("#totalCost").html(totalCost)
			
				}
});
	}
});








  });
  
  
  
     
  

 function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }





    function justDo()
   {
	var scroll = $(window).scrollTop();
	var prod  = document.getElementById("product").value
	var quant  = document.getElementById("myQuantity").value
	var ref  = document.getElementById("datePiker").value
	var resetpass = ""
	if ( prod =="" || quant  =="" || ref  =="" || quant  =="0" || ref  =="dd/mm/yyyy" ) 
	{
		swal("Error","Please Enter a valid input ","error")
		
		if (ref  =="" )
		{swal("Error","Please Enter Date ","error")}
	}else
	{	
	saveorUpdate(prod,quant,ref);
	}
	
	
	//$("html").scrollTop(scroll);
}
  
  

  
  
  
    function saveorUpdate(prod,quant,ref) {
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/ordersave.php" ,
            data:"&prod="+prod+"&quant="+quant+"&ref="+ref,
            success:function(data)
			{
              //$("#namef").val(data);
			  var hfhf 
				hfhf  =  $(".totalCostSa").val()
				//alert (hfhf)
				var sfg = commaSeparateNumber(data)
				 $(".totalCostSa").val(sfg)
				 
				refreshOrder_line () 
				 refreshOrder_History () 

				if ((data.indexOf("Error")  !=-1) ||(data.indexOf("error")  !=-1) )
				{
   				 swal("Error","Error while saving record " +data, "error" );
    			}

			}
			
			
			
			
         });


			

		 }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function refreshOrder_line () 
  {
	  if ( $.fn.dataTable.isDataTable( '#productTable001' ) ) 
			{
					table = $('#productTable001').DataTable( );
					 table.destroy();
			}
			table = $('#productTable001').DataTable( {
						 "ajax": "../resource/orderlinegetSessionAjax.php",
						 "columns":[
														{ data: 'referenceid' },
														{ data: 'product' },
														{ data: 'price' },
														{ data: 'quantity' },
														{ data: 'valueAndVat' }
									],
									 responsive: true
						
              } );
	  
	  }
  
  
  function refreshOrder_History () 
  {
	  if ( $.fn.dataTable.isDataTable( '#orderHistory' ) ) 
			{
					table = $('#orderHistory').DataTable( );
					 table.destroy();
			}
			table = $('#orderHistory').DataTable( {
						 "ajax": "../resource/orderHistoryGetSessionAjax.php",
						 "columns":[					{ data: 'Detail' },
														{ data: 'referenceid' },
														{ data: 'value' },
														{ data: 'created' },
														{ data: 'createdby' }
									]
						
              } );
	  
	  $("a.elementid").click(function(event) {
		  alert ("hghgh")
       		var bbb = event.target.id;
		});
	  }
  
  
  
  
  
function justResetPass()   {
	var namef  = document.getElementById("namef").value
	var namel  = document.getElementById("namel").value
	var email  = document.getElementById("email").value
	var role  = document.getElementById("role").value
	var status  = document.getElementById("status").value
	var resetpass = "reset"
	if (namef =="" || namel  =="" || email  =="" || role  =="" || status  =="" ) 
	{
		swal("Error","Please Enter a valid input ","error")
	}else
	{	
	update(namef,namel,email,role,status,resetpass);
	}}

function update(namef,namel,email,role,status,resetpass) {
  //swal("hhf2")
		if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
		} else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() 
		{
			
            if (this.readyState == 4 && this.status == 200) 
			{				
				//swal (this.responseText)
				if( this.responseText == "updated") 
				{
					
					swal({ 
					  title: "Updated",
					   text: "User was updated successfully",
						type: "success" 
					  },
					  function(){
						window.location.reload() ;
					});
					keeplog("userSetup", namef+' ' + userl + " user was updated. "+ "") ;
				} else if ( this.responseText == "saved") 
				{
					swal({ 
					  title: "Created",
					   text: "User was created successfully",
						type: "success" 
					  },
					  function(){
						window.location.reload() ;
					});
					keeplog("userSetup",  namef+' ' + userl  + " was created " + "") ;
				}else if ( this.responseText == "reset") 
				{
					swal({ 
					  title: "Password Reset",
					   text: "Password was reset successfully",
						type: "success" 
					  },
					  function(){
						window.location.reload() ;
					});
					keeplog("userSetup",  namef+' ' + userl  + " user password wes reset " + "") ;
				}
				else 
				{
					swal({ 
					  title: "Error",
					   text: this.responseText,
						type: "error" 
					  },
					  function(){
						window.location.reload() ;
					});
					}
				



			}
        };
		
       xmlhttp.open("GET", "../resource/usersave.php?namef=" + namef+"&namel="+namel+"&email="+email+"&role="+role+"&status="+status+"&resetpass="+resetpass , true);
        xmlhttp.send();
  
	}

function keeplog(name,detail) {

		if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
		} else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() 
		{
			
            if (this.readyState == 4 && this.status == 200) 
			{				
				//swal (this.responseText)
			}
        };
       xmlhttp.open("GET", "../resource/logkeep.php?page=" + name+"&detail="+detail , true);
        xmlhttp.send();  }
	
function productGetForUpdate(id) {
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/userGetNamef.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#namef").val(data);
				//alert (data)

			}
});



$.ajax({
            type:"POST",
            url:"../resource/userGetNamel.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#namel").val(data);
				//alert (data)
			}
});

$.ajax({
            type:"POST",
            url:"../resource/userGetemail.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#email").val(data);
			  $("#email").prop('disabled', true);
				//alert (data)
			}
});
	
	
	
$.ajax({
            type:"POST",
            url:"../resource/userGetrole.php" ,
            data:"id="+id,
            success:function(data)
			{
				var mysel = "#role>option:eq("+ data +")"
              $(mysel).attr('selected', true);
				//alert (data)
			}
});


$.ajax({
            type:"POST",
            url:"../resource/userGetstatus.php" ,
            data:"id="+id,
            success:function(data)
			{var mysel = ""
				if (data == 0 ) {mysel = "#status>option:eq(1)"} else {mysel = "#status>option:eq(0)"}
				 
              $(mysel).attr('selected', true);//val(data);
				//alert (data)
			}
			
});
	
	 $("#btnpassReset").css("display", "inline");
	
	
		 }
		 



</script> 
            
            
            <!-- InstanceEndEditable -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            
            
            
           
                
                <!-- /.col-lg-12 -->
            </div>
          <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
 <script>
    $("#fromDS-modal, #fromDE-modal").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    }); 
      
     
     $(document).ready(function(){

$('#fleetid-modal').change(function() {
     var fleetid = $("#fleetid-modal option:selected").val()
 $.ajax({
            type:"POST",
            url:"../resource/carGet.php" ,
            data:"&id="+fleetid+"&opr=image",
            success:function(data)
			{
              //$("#namef").val(data);
			 $('#my_fleet_img').attr('src',data);

			}
			
			
			
			
         });
    
    $.ajax({
            type:"POST",
            url:"../resource/carGet.php" ,
            data:"&id="+fleetid+"&opr=imageDriver",
            success:function(data)
			{
              //$("#namef").val(data);
			 $('#my_driver_img').attr('src',data);

			}
			
			
			
			
         });
});


         
         
        
        
		<?php $queryS2 = "select * from fleetStatus;"; //where `page_name` = '$pagename'
	$resultS2 = mysqli_query($link,$queryS2) or die('Errant query:  '.$queryS2);
	
	
	if(mysqli_num_rows($resultS2)) 
	{
        while($rowS2 = mysqli_fetch_assoc($resultS2)) 
		{
        ?>$("#<?php echo $rowS2["fleetStatus"] ?>-table").DataTable({responsive: true });
       
            <?php } }      
        ?>
        $('#dataTables-example').DataTable({
            responsive: true
        }); 
    }); 
    </script>
    
  
</body>

<!-- InstanceEnd --></html>
