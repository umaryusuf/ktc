<?php session_start(); ?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Parent Information</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/style.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
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
						<li class="active"><a href="parents_info.php">Parents Info</a></li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<form class="navbar-form navbar-left" action="search_parents.php" role="search">
							<select name="category" id="category" class="form-control">
								<option value="fullname">Name</option>
								<option value="phone">Phone</option>
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
						<li><a href="print.php"><span class="glyphicon glyphicon-print"></span> Print</a></li>
	        	<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	        </ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<main class="container-fluid">
			<div class="row">
				<div class="col-md-12">
						<h2 class="text-center">Parents Information</h2>
						<div class="table-responsive">
						<table class="table table-bordered table-condensed">
							<thead>
								<tr class="active " id="tr">
									<th width="">Father's Name</th>
									<th width="">Phone</th>
									<th width="">Tribe</th>
									<th width="">Town</th>
									<th width="">State</th>
									<th width="">Local Govt.</th>
									<th width="">Address</th>
									<th width="">Student</th>
									<th width="">Edit</th>
									<th width="">Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									include_once 'connection.php';

									$category = $_GET['category'];
									$value = $_GET['value'];


									$query = "SELECT * FROM parent_info WHERE `$category` LIKE '%$value%'";
									$run_query = mysqli_query($dbc, $query);
									if (empty(mysqli_fetch_array($run_query))) {
										echo "<h3 class='text-center'><strong>No Search Result Found</strong></h3>";
										echo "<script>$('#tr').addClass('hidden')</script>";
									}else{
										while ($row = mysqli_fetch_array($run_query)) {
											$id = $row['student_id'];
											$name = $row['fullname'];
											$phone = $row['phone'];
											$town = $row['town'];
											$tribe = $row['tribe'];
											$state = $row['state'];
											$local_gov = $row['local_gov'];
											$address = $row['address'];	
									
								?>
									<tr>
										<td><?php echo $name; ?></td>
										<td><?php echo $phone; ?></td>
										<td><?php echo $tribe; ?></td>
										<td><?php echo $town; ?></td>
										<td><?php echo $state; ?></td>
										<td><?php echo $local_gov; ?></td>
										<td><?php echo $address; ?></td>
										<td><a href="student.php?id=<?php echo $id; ?>">Student</a></td>
										<td><a href="update_parent.php?edit=<?php echo $id; ?>">Edit</a></td>
										<td><input type="checkbox" value="<?php echo $id; ?>" name="checked"></td>
									</tr>
									<?php } }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</main>

		
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>