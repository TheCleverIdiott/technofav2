<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
include"conn.php";
error_reporting(0);
$page = "career2";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Burdwan Holichild School</title>
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
            <h1><i class="fa fa-bell-o"></i>Career</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="#">Notice</a></li>
            </ul>
          </div>
        </div>
       
        <div class="row">
          
          <?php
          if($_POST[sub]=="delete")
           {
           
             unlink("../$_POST[hid_file]");
             $upd_del="delete from `career2` where `id`='$_POST[hid]'";
             $del=mysqli_query($con,$upd_del);
             if($del) {
              echo ("<script language='javascript'>
                window.alert('Your Notice data successfully Deleted')
                window.location.href='career2.php';
                </script>");
           } }
          
          ?>
          <div class="col-sm-offset-1 col-md-10">
            <div class="card table-responsive">
              <h3 class="card-title">Career Details List</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Post</th>
                    <th>Name</th> 
                    <th>Mobile</th> 
                    <th>Email</th> 
                    <th>Address</th> 
                    <th>File</th> 
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $notice_qry=mysqli_query($con,"select * from `career2` order by id desc");
                  while($row=mysqli_fetch_array($notice_qry))
                    {
                      $sub=substr($row[file],17,40);
                      $c++;
                      echo "<tr><form method='post' enctype='multipart/form-data'>
                             <td>$c</td>
                             <td><textarea class='bor' name='notice'>$row[pname]</textarea>
                                 <input type='hidden' name='hid' value='$row[id]'>
                                 <input type='hidden' name='hid_file' value='$row[file]'>
                             </td>
                             <td><input type='text' class='bor' name='notice' value='$row[name]'></td>
                             <td><input type='text' class='bor' name='notice' value='$row[mobile]'></td>
                             <td><input type='text' class='bor' name='notice' value='$row[email]'></td>
                             <td><textarea class='bor' name='notice'>$row[address]</textarea></td>
                             <td><a href='../$row[file]' target='_blank'>Download Resume</a></td>
                             <td>
                                 <input class='bor' type='submit' name='sub' value='delete' onclick='return Delete();'></td>
                             </form></tr>";
                    }
                  ?>
                </tbody>
              </table>
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
    <script type="text/javascript">
      function Delete(){
      var x=confirm("Are you sure want to Delete?");
      if(x) { return true; } else {return false; } }
    </script>
  </body>
</html>
<?php
 } else {
   header("location:index.php?msg=3");
} ?> 