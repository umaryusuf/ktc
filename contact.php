<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Contact Page</title>
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
	        <li class="active"><a href="contact.php">Contact</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<main>
		<section class="container">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="text-center" style="color:#fff; ">Contact Us</h3>
					</div>
					<div class="panel-body">
						<form action="mail/contact_me.php" method="POST" role="form">
							<div class="form-group">
							  	<label for="fullname">Full Name: <span class="required">*</span></label>
							  	<input type="text" class="form-control input-lg" placeholder="fullname" id="fullname" name="fullname" required>
							</div>
							<div class="form-group">
							  	<label for="email">Email: <span class="required">*</span></label>
							  	<input type="email" class="form-control input-lg" placeholder="you@yourmail.com" id="email" name="email" required>
							</div>
							<div class="form-group">
							  	<label for="phone">Phone: <span class="required">*</span></label>
							  	<input type="tel" class="form-control input-lg" placeholder="phone" id="phone" name="phone" required>
							</div>
							<div class="form-group">
							  	<label for="message">Message: <span class="required">*</span></label>
							  	<textarea class="form-control input-lg" rows="6" id="message" placeholder="your message" name="message" required style="max-width: 100%;"></textarea>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
						</form>
					</div>
					<br />
				</div>
			</div>
		</section>
	</main>
	<footer class="text-center bg-primary">
		&copy; Copyright 2017 All right reserved
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>