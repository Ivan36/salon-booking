<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
	header('location:logout.php');
} else{

	if(isset($_POST['submit']))
	{
		$salonname=$_POST['salonname'];
		$did=$_POST['did'];



		$query=mysqli_query($con, "INSERT into  tblsalons(salon,did) value('$salonname','$did')");
		if ($query) {
			echo "<script>alert('Salon has been added.');</script>"; 
			echo "<script>window.location.href = 'add-salons.php'</script>";   
			$msg="";
		}
		else
		{
			echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
		}


	}
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>BPMS | Add Salons</title>

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
						<h3 class="title1">Add Salons</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add Salons :</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<p style="font-size:16px; color:red" align="center"> <?php if($msg){
										echo $msg;
									}  ?> </p>


									<div class="form-group">
										<label for="exampleInputEmail1">Salon Name</label> 
										<input type="text" class="form-control" id="sername" name="salonname" placeholder="Enter Salon Name" value="" required="true"> 
									</div>
									<div class="form-group"> 
										<label for="exampleInputPassword1">Town</label> 
										<select class="form-control" required="" name="did">
											<option value="">---select town---</option>
											<?php 
											$sql=mysqli_query($con,"SELECT * from tbldistricts");
											while ($row = mysqli_fetch_array($sql)) {

												?>	
												<option value="<?php echo $row['id'] ?>"><?php echo $row['district'] ?></option>
												<?php
											}
											?>

										</select>
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