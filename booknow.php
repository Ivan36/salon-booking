<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



if (isset($_POST['booknow'])) {
  $customer=$_POST['customer'];
  $email=$_POST['email'];
  $sid=$_POST['sid'];
  $did = $_POST['did'];
  $servid=$_POST['servid'];
  $adate=$_POST['adate'];
  $atime=$_POST['atime'];
  $contact=$_POST['contact'];
  $aptnumber = mt_rand(100000000, 999999999);

  $getSalon = mysqli_query($con,"SELECT * from tblsalons where id='$sid'");
  $row = mysqli_fetch_array($getSalon);
  $salon = $row['salon'];
  $getService = mysqli_query($con,"SELECT * from tblservices where ID='$servid'");
  $row1 = mysqli_fetch_array($getService);
  $services = $row1['ServiceName'];
  
  $query=mysqli_query($con,"INSERT into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,salon,Services,sid) value('$aptnumber','$customer','$email','$contact','$adate','$atime','$salon','$services','$sid')");
  if ($query) {
    $ret=mysqli_query($con,"SELECT * from tblappointment where Email='$email' and  PhoneNumber='$contact'");
    $result=mysqli_fetch_array($ret);
    $_SESSION['aptno']=$result['AptNumber'];
    $_SESSION['salon1'] =$salon;
    $_SESSION['date1'] = $adate;
    $_SESSION['time1'] = $atime;
    echo "<script>window.location.href='thank-you.php'</script>"; 
  }
  else
  {
    $msg="<p class='alert alert-danger text-center'>Something Went Wrong. Please try again</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OSBS | book now</title>


  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/loginc.css" class="css">
  <link rel="stylesheet" href="css/style.css" class="css">
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
  <script>
    function getSalons(val) {
      $.ajax({
        type: "POST",
        url: "get_salons.php",
        data:'countryid='+val,
        success: function(data){
          $("#salon-list").html(data);
        }
      });
    }
    function getServices(val) {
      $.ajax({
        type: "POST",
        url: "get_services.php",
        data:'townid='+val,
        success: function(data){
          $("#service-list").html(data);
        }
      });
    }
    function getDay(val) {
      $.ajax({
        type: "POST",
        url: "getdoctordaybooking.php",
        data:'cid='+val,
        success: function(data){
          $("#datestatus").html(data);
        }
      });
    }

    function getDay1(val) {
      var cidval=document.getElementById("clinic-list").value;
      var didval=document.getElementById("doctor-list").value;
      $.ajax({
        type: "POST",
        url: "getDay.php",
        data:'date='+val+'&cidval='+cidval+'&didval='+didval,
        success: function(data){
          $("#datestatus").html(data);
        }
      });
    }

  </script>

  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/4.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5">
          <h3 class="mb-0 bread" style="font-size: 36px;">Book & Reserve your Spot now!!!</h3>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Book now <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-section bg-light">
    <div class="row">
      <?php if (isset($msg)) {
        echo "<br>";
        echo $msg;
      } ?>
      <div class="col-md-6 col-lg-6">
        <?php include 'calender.php'; ?>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="shadow-lg bg-white rounded testmarg">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="text-center">
              <h1>Make an Appointment</h1><br><br>
            </div>
            <div class="form-group">
              <input type="text" hidden="true" name="customer" value="<?php echo $row['Name']; ?>"  class="form-control" required>
              <input type="text" hidden="true" name="contact" value="<?php echo $row['MobileNumber']; ?>" class="form-control" 
              required>
              <input type="text" hidden="true" name="email" value="<?php echo $row['Email']; ?>"  class="form-control" required>
              <input type="text" hidden="true" name="gender" value="<?php echo $row['Gender']; ?>"  class="form-control" required>
            </div>
            <div class="form-group">
              <label style="font-size:20px" >Location or Town:</label>
              <select name="did" id="city-list" class="form-control demoInputBox"  onChange="getSalons(this.value);">
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
            <div class="form-group">
              <label style="font-size:20px" >Salons List</label>
              <select id="salon-list" name="sid" onChange="getServices(this.value);" class="form-control">
                <option value="">Select Salon</option>
              </select>
            </div>
            <div class="form-group">
              <label style="font-size:20px" >Services Available:</label>
              <select id="service-list" name="servid" onChange="getDoctorday(this.value);" class="form-control">
                <option value="">Select Service</option>
              </select>
            </div>

            <div class="form-group">
              <label><b>Date of Visit:</b></label>
              <input type="date" name="adate" onChange="getDay(this.value);" class="form-control" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required>
              <div id="datestatus"> </div>
            </div>

            <div class="form-group">
              <label><b>Time of Visit:</b></label>
              <input type="text" class="form-control appointment_time" onChange="getTime(this.value);" placeholder="Time" name="atime" id='atime' required="true">
              <!-- <div id="datestatus"> </div> -->
            </div>


            <!-- <div class="form-group">
            <label for="profpic"> Profil Pic </label>
            <input type="file" name="profpic" class="form-control">
          </div> -->

          <div>
            <button  type="submit" name="booknow" class="btn btn-primary btn-shadow btn-sm" >book now</button>
          </div>
        </form>
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