<?php session_start(); ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin panel</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/style.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="js/students.js"></script>
	</head>
	<body>
		<div class="container-fluid hidden-print">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Welcome to Admin Panel</h1>
					<p class="lead">This is where you manage your students information</p>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-default hidden-print" role="navigation" >
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
						<li class="active"><a href="admin.php">Students Info</a></li>
						<li><a href="parents_info.php">Parents Info</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" action="search_students.php" role="search">
							<select name="category" id="category" class="form-control">
								<option value="fullname">Name</option>
								<option value="phone">Phone</option>
								<option value="regno">Reg No.</option>
								<option value="religion">Religion</option>
								<option value="state">State</option>
								<option value="tribe">Tribe</option>
								<option value="town">Town</option>
								<option value="local_gov">Local Govt</option>
							</select>
							<div class="form-group">
								<input type="search" class="form-control" placeholder="Search" name="value" required>
							</div>
							<button type="submit" class="btn btn-default">Search</button>
						</form>
						<li><a href="add_admin.php"><span class="glyphicon glyphicon-user"></span> Add Admin</a></li>
						<li><a onclick="window.print()" href="javascript:void(0)"><span class="glyphicon glyphicon-print"></span> Print</a></li>
	        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	        </ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<main class="container-fluid">
			<div class="row">
				<div class="col-md-12">
						<h2 class="text-center">Students Information</h2>
						<div class="table-responsive">
						<form action="" name="frmstudents" method="POST">
						<div class="col-sm-11 col-md-11 col-lg-11">
							<table class="table table-bordered table-condensed">
								<thead>
									<tr class="active">
										<th class="hidden-print" width=""></th>
										<th width="6%">Reg No.</th>
										<th width="10%">Name</th>
										<th width="8%">Phone</th>
										<th width="10%">Date Of Birth</th>
										<th width="5%">Sex</th>
										<th width="5%">Religion</th>
										<th width="8%">Tribe</th>
										<th width="8%">Town</th>
										<th width="10%">State</th>
										<th width="12%">Local Govt.</th>
										<th width="20%">Address</th>
										<th class="hidden-print" width="8%">Parent</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include_once 'connection.php';

										$query = "SELECT * FROM students_info";
										$run_query = mysqli_query($dbc, $query);
											while ($row = mysqli_fetch_array($run_query)) {
												$id = $row['student_id'];
												$regno = $row['regno'];
												$name = $row['fullname'];
												$phone = $row['phone'];
												$dateofbirth = $row['date_of_birth'];
												$sex = $row['sex'];
												$town = $row['town'];
												$tribe = $row['tribe'];
												$state = $row['state'];
												$religion = $row['religion'];
												$local_gov = $row['local_gov'];
												$address = $row['address'];	
									?>
										<tr>
											<td class="hidden-print">
												<input type="checkbox" value="<?php echo $id; ?>" name="students[]">
											</td>
											<td><?php echo $regno; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $phone; ?></td>
											<td><?php echo $dateofbirth; ?></td>
											<td><?php echo $sex; ?></td>
											<td><?php echo $religion; ?></td>
											<td><?php echo $tribe; ?></td>
											<td><?php echo $town; ?></td>
											<td><?php echo $state; ?></td>
											<td><?php echo $local_gov; ?></td>
											<td><?php echo $address; ?></td>
											<td class="hidden-print"><a href="parent.php?id=<?php echo $id; ?>">Parent</a></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							</div>
							<!-- <div class="container-fluid"> -->
								<div class="col-sm-1 col-md-1 col-lg-1">
									<button type="button" class="btn btn-warning btn-block hidden-print" name="update" onclick="setUpdateAction()"><span class="glyphicon glyphicon-edit">Update</span></button>
									<br>
									<button type="button" class="btn btn-danger btn-block hidden-print" name="delete" onclick="setDeleteAction()">
										<span class="glyphicon glyphicon-trash">Delete</span>
									</button>
								</div>
						<!-- 	</div> -->
						</form>
					</div>
				</div>
			</div>
		</main>

		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>