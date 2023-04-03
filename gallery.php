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
	<link href="css/lightbox.css" rel="stylesheet" type="text/css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Page Preloder -->
	
	<?php include "header.php"; ?>
	
    
   <?php include "scroll-notice.php"; ?>

<section class="courses-section spad2">
		<div class="container">
			<div class="section-title text-center">
				<h3 style="color: #020031">Event Gallery</h3>
				
			</div>
			<div class="row">
				
                
		
			
			
		
	
                
                <div class="gallery-section">
                <div class="gallery">
                	<?php  
                	$folder_image=mysqli_query($con,"select * from `folder_image` order by id desc");
               		while($row=mysqli_fetch_array($folder_image))
                    {                     
                     
                      ?>                
                    <!-- course item -->
                    <div class="col-lg-4 col-md-6 course-item">                    
                    <a class="example-image-link" href="gallery2.php?value=<?php echo $row[id]; ?>" data-title="">
                    <img src="<?php echo $row[file]; ?>" class="img-responsive" alt=""><br>
                    <p class="event-title"><?php echo $row[folder_title]; ?></p>
                    </a>
                    </div>
                    <!-- course item -->
                    <?php
                     } ?>
                    
                    
				
                </div>
				</div>
                
                
                
                
                
			</div>
		</div>
	</section>
	

<?php include "all-modal.php"; ?>
<?php include "footer.php"; ?>


	
    
    
    

<!--ScrollNews-->
<script>
jQuery.fn.liScroll = function(settings) {
	settings = jQuery.extend({
		travelocity: 0.03
		}, settings);		
		return this.each(function(){
				var $strip = jQuery(this);
				$strip.addClass("newsticker")
				var stripHeight = 1;
				$strip.find("li").each(function(i){
					stripHeight += jQuery(this, i).outerHeight(true); // thanks to Michael Haszprunar and Fabien Volpi
				});
				var $mask = $strip.wrap("<div class='mask'></div>");
				var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
				var containerHeight = $strip.parent().parent().height();	//a.k.a. 'mask' width 	
				$strip.height(stripHeight);			
				var totalTravel = stripHeight;
				var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
				function scrollnews(spazio, tempo){
				$strip.animate({top: '-='+ spazio}, tempo, "linear", function(){$strip.css("top", containerHeight); scrollnews(totalTravel, defTiming);});
				}
				scrollnews(totalTravel, defTiming);				
				$strip.hover(function(){
				jQuery(this).stop();
				},
				function(){
				var offset = jQuery(this).offset();
				var residualSpace = offset.top + stripHeight;
				var residualTime = residualSpace/settings.travelocity;
				scrollnews(residualSpace, residualTime);
				});			
		});	
};

$(function(){
    $("ul#ticker01").liScroll();
});
</script>
<!--ScrollNews-->




<script src="js/lightbox-plus-jquery.min.js"> </script>
<!--====== Javascripts & Jquery ======-->
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
    
    
  
    
	
</body>
</html>