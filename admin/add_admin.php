<?php  
session_start();

require 'connection.php';

	if(isset($_POST['add_admin'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    if($username != "" && $password != ""){
    	require_once 'connection.php';
	    $password = md5($password); //password is hashed before storing

	    $sql = "INSERT INTO admin(username, password) VALUES('$username', '$password')";
	     
	    if (mysqli_query($dbc, $sql)) {
	     
	      $_SESSION['username'] = $username;
	      echo "<script>alert('Admin Added Sucessfully')</script>";

	      mysqli_close($dbc);
	    } else {
	      echo "<script>alert('Invalid username or password')</script>";
	    }
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
		<title>Add Admin</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/style.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation" >
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Admin panel</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="admin.php">Students info</a></li>
						<li><a href="parents_info.php">Parents info</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="add_admin.php"><span class="glyphicon glyphicon-user"></span> Add Admin</a></li>
	        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<main>
			<section class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="text-center" style="color: #fff;">Add New Admin</h4>
							</div>
							<div class="panel-body">
								<form action="add_admin.php" method="POST">
									<label for="username">Username:</label>
		              <div class="form-group input-group">
		                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		                  <input type="text" class="form-control input-lg" id="username" name="username" placeholder="username" required>
		              </div>
		              <label for="password">Password:</label>
		              <div class="form-group input-group">
		                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		                  <input type="password" class="form-control input-lg" id="password" name="password" placeholder="password" required>
		              </div>
		            
		              <button class="btn btn-primary btn-block btn-lg" type="submit" name="add_admin">Add Admin</button>
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