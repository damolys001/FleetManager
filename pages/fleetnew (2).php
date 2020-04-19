<?php include_once "../resource/session.php";
include_once "../reuseable/connect_db_link.php";
 $_SESSION["uploadid"]= "";$_SESSION["ref"]= ""; 
$_SESSION["prodid"] = $_GET["prodid"];
$prodid = $_GET["prodid"];
$queryCheck = "select * from product where id = '$prodid'";
$result = mysqli_query($link,$queryCheck) or die('Errant query:  '.$query);
	
	
	if(mysqli_num_rows($result)) 
	{
	
		while($row = mysqli_fetch_assoc($result)) 
		{
			$_SESSION["productproductEdit"] = $row["product"];
			$_SESSION["productdetailEdit"] = $row["detail"];
			$_SESSION["productpriceEdit"] = $row["price"];
			$_SESSION["productpriceCompareEdit"] = $row["priceCompare"];
			$_SESSION["producttaxApplyEdit"] = $row["taxApply"];
			$_SESSION["productskuEdit"] = $row["sku"];
			$_SESSION["productBarcodeEdit"] = $row["Barcode"];
			$_SESSION["productquantityEdit"] = $row["quantity"];
			$_SESSION["productvisibilityEdit"] = $row["visibility"];
			$_SESSION["productvisibility_facebookEdit"] = $row["visibility_facebook"];
			$_SESSION["productvisibility_mobileappEdit"] = $row["visibility_mobileapp"];
			$_SESSION["productvisibility_onlineEdit"] = $row["visibility_online"];
			$_SESSION["productpublishDateEdit"] = $row["publishDate"];
			$_SESSION["productpublishTimeEdit"] = $row["publishTime"];
			$_SESSION["productbrand"] = $row["brand"];
			$_SESSION["productcategory"] = $row["category"];
			$_SESSION["producttemplateEdit"] = $row["template"];
$_SESSION["uploadid"] = $_GET["prodid"] ;
$_SESSION["uploadtype"] = 'product' ;
		
		}}



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
                    <!-- InstanceBeginEditable name="PageTitle" --> <a href="productlist.php">Products </a>/ Editing <?php echo $_SESSION["productproductEdit"]?>
          <!--</input>-->
         
          <div class="col-lg-12">
          <br/>
                <div class="row">
                  <a href="productlist.php"  class="btn btn-default"  style=" float:left ;">Cancel</a>
                  <button type="submit" id="saveProduct" class="btn btn-primary" onClick="doSave()" style=" float:right;">Save Product</button>
                </div>
                <br/>
              </div>
              
          
          <!--<span id="divdate"></span>--> 
          <!-- InstanceEndEditable -->
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            
            <div class="col-lg-12">
                    <!--<div class="panel panel-default">
                        <div id="lblmsg" class="panel-heading">
                           <i class="fa fa-gear fa-fw"></i> Please provide valid inputs
                        </div>
                        <div class="panel-body">
                            <div class="row">-->
                                <!-- InstanceBeginEditable name="MainContent" -->
            
            
















              <div class="col-lg-8">
                <div class="well ">
                  <input id="myproductid"  type="hidden" value=""  class="form-control">
                  <label > Product Title</label>
                  <div class="form-group input-group">
                    <input id="myproduct"  value="<?php echo $_SESSION["productproductEdit"]; ?>"  class="form-control">
                    <span class="input-group-addon "></span> </div>
                  <label > Description</label>
                  <div class="form-group input-group">
                    <textarea id="description"  rows="3"  class="form-control next-textarea s-none rte-plainview jqte-test" ><?php echo $_SESSION["productdetailEdit"]; ?></textarea>
                    <span class="input-group-addon "></span> </div>
                </div>
                <div class="well ">
                  <label > Images</label>
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
                    <div id="targetLayer" style="overflow:scroll;  height:auto; max-height:200px;  overflow:auto;"><?php include_once("../resource/uploadList.php")?></div>
                  </div>
                </div>
                <div class="well"> 
                  <h3>Pricing </h3>
                  <!-- <label > Variant</label>-->
                  <div class="row">
                    <div class="col-lg-6 ">
                      <label > Price</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon">&#8358;</span>
                        <input id="myprice" type="number" min="0"  value="<?php echo $_SESSION["productpriceEdit"]; ?>"  class="form-control">
                        <span class="input-group-addon">.00</span> 
                      </div>
                    </div>
                      <div class="col-lg-6 ">
                        <label > Compare at price</label>
                     <div class="form-group input-group">
                      <span class="input-group-addon">&#8358;</span>
                          <input id="mypriceCompare" type="number" min="0"  value="<?php echo $_SESSION["productpriceCompareEdit"]; ?>"  class="form-control">
                       <span class="input-group-addon">.00</span> </div>
                      </div>
                   </div>
                 <!-- row end-->
                 
                 
                  <div class="row">
                  <div class="col-lg-6 ">
                  <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="Checked" <?php echo $_SESSION["producttaxApplyEdit"]; ?> id="ckBoxTax">Charge taxes on this product
                                                </label>
                   </div>
                  </div>
                  </div>
                         <!-- row end-->
                         
                     <hr/>
                 <h3>Inventory</h3>
                 <div class="row">
                 <div class="col-lg-6 ">
                      <label > SKU (Stock Keeping Unit)</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="sku" type="text"   value="<?php echo $_SESSION["productskuEdit"]; ?>"  class="form-control">
                        <span class="input-group-addon"></span> 
                      </div>
                    </div>
                      <div class="col-lg-6 ">
                        <label > Barcode (ISBN, UPC, GTIN, etc.)</label>
                     <div class="form-group input-group">
                      <span class="input-group-addon"></span>
                          <input id="Barcode" type="text"    value="<?php echo $_SESSION["productBarcodeEdit"]; ?>"  class="form-control">
                       <span class="input-group-addon"></span> </div>
                      </div>
                 </div>    
                       
                    
                <div class="row">
                 <div class="col-lg-6 ">
                  <label > Quantity</label>
                 		<div class="form-group input-group">
                      	<span class="input-group-addon"></span>
                        <input id="quantity" type="number" min="0"  value="<?php echo $_SESSION["productquantityEdit"]; ?>"  class="form-control">
                        <span class="input-group-addon"></span> 
                      </div>
                 </div>    
                         
                </div>
                </div>
                <div class="well">
                  <label > Search engine listing preview </label>
                </div>
              </div>
              <div class="col-lg-4 well"> 
              <h4>Visibility</h4>
              <div class="well"><div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value ="checked" <?php echo $_SESSION["productvisibilityEdit"]; ?> id="visibility">Visible
                                                </label>
              </div></div>
              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"  value ="checked" <?php echo $_SESSION["productvisibility_facebookEdit"]; ?> id="facebook">Facebook
                                                </label>
              </div>
              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"  value ="checked" <?php echo $_SESSION["productvisibility_mobileappEdit"]; ?> id="mobile">Mobile App
                                                </label>
              </div>
              <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"  value ="checked" <?php echo $_SESSION["productvisibility_onlineEdit"]; ?> checked id="online">Online Store
                                                </label>
              </div>
              
              <div class="alert"> 
                Set Publish Date<br><input id="dateOfPublish" type="date" style="width:200px ; float:left"   value="<?php echo $_SESSION["productpublishDateEdit"]; ?>"  class="form-control">
                <input id="timeOfPublish" type="time"  style="width:100px; float:left" value="<?php echo $_SESSION["productpublishTimeEdit"]; ?>"  class="form-control">
              </div>
              </div>
              <div class="col-lg-4 well"> 
                    <h4>Organization</h4>
                    
                       <div class="col-lg-12 ">
                        <label >Bbrand</label>
                         <select id ="brand" class="form-control">
                                                <?php include_once '../resource/brandGetAll.php'; ?>
                          </select>
                      </div>
                       <div class="col-lg-12 ">
                        <label >Category</label>
                        <select id ="Category" class="form-control">
                                                    <?php include_once '../resource/categoryGetAll.php'; ?>
                          </select>
                      </div>
                    
              </div>
              
              
                <div class="col-lg-4 well"> 
                    <h4>Theme Themplate</h4>
                    
                       <div class="col-lg-12 ">
                        <label >Template Surfix</label>
                         <select id ="template"  class="form-control">
   <option value="product" <?php if( $_SESSION["producttemplateEdit"]=="Product") echo "Selected"; ?>>Product</option>
   <option value="pre-order" <?php if( $_SESSION["producttemplateEdit"]=="Pre-Order") echo $_SESSION["producttemplateEdit"]." "."Selected"; ?>>Pre-Order</option>
                                                
                          </select>
                      </div>
                      
                    
              </div>
              <hr/>
              
              
              
         <!-- Text Edito Pludins -->          
     <link type="text/css" rel="stylesheet" href="../vendor/jQueryTE/jquery-te-1.4.0.css">         
     <script type="text/javascript" src="../vendor/jQueryTE/jquery-te-1.4.0.min.js" charset="utf-8"></script>    
     
          
            <script>
			$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
		
			
			  //alert("cxmcn")
			 
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
			
