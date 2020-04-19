<?php include_once "../resource/session.php"; 
  include_once "../reuseable/connect_db_link.php";  
    
if (!(isset ($_SESSION["fromGooglePage"])))
    {
    //redirect to login screen
    header("Location: login.html");
    }

$myAuthEmail ="";
if (isset ($_SESSION["Gmail"])) {$myAuthEmail =$_SESSION["Gmail"]; }
  ///Check if user account exits and redirect to dashboad    
        $resultUser = $conn->query("SELECT  * FROM user WHERE email='".$myAuthEmail."'") ; //, COUNT(email) as usercount
    	if(mysqli_num_rows($resultUser)) 
	{
        while($row = mysqli_fetch_assoc($resultUser)) 
		{			
			if ($row["status"] == "0") 
            {
                $userLoginCode="0";header("Location: ../pages/userNotAllow.php");
            } 
            else
			{
				
				$_SESSION["email"]=$row["email"];
				$_SESSION["name"]=$row["namef"]. " " . $row["namel"];
				$_SESSION["role"]=$row["role"];
				$_SESSION["userid"]=$row["id"];
				$userLoginCode="1";
                if ($row["firstTime"] != "0"){
                header("Location: ../pages/index.php");
                    }
                 //echo "<script >window.location='../pages/index.php'</scrip>";
			}
		}
    }




?>
<!doctype html >
<html xmlns="http://www.w3.org/1999/xhtml" ng-app="userCreate">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Untitled Document</title>


    <!-- TemplateEndEditable -->
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
 
 
   
 

<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../vendor/fancyBox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../vendor/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../vendor/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>

</head>

<body ng-controller="MainCtrl as ctrl">

<!--$_SESSION["familyName"] = $user->familyName;
		$_SESSION["givenName"] = $user->givenName;
		$_SESSION["picture"] = $user->picture;
		$_SESSION["Gmail"] = $user->email;
		$_SESSION["gender"] = $user->gender;-->

<div style="width:90%; max-width:800px; margin:auto; margin-top:20px;">
<h2 style="margin:auto; text-align:center"><img src="images/Logo.png" width="200" /> Ensure Fleet App</h2>
<div class="col-lg-12 well" role="form">
<h4 style="margin:auto; text-align:center" class="alert alert-info"> User Account Creation</h4>
<div class="col-lg-6"><img src='<?php echo $_SESSION["picture"];?>'  style="width:90%; margin:auto; border-radius:50%;"/></div>

<div class="col-lg-6">
<label class="control-label" for="fname">First Name</label>
<input type="text" class="form-control" ng-model="ctrl.last_name" value="{{ctrl.last_name}}" id="fname">
</div>



<div class="col-lg-6">
<label class="control-label" for="lname">Last Name</label>
<input type="text" class="form-control"  value="<?php echo $_SESSION["givenName"] ;?>" id="lname">
</div>
<row></row>
<!-- row end-->

<div class="col-lg-6">
<label class="control-label" for="email">Email Address</label>
<input type="email" class="form-control"  value="<?php echo $_SESSION["Gmail"] ;?>" id="email" disabled>
</div>
    
<div class="col-lg-6">
<label class="control-label" for="department">Department</label>
 <select id="department" class="form-control">
                             <option></option>
                             <?php include_once '../resource/departmentGetAll.php'; ?>
                             </select> 
</div>
    
<div class="col-lg-6">
<label class="control-label" for="gender">Gender</label>
     <select id="gender" class="form-control">
                             <option></option>
                             <option <?php if (strtolower($_SESSION["gender"])=="male") echo "selected" ;?> value="male">Male</option>
                             <option <?php if (strtolower($_SESSION["gender"])=="female") echo "selected" ;?> value="female">Female</option>
                             <option <?php if (strtolower($_SESSION["gender"])=="other") echo "selected" ;?> value="female">Other</option>
                             </select> 

</div>

    
    
    
    
    
<div class="col-lg-6">
<label class="control-label" for="password">Password</label>
<input type="password" class="form-control"  value="" id="password">
</div>

    <div class="col-lg-6"></div>
