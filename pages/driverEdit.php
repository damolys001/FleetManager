<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= ""; ?>
<?php include_once "../resource/session.php"; $_SESSION["prodidforUpdate"]= "";$_SESSION["ref"]= "";
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/templateMain.dwt.php" codeOutsideHTMLIsLocked="false" -->

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

<body>

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
              <?php include_once "../resource/menu.php" ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                    <!-- InstanceBeginEditable name="PageTitle" -->
                <a href="driver.php">Driver(s)</a>/ Edit Driver
                 
  <!--<span id="divdate"></span>-->
                    <!-- InstanceEndEditable -->
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="col-lg-12">
                    <div class="col-lg-8 ">
                        
                        <input type="hidden" id="driverId" value=""/>
                         
                    <div class="well row">
                      <h3>Basic Information</h3>    
                    <div class="col-lg-6 ">
                         <label > First Name</label>
                     <div class="form-group input-group">
                           
                         <span class="input-group-addon"></span>
                              <input id="fName" type="text"   value=""  class="form-control">
                         <span class="input-group-addon"></span>
                      </div>
                     </div>
                    
                        
                     <div class="col-lg-6 ">
                      <label > Last Name</label>
                 		<div class="form-group input-group">
                           <span class="input-group-addon"></span>
                              <input id="lName" type="text"   value=""  class="form-control">                      
        
                            <span class="input-group-addon"></span>
                      </div>
                      </div>
                    
                       
                        <div class="col-lg-6 ">
                      <label > Other Name</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                          <input id="Oname" type="text"   value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                        
                        
                      <div class="col-lg-6 ">
                      <label > License Number</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="driversLicenseNo" type="text"  value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                        
                        
                        
                         <div class="col-lg-6 ">
                      <label > License Expiry Date</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="expiryDate" type="date"   value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                        
                        
                         <div class="col-lg-6 ">
                      <label > Phone Number</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="PhoneNo" type="number" maxlength="11"   value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                        
                        
                        
                        
                        <div class="col-lg-6 ">
                      <label > Phone Number2</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="PhoneNo2"  type="number" maxlength="11"  value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                       
                        
                        <div class="col-lg-6 ">
                      <label > Phone Number3</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="PhoneNo3"  type="number" maxlength="11"  value=""  class="form-control">
                        <span class="input-group-addon"></span> 
                        
                      </div>
                    </div>
                  
                       
                   </div>
                
                        
                        
               <div class="well row">
                        <h3>Custom Information</h3>
                        
                        
                    
                    
                    <div class="col-lg-6 ">
                               <label > Driver Status</label>
                     <div class="form-group input-group">
                          <span class="input-group-addon"></span>
                             <select id="driverStatus" class="form-control" >
                                <option value=""></option>
                                    <?php include_once '../resource/driverStatusGetAll.php'; ?>
                            </select>
                         <span class="input-group-addon"></span>
                      </div>
                     </div> 
                    
                    
                    
                
                        </div>     
                        
                        
                        
                
                          <div class="well row">
                  <h3 > Images</h3>
                  <form id="uploadForm" action="../resource/uploadfile.php" method="post" enctype="multipart/form-data" >
                    <div>
                      <input name="userImage" id="userImage"  class="btn btn-default" type="file" class="demoInputBox" />
                    </div>
                    <div>
                      <input type="submit" id="btnSubmit" class="btn btn-primary" value="Uplaod" class="btnSubmit" />
                    </div>
                    <div id="progress-div">
                      <div id="progress-bar"></div>
                    </div>
                  </form>
                  <div id="loader-icon" style="display:none;"><img src="images/LoaderIcon.gif" /></div>
                  <style>
    #progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
    </style>
                  <div class="row">
                    <div id="targetLayer" style="overflow:scroll;  height:auto; max-height:200px;  overflow:auto;"></div>
                  </div>
                </div>
                        
                
                        
                        
                       
                        
              
              </div>
                
                </div>
                
                 <div class="col-lg-12 row alert ">
                        
                            
                            <button type="submit" class="btn btn-danger" onClick="doDelete()" style=" float:left; ;">Cancel</button>
                  <button type="submit" id="saveFleet" class="btn btn-primary" onClick="doSave()" style=" float:right;">Save</button>
                        </div>
                </div>
            
<script type="text/javascript" charset="utf-8">
   
////////////////////////////////////GET URL PARAMETERS FUNCTION
    var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};
    
    
  

    
   
    
    var id = getUrlParameter("id");
    
    ////////////////////////////////DO A LOADING
    $.ajax({
                    type:"POST",
                    url:"../resource/driverGetAll.php" ,
                    data:"id="+id+"&f=j",
                    success:function(data)
                    {
                        var d = data[0];
                        
                        
                      $("#fName").val(d.fName);
                      $("#lName").val(d.lName);
                     $("#Oname").val(d.Oname);
                     $("#driversLicenseNo").val(d.driversLicenseNo);
                     $("#expiryDate").val(d.expiryDate);
                    $("#PhoneNo").val(d.PhoneNo);
                     $("#PhoneNo2").val(d.PhoneNo2);   
                     $("#PhoneNo3").val(d.PhoneNo3);   
                      $("#driverId").val(d.id);  
                        
                      //alert ($("#driverId").val())
                        
                        //////////handles the driver status dropdown  
                        $.ajax({
                            type:"POST",
                            url:"../resource/driverStatusGetAll.php?f=j",
                            data:"f=j",
                            success:function(df)
                            {   var options = '';
                                for (var i = 0; i < df.length; i++) {
                                    if (df[i].id ==d.status)
                                    {
                                         options += '<option selected value="' + df[i].id + '">' + df[i].driverStatus+ '</option>';
                                    }else
                                    {
                                        options += '<option value="' + df[i].id + '">' + df[i].driverStatus + '</option>';
                                    }
                                }
                                  $("select#driverStatus").html(options);
                                  
                            }
                        }); 
                        
                        
                        
                         //////////handles the image uploaded  
                        $.ajax({
                            type:"POST",
                            url:"../resource/uploadlist.php",
                            data:"type=driver&id="+d.id,
                            success:function(df)
                            {   
                                  $("#targetLayer").html(df);
                                  
                            }
                        }); 
              
              
                    }
        });
    
    




                
  
           
