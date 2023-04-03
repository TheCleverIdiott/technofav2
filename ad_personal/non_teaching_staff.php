<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
include"conn.php";
error_reporting(0);
$page = "career4";
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
            <h1><i class="fa fa-bell-o"></i>Non Teaching Staff</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="#">Non Teaching Staff</a></li>
            </ul>
          </div>
        </div>
       
        <div class="row">
          <div class="col-sm-offset-3 col-md-6">
            <div class="card">
              <h3 class="card-title">Non Teaching Staff</h3>
              <div class="card-body">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                   <label class="control-label">Name</label>
                   <input class="form-control" type="text" name="name" placeholder="Enter Name" required>
                  </div>
                  <div class="form-group">
                   <label class="control-label">Father Name</label>
                   <input class="form-control" type="text" name="father" placeholder="Enter Father Name" >
                  </div>
                 <div class="form-group">
                   <label class="control-label">Qualification</label>
                   <input class="form-control" type="text" name="qualifi" placeholder="Enter Qualification" >
                  </div>
                  <div class="form-group">
                   <label class="control-label">Designation</label>
                   <input class="form-control" type="text" name="designa" placeholder="Enter Designation" >
                  </div>
                  <div class="form-group">
                   <label class="control-label">Mobile No.</label>
                   <input class="form-control" type="text" pattern="[6-9]{1}[0-9]{9}" title="Phone number with 6-9 and remaing 9 digit with 0-9" name="mobile" placeholder="Enter Mobile No." >
                  </div>
                  
                   <div class="card-footer">
                      <button class="btn btn-success icon-btn" type="submit" name="sub" value="non_teaching_staff"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                   </div>
                </form>
              </div>
            </div>
          </div>
          <?php
          if($_POST[sub]=="delete")
           {
             
             $upd_del="delete from `non_teaching_staff` where `id`='$_POST[hid]'";
             $del=mysqli_query($con,$upd_del);
             if($del) {
              echo ("<script language='javascript'>
                window.alert('Your staff data successfully Deleted')
                window.location.href='non_teaching_staff.php';
                </script>");
           } }

            if($_POST[sub]=="update")
           {
           $name=addslashes($_POST[name]);
           $father=addslashes($_POST[father]);
           $qualifi=addslashes($_POST[qualifi]);
           $designa=addslashes($_POST[designa]);
           $mobile=addslashes($_POST[mobile]);
           $sf=mysqli_query($con,"update `non_teaching_staff` set `name`='$name',`father`='$father',`qualifi`='$qualifi',`designa`='$designa',`mobile`='$mobile' where `id`='$_POST[hid]'");
           if($sf) {
              echo ("<script language='javascript'>
                window.alert('Your staff data successfully Updated')
                window.location.href='non_teaching_staff.php';
                </script>");
           }
           }
          
          ?>
          <div class="col-sm-offset-0 col-md-12">
            <div class="card table-responsive">
              <h3 class="card-title">Non Teaching Staff List</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Qualification</th>
                    <th>Designation</th>  
                    <th>Mobile No.</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $notice_qry=mysqli_query($con,"select * from `non_teaching_staff` order by id desc");
                  while($row=mysqli_fetch_array($notice_qry))
                    {
                      
                      $c++;
                      echo "<tr><form method='post' enctype='multipart/form-data'>
                             <td>$c</td>
                             <td><input type='text' name='name' value='$row[name]'>
                                 <input type='hidden' name='hid' value='$row[id]'>
                             </td>
                             <td><input type='text' name='father' value='$row[father]'></td>
                             <td><input type='text' name='qualifi' value='$row[qualifi]'></td>
                             <td><input type='text' name='designa' value='$row[designa]'></td>
                             <td><input type='number' name='mobile' value='$row[mobile]'></td>
                            <td>
                                 <input class='bor' type='submit' name='sub' value='delete' onclick='return Delete();'>
                                 <input class='bor' type='submit' name='sub' value='update'>
                             </td>
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