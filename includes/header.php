<link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
<?php 
require_once 'dbconnection.php';
error_reporting(0);

if (isset($_SESSION['ID']) && !empty($_SESSION['ID'])) {
  session_start();
  $customerid = $_SESSION['ID'];
  $query = mysqli_query($con,"SELECT * from tblcustomers where ID='$customerid'");

  if (mysqli_num_rows($query) > 0) {
   $row = mysqli_fetch_array($query);
   $customer_phone = $row['MobileNumber'];
   $customer_name = $row['Name'];
   ?>

  

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" style="font-family: ; font-size: 25px;" href="index.php">Online Salon Booking System</a>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>

            <!-- <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li> -->
            <li class="nav-item"><a href="salon_list.php" class="nav-link">Salons</a></li>
            <!-- <li class="nav-item"><a href="about.php" class="nav-link">About</a></li> -->
            <li class="nav-item"><a href="booknow.php" class="nav-link">BookNow</a></li>
            <li class="nav-item"><a href="my-appointments.php" class="nav-link">Appointments</a></li>

            <li class="nav-item" style="margin-left:18%;"><a href="logout.php"  class="nav-link" onclick="return confirm('sure to leave')"> Logout(<?php echo $row['username']; ?>)</a></li>
            <!-- <li class="nav-item"><a href="" data-toggle="modal" class="nav-link" data-target=".demo-popup-signup"> Signup</a></li> -->
          </ul>
        </div>

        <!-- <input type="text" name="searchdata" class="form-control-md" style="margin-left: 15%;padding-left: 5px;" placeholder="Search for Services"><button style="margin-left: 10px;" type="submit" name="search" class="btn btn-success">Search</button> -->
        <button type="button" style="margin-left: 12%;"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
         <i class="fas fa-fw fa-search"></i>
       </button>

     </div>

   </nav>

   <?php

 }

}

else{

 ?>
 

 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" style="font-family: ; font-size: 25px;" href="index.php">Online Salon Booking System</a>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>

        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>

        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="salon_list.php" class="nav-link">Salons</a></li>

        <li class="nav-item" style="margin-left:30%;"><a href="" data-toggle="modal" class="nav-link" data-target=".demo-popup-login"> Login</a></li>
        <li class="nav-item"><a href="" data-toggle="modal" class="nav-link" data-target=".demo-popup-signup"> Signup</a></li>
      </ul>
    </div>

    <!-- <input type="text" name="searchdata" class="form-control-md" style="margin-left: 15%;padding-left: 5px;" placeholder="Search for Services"><button style="margin-left: 10px;" type="submit" name="search" class="btn btn-success">Search</button> -->
    <button type="button" style="margin-left: 20%;"  class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
     <i class="fas fa-fw fa-search"></i>
   </button>

 </div>

</nav>
<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST" action="search-services.php">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel">Search for Services and Salons</h4>
          <button type="button" class="close" style="color: red;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-8 col-lg-8 col-sm-8">
                <input type="text" name="searchdata" class="form-control" style="margin-left: 1%;padding-left: 5px;" placeholder="Search for Services">
              </div>
              <div class="col-md-4 col-lg-4 col-sm-4">
                <button style="margin-left: 2px;" type="submit" name="search" class="btn btn-success btn-lg">Search</button>
              </div>
            </div>

          </div>
          <div class="row">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
</div>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="container">
      <!-- popup box modal starts here -->
      <div class="modal fade demo-popup-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" style="color:blue;">Login</h3>
              <button type="button" class="close" style="color:red;" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

              <form action="home.php" method="POST">
               <br><br>
               <div class="form-group">
                <div class="form-label-group">
                  <label for="uname" style="color: black;"><b>Enter Username or Phone no</b></label>
                  <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fas fa-user fa-fw"></i></span>
                    <input type="text" placeholder="Enter Username or Phone No" class="form-control" name="username" required autofocus="autofocus">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <label for="psw" style="color: black;"><b>Password</b></label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-key fa-fw"></i></span>
                    <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="checkbox">
                  <label style="color: black;">
                    <input type="checkbox" value="remember-me">
                    Remember Password
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="login"><i class="fa fa-fw fa-sign-in-alt"></i> Login</button>
              <!-- <input type="submit" class="btn btn-primary btn-block" name="signin" value="Sign in"> -->
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- popup box modal ends here -->

</div>

<div class="col-sm-4">
  <div class="container">
    <!-- popup box modal starts here -->
    <div class="modal fade demo-popup-signup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" style="color:blue;">Create Account</h3>
            <button type="button" class="close" style="color:red;" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">

            <form method="POST" name="registration_form" id="registration_form" action="home.php" style="padding:2px 4px;">

              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <label for="firstName" style="color: black;font-size: 16px;">First name</label>
                      <input type="text" class="form-control" name="fName" id="fName" placeholder="Enter First Name" required>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-label-group">
                      <label for="lastName" style="color: black;font-size: 16px;">Last name</label>
                      <input type="text" class="form-control" name="lName" id="lName" placeholder="Enter Last Name" required>

                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-label-group">
                     <label style="color: black;font-size: 16px;">Gender:</label>
                     <select name="gender" class="form-control" id="gender" required>
                      <option value="" selected>select gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Transgender">Other</option>
                    </select>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <label style="color: black;font-size: 16px;">Phone No</label>
                    <input type="text"  name="contact" maxlength="10" id="txtChar" onkeypress="return isNumberKey(event)" class="form-control" placeholder="eg.0789574673" required="" >
                    <input type="hidden" name="usertype" class="form-control" value="customer" required="">

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-label-group">
               <label style="color: black;font-size: 16px;">Email Address:</label>
               <input type="Email" class="form-control" name="email" id="email" placeholder="example2323@mail.com" required>
             </div>
           </div>
           <div class="col-md-12">
            <div class="form-label-group">
             <label style="color: black;font-size: 16px;">Enter Prefered Username:</label>
             <input type="text" class="form-control" name="uName" id="uName" placeholder="enter user name" required>
           </div>
         </div>

         <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="firstName" style="color: black;font-size: 16px;">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>

              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <label for="lastName" style="color: black;font-size: 16px;">Confirm Password:</label>
                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-label-group" style="margin:2%; ">
           <button type="submit" class="btn btn-primary btn-block" name="register"><i class="fa fa-fw fa-registered"></i> Create Account </button>
         </div>
       </div>

       <!-- <button type="submit" style="margin-top: 2%;" class="btn btn-primary btn-block" name="register" value="REGISTER">Create Account </button> -->
     </form>

   </div>

 </div>
</div>
</div>
</div>
<!-- popup box modal ends here -->
</div>

</div>



