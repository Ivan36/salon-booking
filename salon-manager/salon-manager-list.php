<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
	header('location:logout.php');
} else{



	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>BPMS || Manage Services</title>

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
					<div class="tables">
						<h3 class="title1">Manage Salons</h3>
						
						
						
						<div class="table-responsive bs-example widget-shadow">
							<h4>Update Services:</h4>
							<table class="table table-bordered">
								<thead> 
									<tr> 
										<th>#</th> 
										<th>Salons Name</th> 
										<th>Manager</th>
										<th>username</th> 
										<th>email</th>
										<th>contact</th>   
										<th>Action</th>
									</tr>
								</thead> 
								<tbody>
									<?php
									$ret=mysqli_query($con,"SELECT * from  tblmanager where sid='$sid'");
									$cnt=1;
									while ($row=mysqli_fetch_array($ret)) {

										?>

										<tr> 
											<th scope="row"><?php echo $cnt;?></th>
											<td><?php  echo $row['salon'];?></td> 
											<td><?php  echo $row['names'];?></td> 
											<td><?php  echo $row['username'];?></td> 
											<td><?php  echo $row['email'];?></td> 
											<td><?php  echo $row['contact'];?></td> 
											<td><a class="btn btn-sm btn-info" href="salon-profile.php?salon=<?php echo $row['salon'];?>">view details</a>
												
											</td> 
										</tr>  
										<?php 
										$cnt=$cnt+1;
									}?>
								</tbody> 
							</table> 
						</div>
					</div>
				</div>
			</div>
			<!--footer-->
			<?php include_once('includes/footer.php');?>
			<!--//footer-->
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
	<?php }  ?>