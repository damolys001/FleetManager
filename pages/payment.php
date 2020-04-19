<?php include_once "../resource/session.php"; $_SESSION["paymentrefforUpdate"]= "";$_SESSION["ref"]= ""; ?>
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
                 Payment on <input id="datePiker" type="date" style="z-index:10000" ></input> 
                 
  <!--<span id="divdate"></span>-->
                    <!-- InstanceEndEditable -->
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div id="lblmsg" class="panel-heading">
                           <i class="fa fa-gear fa-fw"></i> Please provide valid inputs
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- InstanceBeginEditable name="MainContent" -->
            
          <div class="col-lg-6">
          
        
         <div class="row">  
          
                  

					<div class="col-lg-6">
                    <label for="">Paid Amount</label>
						<div class="form-group input-group">
							<span class="input-group-addon alert-danger"></span>
                            <input id="value" type="number"  min="0"  value=""  class="form-control">
                            <span class="input-group-addon alert-danger"></span>
						</div>
                        
                        
                        <label for="">Payment Document</label>
						<div class="form-group input-group">
							<!--<span class="input-group-addon alert-danger"></span>
                            <input id="value"  type="file"   class="form-control">
                            <span class="input-group-addon alert-danger"></span>-->
                            
                           <div style="clear:both">
                           
                      <form id="uploadForm" action="../resource/uploadfile.php" method="post" enctype="multipart/form-data" >
    <div>
       
        <input name="userImage" id="userImage"  class="btn btn-default" type="file" class="demoInputBox" />
    </div>
    <div><input type="submit" id="btnSubmit" class="btn btn-primary" value="Uplaod" class="btnSubmit" /></div>
    <div id="progress-div"><div id="progress-bar"></div></div>
   
</form>
<div id="loader-icon" style="display:none;"><img src="images/LoaderIcon.gif" /></div>
    <style>
    #progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}
    </style>
    
                           </div> 
                            
                            
						</div>
					</div>
                    
                    
                    
                     <div class="col-lg-6">
                       <label for="">Payment Details</label>
						<div class="form-group input-group">
                        	  <span class="input-group-addon alert-danger"></span>
                             
                              <textarea class="form-control" rows="5" id="detail"></textarea>
                              <!--selected='select'-->
						</div>
					</div>
                    
                    
			</div>
          
          </div>
          
          
          <!-- form row -->
          
          
          
          
          
          
           <div class="col-lg-6">
        
        
         <div class="row">
         <div id="targetLayer" style="overflow:scroll;  height:auto; max-height:200px;  overflow:auto;"></div>
         </div>  
          
            </div>    
            
            
            
            
            
             
             
         
         
         
         
          <div class="btnSmt" style="clear:both !important; padding-left:20px !important; margin-bottom:20px !important;" >
             <button type=" button" id="btnVatSubmit" onClick="justDo()"  value="Save" class="btn btn-primary">Save</button>
         </div>
         
         
         <div class="row">
      
          
					<!--<div class="col-lg-6"><br/><br/>
                       <label for="">Total Cost of order </label>
						<div class="form-group input-group">
							<span class="input-group-addon">&#8358;</span>
							
							<input type="text" class="form-control totalCostSa" id ="totalCostSa" disabled>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="">Amount *</label>
							<input type="email" class="form-control" id="" placeholder="">
						</div>
					</div>-->
				</div><!-- form row -->
          
        
         
         
         
         
         
         
         
         
         </div> 
          
         
         <div  style="clear:both"></div>
         
         
         
        
          
       
             
             
             <div class="panel panel-default">
                        <div class="panel-heading">
                            Payment History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" id="orderHistory" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>Edit</th>
                <th>value</th>
                 <th>referenceid</th>
              
                 <th>createdBy</th>
                <th>created</th>
                <th>Detail</th>
                
              
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>Edit</th>
                <th>value</th>
                 <th>referenceid</th>
               
                 <th>createdBy</th>
                <th>created</th>
                <th>Detail</th>
               
            </tr>
        </tfoot>
     </table>
                             
                        </div>
                        <!-- /.panel-body -->
                    </div>       
                    
         
          
 
       
       
        
            
          
          
          
     
            
              <script>
			 
			 /*$(function () {
                $('#datePiker').datepicker({
			inline: true,
			 dateFormat: 'yy/mm/dd'
		});
            });*/
			$("#targetLayer").on("focusin", function(){
 $("a.fancybox").fancybox({
  // fancybox API options here
  'padding': 0
 }); // fancybox
}); // on
			
			
			
	

