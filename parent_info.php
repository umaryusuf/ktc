<?php 
session_start();

$regno = $_SESSION['regno'];

if (isset($_POST['submit'])) {
	$data_missing = array();

	if (empty($_POST['fullname'])) {
		$data_missing = "Full Name";
	} else {
		$fullname = trim($_POST['fullname']);
	}

	if (empty($_POST['phone'])) {
		$data_missing = "Phone Number";
	} else {
		$phone = trim($_POST['phone']);
	}

	if (empty($_POST['state'])) {
		$data_missing = "State of Origin";
	} else {
		$state = $_POST['state'];
	}
	
	if (empty($_POST['local_gov'])) {
		$data_missing = "Local Government";
	} else {
		$local_gov = trim($_POST['local_gov']);
	}

	if (empty($_POST['town'])) {
		$data_missing = "Town";
	} else {
		$town = trim($_POST['town']);
	}

	if (empty($_POST['tribe'])) {
		$data_missing = "Tribe";
	} else {
		$tribe = trim($_POST['tribe']);
	}

	if (empty($_POST['address'])) {
		$data_missing = "Address";
	} else {
		$address = trim($_POST['address']);
	}

	if (empty($data_missing)) {
		require_once 'connection.php';
 
		$sql = "SELECT * FROM students_info WHERE regno='$regno'";
		$run_sql = @mysqli_query($dbc, $sql);
		$row = @mysqli_fetch_array($run_sql);
		$id = $row['student_id'];
			
		$query = "INSERT INTO parent_info(student_id, fullname, phone, state, local_gov, town, tribe, address) VALUES('$id', '$fullname', '$phone', '$state', '$local_gov', '$town', '$tribe', '$address')";

		if(mysqli_query($dbc, $query)){
			
			header("location: success.php");

			mysqli_close($dbc);
		}else{
			echo "Error Occured :) <br>";
			echo mysqli_error();

			mysqli_close($dbc);
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Parent information</title>
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
	        <li><a href="home.php">Home</a></li>
	        <li class="disabled"><a href="student_info.php">Student infomation</a></li>
	        <li class="active"><a href="parent_info.php">Parent infomation</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<main>
		<section class="container">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="text-center" style="color:#fff; ">Parent Information</h3>
					</div>
					<div class="panel-body">
						<form action="parent_info.php" method="POST" role="form">
							<div class="">
								<p class="text-danger">All fields with * are required.</p>
							</div>
							<div class="form-group">
							  	<label for="fullname">Father's Full Name: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Father's Full Name" required autofocus>
							  	<span class="error" id="name_error"></span><span class="error" id="name_error2"></span>
							</div>
							
							<div class="form-group">
							  	<label for="phone">Father's Phone Number: <span class="required">*</span></label>
							  	<input type="number" class="form-control" id="phone" name="phone" placeholder="0803 234 ***" required>
							  	<span class="error" id="phone_error"></span>
							</div>
							<div class="row">
								<div class="col-xs-6">
										<label for="state">State of Origin:<span class="required">*</span></label>
								  	<select name="state" class="form-control" id="state" >
					            <option>--choose state--</option>

					            <option value="Abia">Abia</option>
					            <option value="Adamawa">Adamawa</option>
					            <option value="Akwa Ibom">Akwa Ibom</option>
					            <option value="Anambra">Anambra</option>
					            <option value="Bauchi">Bauchi</option>
					            <option value="Bayelsa">Bayelsa</option>
					            <option value="Benue">Benue</option>
					            <option value="Borno">Borno</option>
					            <option value="Cross River">Cross River</option>
					            <option value="Delta">Delta</option>
					            <option value="Ebonyi">Ebonyi</option>
					            <option value="Edo">Edo</option>
					            <option value="Ekiti">Ekiti</option>
					            <option value="Enugu">Enugu</option>
					            <option value="FCT">FCT</option>
					            <option value="Gombe">Gombe</option>
					            <option value="Imo">Imo</option>
					            <option value="Jigawa">Jigawa</option>
					            <option value="kaduna">kaduna</option>
					            <option value="Kano">Kano</option>
					            <option value="Katsina">Katsina</option>
					            <option value="Kebbi">Kebbi</option>
					            <option value="Kogi">Kogi</option>
					            <option value="Kwara">Kwara</option>
					            <option value="Lagos">Lagos</option>
					            <option value="Nasarawa">Nasarawa</option>
					            <option value="Niger">Niger</option>
					            <option value="Ogun">Ogun</option>
					            <option value="Ondo">Ondo</option>
					            <option value="Osun">Osun</option>
					            <option value="Oyo">Oyo</option>
					            <option value="Plateau">Plateau</option>
					            <option value="Rivers">Rivers</option>
					            <option value="Sokoto">Sokoto</option>
					            <option value="Taraba">Taraba</option>
					            <option value="Yobe">Yobe</option>
					            <option value="Zamfara">Zamfara</option>
					          </select>
					          <span class="error" id="state_error"></span>
								</div>
								<div class="col-xs-6">
									<label for="local_gov">Local Government: <span class="required">*</span></label>
									<input type="text" name="local_gov" id="local_gov" class="form-control" placeholder="local government" required>
									<span class="error" id="local_gov_error"></span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-6">
								  <label for="town">Town: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="town" name="town" placeholder="Enter Your Town" required>
							  	<span class="error" id="town_error"></span>
								</div>
								<div class="col-xs-6">
								  <label for="tribe">Tribe: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Enter Your Tribe" required>
							  	<span class="error" id="tribe_error"></span>
								</div>
							</div>
							<br>
							<div class="form-group">
							  	<label for="address">Residential Address: <span class="required">*</span></label>
							  	<textarea class="form-control" rows="5" id="address" name="address" placeholder="your street address" required></textarea>
							  	<span class="error" id="address_error"></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Submit</button>
						</form>
					</div>
					<br />
				</div>
			</div>
		</section>
	</main>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>