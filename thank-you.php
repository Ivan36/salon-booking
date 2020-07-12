<?php
session_start();
error_reporting(0);

?>
<?php 
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {


  $aptno = $_POST['aptno'];
  $pMode = $_POST['paymentMode'];
  if ($pMode != '') { 

  $sql = mysqli_query($con, "UPDATE tblappointment set payment_mode='$pMode' where AptNumber='$aptno'");
  if ($sql) {
    $str = $_SESSION[salon1]." on ".$_SESSION['date1']." at ".$_SESSION['time1'];
    $msg = "<p class='alert alert-success'> Success!! Congraculations you have completed your appointment see you soon at: {$_SESSION['salon1']} on {$_SESSION['date1']} at {$_SESSION['time1']}...Thank you for your support!</p>";
  }
  else{
    $msg1 = "<p class='alert alert-danger'> Error!! Something went wrong try again!</p>";
  }
  }
  else{
    $msg1 = "<p class='alert alert-danger'> Error!! Choose atleast one payment mode and submit again!</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPMS-Thank You</title>


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
  <script type="text/javascript">
    function paymentnfo() {
      var radios = document.getElementsByName('paymentMode');

      for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
                // do whatever you want with the checked radio

                if (radios[i].value === "MobileMoney") {
                  alert("Send the Money to this Number: 0776231019 and add the reason as: Appointment Number sent to your phone in messages.We will give you feedback");
                }
                if (radios[i].value === "AccountNo") {
                  alert("Deposit the money in Housing Finance Bank, Account Number: 4356278908, Mbarara branch.with details sent on your phone. We will give you feedback");
                }
                if (radios[i].value === "Cash") {
                  alert("You have opted to come along with booking fee thank you for using our system");
                }
                // only one radio can be logically checked, don't check the rest
                break;
              }
            }
          }
        </script>

        <section class="hero-wrap hero-wrap-2" style="background-image: url('images/4.jpg');" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
              <div class="col-md-9 ftco-animate pb-5">
                <h2 class="mb-0 bread">Thank You</h2>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> Thank You<span> <i class="ion-ios-arrow-forward"></i></span></p>
              </div>
            </div>
          </div>
        </section>

        <section class="ftco-section ftco-no-pb">
         <div class="container">
          <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-6 text-center heading-section ftco-animate">
             <h4 class="w3ls_head">Thank you for applying. Your Appointment no is <?php echo $_SESSION['aptno'];?> </h4>
           </div>


           <div class="appointment-wrap">
            <h3 class="mb-2">Complete your Appointment</h3>
            <h4>Booking fee: 5000/= for services under 50000/= cost and 50000/= for bridal care services thank you.</h4>

            <?php if (isset($msg)) {
              echo '<br>';
              echo $msg;
            } 
          
            else {
              if (isset($msg1)) {
              echo '<br>';
              echo $msg1;
            }
              ?>
              <form action="#" method="post" class="appointment-form">
                <div class="row" style="margin-left:30%;">
                  <input type="hidden" name="aptno" value="<?php echo $_SESSION['aptno'];?>">
                  <br>
                  <h2 style="color:green; text-align: center;"><u>MODE OF PAYMENT</u></h2>
                  <label style="color:red;">Choose atleast one payment mode you want to pay with</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp

                  <label style="color:green;">MobileMoney</label>
                  <input type="radio" name="paymentMode" id="paymentMode" value="MobileMoney" onclick="paymentnfo();" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label style="color:green;">Account Number</label>
                  <input type="radio" name="paymentMode" id="paymentMode" value="AccountNo" onclick="paymentnfo();" required />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <label style="color:green;">Pay Cash</label>
                  <input type="radio" name="paymentMode" id="paymentMode" value="Cash" onclick="paymentnfo();" required />&nbsp;&nbsp;
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </div>
              </form>
            <?php } ?>
          </div>
          <div class="container-fluid p-0">
            <div class="row no-gutters">

            </div>
          </div>
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