$(document).ready(function() {
   
///////////////////////////////////Image Pop up
$("#targetLayer").on("focusin", function(){
 $("a.fancybox").fancybox({
  // fancybox API options here
  'padding': 0
 }); // fancybox
}); //  
    
    
	 ////////////////////////////image save    			 
		$('#uploadForm').submit(function(e) {	
		
		e.preventDefault();
	var fName  = document.getElementById("fName").value
	var driversLicenseNo  = document.getElementById("driversLicenseNo").value 
    var driverId  = document.getElementById("driverId").value 
	
	//var ref  = document.getElementById("datePiker").value
	var resetpass = ""
	if ((driversLicenseNo =="" ) || (fName ==""))  //||  ref  =="dd/mm/yyyy"
	{
		swal(swal("Error","Please Enter first name and driver license number ","error"))
	
	}else
	{	
        /////////////////////////////save fleet to Get Id
	   var myp = "../resource/driverPreImgUpload.php?fName=" + fName+"&driverId="+driverId;
		       $.ajax({
            type:"GET",
            url: myp  ,
            success:function(data){	} });
	
	////////////////////////do actual file  upload
			if($('#userImage').val()) {
				//e.preventDefault();
				
				$('#loader-icon').show();
				$("#uploadForm").ajaxSubmit({ 
					target:   '#targetLayer', 
					beforeSubmit: function() {
						$("#progress-bar").width('0%');
						
					},
					uploadProgress: function (event, position, total, percentComplete){
						
						$("#progress-bar").width(percentComplete + '%');
						$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
					},
					success:function (){
						
						$('#loader-icon').hide();
					},
					resetForm: true 
				}); 
				return false; 
			}
		}
    });
			
	});
    
////image save  Ends

     
        //manage submit button and upload button ends  
    
    
    //////////////////////////////////save fleet
         function doSave()
   {
	   var fName = $("#fName").val();
       var lName = $("#lName").val();
       var Oname = $("#Oname").val();
       var driversLicenseNo = $("#driversLicenseNo").val();
       var expiryDate = $("#expiryDate").val();
       var PhoneNo = $("#PhoneNo").val();
       var PhoneNo2 = $("#PhoneNo2").val();
       var PhoneNo3 = $("#PhoneNo3").val();
       var driverStatus = $("#driverStatus").val();
       
      
       
  	
	if ( fName =="" || lName  =="" || PhoneNo  =="" || driversLicenseNo =="" ) 
	{
        
        
		swal("Error","Please Enter First name Last name, Licence number and Phone number ","error")
		
		//if (ref  =="" )
		//{swal("Error","Please Enter Date ","error")}
	}else
	{	
	   $.ajax({
                    type:"POST",
                    url:"../resource/driversave.php" ,
                    data:"fName="+fName+"&lName="+lName+"&Oname="+Oname+"&driversLicenseNo="+driversLicenseNo+"&expiryDate="+expiryDate+"&PhoneNo="+PhoneNo+"&PhoneNo2="+PhoneNo2+"&PhoneNo3="+PhoneNo3+"&status="+driverStatus,
                    success:function(j)
                    {
                        swal("Success",j,"success")
          
                    }
        });
	}
	
	
	//$("html").scrollTop(scroll);
}
  
    
    
    ////////////////////keepa a log
    
   function keeplog(name,detail) 
                  {
    
    $.ajax({
            type:"GET",
            url:"../resource/logkeep.php" ,
            data:"page=" + name+"&detail="+detail,
            success:function(data)
			{}
}); }     
        
    
    //////////////////////eliment d
    $(document).on("click","a.elementid", function () 
	{
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
    
    
    
   
    
    
    
    
    
    
//Handel Picture Delete Begin
$(document).on("click","a.picdeleteid", function () 
	{
		var bbb = $(this).prop("id")
		SetVariableServerSession ('DelId', bbb)
				//	alert (bbb)
				      
	
		//function deleteorder(orderid) {
    swal({
      title: "Are you sure?", 
      text: "Are you sure you want to delete this file? You won't be able to revert this!", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Yes, Delete it!",
      confirmButtonColor: "#ec6c62"
    }).then(function () {
         
        $.ajax(
                {
                    type: "get",
                    url:"../resource/uploadDelete.php?DelId=0&type=driver" ,
							success:function(data){
								$("#targetLayer").html(data)
                    }
                }
        )
 
})  
    
	 })
    
    
    

////////////////////set session variable

function SetVariableServerSession (name, variable)
	
	{
		$.ajax({
			type:"GET",
			url:"../resource/sessionSetVariable.php?name="+name+"&value="+variable ,
			success:function(data)
			{

			}
			});
		
		}
    
    
    
    
     /////////////////////handel fan box image gallery
    $(document).on("click","a.fancybox", function () 
	{$('.fancybox').fancybox();})
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

   

    
  
</body>

<!-- InstanceEnd --></html>
