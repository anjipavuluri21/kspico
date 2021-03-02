<?php
ob_start();
include_once("connection.php");
 
if(isset($_POST['login']))
{
	$username = mysqli_real_escape_string($connection,$_REQUEST['username']);
	$password = mysqli_real_escape_string($connection,base64_encode($_REQUEST['password']));
	
	$login_query = mysqli_query($connection,"SELECT * from sumc_adminuser where status=1");
	while($login_res = mysqli_fetch_array($login_query))		
	{
		$db_username = $login_res['username'];
		$db_password = $login_res['password'];
		$adminid = $login_res['id'];		
		
		if($username==$db_username && $password==$db_password)
		{
			session_start();			
			$_SESSION["logger"]=$username;
			$_SESSION["SESS_MEMBER_ID"]=$adminid;
			header("location:dashboard.php");
			exit;
		}
		else {
			$a="Login Unsuccessful";
		}
	}
}
if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'Success'){
	echo "<script>alert('Password Updated successfully')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kuwait Saudi Pharmaceutical Industries Company</title>
  <!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/admin.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-7">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" name="loginform" id="loginform" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username"  required placeholder="Enter Username..">
                    </div>
                    <div class="form-group">
                      <input type="password" required class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <!--  <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                  <a href="index.php" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
					<input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="login" />
                    <!-- <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                     <!-- <a class="small float-left" href="forgot-password.php">Forgot Password?</a>
                  <a class="small float-right" href="register.php">Create an Account!</a>-->

                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
