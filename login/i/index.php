<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" ng-app="payments">
<head runat="server">
    
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ensure</title>

<link rel="stylesheet" media="screen" type="text/css" href='wonderlandcollective/css/style.css' />


<link rel="shortcut icon" href='wonderlandcollective/Ensure_Favicon.png'/>


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  
  <script src="wonderlandcollective/js/html5.js"></script>
<![endif]-->
<script type='text/javascript' src='wonderlandcollective/js/jquery.jsver=1.11.3.js'></script>


    <!-- sweet alert-->
        <link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    <!---->
</head>
<body ng-controller="MainCtrl as ctrl" class="page page-id-277 page-template page-template-page-selfservice page-template-page-selfservice-php customexternalpage">
    
	
	<div id="header" class="container">
		<a href='http://ensure.com.ng/' id="logo" class=" center-block  center-block"><svg xmlns="http://www.w3.org/2000/svg" width="188.8" height="96.4" viewBox="0 0 188.8 96.4"><path fill="#3FAB3C" d="M139.9 17.5L114.9 0l-3.8 3.6L137.3 22l25.1 17.5 3.7-3.6-26.2-18.4m-38-5.1l26.2 18.4 3.8-3.6-26.2-18.4M93 21.1l26.2 18.3 3.7-3.6-26.2-18.3m48.7-5.2l26.2 18.4 3.7-3.6-26.2-18.4m9-8.6l-3.8 3.5L180.5 22l3.8-3.6"/><path fill="#2B54A0" d="M180.6 63.9v5.5h-.7v-5.5h-1.8v-.7h4.3v.7m6.4 5.5h-.7v-5.2l-1.7 5.2h-.8l-1.7-5.2v5.2h-.7v-6.2h1.1l1.7 5.2 1.7-5.2h1.1M14.9 96.4c-2.2 0-4.2-.4-6.1-1.1-1.8-.8-3.4-1.9-4.7-3.3-1.3-1.5-2.3-3.2-3.1-5.3-.6-2.2-1-4.6-1-7.3 0-2.6.4-5 1.1-7.1.7-2.1 1.6-3.8 2.9-5.3 1.3-1.5 2.8-2.6 4.5-3.4 1.8-.8 3.7-1.2 5.8-1.2 2.2 0 4.2.4 5.9 1.2 1.8.8 3.3 1.9 4.5 3.3 1.2 1.5 2.2 3.2 2.9 5.3.7 2.1 1 4.5 1 7.1v1.4h-23c.1 1.9.4 3.5.9 4.9.5 1.4 1.2 2.5 2 3.4.8.9 1.8 1.6 2.8 2 1.1.5 2.2.7 3.5.7.9 0 1.8-.1 2.7-.4.9-.3 1.7-.6 2.4-1.1.7-.5 1.3-1.1 1.7-1.8.4-.7.7-1.6.7-2.5H28c-.2 1.7-.7 3.2-1.5 4.5-.8 1.3-1.7 2.4-2.9 3.3-1.2.9-2.5 1.6-4 2-1.3.4-3 .7-4.7.7m8-20.1c-.4-3.1-1.4-5.4-3-6.9-1.5-1.6-3.4-2.3-5.6-2.3-1.1 0-2.1.2-3.1.6-1 .4-1.8 1-2.6 1.7-.6.7-1.3 1.6-1.8 2.8-.5 1.2-.9 2.5-1.1 4.1h17.2zm17.3-8.9c1.3-1.6 2.8-2.9 4.3-3.7 1.5-.8 3.1-1.2 4.8-1.2 6.9 0 10.3 4 10.3 12v21.2h-5.5v-21c0-1.3-.1-2.5-.3-3.4-.2-.9-.5-1.7-1-2.3-.5-.6-1-1-1.8-1.3-.7-.3-1.6-.4-2.6-.4-2.8 0-5.5 1.7-8.3 5.1v23.2h-5.4V63.3h5.4v4.1zm38.2 29c-8.3 0-12.7-3.5-13.1-10.4h5.5c0 3.9 2.6 5.9 7.6 5.9 1.1 0 2.1-.1 3-.4.9-.3 1.6-.6 2.2-1.1.6-.5 1-1 1.3-1.6.3-.6.4-1.3.4-2 0-.8-.1-1.4-.3-1.9-.2-.5-.7-.9-1.3-1.3-.6-.4-1.5-.7-2.7-1.1-1.1-.3-2.7-.8-4.5-1.3-1.8-.5-3.4-.9-4.7-1.4-1.3-.5-2.4-1-3.2-1.7-.8-.7-1.5-1.5-1.9-2.5-.4-1-.6-2.2-.6-3.8 0-1.3.3-2.6.8-3.7s1.3-2.1 2.3-3c1-.8 2.2-1.5 3.6-2s3-.7 4.7-.7c8 0 12.1 3 12.2 9.1h-5.4c-.2-3-2.3-4.5-6.5-4.5-.9 0-1.8.1-2.5.3-.8.2-1.5.5-2 .8-.6.4-1 .8-1.3 1.3-.3.5-.5 1.1-.5 1.8 0 .6.1 1.1.2 1.6.1.4.5.8 1.1 1.1.6.3 1.4.7 2.5 1 1.1.3 2.6.8 4.5 1.3s3.5 1 4.8 1.5c1.4.5 2.5 1.1 3.4 1.8.9.7 1.6 1.6 2 2.6.4 1 .7 2.3.7 3.9 0 1.5-.3 2.8-.9 4.1-.6 1.2-1.4 2.3-2.4 3.3-1.1.9-2.3 1.6-3.8 2.2-1.6.5-3.3.8-5.2.8m38-4.9c-2.7 3.2-5.8 4.9-9.2 4.9-6.9 0-10.3-4-10.3-11.9V63.3h5.5v20.9c0 1.4.1 2.5.3 3.4.2.9.5 1.7 1 2.3.5.6 1 1 1.8 1.3.7.3 1.6.4 2.6.4 3 0 5.8-1.7 8.4-5.2V63.3h5.4v32.3h-5.4v-4.1zm29.2-23c-.8-.3-1.9-.4-3.3-.4s-2.7.4-3.9 1.1c-1.2.8-2.3 1.9-3.3 3.5v22.9h-5.4V63.3h5.4v4.5c2.3-3.5 5-5.3 8-5.3.7 0 1.5.1 2.5.3v5.7zm16.7 27.9c-2.2 0-4.2-.4-6.1-1.1-1.8-.8-3.4-1.9-4.7-3.3-1.3-1.5-2.3-3.2-3-5.3-.7-2.1-1.1-4.5-1.1-7.2 0-2.6.4-5 1.1-7.1.7-2.1 1.7-3.9 2.9-5.3 1.3-1.5 2.8-2.6 4.5-3.4 1.8-.8 3.7-1.2 5.8-1.2 2.2 0 4.2.4 5.9 1.2 1.8.8 3.3 1.9 4.5 3.3 1.2 1.5 2.2 3.2 2.9 5.3.7 2.1 1 4.5 1 7.1v1.4h-23c.1 1.9.4 3.5.9 4.9.5 1.4 1.2 2.5 2 3.4.8.9 1.8 1.6 2.8 2 1.1.5 2.2.7 3.5.7.9 0 1.8-.1 2.7-.4.9-.3 1.7-.6 2.4-1.1.7-.5 1.3-1.1 1.7-1.8.4-.7.7-1.6.7-2.5h5.7c-.2 1.7-.7 3.2-1.5 4.5-.8 1.3-1.7 2.4-2.9 3.3-1.2.9-2.5 1.6-4 2-1.3.3-2.9.6-4.7.6m8-20.1c-.4-3.1-1.4-5.4-3-6.9-1.5-1.6-3.4-2.3-5.6-2.3-1.1 0-2.1.2-3.1.6-1 .4-1.8 1-2.6 1.7-.7.8-1.4 1.7-1.9 2.9s-.9 2.5-1.1 4.1h17.3z"/></svg></a>

       
		<a href="javascript:void(0)" id="menutoggle" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewBox="0 0 512 512"><path id="menu-icon" d="M462 163.5H50v-65h412v65zm0 60H50v65h412v-65zm0 125H50v65h412v-65z"/></svg>MENU</a>

		<ul id="nav" class="pull-right">
       	<!--
            menu commented out 
	        <li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29"><a href="http://dev.wonderlandcollective.co.za/ensure/claims/">Claims</a></li>
			<li id="menu-item-282" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-277 current_page_item menu-item-282"><a href="http://dev.wonderlandcollective.co.za/ensure/self-service/">Self Service</a></li>
			<li id="menu-item-30" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-30"><a href="http://dev.wonderlandcollective.co.za/ensure/contact/">Contact</a></li> 
        -->
        </ul>
		
		<!--<div class="claim_number">Need to report a claim? <strong><a href="tel:08000367873">08000367873</a></strong></div> -->
	</div>
    <!-- END OF HEADER -->
 


        <!-- START OF PAGE IMAGE HEADER -->
	<!--<div id="builder">
        
		<div class="container custompageheader build-fwheader text-center" style=" background-image:url(images/selfserviceheader.jpg)" data-bg="images/selfserviceheader.jpg">
			<h1> <asp:ContentPlaceHolder id="ContentPlaceHolder2" runat="server"> </asp:ContentPlaceHolder></h1>
			
		</div>
	</div>-->
	<!-- END OF PAGE IMAGE HEADER -->