//alert ("sertting")			
			
	

$(document).on("click","a.fancybox", function () 
	{$('.fancybox').fancybox();})


 
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
    }, function() {
        $.ajax(
                {
                    type: "get",
                    url:"../resource/uploadDelete.php?DelId=0" ,
							success:function(data){
								$("#targetLayer").html(data)
                    }
                }
        )
      .done(function(data) {
        swal("Deleted!", "Your file was successfully deleted!", "success");
       // $('#orders-history').load(document.URL +  ' #orders-history');
      })
      .error(function(data) {
        swal("Oops", "We couldn't connect to the server!", "error");
      });
    });
		
	 })	
		
		
//Handel Picture Delete Ends



	$(document).on("click","a.elementid", function () 
	{
		var bbb = event.target.id;
		SetVariableServerSession ('paymentrefforUpdate', bbb)
					//alert (bbb)
					
    			 })
				 
				 
	$(document).ready(function() {
		//alert ("sddd")
		/*$('#saveProduct').prop('disabled', true);
		$('#btnSubmit').prop('disabled', true);*/
		
		$('#myproduct').change(function(){
			
    $('#saveProduct').prop('disabled', false);
		$('#btnSubmit').prop('disabled', false);
})
		//$('.fancybox').fancybox();
		 //refreshPayment_History ()
		 	
		 
				 
		$('#uploadForm').submit(function(e) {	
		
		e.preventDefault();
	var ref  = document.getElementById("myproductid").value
	var myproduct  = document.getElementById("myproduct").value 
	
	//var ref  = document.getElementById("datePiker").value
	var resetpass = ""
	if (myproduct  ==""  )  //||  ref  =="dd/mm/yyyy"
	{
		swal(swal("Error","Please Enter product name ","error"))
	
	}else
	{	//set ref
	 	 
	 var productid = $('#myproductid').val();
		//alert (myproductid)
		var productname = $('#myproduct').val();
	//alert (productname)
		var productDesc = $('#description').val();
	//alert (productDesc)		 
	        	var myp = "../resource/productTitleDescSave.php?name=" + productname + "&desc="+productDesc;
		       $.ajax({
            type:"GET",
            url: myp  ,
            success:function(data){	} });
			
	//set upload type
	        /*$.ajax({
            type:"GET",
            url:"../resource/sessionSetVariable.php?name=uploadtype&value=payment" ,
            success:function(data){}});*/
	
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
				 
				 	
		
			   
				
			
	});

/*$('a').live('click',function() {
    // runs your code when any "a.link" is clicked
	alert ("jfksk")
});


$('#orderHistory').delegate('a', 'click', function() {
	alert ("fhd")
    // runs your code when an "a.link" inside of "some_container" is clicked
});*/
  

 function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }





    function doSave()
   {
	 
	var scroll = $(window).scrollTop();
	var myproduct = $("#myproduct").val(); 
	var description = $("#description").val();
	
	var description = description.replace(/(&quot\;)/g,"\"");
	//alert (description)
    var myprice = $("#myprice").val(); 
	var mypriceCompare = $("#mypriceCompare").val(); 
	
    var sku = $("#sku").val(); 
	var Barcode = $("#Barcode").val();  
	var quantity  = $("#quantity").val();
    
	var dateOfPublish  = $("#dateOfPublish").val();
	var timeOfPublish  = $("#timeOfPublish").val();
    var brand  = $("#brand").val();
	var Category  = $("#Category").val();
    var template  = $("#template").val();
	var producttype = $("#producttype").val();
	 
	
	var ckBoxTax = "" 
	if(document.getElementById('ckBoxTax').checked) {
    ckBoxTax =  $("#ckBoxTax").val();} 
	 
	var visibility = "" 
	if(document.getElementById('visibility').checked) {
    visibility =  $("#visibility").val();} 
	
	var facebook = "" 
	if(document.getElementById('facebook').checked) {
    facebook =  $("#facebook").val();} 
	
	var mobile = "" 
	if(document.getElementById('mobile').checked) {
    mobile =  $("#mobile").val();} 

	var online  = "" 
	if(document.getElementById('online').checked) {
    online =  $("#online").val();} 
		//alert ("sertting")
	if (myproduct  =="" ||  myprice == "") 
	{
		swal("Error","Please Enter a provide product name and price","error")
		
		/*if (myproduct  =="" )
		{swal("Error","Please Enter Date ","error")}*/
	}else
	{	
	saveorUpdate(myproduct,description,myprice,mypriceCompare,ckBoxTax,sku,Barcode,quantity,visibility,facebook,mobile,online,dateOfPublish,timeOfPublish,brand,Category,template,producttype);
	keeplog("ProductSetup",myproduct =" was created")
	}
	
	
	//$("html").scrollTop(scroll);
}
  
  

  
  
  
function saveorUpdate(myproduct,description,myprice,mypriceCompare,ckBoxTax,sku,Barcode,quantity,visibility,facebook,mobile,online,dateOfPublish,timeOfPublish,brand,Category,template,producttype) {
	//alert (id)
	
	$.ajax({
            type:"POST",
            url:"../resource/productsave.php" ,
            data:"&myproduct="+myproduct+"&description="+description+"&myprice="+myprice+"&mypriceCompare="+mypriceCompare+"&ckBoxTax="+ckBoxTax+"&sku="+sku+"&Barcode="+Barcode+"&quantity="+quantity+"&visibility="+visibility+"&facebook="+facebook+"&mobile="+mobile+"&online="+online+"&dateOfPublish="+dateOfPublish+"&timeOfPublish="+timeOfPublish+"&brand="+brand+"&Category="+Category+"&template="+template+"&producttype="+producttype,
            success:function(data)
			{
             	 //refreshPayment_History ()
                 
				if ((data.indexOf("Error")  > 0) ||(data.indexOf("error")  > 0) )
				{
   				 swal("Error", data, "error" ); //Error while saving record.
    			}
					else 
				{
					swal("Saved","Product was saved " +myproduct, "success" );
				}

			}
			
			
			
			
         });


			

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
	 function uploadDel () {$.ajax({
							type:"GET",
							url:"../resource/uploadDelete.php?DelId=0" ,
							success:function(data)
								{
									$("#targetLayer").html(data) //= data
								}
						   });	}
	
	////fill up values when requested
	

		 



</script> 
              <!-- InstanceEndEditable -->
                           <!-- </div>
                            <!-- /.row (nested) --
                        </div>
                        <!-- /.panel-body --
                    </div>-->
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
