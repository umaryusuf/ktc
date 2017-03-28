<?php
 session_start();
 include 'connection.php';

if (isset($_POST['submit']) && $_POST['submit']!= "") {
	$userCount = count($_POST['regno']);
	for ($i=0; $i < $userCount; $i++) { 
		mysqli_query($dbc, "UPDATE students_info SET regno='" . $_POST["regno"][$i] . "', fullname='" . $_POST["fullname"][$i] . "', phone='" . $_POST["phone"][$i] . "', date_of_birth='" . $_POST["dateofbirth"][$i] . "', sex='" . $_POST["sex"][$i] . "', town='" . $_POST["town"][$i] . "', tribe='" . $_POST["tribe"][$i] . "', state='" . $_POST["state"][$i] . "', religion='" . $_POST["religion"][$i] . "', local_gov='" . $_POST["local_gov"][$i] . "', address='" . $_POST["address"][$i] . "' WHERE student_id='" . $_POST["student_id"][$i] . "'");
	}

	header("Location: admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Information</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/style.css" >

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
						<li><a href="admin.php">Students Info</a></li>
						<li><a href="parents_info.php">Parents Info</a></li>
						<li class="active"><a href="update.php">Update Info</a></li>
					</ul>
					
					
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

		<main class="container">
			<div class="col-md-6 col-md-offset-3">
				<form name="frmstudents" action="edit_students.php" method="POST">
					<table width="100%">
						<tr>
							<th class="hid">Edit Students</th>
						</tr>
						<?php 
							if (empty($_POST['students'])) {
								echo "<script>$('.hid').addClass('hidden')</script>";
								echo "<h3 class='text-center'>No Student Selected</h3>";
							}else{

							$rowCount = count($_POST['students']);
							for ($i=0; $i < $rowCount; $i++) { 
								$result = mysqli_query($dbc, "SELECT * FROM students_info WHERE student_id='" . $_POST["students"][$i] ."'" );
								$row[$i]= mysqli_fetch_array($result);
							
						?>
						<tr>
							<td>
								<div class="well">
									<div class="form-group">
								  	<label for="regno">Registration Number: <span class="required">*</span></label>
								  	<input type="hidden" name="student_id[]" value="<?php echo $row[$i]['student_id']; ?>">
								  	<input type="number" class="form-control" id="regno" name="regno[]" placeholder="your registration number" required value="<?php echo $row[$i]['regno']; ?>" autofocus>
								  	<span class="error" id="regno_error"></span>
									</div>
									<div class="form-group">
								  	<label for="fullname">Full Name: <span class="required">*</span></label>
								  	<input type="text" class="form-control" id="fullname" name="fullname[]" placeholder="Full Name" required value="<?php echo $row[$i]['fullname']; ?>" >
								  	<span class="error" id="name_error"></span>
									</div>
									<div class="form-group">
									  	<label for="phone">Phone: <span class="required">*</span></label>
									  	<input type="number" class="form-control" id="phone" name="phone[]" placeholder="0803 243 ****" required value="<?php echo $row[$i]['phone']; ?>">
									  	<span class="error" id="phone_error"></span>
									</div>
									<div class="row">
										<div class="col-xs-8">
										  <label for="dateofbirth">Date of Birth: <span class="required">*</span></label>
									  	<input type="date" class="form-control" id="dateofbirth" name="dateofbirth[]" placeholder="17/2/1990 " required value="<?php echo $row[$i]['date_of_birth']; ?>">
										</div>
										<div class="col-xs-4">
										  <label for="sex">Sex: <span class="required">*</span></label>
										  <select class="form-control" name="sex[]">
										  	<option value="<?php echo $row[$i]['sex']; ?>"><?php echo $row[$i]['sex']; ?></option>
										  	<option>-- Sex --</option>
										  	<option value="Male">Male</option>
										  	<option value="Female">Female</option>
										  </select>
										  <span class="error" id="sex_error"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<br>
										  <label for="town">Town: <span class="required">*</span></label>
									  	<input type="text" class="form-control" id="town" name="town[]" placeholder="Enter Your Town" required value="<?php echo $row[$i]['town']; ?>">
									  	<span class="error" id="town_error"></span>
										</div>
										<div class="col-xs-6">
											<br>
										  <label for="tribe">Tribe: <span class="required">*</span></label>
									  	<input type="text" class="form-control" id="tribe" name="tribe[]" placeholder="Enter Your Tribe" required value="<?php echo $row[$i]['tribe']; ?>">
									  	<span class="error" id="tribe_error"></span>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-xs-8">
												<label for="state">State of Origin:<span class="required">*</span></label>
										  	<select name="state[]" class="form-control" id="state">
										  		<option value="<?php echo $row[$i]['state']; ?>"><?php echo $row[$i]['state']; ?></option>
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
							            <option value="Kaduna">Kaduna</option>
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
											<select name="religion[]" id="religion" class="form-control">
												<option value="<?php echo $row[$i]['religion']; ?>"><?php echo $row[$i]['religion']; ?></option>
												<option>-- Religion --</option>
												<option value="Muslim">Muslim</option>
												<option value="Christian">Christian</option>
												<option value="Traditional">Traditional</option>
											</select>
										</div>
									</div>
									<br>
									<div class="form-group">
									  	<label for="local_gov">Local Government: <span class="required">*</span></label>
									  	<input type="text" class="form-control" id="local_gov" name="local_gov[]" placeholder="Your local Government" required value="<?php echo $row[$i]['local_gov']; ?>">
									  	<span class="error" id="local_gov_error"></span>
									</div>
									<div class="form-group">
									  	<label for="address">Residential Address: <span class="required">*</span></label>
									  	<textarea class="form-control" rows="5" id="address"  name="address[]" placeholder="Enter Your Street Address" required ><?php echo $row[$i]['address']; ?></textarea>
									  	<span class="error" id="address_error"></span>
									</div>
								</div>
							</td>
						</tr>
						<?php }?>
						<tr>
							<td>
								<button class="hid btn btn-primary btn-block btn-lg" type="submit" name="submit" value="submit">Submit</button>
							</td>
						</tr>
						<?php } ?>
					</table>
				</form>
			</div>
		</main>
</body>
</html>
	