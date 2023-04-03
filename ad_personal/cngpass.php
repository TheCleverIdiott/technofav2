<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
      $user=$_SESSION['login_user'];
include"conn.php";
error_reporting(0);
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
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="dashboard.php"> Holy Child School</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                  <li><a href="dashboard.php"><i class="fa fa-sign-out fa-lg"></i>Dashboard</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <?php
      	include 'left-aside.php';
	  ?>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-bell-o"></i>Password Change</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="#">Change Password</a></li>
            </ul>
          </div>
        </div>
        <?php 
        if($_POST[sub]=="submit")
        {
          $user=addslashes($_POST[username]);
          $pass=addslashes($_POST[password]);
           if("$_POST[password]"!="$_POST[cpassword]")
           {
               $error=": New Password does not match with confirm password";
           }
           else
           {
               $sql=mysqli_query($con,"select * from `admin` where `user`='$user'");
               $row=mysqli_fetch_array($sql);
               $sql2=mysqli_query($con,"update `admin` set `user`='$user',`pass`='$pass' where id='$row[id]'");
               if($sql2)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your password successfully changed & Now please login Again!')
 	           	 	window.location.href='logout.php';
 	           	 	</script>");
 	           }
           }
        }
        $sql2=mysqli_query($con,"select * from `admin`");
        $row2=mysqli_fetch_array($sql2);
        ?>
         
        <div class="row">
          <div class="col-sm-offset-3 col-md-6">
            <div class="card"><font color="red" size="4"><?php echo "$reset"; ?></font>
              <h3 class="card-title">Password Change Form</h3>
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label">New Username</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" required value="<?php echo $row2[user]; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label class="control-label">New Password</label>
                    <input type="password" class="form-control" placeholder="New Password" name="password" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Confirm Password <font color="red"><?php echo "$error"; ?></font></label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
                  </div>
                   <div class="card-footer">
                      <button class="btn btn-success icon-btn" type="submit" name="sub" value="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                   </div>
                </form>
              </div>
            </div>
          </div>
         
          <div class="col-sm-offset-1 col-md-10">
            <div class="card">
              
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