<div id="builder" class="">

<div id="underlay"></div>


	
	<div id="normalpage" class="container blogarchive ">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1><strong></strong></h1>
			</div>
		</div>
         <div>
        <?php  
        
/*
     if((isset($_GET['action']) && $_GET['action'] !== '')
         && (isset($_GET['target']) && $_GET['target'] !== '')
     )
     {
     	switch($_GET['action'])
         {
     	    case "message":
             {
     			//$msg =
                echo json_decode(base64_decode($_GET['target']), true)['message'];
     	        break;
     	    }
          }
      }
         
     */
     
     //message
     if((isset($_REQUEST['message']) ) == true)
     {
        echo json_decode(base64_decode($_GET['target']), true)['message'];
        
     }
     
         ?>
        
        </div>
        
<!--<form name="paymentForm" method="post" novalidate action="https://sandbox.interswitchng.com/collections/w/pay">
  <div class="row">
        	
			<div class="col-md-8  col-md-offset-2   shadow " >
				<div class="col-md-6 col-md-offset-3" >
					<div class="alert ">{{ctrl.errorMsg}}</div>
				</div>
                <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Policy No:</strong></label>
                     <div class="form-group input-group">
                     
                     <input type="text" ng-model="ctrl.policy"  placeholder="Enter Policy Number" value="{{ctrl.policy}}"  class="form-control">
                     <span class="input-group-addon alert-danger"></span>
                    </div>
                    <span class="btn btn-success" ng-click="ctrl.validate()" ng-disabled="paymentForm.$invalid" >Validate</span>
               </div> 
               
               
                <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Account Name:</strong></label>
                     <div class="form-group input-group">
                     
                     <input type="text"   ng-model="ctrl.acct_name" readonly value="{{ctrl.acct_name}}"  class="form-control">
                     <span class="input-group-addon "></span>
                    </div>
                    
               </div>
               
               
               <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Email Address:</strong></label>
                     <div class="form-group input-group">
                     
                     <input type="text"   ng-model="ctrl.acct_email" readonly value="{{ctrl.acct_email}}"  class="form-control">
                     <span class="input-group-addon "></span>
                    </div>
                    
               </div>
               
               
               <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Phone Number:</strong></label>
                     <div class="form-group input-group">
                     
                     <input type="text"   ng-model="ctrl.acct_phone" readonly value="{{ctrl.acct_phone}}"  class="form-control">
                     <span class="input-group-addon "></span>
                    </div>
                    
               </div>
               
               
               
               <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Payment Reference:</strong></label>
                     <div class="form-group input-group">
                     
                     <input type="text"   ng-model="ctrl.pay_ref" readonly value="{{ctrl.pay_ref}}"  class="form-control">
                     <span class="input-group-addon "></span>
                    </div>
                    
               </div>
                
                <div class="col-md-6 col-md-offset-3" >
                	<label > <strong>Payment Amount:</strong></label>
                   <strong><span class="red">*</span> Mobile Number  : </strong>
                     <div class="form-group input-group">
                     
                     <input type="text" ng-change="ctrl.updateVals()"  ng-model="ctrl.pay_ammt" ng-readonly="ctrl.editAmmt" value="{{ctrl.pay_ammt}}"   class="form-control">
                     <span class="input-group-addon "></span>
                    </div>
                    
               </div>
               <div class="col-md-6 col-md-offset-3" >
                	 <button type="button" ng-click="ctrl.updateVals()" ng-disabled="ctrl.disableSub" class="btn btn-primary">Update</button>
            <button type="submit" ng-disabled="ctrl.disableSub" class="btn btn-success">Submit</button>
                    
               </div>
             
            </div>
           
        </div>
        
  </form>    -->  
  </div>