<div class="col-lg-6">
<label class="control-label" for="passwordConfirm">Confirm Password</label>
<input type="password" class="form-control"  value="" id="passwordConfirm">
</div>
<div id="pswd_info">
    <h5>Password must meet the following requirements:</h5>
    <ul>
        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
        <li id="number" class="invalid">At least <strong>one number</strong></li>
        <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
    </ul>
</div>

<div id="pswd_info_confirm">
    
    <ul>
        <li id="confirm" class="invalid">Confirmation passwoord must be the same as  <strong>password</strong></li>
       
    </ul>
</div>
    
    
<style>
#pswd_info ul li, #pswd_info_confirm ul li { list-style:none;}
#pswd_info, #pswd_info_confirm {
    position:absolute;
    bottom:-75px;
    bottom: -115px\9; /* IE Specific */
    right:55px;
    width:250px;
    padding:15px;
    background:#fefefe;
    font-size:.875em;
    border-radius:5px;
    box-shadow:0 1px 3px #ccc;
    border:1px solid #ddd;
}
#pswd_info h4, #pswd_info_confirm h4 {
    margin:0 0 10px 0;
    padding:0;
    font-weight:normal;
}
#pswd_info::before, #pswd_info_confirm::before {
    content: "\25B2";
    position:absolute;
    top:-12px;
    left:45%;
    font-size:14px;
    line-height:14px;
    color:#ddd;
    text-shadow:none;
    display:block;
}


.invalid {
   /* background:url(../images/invalid.png) no-repeat 0 50%;*/
    padding-left:22px;
    line-height:24px;
    color:#ec3f41;
}
.valid {
   /* background:url(../images/valid.png) no-repeat 0 50%;*/
    padding-left:22px;
    line-height:24px;
    color:#3a7d34;
}
#pswd_info, #pswd_info_confirm {
    display:none;
}

</style>
<div class="col-lg-12">
 <button id="btnSubmit" style="margin:auto; margin-top:20px;" onclick="registration()" class="btn btn-success center-block" type="button" > Create My Account <span class="glyphicon glyphicon-send"></span>
                                                </button>
</div>
<script>
$(document).ready(function() {
	
	$("#btnSubmit").prop('disabled', true);
	})
	
	//jQuery('#password').on('input propertychange paste', function() {
    
	
	
	$('#passwordConfirm').keyup(function() {
    // keyup code here
	//validate the length
	var co = $('#passwordConfirm').val();
	var pass = $('#password').val()
if (  co == pass  ) {
  
	$('#confirm').removeClass('invalid').addClass('valid');
	
} else {
      $('#confirm').removeClass('valid').addClass('invalid');
}
	$("#btnSubmit").prop('disabled', false);
}).focus(function() {
    $('#pswd_info').fadeOut();
	//$('#pswd_info_confirm').fadein();
        
}).blur(function() {
    $('#pswd_info_confirm').fadeOut();
});

/*$('#passwordConfirm').keyup(function() {
    // keyup code here

}).focus(function() {
    // focus code here
}).blur(function() {
    // blur code here
});*/

$('#password').keyup(function() {
		
   // set password variable
var pswd = $(this).val();
//validate the length
if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
} else {
    $('#length').removeClass('invalid').addClass('valid');
}
//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
} else {
    $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
} else {
    $('#capital').removeClass('valid').addClass('invalid');
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
} else {
    $('#number').removeClass('valid').addClass('invalid');
}
}).focus(function() {
    $('#pswd_info').fadeIn();
}).blur(function() {
    $('#pswd_info').fadeOut();
});
	
	
/*   function ValidatePass (pswd)
{
	var valid = "true"
	if ( pswd.length < 8 ) {
    valid = "false"
} 
  */  
    function registration() 
{
    
	var fname = $("#fname").val()
	var lname = $("#lname").val()
	var email = $("#email").val()
	var gender = $("#gender  option:selected").val()
    var department = $("#department option:selected").val()
	var pass = $("#password").val()
    var passCo = $("#passwordConfirm").val()
	if (( passCo != pass  ) )
    {
		swal ("Please confirm your password")
    } 
else 
    {
			//if  (ValidatePass (pass)== false) {} else {
                
	$.ajax({
			type:"POST",
			url:"..\/login\/login_user_c.php",
			data:"&opr=addfrmUser&fname="+fname+"&lname="+lname+"&email="+email+"&gender="+gender+"&pass="+pass+"&department="+department,
			success:function(data)
			{	
			   
			 if (data == 0){swal ("Oops...","Account has been created with this email address. Login to continue",'warning')}
			  else if (data == 1){swal ("Success","Redirecting ....","success"); window.location ="index.php"}
			  else{swal ("error",data,"error"); } 
			  
			}
			})
	//} 
}
}
	
