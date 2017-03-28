<?php
session_start(); 

if (isset($_POST['submit'])) {

	$data_missing = array();

	if (empty($_POST['fullname'])) {
		$data_missing = "Full Name";
	} else {
		$fullname = trim($_POST['fullname']);
	}

	if (empty($_POST['regno'])) {
		$data_missing = "Registration Number";
	} else {
		$regno = trim($_POST['regno']);
	}

	if (empty($_POST['phone'])) {
		$data_missing = "Phone Number";
	} else {
		$phone = trim($_POST['phone']);
	}

	if (empty($_POST['dateofbirth'])) {
		$data_missing = "Date of birth";
	} else {
		$dateofbirth = trim($_POST['dateofbirth']);
	}


	if (empty($_POST['sex'])) {
		$data_missing = "Sex";
	} else {
		$sex = $_POST['sex'];
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

	if (empty($_POST['state'])) {
		$data_missing = "State of Origin";
	} else {
		$state = $_POST['state'];
	}
	
	if (empty($_POST['religion'])) {
		$data_missing = "Religion";
	} else {
		$religion = $_POST['religion'];
	}
	
	if (empty($_POST['local_gov'])) {
		$data_missing = "Local Government";
	} else {
		$local_gov = trim($_POST['local_gov']);
	}
	if (empty($_POST['address'])) {
		$data_missing = "Address";
	} else {
		$address = trim($_POST['address']);
	}
	
	if (empty($data_missing)) {
		require_once 'connection.php';

		$query = "INSERT INTO students_info(regno, fullname, phone, date_of_birth, sex, town, tribe, state, religion, local_gov, address) values('$regno', '$fullname', '$phone', '$dateofbirth', '$sex', '$town', '$tribe', '$state', '$religion', '$local_gov', '$address')";

		if(mysqli_query($dbc, $query)){
			echo "Data Submitted";
			$_SESSION['regno'] = $regno;
			header("location: parent_info.php");

			mysqli_close($dbc);
		}else{
			echo "Error Occured <br>";
			echo mysqli_error();

			mysqli_close($dbc);
		}

	}else{
		echo "You need to enter the following data <br />";

		foreach ($data_missing as $missing) {
			echo "$missing <br />";
		}
	}
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Student information</title>
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
	        <li class="active"><a href="student_info.php">Student infomation</a></li>
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
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="text-center" style="color:#fff; ">Student Information</h3>
					</div>
					<div class="panel-body">
						<form action="student_info.php" method="POST" id="studentform" role="form">
							<div class="">
								<p class="text-danger">All fields with * are required.</p>
								<p class="text-info">Every word should start with Capital Letter.</p>
							</div>
							<div class="form-group">
							  	<label for="regno">Registration Number: <span class="required">*</span></label>
							  	<input type="number" class="form-control" id="regno" name="regno" placeholder="your registration number" autofocus required>
							  	<span class="error" id="regno_error"></span>
							</div>
							<div class="form-group">
							  	<label for="fullname">Full Name: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter First Name" required>
							  	<span class="error" id="name_error"></span><span class="error" id="name_error2"></span>
							</div>
							<div class="form-group">
							  	<label for="phone">Phone: <span class="required">*</span></label>
							  	<input type="number" class="form-control" id="phone" name="phone" placeholder="0803 243 ****" required>
							  	<span class="error" id="phone_error"></span>
							</div>
							<div class="row">
								<div class="col-xs-8">
								  <label for="dateofbirth">Date of Birth: <span class="required">*</span></label>
							  	<input type="date" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="17/2/1990 " required>
								</div>
								<div class="col-xs-4">
								  <label for="sex">Sex: <span class="required">*</span></label>
								  <select class="form-control" name="sex">
								  	<option>-- Sex --</option>
								  	<option value="male">Male</option>
								  	<option value="female">Female</option>
								  </select>
								  <span class="error" id="sex_error"></span>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<br>
								  <label for="town">Town: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="town" name="town" placeholder="Enter Your Town" required>
							  	<span class="error" id="town_error"></span>
								</div>
								<div class="col-xs-6">
									<br>
								  <label for="tribe">Tribe: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Enter Your Tribe" required>
							  	<span class="error" id="tribe_error"></span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-8">
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
								<div class="col-xs-4">
									<label for="religion">Religion: <span class="required">*</span></label>
									<select name="religion" id="religion" class="form-control">
										<option>-- Religion --</option>
										<option value="muslim">Muslim</option>
										<option value="christian">Christian</option>
										<option value="traditional">Traditional</option>
									</select>
								</div>
							</div>
							<br>
							<div class="form-group">
							  	<label for="local_gov">Local Government: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="local_gov" name="local_gov" placeholder="Your local Government" required>
							  	<span class="error" id="local_gov_error"></span>
							</div>
							<div class="form-group">
							  	<label for="address">Residential Address: <span class="required">*</span></label>
							  	<textarea class="form-control" rows="5" id="address" name="address" placeholder="Enter Your Street Address" required></textarea>
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