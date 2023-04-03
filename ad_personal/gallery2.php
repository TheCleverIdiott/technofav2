<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
error_reporting(0);
$page = "folder";
include"conn.php";
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
            <h1><i class="fa fa-picture-o"></i> Folder Gallery</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="dashboard.php">Dashboard</a></li>
              <li><a href="#">Gallery</a></li>
            </ul>
          </div>
        </div>
       
        <div class="row">
          



          <div class="col-sm-offset-3 col-md-6">
            <div class="card">
              <h3 class="card-title">Upload Folder Image</h3>
              <div class="card-body">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label class="control-label">Folder Title</label>
                    <input type="text" class="form-control" name="folder_title" placeholder="Folder Title" required>
                  </div>
                  <div class="form-group">
                    <label class="control-label">File</label>
                    <input class="form-control" type="file" name="file" required>
                  </div>
                  <div class="card-footer">
                   <button class="btn btn-success icon-btn" type="submit" name="sub" value="folder"><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
  
          
        
           <div class="col-sm-offset-1 col-md-10">
            <div class="card table-responsive">
              <h3 class="card-title">Folder Image List</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                     <th>#</th>
                    <th>Folder Title</th>
                    <th>Folder Image</th>                    
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 
                  $notice_qry=mysqli_query($con,"select * from `folder_image` order by id desc");
                  while($row=mysqli_fetch_array($notice_qry))
                    {
                      $c++;
                      ?>
                          <tr><form method='post' enctype='multipart/form-data'>

                             <td><?php echo $c; ?></td>

                             <td><input class='bor' type='text' name='folder_title' value='<?php echo $row['folder_title']; ?>'>
                                 <input type='hidden' name='hid' value='<?php echo $row['id']; ?>'>
                                 <input type='hidden' name='hid_file' value='<?php echo $row['file']; ?>'>
                             </td>

                              <td><?php if($row['file']) { ?>
                                <a href='../<?php echo $row['file']; ?>' target='_blank' class='bor2'>
                                <img src='../<?php echo $row['file']; ?>' width='50' height='50'></a><?php } ?>
                                <input class='bor' type='file' name='file'>
                              </td>

                              <td><input class='bor' type='submit' name='folder' value='update'>
                                  <input class='bor' type='submit' name='folder' value='delete' onclick='return Delete();'>
                              </td>

                             </form></tr>
                   <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        
         
         
          <?php
           if($_POST[folder]=="delete")
           {
              $d=mysqli_query($con,"select * from `folder_image` where `id`='$_POST[hid]'");
              $del=mysqli_fetch_array($d);

              $d2=mysqli_query($con,"select * from `gallery_image` where `folder_title`='$del[id]'");
              while($del2=mysqli_fetch_array($d2))
              {
                unlink("../$del2[file]");
                $upd_del="delete from `gallery_image` where `id`='$del2[id]'";
                $gal_del=mysqli_query($con,$upd_del);
              }

             unlink("../$_POST[hid_file]");
             $upd_del="delete from `folder_image` where `id`='$_POST[hid]'";
             $gal_del=mysqli_query($con,$upd_del);
             if($gal_del)
             {
               echo ("<script language='javascript'>
                window.alert('Your folder data successfully Deleted')
                window.location.href='gallery2.php';
                </script>");
             }
           }
          if($_POST[folder]=="update")
          {
            $folder_title=addslashes($_POST['folder_title']);            
            if($_FILES['file']['name']=="")
            {               
               $upd_qry="update `folder_image` set `folder_title`='$folder_title' where `id`='$_POST[hid]'";
               $upd_run=mysqli_query($con,$upd_qry); 
              if($upd_run)
               {
               echo ("<script language='javascript'>
                window.alert('Your folder data successfully Updated')
                window.location.href='gallery2.php';
                </script>");
               }
            }
            else
            {
              if(($_FILES['file']['type']=="image/jpeg")|| 
                 ($_FILES['file']['type']=="image/jpg") || 
                 ($_FILES['file']['type']=="image/png"))
               {
                unlink("../$_POST[hid_file]");
                move_uploaded_file($_FILES['file']['tmp_name'],'../upload/folder/'.$_FILES['file']['name']);
                $destin='../upload/folder/'.$_FILES['file']['name'];
                $image_info=getimagesize($destin);
                if ($image_info['mime'] == 'image/jpeg')
                     { $image = imagecreatefromjpeg($destin); }
                  elseif($image_info['mime'] == 'image/jpg')
                     { $image = imagecreatefromjpg($destin); }
                elseif($image_info['mime'] == 'image/png')
                     { $image = imagecreatefrompng($destin);  }
                       $thumb='upload/folder/pro'.time()."-".$_FILES['file']['name'];
                       $thumb2='../upload/folder/pro'.time()."-".$_FILES['file']['name'];
                       imagejpeg($image,$thumb2,40);
                       unlink($destin);                      
                  $upd_qry="update `folder_image` set `folder_title`='$folder_title',`file`='$thumb' where `id`='$_POST[hid]'";
               $upd_run=mysqli_query($con,$upd_qry); 
              if($upd_run)
             {
               echo ("<script language='javascript'>
                window.alert('Your folder data successfully Updated')
                window.location.href='gallery2.php';
                </script>");
             }
                 }
              else
              {
                 echo ("<script language='javascript'>
                window.alert('You must upload jpg,jpeg or png images')
                window.location.href='gallery2.php';
                </script>");
              }
            }
          } 
          ?>
           
          
        
      </div>
    </div>
    <!-- Javascripts-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
      function Delete(){
      var x=confirm("Are you sure want to Delete all content in the folder?");
      if(x) { return true; } else {return false; } }
    </script>
  </body>
</html>
<?php
 } else {
   header("location:index.php?msg=3");
} ?> 