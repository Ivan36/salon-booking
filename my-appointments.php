<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>BPMS-Salons</title>

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
 <?php include_once('includes/header.php');

 if (isset($_GET['remove_appointment'])) {
  $rid = intval($_GET['remove_appointment']);
  $query = mysqli_query($con,"UPDATE tblappointment SET Status='2', Remark='Appointment Cancelled' where ID='$rid'");
  if ($query) {
    echo "<script>window.alert('Appointment $rid has been cancelled')</script>";
  }
  else{
   echo "<script>window.alert('Something went wrong try again')</script>";
 }
}

?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg-2.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5">
        <h2 class="mb-0 bread">Appointments</h2>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>my appointments <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>



<section class="ftco-section ftco-pricing">
 <div class="container">
  <div class="row justify-content-center pb-3">
    <div class="col-md-10 heading-section text-center ftco-animate">
     <h1 class="big">Appointments</h1>
     <span class="subheading"></span>
     <h2 class="mb-4">Your appointments Details</h2>
     <p>Name: <?php echo $customer_name; ?></p>
     <p>Phone Number: <?php echo $customer_phone; ?></p>
   </div>
 </div>
 <table class="table table-bordered"> 
  <thead> 
    <tr>
      <th>#</th>
      <th> Appointment Number</th>
      <th>Appointment Date</th>
      <th>Appointment Time</th>
      <th>Status</th>
      <th>feedback</th>
      <th>Action</th>
    </tr>
  </thead> 
  <tbody>
    <?php
    $ret=mysqli_query($con,"SELECT * from  tblappointment WHERE PhoneNumber='$customer_phone' order by AptDate desc");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {

      ?>

      <tr> 
        <th scope="row"><?php echo $cnt;?></th> 
        <td><?php  echo $row['AptNumber'];?></td>
        <td><?php  echo $row['AptDate'];?></td> 
        <td><?php  echo $row['AptTime'];?></td> 
        <td><?php  if ($row['Status']=='1') {
          echo "<p style='color:green;'>Accepted</p>";
        }
        if ($row['Status']=='') {
          echo "<p style='color:orange;'>Still pending</p>";
        } 
        if ($row['Status']=='2') {
          echo "<p style='color:orange;'>Rejected</p>";
        }?></td>
        <td><?php  echo $row['Remark'];?></td>
        <td>
          <?php if ($row['Status']=='') {
           ?>
           <a href="?viewid=<?php echo $row['ID'];?>" class="btn btn-sm btn-success">View</a>
           <a href="?remove_appointment=<?php echo $row['ID'];?>" onclick="return confirm('Are you sure to remove this appointment?')" class="btn btn-sm btn-primary">remove</a>
         <?php } 

         else {
          ?>
          <a href="?viewid=<?php echo $row['ID'];?>" class="btn btn-sm btn-success">View</a>
        <?php } ?>
      </td> 
    </tr> 
    <?php 
    $cnt=$cnt+1;
  }?>
</tbody> 
</table> 
<?php if (isset($_GET['viewid'])) { ?>
  <div class="tables">



   <div class="table-responsive bs-example widget-shadow">

    <h4>Appointment Details:</h4>
    <?php
    $cid=$_GET['viewid'];
    $ret=mysqli_query($con,"SELECT * from tblappointment where ID='$cid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
      $sid =$row['sid'];
      ?>
      <table class="table table-bordered">
       <tr>
        <th>Appointment Number</th>
        <td><?php  echo $row['AptNumber'];?></td>
        <th>Name</th>
        <td><?php  echo $row['Name'];?></td>
      </tr>

      <tr>
        <th>Email</th>
        <td><?php  echo $row['Email'];?></td>

        <th>Mobile Number</th>
        <td><?php  echo $row['PhoneNumber'];?></td>
      </tr>
      <tr>
        <th>Appointment Date</th>
        <td><?php  echo $row['AptDate'];?></td>

        <th>Appointment Time</th>
        <td><?php  echo $row['AptTime'];?></td>
      </tr>

      <tr>
        <th>Services</th>
        <td><?php  echo $row['Services'];?></td>

        <th>Apply Date</th>
        <td><?php  echo $row['ApplyDate'];?></td>
      </tr>


      <tr>
        <th>Status</th>
        <td> <?php  
        if($row['Status']=="1")
        {
          echo "Accepted";
        }

        if($row['Status']=="2")
        {
          echo "Rejected";
        }
        if($row['Status']=="")
        {
          echo "<p style='color:orange;'>Pending";
        }

        ;?></td>
        <th>Salon</th>
        <td>
         <?php 
         $sal =mysqli_fetch_array(mysqli_query($con,"SELECT salon from tblsalons where id='$sid'"));
         echo $sal['salon'];

         ?>

       </td>
     </tr>
   </table>

   <?php if($row['Remark']==""){ ?>
      <!-- <table class="table table-bordered">
        <tr>
          <th>Remark :</th>
          <td>
            Appointment still pending
          </td>
        </tr>

      </table> -->
    <?php } else { ?>

      <table class="table table-bordered">
       <tr>
        <th>Remark</th>
        <td><?php echo $row['Remark']; ?></td>

        <th>Remark date</th>
        <td><?php echo $row['RemarkDate']; ?>  </td></tr>

      </table>
    <?php } ?>
  <?php } ?>
</div>
</div>
<?php } ?>
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