<?php 
ob_start();
error_reporting(0);
$page = "gallery";
include"conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Burdwan Holichild School</title>
	<meta charset="UTF-8">
	<meta name="description" content="Unica University Template">
	<meta name="keywords" content="event, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.png" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link href="css/lightbox.css" rel="stylesheet" type="text/css">




  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style>
    
/*    img*/
/*{*/
/*  position: relative;*/
}
img:before, img:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 25px;
  left: 10px;
  /*width: 50%;*/
  /*top: 80%;*/
  /*max-width:300px;*/
  background: #777;
  -webkit-box-shadow: 0 35px 20px #777;
  -moz-box-shadow: 0 35px 20px #777;
  box-shadow: 0 35px 20px #777;
  -webkit-transform: rotate(-8deg);
  -moz-transform: rotate(-8deg);
  -o-transform: rotate(-8deg);
  -ms-transform: rotate(-8deg);
  transform: rotate(-8deg);
}
img:after
{
  -webkit-transform: rotate(8deg);
  -moz-transform: rotate(8deg);
  -o-transform: rotate(8deg);
  -ms-transform: rotate(8deg);
  transform: rotate(8deg);
  right: 10px;
  left: auto;
}

    
</style>


</head>
<body>
    <?php include "header.php"; ?>
    
<!-- Courses section -->
	<section class="courses-section spad2">
		<div class="container">
			<div class="section-title text-center">
				<h3 style="color: #020031">Event Gallery</h3>
				<h4><?php echo $row[folder_title]; ?></h4>
			</div>
			<div class="row">
				
                
		
			
			
		
	
                
                <div class="gallery-section">
                <div class="gallery">
                
                  <?php
                  $folder_title=$_GET['value'];  
                  $gallery_image=mysqli_query($con,"select * from `gallery_image` where  folder_title='$folder_title' order by id asc");
                  while($row=mysqli_fetch_array($gallery_image))
                    {                     
                     
                      ?>                
                    <!-- course item -->
                    <div class="col-lg-4 col-md-6 course-item">                    
                    <a class="example-image-link" href="<?php echo $row[file]; ?>" data-lightbox="example-set" data-title="">
                    <img src="<?php echo $row[file]; ?>" class="img-responsive" alt="Title" style="height: 268px !important;"><br>
                   
                    </a>
                    </div>
                    <!-- course item -->
                    <?php
                     } ?>
                    
                    <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/3.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/3.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                
               
                
                
                	<!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/3.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/3.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                    
                    <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/1.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/1.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                    
                    
                    <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/2.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/2.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                
                 <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/3.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/3.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                 <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/4.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/4.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
                
                 <!-- course item -->
                    <!-- <div class="col-lg-4 col-md-6 course-item">
                    <a class="example-image-link" href="img/gallery/1.jpg" data-lightbox="example-set" data-title="">
                    <img src="img/gallery/1.jpg" class="img-responsive"><br>
                    </a>
                    </div> -->
                    <!-- course item -->
				
                </div>
				</div>
                
                
                
                
                
			</div>
		</div>
	</section>
	<!-- Courses section end-->

<!-- Modal --> 


<?php include "all-modal.php"; ?>
<?php include "footer.php"; ?>

<script src="js/lightbox-plus-jquery.min.js"> </script>

	<!--====== Javascripts & Jquery ======-->

	<script src="js/owl.carousel.min.js"></script>
	
	<script src="js/main.js"></script>
 </body>
</html>