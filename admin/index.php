<?php  
session_start();

	if(isset($_POST['login'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if ($username != "" or $password != "") {
    	require_once 'connection.php';

    	$password = md5($password); // remeber password was hashed before storing
	    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

	    if (@mysqli_query($dbc, $sql)) {
	      $_SESSION['username'] = $username;
	      header("location: admin.php"); // redirect to admin

	      mysqli_close($dbc);
	    }

    }else{
    	echo "<script>alert('Invalid Username or password')</script>";
    }   
      
  }

  function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Login</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/style.css" >

		<style>
			body{
				padding-top: 100px;
			}
		</style>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

		<main>
			<section class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="text-center" style="color: #fff;">Login as Admin</h4>
							</div>
							<div class="panel-body">
								<form action="index.php" method="POST" name="admin_login" id="admin_login">
		              <label for="username">Username:</label>
		              <div class="form-group input-group">
		                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                  <input type="text" class="form-control input-lg" id="username" name="username" placeholder="username" required autofocus>
		              </div>
		              <label for="password">Password:</label>
		              <div class="form-group input-group">
		                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                  <input type="password" class="form-control input-lg" id="password" name="password" placeholder="password" required>
		              </div>
		            
		              <button class="btn btn-primary btn-block btn-lg" type="submit" name="login">Login</button>
		              <br>
		            </form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>