<?php 
ob_start();
error_reporting(0);
$page = "about";
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


	<!-- Services section -->
	<section class="service-section spad">
		<div class="container services">
			
			<div class="row">
				
                <!--LeftSide-->
                <div class="col-lg-9 col-sm-6 service-item">
					<div class="box-white">
                    
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt="">About Burdwan Holy Child School</h3>
                        
                        <div class="col-md-5"><img src="images/school.png" alt="Holy Child School" class="img-responsive"></div>
                        <div class="col-md-7">
						<p class="text-justify">Opportunities are the launch pads, which propel a person towards greater heights of success. By providing opportunities that promote social, emotional, cultural, mental and physical growth, we at Burdwan Holy Child School strive to enhance our students' potential and personality into one of an all-rounded individual, a contributing member to society and the nation at large.</p></div>
					</div>
                    </div>
                    
                    <div class="margin-bot">
                    <div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt="">Founded</h3>
                        
                        <div class="col-md-9">
						<p class="text-justify">Burdwan Holy Child School was founded by the N.R.I. Couple, Late Pranab Goswami and Ma'am Jana Goswami residing at U.S.A. in the year 1999. They dreamt of an English Medium Ideal Educational Institution to provide modern scientific education based on Indian Culture and values for the children of their native place and surrounding area.</p></div>
					</div>
                    
                    <div class="col-md-3 text-right"><img src="images/founder.jpg" alt="Holy Child School" class="img-responsive img-circle"></div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="margin-bot">
                    <div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt="">Our Vision</h3>
                        
                        <div class="col-md-3 text-right"><img src="images/vision.jpg" alt="Holy Child School" class="img-responsive"></div>
                        
                        <div class="col-md-9">
						<p class="text-justify">We follow our motto whole heartedly that we are an English medium school with Indian Culture and Values and we also try to 'make a man' who will in future 'Be a man' in its true sense.

</p></div>
					</div>
                    
                    
                    </div>
                    
                    
                    
                    
                    
                    <div class="margin-bot">
                    <div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt="">Principal's Message</h3>
                        
                        
                        
                        <div class="col-md-9">
						<p class="text-justify">As I walk down the hallways of the school everyday, I can hear the chatter of eager minds, the shouts of excitement from the victorious athletes, the thump of dancer feet and the sound of melodious voices harmonizing. The perpetual energy, movement and enthusiasm permeate the atmosphere at Burdwan Holy Child. We are a school with a difference! We value individualism, creativity and innovation and strive to nurture them in our students.<br><br>
                        
<span class="name">Ms. Paramita Routh Yadav</span>

</p></div>


<div class="col-md-3 text-right"><img src="images/principal.jpg" alt="Holy Child School" class="img-responsive img-circle"></div>


					</div>
                    </div>
                    
                    
                    
                    
				</div>
                </div>
                <!--LeftSide-->
				
              


                
                <?php include "aside.php"; ?>
                
				
                
                
			</div>
		</div>
	</section>
	<!-- Services section end -->

	

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