</div>


<!--$http.get("https://damola.staging.ggh.uk/portal/p/lookup/"+btoa(JSON.stringify(-->
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    

	<div id="footer" class="container">
		<div id="newsletterrow" class="row">
			<form action="https://ensure.us1.list-manage.com/subscribe/post?u=60a768e9244bdfa7c306ef724&amp;id=2cc52a93f7" method="post" id="newsletter" target="_blank" novalidate>
				<label for="email">SIGN UP TO OUR NEWSLETTER:</label>
				<input type="email" id="email" placeholder="Enter your email address">
				<input type="submit" value="Sign Up">
			</form>
		</div>

		<div class="row">
			<div class="col-lg-7 clearfix">
				<span class="pull-left footerlogo"><svg xmlns="http://www.w3.org/2000/svg" width="188.8" height="96.4" viewBox="0 0 188.8 96.4">
    <path fill="#3FAB3C" d="M139.9 17.5L114.9 0l-3.8 3.6L137.3 22l25.1 17.5 3.7-3.6-26.2-18.4m-38-5.1l26.2 18.4 3.8-3.6-26.2-18.4M93 21.1l26.2 18.3 3.7-3.6-26.2-18.3m48.7-5.2l26.2 18.4 3.7-3.6-26.2-18.4m9-8.6l-3.8 3.5L180.5 22l3.8-3.6"></path>
    <path fill="#2B54A0" d="M180.6 63.9v5.5h-.7v-5.5h-1.8v-.7h4.3v.7m6.4 5.5h-.7v-5.2l-1.7 5.2h-.8l-1.7-5.2v5.2h-.7v-6.2h1.1l1.7 5.2 1.7-5.2h1.1M14.9 96.4c-2.2 0-4.2-.4-6.1-1.1-1.8-.8-3.4-1.9-4.7-3.3-1.3-1.5-2.3-3.2-3.1-5.3-.6-2.2-1-4.6-1-7.3 0-2.6.4-5 1.1-7.1.7-2.1 1.6-3.8 2.9-5.3 1.3-1.5 2.8-2.6 4.5-3.4 1.8-.8 3.7-1.2 5.8-1.2 2.2 0 4.2.4 5.9 1.2 1.8.8 3.3 1.9 4.5 3.3 1.2 1.5 2.2 3.2 2.9 5.3.7 2.1 1 4.5 1 7.1v1.4h-23c.1 1.9.4 3.5.9 4.9.5 1.4 1.2 2.5 2 3.4.8.9 1.8 1.6 2.8 2 1.1.5 2.2.7 3.5.7.9 0 1.8-.1 2.7-.4.9-.3 1.7-.6 2.4-1.1.7-.5 1.3-1.1 1.7-1.8.4-.7.7-1.6.7-2.5H28c-.2 1.7-.7 3.2-1.5 4.5-.8 1.3-1.7 2.4-2.9 3.3-1.2.9-2.5 1.6-4 2-1.3.4-3 .7-4.7.7m8-20.1c-.4-3.1-1.4-5.4-3-6.9-1.5-1.6-3.4-2.3-5.6-2.3-1.1 0-2.1.2-3.1.6-1 .4-1.8 1-2.6 1.7-.6.7-1.3 1.6-1.8 2.8-.5 1.2-.9 2.5-1.1 4.1h17.2zm17.3-8.9c1.3-1.6 2.8-2.9 4.3-3.7 1.5-.8 3.1-1.2 4.8-1.2 6.9 0 10.3 4 10.3 12v21.2h-5.5v-21c0-1.3-.1-2.5-.3-3.4-.2-.9-.5-1.7-1-2.3-.5-.6-1-1-1.8-1.3-.7-.3-1.6-.4-2.6-.4-2.8 0-5.5 1.7-8.3 5.1v23.2h-5.4V63.3h5.4v4.1zm38.2 29c-8.3 0-12.7-3.5-13.1-10.4h5.5c0 3.9 2.6 5.9 7.6 5.9 1.1 0 2.1-.1 3-.4.9-.3 1.6-.6 2.2-1.1.6-.5 1-1 1.3-1.6.3-.6.4-1.3.4-2 0-.8-.1-1.4-.3-1.9-.2-.5-.7-.9-1.3-1.3-.6-.4-1.5-.7-2.7-1.1-1.1-.3-2.7-.8-4.5-1.3-1.8-.5-3.4-.9-4.7-1.4-1.3-.5-2.4-1-3.2-1.7-.8-.7-1.5-1.5-1.9-2.5-.4-1-.6-2.2-.6-3.8 0-1.3.3-2.6.8-3.7s1.3-2.1 2.3-3c1-.8 2.2-1.5 3.6-2s3-.7 4.7-.7c8 0 12.1 3 12.2 9.1h-5.4c-.2-3-2.3-4.5-6.5-4.5-.9 0-1.8.1-2.5.3-.8.2-1.5.5-2 .8-.6.4-1 .8-1.3 1.3-.3.5-.5 1.1-.5 1.8 0 .6.1 1.1.2 1.6.1.4.5.8 1.1 1.1.6.3 1.4.7 2.5 1 1.1.3 2.6.8 4.5 1.3s3.5 1 4.8 1.5c1.4.5 2.5 1.1 3.4 1.8.9.7 1.6 1.6 2 2.6.4 1 .7 2.3.7 3.9 0 1.5-.3 2.8-.9 4.1-.6 1.2-1.4 2.3-2.4 3.3-1.1.9-2.3 1.6-3.8 2.2-1.6.5-3.3.8-5.2.8m38-4.9c-2.7 3.2-5.8 4.9-9.2 4.9-6.9 0-10.3-4-10.3-11.9V63.3h5.5v20.9c0 1.4.1 2.5.3 3.4.2.9.5 1.7 1 2.3.5.6 1 1 1.8 1.3.7.3 1.6.4 2.6.4 3 0 5.8-1.7 8.4-5.2V63.3h5.4v32.3h-5.4v-4.1zm29.2-23c-.8-.3-1.9-.4-3.3-.4s-2.7.4-3.9 1.1c-1.2.8-2.3 1.9-3.3 3.5v22.9h-5.4V63.3h5.4v4.5c2.3-3.5 5-5.3 8-5.3.7 0 1.5.1 2.5.3v5.7zm16.7 27.9c-2.2 0-4.2-.4-6.1-1.1-1.8-.8-3.4-1.9-4.7-3.3-1.3-1.5-2.3-3.2-3-5.3-.7-2.1-1.1-4.5-1.1-7.2 0-2.6.4-5 1.1-7.1.7-2.1 1.7-3.9 2.9-5.3 1.3-1.5 2.8-2.6 4.5-3.4 1.8-.8 3.7-1.2 5.8-1.2 2.2 0 4.2.4 5.9 1.2 1.8.8 3.3 1.9 4.5 3.3 1.2 1.5 2.2 3.2 2.9 5.3.7 2.1 1 4.5 1 7.1v1.4h-23c.1 1.9.4 3.5.9 4.9.5 1.4 1.2 2.5 2 3.4.8.9 1.8 1.6 2.8 2 1.1.5 2.2.7 3.5.7.9 0 1.8-.1 2.7-.4.9-.3 1.7-.6 2.4-1.1.7-.5 1.3-1.1 1.7-1.8.4-.7.7-1.6.7-2.5h5.7c-.2 1.7-.7 3.2-1.5 4.5-.8 1.3-1.7 2.4-2.9 3.3-1.2.9-2.5 1.6-4 2-1.3.3-2.9.6-4.7.6m8-20.1c-.4-3.1-1.4-5.4-3-6.9-1.5-1.6-3.4-2.3-5.6-2.3-1.1 0-2.1.2-3.1.6-1 .4-1.8 1-2.6 1.7-.7.8-1.4 1.7-1.9 2.9s-.9 2.5-1.1 4.1h17.3z"></path>
</svg>
</span>
				<ul id="nav1" class="pull-left linklist list-unstyled"><li id="menu-item-248" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-248"><a href="http://dev.wonderlandcollective.co.za/ensure/product/motor-protection-plan/">Motor</a></li><li id="menu-item-249" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-249"><a href="http://dev.wonderlandcollective.co.za/ensure/product/education-protection-plan/">Education</a></li><li id="menu-item-250" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-250"><a href="http://dev.wonderlandcollective.co.za/ensure/product/home-protection-plan/">Home</a></li></ul>				<ul id="nav2" class="pull-left linklist list-unstyled"><li id="menu-item-251" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-251"><a href="http://dev.wonderlandcollective.co.za/ensure/product/savings-protection-plan/">Savings</a></li><li id="menu-item-252" class="menu-item menu-item-type-post_type menu-item-object-product menu-item-252"><a href="http://dev.wonderlandcollective.co.za/ensure/product/life-protection-plan/">Life</a></li><li id="menu-item-253" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-253"><a href="http://dev.wonderlandcollective.co.za/ensure/corporate-products/">Corporate</a></li></ul>				<ul id="nav3" class="pull-left linklist list-unstyled"><li id="menu-item-255" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-255"><a href="http://dev.wonderlandcollective.co.za/ensure/claims/">Claims</a></li><li id="menu-item-256" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-256"><a href="http://dev.wonderlandcollective.co.za/ensure/faqs/">FAQs</a></li><li id="menu-item-254" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-254"><a href="http://dev.wonderlandcollective.co.za/ensure/contact/">Contact</a></li></ul>			</div>

			<div class="col-lg-5">
				<div class="claim_number"><span>Need to report a claim?</span> <strong>HOTLINE: <a href="tel:08000367873">08000367873</a></strong></div>
				<div class="social_links pull-right">
					<a href="http://www.linkedin.com/company/ensure-nigeria"><svg xmlns="http://www.w3.org/2000/svg" width="412" height="412" viewBox="0 0 412 412">
    <path id="linkedin-circle-icon_1_" d="M206 0C92.2 0 0 92.2 0 206s92.2 206 206 206 206-92.2 206-206S319.8 0 206 0zm-55 305.6h-45.2V159.5H151v146.1zm-22.8-165.3c-14.8 0-26.7-12.1-26.7-27s12-27 26.7-27c14.8 0 26.7 12.1 26.7 27 .1 15-11.9 27-26.7 27zm192.3 165.3h-45v-76.7s-8-32.8-24.6-32.8c-18.1 0-27.6 12.2-27.6 32.8v76.7H180V159.5h43.4v19.7s13-24.1 44-24.1 53.2 18.9 53.2 58.1c-.1 39-.1 92.4-.1 92.4z"></path>
</svg>
</a>					<a href="http://www.facebook.com/EnsureNigeria"><svg xmlns="http://www.w3.org/2000/svg" width="412" height="412" viewBox="0 0 412 412">
    <path id="facebook-circle-icon_1_" d="M206 0C92.2 0 0 92.2 0 206s92.2 206 206 206 206-92.2 206-206S319.8 0 206 0zm61 121.2h-28.8c-10.2 0-12.3 4.2-12.3 14.7v25.4H267l-4 44.6h-37.1v133.2h-53.2V206.4H145v-45.2h27.7v-35.6c0-33.4 17.8-50.8 57.4-50.8h36.8l.1 46.4z"></path>
</svg>
</a>					<a href="http://twitter.com/ensureng"><svg xmlns="http://www.w3.org/2000/svg" width="412" height="412" viewBox="0 0 412 412">
    <path id="twitter-4-icon_1_" d="M206 0C92.2 0 0 92.2 0 206s92.2 206 206 206 206-92.2 206-206S319.8 0 206 0zm103.6 170.5c3 67.2-47.1 142.1-135.8 142.1-27 0-52.1-7.9-73.2-21.5 25.3 3 50.6-4 70.7-19.8-20.9-.4-38.6-14.2-44.6-33.2 7.5 1.4 14.9 1 21.6-.8-23-4.6-38.8-25.3-38.3-47.5 6.4 3.6 13.8 5.7 21.6 6-21.3-14.2-27.3-42.3-14.8-63.8 23.6 28.9 58.8 47.9 98.5 49.9-7-29.9 15.7-58.7 46.5-58.7 13.7 0 26.2 5.8 34.9 15.1 10.9-2.1 21.1-6.1 30.3-11.6-3.6 11.2-11.1 20.5-21 26.4 9.7-1.2 18.9-3.7 27.4-7.5-6.4 9.8-14.5 18.2-23.8 24.9z"></path>
</svg>
</a>				</div>
			</div>
		</div>
	</div>

	<div id="corp" class="container">
		<div class="row">
    
&copy; Ensure Insurance Plc. 2016. &nbsp;&nbsp;Authorised and Regulated by the National Insurance Commission RIC N0. - 044.
			<!--© Ensure Insurance Plc. 2016. Designed and developed by <a href="http://www.wonderlandcollective.co.za/" target="_blank">Wonderland Collective</a>.-->
		</div>
	</div>


<!--
not avalable any more on the server
<script type="text/javascript" src="./Self_Service_files/site.js" async="" onload=""></script>
<script type="text/javascript" src="./Self_Service_files/wp-embed.min.js" async="" onload=""></script>-->



<link rel="stylesheet" media="screen" type="text/css" href='assets/style.css' />
<link rel="stylesheet" media="screen" type="text/css" href='css/self-service-style.css' />
</body>
</html>