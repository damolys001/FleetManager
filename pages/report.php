<?php include_once "../resource/session.php"; $_SESSION["ref"]= ""; 	
$datenow = date("Y/m/d");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ensure Fleet Manager</title>

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
                        <h1 class="page-header">Reports</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                <div class="col-lg-6">
                  
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">User</a>
                                </li>
                                <li><a href="#Department" data-toggle="tab">Department</a>
                                </li>
                                <li><a href="#Fleet" data-toggle="tab">Fleet</a>
                                </li>
                                <li><a href="#Driver" data-toggle="tab">Driver</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>User Filter</h4>
                                  <div class="col-lg-6">
                                     <label class="control-label" for="userddl">User Name</label>
                                        <select id="userddl" class="form-control  ">
                                        </select>
                                   </div>
                           
                         
                           <div class="col-lg-6">
                                     <label class="control-label" for="statusUserDDL">Request Status</label>
                                        <select id="statusUserDDL" class="form-control  ">
                                        </select>
                           </div> 
                           
                           <div class="col-lg-6">
                               <label class="control-label" for="fromDS-user">Start Date / Start Time</label>  
                                <input type="text" class="form-control  " value="" id="fromDS-user"  placeholder="Start Date">
                          
                           </div>
                        
                                                        
                            <div class="col-lg-6">
                            <label class="control-label" for="fromDE-user">End Date / End Time</label>  
                               
                                <input type="text" class="form-control " id="fromDE-user"  placeholder="End Date">
                            
                            </div>
                           
                           <div class="col-md-4 col-md-offset-4 "><br />
                            <button id="btnUser" class="btn btn-warning ui-icon-calculator " >Submit <i class=" fa fa-calculator"></i></button>
                            <button id="btnUserExp" class="btn btn-success"> <i class="fa fa-download"></i></button>
                            </div>
                           
                                </div>
                                <!--user pane End-->
                                
                                <div class="tab-pane fade" id="Department">
                                   
                                     <h4>Department Filter</h4>
                                  <div class="col-lg-6">
                                     <label class="control-label" for="departmentddl">Department</label>
                                        <select id="departmentddl" class="form-control  ">
                                        </select>
                                   </div>
                           
                           
                           
                           <div class="col-lg-6">
                                     <label class="control-label" for="statusDDDL">Request Status</label>
                                        <select id="statusDDDL" class="form-control  ">
                                        </select>
                           </div> 
                           
                           <div class="col-lg-6">
                               <label class="control-label" for="fromDS-D">Start Date / Start Time</label>  
                                <input type="text" class="form-control  " value="" id="fromDS-D"  placeholder="Start Date">
                          
                           </div>
                        
                                                        
                            <div class="col-lg-6">
                            <label class="control-label" for="fromDE-D">End Date / End Time</label>  
                               
                                <input type="text" class="form-control " id="fromDE-D"  placeholder="End Date">
                            
                            </div>
                            
                            
                            <div class="col-md-4 col-md-offset-4 "><br />
                            <button id="btnD" class="btn btn-warning ui-icon-calculator " >Submit <i class=" fa fa-calculator"></i></button>
                            <button id="btnDExp" class="btn btn-success"> <i class="fa fa-download"></i></button>
                            </div>
                            
                            </div>
                            
                            <!--department end -->
                            
                                <div class="tab-pane fade" id="Fleet">
                                    <h4>Fleet Filter</h4>
                                  <div class="col-lg-6">
                                     <label class="control-label" for="fleetddl">Fleet</label>
                                        <select id="fleetddl" class="form-control  ">
                                        </select>
                                   </div>
                           
                           
                           
                           <div class="col-lg-6">
                                     <label class="control-label" for="statusFDDL">Request Status</label>
                                        <select id="statusFDDL" class="form-control  ">
                                        </select>
                           </div> 
                           
                           <div class="col-lg-6">
                               <label class="control-label" for="fromDS-F">Start Date / Start Time</label>  
                                <input type="text" class="form-control  " value="" id="fromDS-F"  placeholder="Start Date">
                          
                           </div>
                        
                                                        
                            <div class="col-lg-6">
                            <label class="control-label" for="fromDE-F">End Date / End Time</label>  
                               
                                <input type="text" class="form-control " id="fromDE-F"  placeholder="End Date">
                            
                            </div>
                            
                                 <div class="col-md-4 col-md-offset-4 "><br />
                            <button id="btnFleet" class="btn btn-warning ui-icon-calculator " >Submit <i class=" fa fa-calculator"></i></button>
                            <button id="btnFleetExp" class="btn btn-success"> <i class="fa fa-download"></i></button>
                            </div>
                                    
                                    
                                    </div>
                                    <!--fleet fliter end-->
                                    
                                <div class="tab-pane fade" id="Driver">
                                    <h4>Driver Filter</h4>
                                  <div class="col-lg-6">
                                     <label class="control-label" for="driverddl">Driver</label>
                                        <select id="driverddl" class="form-control  ">
                                        </select>
                                   </div>
                           
                           
                           
                           <div class="col-lg-6">
                                     <label class="control-label" for="statusDrvDDL">Request Status</label>
                                        <select id="statusDrvDDL" class="form-control  ">
                                        </select>
                           </div> 
                           
                           <div class="col-lg-6">
                               <label class="control-label" for="fromDS-Drv">Start Date / Start Time</label>  
                                <input type="text" class="form-control  " value="" id="fromDS-Drv"  placeholder="Start Date">
                          
                           </div>
                        
                                                        
                            <div class="col-lg-6">
                            <label class="control-label" for="fromDE-Drv">End Date / End Time</label>  
                               
                                <input type="text" class="form-control " id="fromDE-Drv"  placeholder="End Date">
                            
                            </div>
                                  
                                   <div class="col-md-4 col-md-offset-4 "><br />
                            <button id="btnDrv" class="btn btn-warning ui-icon-calculator " >Submit <i class=" fa fa-calculator"></i></button>
                            <button id="btnDrvExp" class="btn btn-success"> <i class="fa fa-download"></i></button>
                            </div>
                                    
                                    </div>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
               
                
                
                
                
               <div class="row">
                    <div class="col-lg-12">  
                <div id="listDiv">
               
            </div>
             </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<script>
