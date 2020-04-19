<?php include_once "../resource/session.php"; //header('Location: '.'history.php');
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

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.html">Ensure Fleet Manager</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               <!-- <li class="dropdown">
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
                    
                </li>--><!-- /.dropdown-messages -->
                <!-- /.dropdown -->
                
               <!-- <li class="dropdown">
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
                    
                </li>--><!-- /.dropdown-tasks -->
                <!-- /.dropdown -->
                <!--<li class="dropdown">
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
                  
                </li>-->  <!-- /.dropdown-alerts -->
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
                        <li><a href="..\login\logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
               <!-- -->
                <?php include_once "../resource/menu.php" ?>
            </div>
            <!-- /.navbar-static-side --> <!-- /.sidebar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                    <div class="col-lg-12">
                        <div id ="unrated" style="display:none ;" class="alert  alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <i class="fa fa-info-circle"></i>You currently have <span id="unratedNo"></span> unrated completed trip(s) please click to rate <a class="btn btn-warning" href="mybookings.php">Ratings</a>
                        </div>
                        
                        <div id ="unapprove" style="display:none ;" class="alert  alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>You currently have <span id="unapproveNo"></span> fleet request(s) pending on you please click to approve <a class="btn btn-success" href="authorized.php">Pending on you</a>
                        </div>
                    </div>
                </div>
            
            
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bomb fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="available">...</div>
                                    <div>Available Fleet</div>
                                </div>
                            </div>
                        </div>
                        <a href="fleet.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pied-piper fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="booked">...</div>
                                    <div>Fully Booked Fleet</div>
                                </div>
                            </div>
                        </div>
                        <a href="fleet.php#booked">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car   fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="total">...</div>
                                    <div>Total Fleet</div>
                                </div>
                            </div>
                        </div>
                        <a href="fleet.php#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-frown-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge" id="faulty">...</div>
                                    <div>Faulty Fleet</div>
                                </div>
                            </div>
                        </div>
                        <a href="fleet.php#faulty">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Fleet Request Chart
                            <div class="pull-right">
                                <div class="btn-group">
                                      <select id="ddlCart" class="pull-right " ></select>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-myarea-chart"></div>
                            <div id="morris-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                   
                    <!-- /.panel -->
                </div>
                
                
             
                
                <div class="col-lg-4" style="max-height: 350px; overflow-y: scroll; ">
      <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Comment(s)
                        </div>
                      <!--  <div class="panel-footer">
                            <div class="input-group">
                               
                                <textarea id="cmtDetail" class="form-control input-sm" placeholder="Type your message here..."></textarea>
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Comment
                                    </button>
                                </span>
                            </div>
                        </div> -->
      <div class="panel-body">
                            <ul class="chat" id="myBookingLogComment">
     
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        
                        <br /> <br /> <br />
                        <!-- /.panel-footer -->
                        
                        
      </div>
      </div>
                
                
                
                
                <div class="col-lg-6">
                    
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Fleet Allocation by Department
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                
                
                <div class="col-lg-6">
                    
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Fleet Allocation by Location
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart-loc"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
                
                
                <!-- /.col-lg-8 -->
                <div class="col-lg-12">
                    
                    
                    
                    <!-- /.panel -->
                  
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default" style="display:none">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Group Chat
                            <!--<div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <!--<script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
        <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
   <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
<script>

    
   function loadDbicon() {
     $.ajax({
                            type:"POST",
                            url:"../resource/fleetGetAll.php",
                            data:"opr=dashboard",
                            success:function(df)
                            { 
                               
                                $("#available").html(df.Available)
                                $("#booked").html(df.Booked)
                                $("#faulty").html(df.Faulty + df.Indispose)
                                var total = df.Available +df.Booked + df.Faulty + df.Indispose
                                $("#total").html(total)
                                  //$("#targetLayer").html(df);
       //console.log(df)
                                //alert ("kd")  
                            }
                        }); 
                        
                        
                        
                        
///show message
 $.ajax({
                            type:"POST",
                            url:"../resource/dashboardMsg.php",
                            data:"opr=getUnrated",
                            success:function(df)
                            { 
                               
                                //$("#available").html(df.Available)
                                $("#unratedNo").html(df.unrated)
                                if (df.unrated > 0){$("#unrated").fadeIn(500)}
                                console.log(df)
                              //  alert (df)
                                //alert (df["unrated"].unrated)  
                            }
                        }); 

    
    $.ajax({
                            type:"POST",
                            url:"../resource/dashboardMsg.php",
                            data:"opr=getUnapproved",
                            success:function(d)
                            { 
                               
                                //$("#available").html(df.Available)
                                $("#unapproveNo").html(d.unapprove)
                                if (d.unapprove > 0){$("#unapprove").fadeIn(500)}
                                  console.log(d) 
                               
                                  //$("#targetLayer").html(df);
       
                                //alert ("kd")  
                            }
                        }); 
    
                        
}

