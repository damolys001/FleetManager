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

    
    
    <!-- This is what you need integration -->
  <script src="../sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css">
  <!--.......................-->
  
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

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">  <i class=" fa-gear fa    fa-1x  "></i>Basics</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                
                <div class="row">
            
                    <div class="col-lg-12">
                        
                      <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                         <i class="  fa  fa-edit fa-2x "></i>   App Name
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                            <label>Name</label>
                                            <input id="name" class="form-control" placeholder="Enter text">
                             </div>
                             <div class="form-group">
                             <label>Domain name</label>
                            <input id="shopDomain" class="form-control" placeholder="Enter text">
                            </div>
                             <div class="form-group">
                             <label>Admin Email</label>
                            <input id="adminEmail" class="form-control" placeholder="Enter text">
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                           <button onclick="saveBasics('appName') " class="btn btn-success">Update</button>
                        </div>
                    </div>
                            </div>  
                          
                        <div class="col-lg-4"> 
                           <div class="panel panel-success">
                        <div class="panel-heading">
                         <i class="  fa  fa-spinner   fa-2x "></i>   Booking
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                            <label>Stat Time</label>
                                            <input id="bookingStart" type="time" class="form-control" placeholder="Enter text">
                             </div>
                            
                             <div class="form-group">
                                            <label>End Time</label>
                                            <input id="bookingEnd" type="time" class="form-control" placeholder="Enter text">
                             </div>
                            
                            
                             <div class="form-group">
                                            <label>Max Hours</label>
                                            <input id="maxHour" type="number" class="form-control" placeholder="Enter text">
                             </div>
                            
                            <div class="form-group">
                                            <label>Max Per Department (Default)</label>
                                            <input id="maxPerDept" type="number" class="form-control" placeholder="Enter text">
                             </div>
                            
                        </div>
                        <div class="panel-footer">
                           <button onclick="saveBasics('booking')" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>  
                        
                        
                        
                    <div class="col-lg-4"> 
                           <div class="panel panel-success">
                        <div class="panel-heading">
                         <i class="  fa  fa-envelope-o   fa-2x "></i>   Email
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                            <label>Mask E-Mail</label>
                                            <input disabled id="cutomer_maskemail" class="form-control" placeholder="Enter text">
                             </div>
                             <div class="form-group">
                                            <label>Internal E-Mail (No SMTP Authentication Required)</label>
                                            <input id="cutomer_email" class="form-control" placeholder="Enter text">
                             </div>
                            
                         
                             <div class="form-group">
                             <label>Email Client</label>
                                 <select id="mailClientCust" class="form-control" placeholder="Enter text"></select>
                           
                            </div>
                            
                            
                        </div>
                        <div class="panel-footer">
                           <button onclick="saveBasics('email')" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>  
                        
                 
                  <div style="clear:both"></div>      
                        
                         <div class="col-lg-4"> 
                           <div class="panel panel-success">
                        <div class="panel-heading">
                         <i class="  fa  fa-envelope-o   fa-2x "></i>  External Email Setting
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                            <label>Alias</label>
                                            <input id="aliasName" class="form-control" placeholder="Enter text">
                             </div>
                            
                             <div class="form-group">
                             <label>Provider</label>
                                  <input id="provider" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                            <div class="form-group">
                             <label>Host</label>
                                  <input id="host" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                            
                             <div class="form-group">
                             <label>Port</label>
                                  <input id="port" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                            
                            <div class="form-group">
                             <label>auth</label>
                                  <input id="auth" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                            <div class="form-group">
                             <label>User Name</label>
                                  <input id="username" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                             <div class="form-group">
                             <label>Password</label>
                                  <input id="password" type="password" class="form-control" placeholder="Enter text">
                           
                            </div>
                            
                        </div>
                        <div class="panel-footer">
                           <button onclick="saveBasics('extEmail')" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>  
                        
                     
                        
                         <div class="col-lg-4"> 
                           <div class="panel panel-success">
                        <div class="panel-heading">
                         <i class="  fa  fa-envelope-o   fa-2x "></i>   SMS Settings
                        </div>
                        <div class="panel-body">
                            
                            <div class="form-group">
                                            <label>Mask SMS</label>
                                            <input id="smsName" class="form-control" placeholder="Enter text">
                             </div>
                             <div class="form-group">
                                            <label>SMS API</label>
                                            <textarea rows="5" id="smsAPI" class="form-control" placeholder="Enter API configuration with $smsName&GSM=+234$to&SMSText=$body config  "></textarea>
                             
                                                </div>
                            
                           
                            
                            
                        </div>
                        <div class="panel-footer">
                           <button onclick="saveBasics('sms')" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>  
                       
                        
                        
                        
                        
                        
                </div>
                
                
               </div> 
                
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        
        
        
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
<script>
         $(document).ready(function()
                           {
             
               $.ajax({
                    type:"POST",
                    url:"../resource/BasicsGetAll.php" ,
                    data:"id=1&f=j",
                    success:function(data)
                    {
                        var d = data[0];
                        
                        console.log(d)
                        
                                  // $("#make").val();
                       // $("#model").val();
                      $("#name").val(d.name);
                      $("#shopDomain").val(d.shopDomain);
                     $("#bookingStart").val(d.bookingStart);
                     $("#bookingEnd").val(d.bookingEnd);
                        
                      $("#maxHour").val(d.maxHour);
                      $("#maxPerDept").val(d.maxPerDept);
                     $("#cutomer_maskemail").val(d.name);
                     $("#cutomer_email").val(d.cutomer_email );  
                        
                      $("#smsName").val(d.smsName);
                     $("#smsAPI").val(d.smsAPI);  
                        $("#adminEmail").val(d.adminEmail);  
                        
                       
                        
                        ///Fix External email settings
                         var options = '<option value=""></option>';
                       if ( d.mailClientCust=="external")
                       {
                         options += '<option selected value="external">' + 'External'+ '</option>';
                           options += '<option  value="internal">' + 'Internal'+ '</option>';
                        }else
                            
                        {
                            options += '<option  value="external">' + 'External'+ '</option>';
                           options += '<option  selected value="internal">' + 'Internal'+ '</option>';
                        
                        }
                         $("select#mailClientCust").html(options);
                        //mailClientCust
                        
                        //mailClientCust
                        
                        $.ajax({
                            type:"POST",
                             url:"../resource/BasicsGetAll.php" ,
                            data:"id="+d.mailClientIdCust+"&f=j&opr=getExtEmail",
                            success:function(df)
                            {   var d = df[0];
                                //console.log(d)  
                                $("#aliasName").val(d.aliasName);
                                
                             $("#provider").val(d.provider);
                             $("#host").val(d.host);
                             $("#port").val(d.port);
                             
                              $("#auth").val(d.auth);
                             $("#username").val(d.username);
                             $("#password").val(d.password);
                             
                             
                             
                            }
                        }); 
                        
                    // $("#department").val();
                      //  $("#driver").val();
                      // $("#fleetStatus").val();
                      //$("#regNumber").val(d.regNo);
                    //$("#year").val(d.year);
                        
                    }
        })
               
               
      
               
             
             
                            })
      
        
      function saveBasics(opr) 
             {
                     var name = $("#name").val();
                     var shopDomain =$("#shopDomain").val();
                     var bookingStart= $("#bookingStart").val();
                     var bookingEnd =$("#bookingEnd").val();
                        
                     var maxHour = $("#maxHour").val();
                     var maxPerDept = $("#maxPerDept").val();
                     
                     var cutomer_email  = $("#cutomer_email").val();  
                        
                     var smsName = $("#smsName").val();
                     var smsAPI = $("#smsAPI").val();  
                    smsAPI =smsAPI.replace(/&/g, '_AND_'); 
                     var adminEmail = $("#adminEmail").val();  
                 
                 var aliasName = $("#aliasName").val();
                                
                  var provider = $("#provider").val();
                  var host =  $("#host").val();
                  var port = $("#port").val();
                             
                   var auth = $("#auth").val();
                    var username = $("#username").val();
                    var password = $("#password").val();
                 var mailClientCust = $("#mailClientCust").val();
                    
                 var Aurgs = "name="+name+"&shopDomain="+shopDomain+"&bookingStart="+bookingStart+"&bookingEnd="+bookingEnd+"&maxHour="+maxHour+"&maxPerDept="+maxPerDept+"&cutomer_maskemail="+cutomer_email+
                 "&smsName="+smsName+"&smsAPI="+smsAPI+"&adminEmail="+adminEmail+"&aliasName="+aliasName+"&provider="+provider+"&host="+host+"&port="+port+
                 "&auth="+auth+"&username="+username+"&password="+password+"&mailClientCust="+mailClientCust;
                 //;+"&="++"&="++"&="++"&="++"&="++
                 $.ajax({
                            type:"GET",
                             url:"../resource/BasicsSave.php" ,
                            data:"id=1&f=j&opr="+opr+"&"+Aurgs,
                            success:function(df)
                            {   
                             
                             swal ('Info',df)
                             
                            }
                        }); 
                        
                 
             }
               
        
        
        </script>
</body>

</html>
