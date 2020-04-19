<!DOCTYPE html>
<html lang="en" ng-app="payments">

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

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
<!-- This is what you need integration -->
  <script src="../sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css">
  <!--.......................-->
</head>

<body >

    <div class="container">
        <div class="row">
        
               <h1 style="text-align:center" >Ensure Fleet Manager</h1> 
               
            <div class="col-md-4  col-md-offset-4">
               
                <div class="login-panel panel panel-default" style=" padding:20px; text-align: center">
                
                   
                    <img src="images/Logo.png" style="margin:auto"  height="75" alt="Ensure">
                    
                   
                  <!-- <br/> <br/>
                   																					
                    <a style="width:100%; max-width:300px; text-align:center; margin:auto; " href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2Ffleetmanager.ensure.com.ng%3A1559%2Fgoogle-login-api%2Findex.php&client_id=38377875518-re8hho7g5t18ql2omd3jj85ddsmtmngo.apps.googleusercontent.com&scope=email+profile&access_type=online&approval_prompt=auto" class=""><img src="../google-login-api/images/googleSignIn1.png"  style="width:100%; max-width:300px; text-align:center; margin:auto; "/></a>
                           
                    <br/>   <br/>
                    
                 <span >OR </span>
				 <span  class="center-block btn btn-default" id="mainLgBtn"> Login with Email and Password </span> display:none-->
                  
                  <br/><br/>

              
             
                    <fieldset id="mainLgpane" style=" ">
                                <div class="form-group">
								<label>Email </label>
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                               
                                
                          <a href='login.html'>Login</a>
                                <a  class="btn  btn-success center-block " onClick="justDo()">Reset my password</a>
                            </fieldset>
                            
                            <!-- btn-block btn-lg -->
                 
     
                   
                   
                       <!-- <form role="form">-->
                        
                         <!--<fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="user" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="pass" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                          
                                <a  class="btn btn-lg btn-success btn-block" onClick="justDo()">Login</a>
                            </fieldset>--><!-- Change this to a button or input when using this as a form -->
                       <!-- </form>-->
                    </div>
                </div>
            </div>
        </div>
    

    <script>
  
  function justDo()
   {
	   var passname  = document.getElementById("email").value
	   resetPass(passname);
	   /*
	     $.ajax({
			type:"POST",
			url:"http://app.ensure.com.ng/t/services/domail",
			data:"&senderMask=Ensure&header=true&key=AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w&reciveremail="+passname+"&reciveremailCC=&reciveremailBC=&subject=Password Reset&recivername=User&msg=Your password has been reset on Fleetmanager&filepath=",
			success:function(data)
					{	
					console.log(data);
					}
		 })
	   */
	//swal("hhf")
	
	//var passd  = document.getElementById("pass").value
	 // swal(passname + " trgf " + passd)
//login(passname,passd);



	  }
  
  
 $("#mainLgBtn").click( function () {
	 $(this).fadeOut()
	 $("#mainLgpane").fadeIn()
	 })
  
  $(".container").width($(window).width());
   $(".container").height($(window).height());
   $(window).resize(function(){
    $(".container").width($(window).width());
   $(".container").height($(window).height());
});
   
   
      
 function resetPass(name) {
     
	 
	
				   
     $.ajax({
			type:"POST",
			url:"..\/login\/login_user_c.php",
			data:"email="+name+"&opr=resetPassword&",
			success:function(data)
			{	
			   
			/* if (this.responseText == 0){swal ("Oops...","Account has been disabled",'error')}
			  else if (this.responseText == 1){swal ("Success","Redirecting ....","success"); window.location ="../pages/index.php"}
			   else if (this.responseText == 2){swal ("Oops...","Invalid user name or password",'error')}
			   else {swal ("Oops...",this.responseText,'error')}
			   url:"http://app.ensure.com.ng/t/services/domail",
			   */
     //alert(data)
			  if (data == 0)
			  {
				  swal ("Oops...","Account has been disabled",'error');
			   }
			  else if (data == 1)
			  {
				    $.ajax({
					type:"POST",
					url:"http://app.ensure.com.ng/t/services/domail",
					data:"&senderMask=Ensure&header=&key=AIzaSyBIbB7Cv2mXY9LHN4vzEuD513PfvATnX3w&reciveremail="+name+"&reciveremailCC=&reciveremailBC=&subject=Password Reset&recivername=User&msg=Your password has been reset on Fleetmanager&filepath=",
					success:function(data)
					{	
					console.log(data)
					}})
			  swal ("Success","Your password reset successfuly to Ensure123.","success"); //window.location ="../pages/index.php"
			  }
			   else if (data == 2)
			   {
				swal ("Oops...","Invalid user name or password",'error')
			   }
			   else 
			   {
				   swal ("Oops...",data+"dfd",'error')
			}
			}
			})
	
}

   
   
   
   
 function login(name,pass) {
     
     $.ajax({
			type:"POST",
			url:"..\/login\/login.php",
			data:"&user="+name+"&pass="+pass+"&format=",
			success:function(data)
			{	
			   
			/* if (this.responseText == 0){swal ("Oops...","Account has been disabled",'error')}
			  else if (this.responseText == 1){swal ("Success","Redirecting ....","success"); window.location ="../pages/index.php"}
			   else if (this.responseText == 2){swal ("Oops...","Invalid user name or password",'error')}
			   else {swal ("Oops...",this.responseText,'error')}*/
     
			  if (data == 0){swal ("Oops...","Account has been disabled",'error')}
			  else if (data == 1){swal ("Success","Redirecting ....","success"); //window.location ="../pages/index.php"
			  }
			   else if (data == 2){swal ("Oops...","Invalid user name or password",'error')}
			   else {swal ("Oops...",data,'error')}
			}
			})
	
}


</script>

<style>
body {background-image:url(images/fleetbg.png) ; background-position:bottom center !important; background-repeat:no-repeat;}
</style>
</body> 
    
    