<?php include_once "../resource/session.php"; ?>
<!doctype html>
<html>
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

<body>

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
<input type="text" class="form-control" value="<?php echo $_SESSION["familyName"];?>" id="fname">
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
<label class="control-label" for="gender">Gender</label>
<input type="gender" class="form-control"  value="<?php echo $_SESSION["gender"] ;?>" id="gender">
</div>

<div class="col-lg-6">
<label class="control-label" for="password">Password</label>
<input type="password" class="form-control"  value="" id="password">
</div>


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
    background:url(../images/invalid.png) no-repeat 0 50%;
    padding-left:22px;
    line-height:24px;
    color:#ec3f41;
}
.valid {
    background:url(../images/valid.png) no-repeat 0 50%;
    padding-left:22px;
    line-height:24px;
    color:#3a7d34;
}
#pswd_info, #pswd_info_confirm {
    display:none;
}

</style>
<div class="col-lg-12">
 <button id="btnSubmit" style="margin:auto; margin-top:20px;" class="btn btn-success center-block" type="button" > Create My Account <span class="glyphicon glyphicon-send"></span>
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
	$('#pswd_info_confirm').fadein();
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
	
	
	
//});

</script>
<row></row>
<!-- row end-->

</div>

</div>




</body>
</html>