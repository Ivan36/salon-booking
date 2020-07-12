<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
} else{

  if(isset($_POST['submit']))
  {

    $cid=$_GET['viewid'];
    $remark=$_POST['remark'];
    $status=$_POST['status'];
    

    $query=mysqli_query($con, "UPDATE  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {
      $msg="All remark has been updated.";
    }
    else
    {
      $msg="Something Went Wrong. Please try again";
    }


  }
  

  ?>
  <!DOCTYPE HTML>
  <html>
  <head>
    <title>BPMS || View Salon Profile</title>

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
       <h3 class="title1"><?php echo $salon; ?> Details</h3>



       <div class="table-responsive bs-example widget-shadow">
        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
          echo $msg;
        }  ?> </p>
        <h4> Profile:</h4>
        <?php
        $cid=$_GET['salon'];
        $ret=mysqli_query($con,"SELECT * from  tblmanager where sid='$sid' AND salon='$cid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

          ?>
          <table class="table table-bordered">
           <tr>
            <th>Salon Number</th>
            <td><?php  echo $row['sid'];?></td>

            <th>Name</th>
            <td><?php  echo $row['salon'];?></td>
          </tr>

          <tr>
            <th>Manager</th>
            <td><?php  echo $row['names'];?></td>

            <th>Mobile Number</th>
            <td><?php  echo $row['contact'];?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?php  echo $row['email'];?></td>

            <th>Gender</th>
            <td><?php  echo $row['gender'];?></td>
          </tr>

          <tr>
            <th>Created on</th>
            <td><?php  echo $row['created_on'];?></td>

            <th></th>
            <td><a href="#" class="btn btn-sm btn-primary" onclick="return confirm('Before updating your salon info contact admin on: 0750932312 to be granted permision. Thank you')">update</a></td>
          </tr>

        </table>

        <h4> Services List: <a href="add-services.php" class="btn btn-sm btn-primary">Add</a></h4>
        <table class="table table-bordered"> 
          <thead> 
            <tr>
             <th>#</th>
             <th>Service Name</th>
             <th>Service Price</th> 
             <th>Creation Date</th>
           </tr>
         </thead>
         <tbody>
          <?php
          $ret=mysqli_query($con,"SELECT * from  tblservices where sid='$sid'");
          $cnt=1;
          while ($row=mysqli_fetch_array($ret)) {

            ?>

            <tr> 
              <th scope="row"><?php echo $cnt;?></th>
              <td><?php  echo $row['ServiceName'];?></td> 
              <td><?php  echo $row['Cost'];?></td>
              <td><?php  echo $row['CreationDate'];?></td> 
            </tr>   
            <?php 
            $cnt=$cnt+1;
          }?>
        </tbody> 
      </table> 

    <?php } ?>
  </div>
</div>
</div>
</div>
<!--footer-->

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