//});

</script>
<row></row>
<!-- row end-->

</div>

</div>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
        <script type="text/javascript">
		
            angular.module('userCreate', [])
                .controller('MainCtrl', ['$http', function($http) {
                    var self = this;

                   
                    self.last_name=<?php echo "'".$_SESSION["familyName"]."'";?>;
                    self.editAmmt = true;
                    self.disableSub = true;

                    self.finalParams = {};
	                self.finalParams['provider'] = "Interswitch";
					self.INTEGER_REGEXPInteger = new RegExp('^[a-z0-9]+(\.[_a-z0-9]+)*@@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,50})$', 'i');
					self.INTEGER_REGEXPEmail =/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
					//self.agree = true;
					self.myPane2Show= false;
					self.myPane1Show= true;

                    self.validate = function() {
                        self.errorMsg = '';
						swal({
							  title: '',
							  text: 'Please wait...',
							  imageUrl: 'assets/images/loading.gif',
							  animation: true
							})
                        
                        if(self.policy) {
                            $http.get("https://damola.staging.ggh.uk/portal/p/lookup/"+btoa(JSON.stringify(
                           { 
                                    "policy": self.policy 
                                }))+"/")
                                .then(
                                    function(validResp) {
                                        console.log("https://damola.staging.ggh.uk/portal/p/lookup/"+btoa(JSON.stringify({"policy": self.policy }))+"/")
										console.log(validResp)

                                        if(validResp.data['error'] === false) {
                                            var val_payload = validResp.data['payload'];
	                                        self.policy = val_payload['policy_num'];
	                                        self.acct_name = val_payload['account_name'];
	                                        self.pay_ref = val_payload['debit_note_num'];
	                                        self.pay_ammt = val_payload['debit_amount'];
											
											self.acct_email = val_payload['account_email'];
											self.acct_phone = val_payload['account_phone'];
                                            
	                                        self.finalParams['cust_name'] = self.cust_name = val_payload['account_name'];
                                            self.finalParams['cust_id'] = self.cust_id = val_payload['account_id'];
                                            // Time-based variable transaction reference to allow the same policy and payment number to be re-used
											var d = new Date();
											var ms = d.getMilliseconds();
											var s = d.getSeconds();
											var m = d.getMinutes();
											var h = d.getHours();
											
                                            self.finalParams['txn_ref'] = self.txn_ref = val_payload['debit_note_num']+'-'+Date.now()+ms+s+m+h;
											self.finalParams['txn_ref_old'] = self.txn_ref = val_payload['debit_note_num']+'-'+Date.now()+ms+s+m+h;
                                            self.finalParams['amount'] = self.amount = (val_payload['debit_amount'] * 100);

                                            self.editAmmt = false;
											
											
                                            self.disableSub = false;
											

					                        $http.get("https://damola.staging.ggh.uk/portal/p/details/"+btoa(JSON.stringify(
					                            { 
					                                "provider": self.finalParams['provider'],
					        	                    "pay_ref": self.finalParams['txn_ref'],
						                            "pay_ammt": self.finalParams['amount'].toString()
					                            }))+"/")
					                            .then(
					                                function(confResp) {
					
					                                    if(confResp.data['error'] === false) {
					                                        var con_payload = confResp.data['payload'];
                                                            self.finalParams['product_id'] = self.product_id = con_payload['product_id'];
					                                        self.finalParams['pay_item_id'] = self.pay_item_id = con_payload['pay_item_id'];
					                                        self.finalParams['currency'] = self.currency = con_payload['currency'];
					                                        self.finalParams['site_name'] = self.site_name = con_payload['site_url'];
					                                        self.finalParams['site_redirect_url'] = self.site_redirect_url = con_payload['return_url'];
					                                        self.finalParams['hash'] = self.hash = con_payload['hash'];
					                                        self.finalParams['local_date_time'] = self.local_date_time = con_payload['timestamp'];
															
															//close loading message
															swal({
																  title: 'Success!',
																  text: 'Valid policy number.',
																  timer: 100
																})
																
																									
															
					                                    } else {
					                                        self.errorMsg = 'Policy "'+self.policy
					                                            +'" - error '+confResp.data['exit_code']+': '
					                                            +confResp.data['message'];
																console.log(self.errorMsg)
																swal('Error','Invalid policy number', 'error')
					                                    }
					                                },
					                                function(failResp) {
					                                    console.error('Error looking up provider details');
														swal('Error','Error looking up provider details', 'error')
					                                }
					                            );
                                        } else {
                                            self.errorMsg = 'Policy "'+self.policy
                                                +'" - error '+validResp.data['exit_code']+': '
                                                +validResp.data['message'];
												console.log(self.errorMsg)
												swal('Error','Invalid policy number', 'error')
                                        }
                                    },
                                    function(failResp) {
										console.log(failResp)
                                        console.error('Error looking up user in Salesforce');
										swal('Error','Error looking up user in Salesforce', 'error')
                                    }
                                );

                                console.log(self.finalParams);
                        } else {
                            self.errorMsg = 'CANNOT!'
                            swal (self.errorMsg);
                        }
						
                    };

										
                    self.updateVals = function() {
                        self.finalParams['amount'] = self.amount = self.pay_ammt * 100;

                        $http.get("https://damola.staging.ggh.uk/portal/p/details/"+btoa(JSON.stringify(
	                        { 
	                            "provider": self.finalParams['provider'],
	        	                "pay_ref": self.finalParams['txn_ref'],
                                "pay_ammt": self.finalParams['amount']
	                        }))+"/")
	                            .then(
	                                function(updateResp) {
	
	                                    if(updateResp.data['error'] === false) {
	                                        var con_payload = updateResp.data['payload'];
	                                        self.finalParams['hash'] = self.hash = con_payload['hash'];
	                                        self.finalParams['local_date_time'] = self.local_date_time = con_payload['timestamp'];
	                                    } else {
	                                        self.errorMsg = 'Policy "'+self.policy
	                                            +'" - error '+updateResp.data['exit_code']+': '
	                                            +updateResp.data['message'];
	                                    }
	                                },
	                                function(updatefResp) {
	                                    console.error('Error looking up provider details');
	                                }
	                            );

                        console.log(self.pay_ammt);
                    };
										
					
					self.mySbubmit = function() {
                        //self.finalParams['amount'] = self.amount = self.pay_ammt * 100;
						//console.log("My submit begin");
                        $http.get("https://damola.staging.ggh.uk/portal/p/logTransaction/"+btoa(JSON.stringify(
	                        {  "policy_num": self.policy,
	                            "provider": self.finalParams['provider'],
	        	                "pay_ref": self.finalParams['txn_ref'],
                                "amount": self.finalParams['amount'],
								"local_date_time": self.finalParams['local_date_time'],
								"cust_name": self.finalParams['cust_name'],
								"cust_id": self.finalParams['cust_id'],
								"pay_item_id": self.finalParams['pay_item_id'],
								"currency": self.finalParams['currency'],
								"email": self.acct_email,
								"phone": self.acct_phone
	                        }))+"/")
							 .then(
	                            function(SubmitResp) {
								console.log (SubmitResp.data);
								console.log ("Payment intiation loged");
								 
							
								  var sub_payload = SubmitResp.data['payload'];
								  self.finalParams['txn_ref'] = self.txn_ref = self.finalParams['txn_ref_old']+"-"+sub_payload['paymentLogId'];
                                  self.pay_ref =self.finalParams['txn_ref'] ;
								  
								  //re hash variable
								  
								   $http.get("https://damola.staging.ggh.uk/portal/p/details/"+btoa(JSON.stringify(
								   											{ 
								   												"provider": self.finalParams['provider'],
								   												"pay_ref": self.finalParams['txn_ref'],
								   												"pay_ammt": self.finalParams['amount']
								   											}))+"/")
								   												.then(
								   													function(updateResp) {
								   														console.log(updateResp.data);
								   														console.log(self.finalParams['txn_ref'])
								   					
								   														if(updateResp.data['error'] === false) {
								   															var con_payload = updateResp.data['payload'];
								                                                               
								   															self.finalParams['hash'] = self.hash = con_payload['hash'];
								   														
								   															self.finalParams['local_date_time'] = self.local_date_time = con_payload['timestamp'];
								   															
								   															console.log(self.finalParams)
								                                                               console.log(self.txn_ref)
								   															//submit form 
                                                                                            swal({
                                                                                                       title: "Are you sure?",
                                                                                                       text: "Payment gatway will load in 5 seconds !",
                                                                                                       type: "warning",
                                                                                                       showCancelButton: true,
                                                                                                        timer: 5000,
                                                                                                       confirmButtonColor: "green",
                                                                                                       confirmButtonText: "Yes, proceed!",
                                                                                                       closeOnConfirm: false}, 
                                                                                                    function(){ 
                                                                                                       swal("Redirecting...!");
                                                                                                        setTimeout(document.paymentForm.submit(), 250)
                                                                                                    });
                                                                                            
                                                                                                                                                                                                      
								                                                                                                                                       
								                                                              
								   															
								   														} else {
								   															self.errorMsg = 'Policy "'+self.policy
								   																+'" - error '+updateResp.data['exit_code']+': '
								   																+updateResp.data['message'];
								   														}
								   													},
								   													function(updatefResp) {
								   														console.error('Error looking up provider details');
								   													}
								   												);
								   
								  
								 
								
						        if(SubmitResp.data['error'] === false) {
	                                      } else {
	                                        console.log = 'Policy "'+self.policy
	                                            +'" - error '+SubmitResp.data['exit_code']+': '
	                                            +SubmitResp.data['message'];
	                                    }
	                                },
	                            function(SbfailResp) {
	                                    
	                                }
	                            );

                      
                    };
					
										
					self.validtePane1 = function() {
						//swal (" validation  begin")
						if ((self.pay_ammt >= 100) && (self.agree === true) && ( self.INTEGER_REGEXPEmail.test(self.acct_email) === true ))
						{
							
							self.myPane2Show = true
							self.myPane1Show = false
						}
						else
						{ 
							var msg = "";
							if((self.pay_ammt >= 500)===false ){msg=msg+":.Payment can't be less than N500 <br/>"}
							if((self.agree === true)===false ){msg=msg+":.Please Agree with Ensure Terms & Agreement<br/>"}
							if(( self.INTEGER_REGEXPEmail.test(self.acct_email) === true )===false ){msg=msg+":.Please enter a valid email address<br/>"}
							console.log(msg)
							 swal("Oops...","Fail validation test ")
							 swal ({title: 'Error!',   text: msg,   html: true  })
							/*swal({
								  title: 'Error',
								  type: 'error',
								  html:"'"+msg+"'",
								  showCloseButton: true
								  
								})*/
						
						
						}
                        console.log(self.pay_ammt);
                    };
										
					
					self.backBtn = function() {
						//swal (" validation  begin")
						
							
							self.myPane2Show = false
							self.myPane1Show = true
						
						
                        //console.log(self.pay_ammt);
                    };
						
					
                }]);
        </script>

13/16/26971/1

</body>
</html>