$("#fromDS-user, #fromDE-user, #fromDS-D, #fromDE-D,#fromDS-Drv, #fromDE-Drv,#fromDS-F, #fromDE-F").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    }); 
 $(document).ready(function(){
    ///fix user details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/userGetAll.php?f=j",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            {   
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].id + '">' + df[i].UserName + '</option>';
                                    
                                }
                                  $("select#userddl").html(options);
                                 }
})


 ///fix department details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/departmentGetAll.php?f=j",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            {   
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].id + '">' + df[i].department + '</option>';
                                    
                                }
                                  $("select#departmentddl").html(options);
                                 }
})



///fix fleet details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/fleetGetAll.php?f=j",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            {   
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].id + '">' + df[i].regNo +" "+df[i].maker +" "+df[i].model+ '</option>';
                                    
                                }
                                  $("select#fleetddl").html(options);
                                 }
})



///fix fleet details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/fleetGetAll.php",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            
                            {   
                                //console.log(df)
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].id + '">' + df[i].regNo +" "+df[i].maker +" "+df[i].model+ '</option>';
                                    
                                }
                                  $("select#fleetddl").html(options);
                                 }
})



///fix driver details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/driverGetAll.php?f=j",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            
                            {   
                                //console.log(df)
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].id + '">' + df[i].fName +" "+df[i].lName +'</option>';
                                    
                                }
                                  $("select#driverddl").html(options);
                                 }
})


///fix driver details on the drop down list
$.ajax({
                            type:"POST",
                            url:"../resource/bookingStatusGetAll.php?f=j",
                            data:"f=j&opr=getlist",
                            success:function(df)
                            
                            {   
                                //console.log(df)
                                var options = '<option value=""></option>';
                             //approver1
                                for (var i = 0; i < df.length; i++) {
                                   
                                        options += '<option value="' + df[i].status + '">' + df[i].status  +'</option>';
                                    
                                }
                                  $("select#statusDDDL").html(options);
                                  $("select#statusUserDDL").html(options);
                                  $("select#statusFDDL").html(options);
                                  $("select#statusDrvDDL").html(options);
                                 }
})


