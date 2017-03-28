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
				<div class="col-md-6 col-md-offset-3 text-center">
					<div class="well">
						<h3>Data Successfully Submitted</h3>
						<p>You will be contacted soon...</p>
						<p >Contact school for further enquires</p>
						<p>continue to our <a href="index.php">homepage</a> or <a href="logout.php">logout</a></p>
					</div>
				</div>
			</div>
		</section>
	</main>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>