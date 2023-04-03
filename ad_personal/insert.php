<?php 
ob_start();
 session_start();
  if(isset($_SESSION['login_user']))
  {
include"conn.php";
error_reporting(0);
?>
<?php 
 
/* ......................gallery ...........................................*/

if($_POST['sub']=="gallery")
 {
 	$folder=$_POST['folder'];
 	$image_title=addslashes($_POST[image_title]); 	
 	 if($_FILES['file']['name']=="")
 	 {
 	 	$school=mysqli_query($con,"insert into `gallery_image` values('','$folder','$image_title','')");
 	           if($school)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your gallery data successfully uploaded')
 	           	 	window.location.href='gallery.php';
 	           	 	</script>");
 	           }
 	 } else {
    if(($_FILES['file']['type']=="image/jpeg") || 
 	   ($_FILES['file']['type']=="image/jpg") || 
 	   ($_FILES['file']['type']=="image/png"))
 	 {
 	 	// $file="upload/"."notice".time()."_".$_FILES[file][name];
    //     copy($_FILES[file][tmp_name],"../".$file);
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
 	           $school=mysqli_query($con,"insert into `gallery_image` values('','$folder','$image_title','$thumb')");
 	           if($school)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Gallery data successfully uploaded')
 	           	 	window.location.href='gallery.php';
 	           	 	</script>");
 	           }
     }
    else { echo ("<script language='javascript'>
 	           	 	window.alert('You must upload jpg,jpeg or png images')
 	           	 	window.location.href='gallery.php';
 	           	 	</script>"); }
 	    
} }

/* ......................Folder Image...........................................*/

if($_POST['sub']=="folder")
 {
 	$folder_title=addslashes($_POST[folder_title]); 	
 	 if($_FILES['file']['name']=="")
 	 {
 	 	$school=mysqli_query($con,"insert into `folder_image` values('','$folder_title','')");
 	           if($school)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Gallery data successfully uploaded')
 	           	 	window.location.href='gallery2.php';
 	           	 	</script>");
 	           }
 	 } else {
    if(($_FILES['file']['type']=="image/jpeg") || 
 	   ($_FILES['file']['type']=="image/jpg") || 
 	   ($_FILES['file']['type']=="image/png"))
 	 {
 	 	// $file="upload/"."notice".time()."_".$_FILES[file][name];
    //     copy($_FILES[file][tmp_name],"../".$file);
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
 	           $school=mysqli_query($con,"insert into `folder_image` values('','$folder_title','$thumb')");
 	           if($school)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Folder data successfully uploaded')
 	           	 	window.location.href='gallery2.php';
 	           	 	</script>");
 	           }
     }
    else { echo ("<script language='javascript'>
 	           	 	window.alert('You must upload jpg,jpeg or png images')
 	           	 	window.location.href='gallery2.php';
 	           	 	</script>"); }
 	    
} }

/*  .............Infrastructure Notice............................   */

if($_POST['sub']=="notice")
 {
 	$ntitle=addslashes($_POST[title]);
  $date=addslashes($_POST[date]);
 	 if($_FILES['file']['name']=="")
            {               
              $gal=mysqli_query($con,"insert into `notice` values('','$ntitle','','$date')");
 	          if($gal)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Notice data successfully uploaded')
 	           	 	window.location.href='notice.php';
 	           	 	</script>");
 	           }
            } else {
 	if($_FILES['file']['type']=="application/pdf")
 	 {
 		move_uploaded_file($_FILES['file']['tmp_name'],'../upload/notice/'.time().$_FILES['file']['name']);
 		$destin='upload/notice/'.time().$_FILES['file']['name']; 		
 	    $gal=mysqli_query($con,"insert into `notice` values('','$ntitle','$destin','$date')");
 	      if($gal)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Notice data successfully uploaded')
 	           	 	window.location.href='notice.php';
 	           	 	</script>");
 	           }
    
          
     }  else { echo ("<script language='javascript'>
                window.alert('You must upload PDF file only')
                window.location.href='notice.php';
                </script>"); }
  }
 }

  if($_POST['sub']=="snotice")
 {
 	$stitle=addslashes($_POST[title]);
 	 if($_FILES['file']['name']=="")
            {               
              $gal=mysqli_query($con,"insert into `snotice` values('','$stitle','')");
 	          if($gal)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Notice data successfully uploaded')
 	           	 	window.location.href='snotice.php';
 	           	 	</script>");
 	           }
            } else {
 	if($_FILES['file']['type']=="application/pdf")
 	 { 

 		move_uploaded_file($_FILES['file']['tmp_name'],'../upload/snotice/'.time().$_FILES['file']['name']);
 		$destin='upload/snotice/'.time().$_FILES['file']['name']; 		
 	    $gal=mysqli_query($con,"insert into `snotice` values('','$stitle','$destin')");
 	      if($gal)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your Notice data successfully uploaded')
 	           	 	window.location.href='snotice.php';
 	           	 	</script>");
 	           }
    
           else { echo ("<script language='javascript'>
 	           	 	window.alert('You must upload PDF file only')
 	           	 	window.location.href='snotice.php';
 	           	 	</script>"); }
     } 
  }
 }

if($_POST['sub']=="alumni")
 {
     $name=addslashes($_POST[name]);
     $mobile=addslashes($_POST[mobile]);
     $designa=addslashes($_POST[designa]);
     $year=addslashes($_POST[year]);
 	 $gal=mysqli_query($con,"insert into `alumni` values('','$name','$mobile','$year','$designa')");
 	      if($gal)
 	           {
 	           	 echo ("<script language='javascript'>
 	           	 	window.alert('Your data successfully uploaded')
 	           	 	window.location.href='alumni.php';
 	           	 	</script>");
 	           }
    else { echo ("<script language='javascript'>
 	           	 	window.alert('Server Error')
 	           	 	window.location.href='alumni.php';
 	           	 	</script>"); }
}

if($_POST['sub']=="teaching_staff")
 {
     $name=addslashes($_POST[name]);
     $father=addslashes($_POST[father]);
     $qualifi=addslashes($_POST[qualifi]);
     $designa=addslashes($_POST[designa]);
     $mobile=addslashes($_POST[mobile]);
    $gal2=mysqli_query($con,"insert into `teaching_staff` values('','$name','$father','$mobile','$qualifi','$designa')");
        if($gal2)
             {
               echo ("<script language='javascript'>
                window.alert('Your data successfully uploaded')
                window.location.href='teaching_staff.php';
                </script>");
             }
    else { echo ("<script language='javascript'>
                window.alert('Server Error')
                window.location.href='teaching_staff.php';
                </script>"); }
}
if($_POST['sub']=="non_teaching_staff")
 {
     $name=addslashes($_POST[name]);
     $father=addslashes($_POST[father]);
     $qualifi=addslashes($_POST[qualifi]);
     $designa=addslashes($_POST[designa]);
     $mobile=addslashes($_POST[mobile]);
    $gal2=mysqli_query($con,"insert into `non_teaching_staff` values('','$name','$father','$mobile','$qualifi','$designa')");
        if($gal2)
             {
               echo ("<script language='javascript'>
                window.alert('Your data successfully uploaded')
                window.location.href='non_teaching_staff.php';
                </script>");
             }
    else { echo ("<script language='javascript'>
                window.alert('Server Error')
                window.location.href='non_teaching_staff.php';
                </script>"); }
}
 ?>
 <?php
 } else {
   header("location:index.php?msg=3");
} ?> 