///User query
$("#btnUser").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-user").val() ;
   var eDate = $("#fromDE-user").val();
   var status = $("#statusUserDDL").val();
   var id = $("#userddl").val();
   
   if (sDate == "" || eDate== "") // || status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getuser&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {   
                               $("#listDiv").html(df)
                            }
})

}
})


///User Export
$("#btnUserExp").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-user").val() ;
   var eDate = $("#fromDE-user").val();
   var status = $("#statusUserDDL").val();
   var id = $("#userddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getuser&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {
                                 $("#listDiv").html(df)
                                window.open('../resource/report.php?'+"f=j&opr=expuser&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,'_blank' );
                               swal('','Report was generated successfully. Kindly ensure your browser allows popup.','success')
                               //$("#listDiv").html(df)
                            }
})

}
})




/// Department
$("#btnD").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-D").val() ;
   var eDate = $("#fromDE-D").val();
   var status = $("#statusDDDL").val();
   var id = $("#departmentddl").val();
   
   if (sDate == "" || eDate== "") // || status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getdepartment&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {   
                               $("#listDiv").html(df)
                            }
})

}
})


///Department Export
$("#btnDExp").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-D").val() ;
   var eDate = $("#fromDE-D").val();
   var status = $("#statusDDDL").val();
   var id = $("#departmentddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getdepartment&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {
                                 $("#listDiv").html(df)
                                window.open('../resource/report.php?'+"f=j&opr=expdepartment&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,'_blank' );
                               swal('','Report was generated successfully. Kindly ensure your browser allows popup.','success')
                               //$("#listDiv").html(df)
                            }
})

}
})





///fleet
$("#btnFleet").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-F").val() ;
   var eDate = $("#fromDE-F").val();
   var status = $("#statusFDDL").val();
   var id = $("#fleetddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   { 
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getfleet&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {   
                               $("#listDiv").html(df)
                            }
})

}
})


///fleet Export
$("#btnFleetExp").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-F").val() ;
   var eDate = $("#fromDE-F").val();
   var status = $("#statusFDDL").val();
   var id = $("#fleetddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getfleet&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {
                                 $("#listDiv").html(df)
                                window.open('../resource/report.php?'+"f=j&opr=expfleet&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,'_blank' );
                               swal('','Report was generated successfully. Kindly ensure your browser allows popup.','success')
                               //$("#listDiv").html(df)
                            }
})

}
})



///Driver
$("#btnDrv").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-Drv").val() ;
   var eDate = $("#fromDE-Drv").val();
   var status = $("#statusDrvDDL").val();
   var id = $("#driverddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getdriver&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {   
                               $("#listDiv").html(df)
                            }
})

}
})


///User Export
$("#btnDrvExp").click(function (){
    //alert("kfk")
   var sDate = $("#fromDS-Drv").val() ;
   var eDate = $("#fromDE-Drv").val();
   var status = $("#statusDrvDDL").val();
   var id = $("#driverddl").val();
   
   if (sDate == "" || eDate== "" ) //|| status=="" || id==""
   {
    swal("Error","Please provide a valid input.",'error')
   }else
   
   {
$.ajax({
                            type:"POST",
                            url:"../resource/report.php",
                            data:"f=j&opr=getdriver&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,
                            success:function(df)
                            {
                                 $("#listDiv").html(df)
                                window.open('../resource/report.php?'+"f=j&opr=expdriver&id="+id+"&sDate="+sDate+"&eDate="+eDate+"&status="+status,'_blank' );
                               swal('','Report was generated successfully. Kindly ensure your browser allows popup.','success')
                               //$("#listDiv").html(df)
                            }
})

}
})





})
</script>
</body>

</html>
