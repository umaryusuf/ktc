<?php  
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Home Page</title>
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
	        <li class="active"><a href="home.php">Home</a></li>
	        <li class="disabled"><a href="student_info.php">Student infomation</a></li>
	        <li class="disabled"><a href="#">Parent infomation</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<main>
		<section class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="well">
						<h3 class="text-center">Welcome to Student Information Registration</h3>
						<br>
						<h5>In this information registration you are expected to complete two steps:</h5>
						<p>The first step is student information</p>
						<p>And the second step is father information</p>
						<br>
						<h5>Registration guidelines:</h5>
						<ul>
							<li>You are expected to fill every information correctly</li>
							<li>Every field marked with <span class="required">*</span> is required</li>
							<li>Further information will be reffered to you after registration</li>
						</ul>
						<br>
						<p><a href="student_info.php" class="btn btn-primary">Start Registration</a></p>
					</div>
				</div>
			</div>
		</section>
	</main>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>