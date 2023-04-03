<?php 
ob_start();
error_reporting(0);
$page = "staff";
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
<!--                   Teaching Staff -->
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Teaching Staff </h3>
                        
                        <div class="teble-responsive">
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="background:#359FF4; color:#fff; border: solid 1px #000;">
                                        <th style="border: solid 1px #000;">Staff Name</th>
                                        <th style="border: solid 1px #000;">Qualification</th>
                                        <th style="border: solid 1px #000;">Designation</th>
                                     </tr>
                                
                                </thead>
                                <tbody>
                                <?php  
                            $teaching_staff=mysqli_query($con,"select * from `teaching_staff` order by id asc");
                            while($row=mysqli_fetch_array($teaching_staff))
                            {                     
                            $c++; 
                            ?>
                                    <tr>
                                        <td style="background:#f3f2f2; border: solid 1px #000;"><?php echo $row[name]; ?></td>
                                        <td style="background:#fff; border: solid 1px #000;"><?php echo $row[qualifi]; ?></td>
                                        <td style="background:#f3f2f2; border: solid 1px #000;"><?php echo $row[designa]; ?></td>
                                    </tr>
                             <?php
                            }?>
                                    <!-- <tr>
                                        <td>Ahish Nandi</td>
                                        <td>M.Sc</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Priyanka Chakraborty</td>
                                        <td>B.Tech</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Himanshu Kumar Das</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Soumita Basu Jas</td>
                                        <td>M.A., P.T.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Krishna Chatterjee</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Krishna Senapati</td>
                                        <td>B.Com, P.T.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Madhumita Hazra</td>
                                        <td>B.A., P.T.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Paramita Nag Basudhar</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Atanu Mondal</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Purbasha Chatterjee</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Barsha Biswas</td>
                                        <td>B.A.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Santu kr. Mour</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Nilanjana Kundu</td>
                                        <td>M.Sc., B.Ed</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Soumya Bhattacharjee</td>
                                        <td>M.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Bikash Kr Jha</td>
                                        <td>B.A., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>saisab Banerjee</td>
                                        <td>M.A, B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Arpita Tah</td>
                                        <td>M.Sc., B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Chandrika Banerjee Sen</td>
                                        <td>M.Sc, B.Ed.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Suparna Dutta</td>
                                        <td>B.A., P.T.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Debanjan Bera</td>
                                        <td>MA ,B.Ed</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Abha Rout</td>
                                        <td>M.A., B.Lib</td>
                                        <td>Librarian</td>
                                    </tr>
                                     <tr>
                                        <td>Bishnushree Dhara</td>
                                        <td>M.A.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Deblina Saha</td>
                                        <td>B.Sc.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                     <tr>
                                        <td>Rosy Mukherjee</td>
                                        <td>B.Sc.</td>
                                        <td>Asst. Teacher</td>
                                    </tr>
                                    <tr>
                                        <td>Chanchal Chowdhury</td>
                                        <td>B.Sc.</td>
                                        <td>Demonstrator cum Laboratory Assistant</td>
                                    </tr> -->
                                     
                                </tbody>
                            </table>
                            
                        </div>
                        
                     </div>
                    </div>
<!--                       Teaching Staff-->
                        
<!--                   Non Teaching Staff -->
                    <div class="margin-bot">
					<div class="service-content">
						<h3><img src="images/pin.png" class="pinimage" alt=""> Non-Teaching Staff </h3>
                        
                        <div class="teble-responsive">
                            
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="background:#359FF4; color:#fff; border: solid 1px #000;">
                                        <th style="border: solid 1px #000;">Staff Name</th>
                                        <th style="border: solid 1px #000;">Qualification</th>
                                        <th style="border: solid 1px #000;">Designation</th>
                                     </tr>
                                
                                </thead>
                                <tbody>
                                    <?php  
                                    $non_teaching_staff=mysqli_query($con,"select * from `non_teaching_staff` order by id asc");
                                    while($row=mysqli_fetch_array($non_teaching_staff))
                                    {                     
                                    $c++; 
                                    ?>
                                    <tr>
                                        <td style="background:#f3f2f2; border: solid 1px #000;"><?php echo $row[name]; ?></td>
                                        <td style="border: solid 1px #000;"><?php echo $row[qualifi]; ?></td>
                                        <td style="background:#f3f2f2; border: solid 1px #000;"><?php echo $row[designa]; ?></td>
                                    </tr>
                                    <?php
                                    }?>
                                    <!-- <tr>
                                        <td>Pradip Sain</td>
                                        <td>B.A.</td>
                                        <td>Office Staff</td>
                                    </tr>
                                    <tr>
                                        <td>Mahamaya Lahiri </td>
                                        <td>B.Com</td>
                                        <td>Office Staff</td>
                                    </tr><tr>
                                        <td>Amit Kr. Nandy</td>
                                        <td>H.S.</td>
                                        <td>Office Staff</td>
                                    </tr>
                                    <tr>
                                        <td>Dipak Lahiri</td>
                                        <td></td>
                                        <td>Group – D</td>
                                    </tr>
                                    <tr>
                                        <td>Kakali Barui</td>
                                        <td></td>
                                        <td>Group – D</td>
                                    </tr>
                                    <tr>
                                        <td>Krishna Debnath</td>
                                        <td></td>
                                        <td>Group – D</td>
                                    </tr>
                                    <tr>
                                        <td>Sadhana Majumder</td>
                                        <td></td>
                                        <td>Group – D</td>
                                    </tr>
                                    <tr>
                                        <td>Sagar Rudra</td>
                                        <td></td>
                                        <td>Group – D</td>
                                    </tr>
                                    <tr>
                                        <td>Somnath Mondal</td>
                                        <td></td>
                                        <td>Group – D</td>
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