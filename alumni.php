<?php 
ob_start();
error_reporting(0);
$page = "alumni";
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

<!--                   Non Teaching Staff -->
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Alumni</h3>
                        
                        <div class="teble-responsive " style="width:100%;">
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:40%;">Name </th>
                                        <th style="width:40%;">Designation </th>
                                        <th style="width:15%;">Year Of Passing</th>
                                       
                                     </tr>
                                
                                </thead>
                                <tbody>
                                	<?php  
                            $alumni=mysqli_query($con,"select * from `alumni` order by id asc");
                            while($row=mysqli_fetch_array($alumni))
                            {                     
                           	?>
                                    <tr>
                                        <td><?php echo $row[name]; ?></td>
                                        <td><?php echo $row[designa]; ?></td>
                                        <td><?php echo $row[year]; ?></td>
                                    </tr>

                            <?php
                            }?>
                                    <!-- <tr>
                                        <td>Student2</td>
                                        <td>2016</td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td>Student</td>
                                        <td>2015</td>
                                    </tr>
                                    <tr>
                                        <td>Student</td>
                                        <td>2017</td>
                                    </tr> -->
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                     </div>
                    </div>
<!--                       Non Teaching Staff-->
                    

                  
                     
                        
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