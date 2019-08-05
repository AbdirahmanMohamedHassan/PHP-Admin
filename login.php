<?php require 'db.php'; 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    
    <title>SIOS | Admin Panel</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap -->
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- style -->
    <link rel="stylesheet" href="assets/css/pages/extra_pages.css">
	<!-- favicon -->
    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" /> 
</head>
<body>
    <div class="form-title">
        <h1>Admin Login Form</h1>
    </div>
    <!-- Login Form-->
    <div class="login-form text-center">
        <div class="toggle">
        </div>
        <div class="form formLogin">
									   <?php 
   if( isset($_SESSION['loginfirst']) AND !empty($_SESSION['loginfirst']) ){
        echo $_SESSION['loginfirst'];  
unset( $_SESSION['loginfirst'] );		
	}

?>  
            <h2>Login to your account</h2>
            <form action="" method=POST>
                <input type="text" placeholder="Username" name="username" autocomplete=off >
                <input type="password" placeholder="Password" name="password" autocomplete=off>
                
                <input style="background:#46D7EA;cursor:pointer;color:white" type="submit" name="submit" value="Login">
                
                </div>
            </form>
        </div>
     
      
    </div>
    <!-- start js include path -->
    <script src="assets/plugins/jquery/jquery.min.js" ></script>
    
    <script src="assets/js/pages/extra-pages/pages.js" ></script>
    <!-- end js include path -->
</body>
</html>

<?php 
if(isset($_POST["submit"])){
    
	if( empty($_POST['username']) || empty($_POST['password'])) {
		$_SESSION['adminmessage']= " <div class='alert alert-danger'>
        <strong>Woah!</strong> Fill out all the information please.
                    </div>";
		 header("location:login.php");
	}else{
		 $username = $mysqli->escape_string($_POST['username']);
           $result = $mysqli->query("SELECT * FROM tb_admin WHERE username='$username'");
		   
			if ( $result->num_rows == 0 ){ // User doesn't exist

	 $_SESSION['adminmessage'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Warning!</strong>  User with that email doesn't exist!
          </div>
";
	header("location: login.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['name'] = $user['name'];
       
        header("location: index.php"); 
	}
else {
		 $_SESSION['adminmessage'] = "  <div class='alert alert-danger' role='alert'>
            <strong>Warning!</strong>  You have entered wrong password or email, try again!
          </div>
";
	header("location: login.php");
    }	
		
	}
	}
}
		?>