<?php
session_start();
ob_start();
?>
<?php
error_reporting(0);
include"conn.php";
?>
<?php
function escape($string){
	
	return htmlspecialchars($string,ENT_QUOTES,'UTF-8');
	}
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
    <link href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
  </head>
  <body background="">
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="">
        <h1>BURDWAN HOLY CHILD SCHOOL</h1>
      </div>
      <?php
	  if($_GET[id]=="1"){
		  
		  echo"<font color='red' size='3'>Wrong username or password</font>";
		  
		  }
      if($_GET[msg]=="2"){
      
      echo"<font color='red' size='3'>You Are Successfully Log Out</font>";
      
      }
      if($_GET[msg]=="3"){
      
      echo"<font color='red' size='3'>Login First</font>";
      
      }
	  ?>
      <div class="login-box">
        <form class="login-form" action="index.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Username" name="name" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="pass">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <input class="btn btn-primary btn-block" type="submit" name="sub" value="Login">
          </div>
          <?php
			if($_POST[sub]=="Login"){
			    $name2=$_POST[name];
			    $name=escape($name2);
				$pass2=$_POST[pass];
				$pass=escape($pass2);
			    $seq=mysqli_query($con,"select * from `admin` where `user`='$name' and `pass`='$pass'");
			    $count=mysqli_num_rows($seq);
				if($count==1)
				{
                  $_SESSION['login_user']=$name;
				  header("location:dashboard.php");
				}
					else
                    {
						header("location:index.php?id=1");
					}
				
				
				}
			?>
        </form>
        <form class="forget-form" action="index.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
  </body>
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins/pace.min.js"></script>
  <script src="js/main.js"></script>
</html>