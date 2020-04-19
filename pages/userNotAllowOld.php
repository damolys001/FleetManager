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

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
<!-- This is what you need integration -->
  <script src="../sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../sweetalert-master/dist/sweetalert.css">
  <!--.......................-->
</head>

<body>

    <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-4">
               <h1 >Ensure Fleet Application</h1> 
               </div>
            <div class="col-md-4 col-md-offset-4">
               
                <div class="login-panel panel panel-default">
                
                   
                   
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                        
                        <h2> The email address you provided is not allowed on this platform.</h2>
                        
                        <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=http%3A%2F%2Flocalhost%3A1759%2Ffleet001%2Fgoogle-login-api%2F&client_id=38377875518-re8hho7g5t18ql2omd3jj85ddsmtmngo.apps.googleusercontent.com&scope=email+profile&access_type=online&approval_prompt=auto" class=""><img src="../google-login-api/images/googleSignIn1.png"  style=" width:300px; text-align:center; margin:auto; "/></a>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
  
  function justDo()
   {
	//swal("hhf")
	var passname  = document.getElementById("user").value
	var passd  = document.getElementById("pass").value
	 // swal(passname + " trgf " + passd)
login(passname,passd);
	  }
  
  
  
  
  
 function login(name,pass) {
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
                //document.getElementById("user").innerHTML = this.responseText;
				//swal (this.responseText)
				 //swal(name + " trgf " + pass)
				if (this.responseText == 0){swal ("Oops...","Account has been disabled",'error')}
			  else if (this.responseText == 1){swal ("Success","Redirecting ....","success"); window.location ="../pages/index.php"}
			   else if (this.responseText == 2){swal ("Oops...","Invalid user name or password",'error')}
			   else {swal ("Oops...",this.responseText,'error')}
			   //swal("hhf2ggg")
            }
        };
       xmlhttp.open("GET", "../login/login.php?user=" + name +"&pass=" + pass + "&format", true);
        xmlhttp.send();
    //swal("hhf2")
	
	
	/*var xhr = new XMLHttpRequest(),
    method = "GET",
    url = "../login/login.php?user=" + name +"&pass=" + pass + "&format";

xhr.open(method, url, true);
//xhr.onreadystatechange = handleServerResponse;

xhr.onreadystatechange = function () {
	//swal(name + " trgf " + pass)
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			swal(name + " trgf " + pass)
            //console.log(xhr.responseText);
        }
    };
xhr.send();
	xhr.send();
	*/


	
	
/*	ajax=new XMLHttpRequest();
alert("im here!");
ajax.open('GET',"login.php?user=" + passname +"&pass=" + passd + "&format", true);
ajax.send();

alert("im here!");*/
	
}


</script>
</body> 
    
    