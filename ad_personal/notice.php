<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
include"conn.php";
error_reporting(0);
$page = "notice";
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
            <h1><i class="fa fa-bell-o"></i> Notice</h1>
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
          <div class="col-sm-offset-3 col-md-6">
            <div class="card">
              <h3 class="card-title">Upload Notice</h3>
              <div class="card-body">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="control-label">Notice Title</label>
                    <textarea class="form-control" placeholder="Notice Title" name="title" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Date</label>
                    <input type="date" class="form-control"  name="date" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Notice File</label>
                    <input class="form-control" type="file" name="file">
                  </div>
                   <div class="card-footer">
                      <button class="btn btn-success icon-btn" type="submit" name="sub" value="notice"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                   </div>
                </form>
              </div>
            </div>
          </div>
          <?php
          if($_POST[sub]=="delete")
           {             
             unlink("../$_POST[hid_file]");
             $upd_del="delete from `notice` where `id`='$_POST[hid]'";
             $infra_del=mysqli_query($con,$upd_del);
             if($infra_del) {
              echo ("<script language='javascript'>
                window.alert('Your Notice data successfully Deleted')
                window.location.href='notice.php';
                </script>");
           } }
          if($_POST[sub]=="update")
          {
            $ntitle=addslashes($_POST[title]);
            $date=addslashes($_POST[date]);
            if($_FILES['file']['name']=="")
            {               
               $upd_qry="update `notice` set `title`='$ntitle',`date`='$date' where `id`='$_POST[hid]'";
               $upd_run=mysqli_query($con,$upd_qry); 
               if($upd_run) {
               echo ("<script language='javascript'>
                window.alert('Your Notice data successfully Updated')
                window.location.href='notice.php';
                </script>");
                            }
            }
            else
            {
              if($_FILES['file']['type']=="application/pdf")
                 {
                  unlink("../$_POST[hid_file]");                
                  move_uploaded_file($_FILES['file']['tmp_name'],'../upload/notice/'.time().$_FILES['file']['name']);
                  $destin='upload/notice/'.time().$_FILES['file']['name'];    
                  $upd_qry="update `notice` set `title`='$ntitle',`file`='$destin',`date`='$date' where `id`='$_POST[hid]'";
                  $upd_run=mysqli_query($con,$upd_qry); 
                  if($upd_run) {
                  echo ("<script language='javascript'>
                  window.alert('Your Notice data successfully Updated')
                  window.location.href='notice.php';
                  </script>");
                              }
                 }
              else
              {
                echo ("<script language='javascript'>
                window.alert('You must uploaded pdf file only')
                window.location.href='notice.php';
                </script>"); 
              }
            }
          } 
          ?>
          <div class="col-sm-offset-1 col-md-10">
            <div class="card table-responsive">
              <h3 class="card-title">Notice List</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Notice Title</th>
                    <th>Notice File</th>
                    <th>Date</th>                    
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $notice_qry=mysqli_query($con,"select * from `notice` order by id desc");
                  while($row=mysqli_fetch_array($notice_qry))
                    {                     
                      $c++; 
                      ?>
                            <tr><form method='post' enctype='multipart/form-data'>
                             <td><?php echo $c; ?></td>

                             <td><textarea class='bor' name='title'><?php echo $row[title]; ?></textarea>
                                 <input type='hidden' name='hid' value='<?php echo $row[id]; ?>'>
                                 <input type='hidden' name='hid_file' value='<?php echo $row[file]; ?>'>
                             </td>

                             <td>
                                <?php if($row[file]){ ?>
                                 <a href='../<?php echo $row[file]; ?>' target='_blank' class='bor2'>View</a><?php  } ?>
                                 <input class='bor' type='file' name='file'>
                             </td>

                             <td><input type='date' class='bor' name='date' value="<?php echo $row[date]; ?>">
                                 
                             </td>

                             <td><input class='bor' type='submit' name='sub' value='update'>
                                 <input class='bor' type='submit' name='sub' value='delete' onclick='return Delete();'>
                             </td>

                             </form></tr>
                 <?php   }
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