setInterval(loadDbicon(), 1000);
 
    
    
    
    ///////////////////////////////Fill upCart Table/////////////////////////
   $(function() {
       
          
    ///fill up cart dropdown for current week
    Date.prototype.getWeek = function() {
    var onejan = new Date(this.getFullYear(),0,1);
    return Math.ceil((((this - onejan) / 86400000) + onejan.getDay()+1)/7);
}
var myDate = new Date();
    var ffd= myDate.getWeek()
var options = '';
  for (var i = 1; i <= ffd; i++) 
  {
      if (i < ffd)
      {
           options += '<option  value="' + i + '">Week ' + i + '</option>';
      }
      else
      {
          options += '<option selected value="' + i + '">Week ' + i + '</option>';
      }
  }
    $("select#ddlCart").html(options);

       
     $('#ddlCart').change(function() 
                            {
                                var weeid = $("#ddlCart option:selected").val()
                                requestData(weeid , chart);

                            });
      
       
     /*  
       $.ajax({
      type: "GET",
      url: '../resource/fleetGetAllCart.php',
      data: { w: 3,f:"j" }
    })
    .done(function( data ) {
        alert (data)
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(JSON.parse(data));
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
       
    */   
        
  // Create a function that will handle AJAX requests
  function requestData(w, chart){
    $.ajax({
      type: "GET",
      url:'../resource/fleetGetAllCart.php', //"{{url('../resource/fleetGetAllCart.php')}}", // This is the URL to the API
      data: { w: w,f:"j" }
    })
    .done(function( data ) {
      //alert(data[0]["Unapproved"]) 
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }
  var chart = Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'morris-chart',
    // Set initial data (ideally you would provide an array of default data)
    
    //data: [0,0],
      data:[{"Day":"2017-01-17","DayName":"Tuesday","DayDate":"2017\/01\/17","Unapproved":"2","Approved":"0","Cancelled":"0","Extended":"0"},
            {"Day":"2017-01-20","DayName":"Friday","DayDate":"2017\/01\/20","Unapproved":"2","Approved":"0","Cancelled":"0","Extended":"0"},
            {"Day":"2017-01-22","DayName":"Sunday","DayDate":"2017\/01\/22","Unapproved":"13","Approved":"0","Cancelled":"0","Extended":"0"}],
    xkey: 'Day',

      xLabelAngle: 60,
   
    ykeys: ['Unapproved','Approved','Cancelled','Completed'],
      labels: ['Unapproved Request','Approved Request','Cancelled Request','Completed Trip(s)'],
      lineColors: ['#0b62a4', '#D58665','red', 'green'],
  
    smooth: true,
    resize: true,
      xLabelFormat: function (d) {
    var weekdays = new Array(7);
    weekdays[0] = "SUN";
    weekdays[1] = "MON";
    weekdays[2] = "TUE";
    weekdays[3] = "WED";
    weekdays[4] = "THU";
    weekdays[5] = "FRI";
    weekdays[6] = "SAT";

    return weekdays[d.getDay()] + '-' + 
           ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
           ("0" + (d.getDate())).slice(-2);
          
  }
  });
  // Request initial data for the past 7 days:
         var ffd= myDate.getWeek();
       //ffd = ffd -1;
        // alert (ffd)
 requestData(ffd, chart);
       
    
      
       
       
       
       ///Pie chard vehicle allocation  BY dept
       
       $.ajax({
                            type:"POST",
                            url:"../resource/fleetgetpie.php",
                            data:"opr=department&f=j",
                            success:function(df)
                            { 
                                 var plotObj = $.plot($("#flot-pie-chart"), df, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    grid: {
                                        hoverable: true
                                    },
                                    tooltip: true,
                                    tooltipOpts: {
                                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                                        shifts: {
                                            x: 20,
                                            y: 0
                                        },
                                        defaultTheme: false
                                    }
                                });
                            }
       })
       
       
       
       

   
       
       
       
        
       ///Pie chard vehicle allocation  BY location
       
       $.ajax({
                            type:"POST",
                            url:"../resource/fleetgetpie.php",
                            data:"opr=location&f=j",
                            success:function(df)
                            { 
                                 var plotObj = $.plot($("#flot-pie-chart-loc"), df, {
                                    series: {
                                        pie: {
                                            show: true
                                        }
                                    },
                                    grid: {
                                        hoverable: true
                                    },
                                    tooltip: true,
                                    tooltipOpts: {
                                        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                                        shifts: {
                                            x: 20,
                                            y: 0
                                        },
                                        defaultTheme: false
                                    }
                                });
                            }
       })
       
       
       
 /* $('ul.ranges a').click(function(e){
    e.preventDefault();
    // Get the number of days from the data attribute
    var el = $(this);
    days = el.attr('data-range');
    // Request the data and render the chart using our handy function
    requestData(days, chart);
    // Make things pretty to show which button/tab the user clicked
    el.parent().addClass('active');
    el.parent().siblings().removeClass('active');
  })*/
    }); 
    
    
    
    
    
refreshMessages()
setInterval(refreshMessages, 10000);
function refreshMessages() {
         var id = $("#fleetid").val()
  $.ajax({
            type:"POST",
            url:"../resource/commentSave.php" ,
            data:"&opr=dashboardRefresh"+"&id="+id,
            success:function(data)
			{ 
			 //swal('',data)
			 $("#myBookingLogComment").html(data)
             //swal('Info',data, 'info')
             //$("#cmtDetail").val("")
			},
    error: function() {
      $('#myBookingLogComment').prepend('');
    }
			
         });
}

$('#cmtDetail').keypress(function(e){
      if(e.keyCode==13)
      $('#btn-chat').click();
    });
</script>
</body>

</html>
