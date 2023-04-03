<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
error_reporting(0);
$page = "gallery";
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
            <h1><i class="fa fa-picture-o"></i> Photo Gallery</h1>
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
              <h3 class="card-title">Upload Photo</h3>
              <div class="card-body">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                     <label class="control-label">Select folder:</label>
                     <select name="folder" class="form-control">
                      <?php 
                      $sql=mysqli_query($con,"SELECT * FROM folder_image order by id desc");
                      while ($rows=mysqli_fetch_array($sql)) { ?>
                        <option  value="<?php echo $rows['id'];?>"><?php echo $rows['folder_title'];?></option> 
                      <?php } ?>
                    </select>
                 
                   </div>
                  <div class="form-group">
                    <label class="control-label">Title</label>
                    <input class="form-control" type="text" name="image_title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label class="control-label">File</label>
                    <input class="form-control" type="file" name="file" required>
                  </div>
                  <div class="card-footer">
                   <button class="btn btn-success icon-btn" type="submit" name="sub" value="gallery" ><i class="fa fa-fw fa-lg fa-check-circle"></i> Submit</button>
                  </div>
                </form>
              </div>
              
            </div>
            
          </div>



           

          
          <div class="col-sm-offset-1 col-md-10">
            <div class="card">
              <h3 class="card-title">Photo Gallery List</h3>
              <table class="table table-bordered">
                <thead>
                  <tr>
                     <th>#</th>
                    <th>Folder Title</th>
                    <th>Image Title</th>
                    <th>Gallery Image</th>                    
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 
                  $notice_qry=mysqli_query($con,"select * from `gallery_image` order by id desc");
                  while($row=mysqli_fetch_array($notice_qry))
                    {
                      $notice_qry2=mysqli_query($con,"select * from `folder_image` where `id`='$row[folder_title]' order by id desc");
                      $row2=mysqli_fetch_array($notice_qry2);
                      $c++;
                      ?>
                          <tr><form method='post' enctype='multipart/form-data'>

                             <td><?php echo $c; ?></td>

                             <td><input class='bor' type='text' name='folder_title' value='<?php echo $row2['folder_title']; ?>'>
                                 <input type='hidden' name='hid' value='<?php echo $row['id']; ?>'>
                                 <input type='hidden' name='hid_file' value='<?php echo $row['file']; ?>'>
                             </td>

                             <td><input class='bor' type='text' name='image_title' value='<?php echo $row['image_title']; ?>'>
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
             unlink("../$_POST[hid_file]");
             $upd_del="delete from `gallery_image` where `id`='$_POST[hid]'";
             $gal_del=mysqli_query($con,$upd_del);
             if($gal_del)
             {
               echo ("<script language='javascript'>
                window.alert('Your Gallery data successfully Deleted')
                window.location.href='gallery.php';
                </script>");
             }
           }
          if($_POST[folder]=="update")
          {
            $image_title=addslashes($_POST[image_title]);            
            if($_FILES['file']['name']=="")
            {               
               $upd_qry="update `gallery_image` set `image_title`='$image_title' where `id`='$_POST[hid]'";
               $upd_run=mysqli_query($con,$upd_qry); 
              if($upd_run)
               {
               echo ("<script language='javascript'>
                window.alert('Your folder data successfully Updated')
                window.location.href='gallery.php';
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
                move_uploaded_file($_FILES['file']['tmp_name'],'../upload/gallery/'.$_FILES['file']['name']);
                $destin='../upload/gallery/'.$_FILES['file']['name'];
                $image_info=getimagesize($destin);
                if ($image_info['mime'] == 'image/jpeg')
                     { $image = imagecreatefromjpeg($destin); }
                  elseif($image_info['mime'] == 'image/jpg')
                     { $image = imagecreatefromjpg($destin); }
                elseif($image_info['mime'] == 'image/png')
                     { $image = imagecreatefrompng($destin);  }
                       $thumb='upload/gallery/pro'.time()."-".$_FILES['file']['name'];
                       $thumb2='../upload/gallery/pro'.time()."-".$_FILES['file']['name'];
                       imagejpeg($image,$thumb2,40);
                       unlink($destin);                      
                  $upd_qry="update `gallery_image` set `image_title`='$image_title',`file`='$thumb' where `id`='$_POST[hid]'";
               $upd_run=mysqli_query($con,$upd_qry); 
              if($upd_run)
             {
               echo ("<script language='javascript'>
                window.alert('Your Gallery data successfully Updated')
                window.location.href='gallery.php';
                </script>");
             }
                 }
              else
              {
                 echo ("<script language='javascript'>
                window.alert('You must upload jpg,jpeg or png images')
                window.location.href='gallery.php';
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
      var x=confirm("Are you sure want to Delete?");
      if(x) { return true; } else {return false; } }
    </script>
  </body>
</html>
<?php
 } else {
   header("location:index.php?msg=3");
} ?> 