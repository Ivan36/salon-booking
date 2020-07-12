<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$services=$_POST['services'];
	$adate=$_POST['adate'];
	$atime=$_POST['atime'];
	$phone=$_POST['phone'];
	$aptnumber = mt_rand(100000000, 999999999);
	
	$query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
	if ($query) {
		$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
		$result=mysqli_fetch_array($ret);
		$_SESSION['aptno']=$result['AptNumber'];
		echo "<script>window.location.href='thank-you.php'</script>";	
	}
	else
	{
		$msg="Something Went Wrong. Please try again";
	}

	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>OSBS||Home Page</title>
	
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
	<script language=Javascript>
    <!--
      function isNumberKey(evt)
      {
       var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

      return true;
    }
      //-->
    </script>
	<!-- END nav -->

	<section id="home-section" class="hero" style="background-image: url(images/bg.jpg);" data-stellar-background-ratio="0.5">
		<div class="home-slider owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/cornrow-styles-.jpg" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text mt-5">
								<span class="subheading">Best Salon sheduling software </span>
								<h2 class="mb-4">Book Salon appointment with us convinietly anytime,anywhere</h2>
								<p class="mb-4">We value your time by managing it.</p>
								
						
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/bg_1.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text mt-5">
								<span class="subheading">Natural Beauty</span>
								<h1 class="mb-4">Beauty Salon</h1>
								<p class="mb-4">This Salon provides huge facilities with advanced technology equipments and best quality service. Here we offer best treatment that you might have never experienced before.</p>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
 -->
			<!-- <div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/13A-2.jpg" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text mt-5">
								<span class="subheading">Natural Beauty</span>
								<h1 class="mb-4">Beauty Salon</h1>
								<p class="mb-4">This Salon provides huge facilities with advanced technology equipments and best quality service. Here we offer best treatment that you might have never experienced before.</p>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
 -->
			<!-- <div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<img class="one-third align-self-end order-md-last img-fluid" src="images/bg_2.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text mt-5">
								<span class="subheading">Beauty Salon</span>
								<h1 class="mb-4">Get Pretty Look</h1>
								<p class="mb-4">We pride ourselves on our high quality work and attention to detail. The products we use are of top quality branded products.</p>
								
								
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</section>
	<section class="ftco-section ftco-no-pt ftco-booking">
		<div class="container-fluid px-0">
			<div class="row no-gutters d-md-flex justify-content-end">
				<div class="one-forth d-flex" style="margin-left: 60px;">
					<div class="text">

					</div>
				</div>
				<div class="one-third">
					<div class="img" style="background-image: url(images/bg-1.jpg);">
					</div>
				</div>
			</div>
		</div>
	</section>

	
	<br>


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