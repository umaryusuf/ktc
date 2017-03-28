<?php session_start(); ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Info</title>

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
						<li><a href="admin.php">Students Info</a></li>
						<li><a href="parents_info.php">Parents Info</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
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
						<h2 class="text-center">Student Information</h2>
						<div class="table-responsive">
						<table class="table table-bordered table-condensed">
							<thead>
								<tr class="active">
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
									<th class="hidden-print" width="4%">Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									include_once 'connection.php';
									if (isset($_GET['id'])) {
										$id = $_GET['id'];
										$query = "SELECT * FROM students_info WHERE student_id='$id'";
										$run_query = mysqli_query($dbc, $query);
										while ($row = mysqli_fetch_array($run_query)) {
											
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
										<td class="hidden-print"><a href="update.php?edit=<?php echo $id; ?>">Edit</a></td>
									</tr>
								<?php } }?>
							</tbody>
						</table>
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