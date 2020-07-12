<?php 
include('includes/dbconnection.php');
session_start();
// error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['register'])) {
	$fname = $_POST['fName'];
	$lname = $_POST['lName'];
	$fullname = $fname.' '.$lname;
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$type = $_POST['usertype'];
	$contact = $_POST['contact'];
	$uName = $_POST['uName'];
	$pass = $_POST['password'];
	$cpass = $_POST['confirmPassword'];
	$password = md5($pass);

	$check_username = mysqli_query($con,"SELECT username from tblcustomers where username='$uName' ");

	$check_contact = mysqli_query($con,"SELECT MobileNumber from tblcustomers where MobileNumber='$contact' ");

	$check_email = mysqli_query($con,"SELECT Email from tblcustomers where Email='$email' ");

	if (mysqli_num_rows($check_username) > 0 ) {
		echo '<script> window.alert("Error!!! Username '.$uName.' is already taken choose a different one")</script>';
	}

	else if (mysqli_num_rows($check_contact) > 0 ) {
		echo '<script> window.alert("Error!!! Phone Number '.$contact.' is already taken choose a different one")</script>';
	}

	else if (mysqli_num_rows($check_email) > 0 ) {
		echo '<script> window.alert("Error!!! Email Address '.$email.' is already taken choose a different one")</script>';
	}
	else{

	if ($pass != $cpass) {
		?>
		<script type="text/javascript">
			window.alert("Try again and confirm the right password");

		</script>
		<?php
	}

	else {
		$sql = "INSERT INTO tblcustomers (Name,Email,MobileNumber,Gender,username,password) 
		values('$fullname','$email','$contact','$gender','$uName','$password')";

		if (mysqli_query($con,$sql)) {
			?>
			<script type="text/javascript">
				window.alert("Account Craeted Successfully You can Now Login");

			</script>
			<?php
		}

	}

}

}

if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$pass = mysqli_real_escape_string($con, $_POST['password']);
	$password = md5($pass);

	$query = "SELECT * FROM tblcustomers where username = '$username' OR MobileNumber='$username'";
	$result = mysqli_query($con, $query);
	if ($row = mysqli_fetch_assoc($result)) {

		if ($row['password']== $password) {
		session_start();
		$_SESSION['username'] = $row['username'];
		$_SESSION['ID'] = $row['ID'];

		header("location:index.php");

	}
	else{
		echo '<script> window.alert("Password is incorrect try again or contact administrator")</script>';
	}

	}
	else{
		echo '<script> window.alert("This account doesnot exist please register first or contact administrator")</script>';
	}
}

?>
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
								<span class="subheading">BEST SALON SCHEDULING SOFTWARE </span>
								<h2 class="mb-4">NO MORE LONG WAITS ,GET SERVICES CONVINIETLY </h2>
								<p class="mb-4">We value your time by managing well, book now with your fovourite salon near you..</p>
								
								
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
			</div> -->

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
			</div> -->

		<!-- 	<div class="slider-item js-fullheight">
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

						<!-- <div class="overlay"></div> -->
						<div class="appointment-wrap">
							<span class="subheading">Reservation</span>
							<h3 class="mb-2">Make an Appointment</h3>
							<form action="#" method="post" class="appointment-form">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" placeholder="Name" name="name" required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="email" class="form-control" id="appointment_email" placeholder="Email" name="email" required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="services" id="services" required="true" class="form-control">
													<option value="">Select Services</option>
													<?php $query=mysqli_query($con,"select * from tblservices");
													while($row=mysqli_fetch_array($query))
													{
														?>
														<option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
													<?php } ?> 
												</select>
											</div>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" readonly="" class="form-control appointment_date" placeholder="Date" name="adate" id='adate' required="true">
										</div>    
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control appointment_time" placeholder="Time" name="atime" id='atime' required="true">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Make an Appointment" class="btn btn-primary">
								</div>
							</form>
						</div>
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