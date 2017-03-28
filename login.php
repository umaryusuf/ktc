<?php  
session_start();

$usernameErr = $passwordErr = $emailErr = "";

if (isset($_POST['login'])) {
  
  $username = test_input($_POST['username']);
  $username = ucfirst($username);

  $password = test_input($_POST['password']);
  $password = md5($password);

 include_once 'connection.php';

 $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

 $run_sql = mysqli_query($dbc, $sql);

 if (mysqli_num_rows($run_sql)  == 1) {
 	$_SESSION['username'] = $username;
  header("location: home.php"); // redirect to home page
  mysqli_close($dbc);
 }
 else{
 	echo "<script>alert('Invalid username or password')</script>";
 	// echo "<script>window.open('login.php', '_self')</script>";
 }

}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);

 	return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Kaduna Tecnical College</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="contact.php">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<section class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="text-center" style="color: #fff">Sign In</h4>
					</div>
					<div class="panel-body">
						<form role="form" method="POST" action="login.php">
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
						  <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Login</button>
						</form>
					</div>
					<div class="panel-footer">
						<p>Don't have an account? <a href="register.php">Register</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="text-center bg-primary" style="width:100%;position: absolute; bottom: 0">
		&copy; Copyright 2017 All right reserved
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>