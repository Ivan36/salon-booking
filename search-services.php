<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>BPMS-Services</title>
	
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include_once('includes/header.php');?>

	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5">
					<h2 class="mb-0 bread">Services</h2>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
				</div>
			</div>
		</div>
	</section>
	
	

	<section class="ftco-section ftco-pricing">
		<div class="container">
			<div class="row justify-content-center pb-3">
				<div class="col-md-10 heading-section text-center ftco-animate">
					<h1 class="big">Pricing</h1>
					<span class="subheading">Pricing</span>
					<h2 class="mb-4">Our Service Prices</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<?php
			if(isset($_POST['search']))
			{ 

				$sdata=$_POST['searchdata'];
				?>
				<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 

				<table class="table table-bordered"> <thead> <tr> <th>#</th> <th> Appointment Number</th> <th>Name</th><th>Mobile Number</th> <th>Appointment Date</th><th>Appointment Time</th><th>Action</th> </tr> </thead> <tbody>
					<?php
					$ret=mysqli_query($con,"select * from  tblappointment where AptNumber like '%$sdata%' || Name like '%$sdata%' || PhoneNumber like '%$sdata%'");
					$num=mysqli_num_rows($ret);
					if($num>0){
						$cnt=1;
						while ($row=mysqli_fetch_array($ret)) {

							?>

							<tr> <th scope="row"><?php echo $cnt;?></th> <td><?php  echo $row['AptNumber'];?></td> <td><?php  echo $row['Name'];?></td><td><?php  echo $row['PhoneNumber'];?></td><td><?php  echo $row['AptDate'];?></td> <td><?php  echo $row['AptTime'];?></td> <td><a href="view-appointment.php?viewid=<?php echo $row['ID'];?>">View</a></td> </tr>   <?php 
							$cnt=$cnt+1;
						} } else { ?>
							<tr>
								<td colspan="8"> No record found against this search</td>

							</tr>

							<?php } }?></tbody> </table> 
						</div>
					</section>

					<?php include_once('includes/footer.php');?>
					
					

					<!-- loader -->
					<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


					<script src="js/jquery.min.js"></script>
					<script src="js/jquery-migrate-3.0.1.min.js"></script>
					<script src="js/popper.min.js"></script>
					<script src="js/bootstrap.min.js"></script>
					<script src="js/jquery.easing.1.3.js"></script>
					<script src="js/jquery.waypoints.min.js"></script>
					<script src="js/jquery.stellar.min.js"></script>
					<script src="js/owl.carousel.min.js"></script>
					<script src="js/jquery.magnific-popup.min.js"></script>
					<script src="js/aos.js"></script>
					<script src="js/jquery.animateNumber.min.js"></script>
					<script src="js/bootstrap-datepicker.js"></script>
					<script src="js/jquery.timepicker.min.js"></script>
					<script src="js/scrollax.min.js"></script>
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
					<script src="js/google-map.js"></script>
					<script src="js/main.js"></script>
					
				</body>
				</html>