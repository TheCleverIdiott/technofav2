<?php 
ob_start();
error_reporting(0);
$page = "facilities";
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
<!--                   Transport -->
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Transport </h3>
                        
                        <div class="col-md-5"><img src="images/bus1.jpg" alt="Holy Child School" class="img-responsive"></div>
                        <div class="col-md-7">
						<p class="text-justify">
The School has 8 buses and 10 pool cars to provide transportation facility to students and staff. All the transport routes are well planned to cover all sectors of Burdwan and the neighbouring areas. School maintains constant communication with the transport-in-charge and the drivers to ensure safety and security.</p></div>
					</div>
                    </div>
<!--                        Transport-->
<!--                      Doctor-On-Call  -->
                        <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Doctor-On-Call </h3>
                        
                        <div class="col-md-7">
						<ul style="padding:10px 0 10px 20px; ">
                                <li style="margin:5px 0;">Dr. Partho Sen —9153367103 (M)</li>
                                <li>Dr. Soumitra Sinha —9932780380 (M)</li>
                            </ul></div>
                        
                        
                        <div class="col-md-5"></div>
                        
					</div>
                    </div>
<!--                        Doctor-On-Call-->
<!--               Library         -->
                   <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Library </h3>
                        
                        <div class="col-md-5"><img src="images/lib.jpg" alt="Holy Child School" class="img-responsive"></div>
                        <div class="col-md-7">
						<p class="text-justify">
The libraries have an automated check in and check-out system and contain a stock of multimedia materials (CDs, DVDs and videos) for use in the classes. Students are actively encouraged to use the library for independent study and for research towards their presentations and projects.</p></div>
					</div>
                    </div>      
 <!--                   Library     -->
                    
                  <!--  Science Labs         -->
                   <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Science Labs </h3>
                        
                        <div class="col-md-5"><img src="images/science.jpg" alt="Holy Child School" class="img-responsive"></div>
                        <div class="col-md-7">
						<p class="text-justify">
The laboratories are well designed, airy and well-lit. A lot of thought has gone into making the labs safe for student use, with wash areas at every table and acid-spill showers within easy reach. Electrical and gas supply channels are protected by screens, and have safety cut-off taps within easy reach of everyone in the lab.</p></div>
					</div>
                    </div>      
 <!-- Science Labs -->
                        
                        <!--computer lab         -->
                   <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Computer Labs </h3>
						<div class="col-md-5"><img src="images/computer.jpg" alt="Holy Child School" class="img-responsive"></div>
                        <div class="col-md-7">
						<p class="text-justify">
Computer lab to stay ahead in the digital arena. The world today is going completely digital and to keep pace with that, students in higher classes will have access to a hi-tech Computer system where they can learn the intricacies of the virtual arena from the very beginning.</p></div>
                        <div class="col-md-2"></div>
					</div>
                    </div>      
 <!--                   Computer lab     -->
                    
                        
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