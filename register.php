<?php  
	session_start();

	if (isset($_POST['register'])) {

	    $username = test_input($_POST['username']); 
    	$email = test_input($_POST["email"]);
	    $password = test_input($_POST['password']);
	  
    if ($username != "" or $email != "" or $password != "") {
    	$username = ucfirst($username);
		  $password = md5($password);

		  include_once 'connection.php';

		  $sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";

		  if (@mysqli_query($dbc, $sql)) {
		  	header("location: home.php");
		  	$_SESSION['username'] = $username;
		  }

		  mysqli_close($dbc);
    }

	}

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

	 	return $data;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Registers Page</title>
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
	      <a class="navbar-brand" href="index.php">Kaduna Tecnical College</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="contact.php">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<section class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="text-center" style="color: #fff">Register Here</h4>
					</div>
					<div class="panel-body">
						<form role="form" method="POST" action="register.php">

						  <label for="username">Username:</label>
              <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control input-lg" id="username" name="username" placeholder="username" autofocus required>
              </div>
              <label for="email">Email:</label>
              <div class="form-group input-group">
						    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
						    <input type="emal" class="form-control input-lg" id="email" name="email" placeholder="you@yourmail.com" required>
						  </div>
              <label for="password">Password:</label>
              <div class="form-group input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" class="form-control input-lg" id="password" name="password" placeholder="password" required>
              </div>

						  <button type="submit" class="btn btn-primary btn-lg btn-block" name="register">Register</button>
						</form>
					</div>
					<div class="panel-footer">
						<p>Already have an account? <a href="login.php">login</a></p>
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