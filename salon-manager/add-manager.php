<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
	header('location:logout.php');
} else{

	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$sid = $_POST['sid'];
		$contact=$_POST['contact'];
		$gender=$_POST['gender'];
		$username=$_POST['username'];
		$pass = $_POST['password'];
		$password=md5($pass);

		$sQuery = mysqli_query($con,"SELECT salon from tblsalons where id='$sid'");
		$row = mysqli_fetch_array($sQuery);
		$salon = $row['salon'];


		$query=mysqli_query($con, "INSERT into  tblmanager(names,gender,username,email,contact,password,salon,sid) value('$name','$gender','$username','$email','$contact','$password','$salon','$sid')");
		if ($query) {
			echo "<script>alert('Salon Manager account has been created.');</script>"; 
			// echo "<script>window.location.href = 'add-manager.php'</script>"; 
		} else {
			echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
		} }
		?>
		<!DOCTYPE HTML>
		<html>
		<head>
			<title>BPMS | Add Salon Managers</title>

			<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
			<!-- Bootstrap Core CSS -->
			<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
			<!-- Custom CSS -->
			<link href="css/style.css" rel='stylesheet' type='text/css' />
			<!-- font CSS -->
			<!-- font-awesome icons -->
			<link href="css/font-awesome.css" rel="stylesheet"> 
			<!-- //font-awesome icons -->
			<!-- js-->
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/modernizr.custom.js"></script>
			<!--webfonts-->
			<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
			<!--//webfonts--> 
			<!--animate-->
			<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
			<script src="js/wow.min.js"></script>
			<script>
				new WOW().init();
			</script>
			<!--//end-animate-->
			<!-- Metis Menu -->
			<script src="js/metisMenu.min.js"></script>
			<script src="js/custom.js"></script>
			<link href="css/custom.css" rel="stylesheet">
			<!--//Metis Menu -->
		</head> 
		<body class="cbp-spmenu-push">
			<div class="main-content">
				<!--left-fixed -navigation-->
				<?php include_once('includes/sidebar.php');?>
				<!--left-fixed -navigation-->
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!-- main content start-->
				<div id="page-wrapper">
					<div class="main-page">
						<div class="forms">
							<h3 class="title1">Add Salon Manager</h3>
							<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Parlour Manager:</h4>
								</div>
								<div class="form-body">
									<form method="post">
										<p style="font-size:16px; color:red" align="center"> <?php if($msg){
											echo $msg;
										}  ?> </p>


										<div class="form-group">
											<label for="exampleInputEmail1">Name</label> 
											<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="" required="true"> 
										</div>
										<div class="form-group"> 
										<label for="exampleInputPassword1">Salon</label> 
										<select class="form-control" required="" name="sid">
											<option value="">---select salon---</option>
											<?php 
											$sql=mysqli_query($con,"SELECT * from tblsalons");
											while ($row = mysqli_fetch_array($sql)) {

												?>	
												<option value="<?php echo $row['id'] ?>"><?php echo $row['salon'] ?></option>
												<?php
											}
											?>

										</select>
									</div> 
										<div class="form-group">

											<label for="exampleInputPassword1">Email</label> 
											<input type="email" id="email" name="email" class="form-control" placeholder="Email" value="" required="true">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Mobile Number</label> 
											<input type="number" class="form-control" id="contact" name="contact" placeholder="0780048891" value="" required="true" min="10" pattern="[0-9]+"> 
										</div>
										<div class="radio">

											<p style="padding-top: 10px; font-size: 15px"> <strong>Gender:</strong> <label>
												<input type="radio" name="gender" id="gender" value="Female" checked="true">
												Female
											</label>
											<label>
												<input type="radio" name="gender" id="gender" value="Male">
												Male
											</label>
											<label>
												<input type="radio" name="gender" id="gender" value="Transgender">
												Transgender
											</label></p>
										</div>
										<div class="form-group">

											<label for="exampleInputPassword1">Usename</label> 
											<input type="text" id="username" name="username" class="form-control" placeholder="Usename" value="" required="true">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Password</label>
											<input type="Password" class="form-control" id="password" name="password" placeholder="************" value="" required="true" maxlength="10" pattern="[0-9]+"> 
										</div>

										<button type="submit" name="submit" class="btn btn-default">Add</button> </form> 
									</div>

								</div>


							</div>
						</div>
						<?php include_once('includes/footer.php');?>
					</div>
					<!-- Classie -->
					<script src="js/classie.js"></script>
					<script>
						var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
						showLeftPush = document.getElementById( 'showLeftPush' ),
						body = document.body;

						showLeftPush.onclick = function() {
							classie.toggle( this, 'active' );
							classie.toggle( body, 'cbp-spmenu-push-toright' );
							classie.toggle( menuLeft, 'cbp-spmenu-open' );
							disableOther( 'showLeftPush' );
						};

						function disableOther( button ) {
							if( button !== 'showLeftPush' ) {
								classie.toggle( showLeftPush, 'disabled' );
							}
						}
					</script>
					<!--scrolling js-->
					<script src="js/jquery.nicescroll.js"></script>
					<script src="js/scripts.js"></script>
					<!--//scrolling js-->
					<!-- Bootstrap Core JavaScript -->
					<script src="js/bootstrap.js"> </script>
				</body>
				</html>
				<?php } ?>