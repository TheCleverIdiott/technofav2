<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
error_reporting(0);
$page = "dashboard";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BURDWAN HOLY CHILD SCHOOL</title>
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    
    
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <?php
        include "header.php";
      	include 'left-aside.php';
	  ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Dashboard</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-offset-1 col-md-10">
            <div class="card">
              <h3 class="text-center">WELCOME TO BURDWAN HOLY CHILD SCHOOL</h3>
              <br>
              <img src="../images/slider1.jpg" alt="" class="img-responsive">     
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php
 } else {
   header("location:index.php?msg=3");
} ?> 