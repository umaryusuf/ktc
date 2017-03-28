<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-compatible" content="ie=edge" charset="utf-8">
	<meta name="veiwport" content="width=device-width; initial-scale=1.0">
	<title>Update Parent information</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
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
						<li><a href="admin.php">Student Info</a></li>
						<li><a href="parents_info.php">Parent Info</a></li>
						<li class="active"><a href="update_parent.php">Update Parent Info</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="add_admin.php"><span class="glyphicon glyphicon-user"></span> Add Admin</a></li>
						<li><a href="print.php"><span class="glyphicon glyphicon-print"></span> Print</a></li>
	        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</div><!-- /.navbar-collapse -->
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
						<?php 
							include 'connection.php';

							if (isset($_GET['edit'])) {
								$edit_id = $_GET['edit'];

								$sql = "SELECT * FROM parent_info WHERE student_id='$edit_id'";
								$run_sql = mysqli_query($dbc, $sql);

								while ($row = mysqli_fetch_array($run_sql)) {
									$fullname = $row['fullname'];
									$phone = $row['phone'];
									$state = $row['state'];
									$local_gov = $row['local_gov'];
									$town = $row['town'];
									$tribe = $row['tribe'];
									$address = $row['address'];
								}
								mysqli_close($dbc);
							}
						?>
						<form action="update_parent.php?edit_id=<?php echo $edit_id; ?>" method="POST" role="form">
							<div class="">
								<p class="text-danger">All fields with * are required.</p>
							</div>
							<div class="form-group">
							  	<label for="fullname">Father's Full Name: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Father's Full Name" required autofocus value="<?php echo $fullname; ?>">
							  	<span class="error" id="name_error"></span><span class="error" id="name_error2"></span>
							</div>
							
							<div class="form-group">
							  	<label for="phone">Father's Phone Number: <span class="required">*</span></label>
							  	<input type="number" class="form-control" id="phone" name="phone" placeholder="0803 234 ***" required value="<?php echo $phone; ?>">
							  	<span class="error" id="phone_error"></span>
							</div>
							<div class="row">
								<div class="col-xs-6">
										<label for="state">State of Origin:<span class="required">*</span></label>
								  	<select name="state" class="form-control" id="state" >
					            <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
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
								<div class="col-xs-6">
									<label for="local_gov">Local Government: <span class="required">*</span></label>
									<input type="text" name="local_gov" id="local_gov" class="form-control" placeholder="local government" required value="<?php echo $local_gov; ?>">
									<span class="error" id="local_gov_error"></span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-6">
								  <label for="town">Town: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="town" name="town" placeholder="Enter Your Town" required value="<?php echo $town; ?>">
							  	<span class="error" id="town_error"></span>
								</div>
								<div class="col-xs-6">
								  <label for="tribe">Tribe: <span class="required">*</span></label>
							  	<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Enter Your Tribe" required value="<?php echo $tribe; ?>">
							  	<span class="error" id="tribe_error"></span>
								</div>
							</div>
							<br>
							<div class="form-group">
						  	<label for="address">Residential Address: <span class="required">*</span></label>
						  	<textarea class="form-control" rows="5" id="address" name="address" placeholder="your street address" required><?php echo $address; ?></textarea>
						  	<span class="error" id="address_error"></span>
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block" name="update">Submit</button>
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

<?php 

if (isset($_POST['update'])) {
	$update_id = $_GET['edit_id'];
	$u_fullname = $_POST['fullname'];
	$u_phone = $_POST['phone'];
	$u_state = $_POST['state'];
	$u_local_gov = $_POST['local_gov'];
	$u_town = $_POST['town'];
	$u_tribe = $_POST['tribe'];
	$u_address = $_POST['address'];

	$sql = "UPDATE parent_info SET fullname='$u_fullname', phone='$u_phone', state='$u_state', local_gov='$u_local_gov', town='$u_town', tribe='$u_tribe', address='$u_address' WHERE student_id='$update_id'";

	if (mysqli_query($dbc, $sql)) {
		echo "<script>window.open('parents_info.php', '_self')</script>";
		echo "<script>alert('Update Sucssfully')</script>";

		mysqli_close($dbc);
	}
}

?>