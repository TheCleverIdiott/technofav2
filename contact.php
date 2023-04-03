<?php 

ob_start();

error_reporting(0);

$page = "contact";

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

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>
  
  
  <script language="JavaScript" type="text/javascript">
function submitForm()
{ 
var req = null; 
document.ajax.dyn.value="Started...";
if(window.XMLHttpRequest)
req = new XMLHttpRequest(); 
else if (window.ActiveXObject)
req  = new ActiveXObject(Microsoft.XMLHTTP); 
req.onreadystatechange = function()
{ 
document.ajax.dyn.value=document.getElementById('name').value;
if(req.readyState == 4)
{
var ajaxDisplay = document.getElementById('res');
ajaxDisplay.innerHTML = req.responseText;	
}  
};
var name = document.getElementById('name').value;
var mail = document.getElementById('mail').value;
var phone = document.getElementById('phone').value;
var occupation = document.getElementById('occupation').value;
var com = document.getElementById('com').value;
var sco = document.getElementById('sco').value;
var queryString = "name=" + name + "&mail=" + mail + "&phone=" + phone + "&occupation=" + occupation + "&com=" + com + "&sco=" + sco;
req.open("GET", "contact-form.php?" + queryString, true); 
req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
req.send(null); 
} 
</script>
<style> 

.formin1{width:96%; padding:10px 2%; margin: 5px 0;}
#res img{width:150px !important;}


</style>
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

						<h3><img src="images/pin.png" class="pinimage" alt=""> Contact Us</h3>

                        

                        <div class="teble-responsive " style="width:100%;">

                            <div class="col-md-6">
                            <h4 style="color:#000 !important; font-size:15px; margin-bottom:20px;"> <i class="fas fa-map-marker-alt" style=" padding-right:15px;"></i> DANGACCHA, KALYANPUR,<BR> KALNA ROAD, BURDWAN <BR>(Near Agricultural Farm)</h4>
                            
                            <h4 style="color:#000 !important; font-size:15px; margin-bottom:20px;"> <i class="fas fa-phone" style=" padding-right:15px;"></i> +91-7407246622 / 33 </h4>
                            
                            <h4 style="color:#000 !important; font-size:15px; margin-bottom:20px;"> <i class="far fa-envelope" style=" padding-right:15px;"></i> holychildschool.burdwan@gmail.com </h4>
                            
                            <h4 style="color:#000 !important; font-size:15px; margin-bottom:20px;"> <i class="far fa-clock" style=" padding-right:15px;"></i> Monday - Saturday, 08:00AM - 05:00 PM </h4>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3666.090324507517!2d87.88141131451286!3d23.239799984843458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f849bad980d823%3A0xcfd9b2845743d03a!2sBurdwan+Holy+Child+School!5e0!3m2!1sen!2sin!4v1543296931091" width="100%" height="240" frameborder="0" style="border:solid 2px #ABADB3 !important;" allowfullscreen></iframe>
                            
                            </div> 

                            <div class="col-md-6">
                            <div id="res">
                            <FORM name="ajax" method="POST" action="">
                            <input name="name" type="text" id="name" maxlength="30" class="formin1" placeholder="Your Name">
                            <input type="hidden" name="dyn" size="32" value="">
                            
                            <input name="mail" type="text" maxlength="255" class="formin1" id="mail"  placeholder="Email Address">
                            <input name="phone" type="text" maxlength="255" class="formin1" id="phone"  placeholder="Mobile Number">
			<input name="occupation" type="text" maxlength="255" class="formin1" id="occupation"  placeholder="Occupation">
                            <textarea rows="2" name="com" cols="55" class="formin1" id="com"  placeholder="Comments"></textarea>
                            <br>
                            <img src="captcha.php" alt=""><br>
                            <input type="text" name="sco" id="sco" maxlength="30" class="formin1" placeholder="Security Code">
                            <INPUT type="BUTTON" value="Submit"  ONCLICK="submitForm()" alt="" class="expert-btn">
                            </form>
                        </div>
                        </div>

                           

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