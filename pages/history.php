<?php include_once "../resource/session.php"; ?>
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
                <a class="navbar-brand" href="index-01.html">Taloft CK Order Traking System</a>
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
                 Orders and Payment History
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
      <div class="col-lg-6" style="margin:auto">      
     <!--<div class="row">  
          
          <div class="col-lg-6">
                       <label for="">Start Date</label>
						<div class="form-group input-group">
                        	  <span class="input-group-addon alert-danger"></span>
                               <input  id="datePikerFrom" type="date"   value=""  class="form-control"> 
						</div>
					</div>

		<div class="col-lg-6">
                    <label for="">End Date</label>
						<div class="form-group input-group">
							<span class="input-group-addon alert-danger"></span>
                            <input  id="datePikerTo" type="date"   value=""  class="form-control">
                            <span class="input-group-addon alert-danger"></span>
						</div>
					</div>
                    
                     </div>--> <!-- form row -->
        <!--  <div class="btnSmt">
             <button type=" button" id="btnVatSubmit" onClick="justDo()"  value="filter" class="btn btn-primary">Filter</button>
         </div>  -->
         <br/>
         <div class="btnSmt">
            <a href="../resource/historyToExcel.php"><button type=" button" id="btnVatSubmit" onClick="justDoExport()"  value="filter" class="btn btn-primary">Export to Excel</button></a> 
         </div>            
			</div>
            
            
            
            
           <div class="col-lg-6" style="margin:auto">     
            
            <div class="panel panel-default">
                        <div class="panel-heading">
                            Order Deatail
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
      <table width="100%" class="table table-striped table-bordered table-hover" id="productTable001" cellspacing="0" width="100%">
          <thead>
            <tr>
                <!--<th>Edit</th>-->
                 <th>referenceid</th>
                <th>Order</th>
                  <th>payment</th>
                <th>Balance</th>
               
            </tr>
        </thead>
        <tfoot>
            <tr>
                <!--<th>Edit</th>-->
                 <th>referenceid</th>
                <th>Order</th>
                  <th>payment</th>
                <th>Balance</th>
               
            </tr>
        </tfoot>
     </table>
                             
                        </div>
                        <!-- /.panel-body -->
                    </div>
            
            
            </div> 
            
              <script>
			 
			 /*$(function () {
                $('#datePiker').datepicker({
			inline: true,
			 dateFormat: 'yy/mm/dd'
		});
            });*/
			
			
			
			
	



	$(document).on("click","a.elementid", function () 
	{
		var bbb = event.target.id;
					//alert (bbb)
					$.ajax({
							type:"GET",
							url:"../resource/sessionSetVariable.php?name=ref&value="+bbb ,
							success:function(data)
								{
								refreshHistory () 
								}
						   });
    			/*});*/
		
				 })
	$(document).ready(function() {
		 refreshHistory () 	
		
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
  
  
    function justDoExport()
   {
	$.ajax({
            type:"POST",
            url:"../resource/historyToExcel.php" ,
            data:"id="+id,
            success:function(data)
			{
             // $("#email").val(data);
//			  $("#email").prop('disabled', true);
				//alert (data)
			}
});
			

		 }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  function refreshHistory () 
  {
	  if ( $.fn.dataTable.isDataTable( '#productTable001' ) ) 
			{
					table = $('#productTable001').DataTable( );
					 table.destroy();
			}
			table = $('#productTable001').DataTable( {
						 "ajax": "../resource/historySessionAjax.php",
						 "columns":[
														{ data: 'referenceid' },
														{ data: 'order' },
														{ data: 'payment' },
														{ data: 'balance' }
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
    $(document).ready(function() {
		
        $('#dataTables-example').DataTable({
            responsive: true
        }); 
    }); 
    </script>
    
  
</body>

<!-- InstanceEnd --></html>