$(document).on("click","a.fancybox", function () 
	{$('.fancybox').fancybox();})

	$(document).on("click","a.elementid", function () 
	{
		var bbb = event.target.id;
					//alert (bbb)
					$.ajax({
							type:"GET",
							url:"../resource/sessionSetVariable.php?name=paymentrefforUpdate&value="+bbb ,
							success:function(data)
								{
								refreshPayment_History ()
								paymentGetForUpdate(bbb)
								$("#datePiker").val(bbb)
								}
						   });
    			/*});*/
		
				 })
				 
				 
	$(document).ready(function() {
		//$('.fancybox').fancybox();
		 refreshPayment_History ()
		 	
		 /* $().piroBox_ext({
						piro_speed : 900,
						bg_alpha : 0.1,
						piro_scroll : true //pirobox always positioned at the center of the page
					});*/
					
					/* $.piroBox_ext({
						piro_speed :700,
						bg_alpha : 0.5,
						piro_scroll : true,
						piro_drag :false,
						piro_nav_pos: 'bottom'
					});
				 */
				
				 
				 
				 
				 
				 //piro box image popup
				
				 //handle uploads
				 
		$('#uploadForm').submit(function(e) {	
		e.preventDefault();
	var ref  = document.getElementById("datePiker").value
	var resetpass = ""
	if (ref  =="" ||  ref  =="dd/mm/yyyy" ) 
	{
		swal(swal("Error","Please Enter Date ","error"))
	
	}else
	{	//set ref
	   var refd = document.getElementById("datePiker").value
	        $.ajax({
            type:"GET",
            url:"../resource/sessionSetVariable.php?name=paymentrefforUpdate&value="+refd ,
            success:function(data){	} });
	//set upload type
	        $.ajax({
            type:"GET",
            url:"../resource/sessionSetVariable.php?name=uploadtype&value=payment" ,
            success:function(data){}});
	
	//do the upload
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
				 
				 	
		
			    /*$("a.elementid").click(
				
				function(event) 
				{
					alert (bbb)
					var bbb = event.target.id;
					alert (bbb)
					$.ajax({
							type:"GET",
							url:"../resource/sessionSetVariable.php?name=ref&value="+bbb ,
							success:function(data)
								{
								refreshOrder_line ()
								}
						   });
    			});*/
				
				
				
			
	});

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
            url:"../resource/sessionSetVariable.php?name=paymentrefforUpdate&value="+$(this).val() ,
            success:function(data)
			{
			//refreshOrder_line ()
			}
			});
})

  
  
  
  
  
  
  

 function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }





    function justDo()
   {
	var scroll = $(window).scrollTop();
	var value  = document.getElementById("value").value
	var detail  = document.getElementById("detail").value
	var ref  = document.getElementById("datePiker").value
	var resetpass = ""
	if (value  =="" || ref  =="" ||  ref  =="dd/mm/yyyy" ) 
	{
		swal("Error","Please Enter a valid input ","error")
		
		if (ref  =="" )
		{swal("Error","Please Enter Date ","error")}
	}else
	{	
	saveorUpdate(value,detail,ref);
	}
	
	
	//$("html").scrollTop(scroll);
}
  
  

  
  
  
    function saveorUpdate(value,detail,ref) {
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/paymentsave.php" ,
            data:"&detail="+detail+"&value="+value+"&ref="+ref,
            success:function(data)
			{
             	 refreshPayment_History ()

				if ((data.indexOf("Error")  !=-1) ||(data.indexOf("error")  !=-1) )
				{
   				 swal("Error","Error while saving record " +data, "error" );
    			}

			}
			
			
			
			
         });


			

		 }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function refreshPayment_History () 
  {
	  if ( $.fn.dataTable.isDataTable( '#orderHistory' ) ) 
			{
					table = $('#orderHistory').DataTable( );
					 table.destroy();
			}
			table = $('#orderHistory').DataTable( {
						 "ajax": "../resource/paymentgetSessionAjax.php",
						 "columns":[					{ data: 'Edit' },
														{ data: 'value' },
														{ data: 'referenceid' },
														{ data: 'createdBy' },
														{ data: 'created' },
														{ data: 'detail' }
									]
						
              } );
	  // alert ("hghgh")
	  /*$("a.elementid").click(function(event) {
		  alert ("hghgh")
       		var bbb = event.target.id;
		});*/
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
	
	
	////fill up values when requested
	
function paymentGetForUpdate(id) {
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/paymentGetDetail.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#detail").val(data);
				//alert (data)

			}
});



$.ajax({
            type:"POST",
            url:"../resource/paymentGetValue.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#value").val(data);
				//alert (data)
			}
});

$.ajax({
            type:"POST",
            url:"../resource/paymentGetDocument.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#targetLayer").html(data);
			  //$("#email").prop('disabled', true);
				//alert (data)
			}
});


/*$.ajax({
            type:"POST",
            url:"../resource/paymentGetRef.php" ,
            data:"id="+id,
            success:function(data)
			{
              $("#datePiker").val(data);
			  //$("#email").prop('disabled', true);
				//alert (data)
			}
});	*/
	
	
	
	 
	
	
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
    $(document).ready(function() {
		
        $('#dataTables-example').DataTable({
            responsive: true
        }); 
    }); 
    </script>
    
  
</body>

<!-- InstanceEnd --></html>
